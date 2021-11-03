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
            <h5 class="white-text">{{ trans('locale.Work sites') }}</h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt>{{ trans('worksites.Worksite_Name') }}</dt>
            <dd>{{ $worksite->Worksite_Name }}</dd>
            <dt>{{ trans('worksites.Worksite_Address') }}</dt>
            <dd>{{ $worksite->Worksite_Address }}</dd>
            <dt>{{ trans('worksites.Is_Active') }}</dt>
            <dd>{{ ($worksite->Is_Active) ? trans('locale.Yes') : trans('locale.No') }}</dd>
            <dt>{{ trans('worksites.Organisation_ID') }}</dt>
            <dd>{{ optional($worksite->Organisation)->Organisation_Name }}</dd>
            <dt>{{ trans('worksites.Date_From') }}</dt>
            <dd>{{ $worksite->Date_From }}</dd>
            <dt>{{ trans('worksites.Created_At') }}</dt>
            <dd>{{ $worksite->Created_At }}</dd>
            <dt>{{ trans('worksites.Updated_At') }}</dt>
            <dd>{{ $worksite->Updated_At }}</dd>

      </div>
    </div>
    
</section>

@endsection
