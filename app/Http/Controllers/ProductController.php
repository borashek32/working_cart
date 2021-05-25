<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();

        return view('products.products', compact('products'));
    }

    public function product($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.one-product', compact('product'));
    }
}
