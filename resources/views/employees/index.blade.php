{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Employee list')

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

@if(Session::has('success_message'))
    <a name="info_button" class="waves-effect waves-light btn green" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i>{!! session('success_message') !!}</a>
@endif


<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text">{{ trans('employees.model_plural') }}</h5>
            <p>{!! auth()->user()->renderOrgName() !!}</p>
        </div>
        <div class="col s3 m3 l3 right-align">
            <a href="{{ route('employees.employee.create') }}" class="btn-floating btn waves-effect waves-light red">
                <i class="material-icons" title="{{ trans('employees.create') }}">add</i>
            </a>
        </div>
    </div>
  <!-- TABLE -->
  <div class="row">
  
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
          <!-- Page Length Options -->
          <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
              
                <div class="row">
                  <div class="col s12">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th>{{ trans('employees.Employee_Name') }}</th>
                          <th>{{ trans('employees.Employee_Phone') }}</th>
                          <th>{{ trans('employees.Is_Active') }}</th>
                          <th>{{ trans('employees.Organisation_ID') }}</th>
                          <th>{{ trans('locale.thshow') }}</th>
                          <th>{{ trans('locale.thedit') }}</th>
                          <th>{{ trans('locale.thdelete') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employees as $employee)
                          <tr>
                            <td>{{ $employee->Employee_Name }}</td>
                            <td>{{ $employee->Employee_Phone }}</td>
                            <td>{{ ($employee->Is_Active) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($employee->Organisation)->Organisation_Name }}</td>

                            <form method="POST" action="{!! route('employees.employee.destroy', $employee->Employee_ID) !!}" accept-charset="UTF-8">
                              <td class="">
                                <a class="btn-flat" href="{{ route('employees.employee.show', $employee->Employee_ID ) }}"><i class="material-icons dark-blue-text">remove_red_eye</i></a>
                              </td>
                              <td>
                                <a class="btn-flat" href="{{ route('employees.employee.edit', $employee->Employee_ID ) }}"><i class="material-icons green-text">edit</i></a>
                              </td>
                              <td>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" value="DELETE" type="hidden">
                                <button type="submit" class="btn-flat" title="{{ trans('employees.delete') }}" onclick="return confirm(&quot;{{ trans('employees.confirm_delete') }}&quot;)">
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
