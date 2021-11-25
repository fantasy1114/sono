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
<style>
  .brand-sidebar .brand-logo {
    left: 0%!important;
    transform: translateX(0%)!important;
  }
 
</style>
<section class="users-list-wrapper section edit__index__page">
    <!-- Header Starts -->
    <div class="row valign-wrapper index__solid__border">
      <div class="col-12">
        <a href="<?php echo e(route('keys.key.index')); ?>" class="btn-floating btn waves-effect waves-light show__back__btn ml-md-2">
          <i class="material-icons" title="<?php echo e(trans('keys.create')); ?>">arrow_back</i>
        </a>
        <h5 class="white-text d-md-inline align-middle indexpage__title__size show__index__name ml-md-2"><?php echo e(trans('locale.Keys')); ?></h5>
        <a href="<?php echo e(route('keys.key.create')); ?>" class="btn waves-effect waves-light d-flex align-items-center float-right show__add__btn">
          <div class="d-inline">add</div><i class="material-icons" title="<?php echo e(trans('keys.create')); ?>">add</i>
        </a>
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
    <!-- Body -->
    <div class="edit__page__position"> 
      <div class="card edit__page__table">
        <div class="card-content row">
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable"><?php echo e(trans('keys.Key_Name')); ?></label>
                <div class="form-group">
                    <input type="text" value="<?php echo e($key->Key_Name); ?>" class="form-control pl-0 placeholder_fonts validate" />
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable"><?php echo e(trans('keys.Employee_ID')); ?></label>
                <div class="form-group">
                    <input type="text" value="<?php echo e(optional($key->Employee)->Employee_Name); ?>" class="form-control pl-0 placeholder_fonts validate" />
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable"><?php echo e(trans('keys.Is_Active')); ?></label>
                <div class="form-group">
                    <input type="text" value="<?php echo e(($key->Is_Active) ? trans('locale.Yes') : trans('locale.No')); ?>" class="form-control pl-0 placeholder_fonts validate" />
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable"><?php echo e(trans('keys.Created_At')); ?></label>
                <div class="form-group">
                    <input type="text" value="<?php echo e(date('d.m.Y H:i', strtotime(str_replace('/', '-', $key->Created_At)))); ?>" class="form-control pl-0 placeholder_fonts validate" />
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 card-width">
            <div class="input-field">
                <label class="active font_lable"><?php echo e(trans('keys.Updated_At')); ?></label>
                <div class="form-group">
                    <input type="text" value="<?php echo e(date('d.m.Y H:i', strtotime(str_replace('/', '-', $key->Updated_At)))); ?>" class="form-control pl-0 placeholder_fonts validate" />
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/keys/show.blade.php ENDPATH**/ ?>