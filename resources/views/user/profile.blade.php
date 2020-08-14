@extends('layouts.app')
@section('content')
    <div class="user-orders">
        <h2>{{\Illuminate\Support\Facades\Auth::User()->name}}</h2>
        <hr class="li-orders">

        @if(count($orders) > 0)
            <h2>My orders</h2>

            @foreach($orders as $order)

            <div class="orederWrapper">
                <div class="panel-body">
                    <ul class="list-group">

                        @foreach(unserialize($order->cart)->getPizzas() as $pizza)
                        <li class="list-group-item">
                                <h4> {{$pizza['pizza']['title']}}</h4>
                            <spam class="badge">quantity : {{$pizza['qty']}}</spam>
                            <spam class="badge">$ {{$pizza['price']}}</spam>
                            <spam class="badge">EUR {{  number_format($pizza['price'] * $eur,2,'.','')}}</spam>
                        </li>

                        @endforeach
                    </ul>
                </div>
                <br class="panel-footer">
                    <strong>Total price: $ {{unserialize($order->cart)->getTotalPrice()}}</strong></br>
                    <strong>Total price: EUR {{number_format(unserialize($order->cart)->getTotalPrice() * $eur,2,'.','')}} </strong>

                </div>
                @endforeach
            </div>
        @else
        <h2>No orders yet</h2>
        @endif
    </div>
@endsection
