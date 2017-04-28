<div class="text-center">
    <a style="text-decoration: none" href="{{route('uncheckedOrders')}}">
        <button class="btn btn-primary {{request()->is('admin/unchecked-orders') ? 'disabled' : ''}}">Unchecked orders</button>
    </a>
</div>