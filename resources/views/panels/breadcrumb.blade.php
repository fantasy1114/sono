@if($configData['mainLayoutType'] === 'vertical-modern-menu')
{{-- vertical-modern-menu breadcrumb --}}
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>@yield('title') </span></h5>
        @if(isset($breadcrumbs))
        <ol class="breadcrumbs mb-0">
          @foreach ($breadcrumbs as $breadcrumb)
          <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
            @if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)'))
            <a href="{{url($breadcrumb['link'])}}">@endif{{$breadcrumb['name']}}@if(isset($breadcrumb['link']))</a>
            @endif
          </li>
          @endforeach
        </ol>
        @endif
      </div>
      <div class="col s2 m6 l6">
        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!"
          data-target="dropdown1">
          <i class="material-icons hide-on-med-and-up">settings</i>
          <span class="hide-on-small-onl">Settings</span>
          <i class="material-icons right">arrow_drop_down</i>
        </a>
        <ul class="dropdown-content" id="dropdown1" tabindex="0">
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('user-profile-page')}}">Profile<span
                class="new badge red">2</span></a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('app-contacts')}}">Contacts</a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('page-faq')}}">FAQ</a></li>
          <li class="divider" tabindex="-1"></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('user-login')}}">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@elseif($configData['mainLayoutType'] === 'vertical-menu-nav-dark')
{{-- vertical-menu-nav-dark breadcrumb --}}
<div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6 breadcrumbs-left">
        <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>@yield('title')</span></h5>
        @if(isset($breadcrumbs))
        <ol class="breadcrumbs mb-0">
          @foreach ($breadcrumbs as $breadcrumb)
          <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
            @if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)'))
            <a href="{{$breadcrumb['link']}}">@endif{{$breadcrumb['name']}}@if(isset($breadcrumb['link']))</a>
            @endif
          </li>
          @endforeach
        </ol>
        @endif
      </div>
      <div class="col s2 m6 l6"><a
          class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!"
          data-target="dropdown1"><i class="material-icons">expand_more </i><i
            class="material-icons right">arrow_drop_down</i></a>
        <ul class="dropdown-content" id="dropdown1" tabindex="0">
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('user-profile-page')}}">Profile<span
                class="new badge red">2</span></a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('app-contacts')}}">Contacts</a></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('page-faq')}}">FAQ</a></li>
          <li class="divider" tabindex="-1"></li>
          <li tabindex="0"><a class="grey-text text-darken-2" href="{{asset('user-login')}}">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@elseif($configData['mainLayoutType'] === 'vertical-gradient-menu')
{{-- vertical-gradient-menu breadcrumb --}}
<div class="pt-3 pb-1" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>@yield('title')</span></h5>
      </div>
      <div class="col s12 m6 l6 right-align-md">
        @if(isset($breadcrumbs))
        <ol class="breadcrumbs mb-0">
          @foreach ($breadcrumbs as $breadcrumb)
          <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
            @if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)'))
            <a href="{{$breadcrumb['link']}}">@endif{{$breadcrumb['name']}}@if(isset($breadcrumb['link']))</a>
            @endif
          </li>
          @endforeach
        </ol>
        @endif
      </div>
    </div>
  </div>
</div>

@elseif($configData['mainLayoutType'] === 'vertical-dark-menu')
{{-- vertical-dark-menu --}}
<div id="breadcrumbs-wrapper" data-image="{{asset('images/gallery/breadcrumb-bg.jpg')}}">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>@yield('title')</span></h5>
      </div>
      <div class="col s12 m6 l6 right-align-md">
        @if(isset($breadcrumbs))
        <ol class="breadcrumbs mb-0">
          @foreach ($breadcrumbs as $breadcrumb)
          <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
            @if(isset($breadcrumb['link']) && $breadcrumb['link'] !== 'javascript:void(0)')
            <a href="{{url($breadcrumb['link'])}}">@endif{{$breadcrumb['name']}}@if(isset($breadcrumb['link']))</a>
            @endif
          </li>
          @endforeach
        </ol>
        @endif
      </div>
    </div>
  </div>
</div>
@elseif($configData['mainLayoutType'] === 'horizontal-menu')
{{-- horizontal-menu --}}
<div class="pt-1 pb-0" id="breadcrumbs-wrapper">
  <!-- Search for small screen-->
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
        <h5 class="breadcrumbs-title"><span>@yield('title') </span></h5>
      </div>
      <div class="col s12 m6 l6 right-align-md">
        @if(isset($breadcrumbs))
        <ol class="breadcrumbs mb-0">
          @foreach ($breadcrumbs as $breadcrumb)
          <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
            @if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)'))
            <a href="{{url($breadcrumb['link'])}}">@endif{{$breadcrumb['name']}}@if(isset($breadcrumb['link']))</a>
            @endif
          </li>
          @endforeach
        </ol>
        @endif
      </div>
    </div>
  </div>
</div>
@endif