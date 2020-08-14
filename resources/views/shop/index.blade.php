@extends('layouts.app')

@section('title')
     Shopping
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('succesRegister'))
        <div class="charge-message">
            {{\Illuminate\Support\Facades\Session::get('succesRegister')}}
        </div>
      @endif
    @if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="charge-message">
        {{\Illuminate\Support\Facades\Session::get('success')}}
    </div>
    @endif
    @foreach($pizzas as $pizza)
    <div class="row">
        <div class="caption">
            <h3 class="pizzaTitle">{{$pizza->title}}</h3>
            <p class="pizzaDescripton" style="font-size:2vw;" class="pizzaDescripton">{{$pizza->description}}</p>
        </div>
            <div class="addToCart">
                <spam class="priceSpam">{{$pizza->price}}$</spam>  <spam class="priceSpam">{{number_format($pizza->price * $eur,2,'.','')}}EU</spam>  <a href="{{ route('pizza.addToCart',['id' => $pizza->id]) }}" class="btn btn-xs btn-info pull-right">Add to cart</a>
            </div>
        </div>

    </div>

    @endforeach



    <div class="row">
        <div class="col-12 text-center">
            {{$pizzas->links()}}
        </div>
    </div>
@endsection
