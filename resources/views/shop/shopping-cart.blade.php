@extends('layouts.app')

@section('title')
    Laravel Shopping Card
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <div class="row">
            <div class="cartItems">
            <ul class="list-group">

            @foreach($pizzas as $pizza)

                        <li class="list-group-item">
                            <strong>{{$pizza['pizza']['title']}}</strong></br>
                            <span class="badge">quantity:{{$pizza['qty']}}</span>
                                <div class="priceItems">
                                <spam clas="label label-success">{{$pizza['price']}}$</spam></br>
                                <spam clas="label label-success">{{number_format($pizza['price'] * $eur,2,'.','')}}EUR</spam></br>
                                    <a href="{{route('pizza.ReduceByOne',['id' => $pizza['pizza']['id']])}}">Reduce by 1</a>
                                </div>
                            </li>




                @endforeach
            </ul>
            </div>
            <div class="TotalPrice">
                <strong>Total: {{$totalPrice}}$</strong><hr>

                <strong>Total: {{number_format($totalPrice * $eur,2,'.','')}}Eur</strong>
            </div>
            <div class="checkoutButton">
                <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>

    @else
        <div class="noItems">
            <h2>No items in cart</h2>
        </div>
    @endif
@endsection
