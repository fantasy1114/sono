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
            <h5 class="white-text">{{ trans('locale.Employees') }}</h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt>{{ trans('employees.Employee_Name') }}</dt>
            <dd>{{ $employee->Employee_Name }}</dd>
            <dt>{{ trans('employees.Employee_Phone') }}</dt>
            <dd>{{ $employee->Employee_Phone }}</dd>
            <dt>{{ trans('employees.Is_Active') }}</dt>
            <dd>{{ ($employee->Is_Active) ? trans('locale.Yes') : trans('locale.No') }}</dd>
            <dt>{{ trans('employees.Organisation_ID') }}</dt>
            <dd>{{ optional($employee->Organisation)->Organisation_Name }}</dd>
            <dt>{{ trans('employees.Created_At') }}</dt>
            <dd>{{ $employee->Created_At }}</dd>
            <dt>{{ trans('employees.Updated_At') }}</dt>
            <dd>{{ $employee->Updated_At }}</dd>

      </div>
    </div>
    
</section>

@endsection
