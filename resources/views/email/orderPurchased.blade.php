@component('mail::message')
Dear, {{auth()->user()->username}}, <br><br>
You have successfully purchased <strong>{{$order->cart->totalPrice}}$</strong> for next book(s):

<ul>
    @foreach($order->cart->items as $item)
        <li>
            {{$item['item']->name}}
        </li>
    @endforeach
</ul>

@component('mail::button', ['url' => 'http://bookstore.dev/'])
Check out new books
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
