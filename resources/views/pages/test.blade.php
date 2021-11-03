{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

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
<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text">Keys</h5>
        </div>
        <div class="col s3 m3 l3 right-align">
            <a class="btn-floating btn waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
    </div>
  <!-- TABLE -->
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="users-list-datatable" class="table striped">
            <thead>
              <tr>
                <th>Key</th>
                <th>Assigned To</th>
                <th>Active</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="{{asset('page-users-view')}}">83_18_28_213</a></td>
                <td>Dean Stanley</td>
                <td>No</td>
                <td>
                    <!--
                    <a href=""><i class="material-icons dark-blue-text">remove_red_eye</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons green-text">edit</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons red-text">delete_forever</i></a>
                    -->
                </td>
                <td></td>
              </tr>
              <tr>
                <td><a href="{{asset('page-users-view')}}">83_18_28_214</a></td>
                <td>Rick Morty</td>
                <td>Yes</td>
                <td>
                    <!--
                    <a href=""><i class="material-icons dark-blue-text">remove_red_eye</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons green-text">edit</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons red-text">delete_forever</i></a>
                    -->
                </td>
                <td></td>
              </tr>
              <tr>
                <td><a href="{{asset('page-users-view')}}">83_18_28_215</a></td>
                <td>Chuck Jones</td>
                <td>No</td>
                <td>
                    <!--
                    <a href=""><i class="material-icons dark-blue-text">remove_red_eye</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons green-text">edit</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons red-text">delete_forever</i></a>
                    -->
                </td>
                <td></td>
              </tr>
              <tr>
                <td><a href="{{asset('page-users-view')}}">83_18_28_216</a></td>
                <td>Lara Croft</td>
                <td>Yes</td>
                <td>
                    <!--
                    <a href=""><i class="material-icons dark-blue-text">remove_red_eye</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons green-text">edit</i></a>&nbsp;&nbsp;
                    <a href=""><i class="material-icons red-text">delete_forever</i></a>
                    -->
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
@endsection
