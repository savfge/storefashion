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
        <div class="card shadow mb-4" id="showprodect">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('Page Show All Table')}}
                <!-- Button trigger modal -->
<button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   {{__('Create New Prodect')}}
  </button>
  
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Prodect Id')}}</th>
                                <th>{{__('Prodect Name')}}</th>
                                <th>{{__('Category Name')}}</th>
                                <th>{{__('Subcategory Name')}}</th>
                                <th>{{__('Size Name')}}</th>
                                <th>{{__('Color Name')}}</th>
                                <th>{{__('Barnd Name')}}</th>
                                <th>{{__('Prodect Image')}}</th>
                                <th>{{__('Prodect Image2')}}</th>
                                <th>{{__('Prodect Staus')}}</th>
                                <th>{{__('Change Staus')}}</th>
                                <th>{{__('Prodect Edit')}}</th>
                                <th>{{__('Prodect Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodects as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->en_name}}</td>
                                <td>{{$item->category->en_name}}</td>
                                <td>{{$item->subcategory->en_name}}</td>
                                <td>{{$item->size->en_name}}</td>
                                <td>{{$item->color->en_name}}</td>
                                <td>{{$item->barnd->en_name}}</td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$item->image)}}" width="100" height="100" alt="">
                                </td>
                                <td>
                                    <img src="{{asset('admin_panel/img/'.$item->image2)}}" width="100" height="100" alt="">
                                </td>
                                <td>{{$item->staus==1 ? 'Man' : 'Women'}}</td>
                                <td>
                                    @if ($item->staus==1)
                                        <a  offerunblipro="{{$item->id}}" class="btn btn-danger changeunde">{{__('Unblsheds')}}</a>
                                    @else
                                    <a  offerpublrblipro="{{$item->id}}" class="btn btn-info changepuble">{{__('Publisheds')}}</a>  
                                    @endif
                                </td>
                                <td>
                                    <button  offerprodctedit="{{$item->id}}" class="btn btn-success editprodect" data-toggle="modal" data-target="#exampleModaledit">{{__('Edit')}}</button>
                                </td>
                                <td>
                                    <a offeprodectdelet="{{$item->id}}" class="btn btn-danger deleteprodect">{{__('Delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$prodects->links()!!}
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
          <form enctype="multipart/form-data" id="formprodects" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Name')}}</label>
                    <input type="text" name="en_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنتجات')}}</label>
                    <input type="text" name="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <select name="category_id" class="form-control" id="category_id">
                        @php
                            $categorys = App\Models\Category::all();
                        @endphp
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <div id="appendcat">
                   @include('admin.prodect.appendct')
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Color Name')}}</label>
                    <select name="color_id" id="color_id" class="form-control">
                        @php
                            $colors = App\Models\Color::all();
                        @endphp
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Size Name')}}</label>
                    <select name="size_id" id="size_id" class="form-control">
                        @php
                            $sizes = App\Models\Size::all();
                        @endphp
                        @foreach ($sizes as $size)
                            <option value="{{$size->id}}">{{$size->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Barnd Name')}}</label>
                    <select name="barnd_id" id="barnd_id" class="form-control">
                        @php
                            $barnds = App\Models\Barnd::all();
                        @endphp
                        @foreach ($barnds as $barnd)
                            <option value="{{$barnd->id}}">{{$barnd->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Short Description')}}</label>
                    <textarea name="short_desc" class="form-control" id="short_desc" cols="3" rows="3"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Long Description')}}</label>
                    <textarea name="long_desc" id="long_desc" cols="10" class="form-control" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title1')}}</label>
                    <input type="text" name="title1" id="title1" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title2')}}</label>
                    <input type="text" name="title2" id="title2" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title3')}}</label>
                    <input type="text" name="title3" id="title3" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title4')}}</label>
                    <input type="text" name="title4" id="title4" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title5')}}</label>
                    <input type="text" name="title5" id="title5" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title6')}}</label>
                    <input type="text" name="title6" id="title6" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title7')}}</label>
                    <input type="text" name="title7" id="title7" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title8')}}</label>
                    <input type="text" name="title8" id="title8" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Qty')}}</label>
                    <input type="text" name="qty" id="qty" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect New')}}</label>
                    <input type="text" name="new" class="form-control" id="new">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Image MAster')}}</label>
                    <input type="file" name="image" class="form-control" >
                    <br><br>
                    @php
                    $prodects = App\Models\Prodect::all();
                   @endphp
                   @foreach($prodects as $prodect)
                    <img src="{{asset('admin_panel/img/'.$prodect->image)}}" width="60" height="60" alt="">
                    @endforeach
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Image2')}}</label>
                    <input type="file" name="image2" class="form-control" >
                    <br><br>
                    @php
                        $prodects = App\Models\Prodect::all();
                    @endphp
                    @foreach($prodects as $prodect)
                    <img src="{{asset('admin_panel/img/'.$prodect->image2)}}" width="60" height="60" alt="">
                    @endforeach
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Price')}}</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Stock')}}</label>
                    <input type="text" name="stock" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" checked="Man" value="1" id="staus">
                    {{__('Man')}}
                    <br><br>
                    <input type="radio" name="staus" checked="Women" value="2" id="staus">
                    {{__('Women')}}
                    <br><br>
                    <input type="radio" name="staus" checked="Shoes" value="0" id="staus">
                    {{__('Shoes')}}
                    <br><br>
                    <input type="radio" name="staus" checked="Shoes" value="3" id="staus">
                    {{__('Acceiress')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addnewprodect">{{__('Create New Prodect')}}</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Add New  Prodects --}}
  <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="formprodectsup" method="post">
            @csrf
            <div class="row">
                <input type="text" name="id" id="offeredit">
                
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Name')}}</label>
                    <input type="text" name="en_name" id="en_name"  class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('اسم المنتجات')}}</label>
                    <input type="text" name="ar_name" id="ar_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Category Name')}}</label>
                    <select name="category_id" class="form-control" id="category_idx">
                        @php
                            $categorys = App\Models\Category::all();
                        @endphp
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <select name="subcategory_id" class="form-control" id="subcategory_idx">
                        @php
                            $subcatgorys = App\Models\SubCategory::all();
                        @endphp
                        @foreach ($subcatgorys as $subcatgory)
                            <option value="{{$subcatgory->id}}">{{$subcatgory->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Color Name')}}</label>
                    <select name="color_id" id="color_idx" class="form-control">
                        @php
                            $colors = App\Models\Color::all();
                        @endphp
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Size Name')}}</label>
                    <select name="size_id" id="size_idx" class="form-control">
                        @php
                            $sizes = App\Models\Size::all();
                        @endphp
                        @foreach ($sizes as $size)
                            <option value="{{$size->id}}">{{$size->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Barnd Name')}}</label>
                    <select name="barnd_id" id="barnd_idx" class="form-control">
                        @php
                            $barnds = App\Models\Barnd::all();
                        @endphp
                        @foreach ($barnds as $barnd)
                            <option value="{{$barnd->id}}">{{$barnd->en_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Short Description')}}</label>
                    <textarea name="short_desc" class="form-control" id="short_descder" cols="3" rows="3"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Long Description')}}</label>
                    <textarea name="long_desc" id="long_descee" cols="10" class="form-control" rows="10"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title1')}}</label>
                    <input type="text" name="title1" id="titlew1" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title2')}}</label>
                    <input type="text" name="title2" id="titlew2" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title3')}}</label>
                    <input type="text" name="title3" id="titlew3" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title4')}}</label>
                    <input type="text" name="title4" id="titlew4" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title5')}}</label>
                    <input type="text" name="title5" id="titlew5" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title6')}}</label>
                    <input type="text" name="title6" id="titlew6" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title7')}}</label>
                    <input type="text" name="title7" id="titlew7" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Title8')}}</label>
                    <input type="text" name="title8" id="titlew8" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Qty')}}</label>
                    <input type="text" name="qty" id="qtye" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect New')}}</label>
                    <input type="text" name="new" class="form-control" id="newe">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Image MAster')}}</label>
                    <input type="file" name="image" id="image"   class="form-control" >
                </div>
                <div class="col-md-12 mb-3" id="image" >
                   
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Image2')}}</label>
                    <input type="file" name="image2" class="form-control" >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Price')}}</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Stock')}}</label>
                    <input type="text" name="stock" id="stock" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">{{__('Prodect Staus')}}</label>
                    <br>
                    <input type="radio" name="staus" checked="Man" value="1" id="staus">
                    {{__('Man')}}
                    <br><br>
                    <input type="radio" name="staus" checked="Women" value="2" id="staus">
                    {{__('Women')}}
                    <br><br>
                    <input type="radio" name="staus" checked="Shoes" value="0" id="staus">
                    {{__('Shoes')}}
                    <br><br>
                    <input type="radio" name="staus" checked="Shoes" value="3" id="staus">
                    {{__('Acceiress')}}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateprodect" >{{__('Update Prodect')}}</button>
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
$(document).on('click','#addnewprodect',function(e){
    e.preventDefault();
    var formdata = new FormData($('#formprodects')[0]);
    $.ajax({
        type:"post",
        url:"/admin/prodectstore",
        data:formdata,
        processData:false,
        contentType:false,
        enctype:"multipart/form-data",
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                $('#exampleModal').modal('hide');
                alert(res.sms);
            }

        }
    });
});
$(document).on('click','.editprodect',function(e){
    e.preventDefault();
    var offeredit = $(this).attr('offerprodctedit');
    $.ajax({
        type:"get",
        url:"/admin/prodectedit/"+offeredit,
        success:function(res)
        {
            if(res.prodect)
            {
                $('#en_name').val(res.prodect.en_name);
                $('#ar_name').val(res.prodect.ar_name);
                $('#price').val(res.prodect.price);
                $('#stock').val(res.prodect.stock);
                $('#newe').val(res.prodect.new);
                $('#qtye').val(res.prodect.qty);
                $('#offeredit').val(res.prodect.id);
                $('#short_descder').val(res.prodect.short_desc);
                $('#long_descee').val(res.prodect.long_desc);
                $('#titlew1').val(res.prodect.title1);
                $('#titlew2').val(res.prodect.title2);
                $('#titlew3').val(res.prodect.title3);
                $('#titlew4').val(res.prodect.title4);
                $('#titlew5').val(res.prodect.title5);
                $('#titlew6').val(res.prodect.title6);
                $('#titlew7').val(res.prodect.title7);
                $('#titlew8').val(res.prodect.title8);
                $('#color_idx').val(res.prodect.color_id);
                $('#size_idx').val(res.prodect.size_id);
                $('#category_idx').val(res.prodect.category_id);
                $('#barnd_idx').val(res.prodect.barnd_id);
                $('#subcategory_idx').val(res.prodect.subcategory_id);
            }
        }
    });
});
$(document).on('click','.updateprodect',function(e){
    e.preventDefault();
    var formdataupder = new FormData($('#formprodectsup')[0]);
    var offerupdsw = $("#offeredit").val();
    $.ajax({
        type:"post",
        url:"/admin/prodectupdate/"+offerupdsw,
        data:formdataupder,
        processData:false,
        contentType:false,
        enctype:"multipart/form-data",
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                $('#exampleModaledit').modal('hide');
                alert(res.sms);
            }
        }
    });
});
$(document).on('click','.deleteprodect',function(e){
    e.preventDefault();
    var offerswdelete = $(this).attr('offeprodectdelet');
    $.ajax({
        type:"get",
        url:"/admin/prodectdelete/"+offerswdelete,
        data:{
            'id' : offerswdelete,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                alert(res.sms);
            }
        }
    });
});
$(document).on('click','.changeunde',function(e){
    e.preventDefault();
    var offerunce = $(this).attr('offerunblipro');
    $.ajax({
        type:"post",
        url:"/admin/unsplshedsprodects/"+offerunce,
        data:{
            'id' : offerunce,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                alert(res.sms);
            }
        }
    });
});
$(document).on('click','.changepuble',function(e){
    e.preventDefault();
    var offepunde = $(this).attr('offerpublrblipro');
    $.ajax({
        type:"post",
        url:"/admin/publideseprodects/"+offepunde,
        data:{
            'id' : offepunde,
            '_token' : "{{csrf_token()}}",
        },
        success:function(res)
        {
            if(res)
            {
                $('#showprodect').load(location.href + " #showprodect");
                alert(res.sms);
            }
        }
    })
})
$(document).on('change','#category_id',function(e){
    e.preventDefault();
    var id =$(this).val();
    $.ajax({
        type:"get",
        url:"/admin/appendcatdes/"+id,
        success:function(res)
        {
            if(res)
            {
                $('#appendcat').html(res);
            }
        }
    });
})
    });
  </script>
@endsection