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
        <div class="card shadow mb-4" id="showsize">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Pge Show All Size')}}
                    <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        {{__('Create New Size')}}
                      </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Size Id')}}</th>
                                <th>{{__('Size Name')}}</th>
                                <th>{{__('Size Slug')}}</th>
                                <th>{{__('Size Date')}}</th>
                                <th>{{__('Size Edit')}}</th>
                                <th>{{__('Size Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sizes as $size)
                            <tr>
                                <td>{{$size->id}}</td>
                                <td>{{$size->en_name}}</td>
                                <td>{{$size->slug}}</td>
                                <td>{{\Carbon\Carbon::parse($size->created_at)->format('D , d M Y H:i:s')}}</td>
                                <td>
                                    <a class="btn btn-info editsize" offersizeedi="{{$size->id}}" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger deletesizes" offersizedelet="{{$size->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {!!$sizes->links()!!}
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
        <form enctype="multipart/form-data" id="formaddnew" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Size Name')}}</label>
                <input type="text" name="en_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('اسم المقاسات')}}</label>
                <input type="text" name="ar_name" class="form-control">
            </div>
        </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewsize">{{__('Add New Size')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Add New Size --}}
  <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="formaddnewupde" method="post">
        @csrf
        <input type="text" name="id" id="offesws">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Size Name')}}</label>
                <input type="text" name="en_name" id="show_size_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('اسم المقاسات')}}</label>
                <input type="text" name="ar_name" id="show_size_ar_name" class="form-control">
            </div>
        </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updatesize">{{__('Update Size')}}</button>
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
$(document).on('click','#addnewsize',function(e){
    e.preventDefault();
    var formdata = new  FormData($('#formaddnew')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createsize",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showsize').load(location.href + " #showsize");
                alert(res.sms);
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editsize',function(e){
    e.preventDefault();
    var offesws = $(this).attr('offersizeedi');
    $.ajax({
        type:"get",
        url:"/admin/editcsize/"+offesws,
        success:function(res)
        {
            if(res.size)
            {
                $('#offesws').val(res.size.id);
                $('#show_size_name').val(res.size.en_name);
                $('#show_size_ar_name').val(res.size.ar_name);
            }
        }
    });
});
$(document).on('click','.updatesize',function(e){
    e.preventDefault();
    var formupdeswq = new  FormData($('#formaddnewupde')[0]);
    var offdesq = $('#offesws').val();
    $.ajax({
        type:"post",
        url:"/admin/updatesize/"+offdesq,
        data:formupdeswq,
        processData:false,
        contentType:false,
        cache:false,
        enctype:"multipart/form-data",
        success:function(res)
        {
            if(res)
            {
                $('#showsize').load(location.href + " #showsize");
                alert(res.sms);
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deletesizes',function(e){
    e.preventDefault();
var offerszqdelte = $(this).attr('offersizedelet');
$.ajax({
    type:"get",
    url:"/admin/deletesize/"+offerszqdelte,
    data:{
        'id' : offerszqdelte,
        '_token' : "{{csrf_token()}}",
    },
    success:function(res)
    {
        if(res)
        {
            $('#showsize').load(location.href + " #showsize");
        }
    }
});
});
    });
  </script>
@endsection