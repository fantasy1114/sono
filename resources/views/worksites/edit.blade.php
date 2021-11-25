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
<style>
    .brand-sidebar .brand-logo {
      left: 0%!important;
      transform: translateX(0%)!important;
    }
   
</style>
<section class="users-list-wrapper section edit__index__page">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper index__solid__border">
        <div class="left-align">
            <h5 class="white-text indexpage__title__size">{{ isset($title) ? $title : trans('worksites.model_plural') }}</h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align">
            <a href="{{ route('worksites.worksite.create') }}" class="btn waves-effect waves-light d-flex align-items-center float-right edit__add__btn">
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

    <form method="POST" action="{{ route('worksites.worksite.update', $worksite->Worksite_ID) }}"        id="edit_worksite_form" name="edit_worksite_form" accept-charset="UTF-8" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col-12 edit__page__position">
            <div class="card-panel edit__page__table">

                <!-- Errors here, if present -->
                @if ($errors->any())
                    <ul class="msg msg-alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ csrf_field() }}
    
                <input name="_method" type="hidden" value="PUT">

                @include ('worksites.form', [
                    'worksite' => $worksite,
                ])

                <div class="row edit__btns__group">
                    <div class="col-sm-3 col-xl-2">
                        <input class="btn btn-primary editpage__update__btn" type="submit" value="{{ trans('worksites.update') }}">
                        </form>
                    </div>
                    <div class="col-sm-9 col-xl-10">
                        <div class="float-left ml-sm-5">
                            <a href="{{ route('worksites.worksite.index') }}" class="btn waves-effect waves-light  darken-2 editpage__cancel__btn">{{ trans('locale.cancels') }}</a>
                        </div>
                        <div class="float-right ">
                            <form method="POST" action="{!! route('worksites.worksite.destroy', $worksite->Worksite_ID) !!}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" value="DELETE" type="hidden">
                                <input class="btn btn-primary editpage__delete__btn" onclick="return confirm(&quot;{{ trans('worksites.confirm_delete') }}&quot;)" type="submit" value="{{ trans('locale.deletes') }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Body -->
    
   
</section>

@endsection
