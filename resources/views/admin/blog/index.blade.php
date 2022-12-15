@extends('layouts.admin')
@section('contnet')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="showblogrt">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show All Table')}}
                <!-- Button trigger modal -->
<button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    {{__('Add New Blog')}}
  </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Blog Id')}}</th>
                                <th>{{__('Blog Name')}}</th>
                                <th>{{__('Blog Image')}}</th>
                                <th>{{__('Blog Edit')}}</th>
                                <th>{{__('Blog Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->name}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$blog->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a href="{{route('edit.blog',$blog->id)}}" class="btn btn-success">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <button  class="btn btn-danger deleteblogdrt" value="{{$blog->id}}" data-toggle="modal" data-target="#exampleModaldelete">{{__('Delete')}}</button>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!!$blogs->links()!!}
                    <style>
                        svg{
                            width: 20px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
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
        <form enctype="multipart/form-data" id="formblogre" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Name')}}</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Image')}}</label>
                <input type="file" name="image[]" multiple class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Short Description')}}</label>
                <textarea name="shorot_desc" class="form-control" id="" cols="5" rows="5"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Long Description')}}</label>
                <textarea name="long_desc" class="form-control" id="" cols="6" rows="6"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Blog Master Description')}}</label>
                <textarea name="master_desc" id="" cols="10" rows="10" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3" id="lodder" style="display: none;">
                <img src="{{asset('admin_panel/loading-gif.gif')}}" alt="">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addnewblog">{{__('Create New Blog')}}</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{-- End Add New Modal --}}
<div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formblogredelete" method="post">
          @csrf
          <div class="row">
              <div class="col-md-12 mb-3">
                  
                  <input type="hidden" name="id" id="offedelrde" class="form-control">
              </div>
              
              <div class="col-md-12 mb-3" style="color: red; text-align:center;">
                  <h2>{{__("Are Your Sure Deleted Blog ?")}}</h2>
              </div>
              <div class="col-md-12 mb-3" id="lodder" style="display: none;">
                  <img src="{{asset('admin_panel/loading-gif.gif')}}" alt="">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger deleteblog">{{__('Delete Blog')}}</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<script src="{{asset('jquery-3.6.0.min.js')}}">
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.deleteblogdrt',function(e){
    e.preventDefault();
    var offedelrde = $(this).val();
    $.ajax({
        type:"get",
        url:"/admin/showdeleteblogs/"+offedelrde,
        success:function(res)
        {
            if(res.blog)
            {
                $('#offedelrde').val(res.blog.id);
            }
        }
    });
});
$(document).on('click','.deleteblog',function(e){
var ofdesws = $('#offedelrde').val();
$.ajax({
    type:"post",
    url:"/admin/deleteblog/"+ofdesws,
    data:{
        'id' : ofdesws,
        '_token' : "{{csrf_token()}}",
    },
    success:function(res)
        {
            if(res)
            {
                $('#lodder').hide();
                $('#showblogrt').load(location.href + " #showblogrt");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                $('#exampleModaldelete').modal('hide');
            }
        }
})
});
$(document).on('click','#addnewblog',function(e){
    e.preventDefault();
    $('#lodder').show();
    var formdata = new FormData($('#formblogre')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createblog",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#lodder').hide();
                $('#showblogrt').load(location.href + " #showblogrt");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                $('#exampleModal').modal('hide');
            }
        }
    })
})
    })
</script>
@endsection
{{--  --}}