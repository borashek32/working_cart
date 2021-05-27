<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Services\PaypalService;
use Cart;

class PayPalController extends Controller
{
    public function getExpressCheckout(Request $request)
    {
        $cartProducts = array_map(function ($product) {
            return [
                'name'       => $product['name'],
                'price'      => $product['price'],
                'quantity'   => $product['qty']
            ];
        }, Cart::content()->toArray());

        $checkoutData = [
            'items' => $cartProducts,
            'return_url' => route('paypal.success'),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Order description",
            'total' => Cart::total()
        ];

        $provider = new ExpressCheckout();

        $response = $provider->setExpressCheckout($checkoutData);
        dd($response);
        return redirect($response['paypal_link']);
    }

    public function cancelPage()
    {
        dd('payment failed');
    }
}
