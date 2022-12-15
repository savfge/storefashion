@extends('layouts.admin')
@section('contnet')
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div style="margin: 40px">

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="showblfrt">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Update Blog')}}
                <!-- Button trigger modal -->
<a href="{{route('blog.index')}}"  style="float: right;" class="btn btn-dark">
    {{__('Back Blog')}}
</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <form enctype="multipart/form-data" id="formblogupdate" method="post">
                    @csrf
                    <input type="hidden" name="id" id="offerider" value="{{$blog->id}}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">{{__('Blog Name')}}</label>
                            <input type="text" name="name" value="{{$blog->name}}" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">{{__('Blog Image')}}</label>
                            <input type="file" name="image" class="form-control">
                            <br><br>
                            <img src="{{asset('admin_panel/img/'.$blog->image)}}" width="100" height="100" alt="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">{{__('Blog Short Description')}}</label>
                            <textarea name="shorot_desc" class="form-control" id="" cols="3" rows="3">{{$blog->shorot_desc}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">{{__('Blog Long Description')}}</label>
                            <textarea name="long_desc" class="form-control" id="" cols="3" rows="3">{{$blog->long_desc}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">{{__('Blog Master Description')}}</label>
                            <textarea name="master_desc" id="" cols="3" rows="3" class="form-control">{{$blog->master_desc}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3" id="lodder" style="display: none;">
                            <img src="{{asset('admin_panel/loading-gif.gif')}}" alt="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="button" class="updateblog btn btn-success">{{__('Update Blog')}}</button>
                        </div>
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
$(document).on('click','.updateblog',function(e){
    e.preventDefault();
    $('#lodder').show();
    var formdataupde = new FormData($('#formblogupdate')[0]);
    var offerdewq = $('#offerider').val();
    $.ajax({
        type:"post",
        url:"/admin/updateblog/"+offerdewq,
        data:formdataupde,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                window.location.href ='/admin/blog';
                $('#lodder').hide(1000);
                $('#showblfrt').load(location.href + " #showblfrt");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                
            }
        }
    })
})
                });
            </script>
@endsection