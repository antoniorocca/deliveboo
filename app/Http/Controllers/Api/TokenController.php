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
            'options' => [
            'submitForSettlement' => True
            ]
        ]);
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

        Mail::to($to)->send(new SendNewMail($newOrder));

        dd($newOrder);

        return redirect()->route('checkout');
    }

}
