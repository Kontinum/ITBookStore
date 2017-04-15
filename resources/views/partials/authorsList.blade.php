<div class="col-lg-12">
    <ul class="list-group">
        @foreach($authors as $author)
            <li class="list-group-item list-group-item-success col-lg-3 col-md-4 col-sm-6">
                {{$author->name}}
                <a href="{{route('deleteAuthor',['authorId' => $author->id])}}" class="pull-right" title="Delete author">
                    <i class="fa fa-trash icon list-icon" aria-hidden="true"></i>
                </a>
                <a href="" class="pull-right" title="Edit author">
                    <i class="fa fa-pencil-square-o icon" aria-hidden="true"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>