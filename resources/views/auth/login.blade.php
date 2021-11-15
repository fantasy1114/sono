
<head>
    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./frontend/assets/css/style.css">
    {{-- layout --}}
    @extends('layouts.fullLayoutMaster')

    {{-- page title --}}
    @section('title','User Login')

    {{-- page style --}}
    @section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
        
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <style>
        body{
            width: 96%;
        }
        .card-title{
            font-weight: 600!important;
            font-size: 24px!important;
            line-height: 42px;
            /* identical to box height */
            letter-spacing: 0.03em;

            color: #494747;
        }
        input::placeholder{
            font-size: 12px;
        }
    </style>
</head>
@endsection

{{-- page content --}}
{{-- @section('content') --}}
{{-- <div id="login-page" class="row">
    
    <div class="login-card">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="px-3">
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="ml-4 sign_in">{{ __('Sign In') }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">
                        <label for="email" class="center-align">{{ __('Username') }}</label>
                        @error('email')
                        <small class="red-text ml-10" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        <label for="password">{{ __('password') }}</label>
                        @error('password')
                        <small class="red-text ml-10" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-1">
                        <p>
                            <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Remember Me</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit"
                            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
   
</div> --}}
<div class="col-12">
        
    <div class="row">
        <div class="col-12 text-center" style="height: 180px;display: flex; justify-content: center; align-items: center">
            <div>
                <div class="d-inline align-middle"><img src="{{asset('frontend/app-assets/images/img/login.png')}}" style="width:28px;"></div>
                <div class="d-inline " style="color:#63D6BA;font-weight:600;font-size:32px;vertical-align:middle;">sono</div>
                &nbsp;
                <div class="d-inline align-middle" style="color:#494747;font-weight:600;font-size: 22px;" class="">PORTAL</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-1"></div>
        <div class="col-md-6 mt-2 col-sm-10 px-lg-5 col-12">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card px-lg-3 py-2">
                    <div class="card-header">
                        <h2 class="card-title">Sign In</h2>
                    </div>
                    <div class="card-body">
                        <div class="input-group input-group-merge mt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-search2" style="border: none;background-color: #F8F8F8;">
                                    <i data-feather='user' style="zoom: 130%;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user" style="zoom: 130%;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </i></span>
                            </div>
                            <input id="email" type="email"  name="email" style="border: none;background-color: #F8F8F8;" class="form-control @error('email') is-invalid @enderror" placeholder="User name" required autocomplete="email" autofocus />
                        </div>

                        <div class="input-group input-group-merge mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-search2" style="border: none;background-color: #F8F8F8;">
                                    <i data-feather='lock' style="zoom: 130%;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock" style="zoom: 130%;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    </i>
                                </span>
                            </div>
                            <input id="password" type="password"  name="password" required autocomplete="current-password" style="border: none;background-color: #F8F8F8;" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                            
                        </div>
                        <div class="form-group mt-3 ml-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember-me" type="checkbox" />
                                <label class="custom-control-label" for="remember-me" style="color: #979494;"> Remember Me</label>
                                <a href="#" style="float: right;color: #18B7E9;line-height: 18px;">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group mt-3 ml-1">
                            <button type="submit" class="btn rounded w-100" style="background-color: #63D6BA;color:#FFFFFF;font-weight: 600;line-height: 18px;">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="col-md-4"></div> -->
        <div class="col-md-3 col-sm-1"></div>
    </div>
    <div class="col-12 text-center mt-5 pt-5" style="color:#BBBCBC;line-height: 27px;">
        © 2021 fabrica.IT SIA All rights reserved
    </div>

</div>

{{-- @endsection --}}