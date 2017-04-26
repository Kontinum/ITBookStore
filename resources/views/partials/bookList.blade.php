@foreach($books as $book)
    <div class="col-lg-9 col-lg-offset-1">
        <div class="row">
            <div class="media">
                <div class="media-left col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <a href="{{route('book',['bookId' => $book->id])}}">
                        <img class="media-object img-responsive" src="{{$book->picture}}" alt="{{$book->name}} picture">
                    </a>
                </div>
                <div class="media-body">
                    <a style="text-decoration: none" href="{{route('book',['bookId' => $book->id])}}"><h4 class="media-heading"><em style="font-weight: bold">{{$book->name}}</em></h4></a>
                    By:@foreach($book->authors as $author)
                        <a href="{{route('authorBooks',['name' => $author->name])}}">{{$author->name}}</a>
                        @if($loop->remaining)
                            , &nbsp;
                        @endif
                    @endforeach<br><br>
                    <span class="">{{substr($book->description,0,500)}}...</span>
                    <br><br>
                    Price:<em class="book-price">{{$book->price}}$</em>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endforeach