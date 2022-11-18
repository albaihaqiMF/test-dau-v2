<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $quantity;
    public $product;

    protected $rules = [
        'quantity' => 'required|numeric',
        'product' => 'exists:products,id',
    ];

    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }
    public function create()
    {
        $this->validate();
        // $user = User::find(auth()->user()->id);

        $product = Product::find($this->product);

        auth()->user()->transactions()->create([
            'quantity'  => $this->quantity,
            'price'     => $product->price,
            'total_price' => $product->price * $this->quantity,
            'product_id' => $product->id,
        ]);

        return redirect()->route('transaction.index');
    }
    public function render()
    {
        return view('livewire.transaction.create');
    }
}
