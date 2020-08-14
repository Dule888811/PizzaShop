<?php


namespace App\Repositories;


use App\Order;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function UserOrders()
    {
        $orders = Order::select('*')
            ->where('contact_details',Auth::user()->contact_details)->get();
        return $orders;
    }
}
