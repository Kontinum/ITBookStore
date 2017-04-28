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
            @include('partials.ordersPanelButtons')
        </div>
    </div>
@endsection