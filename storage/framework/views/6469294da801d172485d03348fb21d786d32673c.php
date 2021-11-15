<!-- Customized by Yuris -->
<script src="<?php echo e(asset('js/vendors.min.js')); ?>"></script>
<div class="navbar navbar-fixed pl-0">
  <nav
    class="navbar-main navbar-color nav-collapsible no-shadow nav-expanded sideNav-lock  navbar-dark gradient-45deg-indigo-purple ">
    <div class="nav-wrapper">
      
      <ul class="navbar-list right mr-2">
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light russia_lang" href="<?php echo e(url('lang/ru')); ?>" data-language="ru" style="color:#71FFDC; font-weight:600;">
            RU
          </a>
        </li>
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light english_lang" href="<?php echo e(url('lang/en')); ?>" data-language="en" style="color:#71FFDC; font-weight:600;">
            EN
          </a>
        </li>
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light lvtian_lang" href="<?php echo e(url('lang/lv')); ?>" data-language="lv" style="color:#71FFDC; font-weight:600;">
            LV
          </a>
        </li>
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);" data-target="profile-dropdown">
            <span class="avatar-status avatar-online" style="vertical-align: baseline;width:40px;" >
              <?php if(auth()->user()->is_superuser): ?>
                <img src="<?php echo e(asset('images/avatar/avatar-admin.png')); ?>" alt="Super User"><i></i>
              <?php else: ?>
                <img src="<?php echo e(asset('images/avatar/avatar-0.png')); ?>" alt="Manager"><i></i>
              <?php endif; ?>
            </span>
          </a>
        </li>
        
        
      </ul>
      <!-- translation-button-->
      <!-- Disabled per conversation -->
      <ul class="dropdown-content" id="translation-dropdown" >
        <li class="dropdown-item py-0 pl-0">
          <a class="grey-text text-darken-1" href="<?php echo e(url('lang/en')); ?>" data-language="en">
            <i class="flag-icon flag-icon-gb"></i>
            English
          </a>
        </li>
        <li class="dropdown-item py-0 pl-0">
          <a class="grey-text text-darken-1" href="<?php echo e(url('lang/lv')); ?>" data-language="lv">
            <i class="flag-icon flag-icon-lv"></i>
            Latviešu
          </a>
        </li>
        <li class="dropdown-item py-0 pl-0">
          <a class="grey-text text-darken-1" href="<?php echo e(url('lang/ru')); ?>" data-language="ru">
            <i class="flag-icon flag-icon-ru"></i>
            Русский
          </a>
        </li>
      </ul>

     
      <!-- profile-dropdown-->
      <ul class="dropdown-content" id="profile-dropdown">
        <li>
          <a class="grey-text text-darken-1" href="<?php echo e(route('logout')); ?>" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">keyboard_tab</i>
            
            <?php echo e(trans('locale.Logout')); ?>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
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
<!-- search ul  --><?php /**PATH D:\data\10.30\li\webde\resources\views/panels/navbar.blade.php ENDPATH**/ ?>