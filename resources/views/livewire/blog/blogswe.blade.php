<div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div id="showblogder">
                    @foreach($blogs as $blog)
                    <article class="entry">
                        <figure class="entry-media">
                            <a href="{{route('blogs',$blog->id)}}">
                                <img src="{{asset('admin_panel/img/'.$blog->image)}}"  alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#">John Doe</a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="#">Nov 22, 2018</a>
                                <span class="meta-separator">|</span>
                                <a href="#">2 Comments</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                <a href="{{route('blogs',$blog->id)}}">{{$blog->name}}.</a>
                            </h2><!-- End .entry-title -->
                            <div class="entry-content">
                                <p>{{$blog->shorot_desc}}<br><br></p>
                                <a href="{{route('blogs',$blog->id)}}" class="read-more">Continue Reading</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                    @endforeach
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                           {!!$blogs->links()!!}
                           <style>
                            svg{
                                width: 20px;
                            }
                           </style>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                            <form  enctype="multipart/form-data" id="formsearchblog" method="post">
                                @csrf
                                <label for="ws" class="sr-only">Search in blog</label>
                                <input type="search" class="form-control" name="blogsearch" id="ws" placeholder="Search in blog" required>
                                <button type="button" id="showsearch" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                            </form>
                        </div><!-- End .widget -->

                        <div class="widget widget-cats">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                            <ul>
                                <li><a href="#">Lifestyle<span>3</span></a></li>
                                <li><a href="#">Shopping<span>3</span></a></li>
                                <li><a href="#">Fashion<span>1</span></a></li>
                                <li><a href="#">Travel<span>3</span></a></li>
                                <li><a href="#">Hobbies<span>2</span></a></li>
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                @foreach($bloglastesw as $bloglastes)
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="{{asset('admin_panel/img/'.$bloglastes->image)}}" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 22, 2018</span>
                                        <h4><a href="#">djskdsjdsjk</a></h4>
                                    </div>
                                </li>
                                @endforeach
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->
                        <div class="widget widget-banner-sidebar">
                            <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                            
                            <div class="banner-sidebar banner-overlay">
                                <a href="#">
                                    <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner-ad -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->

                            <div class="tagcloud">
                                <a href="#">fashion</a>
                                <a href="#">style</a>
                                <a href="#">women</a>
                                <a href="#">photography</a>
                                <a href="#">travel</a>
                                <a href="#">shopping</a>
                                <a href="#">hobbies</a>
                            </div><!-- End .tagcloud -->
                        </div><!-- End .widget -->

                        <div class="widget widget-text">
                            <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                            <div class="widget-text-content">
                                <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                            </div><!-- End .widget-text-content -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>

<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','#showsearch',function(e){
    e.preventDefault();
    var foormsece = new FormData($('#formsearchblog')[0]);
    $.ajax({
        type:"post",
        url:"/blogsearchs",
        enctype:"multipart/form-data",
        data:foormsece,
        dataType:"html",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showblogder').html(res);
            }
        }
    })
})
    });
    // 
</script>