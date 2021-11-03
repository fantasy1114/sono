<div class="navbar @if(($configData['isNavbarFixed'])=== true){{'navbar-fixed'}} @endif">
  <nav
    class="{{$configData['navbarMainClass']}} @if(($configData['isNavbarDark'])=== true) {{'navbar-dark'}} @elseif(($configData['isNavbarDark'])=== false) {{'navbar-light'}} @elseif(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData['navbarMainColor']}} @endif">
    <div class="nav-wrapper">
      <ul class="left">
        <li>
          <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{asset('/')}}">
              <img src="{{asset($configData['smallScreenLogo'])}}" alt="materialize logo">
              <span class="logo-text hide-on-med-and-down">
                @if(!empty ($configData['templateTitle']))
                {{$configData['templateTitle']}}
                @else
                Materialize
                @endif
              </span>
            </a>
          </h1>
        </li>
      </ul>
      <div class="header-search-wrapper hide-on-med-and-down">
        <i class="material-icons">search</i>
        <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize"
          data-search="starter-kit-list">
        <ul class="search-list collection display-none"></ul>
      </div>
      <ul class="navbar-list right">
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);"
            data-target="translation-dropdown">
            <span class="flag-icon flag-icon-gb"></span>
          </a>
        </li>
        <li class="hide-on-med-and-down">
          <a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);">
            <i class="material-icons">settings_overscan</i>
          </a>
        </li>
        <li class="hide-on-large-only">
          <a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);">
            <i class="material-icons">search </i>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"
            data-target="notifications-dropdown">
            <i class="material-icons">notifications_none
              <small class="notification-badge orange accent-3">5</small>
            </i>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
            data-target="profile-dropdown">
            <span class="avatar-status avatar-online">
              <img src="{{asset('images/avatar/avatar-7.png')}}" alt="avatar">
              <i></i>
            </span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right">
            <i class="material-icons">format_indent_increase</i>
          </a>
        </li>
      </ul>
      <!-- translation-button-->
      <ul class="dropdown-content" id="translation-dropdown">
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/en')}}" data-language="en">
            <i class="flag-icon flag-icon-gb"></i>
            English
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/fr')}}" data-language="fr">
            <i class="flag-icon flag-icon-fr"></i>
            French
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/pt')}}" data-language="pt">
            <i class="flag-icon flag-icon-pt"></i>
            Portuguese
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/de')}}" data-language="de">
            <i class="flag-icon flag-icon-de"></i>
            German
          </a>
        </li>
      </ul>
      <!-- notifications-dropdown-->
      <ul class="dropdown-content" id="notifications-dropdown">
        <li>
          <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
        </li>
        <li class="divider"></li>
        <li>
          <a class="black-text" href="#!">
            <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
            A new order has been placed!
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
        </li>
        <li>
          <a class="black-text" href="#!">
            <span class="material-icons icon-bg-circle red small">stars</span>
            Completed the task
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
        </li>
        <li>
          <a class="black-text" href="#!">
            <span class="material-icons icon-bg-circle teal small">settings</span>
            Settings updated
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
        </li>
        <li>
          <a class="black-text" href="#!">
            <span class="material-icons icon-bg-circle deep-orange small">today</span>
            Director meeting started
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
        </li>
        <li>
          <a class="black-text" href="#!">
            <span class="material-icons icon-bg-circle amber small">trending_up</span>
            Generate monthly report
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
        </li>
      </ul>
      <!-- profile-dropdown-->
      <ul class="dropdown-content" id="profile-dropdown">
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="material-icons">person_outline</i>
            Profile
          </a>
        </li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="material-icons">chat_bubble_outline</i>
            Chat
          </a>
        </li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="material-icons">help_outline</i>
            Help
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="material-icons">lock_outline</i>
            Lock
          </a>
        </li>
        <li>
          <a class="grey-text text-darken-1" href="#">
            <i class="material-icons">keyboard_tab</i>
            Logout
          </a>
        </li>
      </ul>
    </div>
    <nav class="display-none search-sm">
      <div class="nav-wrapper">
        <form id="navbarForm">
          <div class="input-field search-input-sm">
            <input class="search-box-sm" type="search" required="" placeholder='Explore Materialize' id="search"
              data-search="starter-kit-list">
            <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i
              class="material-icons search-sm-close">close</i>
            <ul class="search-list collection search-list-sm display-none"></ul>
          </div>
        </form>
      </div>
    </nav>
  </nav>
  <!-- BEGIN: Horizontal nav start-->
  <nav class="white hide-on-med-and-down" id="horizontal-nav">
    <div class="nav-wrapper">
      <ul class="left hide-on-med-and-down" id="ul-horizontal-nav" data-menu="menu-navigation">
        {{-- Foreach menu item starts --}}
        @if(!empty($menuData[1]) && isset($menuData[1]))
          @foreach ($menuData[1]->menu as $menu)
            @php
            $custom_classes="";
            if(isset($menu->class))
            {
            $custom_classes=$menu->class;
            }
            @endphp
          <li {{(request()->is($menu->url)) ? 'class=active':''}}>
            <a class="@if(isset($menu->submenu)){{'dropdown-menu'}} @endif" href="{{$menu->url}}"
              data-target="@if(isset($menu->activate)){{$menu->activate}} @endif">
              <i class="material-icons">{{$menu->icon}}</i>
              <span>
                <span class="dropdown-title">{{ __('locale.'.$menu->name)}}</span>
                @isset($menu->submenu)
                <i class="material-icons right">keyboard_arrow_down</i>
                @endisset
              </span>
            </a>
            @if(isset($menu->submenu))
              @include('panels.horizontalSubmenu',['menu' => $menu->submenu],['activate'=>$menu->activate])
            @endif
          </li>
          @endforeach
        @endif
      </ul>
    </div>
    <!-- END: Horizontal nav start-->
  </nav>
