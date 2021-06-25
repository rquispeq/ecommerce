<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paypal;
use App\Models\CartManager;
use App\Models\Order;

class PaymentController extends Controller
{
    public function paypalPaymentRequest(CartManager $cartManager, Paypal $paypal){
        return redirect()->away($paypal->paymentRequest($cartManager->getAmount()));
    }

    public function paypalCheckout(Request $request, CartManager $cartManager,Paypal $paypal,$status){
        if ($status == 'success') {
            $response = $paypal->checkout($request);

            if (!is_null($response)) {
                $response->shopping_cart_id = $cartManager->getCart()->id;
                Order::createFromResponse($response);
                session()->flash('message','Compra exitosa, hemos enviado un correo con un resumen de la compra.');
                return redirect()->route('welcome');
            }
        }
    }
}
