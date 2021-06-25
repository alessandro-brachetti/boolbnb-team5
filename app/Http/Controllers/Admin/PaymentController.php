<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree\Gateway;
use App\Http\Controllers\Controller;


class PaymentController extends Controller
{
    public function make(Request $request)
{
    $data = $request->all();
    $gateway = new \Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => '2y94pm5jx53r545r',
        'publicKey' => 'mnw8vhntnb7xnqr9',
        'privateKey' => 'f583a2da3fe7524368bd44a39dfe5182'
    ]);

    $result = $gateway->transaction()->sale([
        'amount' => '5.99',
        'paymentMethodNonce' => $data['payment_Method_Nonce'],
        'options' => [
            'submitForSettlement' => true
            ]
        ]);

    return response()->json(['response'=> $result, 'success' => true]);
    // $response= response()->json(['response'=> $result, 'success' => true]);
    // return redirect()->back();
}

}
