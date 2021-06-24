<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paypal;
use App\Models\CartManager;

class PaymentController extends Controller
{
    public function paypalPaymentRequest(CartManager $cartManager, Paypal $paypal){
        return redirect()->away($paypal->paymentRequest($cartManager->getAmount()));
    }

    public function paypalCheckout(){

    }
}
