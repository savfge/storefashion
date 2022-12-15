@extends('layouts.home')
@section('contnet')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Default With Sidebar<span>Single Post</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default With Sidebar</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            <img src="{{asset('admin_panel/img/'.$blog->image)}}" alt="image desc">
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
                                {{$blog->name}}
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="#">Lifestyle</a>,
                                <a href="#">Shopping</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content editor-content">
                                <p>{{$blog->shorot_desc}}<br><br></p>

                                <p>{{$blog->long_desc}}<br><br>.</p>

                            <div class="entry-footer row no-gutters flex-column flex-md-row">
                                <div class="col-md">
                                </div><!-- End .col -->

                                <div class="col-md-auto mt-2 mt-md-0">
                                    <div class="social-icons social-icons-color">
                                        <span class="social-label">Share this post:</span>
                                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .entry-footer row no-gutters -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                    <div class="comments">
                        <h3 class="title">{{$blog->comment->count()}} Comments</h3><!-- End .title -->

                        <ul>
                            <li id="showcommment">
                                @foreach($blog->comment as $item)
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="{{asset('assets/images/blog/comments/1.jpg')}}" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="javascript::void(0)" onclick="replyDev(this)" data-documentid="{{$item->id}}" class="comment-reply">Reply</a>
                                        <div class="comment-user">
                                            <h4><a href="#">{{$item->name}}</a></h4>
                                            <span class="comment-date">{{\Carbon\Carbon::parse($item->created_at)}}</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>{{$item->message}}. </p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                                <ul>
                                    <li id="showcommmentreply">
                                        @php
                                            $replys = App\Models\Reply::all();
                                        @endphp
                                        @foreach($replys as $reply)
                                        @if($reply->comment_id==$item->id)
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="{{asset('assets/images/blog/comments/2.jpg')}}" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <div class="comment-user">
                                                    <h4><a href="#">{{$reply->name}}</a></h4>
                                                    <span class="comment-date">{{\Carbon\Carbon::parse($reply->created_at)}}</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>{{$reply->commentmessd}}<br><br></p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                        @endif
                                        @endforeach
                                    </li>
                                </ul>
                                    <div id="showrertpdr" style="display: none">
                                <form  method="post" id="formreplyr" enctype="multipart/form-data">
                                     @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="">{{__('Raplies Name')}}</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">{{__('Message')}}</label>
                                        <textarea name="commentmessd" class="form-control"  id="" cols="5" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden"  name="comment_id" id="comment_id">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="submit" class="btn btn-success addewreply">{{__('Add New Replies')}}</button>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <a href="javascript::void(0)" class="btn btn-dark" onclick="closereplf(this)">{{__('Close')}}</a>
                                    </div>
                                </div>
                                </div>
                            </form>
                                @endforeach
                                
                            </li>

                            {{-- <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="assets/images/blog/comments/3.jpg" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="#" class="comment-reply">Reply</a>
                                        <div class="comment-user">
                                            <h4><a href="#">Johnathan Castillo</a></h4>
                                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                            </li> --}}
                        </ul>
                    </div><!-- End .comments -->
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Leave A Reply</h3><!-- End .title -->
                            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                        </div><!-- End .heading -->

                        <form method="post" enctype="multipart/form-data" id="formcomment">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea  name="message" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="reply-name" class="sr-only">Name</label>
                                    <input type="text" class="form-control" name="name" id="reply-name" name="reply-name" required placeholder="Name *">
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <label for="reply-email" class="sr-only">Email</label>
                                    <input type="email" class="form-control" name="email" id="reply-email" name="reply-email" required placeholder="Email *">
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                            <button type="button" class="btn btn-outline-primary-2 addnewcommnt">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div><!-- End .reply -->
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                            <form action="#">
                                <label for="ws" class="sr-only">Search in blog</label>
                                <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required>
                                <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
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
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/images/blog/sidebar/post-1.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 22, 2018</span>
                                        <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/images/blog/sidebar/post-2.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 19, 2018</span>
                                        <h4><a href="#">Cras ornare tristique elit.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/images/blog/sidebar/post-3.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 12, 2018</span>
                                        <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/images/blog/sidebar/post-4.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 25, 2018</span>
                                        <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                    </div>
                                </li>
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->

                        <div class="widget widget-banner-sidebar">
                            <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                            
                            <div class="banner-sidebar">
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
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function replyDev(caller)
    {
        // document.getElementById('commentId').value=$(caller).attr('data-documentid');
        document.getElementById('comment_id').value=$(caller).attr('data-documentid');
        
        $('#showrertpdr').insertAfter($(caller));
       
        $('#showrertpdr').show();
    }
    function closereplf(caller)
    {
        $('#showrertpdr').hide();
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
$(document).on('click','.addewreply',function(e){
    e.preventDefault();
    var formreplrd = new FormData($('#formreplyr')[0]);
    $.ajax({
        type:"post",
        url:"/replystores",
        enctype:"multipart/form-data",
        data:formreplrd,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcommmentreply').load(location.href + " #showcommmentreply");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    })
})
$(document).on('click','.addnewcommnt',function(e){
    e.preventDefault();
    var formdatablogrt = new FormData($('#formcomment')[0]);
    $.ajax({
        type:"post",
        url:"/commentstroes",
        enctype:"multipart/form-data",
        data:formdatablogrt,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcommment').load(location.href + " #showcommment");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
    });
</script>
{{--  --}}
@endsection