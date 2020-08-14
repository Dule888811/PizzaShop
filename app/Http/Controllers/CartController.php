<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Pizza;
use App\Repositories\CartRepository;
use App\Repositories\CartRepositoryInterFace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class CartController extends Controller
{

        public $eur;
        private $cartRepository;
        public function __construct(CartRepositoryInterFace $cartRepository)
        {
            $this->eur = Cart::getEur();
            $this->cartRepository = $cartRepository;
        }

    public function addToCart( Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $cart = $this->cartRepository->newCart();
        $cart->add($pizza,$pizza->id);
        $request->session()->put('cart',$cart);
        return redirect()->route('shop');
    }

    public function getCart()
    {
        if(!Session::has('cart'))
        {
            return view('shop.shopping-cart');
        }
        $cart = $this->cartRepository->newCart();
        return view('shop.shopping-cart',['pizzas' => $cart->getPizzas(),'totalPrice' => $cart->getTotalPrice(),'eur' => $this->eur]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart'))
        {
            return view('shop.shopping-cart');
        }
        $cart = $this->cartRepository->newCart();
        $total = $cart->getTotalPrice();
        return view('shop.checkout',['total' => $total,'eur' => $this->eur] );
    }

    public function postCheckout(Request $request)
    {
        //   dd($request->input('stripeToken'));
        if(!Session::has('cart'))
        {
            return view('shop.shopping-cart');
        }
        $cart = $this->cartRepository->newCart();
        Stripe::setApiKey('sk_test_51HEyYwLFDii7jivEAXHfnQYARrZT7P1Gx8CTBsKUD9hbgjqHrhyc4tK4CRGSck65J5pu9ZlmGsiIF3K4cN2O7mmi00HbKwtspF');
        try{
            $this->cartRepository->postCheckout( $request,$cart);

        }catch (\Exception $e)
        {
            return redirect()->route('checkout')->with('error' , $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('shop')->with('success',' successfully purchased products');

    }

    public function getReduceByOne($id)
    {
        $cart = $this->cartRepository->newCart();
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
        if(count($cart->getPizzas()) > 0){
            Session::put('cart',$cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->route('Cart');
    }
}
