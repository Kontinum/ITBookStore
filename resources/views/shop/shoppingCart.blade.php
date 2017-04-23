@extends('layouts.master')

@section('title')
    Shopping cart
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
            Your shopping cart</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <ul class="list-group">
                @foreach($items as $item)
                    <li class="shopping-cart-list list-group-item">
                       <div class="row">
                           <div class="col-lg-4">
                               <img style="width: 125px" src="{{$item['item']->picture}}" alt="">
                           </div>
                           <div class="col-lg-4">
                               <p>
                                   Quantity:&nbsp;
                                   <a style="text-decoration: none" href="" title="Decrease quantity for one">
                                       <button class="btn btn-success">
                                           <i class="fa fa-minus" aria-hidden="true"></i>
                                       </button>
                                   </a>&nbsp;
                                   <span class="shopping-cart-quantity">
                                       {{$item['qty']}}
                                   </span>&nbsp;&nbsp;
                                   <a href="" title="Increase quantity for one">
                                       <button class="btn btn-success">
                                           <i class="fa fa-plus" aria-hidden="true"></i>
                                       </button>
                                   </a>
                               </p>
                           </div>
                           <div class="col-lg-4">
                               <p class="pull-right">
                                   Price: <span class="shopping-cart-price">{{$item['price']}}$</span>
                               </p>
                           </div>
                       </div>
                    </li>
                @endforeach
            </ul>
            <hr>
            <ul class="list-group">
                <li class="list-group-item clearfix">
                    <p class="pull-left">Total price: <span class="shopping-cart-price">{{$totalPrice}}$</span></p>
                    <a href="" class="pull-right">
                        <button class="btn btn-success">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>    Checkout
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
