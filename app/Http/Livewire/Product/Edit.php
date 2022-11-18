<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public Product $product;

    protected $rules = [
        'product.name' => 'required',
        'product.price' => 'required',
        'product.stock' => 'required',
    ];

    public function update()
    {
         $this->validate();

         $this->product->save();
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
