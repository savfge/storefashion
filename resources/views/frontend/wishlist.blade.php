@extends('layouts.home')
@section('contnet')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nouislider/nouislider.css')}}">


    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/wNumb.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Wishlist<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    @if($cartwishlist->count() > 0)
    <div class="page-content" id="showwishlistwer">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $cartswed = Cart::instance('cart')->content()->pluck('id');
                    @endphp
                    @foreach($cartwishlist as $item)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{route('prodctdatils',$item->id)}}">
                                        <img src="{{asset('admin_panel/img/'.$item->options->images)}}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="{{route('prodctdatils',$item->id)}}">{{$item->name}}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">L.E{{$item->price}}</td>
                        <td class="stock-col"><span class="in-stock">{{$item->new==1 ? 'In Stock' : 'Out Stock'}}</span></td>
                        <td class="action-col">
                            <div class="dropdown">
                                @if ($cartswed->contains($item->id))
                                <button class="btn btn-block btn-outline-primary-2 disabled"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-list-alt"></i>{{__('Out of Stock')}}
                                </button>  
                                @else
                                <button class="btn btn-block btn-outline-primary-2 addnewcat" value="{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-list-alt"></i>{{__('Add New Cart')}}
                                </button>  
                                @endif
                           

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"></a>
                              </div>
                            </div>
                        </td>
                        <td class="remove-col"><button value="{{$item->rowId}}" class="btn-remove deletwishlist"><i class="icon-close"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- End .table table-wishlist -->
            <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">Share on:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .wishlist-share -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    @else
    <div class="row" style="text-align: center; margin:30px;">
        <div class="col-md-12 mb-3">
            <h1 style="color:red;">{{__('Wishlist IS Empty')}}</h1>
        </div>
        <div class="col-md-12 mb-3">
            <a href="{{route('shop')}}" class="btn btn-dark">{{__('Containe Shopping')}}</a>
        </div>
    </div>
    @endif
</main><!-- End .main -->
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.addnewcat',function(e){
    e.preventDefault();
    
    var offercart = $(this).val();
    $.ajax({
        type:"post",
        url:"/carts/"+offercart,
        data:{
            'id' : offercart,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcart').load(location.href + " #showcart");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href = '/cart';
            }
        }
    });
});
$(document).on('click','.deletwishlist',function(e){
    e.preventDefault();
var offerdeler = $(this).val();
$.ajax({
    type:"get",
    url:"/deletewishlists/"+offerdeler,
    data:{
        'id' :offerdeler,
        '_token' : "{{csrf_token()}}",
    },
    success:function(res)
        {
            if(res)
            {
                $('#showwishlistwer').load(location.href + " #showwishlistwer");
                alertify.set('notifier','position', 'top-right');
                alertify.error(res.sms);
            }
        }
})
});
    })
</script>
@endsection