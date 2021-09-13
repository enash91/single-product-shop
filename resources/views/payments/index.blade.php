@extends('template')

@section('content')
    <h3>Payments</h3>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
        <tr>
            <th rowspan="2">#</th>
            <th colspan="2">Order</th>
            <th colspan="2">Shipped To</th>
            <th colspan="2">Payment</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Date Ordered</th>
            <th>Recipient</th>
            <th>Address</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>


        @php $i=0 @endphp
        @foreach ($payments as $p)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $p->order->id }}</td>
                <td>{{ $p->order->created_at }}</td>
                <td>{{ $p->order->recipient}}</td>
                <td>{{ $p->order->address_line_1 }} {{ $p->order->address_line_2 }}
                    {{ $p->order->admin_area_2 }} {{ $p->order->admin_area_1 }}
                    {{ $p->order->postal_code }} {{ $p->order->country_code }}
                </td>
                <td>{{ $p->amount }}</td>
                <td>{{ $p->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
