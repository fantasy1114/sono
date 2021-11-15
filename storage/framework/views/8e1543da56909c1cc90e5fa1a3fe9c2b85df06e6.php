<?php $__env->startSection('title','Users list'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css"
  href="<?php echo e(asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-users.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="users-list-wrapper section mobile_indexpage">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s12 m12 l12 left-align">
          <a href="<?php echo e(route('employees.employee.index')); ?>" class="btn-floating btn waves-effect waves-light ml-3 ml-lg-3 show_back">
            <i class="material-icons show_background" title="<?php echo e(trans('employees.create')); ?>">arrow_back</i>
          </a>
          <h5 class="white-text d-lg-inline align-middle ml-3 edit_title_posotion"><?php echo e(trans('locale.Employees')); ?></h5>
        </div>
    </div>
    <div class="col-12">
      <ul class="mobile_menu_list" style="">
          
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
              <li class="bold mx-2 <?php echo e((request()->is($menu->url.'*')) ? 'active' : ''); ?><?php if($menu->url == '/organisations' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/managers' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/devices' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if('/'.Request::path() == $menu->url): ?> mobilemenuactive <?php endif; ?>">
              <a class="menu_with_size <?php echo e($custom_classes); ?> <?php echo e((request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''); ?>"
                  <?php if(!empty($configData['activeMenuColor'])): ?> <?php echo e('style=background:none;box-shadow:none;'); ?> <?php endif; ?>
                  href="<?php if(($menu->url)==='javascript:void(0)'): ?><?php echo e($menu->url); ?> <?php else: ?><?php echo e(url($menu->url)); ?> <?php endif; ?>"
                  <?php echo e(isset($menu->newTab) ? 'target="_blank"':''); ?>>
                  <i class="material-icons icons_color <?php if('/'.Request::path() == $menu->url): ?> mobilemenuactive_color <?php endif; ?>"><?php echo e($menu->icon); ?></i>
                  <span class="menu-title icons_colors <?php if('/'.Request::path() == $menu->url): ?> mobilemenuactive_color <?php endif; ?>"><?php echo e(__('locale.'.$menu->name)); ?></span>
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
    <!-- Body -->
    <div class="card rounded mt-3 px-md-4 py-2">
      <div class="card-content row">
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable"><?php echo e(trans('employees.Employee_Name')); ?></label>
              <div class="form-group">
                  <input type="text" value="<?php echo e($employee->Employee_Name); ?>" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable"><?php echo e(trans('employees.Employee_Phone')); ?></label>
              <div class="form-group">
                  <input type="text" value="<?php echo e($employee->Employee_Phone); ?>" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable"><?php echo e(trans('employees.Is_Active')); ?></label>
              <div class="form-group">
                  <input type="text" value="<?php echo e(($employee->Is_Active) ? trans('locale.Yes') : trans('locale.No')); ?>" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable"><?php echo e(trans('employees.Organisation_ID')); ?></label>
              <div class="form-group">
                  <input type="text" value="<?php echo e(optional($employee->Organisation)->Organisation_Name); ?>" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable"><?php echo e(trans('employees.Created_At')); ?></label>
              <div class="form-group">
                  <input type="text" value="<?php echo e($employee->Created_At); ?>" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 card-width">
          <div class="input-field">
              <label class="active font_lable"><?php echo e(trans('employees.Updated_At')); ?></label>
              <div class="form-group">
                  <input type="text" value="<?php echo e($employee->Updated_At); ?>" class="form-control pl-0 placeholder_fonts validate" />
              </div>
          </div>
        </div>

      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/employees/show.blade.php ENDPATH**/ ?>