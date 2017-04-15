<div class="panel panel-success">
    <div class="panel-heading">Search authors</div>
    <div class="panel-body">
        <form action="{{route('searchAuthors')}}" method="get">
            <div class="form-group">
                <input type="text" name="author-name" value="{{old('author-name')}}" class="form-control" placeholder="Author name" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">Search authors</button>
            </div>
        </form>
    </div>
</div>