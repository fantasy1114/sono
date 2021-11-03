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
            <h5 class="white-text">{{ isset($manager->name) ? $manager->name : 'Manager' }}</h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt>{{ trans('managers.name') }}</dt>
            <dd>{{ $manager->name }}</dd>
            <dt>{{ trans('managers.email') }}</dt>
            <dd>{{ $manager->email }}</dd>
            <dt>{{ trans('managers.organisation_id') }}</dt>
            <dd>{{ optional($manager->Organisation)->Organisation_Name }}</dd>
            <dt>{{ trans('managers.phone') }}</dt>
            <dd>{{ $manager->phone }}</dd>
            <dt>{{ trans('managers.is_superuser') }}</dt>
            <dd>{{ ($manager->is_superuser) ? trans('locale.Yes') : trans('locale.No') }}</dd>
            <dt>{{ trans('managers.is_active') }}</dt>
            <dd>{{ ($manager->is_active) ? trans('locale.Yes') : trans('locale.No') }}</dd>
            <dt>{{ trans('managers.created_at') }}</dt>
            <dd>{{ $manager->created_at }}</dd>
            <dt>{{ trans('managers.updated_at') }}</dt>
            <dd>{{ $manager->updated_at }}</dd>

      </div>
    </div>
    
</section>

@endsection
