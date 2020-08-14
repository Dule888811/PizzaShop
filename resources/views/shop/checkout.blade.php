@extends('layouts.app')

@section('title')
    Checkout
@endsection
@section('content')
    <div class="checkout">
        <h2>Checkout</h2>
        <h4>Your total : {{$total}}$</h4>
        <h4>Your total : {{number_format($total * $eur,2,'.','')}}EUR</h4>
        <div id="charge-error" class="alert alert-danger {{!\Illuminate\Support\Facades\Session::has('error') ? 'hidden' : ''}}">
            {{\Illuminate\Support\Facades\Session::get('error')}}
        </div>
        <form action="{{'checkout'}}" method="post" id="checkout-form">
            <div class="form-group">
                <label for="address"> Address</label>
                <input type="text" id="address_user" name="address" class="form-control address"  placeholder="Enter address" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your ddress with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="contact_details">Contact details</label>
                <input type="text" id="user_contact_details" name="contact_details" class="form-control" placeholder="Enter contact details" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your contact details with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="card_holdem_number">Card holdem number</label>
                <input type="text" id="card_name"  class="form-control address"  placeholder="Enter card holdem number" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your card holdem number with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="card_number">Credit card number</label>
                <input type="text" id="card_number" class="form-control"   placeholder="Enter credit card number" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your credit card number with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="expiration_month">Expiration month</label>
                <input type="text" id="card-expiry-month" class="form-control address"   placeholder="Enter expiration month" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your expiration month with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="address">expiration year</label>
                <input type="text" id="expiration_year" class="form-control address" placeholder="Enter expiration year" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your expiration year with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="address">CVC</label>
                <input type="text" id="card-cvc" class="form-control address" placeholder="Enter card cvc" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your card cvc with anyone else.</small>
            </div>
            @csrf
            <button type="submit" class="btn btn-success">Buy now</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{\Illuminate\Support\Facades\URL::to('src/js/checkout.js')}}"></script>
@endsection
