@extends('layouts.admin')
@section('contnet')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="" style="margin: 40px;">
    <!-- DataTales Example -->
    <div class="card shadow mb-4" id="showeder">
            <div class="table-responsive">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Page Update brands')}}
                        <a href="{{route('barnd.index')}}" style="float: right;" class="btn btn-info">{{__('Back table Barnd')}}</a>
                        </h6>
                        <div  style="margin: 10px;">
            <form enctype="multipart/form-data" id="formbarndeupde" method="post">
                @csrf
                <input type="hidden" name="id" id="offeders" value="{{$barnd->id}}">
                <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Barnd Name')}}</label>
                    <input type="text" name="en_name" value="{{$barnd->en_name}}" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم البرندات')}}</label>
                    <input type="text" name="ar_name" value="{{$barnd->ar_name}}" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                 <label for="">{{__('Barnd Image')}}</label>
                 <input type="file"  class="form-control" name="image">
                 <br><br>
                 <img src="{{asset('admin_panel/img/'.$barnd->image)}}" width="100" height="100" alt="">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Barnd Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" checked="{{$barnd->staus}}" value="1" id="">
                    {{__('Fashion')}}
                    <br><br>
                    <input type="radio" name="staus" checked="{{$barnd->staus}}" value="2" id="">
                    {{__('Electiens')}}
                    <br><br>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="button" class=" btn btn-success editbarnde">{{__('Update Barnd')}}</button>
                </div>
            </div>
            </form>
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
$(document).on('click','.editbarnde',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formbarndeupde')[0]);
    var offerdwe = $('#offeders').val();
    $.ajax({
        type:"post",
        url:"/admin/updatebarnd/"+offerdwe,
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
               $('#showeder').load(location.href + " #showeder");
                alert(res.sms);
            }
        }
    });
});
    });
</script>
@endsection