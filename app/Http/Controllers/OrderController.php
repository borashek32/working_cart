<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname'    =>  'required',
            'shipping_address'     =>  'required',
            'shipping_city'        =>  'required',
            'shipping_postcode'    =>  'required',
            'shipping_phone'       =>  'required',
            'payment_method'       =>  'required'
        ]);

        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shipping_fullname     =    $request->input('shipping_fullname');
        $order->shipping_address      =    $request->input('shipping_address');
        $order->shipping_city         =    $request->input('shipping_city');
        $order->shipping_postcode     =    $request->input('shipping_postcode');
        $order->shipping_phone        =    $request->input('shipping_phone');

        if (!$request->has('billing_fullname')) {
            $order->billing_fullname     =    $request->input('shipping_fullname');
            $order->billing_address      =    $request->input('shipping_address');
            $order->billing_city         =    $request->input('shipping_city');
            $order->billing_postcode     =    $request->input('shipping_postcode');
            $order->billing_phone        =    $request->input('shipping_phone');
        }
        else {
            $order->billing_fullname     =    $request->input('billing_fullname');
            $order->billing_address      =    $request->input('billing_address');
            $order->billing_city         =    $request->input('billing_city');
            $order->billing_postcode     =    $request->input('billing_postcode');
            $order->billing_phone        =    $request->input('billing_phone');
        }

        $order->grand_total = Cart::total();
        $order->product_count  = Cart::count();

        $order->user_id = auth()->id();
        $order->status  = 'pending';
        $order->save();

        //save order products
        $cartProducts = Cart::content();
        foreach ($cartProducts as $product)
            $order->products()->attach($product->id);
        //payment method
        if (request('payment_method') == 'paypal') {
            //redirect to paypal
        }
        //empty cart
        Cart::destroy();
        //send email to customer

        //thank you page

        return 'order completed';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
