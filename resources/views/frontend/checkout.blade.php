@extends('layouts.home')
@section('contnet')
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content" id="showchecko">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    {{-- <form >
                        @csrf
                        <input type="text"  class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form> --}}
                </div><!-- End .checkout-discount -->
                <form enctype="multipart/form-data"  id="formcheckout" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" style="font-size:16px;" name="fname" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" style="font-size:16px;" name="lname" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" style="font-size:16px;" name="compny_name" class="form-control" required>

                                <label>Country *</label>
                               
                                <select name="country_id" style="font-size:16px;" class="form-control" id="country_idd">
                                    @php
                                        $countrys = App\Models\Country::all();
                                    @endphp
                                    @foreach ($countrys as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <label>Street address *</label>
                                <input type="text" style="font-size:16px;" name="address" class="form-control" placeholder="House number and Street name" required>
                                <br>
                                <label>Street address2 *</label>
                                <input type="text" style="font-size:16px;" name="address2" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Town / City *</label>
                                        <div id="showcitycoun">
                                        @include('frontend.cityfeath')
                                    </div><!-- End .col-sm-6 -->
                                    </div>
                                    <div class="col-sm-12">
                                   
                                    <label>State / County *</label>
                                    <div id="showconfrty">
                                        @include('frontend.featchstate')
                                    </div>
                                   </div>
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" style="font-size:16px;" name="postcode" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-12">
                                        <label>Phone *</label>
                                        <input type="tel" style="font-size:16px;" name="phone" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" style="font-size:16px;" name="email" class="form-control" required>
                                <label>Order notes (optional)</label>
                                <textarea name="note" style="font-size:16px;" class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                <br>
                                <img id="lodder" style="display: none;" src="{{asset('admin_panel/loading-gif.gif')}}" width="100" height="100" alt="">
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $subtotal=0;
                                        @endphp
                                        @foreach($cartcontenns as $cartcontenn)
                                        @php
                                           $subtotal =  $cartcontenn->price * $cartcontenn->qty;
                                        @endphp
                                        <tr>
                                            <td><a href="{{route('prodctdatils',$cartcontenn->id)}}">{{$cartcontenn->name}}</a></td>
                                            <td>L.E{{$cartcontenn->price}}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            
                                            <td>L.E{{$subtotal}}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>L.E{{$carttotal}}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->
                                <button type="button" id="addnewcheckout" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','#addnewcheckout',function(e){
    e.preventDefault();
    $('#lodder').show();
    var formdata = new FormData($('#formcheckout')[0]);
    $.ajax({
        type:"post",
        url:"/checkoutstroes",
        data:formdata,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#lodder').hide('1000');
                $('#showchecko').load(location.href +  " #showchecko");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.reload();
            }
        }

    })
})
$(document).on('change','#country_idd',function(e){
    e.preventDefault();
var offercountry = $(this).val();

$.ajax({
    type:"get",
    url:"/featchstates/"+offercountry,
    dataType:"html",
    success:function(res)
    {
        if(res)
        {
            $('#showconfrty').html(res);
        }
    }
});
});
$(document).on('change','#state_idd',function(e){
   e.preventDefault();
    var offercityfe = $(this).val();
    $.ajax({
        type:"get",
        url:"/cityfeaths/"+offercityfe,
        dataType:"html",
        success:function(res)
        {
            if(res)
            {
                $('#showcitycoun').html(res);
            }
        }
    })
})
        });
    </script>





<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
@endsection