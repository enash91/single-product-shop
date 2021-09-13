@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
            <div class="col-md-8">
                <h3>Jordan 1 Retro High <br/>
                    <small>Off-White University Blue</small></h3>
            </div>
            <div class="col-md-4 text-right">
                <label>Price</label>
                <h3>$ 190.00</h3>
            </div>
            </div>

            <div class="prod-img">
                <img src="https://image.goat.com/crop/1800/attachments/product_template_additional_pictures/images/012/219/525/original/335047_01.jpg.jpeg?1527188497"
                    alt="off white air jordan 1 retro high unc"
                    width="100%"
                />
            </div>

            <div class="mt-3">
                <h5>Product Description</h5>
                <ul>
                    <li>Style: AQ0818-148</li>
                    <li>Colorway: WHITE/DARK POWDER BLUE-CONE</li>
                    <li>Release Date: 06/23/2018</li>
                </ul>
                <p>Time for some Tobacco Road vibes with these Jordan 1 Retro Off-Whites. Also known as the “UNC” editions, these Jordan 1s are the third colorway designed by Virgil Abloh and made in collaboration with his Off-White label. The sneakers come in a white, dark powder blue and cone colorway, with a white and blue deconstructed leather upper and Off-White detailing throughout. If you’re a fan of Virgil Abloh’s work and want to rep Off-White, this pair is another must-have.</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="p-2" style="background: #e2e8f0">
                <h5>Order Details</h5>
                <form method="post" action="{{route('orders.store')}}">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="1" required>
                    </div>

                    <hr/>

                    <h5>Shipping Details</h5>
                    <div class="form-group">
                        <label>Recipient</label>
                        <input type="text" class="form-control" name="recipient" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address_line_1" required>
                        <input type="text" class="form-control" name="address_line_2" required>
                        <input type="text" class="form-control" name="admin_area_2" required>
                        <input type="text" class="form-control" name="admin_area_1" required>
                        <input type="text" class="form-control" name="postal_code" required>
                        <input type="text" class="form-control" name="country_code" minlength="2" maxlength="2" required>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Place Order</button>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
