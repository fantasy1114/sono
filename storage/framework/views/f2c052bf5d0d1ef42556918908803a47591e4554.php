<?php $__env->startSection('title','Event Log'); ?>




<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/vendors.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/themes/vertical-modern-menu-template/materialize.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/themes/vertical-modern-menu-template/style.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/pages/data-tables.min.css')); ?>">
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/custom/custom.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/fontawesome/css/all.css')); ?>">
<style>
  th >a{
    color:#9D9BA6;
  }
  .sorting, .sorting_asc, .sorting_desc {
      background : none!important;
  }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if(Session::has('success_message')): ?>
    <a name="info_button" class="waves-effect waves-light btn green" style="position:fixed;" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i><?php echo session('success_message'); ?></a>
    <?php endif; ?>


<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper index__solid__border">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text indexpage__title__size"><?php echo e(trans('locale.Event Log')); ?></h5>
            <p class="indexpage__user__explain"><?php echo auth()->user()->renderOrgName(); ?></p>
        </div>
    </div>
    <div class="col-12 mobile_menu_page">
      <ul class="mobile__menu__page__list">
        
        <?php if(!empty($menuData[0]) && isset($menuData[0])): ?>
          <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($menu->navheader)): ?>
            
            <?php else: ?>
            <?php
              $custom_classes="";
              if(isset($menu->class))
              {
              $custom_classes = $menu->class;
              }
            ?>
            <li class="bold mobile__menu__size <?php echo e((request()->is($menu->url.'*')) ? 'active' : ''); ?><?php if($menu->url == '/organisations' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/managers' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/devices' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if('/'.Request::path() == $menu->url): ?> mobile__menu__active <?php endif; ?>">
              <a class="menu__page__icon__links <?php echo e($custom_classes); ?> <?php echo e((request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''); ?>"
                <?php if(!empty($configData['activeMenuColor'])): ?> <?php echo e('style=background:none;box-shadow:none;'); ?> <?php endif; ?>
                href="<?php if(($menu->url)==='javascript:void(0)'): ?><?php echo e($menu->url); ?> <?php else: ?><?php echo e(url($menu->url)); ?> <?php endif; ?>"
                <?php echo e(isset($menu->newTab) ? 'target="_blank"':''); ?>>
                <i class="material-icons mobile__icon__size <?php if('/'.Request::path() == $menu->url): ?> <?php endif; ?>"><?php echo $menu->icon; ?></i>
                <span class="menu-title <?php if('/'.Request::path() == $menu->url): ?> <?php endif; ?>"><?php echo e(__('locale.'.$menu->name)); ?></span>
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
    </div>
  <!-- TABLE -->


  <div class="row">
  
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
          <!-- Page Length Options -->
          <div class="row">
          <div class="col s12 table__response__page">
            <div class="card">
              <div class="py-3">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th class="px-3"><?php echo e(trans('registries.Key')); ?></th>
                          <th><?php echo e(trans('registries.Employee')); ?></th>
                          <th><?php echo e(trans('registries.Worksite')); ?></th>
                          <th><?php echo e(trans('registries.Event')); ?></th>
                          <th><?php echo e(trans('registries.Event Time and Date')); ?></th>
                          <th><?php echo e(trans('registries.Battery, V')); ?></th>
                          <th><?php echo e(trans('registries.Signal Strength')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $registries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td class="px-3"><a class="" href="<?php echo e(route('registries.registry.show', $registry->Registry_ID )); ?>"><?php echo e($registry->Key_Name); ?></a></td>
                            <td><?php echo e($registry->Employee_Name); ?></td>
                            <td><?php echo e($registry->Worksite_Name); ?></td>
                            <td><?php echo e($registry->Action == 0 ? trans('locale.Arrived') : trans('locale.Left')); ?></td>
                            <td><?php echo e($registry->Action_Time); ?></td>
                            <td><?php echo e($registry->Battery_State); ?></td>
                            <td><?php echo e($registry->Signal_Level); ?></td>
                          </tr>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      <tfoot>
                        
                      </tfoot>
                    </table>
                  
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- users list ends -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(('table/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(('table/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(('table/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/search.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/custom/custom-script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('table/js/scripts/data-tables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/registries/index.blade.php ENDPATH**/ ?>