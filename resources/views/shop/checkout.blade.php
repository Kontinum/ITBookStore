@extends('layouts.master')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><i class="fa fa-credit-card icon" aria-hidden="true"></i>
                Checkout</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form action="{{route('postCheckout')}}" method="post" id="checkout-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name:<span class="required">*</span></label>
                    <input type="text" id="name" name="name" value="{{auth()->user()->name}}" class="form-control user-name" placeholder="Name for shipping" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:<span class="required">*</span></label>
                    <input type="text" id="address" name="address" value="{{auth()->user()->address}}" class="form-control user-eddress" placeholder="Valid address for shipping" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:<span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" value="{{auth()->user()->phone}}" class="form-control user-phone" placeholder="Your phone number" required>
                </div>
                <div class="form-group">
                   <div class="row">
                       <div class="col-lg-6">
                           <label for="card-number">Card number:<span class="required">*</span></label>
                           <input type="text" id="card-number" value="{{auth()->user()->cardnumber}}" class="form-control" placeholder="Valid card number" required>
                       </div>
                       <div class="col-lg-2">
                           <label for="card-expiry-month">Exp month:<span class="required">*</span></label>
                           <input type="number" min="1" max="12" id="card-expiry-month" class="form-control" required>
                       </div>
                       <div class="col-lg-2">
                           <label for="card-expiry-year">Exp year:<span class="required">*</span></label>
                           <input type="number" min="{{date('Y')}}" id="card-expiry-year" class="form-control" required>
                       </div>
                       <div class="col-lg-2">
                           <label for="card-cvc">CVC:<span class="required">*</span></label>
                           <input type="text" maxlength="3" id="card-cvc" class="form-control" placeholder="CVC" required>
                       </div>
                   </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success pull-right">Pay {{$totalPrice}}&dollar;</button>
                </div>
            </form>
        </div>
    </div>
@endsection
