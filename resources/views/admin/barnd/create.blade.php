@extends('layouts.admin')
@section('contnet')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="" style="margin: 40px;"></div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Page Add new brands')}}
                <a href="{{route('barnd.index')}}" style="float: right;" class="btn btn-info">{{__('Back table Barnd')}}</a>
                </h6>
                <div  style="margin: 10px;">
            <form enctype="multipart/form-data" id="formbarnde" method="post">
                @csrf
                <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Barnd Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم البرندات')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                 <label for="">{{__('Barnd Image')}}</label>
                 <input type="file" multiple class="form-control" name="image[]">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Barnd Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" id="">
                    {{__('Fashion')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" id="">
                    {{__('Electiens')}}
                    <br><br>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="button" class=" btn btn-info" id="addnewbarnd">{{__('Create New Barnd')}}</button>
                </div>
            </div>
        </div>
            </form>
            </div>
        </div>
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
$(document).on('click','#addnewbarnd',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formbarnde')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createstore",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                window.loaction.href='/barnd';
                alert(res.sms);
            }
        }
    });
});
    });
</script>
@endsection