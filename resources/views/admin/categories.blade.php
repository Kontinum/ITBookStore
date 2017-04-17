@extends('layouts.master')

@section('title')
    Categories panel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Categories: <i class="search-count">{{count($categories)}}</i></p>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Manage categories and subcategories
                </div>
                <div class="panel-body">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Add new category
                        </div>
                        <div class="panel-body">
                            <form action="{{route('addCategory')}}" method="post">
                                <div class="form-group">
                                    <input type="text" name="category-name" value="{{old('category-name')}}" class="form-control" placeholder="Category name" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">Add category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection