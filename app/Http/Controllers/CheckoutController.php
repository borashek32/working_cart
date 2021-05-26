<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shipment()
    {
        return view('cart.shipment');
    }
}
