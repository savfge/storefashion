@extends('layouts.home')
@section('contnet')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">{{__('app.Login')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">{{__('app.register')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form enctype="multipart/form-data" action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="singin-email-2">{{__('app.emailaddress')}} *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="singin-email-2"  required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">{{__('app.password')}} *</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="singin-password-2" name="password" required autocomplete="current-password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <img src="{{asset('admin_panel/loading-gif.gif')}}" id="lodder" width="100" height="100" style="display: none;" alt="">
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>{{__('app.Login')}}</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"  {{ old('remember') ? 'checked' : '' }} id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">{{__('app.remper')}}</label>
                                    </div><!-- End .custom-checkbox -->

                                    
                                    {{-- @if (Route::has('password.request'))
                                    <a class="forgot-link" href="{{ route('password.request') }}">
                                        {{ __('app.forgetpassword') }}?
                                    </a>
                                @endif --}}
                                </div><!-- End .form-footer -->
                            </form>
                            {{-- <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice --> --}}
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form enctype="multipart/form-data" action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="register-email-2">{{__('app.usernaae')}} *</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-email-2">{{__('app.emailaddress')}} *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->


                                <div class="form-group">
                                    <label for="register-password-2">{{__('app.password')}} *</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->
                                
                                <div class="form-group">
                                    <label for="register-password-2">{{__('app.confrim')}} *</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div><!-- End .form-group -->
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
{{-- <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','#addnewlogin',function(e){
    e.preventDefault();
    $('#lodder').show();
    var formdatalogin = new FormData($('#formlogin')[0]);
    $.ajax({
        type:"post",
        url:"/login",
        data:formdatalogin,
        processData:false,
        contentType:false,
        enctype:"multipart/form-data",
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#lodder').hide('2000');
                window.location.href="/";
            }
        }
    })
});
$(document).on('click','#addnewregister',function(e){
    e.preventDefault();
    $('#lodder').show();
    var formdataref = new FormData($('#formregistr')[0]);
    $.ajax({
        type:"post",
        url:"/register",
        data:formdataref,
        enctype:"multipart/form-data",
        processData:false,
        contentType:false,
        cache:false,
        success:function(res)
        {
            if(res)
            {
                $('#lodder').hide('2000');
                window.location.href="/";
            }
        }
    })
})
    });
</script> --}}
@endsection