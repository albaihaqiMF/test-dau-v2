<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $transations = Transaction::paginate(20);
        return view('livewire.transaction.index', [
            'transactions' => $transations
        ]);
    }
}
