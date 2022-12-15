
<div class="product product-list">
    @foreach($shops as $shop)
    <br><br>
    <div class="row">
        <div class="col-6 col-lg-3">
            <figure class="product-media">
                <span class="product-label label-new">{{$shop->new==1 ? 'New' : 'Sall'}}</span>
                <a href="{{route('prodctdatils',$shop->id)}}">
                    <img src="{{asset('admin_panel/img/'.$shop->image)}}" style="width:300px; height:300px;" alt="Product image" class="product-image">
                </a>
            </figure><!-- End .product-media -->
        </div><!-- End .col-sm-6 col-lg-3 -->

        <div class="col-6 col-lg-3 order-lg-last">
            <div class="product-list-action">
                <div class="product-price">
                    L.E{{$shop->price}}
                </div><!-- End .product-price -->
                <div class="ratings-container">
                    <div class="ratings">
                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                    </div><!-- End .ratings -->
                    <span class="ratings-text">( 2 Reviews )</span>
                </div><!-- End .rating-container -->

                <div class="product-action">
                    <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                    <a href="#" class="btn-product btn-compare" title="Compare"><span>compare</span></a>
                </div><!-- End .product-action -->

                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
            </div><!-- End .product-list-action -->
        </div><!-- End .col-sm-6 col-lg-3 -->

        <div class="col-lg-6">
            <div class="product-body product-action-inner">
                <a href="#" class="btn-product btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                <div class="product-cat">
                    <a href="#">Women</a>
                </div><!-- End .product-cat -->
                <h3 class="product-title"><a href="product.html">{{$shop->en_name}}</a></h3><!-- End .product-title -->

                <div class="product-content">
                    <p>{{$shop->short_desc}}<br><br> </p>
                </div><!-- End .product-content -->
            </div><!-- End .product-body -->
        </div><!-- End .col-lg-6 -->
    </div><!-- End .row -->
    @endforeach
</div><!-- End .product -->
</div>