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
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="category-name" value="{{old('category-name')}}" class="form-control" placeholder="Category name" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">Add category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item list-group-item-success">
                                {{$category->name}}
                                <span class="badge">{{count($category->subcategories)}}</span>
                            </li>
                            <ul class="list-group">
                                @foreach($category->subcategories as $subcategory)
                                    <li class="list-group-item">
                                        {{$subcategory->name}}
                                        <a href="{{route('deleteSubcategory',['subcategoryId' => $subcategory->id])}}" title="Delete subcategory" class="pull-right">
                                            <i class="fa fa-trash icon" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endforeach
                                    <li class="list-group-item clearfix">
                                        <form action="{{route('addSubcategory',['categoryId' => $category->id])}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="text" name="subcategory-name" value="{{old('subcategory-name')}}" class="form-control" placeholder="Subcategory name" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success pull-right">Add subcategory</button>
                                            </div>
                                        </form>
                                    </li>
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection