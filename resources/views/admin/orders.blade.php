@extends('layouts.master')

@section('title')
    Orders panel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Orders panel</p>
            <hr>
            @include('partials.searchOrdersForm')
            <hr>
            <div class="text-center">
                <a style="text-decoration: none" href="">
                    <button class="btn btn-primary">Unchecked orders</button>
                </a>
                <a style="text-decoration: none" href="">
                    <button class="btn btn-primary">Checked orders</button>
                </a>
                <a href="">
                    <button class="btn btn-primary">Delivered orders</button>
                </a>
            </div>
        </div>
    </div>
@endsection