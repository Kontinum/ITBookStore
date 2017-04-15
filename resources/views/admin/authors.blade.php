@extends('layouts.master')

@section('title')
    Authors panel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Authors: <i>{{count($authors)}}</i></p>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Add new author
                </div>
                <div class="panel-body">
                    <form action="{{route('addAuthor')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="author-name" value="{{old('author-name')}}" class="form-control" placeholder="Author name" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn bg-primary pull-right">Add author</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('partials.searchAuthorsForm')
        </div>
    </div>
@endsection