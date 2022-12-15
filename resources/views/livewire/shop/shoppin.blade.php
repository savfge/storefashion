<div>
    <style>
        #rangeValue {
    position: relative;
    text-align: center;
    width: 60px;
    font-size: 1.25em;
    color: #fff;
    background: #27a0ff;
    margin-left: 15px;
    border-radius: 25px;
    font-weight: 500;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), -5px -5px 10px #fff, inset 5px 5px 10px rgba(0, 0, 0, 0.1), inset -5px -5px 5px rgba(255, 255, 255, 0.05);
}

.middle {
    position: relative;
    width: 100%;
    max-width: 500px;
    margin-top: 10px;
    display: inline-block;
}

.slider {
    position: relative;
    z-index: 1;
    height: 10px;
    margin: 0 15px;
}

.slider>.track {
    position: absolute;
    z-index: 1;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    border-radius: 5px;
    background-color: #b5d7f1;
}

.slider>.range {
    position: absolute;
    z-index: 2;
    left: 25%;
    right: 25%;
    top: 0;
    bottom: 0;
    border-radius: 5px;
    background-color: #27a0ff;
}

.slider>.thumb {
    position: absolute;
    z-index: 3;
    width: 30px;
    height: 30px;
    background-color: #27a0ff;
    border-radius: 50%;
}

.slider>.thumb.left {
    left: 25%;
    transform: translate(-15px, -10px);
}

.slider>.thumb.right {
    right: 25%;
    transform: translate(15px, -10px);
}

.range_slider {
    position: absolute;
    pointer-events: none;
    -webkit-appearance: none;
    z-index: 2;
    height: 10px;
    width: 100%;
    opacity: 0;
}

.range_slider::-webkit-slider-thumb {
    pointer-events: all;
    width: 30px;
    height: 30px;
    border-radius: 0;
    border: 0 none;
    background-color: red;
    cursor: pointer;
    -webkit-appearance: none;
}

