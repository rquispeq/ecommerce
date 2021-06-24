<?php 

namespace App\Models;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class Paypal{

    private $client;
    public function __construct()
    {
        $this->client = new PayPalHttpClient(
            new SandboxEnvironment(config('services.paypal.key'),config('services.paypal.secret'))
        );
    }

    public function paymentRequest($amount){
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation'); //Le pedimos a paypal que nos retorne todos los datos posibles de la transacción

        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => "test_ref_id1",
                    "amount" => [
                        "value" => $amount,
                        "currency_code" => "USD"
                    ]
                ]
            ],
            "application_context" => [
                "cancel_url" => route('paypal.checkout',['status' => 'failure']),
                "return_url" => route('paypal.checkout',['status' => 'success'])
            ]
        ];

        try {
            $response = $this->client->execute($request);
            $aprovalUrl = null;
            foreach ($response->result->links as $link) {
                if ($link->rel == 'approve') {
                    $aprovalUrl = $link->href;
                }
            }

            return $aprovalUrl;
        } catch (\HttpException $ex) {
            dd($ex);
        }
    }

    public function checkout(Request $request){
        $request = new OrdersCaptureRequest($request->token);
        $request->prefer('return=representation');

        try {
            return $this->client->execute($request);
        } catch (\HttpException $e) {
            dd($ex);
        }
    }
}