<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $price_max;
    public $price_min;
    public $stock_max;
    public $stock_min;

    public function render()
    {
        $products = Product::when($this->search, function ($query) {
            return $query->where('name', 'ilike', '%' . $this->search . '%');
        })
            ->when($this->price_max, function ($query) {
                return $query->where('price', '<=', $this->price_max);
            })
            ->when($this->price_min, function ($query) {
                return $query->where('price', '>=', $this->price_min);
            })
            ->when($this->stock_max, function ($query) {
                return $query->where('stock', '<=', $this->stock_max);
            })
            ->when($this->stock_min, function ($query) {
                return $query->where('stock', '>=', $this->stock_min);
            })
            ->paginate(12);

        return view('livewire.product.index', [
            'products' => $products
        ]);
    }
}
