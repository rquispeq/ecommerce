<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paypal;
use App\Models\CartManager;
use App\Models\Order;

use Stripe\Stripe;
use Stripe\Charge;

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

    public function stripeCheckout(CartManager $cartManager,Request $request){
        Stripe::setApiKey(config('services.stripe.secret'));
        Charge::create([
            'amount' => ($cartManager->getAmount()) * 100,
            'currency' => 'USD',
            'source' => $request->stripeToken
        ]);
        Order::create(['shopping_cart_id' => $cartManager->getCart()->id,'email'=>$request->email]);
        session()->flash('message','Compra exitosa, hemos enviado un correo con un resumen de tu compra.');
        return redirect()->route('welcome');
    }
}
