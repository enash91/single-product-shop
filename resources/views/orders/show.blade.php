@extends('template')

@section('content')
    <h3>Order: #{{  $order->id  }} @if(!empty($order->payment)) <small>Paid</small>@endif</h3>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jordan 1 Retro High
                    Off-White University Blue
                </td>
                <td>190</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->quantity * 190}}</td>
            </tr>
        </tbody>
    </table>

    @if(empty($order->payment))
        <div class="col-md-12">
            <div class="col-md-12" id="paypal-button-container"></div>
        </div>

        <script>let order_id="@php echo $order->id @endphp"</script>
        <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID')  }}"></script>
        <script type="text/javascript" src="{{ asset('js/paypalBtn.js') }}"></script>
    @endif

@endsection
