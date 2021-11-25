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
<style>
  .brand-sidebar .brand-logo {
    left: 0%!important;
    transform: translateX(0%)!important;
  }
  </style>
<section class="users-list-wrapper section edit__index__page">
    <!-- Header Starts -->
    <div class="row valign-wrapper index__solid__border">
      <div class="col-12">
        <a href="{{ route('worksites.worksite.index') }}" class="btn-floating btn waves-effect waves-light show__back__btn ml-md-2">
          <i class="material-icons" title="{{ trans('worksites.create') }}">arrow_back</i>
        </a>
        <h5 class="white-text d-md-inline align-middle indexpage__title__size show__index__name ml-md-2">{{ trans('locale.Work sites') }}</h5>
        <a href="{{ route('worksites.worksite.create') }}" class="btn waves-effect waves-light float-right show__add__btn">
          <div class="d-inline">{{ trans('locale.add') }}</div><i class="material-icons" title="{{ trans('worksites.create') }}">add</i>
        </a>
      </div>
    </div>
    <div class="col-12 mobile_menu_page">
      <ul class="mobile__menu__page__list">
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
            <li class="bold mobile__menu__size {{(request()->is($menu->url.'*')) ? 'active' : '' }}@if($menu->url == '/organisations' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/managers' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/devices' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if('/'.Request::path() == $menu->url) mobile__menu__active @endif">
              <a class="menu__page__icon__links {{$custom_classes}} {{ (request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''}}"
                @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
                href="@if(($menu->url)==='javascript:void(0)'){{$menu->url}} @else{{url($menu->url)}} @endif"
                {{isset($menu->newTab) ? 'target="_blank"':''}}>
                <i class="material-icons mobile__icon__size @if('/'.Request::path() == $menu->url) @endif">{!! $menu->icon !!}</i>
                <span class="menu-title @if('/'.Request::path() == $menu->url) @endif">{{ __('locale.'.$menu->name)}}</span>
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
    <div class="edit__page__position"> 
      <div class="card edit__page__table">
        <div class="card-content row">
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable">{{ trans('worksites.Worksite_Name') }}</label>
                
                <div class="form-group">
                    <input type="text" value="{{ $worksite->Worksite_Name }}" class="form-control pl-0 placeholder_fonts validate" />
                </div>

            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable">{{ trans('worksites.Worksite_Address') }}</label>
                
                <div class="form-group">
                    <input type="text" value="{{ $worksite->Worksite_Address }}" class="form-control validate" />
                </div>

            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable">{{ trans('worksites.Is_Active') }}</label>
                
                <div class="form-group">
                    <input type="text" value="{{ ($worksite->Is_Active) ? trans('locale.Yes') : trans('locale.No') }}" class="form-control validate" />
                </div>

            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable">{{ trans('worksites.Organisation_ID') }}</label>
                
                <div class="form-group">
                  <input type="text" value="{{ $worksite->Organisation_ID }}" class="form-control pl-0  validate" />
                </div>

            </div>
          </div>

          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable">{{ trans('worksites.Created_At') }}</label>
                
                <div class="form-group">
                  <input type="text" value="{{ date('d.m.Y H:i', strtotime(str_replace('/', '-', $worksite->Created_At))) }}" class="form-control pl-0 validate" />
                </div>

            </div>
          </div>

          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable">{{ trans('worksites.Updated_At') }}</label>
                
                <div class="form-group">
                  <input type="text" value="{{ date('d.m.Y H:i', strtotime(str_replace('/', '-', $worksite->Updated_At))) }}" class="form-control pl-0 validate" />
                </div>

            </div>
          </div>

        </div>
      </div>
    </div>
</section>

@endsection
