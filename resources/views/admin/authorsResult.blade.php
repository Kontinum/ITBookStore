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
    </div>
    <div class="row">
        @if(!count($authors))
            <div class="row">
                <div class="alert alert-danger col-lg-8 col-lg-offset-2">
                    There aro no authors with that name.
                </div>
            </div>
        @else
            @include('partials.authorsList')
        @endif

    </div>
@endsection