<?php

namespace App\Http\Controllers\Api;

use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class TokenController extends Controller
{
    //
    public function index(Request $request)
    {
        $braintree = config('braintree');
        $clienttoken = $braintree->clientToken()->generate();
        return $clienttoken;

    }
    public function post(Request $request)
    {
        $request->validate([
            'name' => 'required | max:100',
            'surname' => 'required | max:100',
            'address' => 'required | max:100',
            'email' => 'required | email | max:100',
        ]);

        //dd($request);
        $to = $request->email;

        $dishes = json_decode(request('cart'));

        $total = 0;
        foreach ($dishes as $dish) {
            $total += $dish->totalPrice;
        }
        json_decode(request('cart'));
        $nonceFromTheClient = $request->payment_method_nonce;
        $braintree = config('braintree');
        $result = $braintree->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonceFromTheClient,
        ]);
        if ($result->success) {
            $filters= [];
            foreach ($dishes as $dish) {
              if (!in_array(array($dish->restaurant_id), $filters)) {
                array_push($filters,array($dish->restaurant_id));
              }
            }

            foreach ($dishes as $dish) {
              foreach ($filters as $key => $filter) {
                if ($dish->restaurant_id == $filter[0]) {
                  // code...
                  array_push($filters[$key],$dish);
                }
              }
            }


            $newOrder = new Order;
            $newOrder->restaurant_id = $dishes[0]->restaurant_id;
            $newOrder->amount = $total;
            $newOrder->name = $request->name;
            $newOrder->surname = $request->surname;
            $newOrder->address = $request->address;
            $newOrder->email = $request->email;
            $newOrder->order = json_encode($dishes);
            $newOrder->order_date = Carbon::now();
            $newOrder->save();

            $datiUtente = [
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'email' => $request->email,
                'amount' => $total,
            ];

            Mail::to($to)->send(new SendNewMail($datiUtente));

            //dd($result, $datiUtente, 'successo');

            return redirect()->route('checkout');
        } else {

            //dd($result, 'fallimento');
            return redirect()->route('checkoutf');
            
        }



    }

}