#multi_range {
    margin: 0 auto;
    background-color: #27a0ff;
    border-radius: 20px;
    margin-top: 20px;
    text-align: center;
    width: 90px;
    font-weight: 500;
    font-size: 1.25em;
    color: #fff;
}
    </style>
    <div>
        <div class="container">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span></span> Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->
    
                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="ascname">{{__('Sorting Name A-Z')}}</option>
                                            <option value="descname">{{__('Sorting Name Z-A')}}</option>
                                            <option value="ascdate">{{__('Sorting Date Asc')}}</option>
                                            <option value="descdate">{{__('Sorting Date Desc')}}</option>
                                            <option value="ascprice">{{__('Sorting Height Price')}}</option>
                                            <option value="descprice">{{__('Sorting Low Price')}}</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                {{-- <div class="toolbox-layout">
                                    <a  style="cursor: pointer;" class="btn-layou categorylist">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="10" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="10" height="4" />
                                        </svg>
                                    </a>
    
                                    <a style="cursor: pointer;" class="btn-layout showcatder">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
    
                                    <a style="cursor: pointer;" class="btn-layout shop">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
    
                                    <a class="btn-layout pagefour" style="cursor: pointer;">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="18" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                            <rect x="18" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout --> --}}
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->
                        <div id="showcaflr">
                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @php
                                    $wishlisrtf = Cart::instance('wishlist')->content()->pluck('id');
                                @endphp
                                @php
                                    $cartcounr = Cart::instance('cart')->content()->pluck('id');
                                @endphp
                               @php
                               $commpercoun = App\Models\Commper::all()->pluck('prodect_id');
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
                                            <a href="{{route('prodctdatils',$shop->id)}}">
                                                <img src="{{asset('admin_panel/img/'.$shop->image)}}" style="height: 500px; width:500px;" alt="Product image" class="product-image">
                                            </a>
    
                                            <div class="product-action-vertical">
                                                @if ($wishlisrtf->contains($shop->id))
                                                <a style="cursor:pointer; color:rgb(246, 50, 44)" class="btn-product-icon btn-wishlist btn-expandable"><span>{{__('app.addtowishlistempty')}}</span></a>  
                                                @else
                                                <a style="cursor:pointer;" offerwishlist="{{$shop->id}}" class="btn-product-icon btn-wishlist btn-expandable addnewwhislit"><span>{{__('app.addtowishlist')}}</span></a>
                                                @endif
                                                
                                               @if ($commpercoun->contains($shop->id))
                                               <a  class="btn-product-icon btn-compare" style="color:orchid;background-color:#000;" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                               @else
                                               <a offercommper="{{$shop->id}}" class="btn-product-icon btn-compare addnewcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a> 
                                               @endif
                                               
                                            </div><!-- End .product-action-vertical -->
    
                                            <div class="product-action">
                                                @if ($cartcounr->contains($shop->id))
                                                <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a> 
                                                @else
                                                <a style="cursor: pointer;" offercart="{{$shop->id}}" class="btn-product btn-cart addnewcart"><span>{{__('app.addnewcart')}}</span></a> 
                                                @endif
                                            
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->
    
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="">{{$shop->category->en_name}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{route('prodctdatils',$shop->id)}}">{{$shop->en_name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                L.E{{$shop->price}}
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div>
                                                    <div style="width: 20%;">
                                                        @php
                                                            $avarage = $shop->review->average('review');
                                                        @endphp
                                                        @for ($i=0; $i<5;$i++)
                                                            @if ($avarage>$i)
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
                                            <a href="{{route('prodctdatils',$shop->id)}}">
                                                <img src="{{asset('admin_panel/img/'.$shop->image)}}" style="height: 500px; width:500px;" alt="Product image" class="product-image">
                                            </a>
    
                                            <div class="product-action-vertical">
                                                @if ($wishlisrtf->contains($shop->id))
                                                <a style="cursor:pointer; color:rgb(246, 50, 44)" class="btn-product-icon btn-wishlist btn-expandable"><span>{{__('app.addtowishlistempty')}}</span></a>  
                                                @else
                                                <a style="cursor:pointer;" offerwishlist="{{$shop->id}}" class="btn-product-icon btn-wishlist btn-expandable addnewwhislit"><span>{{__('app.addtowishlist')}}</span></a>
                                                @endif
                                                
                                               @if ($commpercoun->contains($shop->id))
                                               <a  class="btn-product-icon btn-compare" style="color:orchid;background-color:#000;" title="{{__('app.commpersde')}}"><span>{{__('app.commpersde')}}</span></a>  
                                               @else
                                               <a offercommper="{{$shop->id}}" class="btn-product-icon btn-compare addnewcommper" title="{{__('app.compare')}}"><span>{{__('app.compare')}}</span></a> 
                                               @endif
                                               
                                            </div><!-- End .product-action-vertical -->
    
                                            <div class="product-action">
                                                @if ($cartcounr->contains($shop->id))
                                                <a style="cursor: pointer" class="btn-product btn-cart disabled"><span>{{__('app.addnewcartdfe')}}</span></a> 
                                                @else
                                                <a style="cursor: pointer;" offercart="{{$shop->id}}" class="btn-product btn-cart addnewcart"><span>{{__('app.addnewcart')}}</span></a> 
                                                @endif
                                            
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->
    
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="">{{$shop->category->ar_name}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{route('prodctdatils',$shop->id)}}">{{$shop->ar_name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                L.E{{$shop->price}}
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div>
                                                    <div style="width: 20%;">
                                                        @php
                                                            $avarage = $shop->review->average('review');
                                                        @endphp
                                                        @for ($i=0; $i<5;$i++)
                                                            @if ($avarage>$i)
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
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {!!$shops->links()!!}
                                <style>
                                    svg{
                                        width: 20px;
                                    }
                                </style>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                            </div><!-- End .widget widget-clean -->
    
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        {{__('app.category')}}
                                    </a>
                                </h3><!-- End .widget-title -->
    
                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @php
                                                $categorys = App\Models\Category::all();
                                            @endphp
                                            @lang('en')
                                            @foreach($categorys as $category)
                                            @php
                                                $categorycount = App\Models\Prodect::categorycount($category->id);
                                            @endphp
                                            <div class="filter-item">
                                               
                                                <div class="custom-control custom-checkbox">
                                                    
                                                    <input type="checkbox" class="custom-control-input addnedr" offercategory="{{$category->id}}" id="cat-1">
                                                    <label class="custom-control-label addnedr" offercategory="{{$category->id}}" for="cat-1">{{$category->en_name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{$categorycount}}</span>
                                            </div><!-- End .filter-item -->
                                            @endforeach
                                            @else
                                            @foreach($categorys as $category)
                                            @php
                                                $categorycount = App\Models\Prodect::categorycount($category->id);
                                            @endphp
                                            <div class="filter-item">
                                               
                                                <div class="custom-control custom-checkbox">
                                                    
                                                    <input type="checkbox" class="custom-control-input addnedr" offercategory="{{$category->id}}" id="cat-1">
                                                    <label class="custom-control-label addnedr" offercategory="{{$category->id}}" for="cat-1">{{$category->ar_name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{$categorycount}}</span>
                                            </div><!-- End .filter-item -->
                                            @endforeach
                                            @endlang
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
    
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                        {{__('app.colour')}}
                                    </a>
                                </h3><!-- End .widget-title -->
    
                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            @php
                                                $colors = App\Models\Color::all();
                                            @endphp
                                            @foreach($colors as $color)
                                            <a class="showcolorpage" offercolor="{{$color->id}}" style="background:{{$color->slug}} "><span class="sr-only">{{$color->en_name}}</span></a>
                                            @endforeach
                                        </div><!-- End .filter-colors -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
    
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->
    
                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            @php
                                                $barnds = App\Models\Barnd::paginate(5);
                                            @endphp
                                            @foreach($barnds as $barnd)
                                            @php
                                                $countbard  = App\Models\Prodect::countbard($barnd->id); 
                                            @endphp
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" offerbarnd="{{$barnd->id}}" class="custom-control-input showbarnd" id="brand-1">
                                                    <label class="custom-control-label showbarnd" offerbarnd="{{$barnd->id}}" for="brand-1">{{$barnd->en_name}}</label>
                                                    <span class="item-count" style="float: right;">{{$countbard}}</span>
                                                </div><!-- End .custom-checkbox -->
                                                
                                            </div><!-- End .filter-item -->
                                            @endforeach
    
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
    
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                        Price
                                    </a>
                                </h3><!-- End .widget-title -->
    
                                <div class="middle">
                                    <div id="multi_range">
                                        <span id="left_value">25</span><span> ~ </span><span id="right_value">75</span>
                                    </div>
                                    <div class="multi-range-slider my-2">
                                        <input type="range" id="input_left" class="range_slider" min="0" max="100" value="25" onmousemove="left_slider(this.value)">
                                        <input type="range" id="input_right" class="range_slider" min="0" max="100" value="75" onmousemove="right_slider(this.value)">
                                        <div class="slider">
                                            <div class="track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                            <div class="thumb right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
        <script>
            const input_left = document.getElementById("input_left");
const input_right = document.getElementById("input_right");

const thumb_left = document.querySelector(".slider > .thumb.left");
const thumb_right = document.querySelector(".slider > .thumb.right");
const range = document.querySelector(".slider > .range");

const set_left_value = () => {
    const _this = input_left;
    const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

    _this.value = Math.min(parseInt(_this.value), parseInt(input_right.value) - 1);

    const percent = ((_this.value - min) / (max - min)) * 100;
    thumb_left.style.left = percent + "%";
    range.style.left = percent + "%";
};

const set_right_value = () => {
    const _this = input_right;
    const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

    _this.value = Math.max(parseInt(_this.value), parseInt(input_left.value) + 1);

    const percent = ((_this.value - min) / (max - min)) * 100;
    thumb_right.style.right = 100 - percent + "%";
    range.style.right = 100 - percent + "%";
};

input_left.addEventListener("input", set_left_value);
input_right.addEventListener("input", set_right_value);

function left_slider(value) {
    document.getElementById('left_value').innerHTML = value;
}
function right_slider(value) {
    document.getElementById('right_value').innerHTML = value;
}
        </script>
        <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.addnedr',function(e){
        e.preventDefault();
        var offerdcat = $(this).attr('offercategory');
        $.ajax({
            type:"get",
            url:"/shops/"+offerdcat,
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('click','.categorylist',function(e){
        e.preventDefault();
        $.ajax({
            type:"get",
            url:"/categorylist",
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('click','.showcolorpage',function(e){
        e.preventDefault();
        var offercolor = $(this).attr('offercolor');
        $.ajax({
            type:"get",
            url:"/showcolors/"+offercolor,
            dataType:'html',
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('click','.showbarnd',function(e){
        e.preventDefault();
        var offerbaer = $(this).attr('offerbarnd');
        $.ajax({
            type:"get",
            url:"/showbarnds/"+offerbaer,
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('change','.range_slider',function(e){
        e.preventDefault();
        var input_left = $('#input_left').val();
        var input_right = $('#input_right').val();
        $.ajax({
            type:"get",
            url:"/filterprice",
            data:{input_left:input_left,input_right:input_right},
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('change','#sortby',function(e){
        e.preventDefault();
        var sortby = $('#sortby').val();
        $.ajax({
            type:"get",
            url:"/sortby",
            data:{sortby:sortby},
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        })
    })
    $(document).on('click','.showcatder',function(e){
        e.preventDefault();
        $.ajax({
            type:"get",
            url:"/showcatder",
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('click','.pagefour',function(e){
        e.preventDefault();
        $.ajax({
            type:"get",
            url:"/pagefour",
            dataType:'html',
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            }
        });
    });
    $(document).on('click','.shop',function(e){
        e.preventDefault();
        $.ajax({
            type:"get",
            url:"/shopw",
            dataType:"html",
            success:function(res)
            {
                if(res)
                {
                    $('#showcaflr').html(res);
                }
            } 
        });
    });
    $(document).on('click','.addnewcart',function(e){
        e.preventDefault();
        var offercser = $(this).attr('offercart');
        $.ajax({
            type:"post",
            url:"/carts/"+offercser,
            data:{
                'id' : offercser,
                '_token'  : "{{csrf_token()}}",
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
    $(document).on('click','.addnewwhislit',function(e){
        e.preventDefault();
        var offerwish = $(this).attr('offerwishlist');
        $.ajax({
            type:"post",
            url:"/wishlistores/"+offerwish,
            data:{
                'id' : offerwish,
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
        var offercommper = $(this).attr('offercommper');
        $.ajax({
            type:"post",
            url:"/commperstores/"+offercommper,
            data:{
                'id' : offercommper,
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
        })
    })
            });
        </script>
    </div>
    
</div>