<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {

        $cart = Cart::session()->first();

        $prices = $cart->courses->pluck('stripe_price_id')->toArray();
        

        return  Auth::user()->checkout($prices);

       
        
    }
}
