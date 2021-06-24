<?php

namespace App\Http\Livewire;

use App\Models\CartManager;
use App\Models\ShoppingCart;
use Livewire\Component;

class Checkout extends Component
{
    public ShoppingCart $cart;

    public function mount(CartManager $cartManager){
        $this->cart = $cartManager->getCart();
    }
    
    public function render()
    {
        return view('livewire.checkout',[
            'products' => $this->cart->products
        ])->extends('layouts.app')->section('content');
    }

    public function deleteProduct(CartManager $cartManager,$productId){
        $cartManager->deleteProduct($productId);
        session()->flash('message','Producto removido');
    }
}
