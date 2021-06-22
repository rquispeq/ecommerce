<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public function render()
    {
        return view('livewire.product.index',[
            'products' => Product::all()
        ]);
    }
}
