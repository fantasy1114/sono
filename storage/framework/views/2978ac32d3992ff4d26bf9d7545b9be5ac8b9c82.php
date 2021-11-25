<?php $__env->startSection('title','Users list'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


<?php $__env->startSection('vendor-style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-users.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<style>
    .brand-sidebar .brand-logo {
      left: 0%!important;
      transform: translateX(0%)!important;
    }
    </style>
<section class="users-list-wrapper section edit__index__page">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper index__solid__border">
        <div class="left-align">
            <h5 class="white-text indexpage__title__size"><?php echo e(trans('employees.create')); ?></h5>
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

    <form method="POST" action="<?php echo e(route('employees.employee.store')); ?>" accept-charset="UTF-8" 
        id="create_employee_form" name="create_employee_form" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col-12 edit__page__position">
            <div class="card-panel edit__page__table">

                <!-- Errors here, if present -->
                <?php if($errors->any()): ?>
                    <ul class="msg msg-alert">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <?php echo e(csrf_field()); ?>

                <?php echo $__env->make('employees.form', [
                                            'employee' => null,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-12 edit__btns__group">
                    <input class="btn btn-primary create__add__btn" type="submit" value="<?php echo e(trans('locale.creates')); ?>">
                    </form>
                    <a href="<?php echo e(route('employees.employee.index')); ?>" class="btn waves-effect waves-light darken-2 create__cancel__btn"><?php echo e(trans('locale.cancels')); ?></a>
                </div>
                
                <div class="col s2 m2 l2 right-align">
                </div>
        
            </div>

            </div>
        </div>
    </div>

    <!-- Body -->
    
   
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/employees/create.blade.php ENDPATH**/ ?>