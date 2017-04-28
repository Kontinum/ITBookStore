@extends('layouts.master')

@section('title')
    Orders search
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Order payment ID - <em class="search-count">{{$payment_id}}</em></p>
            <hr>
            @include('partials.searchOrdersForm')
            <hr>
            @include('partials.ordersPanelButtons')
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            @foreach($order as $order)
                <div class="panel panel-success">
                    <div class="panel-heading clearfix">
                        <em>
                            Name: <span class="search-count">{{$order->name}}</span> |
                            Address: <span class="search-count">{{$order->address}}</span> |
                            Date: <span class="search-count">{{$order->created_at}}</span>
                        </em>
                        <span class="pull-right">
                            @if($order->delivered)
                                <em class="search-count">ORDER DELIVERED!</em>
                            @endif
                            @if(!$order->checked)
                                <a href="{{route('checkOrder',['orderId' => $order->id])}}">
                                    <button class="btn btn-success">
                                        <i class="fa fa-check" aria-hidden="true"></i> Check
                                    </button>
                                </a>
                            @endif
                            @if($order->checked && !$order->delivered)
                                <a href="{{route('deliverOrder', ['orderId' => $order->id])}}">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-check" aria-hidden="true"></i> Mark as delivered
                                    </button>
                                </a>
                            @endif
                        </span>
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