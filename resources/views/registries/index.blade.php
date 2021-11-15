{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Event Log')

{{-- Changed by Yuris to support Materialize CSS --}}

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
<link rel="stylesheet" type="text/css" href="{{asset('fonts/fontawesome/css/all.css')}}">
<style>
  th >a{
    color:#9D9BA6;
  }
</style>
@endsection

{{-- page content --}}
@section('content')

@if(Session::has('success_message'))
    <a name="info_button" class="waves-effect waves-light btn green" style="position:fixed;" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i>{!! session('success_message') !!}</a>
    @endif


<!-- users list start -->
<section class="users-list-wrapper section pt-0">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper edit_title_posotion main_page_border">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text">{{ trans('locale.Event Log') }}</h5>
            <p>{!! auth()->user()->renderOrgName() !!}</p>
        </div>
        <div class="col s3 m3 l3 right-align">
            <!--<a href="{{ route('registries.registry.create') }}" class="btn-floating btn waves-effect waves-light red disabled">
                <i class="material-icons" title="{{ trans('registries.create') }}">add</i> 
            </a>-->
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
            <li class="bold px-2 {{(request()->is($menu->url.'*')) ? 'active' : '' }}@if($menu->url == '/organisations' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/managers' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if($menu->url == '/devices' && Auth::user()->is_superuser == 0) {{'d-none'}} @endif @if('/'.Request::path() == $menu->url) mobilemenuactive @endif">
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
  <!-- TABLE -->


  <div class="row">
  
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
          <!-- Page Length Options -->
          <div class="row">
          <div class="col s12">
            <div class="card rounded mobile_indexpage" style="margin-top:-20px;">
              <div class="card-content">
              
                <div class="row">
                  <div class="col s12">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th>@sortablelink('Key_Name', trans('registries.Key'))</th>
                          <th>@sortablelink('Employee_Name', trans('registries.Employee'))</th>
                          <th>@sortablelink('Worksite_Name', trans('registries.Worksite'))</th>
                          <th>@sortablelink('Action', trans('registries.Event'))</th>
                          <th>@sortablelink('Action_Time', trans('registries.Event Time and Date'))</th>
                          <th>@sortablelink('Battery_State', trans('registries.Battery, V'))</th>
                          <th>@sortablelink('Signal_Level', trans('registries.Signal Strength'))</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($registries as $registry)
                          <tr>
                            <td><a class="" href="{{ route('registries.registry.show', $registry->Registry_ID ) }}">{{ $registry->Key_Name }}</a></td>
                            <td>{{ $registry->Employee_Name }}</td>
                            <td>{{ $registry->Worksite_Name }}</td>
                            <td>{{ $registry->Action == 0 ? trans('locale.Arrived') : trans('locale.Left')  }}</td>
                            <td>{{ $registry->Action_Time }}</td>
                            <td>{{ $registry->Battery_State }}</td>
                            <td>{{ $registry->Signal_Level }}</td>
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
    </div>
  </div>
</section>

<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{('table/js/vendors.min.js')}}"></script>
<script src="{{('table/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{('table/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{('table/js/plugins.min.js')}}"></script>
<script src="{{('table/js/search.min.js')}}"></script>
<script src="{{('table/js/custom/custom-script.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{('table/js/scripts/data-tables.min.js')}}"></script>
@endsection