{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard')

<!-- Changed by Yuris to support Materialize CSS -->

{{-- vendors styles --}}
@section('vendor-style')
<!--
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
-->
@endsection

{{-- page styles --}}
@section('page-style')
<!--
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
-->
@endsection

<!-- dd(Auth::User()->organisation_id) -->

{{-- page content --}}
@section('content')

    <!-- Needs to be revised for Materialize CSS and add dismiss button -->
    @if(Session::has('success_message'))
        <div class="msg msg-info green white-text">
            <i class="material-icons">check</i>
            {!! session('success_message') !!}
            <!--
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            -->
        </div>
    @endif

<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s12 m12 l12 left-align">
            <h5 class="white-text">{{ trans('Dashboard') }}</h5>
            <p>{!! auth()->user()->renderOrgName() !!}</p>
        </div>
    </div>

    <!-- Dashboard contents -->
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                
                <h5 class="black-text">{{ auth()->user()->name }}</h5>
                @if (auth()->user()->is_superuser)
                    <span class="card-title red-text">Super User</span>
                @else
                    <span class="card-title green-text">Manager of {!! auth()->user()->renderOrgName() !!}</span>
                @endif
                <!--
                <p class="brown-text"> 
                    Dump: <span>{{ auth()->user() }}</span>
                </p>
                -->
<!--
        <div class="row mb-1">
            <div class="col s4 purple lighten-2 white-text">
                <ul class="">
                <li>Showing 1 to 25 out of 49 records</li>
                </ul>
            </div>
            <div class="col s8 purple lighten-2 right-align">
                <ul id="navlist" class="">
                    <li class=""><b>&lt;</b></li>
                    <li class="">1</li>
                    <li class="white-text">2</li>
                    <li class="white-text">3</li>
                    <li class="white-text">&gt;</li>
                </ul>
            </div>
        </div>
-->                
        </div>

        <!--
        <div class="section msg msg-info z-depth-3 green white-text ">Info Message</div>
        <p>
        -->
            <!--
            <a name="info_button" class="waves-effect waves-light btn green" onclick="this.parentNode.removeChild(this);"><i class="material-icons left">done</i>Employee record has been updated</a>
            -->
            <!--
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            -->
        </div>
        
    </div>

</section>
<!-- users list ends -->
@endsection

