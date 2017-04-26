@extends('layouts.master')

@section('title')
    {{$authorName}} books
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-lg-offset-1">
            <h2><i class="fa fa-book icon" aria-hidden="true"></i> <em class="search-count">{{$authorName}}</em> books</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
        @include('partials.bookList')
    </div>
@endsection