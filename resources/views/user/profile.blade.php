@extends('layouts.master')

@section('title')
    {{auth()->user()->username}} profile
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p><i class="search-count">{{auth()->user()->username}}</i> profile</p>
        </div>
    </div>
@endsection