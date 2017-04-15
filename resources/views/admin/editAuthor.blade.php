@extends('layouts.master')

@section('title')
    Edit author: {{$author->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Author: <i class="search-count">{{$author->name}}</i></p>
            <hr>
            <div class="panel panel-success">
                <div class="panel-heading">Edit author</div>
                <div class="panel-body">
                    <form action="{{route('postEditAuthor',['authorId' => $author->id])}}" method="post">
                        <div class="form-group">
                            <input type="text" name="author-name" value="{{$author->name}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">Edit author</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection