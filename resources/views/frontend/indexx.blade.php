@extends('layouts.home')
@section('silder')
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
<div class="container-fluid">
    <div class="row">
        @lang('en')
        @foreach($silders as $silder)
        <div class="col-lg-6">
            <div class="banner banner-big banner-overlay">
                <a >
                    <img src="{{asset('admin_panel/img/'.$silder->image)}}" alt="Banner">
                </a>

                <div class="banner-content banner-content-center">
                    <h3 class="banner-subtitle text-white"><a>{{$silder->en_name}}</a></h3><!-- End .banner-subtitle -->
                    <h2 class="banner-title text-white"><a>{{$silder->en_title}}</a></h2><!-- End .banner-title -->
                    <a href="{{route('shop')}}" target="_blank" class="btn underline"><span>{{__('app.DiscoverNow')}}</span></a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-6 -->
        @endforeach
        @else
        @foreach($silders as $silder)
        <div class="col-lg-6">
            <div class="banner banner-big banner-overlay">
                <a >
                    <img src="{{asset('admin_panel/img/'.$silder->image)}}" alt="Banner">
                </a>

                <div class="banner-content banner-content-center">
                    <h3 class="banner-subtitle text-white"><a>{{$silder->ar_name}}</a></h3><!-- End .banner-subtitle -->
                    <h2 class="banner-title text-white"><a>{{$silder->ar_title}}</a></h2><!-- End .banner-title -->
                    <a href="{{route('shop')}}" target="_blank" class="btn underline"><span>{{__('app.DiscoverNow')}}</span></a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-6 -->
        @endforeach
        @endlang
    </div><!-- End .row -->

    <div class="row justify-content-center">
        @lang('en')
        @foreach($bunners as $bunner)
        <div class="col-md-6 col-lg-4">
            <div class="banner banner-overlay text-white">
                <a>
                    <img src="{{asset('admin_panel/img/'.$bunner->image)}}" alt="Banner">
                </a>

                <div class="banner-content banner-content-right">
                    <h4 class="banner-subtitle"><a>{{$bunner->en_name}}</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title"><a>{{$bunner->en_title}}<br></a></h3><!-- End .banner-title -->
                    <a href="{{route('shop')}}" target="_blank" class="btn underline btn-outline-white-3 banner-link">{{__('app.shopnow')}}</a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-4 -->
        @endforeach
        @else
        @foreach($bunners as $bunner)
        <div class="col-md-6 col-lg-4">
            <div class="banner banner-overlay text-white">
                <a>
                    <img src="{{asset('admin_panel/img/'.$bunner->image)}}" alt="Banner">
                </a>

                <div class="banner-content banner-content-right">
                    <h4 class="banner-subtitle"><a>{{$bunner->ar_name}}</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title"><a>{{$bunner->ar_title}}<br></a></h3><!-- End .banner-title -->
                    <a href="{{route('shop')}}" target="_blank" class="btn underline btn-outline-white-3 banner-link">{{__('app.shopnow')}}</a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-4 -->
        @endforeach
        @endlang
    </div><!-- End .row -->
