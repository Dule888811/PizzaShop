<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $eur = Cart::getEur();
        $orders = $this->userRepository->UserOrders();
      //  $orders = Order::select('*')
      //  ->where('contact_details',Auth::user()->contact_details)->get();
       return view('user.profile')->with(['orders' => $orders,'eur'=>$eur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
