@extends('layouts.master')

@section('title')
    ITBookStore
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2><i class="fa fa-book icon" aria-hidden="true"></i> Popular IT Books</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-8 col-md-8 col-sm-8 ">
        </div>
    </div>
            @foreach($popularBooks->chunk(4) as $popularBookChunk)
                <div class="row">
                    @foreach($popularBookChunk as $popularBook)
                        <div class="col-lg-3 col-md-3 col-sm-6 clearfix">
                            <div class="thumbnail book-thumbnail">
                                <img class="img-responsive book-cover" src="{{$popularBook->picture}}" alt="{{$popularBook->name}} book cover">
                                <div class="caption">
                                    <h4 class="book-name">{{$popularBook->name}}</h4>
                                    <p>
                                        <em class="book-price">{{$popularBook->price}}$</em>
                                        <a href="" class="btn btn-success pull-right" role="button" title="Add to cart">
                                            <i class="fa fa-lg fa-cart-plus" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
    <div class="row">
        <div class="col-lg-12">
            <h2><i class="fa fa-book icon" aria-hidden="true"></i> New IT Books</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-8 col-md-8 col-sm-8 ">
        </div>
    </div>
    @foreach($newBooks->chunk(4) as $newBookChunk)
        <div class="row">
            @foreach($newBookChunk as $newBook)
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="thumbnail book-thumbnail">
                        <img class="img-responsive book-cover" src="{{$newBook->picture}}" alt="{{$newBook->name}} book cover">
                        <div class="caption">
                            <h4 class="book-name">{{$newBook->name}}</h4>
                            <p>
                                <em class="book-price">{{$newBook->price}}$</em>
                                <a href="" class="btn btn-success pull-right" role="button" title="Add to cart">
                                    <i class="fa fa-lg fa-cart-plus" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection