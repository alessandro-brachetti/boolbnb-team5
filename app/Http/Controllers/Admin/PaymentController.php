<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree\Gateway;
use App\Http\Controllers\Controller;
use App\Sponsor;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class PaymentController extends Controller
{
    public function make(Request $request)
{
    
    
    $data = $request->all();
    $sponsor = Sponsor::where('id', '=', $data['sponsor'])->first();
    $gateway = new \Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => '6x5mkttghp3xt46h',
        'publicKey' => 'mcf8trmrn9cyrqk3',
        'privateKey' => 'dd1e92edcdb6ba98ae9d6a3897b7149f'
    ]);

    
    $result = $gateway->transaction()->sale([
        'amount' => $sponsor->price,
        'paymentMethodNonce' => $data['payment_Method_Nonce'],
        'options' => [
            'submitForSettlement' => true
            ]
    ]);

    return response()->json([
        'response'=> $result,
        'success'=> true
    ]);

}
}
