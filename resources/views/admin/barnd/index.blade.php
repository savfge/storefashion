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
        <div class="card shadow mb-4" id="shoowbarnde">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show All Table')}}
                <a href="{{route('barnd.create')}}" style="float: right;" class="btn btn-info">{{__('Create New Barnd')}}</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Barnd Id')}}</th>
                                <th>{{__('Barnd Name')}}</th>
                                <th>{{__('Barnd Slug')}}</th>
                                <th>{{__('Barnd Image')}}</th>
                                <th>{{__('Barnd Staus')}}</th>
                                <th>{{__('Change Staus')}}</th>
                                <th>{{__('Barnd Edit')}}</th>
                                <th>{{__('Barnd Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barnds as $barnd)
                            <tr>
                                <td>{{$barnd->id}}</td>
                                <td>{{$barnd->en_name}}</td>
                                <td>{{$barnd->slug}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$barnd->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    {{$barnd->staus==1 ? 'Fashion' : 'Elecriens'}}
                                </td>
                                <td>
                                    @if ($barnd->staus==1)
                                        <a  class="btn btn-danger unblidesws" offerunces="{{$barnd->id}}">{{__('Unlsheds')}}</a>
                                    @else
                                    <a publisheds="{{$barnd->id}}" class="btn btn-primary publisheds">{{__('Publisheds')}}</a> 
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('edit',$barnd->id)}}" class="btn btn-info">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a offerdelete="{{$barnd->id}}" class="btn btn-danger deletebren">{{__('Delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$barnds->links()!!}
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
    <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','.deletebren',function(e){
    e.preventDefault();
    var ofdelede = $(this).attr('offerdelete');
    $.ajax({
        type:"get",
        url:"/admin/deletebarnd/"+ofdelede,
        data:{
            'id' : ofdelede,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#shoowbarnde').load(location.href + " #shoowbarnde");
                alert(res.sms);
            }
        }
    });
});
$(document).on('click','.unblidesws',function(e){
    e.preventDefault();
    var offeswsxs = $(this).attr('offerunces');
    $.ajax({
        type:"post",
        url:"/admin/unblishedsw/"+offeswsxs,
        data:{
            'id' : offeswsxs,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#shoowbarnde').load(location.href + " #shoowbarnde");
                alert(res.sms);
            }
        } 
    })
});
$(document).on('click','.publisheds',function(e){
    e.preventDefault();
    var publisheds = $(this).attr('publisheds');
    $.ajax({
        type:"post",
        url:"/admin/publisheds/"+publisheds,
        data:{
            'id' : publisheds,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#shoowbarnde').load(location.href + " #shoowbarnde");
                alert(res.sms);
            }
        } 
    })
})
        });
    </script>
@endsection