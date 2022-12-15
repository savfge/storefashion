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
        <div class="card shadow mb-4" id="showder">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Edit About')}}
                    <a style="float: right;" href="{{route('about.index')}}" class="btn btn-dark">
                        {{__('back To Show All table')}}
                </a>
                </h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <form enctype="multipart/form-data" id="formupfer" method="POST">
                        @csrf
                        <input type="text" id="offerid" name="id" value="{{$about->id}}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('About Name')}}</label>
                                <input type="text" name="name" value="{{$about->name}}" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('About Title 1')}}</label>
                                <input type="text" name="title1" value="{{$about->title1}}" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('About Title 2')}}</label>
                                <input type="text" name="title2" value="{{$about->title2}}" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="file" name="image" class="form-control" id="">
                                <bR><br>
                                <img src="{{asset('admin_panel/img/'.$about->image)}}" width="100" height="100" alt="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('About Description')}}</label>
                                <textarea name="desc1" class="form-control" cols="5" rows="5">{{$about->desc1}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('About Staus')}}</label>
                                <br>
                                <input type="radio" {{$about->staus==1 ? 'checked' : ''}} name="staus" value="1">
                                {{__('About')}}
                                <br><br>
                                <input type="radio" name="staus" {{$about->staus==2 ? 'checked' :''}} value="2">
                                {{__('Barnd')}}
                                <br><br>
                                <input type="radio" name="staus" {{$about->staus==3 ? 'checked' : ''}} value="3">
                                {{__('Team')}}
                                <br><br>
                                <input type="radio" name="staus" {{$about->staus==4 ? 'checked'  : ''}} value="4">
                                {{__('Tast')}}
                                <br><br>
                            </div>
                            <div class="col-md-12 mb-3" style="display: none" id="loder">
                                <img src="{{asset('admin_panel/loading-gif.gif')}}" style="height: 50px width:50px; margin:16px;" alt="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success btn-lg editaboute" type="button">{{_('Update About')}}</button>
                            </div>
                        </form>
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
$(document).on('click','.editaboute',function(e){
    e.preventDefault();
    $('#loder').show();
    var offrwsw = $('#offerid').val();
    var formdataupdate = new FormData($('#formupfer')[0]);
    $.ajax({
        type:"post",
        url:"/admin/updateabout/"+offrwsw,
        data:formdataupdate,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                
                $('#loder').hide(1000);
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
                window.location.href ="/admin/about";
                
            }
        }
    })
})
    })
</script>
@endsection