</div><!-- End .container-fluid -->
@endsection

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
<div class="bg-light-2 pt-6 pb-6 featured">
    <div class="container-fluid">
        <div class="heading heading-center mb-3">
            <h2 class="title">FEATURED PRODUCTS</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="featured-women-link" data-toggle="tab" href="#featured-women-tab" role="tab" aria-controls="featured-women-tab" aria-selected="true">{{__('app.all')}}</a>
                </li>
                @lang('en')
                @foreach($categorys as $category)
                <li class="nav-item">
                    <a class="nav-link" id="featured-men-link" data-toggle="tab" href="#tab{{$category->id}}" role="tab" aria-controls="featured-men-tab" aria-selected="false">{{$category->en_name}}</a>
                </li>
                @endforeach
                @else
                @foreach($categorys as $category)
                <li class="nav-item">
                    <a class="nav-link" id="featured-men-link" data-toggle="tab" href="#tab{{$category->id}}" role="tab" aria-controls="featured-men-tab" aria-selected="false">{{$category->ar_name}}</a>
                </li>
                @endforeach
                @endlang
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            
            @php
                $prodects = App\Models\Prodect::all();
            @endphp
            <div class="tab-pane p-0 fade show active" id="featured-women-tab" role="tabpanel" aria-labelledby="featured-women-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @lang('en')
                    @php
                        $wishlide = Cart::instance('wishlist')->content()->pluck('id')
                    @endphp
                    @php
                        $cartder = Cart::instance('cart')->content()->pluck('id');
                    @endphp
                    @php
                        $commpoersw = App\Models\Commper::all()->pluck('prodect_id');
                    @endphp
                    @foreach($prodects as $prodect)
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="{{route('prodctdatils',$prodect->id)}}">
                                <img src="{{asset('admin_panel/img/'.$prodect->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                <img src="{{asset('admin_panel/img/'.$prodect->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                            </a>
                            <div class="product-action-vertical">
                                @if ($commpoersw->contains($prodect->id))
                                <a style="background-color: blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>   
                                @else
                                <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>
                                @endif
                                @if ($wishlide->contains($prodect->id))
                                <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>add to wishlist</span></a>    
                                @else
                                <a style="cursor: pointer" wishlistores="{{$prodect->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>add to wishlist</span></a> 
                                @endif
                               
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                @if ($cartder->contains($prodect->id))
                                <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>add to cart</span></a>   
                                @else
                                <a style="cursor: pointer" offercarde="{{$prodect->id}}" class="btn-product btn-cart addnewcatfrt"><span>add to cart</span></a>
                                @endif
                              
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{route('prodctdatils',$prodect->id)}}">{{$prodect->en_name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                L.E{{$prodect->price}}
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div >
                                    <div style="width: 20%;">
                                        @php
                                            $avarag = $prodect->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarag>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                            @endif
                                        @endfor
                                    </div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( {{$prodect->review->count()}} Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endforeach
                    @else
                    @php
                        $wishlide = Cart::instance('wishlist')->content()->pluck('id')
                    @endphp
                    @php
                        $cartder = Cart::instance('cart')->content()->pluck('id');
                    @endphp
                    @php
                        $commperts = App\Models\Commper::all()->pluck('prodect_id');
                    @endphp
                    @foreach($prodects as $prodect)
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="{{route('prodctdatils',$prodect->id)}}">
                                <img src="{{asset('admin_panel/img/'.$prodect->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                <img src="{{asset('admin_panel/img/'.$prodect->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                            </a>
                            <div class="product-action-vertical">
                                @if ($commperts->contains($prodect->id))
                                <a style="background-color: blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                @else
                                <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>
                                @endif
                                
                                @if ($wishlide->contains($prodect->id))
                                <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>  
                                @else
                                <a style="cursor: pointer" wishlistores="{{$prodect->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a>
                                @endif
                               
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                @if ($cartder->contains($prodect->id))
                                <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                @else
                                <a style="cursor: pointer" offercarde="{{$prodect->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                @endif
                              
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{route('prodctdatils',$prodect->id)}}">{{$prodect->ar_name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                L.E{{$prodect->price}}
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div >
                                    <div style="width: 20%;">
                                        @php
                                            $avarag = $prodect->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarag>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                            @endif
                                        @endfor
                                    </div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( {{$prodect->review->count()}} {{__('app.review')}} )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endforeach
                    @endlang
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            @foreach($categorys as $category)
            @php
                $prodects = App\Models\Prodect::where('category_id',$category->id)->get();
            @endphp
            <div class="tab-pane p-0" id="tab{{$category->id}}" role="tabpanel" aria-labelledby="featured-women-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @lang('en')
                    @php
                        $wishlide = Cart::instance('wishlist')->content()->pluck('id')
                    @endphp
                     @php
                     $cartder = Cart::instance('cart')->content()->pluck('id');
                    @endphp
                    @php
                        $commpoersw = App\Models\Commper::all()->pluck('prodect_id');
                    @endphp
                    @foreach($prodects as $prodect)
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="{{route('prodctdatils',$prodect->id)}}">
                                <img src="{{asset('admin_panel/img/'.$prodect->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                <img src="{{asset('admin_panel/img/'.$prodect->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                @if ($commpoersw->contains($prodect->id))
                                <a style="background-color: blue;color:white" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a> 
                                @else
                                <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>
                                @endif
                               
                                @if ($wishlide->contains($prodect->id))
                                <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>    
                                @else
                                <a style="cursor: pointer" wishlistores="{{$prodect->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a> 
                                @endif
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                @if ($cartder->contains($prodect->id))
                                <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                @else
                                <a style="cursor: pointer" offercarde="{{$prodect->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{route('prodctdatils',$prodect->id)}}">{{$prodect->en_name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                L.E{{$prodect->price}}
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div >
                                    <div style="width: 20%;">
                                        @php
                                        $avarag = $prodect->review->average('review');
                                    @endphp
                                    @for ($i=0;$i<5;$i++)
                                        @if ($avarag>$i)
                                        <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                        @else
                                        <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                        @endif
                                    @endfor
                                    </div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( {{$prodect->review->count()}} {{__('app.review')}} )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endforeach
                    @else
                    @php
                        $wishlide = Cart::instance('wishlist')->content()->pluck('id')
                    @endphp
                     @php
                     $cartder = Cart::instance('cart')->content()->pluck('id');
                    @endphp
                    @php
                        $commpoersw = App\Models\Commper::all()->pluck('prodect_id');
                    @endphp
                    @foreach($prodects as $prodect)
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="{{route('prodctdatils',$prodect->id)}}">
                                <img src="{{asset('admin_panel/img/'.$prodect->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                <img src="{{asset('admin_panel/img/'.$prodect->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                @if ($commpoersw->contains($prodect->id))
                                <a style="background-color: blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>   
                                @else
                                <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>
                                @endif
                               
                                @if ($wishlide->contains($prodect->id))
                                <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>    
                                @else
                                <a style="cursor: pointer" wishlistores="{{$prodect->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a> 
                                @endif
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                @if ($cartder->contains($prodect->id))
                                <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                @else
                                <a style="cursor: pointer" offercarde="{{$prodect->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{route('prodctdatils',$prodect->id)}}">{{$prodect->ar_name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                L.E{{$prodect->price}}
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div >
                                    <div style="width: 20%;">
                                        @php
                                        $avarag = $prodect->review->average('review');
                                    @endphp
                                    @for ($i=0;$i<5;$i++)
                                        @if ($avarag>$i)
                                        <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                        @else
                                        <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                        @endif
                                    @endfor
                                    </div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( {{$prodect->review->count()}} {{__('app.review')}} )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endforeach
                    @endlang
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            @endforeach
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->
</div><!-- End .bg-light-2 pt-4 pb-4 -->
@endsection
@section('Acceiress')
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
<div class="container-fluid">
    <div class="heading heading-center mb-3">
        <h2 class="title">NEW ARRIVALS</h2><!-- End .title -->

        <ul class="nav nav-pills justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="new-women-link" data-toggle="tab" href="#new-women-tab" role="tab" aria-controls="new-women-tab" aria-selected="true">{{__('app.all')}}</a>
            </li>
            @php
                $catgoryswom =  App\Models\Category::where('staus',2)->orderBy('id','Desc')->get();
            @endphp
            @lang('en')
            @foreach($catgoryswom as $catgoryswo)
            <li class="nav-item">
                <a class="nav-link" id="new-men-link" data-toggle="tab" href="#tab{{$catgoryswo->id}}" role="tab" aria-controls="new-men-tab" aria-selected="false">{{$catgoryswo->en_name}}</a>
            </li>
            @endforeach
            @else
            @foreach($catgoryswom as $catgoryswo)
            <li class="nav-item">
                <a class="nav-link" id="new-men-link" data-toggle="tab" href="#tab{{$catgoryswo->id}}" role="tab" aria-controls="new-men-tab" aria-selected="false">{{$catgoryswo->ar_name}}</a>
            </li>
            @endforeach
            @endlang
        </ul>
    </div><!-- End .heading -->

    <div class="tab-content">

    @php
        $prodectaer = App\Models\Prodect::where('staus',3)->orderBy('id', 'DESC')->get();
    @endphp
     @php
     $wishlide = Cart::instance('wishlist')->content()->pluck('id')
 @endphp
 @php
     $cartder = Cart::instance('cart')->content()->pluck('id');
 @endphp
 @php
     $commpercde = App\Models\Commper::all()->pluck('prodect_id');
 @endphp
        <div class="tab-pane p-0 fade show active" id="new-women-tab" role="tabpanel" aria-labelledby="new-women-link">
            <div class="products">
                <div class="row justify-content-center">
                    @lang('en')
                    @foreach($prodectaer as $prodectae)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                @lang('en')
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'New' : 'Sall' }}</span>
                                @else
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'جديد' : 'بيع' }}</span>
                                @endlang
                                <a href="{{route('prodctdatils',$prodectae->id)}}">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    @if ($commpercde->contains($prodectae->id))
                                    <a style="cursor: pointer; background-color:blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                    @else
                                    <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>  
                                    @endif
                                    @if ($wishlide->contains($prodectae->id))
                                    <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>    
                                    @else
                                    <a style="cursor: pointer" wishlistores="{{$prodectae->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a> 
                                    @endif
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    @if ($cartder->contains($prodectae->id))
                                    <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                    @else
                                    <a style="cursor: pointer" offercarde="{{$prodectae->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                    @endif
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{route('prodctdatils',$prodectae->id)}}">{{$prodectae->en_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">L.E{{$prodectae->price}}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div>
                                        <div style="width: 40%;">
                                            @php
                                            $avarag = $prodectae->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarag>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                            @endif
                                        @endfor
                                        </div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{$prodectae->review->count()}} Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                    @else
                    @foreach($prodectaer as $prodectae)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                @lang('en')
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'New' : 'Sall' }}</span>
                                @else
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'جديد' : 'بيع' }}</span>
                                @endlang
                                <a href="{{route('prodctdatils',$prodectae->id)}}">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    @if ($commpercde->contains($prodectae->id))
                                    <a style="cursor: pointer; background-color:blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                    @else
                                    <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>  
                                    @endif
                                    @if ($wishlide->contains($prodectae->id))
                                    <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>    
                                    @else
                                    <a style="cursor: pointer" wishlistores="{{$prodectae->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a> 
                                    @endif
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    @if ($cartder->contains($prodectae->id))
                                    <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                    @else
                                    <a style="cursor: pointer" offercarde="{{$prodectae->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                    @endif
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{route('prodctdatils',$prodectae->id)}}">{{$prodectae->ar_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">L.E{{$prodectae->price}}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div>
                                        <div style="width: 40%;">
                                            @php
                                            $avarag = $prodectae->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarag>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                            @endif
                                        @endfor
                                        </div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{$prodectae->review->count()}} Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                    @endlang
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
        @php
        $catgoryswom =  App\Models\Category::where('staus',2)->orderBy('id','Desc')->get();
    @endphp
    @foreach($catgoryswom as $catgoryswo)
    @php
        $prodectaer = App\Models\Prodect::where('category_id',$catgoryswo->id)->get();
    @endphp
        <div class="tab-pane p-0" id="tab{{$catgoryswo->id}}" role="tabpanel" aria-labelledby="new-women-link">
            <div class="products">
                <div class="row justify-content-center">
                    @lang('en')
                    @foreach($prodectaer as $prodectae)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                @lang('en')
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'New' : 'Sall' }}</span>
                                @else
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'جديد' : 'بيع' }}</span>
                                @endlang
                               
                                <a href="{{route('prodctdatils',$prodectae->id)}}">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    @if ($commpercde->contains($prodectae->id))
                                    <a style="cursor: pointer; background-color:blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                    @else
                                    <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>  
                                    @endif
                                    @if ($wishlide->contains($prodectae->id))
                                    <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>    
                                    @else
                                    <a style="cursor: pointer" wishlistores="{{$prodectae->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a> 
                                    @endif
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    @if ($cartder->contains($prodectae->id))
                                    <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                    @else
                                    <a style="cursor: pointer" offercarde="{{$prodectae->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                    @endif
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{route('prodctdatils',$prodectae->id)}}">{{$prodectae->en_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">L.E{{$prodectae->price}}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div>
                                        <div  style="width: 40%;">
                                            @php
                                            $avarag = $prodectae->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarag>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                            @endif
                                        @endfor
                                        </div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{$prodectae->review->count()}} {{__('app.review')}} )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                    @else
                    @foreach($prodectaer as $prodectae)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                @lang('en')
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'New' : 'Sall' }}</span>
                                @else
                                <span class="product-label label-circle label-sale">{{$prodectae->new==1 ? 'جديد' : 'بيع' }}</span>
                                @endlang
                                <a href="{{route('prodctdatils',$prodectae->id)}}">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image">
                                    <img src="{{asset('admin_panel/img/'.$prodectae->image2)}}" style="width: 300px; height:300px;" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    @if ($commpercde->contains($prodectae->id))
                                    <a style="cursor: pointer; background-color:blue;color:white;" class="btn-product-icon btn-compare" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                    @else
                                    <a offercommper="{{$prodect->id}}" class="btn-product-icon btn-compare adddcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>  
                                    @endif
                                    @if ($wishlide->contains($prodectae->id))
                                    <a  class="btn-product-icon btn-wishlist btn-expandable" style="color: rgba(255, 166, 0, 0.816);cursor: pointer;"><span>{{__('app.addtowishlistempty')}}</span></a>    
                                    @else
                                    <a style="cursor: pointer" wishlistores="{{$prodectae->id}}" class="btn-product-icon btn-wishlist btn-expandable wishlistores"><span>{{__('app.addtowishlist')}}</span></a> 
                                    @endif
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    @if ($cartder->contains($prodectae->id))
                                    <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                                    @else
                                    <a style="cursor: pointer" offercarde="{{$prodectae->id}}" class="btn-product btn-cart addnewcatfrt"><span>{{__('app.addnewcart')}}</span></a>
                                    @endif
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{route('prodctdatils',$prodectae->id)}}">{{$prodectae->ar_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">L.E{{$prodectae->price}}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div>
                                        <div  style="width: 40%;">
                                            @php
                                            $avarag = $prodectae->review->average('review');
                                        @endphp
                                        @for ($i=0;$i<5;$i++)
                                            @if ($avarag>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                            @endif
                                        @endfor
                                        </div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{$prodectae->review->count()}} {{__('app.review')}} )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                    @endlang
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
        @endforeach
    </div><!-- End .tab-content -->
    <hr class="mt-0 mb-6">
    
    <div class="blog-posts mb-4">
        <h2 class="title text-center mb-3">From Our Blog</h2><!-- End .title text-center -->

        <div class="owl-carousel owl-simple mb-2" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "items": 3,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "520": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    }
                }
            }'>
            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="assets/images/demos/demo-7/blog/post-1.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body text-center">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 1 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Sed adipiscing ornare.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="assets/images/demos/demo-7/blog/post-2.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body text-center">
                    <div class="entry-meta">
                        <a href="#">Dec 12, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Fusce lacinia arcuet nulla.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="assets/images/demos/demo-7/blog/post-3.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body text-center">
                    <div class="entry-meta">
                        <a href="#">Dec 19, 2018</a>, 2 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Quisque volutpat mattis eros.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="assets/images/demos/demo-7/blog/post-4.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body text-center">
                    <div class="entry-meta">
                        <a href="#">Dec 25, 2018</a>, 3 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Mauris suscipit in massa.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        </div><!-- End .owl-carousel -->
    </div><!-- End .blog-posts -->
</div><!-- End .container-fluid -->
@endsection
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.wishlistores',function(e){
    e.preventDefault();
    var wishlistores = $(this).attr('wishlistores');
    $.ajax({
        type:"post",
        url:"/wishlistores/"+wishlistores,
        data:{
            'id' : wishlistores,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showwishlist').load(location.href +" #showwishlist");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href="/wishlist";
            }
        }
    });
});
$(document).on('click','.addnewcatfrt',function(e){
    e.preventDefault();
    var offercdeq = $(this).attr('offercarde');
    $.ajax({
        type:"post",
        url:"/carts/"+offercdeq,
        data:{
            'id' : offercdeq,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcart').load(location.href +" #showcart");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href="/cart";
            }
        }
    })
});
$(document).on('click','.adddcommper',function(e){
    e.preventDefault();
    var offerdss = $(this).attr('offercommper');
    $.ajax({
        type:"post",
        url:"/commperstores/"+offerdss,
        data:{
            'id' : offerdss,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcommper').load(location.href + " #showcommper");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.reload();
            }
        }
    });
});
    });
</script>