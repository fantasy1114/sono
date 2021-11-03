{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

<!-- Changed by Yuris to support Materialize CSS -->

{{-- vendors styles --}}
@section('vendor-style')

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
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text">{{ trans('keys.create') }}</h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align">
            <a href="{{ route('keys.key.index') }}" class="btn-floating btn waves-effect waves-light blue darken-2">
                <i class="material-icons" title="{{ trans('keys.create') }}">arrow_upward</i>
            </a>
        </div>
    </div>


    <form method="POST" action="{{ route('keys.key.store') }}" accept-charset="UTF-8" 
        id="create_key_form" name="create_key_form" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col s8 m8 l8">
            <div class="card-panel mb-6">

            <!-- Errors here, if present -->
            @if ($errors->any())
                <ul class="msg msg-alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{ csrf_field() }}
            @include ('keys.form', [
                                        'key' => null,
                                      ])


            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="row">
        <div class="col s6 m6 l6 left-align">
            <input class="btn btn-primary green" type="submit" value="{{ trans('locale.creates') }}">
            </form>
            <a href="{{ route('keys.key.index') }}" class="btn waves-effect waves-light blue darken-2">{{ trans('locale.cancels') }}</a>
        </div>
        
        <div class="col s2 m2 l2 right-align">
        </div>

    </div>
   
</section>

@endsection
