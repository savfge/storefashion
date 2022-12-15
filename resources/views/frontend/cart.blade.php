@extends('layouts.home')
@section('contnet')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
<div class="container">
    <div class="page-content" id="showcartco">
        <div class="cart">
            <div class="container">
                @if($cartcontenns->count() > 0)
                <div class="row">
                    <div class="col-lg-9">
                       
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $subtotl = 0;
                                @endphp
                                @foreach($cartcontenns as $cartcontenn)
                                @php
                                     $subtotl = $cartcontenn->price * $cartcontenn->qty;
                                @endphp
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{route('prodctdatils',$cartcontenn->id)}}">
                                                    <img src="{{asset('admin_panel/img/'.$cartcontenn->options->images)}}"  alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="{{route('prodctdatils',$cartcontenn->id)}}">{{$cartcontenn->name}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">L.E{{$cartcontenn->price}}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity editqtyu{{$cartcontenn->id}}">
                                            <input type="hidden" name="rowId" value="{{$cartcontenn->rowId}}" id="newrowid{{$cartcontenn->id}}">
                                            <input type="number" class="form-control text-center" id="newqty{{$cartcontenn->id}}" value="{{$cartcontenn->qty}}" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">L.E{{$subtotl}}</td>
                                    <td class="remove-col"><button value="{{$cartcontenn->rowId}}" class="btn-remove cartdelete"><i class="icon-close"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                       
                        <div class="cart-bottom">
                           

                            <a style="cursor: pointer" class="btn btn-outline-dark-2 cartdestory"><span>{{__('CLEAR CART')}}</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>L.E{{$cartubtotal}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>L.E{{$carttotal}}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{route('shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
                @else
                <div class="row" style="text-align: center; marging:30px;">
                    <div class="col-md-12 mb-3" >
                        <h1>{{__('Cart Is Empty')}}</h1>
                    </div>
                    <div class="col-md-12 mb-3">
                        <a  href="{{route('shop')}}" class="btn btn-dark">{{__('Containt To Shop')}}</a>
                    </div>
                </div>
                @endif
            </div><!-- End .container -->
        </div><!-- End .cart -->
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
@foreach ($cartcontenns as $item)
    $(document).on('click','.editqtyu{{$item->id}}',function(e){
        e.preventDefault();
        var newQty = $('#newqty{{$item->id}}').val();
        var newrowId = $('#newrowid{{$item->id}}').val();
        $.ajax({
            type:"get",
            url:"/updatecaart",
            data: 'newrowId=' + newrowId + '&newQty=' + newQty,
            success:function(res)
            {
                if(res)
                {
                    $('#showcartco').load(location.href + " #showcartco");
                }
            }
        });
    })
@endforeach
$(document).on('click','.cartdelete',function(e){
    e.preventDefault();
    var aderr =$(this).val();
    $.ajax({
        type:"get",
        url:"/cartdelete/"+aderr,
        data:{
            '_token' : "{{csrf_token()}}",
            'id' : aderr,
        },
        success:function(res)
        {
                if(res)
                {
                    $('#showcartco').load(location.href + " #showcartco");
                }
        }
    });
});
$(document).on('click','.cartdestory',function(e){
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/cartdestory",
        data:{
            '_token' : '{{csrf_token()}}',
        },
        success:function(res)
        {
                if(res)
                {
                    $('#showcartco').load(location.href + " #showcartco");
                }
        }
    });
});
    });
</script>
@endsection