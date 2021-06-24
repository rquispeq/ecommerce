<?php

namespace App\Http\Livewire;

use App\Models\CartManager;
use Livewire\Component;

class Checkout extends Component
{
    public $cart;

    public function mount(CartManager $cartManager){
        $this->cart = $cartManager->getCart();
    }
    public function render()
    {
        return view('livewire.checkout',[
            'products' => $this->cart->products
        ])->extends('layouts.app')->section('content');
    }
}
