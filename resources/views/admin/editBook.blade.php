@extends('layouts.master')

@section('title')
    Edit author: {{$book->name}}
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Book: <i class="search-count">{{$book->name}}</i></p>
            <hr>
            <div class="panel panel-success">
                <div class="panel-heading">Edit book</div>
                <div class="panel-body">
                    <form action="{{route('postEditBook', ['bookId' => $book->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="book-isbn" value="{{$book->isbn}}" placeholder="Book ISBN" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="book-name" value="{{$book->name}}" placeholder="Book name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="book-year" value="{{$book->year}}" placeholder="Book year" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea name="book-description" rows="5" class="form-control" placeholder="Book description">{{$book->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <select style="width: 100%" name="book-categories[]" multiple class="form-control books-categories" required>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}"
                                    @foreach($book->subcategories as $subcategory2)
                                        @if($subcategory->id == $subcategory2->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select style="width: 100%" name="book-authors[]" multiple class="form-control books-authors" required>
                                @foreach($authors as $author)
                                    <option value="{{$author->name}}"
                                    @foreach($book->authors as $author2)
                                        @if($author->id == $author2->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="book-price" value="{{$book->price}}" placeholder="Book price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="book-picture" value="{{$book->picture}}" placeholder="Book picture" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="book-pages" value="{{$book->pages}}" placeholder="Book pages" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">Edit book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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