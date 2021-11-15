{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

<!-- Changed by Yuris to support Materialize CSS -->

{{-- vendors styles --}}
@section('vendor-style')

@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')

<section class="users-list-wrapper section mobile_indexpage">
    <!-- Header Starts -->
    <div class="col-11 valign-wrapper edit_title_posotion main_page_border">
        <div class="left-align">
            <h5 class="white-text">{{ trans('employees.create') }}</h5>
        </div>
        <!-- "Go Up" button -->
        {{-- <div class="col s3 m3 l3 right-align">
            <a href="{{ route('employees.employee.index') }}" class="btn-floating btn waves-effect waves-light blue darken-2">
                <i class="material-icons" title="{{ trans('employees.create') }}">arrow_upward</i>
            </a>
        </div> --}}
    </div>

    <div class="col-12">
        <ul class="mobile_menu_list" style="">
            {{-- Foreach menu item starts --}}
            @if(!empty($menuData[0]) && isset($menuData[0]))
            @foreach ($menuData[0]->menu as $menu)
                @if(isset($menu->navheader))
                
                @else
                @php
                $custom_classes="";
                if(isset($menu->class))
                {
                $custom_classes = $menu->class;
                }
                @endphp
                <li class="bold mx-2 {{(request()->is($menu->url.'*')) ? 'active' : '' }}@if($menu->url == '/organisations' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/managers' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/devices' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if('/'.Request::path() == $menu->url) mobilemenuactive @endif">
                <a class="menu_with_size {{$custom_classes}} {{ (request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''}}"
                    @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
                    href="@if(($menu->url)==='javascript:void(0)'){{$menu->url}} @else{{url($menu->url)}} @endif"
                    {{isset($menu->newTab) ? 'target="_blank"':''}}>
                    <i class="material-icons icons_color @if('/'.Request::path() == $menu->url) mobilemenuactive_color @endif">{{$menu->icon}}</i>
                    <span class="menu-title icons_colors @if('/'.Request::path() == $menu->url) mobilemenuactive_color @endif">{{ __('locale.'.$menu->name)}}</span>
                    @if(isset($menu->tag))
                    <span class="{{$menu->tagcustom}}">{{$menu->tag}}</span>
                    @endif
                </a>
                @if(isset($menu->submenu))
                    @include('panels.submenu', ['menu' => $menu->submenu])
                @endif
                </li>
                @endif
            @endforeach
            @endif
        </ul>
    </div>
    <form method="POST" action="{{ route('employees.employee.store') }}" accept-charset="UTF-8" 
        id="create_employee_form" name="create_employee_form" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col-12 webmobile_design">
            <div class="card-panel mb-6 rounded col-12 px-md-4">

                <!-- Errors here, if present -->
                @if ($errors->any())
                    <ul class="msg msg-alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ csrf_field() }}
                @include ('employees.form', [
                                            'employee' => null,
                                        ])
            <div class="row mt-5">
                <div class="col-12">
                    <input class="btn btn-primary px-lg-3 create_add_bt" type="submit" value="{{ trans('locale.creates') }}">
                    </form>
                    <a href="{{ route('employees.employee.index') }}" class="btn waves-effect waves-light darken-2 px-lg-3 create_de">{{ trans('locale.cancels') }}</a>
                </div>
                
                <div class="col s2 m2 l2 right-align">
                </div>
        
            </div>

            </div>
        </div>
    </div>

    <!-- Body -->
    
   
</section>

@endsection
