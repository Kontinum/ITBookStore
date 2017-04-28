@extends('layouts.master')

@section('title')
    {{auth()->user()->username}} profile
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><i class="fa fa-list icon" aria-hidden="true"></i> <em class="search-count"> {{auth()->user()->username}}</em> orders</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <em>
                            Name: <span class="search-count">{{$order->name}}</span> |
                            Address: <span class="search-count">{{$order->address}}</span> |
                            Date: <span class="search-count">{{$order->created_at}}</span>
                        </em>
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
                        <em class="pull-right">
                            Total price: <span class="search-count">{{$order->cart->totalPrice}}$</span>
                        </em>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection