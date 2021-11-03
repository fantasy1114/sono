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
            <h5 class="white-text">{{ trans('locale.Keys') }}</h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt>{{ trans('keys.Key_Name') }}</dt>
            <dd>{{ $key->Key_Name }}</dd>
            <dt>{{ trans('keys.Employee_ID') }}</dt>
            <dd>{{ optional($key->Employee)->Employee_Name }}</dd>
            <dt>{{ trans('keys.Is_Active') }}</dt>
            <dd>{{ ($key->Is_Active) ? trans('locale.Yes') : trans('locale.No') }}</dd>
            <dt>{{ trans('keys.Created_At') }}</dt>
            <dd>{{ $key->Created_At }}</dd>
            <dt>{{ trans('keys.Updated_At') }}</dt>
            <dd>{{ $key->Updated_At }}</dd>

      </div>
    </div>
    
</section>

@endsection
