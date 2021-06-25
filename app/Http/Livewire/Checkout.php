<?php

namespace App\Http\Livewire;

use App\Models\CartManager;
use App\Models\ShoppingCart;
use Livewire\Component;

class Checkout extends Component
{
    public ShoppingCart $cart;
    public $stripeKey;

    public function mount(CartManager $cartManager){
        $this->stripeKey = config('services.stripe.key');
        $this->cart = $cartManager->getCart();
    }
    
    public function render()
    {
        return view('livewire.checkout',[
            'products' => $this->cart->products
        ])->extends('layouts.app')->section('content');
    }

    public function hydrate(){
        $this->cart = (app(CartManager::class))->getCart();
    }

    public function deleteProduct(CartManager $cartManager,$productId){
        $cartManager->deleteProduct($productId);
        $this->emitTo('cart','refreshAmount');
        session()->flash('message','Producto removido');
    }
}
