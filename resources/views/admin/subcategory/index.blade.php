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
                <h6 class="m-0 font-weight-bold text-primary">{{__('Pge Show All Subcategory')}}
                    <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        {{__('Create New Sub Category')}}
                      </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Sub Category Id')}}</th>
                                <th>{{__('Sub Category Name')}}</th>
                                <th>{{__('Sub Category Slug')}}</th>
                                <th>{{__('Category Name')}}</th>
                                <th>{{__('Subcategory Edit')}}</th>
                                <th>{{__('Subcategory Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorys as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->en_name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->category->en_name}}</td>
                                <td>
                                    <a class="btn btn-info edicategory" offersubcartedi="{{$category->id}}" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger deletecategory" offersizedeletsunbr="{{$category->id}}">{{__('Delete')}}</a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {!!$categorys->links()!!}
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
        <form enctype="multipart/form-data" id="formasubcatgory" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Sub Category Name')}}</label>
                <input type="text" name="en_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Category Name')}}</label>
                <select name="category_id" class="form-control">
                    @php
                        $subcatgorys = App\Models\Category::all();
                    @endphp
                    @foreach ($subcatgorys as $subcatgory)
                        <option value="{{$subcatgory->id}}">{{$subcatgory->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('اسم الاصناف')}}</label>
                <input type="text" name="ar_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Sub Category Staus')}}</label>
                <br>
                <input type="radio" name="staus" value="1">
                {{__('Man')}}
                <br><br>
                <input type="radio" name="staus" value="2">
                {{__('Women')}}
                <br><br>
                <input type="radio"  name="staus" value="3">
                {{__('Shoes')}}
                <br><br>
                <input type="radio" {{$category->staus==2 ? 'checked':''}}  name="staus" value="4">
                {{__('Bag')}}
                <br><br>
            </div>
        </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewcategory">{{__('Add New Sub Category')}}</button>
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
        <input type="hidden" name="id" id="offesws">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">{{__('Sub Category Name')}}</label>
                <input type="text" name="en_name" id="show_size_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Category Name')}}</label>
                <select name="category_id" id="category_id" class="form-control">
                    @php
                        $subcatgorys = App\Models\Category::all();
                    @endphp
                    @foreach ($subcatgorys as $subcatgory)
                        <option value="{{$subcatgory->id}}">{{$subcatgory->en_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('اسم الاصناف')}}</label>
                <input type="text" name="ar_name" id="show_size_ar_name" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">{{__('Sub Category Staus')}}</label>
                <br>
                <input type="radio" id="staus"  name="staus" value="1">
                {{__('Man')}}
                <br><br>
                <input type="radio" {{$category->staus==2 ? 'checked':''}}  name="staus" value="2">
                {{__('Women')}}
                <br><br>
                <input type="radio" {{$category->staus==2 ? 'checked':''}}  name="staus" value="3">
                {{__('Shoes')}}
                <br><br>
                <input type="radio" {{$category->staus==2 ? 'checked':''}}  name="staus" value="4">
                {{__('Bag')}}
                <br><br>
            </div>
        </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updatesubcate">{{__('Update SubCategory')}}</button>
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
$(document).on('click','#addnewcategory',function(e){
    e.preventDefault();
    var formdata = new  FormData($('#formasubcatgory')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createsubcattgory",
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
$(document).on('click','.edicategory',function(e){
    e.preventDefault();
    var offesws = $(this).attr('offersubcartedi');
    $.ajax({
        type:"get",
        url:"/admin/editcsubcattgory/"+offesws,
        success:function(res)
        {
            if(res.category)
            {
                $('#offesws').val(res.category.id);
                $('#show_size_name').val(res.category.en_name);
                $('#show_size_ar_name').val(res.category.ar_name);
                $('#category_id').val(res.category.category_id);
            }
        }
    });
});
$(document).on('click','.updatesubcate',function(e){
    e.preventDefault();
    var formupdeswq = new  FormData($('#formaddnewupde')[0]);
    var offdesq = $('#offesws').val();
    $.ajax({
        type:"post",
        url:"/admin/updatesubcattgory/"+offdesq,
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
$(document).on('click','.deletecategory',function(e){
    e.preventDefault();
var offerszqdelte = $(this).attr('offersizedeletsunbr');
$.ajax({
    type:"get",
    url:"/admin/deletesubcattgory/"+offerszqdelte,
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