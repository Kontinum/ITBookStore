@extends('layouts.master')

@section('title')
    {{$book->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2><i class="fa fa-book icon" aria-hidden="true"></i> {{$book->name}}</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-lg-offset-0 col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2">
            <img style="width: 100%" src="{{$book->picture}}" alt="">
        </div>
        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-0 col-sm-4">
            Author(s):
            @foreach($book->authors as $author)
                <a style="text-decoration: none" href="">{{$author->name}}</a>
                @if($loop->remaining)
                    , &nbsp;
                @endif
            @endforeach
            <br><br>
            ISBN: {{$book->isbn}} <br><br>
            Year: {{$book->year}} <br><br>
            Pages: {{$book->pages}} <br><br>
            Categories:
            @foreach($book->subcategories as $subcategory)
                <a style="text-decoration: none" href="">{{$subcategory->name}}</a>
                @if($loop->remaining)
                    , &nbsp;
                @endif
            @endforeach
            <br><br>
            Price: <em class="book-price col">{{$book->price}}$</em><br><br>
            <a href="" class="">
                <button class="btn btn-success">
                    <i class="fa fa-lg fa-cart-plus" aria-hidden="true"></i> Add to cart
                </button>
            </a>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            Description:<br><br>
            <p style="font-size: 100%;line-height:1.3">{{$book->description}}</p>
        </div>
    </div>
@endsection
