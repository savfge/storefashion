@extends('layouts.home')
@section('contnet')
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">My Account<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}">Sign Out</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
                                <br>
                                From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                               <!-- Begin Page Content -->
                               <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">{{__('Order Id')}}</th>
                                    <th scope="col">{{__('Order Name')}}</th>
                                    <th scope="col">{{__('Order Staus')}}</th>
                                    <th scope="col">{{__('Edit')}}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $orders = App\Models\Order::paginate('4');
                                    @endphp
                                    @foreach($orders as $order)
                                  <tr>
                                    <th scope="row"></th>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->fname}}</td>
                                    <td>{{$order->staus}}</td>
                                    <td>
                                        <a href="{{route('order',$order->id)}}" class="btn btn-info">{{__('Edit')}}</a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                <!-- /.container-fluid -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form enctype="multipart/form-data" method="POST" id="formchangeuser" class="showaccount">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="lname" value="{{Auth::user()->lname}}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>{{__('Address1')}}</label>
                                    <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>{{__('Address2')}}</label>
                                    <input type="text" name="address2" value="{{Auth::user()->address2}}" class="form-control" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>{{__('Phone Number')}}</label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>
                                    <label>Email address *</label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" required>
                                    <label>{{__('Image Profilo')}}</label>
                                    @if (Auth::user())
                                    <input type="file" name="image" class="form-control" required>
                                    <img src="{{asset('admin_panel/img/'.Auth::user()->image)}}" width="100" height="100" alt="">
                                    <br><br>   
                                    @else
                                    <input type="file" name="image" class="form-control" required>
                                    <img src="{{asset('assets/images/favicon.png')}}" width="100" height="100" alt="">
                                    <br><br>   
                                    @endif
                                    <div id="lodere" style="display: none;">
                                    <img width="60" height="60" src="{{asset('admin_panel/loading-gif.gif')}}">
                                    <br><br>
                                    </div>
                                    <br>
                                    <button class="btn btn-success" style="margin:20px;" id="changeaccountuser">{{__('Change User')}}</button>
                                </form>
                                    <input type="password" name="oldpassword" value="{{Auth::user()->password}}" class="form-control">
                                    <br><br>
                                    <form method="POST" enctype="multipart/form-data" id="formaccountpass">
                                    @csrf
                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" value="{{Auth::user()->password}}" name="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" name="password" value="{{Auth::user()->password}}" class="form-control mb-2">
                                    <div id="lodere" style="display: none;">
                                        <img width="60" height="60" src="{{asset('admin_panel/loading-gif.gif')}}">
                                        <br><br>
                                    </div>
                                    <button type="button" id="changepassworde" class="btn btn-outline-primary-2">
                                        <span>{{__('Saave Changes Password')}}</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click','#changeaccountuser',function(e){
    e.preventDefault();
    $('#lodere').show();
    var formdata = new FormData($('#formchangeuser')[0]);
    $.ajax({
        type:"post",
        url:"/changeaccount",
        data:formdata,
        processData:false,
        contentType:false,
        cache:false,
        enctype:"multipart/form-data",
        success:function(res)
        {
            if(res)
            {
                $('#lodere').hide('2000')
                $('.showaccount').load(location.href + " .showaccount");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }
    });
});
$(document).on('click','#changepassworde',function(e){
    e.preventDefault();
    $('#lodere').show();
    var formdtapassw = new FormData($('#formaccountpass')[0]);
    $.ajax({
        type:"post",
        url:"/changepaass",
        data:formdtapassw,
        processData:false,
        contentType:false,
        cache:false,
        enctype:"multipart/form-data",
        success:function(res)
        {
            if(res)
            {
                $('#lodere').hide('500');
                $('.showaccount').load(location.href + " .showaccount");
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.sms);
            }
        }

    })
})
        });
    </script>
@endsection