@extends('layouts.master')

@section('title')
     Search results for: {{$bookName}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-lg-offset-1">
            <h2><i class="fa fa-search icon" aria-hidden="true"></i> <em class="search-count"> {{$bookName}}</em> - {{count($books)}} results</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
        @include('partials.bookList')
    </div>
@endsection