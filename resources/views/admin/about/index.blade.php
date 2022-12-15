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
        <div class="card shadow mb-4" id="showaboutr">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show All table')}}
                    <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        {{__('Create New  About')}}
                      </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('About Id')}}</th>
                                <th>{{__('About Name')}}</th>
                                <th>{{__('About Title')}}</th>
                                <th>{{__('About Image')}}</th>
                                <th>{{__('About Edit')}}</th>
                                <th>{{__('About Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $aabout)
                            <tr>
                                <td>{{$aabout->id}}</td>
                                <td>{{$aabout->name}}</td>
                                <td>{{$aabout->title1}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$aabout->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a href="{{route('edit.about',$aabout->id)}}" class="btn btn-info">{{__('Edit')}}</a>
                                </td>
                                <td>
                                   <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-danger deleteabout" value="{{$aabout->id}}" data-toggle="modal" data-target="#exampleModaldelete">
                                     {{__('Delete')}}
                                   </button>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {!!$abouts->links()!!}
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formaddnewabout" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('About Name')}}</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('About Title 1')}}</label>
                    <input type="text" name="title1" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('About Title 2')}}</label>
                    <input type="text" name="title2" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image[]" multiple class="form-control" id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('About Description')}}</label>
                    <textarea name="desc1" class="form-control" cols="5" rows="5"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('About Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1">
                    {{__('About')}}
                    <br><br>
                    <input type="radio" name="staus" value="2">
                    {{__('Barnd')}}
                    <br><br>
                    <input type="radio" name="staus" value="3">
                    {{__('Team')}}
                    <br><br>
                    <input type="radio" name="staus" value="4">
                    {{__('Tast')}}
                    <br><br>
                </div>
                <div class="col-md-12 mb-3" style="display: none" id="loder">
                    <img src="{{asset('admin_panel/loading-gif.gif')}}" style="height: 50px width:50px; margin:16px;" alt="">
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewabout">{{__('Create New About')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="deleteform" method="post">
            @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <input type="hidden" name="id" id="offerdwqserr">
            </div>
            <div class="col-md-12 mb-3">
                <h3 style="color:red; text-align:center; margin:16px;">{{__('Are Your Sure Deleted About ?')}}</h3>
            </div>
            <div class="col-md-12 mb-3" style="display: none" id="loder">
                <img src="{{asset('admin_panel/loading-gif.gif')}}" style="height: 50px width:50px; margin:16px;" alt="">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger deleteabourt">{{__('Delete About')}}</button>
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
$(document).on('click','.deleteabout',function(e){
    e.preventDefault();
    var offerdwqserr = $(this).val();
    $.ajax({
        type:"get",
        url:"/admin/deleteabout/"+offerdwqserr,
        success:function(res)
        {
            if(res.about)
            {
                $('#offerdwqserr').val(res.about.id);
            }
        }
    });
});
$(document).on('click','.deleteabourt',function(e){
    e.preventDefault();
    $('#loder').show();
    var formdatadelete = new FormData($('#deleteform')[0]);
    var offwwsaq = $('#offerdwqserr').val();
    $.ajax({
        type:"post",
        url:"/admin/delteaboutse/"+offwwsaq,
        enctype:"multipart/form-data",
        data:formdatadelete,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#loder').hide(1000);
                $('#showaboutr').load(location.href + " #showaboutr");
                alertify.set('notifier','position', 'top-right');
                alertify.error(res.sms);
                $('#exampleModaldelete').modal('hide');
            }
        }
    })
})
// 
$(document).on('click','#addnewabout',function(e){
    e.preventDefault();
    $('#loder').show();
    var forrmdata = new FormData($('#formaddnewabout')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createabout",
        enctype:"multipart/form-data",
        data:forrmdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#loder').hide(1000)
                $('#showaboutr').load(location.href + " #showaboutr");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                $('#exampleModal').modal('hide');
            }
        }
    })
})
        });
    </script>
@endsection
{{-- createabout --}}