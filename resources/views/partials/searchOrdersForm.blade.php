<div class="panel panel-primary">
    <div class="panel-heading">
        Search orders
    </div>
    <div class="panel-body">
        <form action="{{route('searchOrders')}}" method="get">
            <div class="form-group">
                <input type="text" name="order-id" value="{{old('order-id')}}" class="form-control" placeholder="Order payment ID" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Search</button>
            </div>
        </form>
    </div>
</div>