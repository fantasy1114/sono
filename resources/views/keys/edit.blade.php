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
    <div class="col-12 valign-wrapper edit_title_posotion main_page_border pb-2">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text">{{ isset($title) ? $title : trans('keys.model_plural') }}</h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align edit_title_posotion_create">
            <a href="{{ route('keys.key.create') }}" class="btn waves-effect waves-light d-flex align-items-center float-right mr-2 create_new_product">
                <div class="d-inline">add</div><i class="material-icons" title="{{ trans('keys.create') }}">add</i>
            </a>
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

    <form method="POST" action="{{ route('keys.key.update', $key->Key_ID) }}" 
        id="edit_key_form" name="edit_key_form" accept-charset="UTF-8" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col-12 webmobile_design mt-2">
            <div class="card-panel rounded mx-sm-1 px-sm-4">

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

                @include ('keys.form', [
                    'key' => $key,
                ])
                <div class="row mt-5">
                    <div class="col-sm-3">
                        <input class="btn btn-primary btn_update px-lg-3 update_update" type="submit" value="{{ trans('keys.update') }}">
                        </form>
                    </div>
                    <div class="col-sm-9 update_delete">
                        <div class="float-left">
                            <a href="{{ route('keys.key.index') }}" class="btn waves-effect waves-light px-lg-3 darken-2 update_delete_cancel">{{ trans('locale.cancels') }}</a>
                        </div>
                        <div class="float-right update_delete_delete">
                            <form method="POST" action="{!! route('keys.key.destroy', $key->Key_ID) !!}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" value="DELETE" type="hidden">
                                <input class="btn btn-primary px-lg-3 update_delete_delete_back" onclick="return confirm(&quot;{{ trans('keys.confirm_delete') }}&quot;)" type="submit" value="{{ trans('locale.deletes') }}">
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
