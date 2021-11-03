{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','User Register')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">
@endsection
<div class="row">
    <div class="col s12 gradient-45deg-purple-deep-orange center">
        <h6 class="white-text">Register with SONO Portal</h6>
    </div>
</div>
{{-- page content --}}
@section('content')
<div id="register-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ route('register') }}">
      @csrf
      <input type="hidden" name="login_token" value="{{ app('request')->input('t') }}">
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Register</h5>
          <p class="ml-4">Join our community now !</p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
            required autocomplete="name" autofocus>
          <label for="name" class="center-align">Name</label>
          @error('name')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email">
          <label for="email">Email / Username</label>
          @error('email')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <!-- Phone added by Yuris -->
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">phone_outline</i>
          <input id="phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
            required autocomplete="name" autofocus>
          <label for="phone" class="center-align">Phone</label>
          @error('phone')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required
            autocomplete="new-password">
          <label for="password">Password</label>
          @error('password')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password-confirm" type="password" name="password_confirmation" required
            autocomplete="new-password">
          <label for="password-confirm">Password again</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit"
            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Register</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <p class="margin medium-small"><a href="{{ route('login')}}">Already have an account? Login</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection