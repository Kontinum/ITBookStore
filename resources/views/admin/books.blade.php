@extends('layouts.master')

@section('title')
    Books panel
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Books: <i class="search-count">{{count($books)}}</i></p>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Add new book
                    <i style="line-height: 20px;cursor: pointer" class="addbook-toggle fa fa-arrow-down pull-right" aria-hidden="true"></i>
                </div>
                <div class="addbook-form panel-body">
                    <form action="{{route('addBook')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group col-lg-4">
                            <input type="text" name="book-isbn" value="{{old('book-isbn')}}" placeholder="Book ISBN" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" name="book-name" value="{{old('book-name')}}" placeholder="Book name" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" name="book-year" value="{{old('book-year')}}" placeholder="Book year" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="book-description" rows="5" class="form-control" placeholder="Book description">{{old('book-description')}}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <select style="width: 100%" name="book-categories[]" multiple class="form-control books-categories" required>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <select style="width: 100%" name="book-authors[]" multiple class="form-control books-authors" required>
                                @foreach($authors as $author)
                                    <option value="{{$author->name}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" name="book-price" value="{{old('book-price')}}" placeholder="Book price" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" name="book-picture" value="{{old('book-picture')}}" placeholder="Book picture" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" name="book-pages" value="{{old('book-pages')}}" placeholder="Book pages" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Add book</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        @include('partials.booksList')
    </div>
@endsection

@section('scripts')
    <script>
        $('.books-categories').select2({
            placeholder: "Select up to 3 book categories",
            maximumSelectionLength: 3
        });
        $('.books-authors').select2({
            placeholder: "Select or add up to 3 book authors",
            maximumSelectionLength: 3,
            tags: true
        });
    </script>
@endsection