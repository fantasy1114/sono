  <!-- Customized by Yuris -->
  <body
  class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns"
  data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    @include('panels.navbar')
  </header>
  <!-- END: Header-->

  <!-- BEGIN: SideNav-->
  @include('panels.sidebar')
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <div id="main">
    <div class="row">
      @if ($configData["navbarLarge"] === true)
      @if(($configData["mainLayoutType"]) === 'vertical-modern-menu')
      {{-- navabar large  --}}
      <div
        class="content-wrapper-before @if(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData["navbarLargeColor"]}} @endif">
      </div>
      @else
      {{-- navabar large  --}}
      <div class="content-wrapper-before {{$configData["navbarLargeColor"]}}">
      </div>
      @endif
      @endif


      @if($configData["pageHeader"] === true && isset($breadcrumbs))
      {{--  breadcrumb --}}
      @include('panels.breadcrumb')
      @endif
      <div class="col s12">
        <div class="container">
          {{-- main page content --}}
          @yield('content')
          {{-- right sidebar --}}
          @include('pages.sidebar.right-sidebar')
        </div>
        {{-- overlay --}}
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>
  <!-- END: Page Main-->


  {{-- footer  --}}
  @include('panels.footer')
  {{-- vendor and page scripts --}}
  @include('panels.scripts')
</body>