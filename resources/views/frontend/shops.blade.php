@if($shops->count() > 0)
<div class="products mb-3">
    <div class="row justify-content-center">
        @php
            $wsijder = Cart::instance('wishlist')->content()->pluck('id');
        @endphp
        @php
            $commperite = App\Models\Commper::all()->pluck('prodect_id');
        @endphp
        @php
            $cartconer = Cart::instance('cart')->content()->pluck('id');
        @endphp
        @lang('en')
        @foreach($shops as $shop)
        <div class="col-6 col-md-4 col-lg-4">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    @lang('en')
                    <span class="product-label label-new">{{$shop->new==1 ? 'New' : 'Sall'}}</span>
                    @else
                    <span class="product-label label-new">{{$shop->new==1 ? 'جديد' : 'بيع'}}</span>
                    @endlang
                    <a href="product.html">
                        <img src="{{asset('admin_panel/img/'.$shop->image)}}" style="height: 500px; width:500px;" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">{{$shop->category->en_name}}</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{route('prodctdatils',$shop->id)}}">{{$shop->en_name}}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        L.E{{$shop->price}}
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 col-lg-4 -->
        @endforeach
        @else
        @foreach($shops as $shop)
        <div class="col-6 col-md-4 col-lg-4">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    @lang('en')
                    <span class="product-label label-new">{{$shop->new==1 ? 'New' : 'Sall'}}</span>
                    @else
                    <span class="product-label label-new">{{$shop->new==1 ? 'جديد' : 'بيع'}}</span>
                    @endlang
                    <a href="product.html">
                        <img src="{{asset('admin_panel/img/'.$shop->image)}}" style="height: 500px; width:500px;" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">

                       @if ($wsijder->contains($shop->id))
                       <a  class="btn-product-icon btn-wishlist btn-expandable" style="color:pink"><span>{{__('app.addtowishlistempty')}}</span></a> 
                       @else
                       <a style="cursor: pointer" offerwisdr="{{$shop->id}}" class="btn-product-icon btn-wishlist btn-expandable addnewwishit"><span>{{__('app.addtowishlist')}}</span></a>
                       @endif
                       @if ($commperite->contains($shop->id))
                       <a  class="btn-product-icon btn-compare" style="background-color: pink;color:white" title="Compare"><span>{{__('app.commpersde')}}</span></a> 
                       @else
                       <a style="cursor: pointer;" offercomper="{{$shop->id}}" class="btn-product-icon btn-compare addnewcommper" title="Compare"><span>{{__('app.compare')}}</span></a>
                       @endif
                       
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        @if ($cartconer->contains($shop->id))
                        <a  class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a>  
                        @else
                        <a style="cursor:pointer;" offercat="{{$shop->id}}" class="btn-product btn-cart addnewcart"><span>{{__('app.addnewcart')}}</span></a>
                        @endif
                       
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a>{{$shop->category->ar_name}}</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{route('prodctdatils',$shop->id)}}">{{$shop->ar_name}}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        L.E{{$shop->price}}
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div>
                            <div  style="width: 20%;">
                             @php
                                 $avarge = $shop->review->average('review');
                             @endphp  
                             @for ($i=0;$i<5;$i++)
                               @if ($avarge>$i)
                               <i class="fa fa-star" style="color:#fcb941; font-size:11px;"></i>  
                               @else
                               <i class="fa fa-star" style="color:gray;font-size:11px;"></i>  
                               @endif  
                             @endfor
                            </div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( {{$shop->review->count()}} {{__('app.review')}} )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 col-lg-4 -->
        @endforeach
        @endlang
    </div><!-- End .row -->
</div><!-- End .products -->
@else
<div class="row" style="text-align: center; margin:30px;" >
    <div class="col-md-12 mb-3">
        <h3 style="color:rgb(246, 203, 203)">{{__('Prodect Is  Empty Comming To Soon')}}</h3>
    </div>
</div>
@endif

<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.addnewcart',function(e){
    e.preventDefault();
    var offercart = $(this).attr('offercat');
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
                $('#showcart').load(location.href +" #showcart");
                    alertify.set('notifier','position', 'top-right');
                     alertify.success(res.sms);
                     window.location.href ="/cart";
            }
        }
    });
});
$(document).on('click','.addnewwishit',function(e){
    e.preventDefault();
    var offerwishkde = $(this).attr('offerwisdr');
    $.ajax({
        type:"post",
        url:"/wishlistores/"+offerwishkde,
        data:{
            'id' : offerwishkde,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showwishlist').load(location.href +" #showwishlist");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href ='/wishlist';
            }
        }
    });
});
$(document).on('click','.addnewcommper',function(e){
    e.preventDefault();
    var offercomder = $(this).attr('offercomper');
    $.ajax({
        type:"post",
        url:"/commperstores/"+offercomder,
        data:{
            'id' : offercomder,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcommper').load(location.href + " #showcommper");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
    });
</script>