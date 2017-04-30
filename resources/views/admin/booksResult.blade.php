@extends('layouts.master')

@section('title')
    Books search
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Search results for: <i class="search-count">{{$bookName}}</i></p>
            <hr>
            @include('partials.searchBooksForm')
        </div>
    </div>
    <div class="row">
        @if(!count($books))
            <div class="row">
                <div class="alert alert-danger col-lg-8 col-lg-offset-2">
                    There aro no books with that name.
                </div>
            </div>
        @else
            @include('partials.booksListAdmin')
        @endif

    </div>
@endsection