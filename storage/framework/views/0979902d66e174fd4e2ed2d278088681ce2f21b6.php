<aside
  class="<?php echo e($configData['sidenavMain']); ?> <?php if(!empty($configData['activeMenuType'])): ?> <?php echo e($configData['activeMenuType']); ?> <?php else: ?> <?php echo e($configData['activeMenuTypeClass']); ?><?php endif; ?> <?php if(($configData['isMenuDark']) === true): ?> <?php echo e('sidenav-dark'); ?> <?php elseif(($configData['isMenuDark']) === false): ?><?php echo e('sidenav-light'); ?>  <?php else: ?> <?php echo e($configData['sidenavMainColor']); ?><?php endif; ?>">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a class="brand-logo darken-1" href="<?php echo e(asset('/')); ?>">
        <?php if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType'])): ?>
          <?php if($configData['mainLayoutType']=== 'vertical-modern-menu'): ?>
          <img class="hide-on-med-and-down" src="<?php echo e(asset($configData['largeScreenLogo'])); ?>" alt="materialize logo" />
          <img class="show-on-medium-and-down hide-on-med-and-up" src="<?php echo e(asset($configData['smallScreenLogo'])); ?>"
            alt="materialize logo" />

          <?php elseif($configData['mainLayoutType']=== 'vertical-menu-nav-dark'): ?>
          <img src="<?php echo e(asset($configData['smallScreenLogo'])); ?>" alt="materialize logo" />

          <?php elseif($configData['mainLayoutType']=== 'vertical-gradient-menu'): ?>
          <img class="show-on-medium-and-down hide-on-med-and-up" src="<?php echo e(asset($configData['largeScreenLogo'])); ?>"
            alt="materialize logo" />
          <img class="hide-on-med-and-down" src="<?php echo e(asset($configData['smallScreenLogo'])); ?>" alt="materialize logo" />

          <?php elseif($configData['mainLayoutType']=== 'vertical-dark-menu'): ?>
          <img class="show-on-medium-and-down hide-on-med-and-up" src="<?php echo e(asset($configData['largeScreenLogo'])); ?>"
            alt="materialize logo" />
          <img class="hide-on-med-and-down" src="<?php echo e(asset($configData['smallScreenLogo'])); ?>" alt="materialize logo" />
          <?php endif; ?>
        <?php endif; ?>
        <span class="logo-text hide-on-med-and-down">
          <?php if(!empty ($configData['templateTitle']) && isset($configData['templateTitle'])): ?>
          <?php echo e($configData['templateTitle']); ?>

          <?php else: ?>
          Materialize
          <?php endif; ?>
        </span>
      </a>
      <!-- <a class="navbar-toggler" href="javascript:void(0)"><i class="material-icons">radio_button_checked</i></a></h1> -->
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
    data-menu="menu-navigation" data-collapsible="menu-accordion">
    
    <?php if(!empty($menuData[0]) && isset($menuData[0])): ?>
      <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($menu->navheader)): ?>
        <li class="navigation-header">
          
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
        <li class="bold <?php echo e((request()->is($menu->url.'*')) ? 'active' : ''); ?><?php if($menu->url == '/organisations' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/managers' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/devices' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?>">
          <a class="<?php echo e($custom_classes); ?> <?php echo e((request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''); ?>"
            <?php if(!empty($configData['activeMenuColor'])): ?> <?php echo e('style=background:none;box-shadow:none;'); ?> <?php endif; ?>
            href="<?php if(($menu->url)==='javascript:void(0)'): ?><?php echo e($menu->url); ?> <?php else: ?><?php echo e(url($menu->url)); ?> <?php endif; ?>"
            <?php echo e(isset($menu->newTab) ? 'target="_blank"':''); ?>>
            <i class="material-icons"><?php echo e($menu->icon); ?></i>
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
  <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
    href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside><?php /**PATH D:\data\li\webde\resources\views/panels/sidebar.blade.php ENDPATH**/ ?>