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
        <div class="card shadow mb-4" id="showcategory">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show All Table')}}
                <!-- Button trigger modal -->
<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    {{__('Add New Category')}}
  </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Color  Id')}}</th>
                                <th>{{__('Color Name')}}</th>
                                <th>{{__('Color Slug')}}</th>
                                <th>{{__('Start date')}}</th>
                                <th>{{__('Color Edit')}}</th>
                                <th>{{__('Color Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colors as $color)
                            <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$color->en_name}}</td>
                                <td>{{$color->slug}}</td>
                                <td>{{\Carbon\Carbon::parse($color->created_at)->format('M , Y D')}}</td>
                                <td>
                                    <a offrdeedicolor="{{$color->id}}" class="btn btn-success edicolor" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a offdeetedcolor="{{$color->id}}" class="btn btn-danger deletecolor">{{__('Delete')}}</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!!$colors->links()!!}
                    <style>
                        svg{
                            height: 30px;
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
          <form enctype="multipart/form-data" id="formaddncolor" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Color Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم الالوان')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="addnewcolor">{{__('Create New Color')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Add NEw Modal --}}
  <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formupdercollor" method="post">
            @csrf
            <input type="text" name="id" id="offercaswcoolor">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <input type="text" name="en_name" id="editnamecolor" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم الاصناف')}}</label>
                    <input type="text" name="ar_name" id="editarnamecolor" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success editcolor">{{__('Update Category')}}</button>
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
$(document).on('click','#addnewcolor',function(e){
    e.preventDefault();
    var formdatacolor = new FormData($('#formaddncolor')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createcolor",
        enctype:"multipart/form-data",
        data:formdatacolor,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                alert(res.sms);
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.edicolor',function(e){
    e.preventDefault();
    var offercaswcoolor = $(this).attr('offrdeedicolor');
    $.ajax({
        type:"get",
        url:"/admin/editcaolor/"+offercaswcoolor,
        success:function(res)
        {
            if(res.color)
            {
                $('#offercaswcoolor').val(res.color.id);
                $('#editnamecolor').val(res.color.en_name);
                $('#editarnamecolor').val(res.color.ar_name);
            }
        }
    });
});
$(document).on('click','.editcolor',function(e){
    e.preventDefault();
    var formupdeswcol = new FormData($('#formupdercollor')[0]);
    var offrupdeccolo = $('#offercaswcoolor').val();
    $.ajax({
        type:"post",
        url:"/admin/updatecolor/"+offrupdeccolo,
        enctype:"multipart/form-data",
        data:formupdeswcol,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                alert(res.sms);
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deletecolor',function(e){
    e.preventDefault();
    var ogfeszsaqcolor = $(this).attr('offdeetedcolor');
    $.ajax({
        type:"get",
        url:"/admin/deletecolor/"+ogfeszsaqcolor,
        data:{
            'id' : ogfeszsaqcolor,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                alert(res.sms);
            }
        }
    })
})
        });
    </script>
@endsection