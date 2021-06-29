<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class Edit extends Component
{
    public Product $product;
    use WithFileUploads;
    // public $name,$price,$description,$thumbnail;
    public $data;
    public $newThumbnail;

    public function mount(Product $product){
        $this->product = $product;
        $this->data = $product->toArray();
    }

    public function save(){

        $validate = $this->validate([
            'data.slug' => 'required',
            'data.name' => 'required',
            'data.price' => 'required|numeric',
            'data.description' => 'required',
            'newThumbnail' => 'image|max:1024'
        ]);

        $validate['data']['thumbnail'] = $this->newThumbnail->store('photos');
        
        $product = Product::where('slug', $validate['data']['slug'])->get()->first();
        $product->name = $validate['data']['name'];
        $product->price = $validate['data']['price'];
        $product->description = $validate['data']['description'];
        $product->thumbnail = $validate['data']['thumbnail'];
        $product->save();
        session()->flash('message','Producto actualizado.');
        // return redirect('');
    }


    public function render()
    {
        return view('livewire.product.edit')->extends('layouts.app')->section('content');
    }
}

