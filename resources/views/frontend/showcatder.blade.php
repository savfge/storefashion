<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($shops as $shop)
        <div class="col-6">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <span class="product-label label-new">{{$shop->new==1 ? 'New' : 'Sall'}}</span>
                    <a href="product.html">
                        <img src="{{asset('admin_panel/img/'.$shop->image)}}" style="width: 900px; height:900px;" alt="Product image" class="product-image">
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
                    <h3 class="product-title"><a href="product.html">{{$shop->en_name}}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        L.E{{$shop->price}}
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-thumbs">
                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 -->

       @endforeach
    </div><!-- End .row -->
</div><!-- End .products -->