</div>

{{-- Quick search list --}}
<ul class="display-none" id="default-search-main">
  <li class="auto-suggestion-title"><a class="collection-item" href="#">
      <h6 class="search-title">FILES</h6>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img src="{{asset('images/icon/pdf-image.png')}}" width="24" height="30"
              alt="sample image">
          </div>
          <div class="member-info display-flex flex-column"><span class="black-text">Two new item submitted</span><small
              class="grey-text">Marketing Manager</small></div>
        </div>
        <div class="status"><small class="grey-text">17kb</small></div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img src="{{asset('images/icon/doc-image.png')}}" width="24" height="30"
              alt="sample image">
          </div>
          <div class="member-info display-flex flex-column"><span class="black-text">52 Doc file Generator</span><small
              class="grey-text">FontEnd Developer</small></div>
        </div>
        <div class="status"><small class="grey-text">550kb</small></div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img src="{{asset('images/icon/xls-image.png')}}" width="24" height="30"
              alt="sample image">
          </div>
          <div class="member-info display-flex flex-column"><span class="black-text">25 Xls File Uploaded</span><small
              class="grey-text">Digital Marketing Manager</small></div>
        </div>
        <div class="status"><small class="grey-text">20kb</small></div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img src="{{asset('images/icon/jpg-image.png')}}" width="24" height="30"
              alt="sample image">
          </div>
          <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
              class="grey-text">Web Designer</small></div>
        </div>
        <div class="status"><small class="grey-text">37kb</small></div>
      </div>
    </a></li>
  <li class="auto-suggestion-title"><a class="collection-item" href="#">
      <h6 class="search-title">MEMBERS</h6>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img class="circle" src="{{asset('images/avatar/avatar-7.png')}}" width="30"
              alt="sample image"></div>
          <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small
              class="grey-text">UI designer</small></div>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img class="circle" src="{{asset('images/avatar/avatar-8.png')}}" width="30"
              alt="sample image"></div>
          <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small
              class="grey-text">FontEnd Developer</small></div>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img class="circle" src="{{asset('images/avatar/avatar-10.png')}}" width="30"
              alt="sample image"></div>
          <div class="member-info display-flex flex-column"><span class="black-text">Milena Gibson</span><small
              class="grey-text">Digital Marketing</small></div>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar"><img class="circle" src="{{asset('images/avatar/avatar-12.png')}}" width="30"
              alt="sample image"></div>
          <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
              class="grey-text">Web Designer</small></div>
        </div>
      </div>
    </a></li>
</ul>
<ul class="display-none" id="page-search-title">
  <li class="auto-suggestion-title"><a class="collection-item" href="#">
      <h6 class="search-title">PAGES</h6>
    </a></li>
</ul>
<ul class="display-none" id="search-not-found">
  <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span
        class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
</ul>