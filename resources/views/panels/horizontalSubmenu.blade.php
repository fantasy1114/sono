<ul class="dropdown-content dropdown-horizontal-list" id="@if(isset($activate)){{$activate}} @endif">
  @foreach ($menu as $submenu)
    @php
    $custom_classes="";
    if(isset($submenu->class)){
    $custom_classes = $submenu->class;
    }
    @endphp
  <li
    class="{{(isset($submenu->submenu)) ? 'dropdown-submenu ' : ''}}{{(request()->is($submenu->url)) ? 'active ':''}}{{$custom_classes}}"
    data-menu="{{(isset($submenu->submenu)) ? 'dropdown-submenu' : ''}}">
    <a href="{{$submenu->url}}" class="{{(isset($submenu->submenu)) ? 'dropdownSub-menu' : ''}}"
      data-target="@if(isset($submenu->activate)){{$submenu->activate}} @endif">
      <span>{{ __('locale.'.$submenu->name)}}</span>
      @if(isset($submenu->submenu))
      <i class="material-icons right">chevron_right</i>
      @endif
    </a>
    @if(isset($submenu->submenu))
    @include('panels.horizontalSubmenu',['menu' => $submenu->submenu],['activate'=>$submenu->activate])
    @endif
  </li>
  @endforeach
</ul>