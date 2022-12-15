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
        <div class="card shadow mb-4" id="showsilder">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show All table')}}
                <!-- Button trigger modal -->
<button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    {{__('Add New Silder')}}
  </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Sidler Id')}}</th>
                                <th>{{__('Sidler Name')}}</th>
                                <th>{{__('Sidler Slug')}}</th>
                                <th>{{__('Sidler Image')}}</th>
                                <th>{{__('Sidler Edit')}}</th>
                                <th>{{__('Sidler Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($silders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->en_name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$item->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <a offersildered="{{$item->id}}" class="btn btn-info editsilder" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a offerdeletesid="{{$item->id}}" class="btn btn-danger silderdleted">{{__('Delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$silders->links()!!}
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
          <form enctype="multipart/form-data" id="formsilders" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Sidler Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنزلق')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder tiitle')}}</label>
                    <input type="text" name="en_title" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('لقب المنزلق')}}</label>
                    <input type="text" name="ar_title" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image[]" multiple id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Sidler Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1">
                    {{__('Sidler')}}
                    <br><br>
                    <input type="radio" name="staus" value="2">
                    {{__('Bunner')}}
                    <br><br>
                    <input type="radio" name="staus" value="3">
                    {{__('Bunner')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewsilder">{{__('Create New Silder')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Add New Modal --}}

  <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formsildersupdate" method="post">
            @csrf
            <div class="row">
                <input type="text" name="id" id="offerede">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Sidler Name')}}</label>
                    <input type="text" name="en_name" id="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنزلق')}}</label>
                    <input type="text" name="ar_name" id="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Silder tiitle')}}</label>
                    <input type="text" name="en_title" id="en_title" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('لقب المنزلق')}}</label>
                    <input type="text" name="ar_title" id="ar_titlee" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image"  id="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Sidler Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1">
                    {{__('Sidler')}}
                    <br><br>
                    <input type="radio" name="staus" value="2">
                    {{__('Bunner')}}
                    <br><br>
                    <input type="radio" name="staus" value="3">
                    {{__('Bunner')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success updatesilders">{{__('Update Silder')}}</button>
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
$(document).on('click','#addnewsilder',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formsilders')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createsilder",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showsilder').load(location.href + " #showsilder");
                alert(res.sms);
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editsilder',function(e){
    e.preventDefault();
    var offerede = $(this).attr('offersildered');
    $.ajax({
        type:"get",
        url:"/admin/editcsilder/"+offerede,
        success:function(res)
        {
            if(res.silder)
            {
                $('#offerede').val(res.silder.id);
                $('#en_name').val(res.silder.en_name);
                $('#ar_name').val(res.silder.ar_name);
                $('#en_title').val(res.silder.en_title);
                $('#ar_titlee').val(res.silder.ar_title);
            }
        }
    });
});
$(document).on('click','.updatesilders',function(e){
    e.preventDefault();
    var offerupder = $('#offerede').val();
    var formdatdw = new FormData($('#formsildersupdate')[0]);
    $.ajax({
        type:"post",
        url:"/admin/updatesilder/"+offerupder,
        enctype:"multipart/form-data",
        processData:false,
        data:formdatdw,
        cache:false,
        contentType:false,
        success:function(res)
        {
            if(res)
            {
                $('#showsilder').load(location.href + " #showsilder");
                alert(res.sms);
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.silderdleted',function(e){
    e.preventDefault();
    var offerdelr = $(this).attr('offerdeletesid');
    $.ajax({
        type:"get",
        url:"/admin/deletesilder/"+offerdelr,
        data:{
            'id' : offerdelr,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showsilder').load(location.href + " #showsilder");
                alert(res.sms);
            }
        }
    })
})
    });
  </script>
@endsection