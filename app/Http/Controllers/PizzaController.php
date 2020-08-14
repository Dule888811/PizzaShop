<?php

namespace App\Http\Controllers;

use App\Order;
use App\Pizza;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $eur = Cart::getEur();
        $pizzas = Pizza::paginate(8);
        return view('shop.index',compact('pizzas','eur'));
    }



}
