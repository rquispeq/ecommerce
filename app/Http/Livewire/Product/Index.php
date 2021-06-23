<?php

namespace App\Http\Livewire\Product;

use App\Models\CartManager;
use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public function addToCart(CartManager $cartManager,$producId){
        $cartManager->addToCart($producId);
        $this->emitTo('cart','refreshAmount');
        session()->flash('message','Producto agregado al carrito :)');
    }

    public function render()
    {
        return view('livewire.product.index',[
            'products' => Product::all()
        ]);
    }
}
