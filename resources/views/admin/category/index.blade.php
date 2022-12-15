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
                                <th>{{__('Category  Id')}}</th>
                                <th>{{__('Category Name')}}</th>
                                <th>{{__('Category Slug')}}</th>
                                <th>{{__('Start date')}}</th>
                                <th>{{__('Category Edit')}}</th>
                                <th>{{__('Category Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorys as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->en_name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{\Carbon\Carbon::parse($category->created_at)->format('M , Y D')}}</td>
                                <td>
                                    <a offrdeedi="{{$category->id}}" class="btn btn-success editcatde" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</a>
                                </td>
                                <td>
                                    <a offdeeted="{{$category->id}}" class="btn btn-danger deletecatder">{{__('Delete')}}</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {!!$categorys->links()!!}
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
          <form enctype="multipart/form-data" id="formaddnewcat" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم الاصناف')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" >
                    {{__('Man && Women')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" >
                    {{__('Accceriess && Shoes')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="addnewcatde">{{__('Create New Category')}}</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formupdernewcat" method="post">
            @csrf
            <input type="text" name="id" id="offercasw">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <input type="text" name="en_name" id="editname" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم الاصناف')}}</label>
                    <input type="text" name="ar_name" id="editarname" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" value="1" >
                    {{__('Man && Women')}}
                    <br><br>
                    <input type="radio" name="staus" value="2" >
                    {{__('Accceriess && Shoes')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success editcatder">{{__('Update Category')}}</button>
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
$(document).on('click','#addnewcatde',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formaddnewcat')[0]);
    $.ajax({
        type:"post",
        url:"/admin/createcategory",
        enctype:"multipart/form-data",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                alert(res.message);
                $('#exampleModal').modal('hide');
            }
        }
    });
});
$(document).on('click','.editcatde',function(e){
    e.preventDefault();
    var offercasw = $(this).attr('offrdeedi');
    $.ajax({
        type:"get",
        url:"/admin/editcategpory/"+offercasw,
        success:function(res)
        {
            if(res.category)
            {
                $('#offercasw').val(res.category.id);
                $('#editname').val(res.category.en_name);
                $('#editarname').val(res.category.ar_name);
            }
        }
    });
});
$(document).on('click','.editcatder',function(e){
    e.preventDefault();
    var formupdesw = new FormData($('#formupdernewcat')[0]);
    var offrupdec = $('#offercasw').val();
    $.ajax({
        type:"post",
        url:"/admin/updatecategory/"+offrupdec,
        enctype:"multipart/form-data",
        data:formupdesw,
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                alert(res.message);
                $('#exampleModaledit').modal('hide');
            }
        }
    });
});
$(document).on('click','.deletecatder',function(e){
    e.preventDefault();
    var ogfeszsaq = $(this).attr('offdeeted');
    $.ajax({
        type:"get",
        url:"/admin/deletecategory/"+ogfeszsaq,
        data:{
            'id' : ogfeszsaq,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showcategory').load(location.href + " #showcategory");
                alert(res.message);
            }
        }
    })
})
        });
    </script>
@endsection