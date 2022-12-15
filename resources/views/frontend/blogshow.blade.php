@foreach($blogsedrt as $blog)
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