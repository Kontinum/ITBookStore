@extends('layouts.master')

@section('title')
    Unchecked orders
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Orders panel - Unchecked orders</p>
            <hr>
            @include('partials.searchOrdersForm')
            <hr>
            <div class="text-center">
                <a style="text-decoration: none" href="">
                    <button class="btn btn-primary">Checked orders</button>
                </a>
                <a href="">
                    <button class="btn btn-primary">Delivered orders</button>
                </a>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            @foreach($orders as $order)
                <div class="panel panel-success">
                    <div class="panel-heading clearfix">
                        <em>
                            Name: <span class="search-count">{{$order->name}}</span> |
                            Address: <span class="search-count">{{$order->address}}</span> |
                            Date: <span class="search-count">{{$order->created_at}}</span>
                        </em>
                        <button class="btn btn-success pull-right">
                            <i class="fa fa-check" aria-hidden="true"></i> Check
                        </button>
                    </div>
                    <div class="panel-body">
                        @foreach($order->cart->items as $item)
                            <li class="list-group-item clearfix">
                                <em>
                                    <span class="search-count">
                                        {{$item['item']->name}}
                                    </span>
                                    <span class="pull-right">
                                        Quantity: <span class="search-count">
                                        {{$item['qty']}}
                                        </span> |
                                    Price: <span class="search-count">
                                        {{$item['price']}}
                                        </span>
                                    </span>
                                </em>
                            </li>
                        @endforeach
                    </div>
                    <div class="panel-footer clearfix">
                        <em class="pull-left">
                            Payment ID: <span class="search-count">{{$order->payment_id}}</span>
                        </em>
                        <em class="pull-right">
                            Total price: <span class="search-count">{{$order->cart->totalPrice}}$</span>
                        </em>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection