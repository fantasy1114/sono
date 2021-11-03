<!-- From Manager Form blade -->
<div class="input-field {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="active">{{ trans('managers.password') }}</label>
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($manager)->password) }}" required="true" placeholder="{{ trans('managers.password__placeholder') }}">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<!-- From Auth Register Blade -->
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

<!-- Extra buttons on Registry view -->
                    <a class="btn-flat disabled" href="{{ route('registries.registry.edit', $registry->Registry_ID ) }}"><i class="material-icons green-text">edit</i></a>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="_method" value="DELETE" type="hidden">
                    <button type="submit" class="btn-flat disabled" title="{{ trans('registries.delete') }}" onclick="return confirm(&quot;{{ trans('registries.confirm_delete') }}&quot;)">
                        <i class="material-icons red-text">delete_forever</i>
                    </button>

<!-- Profile submenu in navbar.blade.php -->
<li>
          <a class="grey-text text-darken-1" href="#">
            <i class="material-icons">person_outline</i>
            Profile
          </a>
        </li>


<!-- ?? -->
{!! $registries->appends(\Request::except('page'))->render() !!}

<!-- Extra menus in the language menu -->
<li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/lv')}}" data-language="lv">
            <i class="flag-icon flag-icon-lv"></i>
            Latviešu
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/ru')}}" data-language="ru">
            <i class="flag-icon flag-icon-ru"></i>
            Русский
          </a>
        </li>
        
<!-- Original code in verticalManuLayout.php -->
body class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass']))
   {{$configData['bodyCustomClass']}} @endif @if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])){{'menu-collapse'}} @endif"

<!-- Original navbar -->
<!-- Backgrounds: 
        Original = gradient-45deg-indigo-purple no-shadow
        Arturs Blue = gradient-45deg-light-blue-cyan
-->
<div class="navbar @if(($configData['isNavbarFixed'])=== true){{'navbar-fixed'}} @endif">
  <nav
    class="{{$configData['navbarMainClass']}} @if($configData['isNavbarDark']=== true) {{'navbar-dark'}} @elseif($configData['isNavbarDark']=== false) {{'navbar-light'}} @elseif(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData['navbarMainColor']}} @endif">
    <div class="nav-wrapper">

<!-- Wrong way to paginate (registriers/index.blade.php) -->
{{ $registries->links() }}

<!-- View button from registriers/index.blade.php -->

                <td class="right-align">
                    <!-- <form method="POST" action="{!! route('registries.registry.destroy', $registry->Registry_ID) !!}" accept-charset="UTF-8"> -->
                    <!-- <a class="btn-flat" href="{{ route('registries.registry.show', $registry->Registry_ID ) }}"><i class="material-icons dark-blue-text">remove_red_eye</i></a> -->
                    <!-- <a href="" onclick="return confirm(&quot;{{ trans('registries.confirm_delete') }}&quot;)"><i class="material-icons red-text">delete_forever</i></a> -->
                    <!-- </form> -->
                    </td>
