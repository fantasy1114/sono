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

<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s12 m12 l12 left-align">
            <h5 class="white-text">{{ isset($title) ? $title : trans('locale.Event Log') }}</h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt>{{ trans('registries.Key_Name') }}</dt>
            <dd>{{ $registry->Key_Name }}</dd>
            <dt>{{ trans('registries.Action') }}</dt>
            <dd>{{ $registry->Action }}</dd>
            <dt>{{ trans('registries.Action_Time') }}</dt>
            <dd>{{ $registry->Action_Time }}</dd>
            <dt>{{ trans('registries.Battery_State') }}</dt>
            <dd>{{ $registry->Battery_State }}</dd>

      </div>
    </div>
    
</section>

@endsection
