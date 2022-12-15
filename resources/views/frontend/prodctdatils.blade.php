@extends('layouts.home')
@section('contnet')

    
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop')}}">{{__('app.product')}}</a></li>
            </ol>

            {{-- <nav class="product-pager ml-auto" aria-label="Product">
                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                    <i class="icon-angle-left"></i>
                    <span>Prev</span>
                </a>

                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                    <span>Next</span>
                    <i class="icon-angle-right"></i>
                </a>
            </nav><!-- End .pager-nav --> --}}
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{asset('admin_panel/img/'.$prodect->image)}}" data-zoom-image="{{asset('admin_panel/img/'.$prodect->image)}}" style="width:400px;height:400px;" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$prodect->en_name}}</h1><!-- End .product-title -->

                            <div class="ratings-container" id="showreview">
                                <div >
                                    <div  style="width: 80%;" >
                                        @php
                                            $avarage = $prodect->review->average('review')
                                        @endphp
                                        @for ($i=0; $i<5; $i++)
                                            @if ($avarage>$i)
                                            <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                            @else
                                            <i class="fa fa-star" style="color:#cccccc;font-size:11px;"></i>   
                                            @endif
                                        @endfor
                                    </div><!-- End .ratings-val -->
                                </div><!-- End .ratings  showreview -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( {{$prodect->review->count()}} Reviews )</a>
                            </div><!-- End .rating-container -->
                            <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark">{{__('Add New Review')}}</a>
                            <br>
                            <div class="product-price">
                                L.E{{$prodect->price}}
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{$prodect->short_desc}}</p>
                            </div><!-- End .product-content -->
                            @php
                                $cartwider = Cart::instance('cart')->content()->pluck('id');
                            @endphp
                            <form method="post" enctype="multipart/form-data" id="formcartadd">
                                @csrf
                            <div class="details-filter-row details-row-size">
                            </div><!-- End .details-filter-row -->
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" name="qty" id="qty" class="form-control" value="0" min="0" max="10" readonly="" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                                <input type="hidden" name="prodect_id" value="{{$prodect->id}}">
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                @if ($cartwider->contains($prodect->id))
                                <a style="cursor: pointer;" class="btn-product btn-cart"><span>add to cart</span></a>   
                                @else
                                <a style="cursor: pointer;" class="btn-product btn-cart addnewcart"><span>add to cart</span></a> 
                                @endif

                            </form>
                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                    <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span style="font-size:20px;">{{__('app.category')}}:</span>
                                    @lang('en')
                                    <a style="font-size:20px;">{{$prodect->category->en_name}}</a>,
                                    <a style="font-size:20px;">{{$prodect->subcategory->en_name}}</a>,
                                    <a style="font-size:20px;">{{$prodect->color->en_name}}</a>
                                    @else
                                    <a style="font-size:20px;">{{$prodect->category->ar_name}}</a>,
                                    <a style="font-size:20px;">{{$prodect->subcategory->ar_name}}</a>,
                                    <a style="font-size:20px;">{{$prodect->color->ar_name}}</a>
                                    @endlang
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">{{__('app.review')}} ({{$prodect->review->count()}})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>{{$prodect->long_desc}}<br><br></p>
                            <ul>
                                <li>{{$prodect->title1}}</li>
                                <li>{{$prodect->title2}}</li>
                                <li>{{$prodect->title3}}</li>
                            </ul>

                            <p>{{$prodect->short_desc}}<br><br></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>Information</h3>
                            <p>{{$prodect->long_desc}}<br><br></p>

                            <h3>Fabric & care</h3>
                            <ul>
                                <li>{{$prodect->title5}}</li>
                                <li>{{$prodect->title6}}</li>
                                <li>{{$prodect->title7}}</li>
                                <li>{{$prodect->title8}} </li>
                            </ul>

                            <h3>Size</h3>
                            <p>{{$prodect->size->en_name}}</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                            We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        
                        <div class="reviews" id="showree">
                            <h3>{{__('app.review')}} ({{$prodect->review->count()}})</h3>
                            @if($prodect->review->count() > 0)
                            @foreach($prodect->review as $itde)
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a>{{$itde->name}}</a></h4>
                                        <div class="ratings-container">
                                            <div>
                                                <div style="width: 80%;">
                                                    @for ($i=0; $i<5; $i++)
                                                    @if ($itde->review>$i)
                                                    <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                                                    @else
                                                    <i class="fa fa-star" style="color:#cccccc;font-size:11px;"></i>   
                                                    @endif
                                                @endfor
                                                </div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">{{$itde->created_at->diffForHumans()}}</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <div class="review-content">
                                            <p>{{$itde->message}}<br><br></p>
                                        </div><!-- End .review-content -->
                                        @if (Auth::user()->role_id==1)
                                        <a deletereview="{{$itde->id}}" style="float: right; color:red;cursor: pointer;" class="deletereview">{{__('Delete')}}</a>  
                                        @else
                                        @endif
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                            @endforeach
                        </div><!-- End .reviews -->
                        @else
                        <div class="row" style="color: red; text-align:center; margin:20px;">
                            <div class="col-md-12 mb-3">
                                <h3 style="color: red; font-size:40px;">{{__('app.emptyReview')}}</h3>
                            </div>
                            @endif
                        </div>
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
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
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @php
                    $adwidert = Cart::instance('wishlist')->content()->pluck('id');
                @endphp
                @php
                    $commenty = App\Models\Commper::all()->pluck('prodect_id');
                @endphp
                @php
                    $cartdefw = Cart::instance('cart')->content()->pluck('id');
                @endphp
                @lang('en')
                @foreach($porodectretled as $porodectretle)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        @lang('en')
                        <span class="product-label label-new">{{$porodectretle->new==1 ? 'New' : 'Sall'}}</span>
                        @else
                        <span class="product-label label-new">{{$porodectretle->new==1 ? 'جديد' : 'بيع'}}</span>
                        @endlang
                        <a href="{{route('prodctdatils',$porodectretle->id)}}">
                            <img src="{{asset('admin_panel/img/'.$porodectretle->image)}}" style="height: 300px; width:300px;" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            @if ($adwidert->contains($porodectretle->id))
                            <a style="cursor: pointer;color:pink;" class="btn-product-icon btn-wishlist btn-expandable"><span>{{__('app.addtowishlistempty')}}</span></a>  
                            @else
                            <a style="cursor: pointer;" offerwishile="{{$porodectretle->id}}" class="btn-product-icon btn-wishlist btn-expandable addnewwiwsrty"><span>{{__('app.addtowishlist')}}</span></a>  
                            @endif  
                            @if ($commenty->contains($porodectretle->id))
                            <a class="btn-product-icon btn-compare" style="background-color: pink; color:white;cursor: pointer;" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>   
                            @else
                            <a style="cursor: pointer;" offercommnrty="{{$porodectretle->id}}" class="btn-product-icon btn-compare addnewcommpoer" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>
                            @endif
                            
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            @if ($cartdefw->contains($porodectretle->id))
                            <a  class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                            @else
                            <a offercartgd="{{$porodectretle->id}}" class="btn-product btn-cart addnewcarte"><span>{{__('app.addnewcart')}}</span></a>
                            @endif
                           
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="{{route('shop')}}">{{$porodectretle->category->en_name}}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{route('prodctdatils',$porodectretle->id)}}">{{$porodectretle->en_name}} <br></a></h3><!-- End .product-title -->
                        <div class="product-price">
                            L.E{{$porodectretle->price}}
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div>
                                <div style="width: 20%;">
                                    @php
                                        $avarage = $porodectretle->review->average('review');
                                    @endphp
                                    @for ($i=0;$i<5;$i++)
                                       @if ($avarage>$i)
                                       <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>
                                       @else
                                       <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                       @endif 
                                    @endfor
                               
                                
                                </div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <br><br>
                            <span class="ratings-text">( {{$porodectretle->review->count()}} {{__('app.review')}} )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endforeach
                @else
                @foreach($porodectretled as $porodectretle)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        @lang('en')
                        <span class="product-label label-new">{{$porodectretle->new==1 ? 'New' : 'Sall'}}</span>
                        @else
                        <span class="product-label label-new">{{$porodectretle->new==1 ? 'جديد' : 'بيع'}}</span>
                        @endlang
                        <a href="{{route('prodctdatils',$porodectretle->id)}}">
                            <img src="{{asset('admin_panel/img/'.$porodectretle->image)}}" style="height: 300px; width:300px;" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            @if ($adwidert->contains($porodectretle->id))
                            <a style="cursor: pointer;color:pink;" class="btn-product-icon btn-wishlist btn-expandable"><span>{{__('app.addtowishlistempty')}}</span></a>  
                            @else
                            <a style="cursor: pointer;" offerwishile="{{$porodectretle->id}}" class="btn-product-icon btn-wishlist btn-expandable addnewwiwsrty"><span>{{__('app.addtowishlist')}}</span></a>  
                            @endif  
                            @if ($commenty->contains($porodectretle->id))
                            <a class="btn-product-icon btn-compare" style="background-color: pink; color:white;cursor: pointer;" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>   
                            @else
                            <a style="cursor: pointer;" offercommnrty="{{$porodectretle->id}}" class="btn-product-icon btn-compare addnewcommpoer" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a>
                            @endif
                            
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            @if ($cartdefw->contains($porodectretle->id))
                            <a  class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>   
                            @else
                            <a offercartgd="{{$porodectretle->id}}" class="btn-product btn-cart addnewcarte"><span>{{__('app.addnewcart')}}</span></a>
                            @endif
                           
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="{{route('shop')}}">{{$porodectretle->category->ar_name}}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{route('prodctdatils',$porodectretle->id)}}">{{$porodectretle->ar_name}} <br></a></h3><!-- End .product-title -->
                        <div class="product-price">
                            L.E{{$porodectretle->price}}
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div>
                                <div style="width: 20%;">
                                    @php
                                        $avarage = $porodectretle->review->average('review');
                                    @endphp
                                    @for ($i=0;$i<5;$i++)
                                       @if ($avarage>$i)
                                       <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>
                                       @else
                                       <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                                       @endif 
                                    @endfor
                               
                                
                                </div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <br><br>
                            <span class="ratings-text">( {{$porodectretle->review->count()}} {{__('app.review')}} )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endforeach
                @endlang
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
          <form enctype="multipart/form-data" id="addformrevie" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Review Name')}}</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Review Comment')}}</label>
                    <textarea type="text" rows="10" cols="10"  class="form-control" name="message"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Reviw Customer')}}</label>
                    <br>
                    <input type="radio" name="review" value="1">
                    {{__('Bad')}}
                    <br><br>
                    <input type="radio" name="review" value="2">
                    {{__('Normal')}}
                    <br><br>
                    <input type="radio" name="review" value="3">
                    {{__('Good')}}
                    <br><br>
                    <input type="radio" name="review" value="4">
                    {{__('Very Good')}}
                    <br><br>
                    <input type="radio" name="review" value="5">
                    {{__('Excellent')}}
                    <br><br>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="hidden" name="prodect_id" value="{{$prodect->id}}">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary ddnewreview">{{__('Create New Review')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.ddnewreview',function(e){
    e.preventDefault();
    var formdatrev = new FormData($('#addformrevie')[0]);
    $.ajax({
        type:"post",
        url:"/reviewstores",
        data:formdatrev,
        enctype:'multipart/form-data',
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showreview').load(location.href + " #showreview");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                $('#exampleModal').modal('hide');
                window.location.reload();
            }
        }
    });
});
$(document).on('click','.deletereview',function(e){
    e.preventDefault();
    var deletereview = $(this).attr('deletereview');
    $.ajax({
        type:"get",
        url:"/deletereview/"+deletereview,
        data:{
            'id' : deletereview,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showree').load(location.href + " #showree");
            }
        }
    })
})
$(document).on('click','.addnewcart',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formcartadd')[0]);
    $.ajax({
        type:"post",
        url:"/cartstores",
        data:formdata,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
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
    })
});
$(document).on('click','.addnewcarte',function(e){
    e.preventDefault();
    var offrtdwsce = $(this).attr('offercartgd');
    $.ajax({
        type:"post",
        url:"/carts/"+offrtdwsce,
        data:{
            'id' : offrtdwsce,
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
$(document).on('click','.addnewwiwsrty',function(e){
    e.preventDefault();
    var offerwider = $(this).attr('offerwishile');
    $.ajax({
        type:"post",
        url:"/wishlistores/"+offerwider,
        data:{
            'id' : offerwider,
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
$(document).on('click','.addnewcommpoer',function(e){
    e.preventDefault();
    var offercommnert = $(this).attr('offercommnrty');
    $.ajax({
        type:"post",
        url:"/commperstores/"+offercommnert,
        data:{
            'id' : offercommnert,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcommper').load(location.href + " #showcommper");
                window.location.reload();
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    })
})
    });
</script>
@endsection
{{--  --}}


