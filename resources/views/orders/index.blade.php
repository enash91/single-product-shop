@extends('template')

@section('content')
    <h3>Orders</h3>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
        <tr>
            <th rowspan="2">#</th>
            <th rowspan="2">ID</th>
            <th colspan="4">Details</th>
            <th colspan="2">Shipping</th>
            <th rowspan="2">&nbsp;</th>
        </tr>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Recipient</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>

        @php $i=0; @endphp
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->id }}</td>
                <td>Jordan 1 Retro High
                    Off-White University Blue
                </td>
                <td>$ {{ $order->price }}</td>
                <td>{{$order->quantity}}</td>
                <td>$ {{ $order->price * $order->quantity}}</td>
                <td>{{$order->recipient}}</td>
                <td>{{$order->address_line_1}} {{$order->address_line_2}}
                    {{$order->admin_area_2}} {{$order->admin_area_1}}
                    {{$order->postal_code}} {{$order->country_code}}
                </td>
                <td>
                    @if(empty($order->payment))
                        <a href="/orders/{{ $order->id }}">Pay</a>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection