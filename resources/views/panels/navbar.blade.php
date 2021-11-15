<!-- Customized by Yuris -->
<script src="{{asset('js/vendors.min.js')}}"></script>
<div class="navbar navbar-fixed pl-0">
  <nav
    class="navbar-main navbar-color nav-collapsible no-shadow nav-expanded sideNav-lock  navbar-dark gradient-45deg-indigo-purple ">
    <div class="nav-wrapper">
      
      <ul class="navbar-list right mr-2">
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light russia_lang" href="{{url('lang/ru')}}" data-language="ru" style="color:#71FFDC; font-weight:600;">
            RU
          </a>
        </li>
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light english_lang" href="{{url('lang/en')}}" data-language="en" style="color:#71FFDC; font-weight:600;">
            EN
          </a>
        </li>
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light lvtian_lang" href="{{url('lang/lv')}}" data-language="lv" style="color:#71FFDC; font-weight:600;">
            LV
          </a>
        </li>
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);" data-target="profile-dropdown">
            <span class="avatar-status avatar-online" style="vertical-align: baseline;width:40px;" >
              @if(auth()->user()->is_superuser)
                <img src="{{asset('images/avatar/avatar-admin.png')}}" alt="Super User"><i></i>
              @else
                <img src="{{asset('images/avatar/avatar-0.png')}}" alt="Manager"><i></i>
              @endif
            </span>
          </a>
        </li>
        
        
      </ul>
      <!-- translation-button-->
      <!-- Disabled per conversation -->
      <ul class="dropdown-content" id="translation-dropdown" >
        <li class="dropdown-item py-0 pl-0">
          <a class="grey-text text-darken-1" href="{{url('lang/en')}}" data-language="en">
            <i class="flag-icon flag-icon-gb"></i>
            English
          </a>
        </li>
        <li class="dropdown-item py-0 pl-0">
          <a class="grey-text text-darken-1" href="{{url('lang/lv')}}" data-language="lv">
            <i class="flag-icon flag-icon-lv"></i>
            Latviešu
          </a>
        </li>
        <li class="dropdown-item py-0 pl-0">
          <a class="grey-text text-darken-1" href="{{url('lang/ru')}}" data-language="ru">
            <i class="flag-icon flag-icon-ru"></i>
            Русский
          </a>
        </li>
      </ul>

     
      <!-- profile-dropdown-->
      <ul class="dropdown-content" id="profile-dropdown">
        <li>
          <a class="grey-text text-darken-1" href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">keyboard_tab</i>
            {{-- {{ __('Logout') }} --}}
            {{ trans('locale.Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
      </ul>
      
    </div>
  </nav>
</div>
<script>
  var language = $('html')[0].lang;
  if(language == 'en'){
    $('.english_lang').css('color','#fff')
  }
  else if(language == 'ru'){
    $('.russia_lang').css('color','#fff')
  }
  else{
    $('.lvtian_lang').css('color','#fff')
  }
</script>
<!-- search ul  -->