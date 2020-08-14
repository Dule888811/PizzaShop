<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface CartRepositoryInterFace
{
    public function newCart();
    public function postCheckout(Request $request,$cart);
}
