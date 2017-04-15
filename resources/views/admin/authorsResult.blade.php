@extends('layouts.master')

@section('title')
    Authors search
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Search results for: <i class="search-count">{{$authorName}}</i></p>
            <hr>
            @include('partials.searchAuthorsForm')
        </div>
        @include('partials.authorsList')
    </div>
@endsection