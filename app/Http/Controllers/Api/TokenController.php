<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    //
    public function index()
    {
        $braintree = config('braintree');
        $clienttoken = $braintree->clientToken()->generate();
        return $clienttoken;
    }
    public function post(Request $request)
    {

      $nonceFromTheClient = $request->payment_method_nonce;
      $braintree = config('braintree');
      $result = $braintree->transaction()->sale([
        'amount' => '10.00',
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      return redirect()->route('index');
    }

}
