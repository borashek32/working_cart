<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
    public function store()
    {
        return view('cart.index');
    }
}
