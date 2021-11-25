<aside
  class="<?php echo e($configData['sidenavMain']); ?> <?php if(!empty($configData['activeMenuType'])): ?> <?php echo e($configData['activeMenuType']); ?> <?php else: ?> <?php echo e($configData['activeMenuTypeClass']); ?><?php endif; ?> <?php if(($configData['isMenuDark']) === true): ?> <?php echo e('sidenav-dark'); ?> <?php elseif(($configData['isMenuDark']) === false): ?><?php echo e('sidenav-light'); ?>  <?php else: ?> <?php echo e($configData['sidenavMainColor']); ?><?php endif; ?>">
  <div class="brand-sidebar">
    
      <a class="brand-logo darken-1 w-100 text-center" href="<?php echo e(asset('/')); ?>">
        <?php if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType'])): ?>
          <?php if($configData['mainLayoutType']=== 'vertical-modern-menu'): ?>
          
          <div class="align-middle">
            <svg width="186" height="27" class="sidebar__logo__size" viewBox="0 0 186 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M26.5904 14.259H31.0825C31.2999 16.2152 32.1693 17.3745 35.0675 17.3745C37.8207 17.3745 38.7626 16.2152 38.7626 14.8386C38.7626 13.6069 37.7482 12.9548 36.1543 12.665L32.9663 12.2303C28.6915 11.6507 27.0976 10.2016 27.0976 7.08608C27.0976 3.82567 29.3436 1.28979 34.9226 1.28979C40.5739 1.28979 42.82 3.82567 42.82 7.15854H38.3279C38.183 5.63701 37.6033 4.33285 34.8501 4.33285C32.5316 4.33285 31.6621 5.27474 31.6621 6.79627C31.6621 8.02798 32.3867 8.53516 33.6908 8.75252L36.8063 9.18724C40.8638 9.76687 43.2547 11.1435 43.2547 14.6213C43.2547 17.8817 40.7913 20.4175 34.8501 20.4175C29.0538 20.4175 26.5904 17.8817 26.5904 14.259Z" fill="#63D6BA"/>
              <path d="M45.2834 10.8537C45.2834 5.05738 48.6163 1.28979 54.63 1.28979C60.6436 1.28979 64.0489 5.05738 64.0489 10.8537C64.0489 16.65 60.7161 20.4175 54.63 20.4175C48.6163 20.4175 45.2834 16.65 45.2834 10.8537ZM59.4119 10.8537C59.4119 6.79627 57.673 4.76757 54.63 4.76757C51.5869 4.76757 49.848 6.79627 49.848 10.8537C49.848 14.9111 51.5869 16.9398 54.63 16.9398C57.7455 16.9398 59.4119 14.9111 59.4119 10.8537Z" fill="#63D6BA"/>
              <path d="M78.3948 20.0553V8.82497C78.3948 6.28909 77.5253 5.05738 75.2793 5.05738C72.8158 5.05738 71.2943 6.79627 71.2943 9.83932V20.1277H66.6573V1.65206H71.077V4.62266C72.0913 2.66641 73.6853 1.28979 76.7283 1.28979C80.9306 1.28979 83.0318 3.4634 83.0318 7.88307V20.0553H78.3948Z" fill="#63D6BA"/>
              <path d="M85.7125 10.8537C85.7125 5.05738 89.0454 1.28979 95.059 1.28979C101.073 1.28979 104.478 5.05738 104.478 10.8537C104.478 16.65 101.145 20.4175 95.059 20.4175C89.0454 20.4175 85.7125 16.65 85.7125 10.8537ZM99.841 10.8537C99.841 6.79627 98.1021 4.76757 95.059 4.76757C92.016 4.76757 90.2771 6.79627 90.2771 10.8537C90.2771 14.9111 92.016 16.9398 95.059 16.9398C98.1021 16.9398 99.841 14.9111 99.841 10.8537Z" fill="#63D6BA"/>
              <path d="M13.5488 20.7074H6.15856C2.75324 20.7074 0 17.9541 0 14.5488V7.15856C0 3.75324 2.75324 1 6.15856 1H13.5488C16.9541 1 19.7074 3.75324 19.7074 7.15856V14.5488C19.7074 17.9541 16.9541 20.7074 13.5488 20.7074Z" fill="#494747"/>
              <path d="M6.44835 9.98411C7.84888 9.98411 8.98423 8.84876 8.98423 7.44823C8.98423 6.04771 7.84888 4.91235 6.44835 4.91235C5.04783 4.91235 3.91248 6.04771 3.91248 7.44823C3.91248 8.84876 5.04783 9.98411 6.44835 9.98411Z" fill="white"/>
              <path d="M118.762 13.142V9.488H120.76C122.182 9.488 122.812 10.172 122.812 11.324C122.812 12.44 122.182 13.142 120.76 13.142H118.762ZM125.404 11.324C125.404 9.146 123.892 7.436 120.868 7.436H116.242V20H118.762V15.176H120.868C124.108 15.176 125.404 13.232 125.404 11.324ZM139.991 13.682C139.991 9.92 137.147 7.256 133.565 7.256C130.019 7.256 127.121 9.92 127.121 13.682C127.121 17.462 130.019 20.126 133.565 20.126C137.129 20.126 139.991 17.462 139.991 13.682ZM129.713 13.682C129.713 11.126 131.279 9.524 133.565 9.524C135.833 9.524 137.399 11.126 137.399 13.682C137.399 16.238 135.833 17.876 133.565 17.876C131.279 17.876 129.713 16.238 129.713 13.682ZM149.066 11.342C149.066 12.476 148.436 13.214 147.032 13.214H144.926V9.524H147.032C148.436 9.524 149.066 10.226 149.066 11.342ZM142.406 7.436V20H144.926V15.104H146.114L148.886 20H151.802L148.796 14.906C150.812 14.366 151.658 12.818 151.658 11.288C151.658 9.182 150.146 7.436 147.122 7.436H142.406ZM153.811 9.47H157.159V20H159.679V9.47H163.027V7.436H153.811V9.47ZM173.938 20H176.602L172.084 7.418H169.15L164.632 20H167.278L168.106 17.606H173.11L173.938 20ZM172.426 15.59H168.79L170.608 10.334L172.426 15.59ZM178.831 7.436V20H185.491V18.002H181.351V7.436H178.831Z" fill="#494747"/>
            </svg>
              
          </div>
        
          <?php elseif($configData['mainLayoutType']=== 'vertical-menu-nav-dark'): ?>
          <img src="<?php echo e(asset($configData['smallScreenLogo'])); ?>" alt="materialize logo" class="w-100"/>

          <?php elseif($configData['mainLayoutType']=== 'vertical-gradient-menu'): ?>
          <img class="show-on-medium-and-down hide-on-med-and-up" src="<?php echo e(asset($configData['largeScreenLogo'])); ?>"
            alt="materialize logo" class="w-100"/>
          <img class="hide-on-med-and-down" src="<?php echo e(asset($configData['smallScreenLogo'])); ?>" alt="materialize logo" class="w-100"/>

          <?php elseif($configData['mainLayoutType']=== 'vertical-dark-menu'): ?>
          <img class="show-on-medium-and-down hide-on-med-and-up" src="<?php echo e(asset($configData['largeScreenLogo'])); ?>"
            alt="materialize logo" class="w-100"/>
          <img class="hide-on-med-and-down" src="<?php echo e(asset($configData['smallScreenLogo'])); ?>" alt="materialize logo" class="w-100"/>
          <?php endif; ?>
        <?php endif; ?>
        
      </a>
     
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
    
    <?php if(!empty($menuData[0]) && isset($menuData[0])): ?>
      <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($menu->navheader)): ?>
        <li class="navigation-header border-top">
          <a class="navigation-header-text"><?php echo e(trans('locale.menus')); ?></a>
          <i class="navigation-header-icon material-icons"><?php echo e($menu->icon); ?></i>
        </li>
        <?php else: ?>
        <?php
          $custom_classes="";
          if(isset($menu->class))
          {
          $custom_classes = $menu->class;
          }
        ?>
        <li class="bold menu__icon__font<?php echo e((request()->is($menu->url.'*')) ? 'active' : ''); ?><?php if($menu->url == '/organisations' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/managers' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/devices' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if('/'.Request::path() == $menu->url): ?> menuactive <?php endif; ?>">
          <a class="<?php echo e($custom_classes); ?> <?php echo e((request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''); ?>"
            <?php if(!empty($configData['activeMenuColor'])): ?> <?php echo e('style=background:none;box-shadow:none;'); ?> <?php endif; ?>
            href="<?php if(($menu->url)==='javascript:void(0)'): ?><?php echo e($menu->url); ?> <?php else: ?><?php echo e(url($menu->url)); ?> <?php endif; ?>"
            <?php echo e(isset($menu->newTab) ? 'target="_blank"':''); ?>>
            
            <i><?php echo $menu->icon; ?></i>
            <span class="menu-title"><?php echo e(__('locale.'.$menu->name)); ?></span>
            <?php if(isset($menu->tag)): ?>
            <span class="<?php echo e($menu->tagcustom); ?>"><?php echo e($menu->tag); ?></span>
            <?php endif; ?>
          </a>
          <?php if(isset($menu->submenu)): ?>
            <?php echo $__env->make('panels.submenu', ['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
        </li>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </ul>
  <div class="navigation-background"></div>
  
</aside><?php /**PATH D:\data\10.30\li\webde\resources\views/panels/sidebar.blade.php ENDPATH**/ ?>