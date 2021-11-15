{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Work sites')

<!-- Changed by Yuris to support Materialize CSS -->
{{-- vendors styles --}}
@section('vendor-style')

<link rel="stylesheet" type="text/css" href="{{asset('table/vendors/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('table/vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('table/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('table/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('table/vendors/data-tables/css/select.dataTables.min.css')}}">
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('table/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('table/css/themes/vertical-modern-menu-template/style.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('table/css/pages/data-tables.min.css')}}">
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('table/css/custom/custom.css')}}">

@endsection
{{-- page styles --}}
@section('page-style')

@endsection

{{-- page content --}}
@section('content')
<style>
  .menu_page_mobile li{
    list-style-type: none;
    display: inline;
    align-items: center;
  }
</style>
@if(Session::has('success_message'))
    <a name="info_button" class="waves-effect waves-light btn green" style="position:fixed;" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i>{!! session('success_message') !!}</a>
    @endif

<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper edit_title_posotion main_page_border">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text main_index">{{ trans('worksites.model_plural') }}</h5>
            <p>{!! auth()->user()->renderOrgName() !!}</p>
        </div>
        <div class="col s3 m3 l3 right-align">
            <a href="{{ route('worksites.worksite.create') }}" class="btn waves-effect waves-light d-flex align-items-center float-right mr-2 create_new_product">
                <div class="d-inline">add</div><i class="material-icons" title="{{ trans('worksites.create') }}">add</i>
            </a>
        </div>
    </div>
    <div class="col-12 pt-2">
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
    <!-- Menu-->
    {{-- <div class="row menu_page_mobile">
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
          <li class="bold mx-2 {{(request()->is($menu->url.'*')) ? 'active' : '' }}@if($menu->url == '/organisations' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/managers' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/devices' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif">
            <a class="{{$custom_classes}} {{ (request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''}}"
              @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
              href="@if(($menu->url)==='javascript:void(0)'){{$menu->url}} @else{{url($menu->url)}} @endif"
              {{isset($menu->newTab) ? 'target="_blank"':''}}>
              <i class="material-icons" style="color:#494747; font-weight:500;">{{$menu->icon}}</i>
              <span class="menu-title" style="color:#494747; font-weight:600;font-family:'Poppins';font-size:12px;vertical-align:super;">{{ __('locale.'.$menu->name)}}</span>
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
    </div> --}}
    <!-- TABLE -->

    <div class="container">
      <div class="section section-data-tables pt-0">
        <!-- Page Length Options -->
        <div class="row">
          <div class="col s12 ">
            <div class="card rounded mobile_indexpage" style="margin-top:-20px;">
              <div class="card-content">
              
                <div class="row">
                  <div class="col s12">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th>{{ trans('worksites.Worksite_Name') }}</th>
                          <th>{{ trans('worksites.Worksite_Address') }}</th>
                          <th>{{ trans('worksites.Is_Active') }}</th>
                          <th>{{ trans('worksites.Organisation_ID') }}</th>
                          <th>{{ trans('locale.thshow') }}</th>
                          <th>{{ trans('locale.thedit') }}</th>
                          <th>{{ trans('locale.thdelete') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($worksites as $worksite)
                          <tr>
                            <td>{{ $worksite->Worksite_Name }}</td>
                            <td>{{ $worksite->Worksite_Address }}</td>
                            <td>{{ ($worksite->Is_Active) ? trans('locale.Yes') : trans('locale.No') }}</td>
                            <td>{{ optional($worksite->Organisation)->Organisation_Name }}</td>

                            <form method="POST" action="{!! route('worksites.worksite.destroy', $worksite->Worksite_ID) !!}" accept-charset="UTF-8">
                              <td class="">
                                <a class="btn-flat" href="{{ route('worksites.worksite.show', $worksite->Worksite_ID ) }}"><i class="material-icons dark-blue-text">remove_red_eye</i></a>
                              </td>
                              <td>
                                <a class="btn-flat" href="{{ route('worksites.worksite.edit', $worksite->Worksite_ID ) }}"><i class="material-icons green-text">edit</i></a>
                              </td>
                              <td>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" value="DELETE" type="hidden">
                                <button type="submit" class="btn-flat" title="{{ trans('worksites.delete') }}" onclick="return confirm(&quot;{{ trans('worksites.confirm_delete') }}&quot;)">
                                    <i class="material-icons red-text">delete_forever</i>
                                </button>
                              </td>

                            </form>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('table/js/vendors.min.js')}}"></script>
<script src="{{asset('table/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('table/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('table/js/plugins.min.js')}}"></script>
<script src="{{asset('table/js/search.min.js')}}"></script>
<script src="{{asset('table/js/custom/custom-script.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('table/js/scripts/data-tables.min.js')}}"></script>
@endsection