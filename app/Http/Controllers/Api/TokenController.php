<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

      return redirect()->route('checkout');
    }

}
