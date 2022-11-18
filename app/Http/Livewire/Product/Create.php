<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $price;
    public $stock;

    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'stock' => 'required',
    ];

    public function create()
    {
        $attr = $this->validate();

        Product::create($attr);

        return redirect()->route('product.index');
    }
    public function render()
    {
        return view('livewire.product.create');
    }
}
