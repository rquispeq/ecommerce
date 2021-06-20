<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Create extends Component
{
    public $name;
    
    public function render()
    {
        return view('livewire.product.create');
    }
}
