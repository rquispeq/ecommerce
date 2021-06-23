<?php

namespace App\Http\Livewire;

use App\Models\CartManager;
use Livewire\Component;

class Cart extends Component
{
    public $cart;

    public function  mount(CartManager $cartManager){
        $this->cart = $cartManager->getCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
