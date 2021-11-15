{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

<!-- Changed by Yuris to support Materialize CSS -->

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')

<section class="users-list-wrapper section mobile_indexpage">
    <!-- Header Starts -->
    <div class="row valign-wrapper">
        <a href="{{ route('registries.registry.index') }}" class="btn-floating btn waves-effect waves-light ml-3 ml-lg-3 show_back">
          <i class="material-icons show_background">arrow_back</i>
        </a>
        <div class="col s12 m12 l12 left-align">
            <h5 class="white-text d-lg-inline align-middle ml-3 edit_title_posotion">{{ isset($title) ? $title : trans('locale.Event Log') }}</h5>
        </div>
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
    <!-- Body -->
    <div class="card rounded mt-5 px-md-4 py-2">
      <div class="card-content row">
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable">{{ trans('registries.Key_Name') }}</label>
              <div class="form-group">
                  <input type="text" value="{{ trans('registries.Action') }}" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable">{{ trans('registries.Action') }}</label>
              <div class="form-group">
                  <input type="text" value="{{ $registry->Action }}" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable">{{ trans('registries.Action_Time') }}</label>
              <div class="form-group">
                  <input type="text" value="{{ $registry->Action_Time }}" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable">{{ trans('registries.Battery_State') }}</label>
              <div class="form-group">
                  <input type="text" value="{{ $registry->Battery_State }}" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>

      </div>
    </div>
    
</section>

@endsection
