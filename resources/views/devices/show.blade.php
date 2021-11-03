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

<section class="users-list-wrapper section @if(Auth::user()->is_superuser == 0) {{'d-none'}} @endif">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s12 m12 l12 left-align">
            <h5 class="white-text">{{ isset($title) ? $title : trans('devices.model_plural') }}</h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt>{{ trans('devices.Tracker_Code') }}</dt>
            <dd>{{ $device->Tracker_Code }}</dd>
            <dt>{{ trans('devices.Worksite_ID') }}</dt>
            <dd>{{ optional($device->Worksite)->Worksite_Name }}</dd>
            <dt>{{ trans('devices.Is_Active') }}</dt>
            <dd>{{ ($device->Is_Active) ? trans('locale.Yes') : trans('locale.No') }}</dd>
            <dt>{{ trans('devices.Created_At') }}</dt>
            <dd>{{ $device->Created_At }}</dd>
            <dt>{{ trans('devices.Updated_At') }}</dt>
            <dd>{{ $device->Updated_At }}</dd>

      </div>
    </div>
    
</section>

@endsection
