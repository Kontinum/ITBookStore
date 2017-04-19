<div class="col-lg-12">
    @foreach($books as $book)
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="thumbnail book-thumbnail">
                <img class="img-responsive book-cover" src="{{$book->picture}}" alt="{{$book->name}} book cover">
                <div class="caption">
                    <h4 class="book-name">{{$book->name}}</h4>
                    <p>
                        <a href="#" class="btn btn-primary book-edit-button" role="button">
                            <i class="fa fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-danger book-delete-button pull-right" role="button">
                            <i class="fa fa-trash"></i> Delete</a></p>
                </div>
            </div>
        </div>
    @endforeach
</div>