<?php


namespace App\Repositories;


use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

class CartRepository implements CartRepositoryInterFace
{
    public function newCart(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        return new Cart($oldCart);
    }
    public function postCheckout(Request $request,$cart){
        $charge =  Charge::create([
            "amount" => $cart->getTotalPrice() * 100,
            "currency" => "usd",
            "source" => 'tok_mastercard',
            "description" =>"Charge success"
        ]);
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->contact_details = $request->input('contact_details');
        $order->payment_id = $charge->id;
        $order->save();
    }
}
