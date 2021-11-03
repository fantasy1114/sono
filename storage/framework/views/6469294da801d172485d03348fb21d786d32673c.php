<!-- Customized by Yuris -->
<div class="navbar navbar-fixed ">
  <nav
    class="navbar-main navbar-color nav-collapsible no-shadow nav-expanded sideNav-lock  navbar-dark gradient-45deg-indigo-purple ">
    <div class="nav-wrapper">
      
      <ul class="navbar-list right">
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);"
            data-target="translation-dropdown">
            <span class="flag-icon flag-icon-gb"></span>
          </a>
        </li>
        
        <li>
          <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
            data-target="profile-dropdown">
            <span class="avatar-status avatar-online">
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
    <nav class="display-none search-sm">
      <div class="nav-wrapper">
        <form id="navbarForm">
          <div class="input-field search-input-sm">
            <input class="search-box-sm mb-0" type="search" required="" placeholder='Explore Materialize' id="search"
              data-search="starter-kit-list">
            <label class="label-icon" for="search">
              <i class="material-icons search-sm-icon">search</i>
            </label>
            <i class="material-icons search-sm-close">close</i>
            <ul class="search-list collection search-list-sm display-none"></ul>
          </div>
        </form>
      </div>
    </nav>
  </nav>
</div>
<!-- search ul  -->
<ul class="display-none" id="default-search-main">
  <li class="auto-suggestion-title">
    <a class="collection-item" href="#">
      <h6 class="search-title">FILES</h6>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="<?php echo e(asset('images/icon/pdf-image.png')); ?>" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">
              Two new item submitted</span>
            <small class="grey-text">Marketing Manager</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">17kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="<?php echo e(asset('images/icon/doc-image.png')); ?>" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">52 Doc file Generator</span>
            <small class="grey-text">FontEnd Developer</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">550kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="<?php echo e(asset('images/icon/xls-image.png')); ?>" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">25 Xls File Uploaded</span>
            <small class="grey-text">Digital Marketing Manager</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">20kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img src="<?php echo e(asset('images/icon/jpg-image.png')); ?>" width="24" height="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Anna Strong</span>
            <small class="grey-text">Web Designer</small>
          </div>
        </div>
        <div class="status"><small class="grey-text">37kb</small></div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion-title">
    <a class="collection-item" href="#">
      <h6 class="search-title">MEMBERS</h6>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="<?php echo e(asset('images/avatar/avatar-7.png')); ?>" width="30" alt="sample image"></div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">John Doe</span>
            <small class="grey-text">UI designer</small>
          </div>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="<?php echo e(asset('images/avatar/avatar-8.png')); ?>" width="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Michal Clark</span>
            <small class="grey-text">FontEnd Developer</small>
          </div>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="<?php echo e(asset('images/avatar/avatar-10.png')); ?>" width="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Milena Gibson</span>
            <small class="grey-text">Digital Marketing</small>
          </div>
        </div>
      </div>
    </a>
  </li>
  <li class="auto-suggestion">
    <a class="collection-item" href="#">
      <div class="display-flex">
        <div class="display-flex align-item-center flex-grow-1">
          <div class="avatar">
            <img class="circle" src="<?php echo e(asset('images/avatar/avatar-12.png')); ?>" width="30" alt="sample image">
          </div>
          <div class="member-info display-flex flex-column">
            <span class="black-text">Anna Strong</span>
            <small class="grey-text">Web Designer</small>
          </div>
        </div>
      </div>
    </a>
  </li>
</ul>
<ul class="display-none" id="page-search-title">
  <li class="auto-suggestion-title">
    <a class="collection-item" href="#">
      <h6 class="search-title">PAGES</h6>
    </a>
  </li>
</ul>
<ul class="display-none" id="search-not-found">
  <li class="auto-suggestion">
    <a class="collection-item display-flex align-items-center" href="#">
      <span class="material-icons">error_outline</span>
      <span class="member-info">No results found.</span>
    </a>
  </li>
</ul><?php /**PATH D:\data\10.30\li\webde\resources\views/panels/navbar.blade.php ENDPATH**/ ?>