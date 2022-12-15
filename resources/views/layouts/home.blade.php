<!DOCTYPE html>
<html lang="en">

<!-- molla/index-7.html  22 Nov 2019 09:56:39 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/skins/skin-demo-7.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demos/demo-7.css')}}">
</head>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link src="{{asset('assets/fontawesome-free-6.2.1-desktop')}}">
@livewireStyles
<body>
    <div class="page-wrapper">
        <header class="header header-7">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left">
                        <div class="header-dropdown">
                            <a style="cursor: pointer; font-size:16px">Usd</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a style="font-size: 16px;" href="{{route('home')}}">{{__('app.egypt')}}</a></li>
                                    {{-- <li><a href="#">Usd</a></li> --}}
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->

                        <div class="header-dropdown">
                            <a style="font-size: 16px">{{__('app.langauge')}}</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a style="font-size: 16px;" href="{{url('locale/en')}}">{{__('app.en')}}</a></li>
                                    <li><a style="font-size: 16px;" href="{{url('locale/ar')}}">{{__('app.ar')}}</a></li>
                                    
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#" style="font-size: 16px">{{__('app.links')}}</a>
                                <ul>
                                    @if (Auth::user())
                                    <li><a style="font-size: 16px"><i class="icon-phone"></i>{{__('app.call')}}: +{{Auth::user()->phone}}</a></li>  
                                    @else
                                    <li><a style="font-size: 16px"><i class="icon-phone"></i>{{__('app.call')}}: +0123 456 789</a></li>
                                    @endif
                                   
                                    <li><a style="font-size: 16px" href="{{route('wishlist')}}" id="showwishlist"><i class="icon-heart-o"></i>{{__('app.MyWishlist')}} <span>(<?= count(Cart::instance('wishlist')->content()) ?>)</span></a></li>
                                    <li><a style="font-size: 16px" href="{{route('about')}}">{{__('app.AboutUs')}}</a></li>
                                    <li><a style="font-size: 16px" href="contact.html">{{__('app.ContactUs')}}</a></li>
                                    @if (Auth::user())
                                    <li><a style="font-size: 16px;cursor: pointer;" id="logouts"  data-toggle="modal"><i class="icon-user"></i>{{__('app.logout')}}</a></li>  
                                    @else
                                    <li><a style="font-size: 16px" href="{{route('login')}}" data-toggle="modal"><i class="icon-user"></i>{{__('app.Login')}}</a></li>
                                    @endif
                                    
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container-fluid">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{asset('assets/images/demos/demo-7/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a style="font-size: 16px;" href="{{route('home')}}">{{__('app.home')}}</a>
                                </li>
                                <li>
                                    <a style="font-size: 16px;" href="{{route('shop')}}">{{__('app.shop')}}</a>
                                </li>
                                <li>
                                    <a style="cursor: pointer; font-size:16px;" >{{__('app.page')}}</a>

                                    <ul>
                                        <li>
                                            <a style="font-size: 16px;" href="{{route('about')}}">{{__('app.AboutUs')}}</a>
                                        </li>
                                        <li>
                                            <a style="font-size: 16px;" href="{{route('contact')}}">{{__('app.ContactUs')}}</a>
                                        </li>
                                        @if (Auth::user())
                                        <li><a style="font-size: 16px;cursor: pointer;" id="logouts">{{__('app.logout')}}</a></li> 
                                        @else
                                        <li><a style="font-size: 16px;" href="{{route('login')}}">{{__('app.Login')}}</a></li>
                                        @endif
                                        
                                        <li><a style="font-size: 16px;"  href="{{route('account')}}">{{__('app.account')}}</a></li>
                                        
                                        <li>
                                            <a style="font-size: 16px;" href="{{route('contact')}}">{{__('app.checkout')}}</a>
                                        </li>
                                        <li>
                                            <a style="font-size: 16px;" href="{{route('cart')}}">{{__('app.cart')}}</a>
                                        </li>
                                        <li>
                                            <a style="font-size: 16px;" href="{{route('wishlist')}}">{{__('app.MyWishlist')}}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a style="font-size: 16px;" href="{{route('blog')}}">{{__('app.blog')}}</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search header-search-extended header-search-visible">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form id="formsearch" action="{{route('search')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="header-search-wrapper search-wrapper-wide">
                                    {{-- <label for="q" class="sr-only">{{__()}}</label> --}}
                                    <input style="font-size: 22px;" type="search" class="form-control" name="search" id="q" placeholder="{{__('app.search')}}..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        
                        <div class="dropdown cart-dropdown" id="showcart">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count"><?= count(Cart::instance('cart')->content()) ?></span>
                            </a>

                            @if (Auth::user())
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @foreach($cartcontenns as $item)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="{{route('prodctdatils', $item->id)}}">{{ $item->name}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $item->qty}}</span>
                                                L.E{{ $item->price}}
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset('admin_panel/img/'. $item->options->images)}}"  alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->

                                    @endforeach
                                </div><!-- End .cart-product -->
                                @if($cartcontenns->count() > 0)
                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">L.E{{$carttotal}}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                                    <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                                @else
                                <div class="row" style="text-align: center; color:red;">
                                    <div class="col-md-12 mb-3">
                                        <h6 style="font-size:20px; color:red">{{__('app.EmptyCart')}}</h6>
                                    </div>
                                    @endif
                                </div>
                            </div><!-- End .dropdown-menu -->
                            @else
                                
                            @endif
                        </div><!-- End .cart-dropdown -->

                        <div class="dropdown cart-dropdown" id="showcommper">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-random"></i>
                                <span class="cart-count">{{$commpercount}}</span>
                            </a>
                            @if (Auth::user())
                                <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @if($commperalls->count() > 0)
                                    @foreach($commperalls as $commperall)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="{{route('prodctdatils', $commperall->prodect->id)}}">{{ $commperall->prodect->en_name}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty"></span>
                                                L.E{{$commperall->prodect->price}}
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset('admin_panel/img/'. $commperall->prodect->image)}}"  alt="product">
                                            </a>
                                        </figure>
                                        <a offerdletecommper="{{$commperall->id}}" class="btn-remove dletecommpor" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                    @endforeach
                                    @else
                                    <div class="row" style="text-align: center; color:red;">
                                        <div class="col-md-12 mb-3">
                                            <h6 style="font-size:20px; color:red">{{__('app.compare')}}</h6>
                                        </div>
                                    @endif
                                </div><!-- End .cart-product -->
                            </div><!-- End .dropdown-menu -->
                            @else
                                
                            @endif
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            @yield('silder')

          @yield('support')

            @yield('contnet')

            <div class="mb-6"></div><!-- End .mb-6 -->

           @yield('Acceiress')

            @yield('test')
            <div class="brands-border owl-carousel owl-simple" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": false,
                "margin": 0,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "420": {
                        "items":3
                    },
                    "600": {
                        "items":4
                    },
                    "900": {
                        "items":5
                    },
                    "1024": {
                        "items":6
                    },
                    "1360": {
                        "items":7
                    }
                }
            }'>
            @foreach($barndsall as $barndsal)
            <a  class="brand">
                <img src="{{asset('admin_panel/img/'.$barndsal->image)}}" alt="Brand Name">
            </a>
            
            @endforeach
            </div><!-- End .owl-carousel -->
        </main><!-- End .main -->

        <footer class="footer footer-2">
            <div class="footer-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="widget widget-about">
                                <img src="{{asset('assets/images/demos/demo-7/logo-footer.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. </p>
                                
                                <div class="widget-about-info">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <span class="widget-about-title">Got Question? Call us 24/7</span>
                                            <a href="tel:123456789">+0123 456 789</a>
                                        </div><!-- End .col-sm-6 -->
                                        <div class="col-sm-6 col-md-8">
                                            <span class="widget-about-title">Payment Method</span>
                                            <figure class="footer-payments">
                                                <img src="{{asset('assets/images/payments.png')}}" alt="Payment methods" width="272" height="20">
                                            </figure><!-- End .footer-payments -->
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .widget-about-info -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-4 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Useful links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="about.html">About Molla</a></li>
                                    <li><a href="#">How to shop on Molla</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                    <li><a href="login.html">Log in</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-2 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-2 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Sign In</a></li>
                                    <li><a href="cart.html">View Cart</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-2 -->

                        <div class="col-sm-6 col-lg-2">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Sign up to newsletter</h4><!-- End .widget-title -->

                                <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan.</p>
                                
                                <form action="#">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- .End .input-group -->
                                </form>
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-2 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container-fluid">
                    <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <ul class="footer-menu">
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul><!-- End .footer-menu -->

                    <div class="social-icons social-icons-color">
                        <span class="social-label">Social Media</span>
                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .container-fluid -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
            
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index.html">Home</a>

                        <ul>
                            <li><a href="index-1.html">01 - furniture store</a></li>
                            <li><a href="index-2.html">02 - furniture store</a></li>
                            <li><a href="index-3.html">03 - electronic store</a></li>
                            <li><a href="index-4.html">04 - electronic store</a></li>
                            <li><a href="index-5.html">05 - fashion store</a></li>
                            <li><a href="index-6.html">06 - fashion store</a></li>
                            <li><a href="index-7.html">07 - fashion store</a></li>
                            <li><a href="index-8.html">08 - fashion store</a></li>
                            <li><a href="index-9.html">09 - fashion store</a></li>
                            <li><a href="index-10.html">10 - shoes store</a></li>
                            <li><a href="index-11.html">11 - furniture simple store</a></li>
                            <li><a href="index-12.html">12 - fashion simple store</a></li>
                            <li><a href="index-13.html">13 - market</a></li>
                            <li><a href="index-14.html">14 - market fullwidth</a></li>
                            <li><a href="index-15.html">15 - lookbook 1</a></li>
                            <li><a href="index-16.html">16 - lookbook 2</a></li>
                            <li><a href="index-17.html">17 - fashion store</a></li>
                            <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                            <li><a href="index-19.html">19 - games store</a></li>
                            <li><a href="index-20.html">20 - book store</a></li>
                            <li><a href="index-21.html">21 - sport store</a></li>
                            <li><a href="index-22.html">22 - tools store</a></li>
                            <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                            <li><a href="index-24.html">24 - extreme sport store</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="category.html">Shop</a>
                        <ul>
                            <li><a href="category-list.html">Shop List</a></li>
                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="#">Lookbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html" class="sf-with-ul">Product</a>
                        <ul>
                            <li><a href="product.html">Default</a></li>
                            <li><a href="product-centered.html">Centered</a></li>
                            <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                            <li><a href="product-gallery.html">Gallery</a></li>
                            <li><a href="product-sticky.html">Sticky Info</a></li>
                            <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                            <li><a href="product-fullwidth.html">Full Width</a></li>
                            <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li>
                                <a href="about.html">About</a>

                                <ul>
                                    <li><a href="about.html">About 01</a></li>
                                    <li><a href="about-2.html">About 02</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>

                                <ul>
                                    <li><a href="contact.html">Contact 01</a></li>
                                    <li><a href="contact-2.html">Contact 02</a></li>
                                </ul>
                            </li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>

                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="#">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Single Post</a>
                                <ul>
                                    <li><a href="single.html">Default with sidebar</a></li>
                                    <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                    <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements-list.html">Elements</a>
                        <ul>
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-titles.html">Titles</a></li>
                            <li><a href="elements-banners.html">Banners</a></li>
                            <li><a href="elements-product-category.html">Product Category</a></li>
                            <li><a href="elements-video-banners.html">Video Banners</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                            <li><a href="elements-accordions.html">Accordions</a></li>
                            <li><a href="elements-tabs.html">Tabs</a></li>
                            <li><a href="elements-testimonials.html">Testimonials</a></li>
                            <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                            <li><a href="elements-portfolio.html">Portfolio</a></li>
                            <li><a href="elements-cta.html">Call to Action</a></li>
                            <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.dletecommpor',function(e){
    e.preventDefault();
    var offerdleteco = $(this).attr('offerdletecommper');
    $.ajax({
        type:"post",
        url:"/deletecommpers/"+offerdleteco,
        data:{
            'id' : offerdleteco,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcommper').load(location.href + " #showcommper");
                alertify.set('notifier','position', 'top-right');
                alertif.error(res.sms);
            }
        }
    })
});
$(document).on('click','#logouts',function(e){
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/logout",
        data:{
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                window.location.href ="/login";
            }
        }
    });
});
        });
        // dletecommpor
    </script>


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Plugins JS File -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/demos/demo-7.js')}}"></script>
</body>
@livewireScripts

<!-- molla/index-7.html  22 Nov 2019 09:56:58 GMT -->

</html>
