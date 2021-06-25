<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CompleteOrderController extends Controller
{
    function completeForm(Order $order,Request $request){
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        return view('complete');
    }

    function completeOrder(Order $order){

    }
}
