<div class="panel panel-success">
    <div class="panel-heading">Search books</div>
    <div class="panel-body">
        <form action="{{route('searchBooks')}}" method="get">
            <div class="form-group">
                <input type="text" name="book-name" value="{{old('book-name')}}" class="form-control" placeholder="Book name" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">Search books</button>
            </div>
        </form>
    </div>
</div>