@extends('layouts.master')

@section('title')
    {{auth()->user()->username}} profile
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><i class="fa fa-user icon" aria-hidden="true"></i> <em class="search-count"> {{auth()->user()->username}}</em> profile</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <a style="text-decoration: none" href="">
                <button class="btn btn-primary">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>    Edit profile
                </button>
            </a>
            <a style="text-decoration: none" href="{{route('getChangePassword')}}">
                <button class="btn btn-primary">
                    <i class="fa fa-key" aria-hidden="true"></i> Change password
                </button>
            </a>
            <a href="">
                <button class="btn btn-primary">
                    <i class="fa fa-list" aria-hidden="true"></i> View orders
                </button>
            </a>
        </div>
    </div>
@endsection