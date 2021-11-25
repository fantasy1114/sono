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
            <h5 class="white-text indexpage__title__size"><?php echo e(isset($title) ? $title : trans('keys.model_plural')); ?></h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align">
            <a href="<?php echo e(route('keys.key.create')); ?>" class="btn waves-effect waves-light d-flex align-items-center float-right edit__add__btn">
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

    <form method="POST" action="<?php echo e(route('keys.key.update', $key->Key_ID)); ?>" 
        id="edit_key_form" name="edit_key_form" accept-charset="UTF-8" class="form-horizontal">
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

    
                <input name="_method" type="hidden" value="PUT">

                <?php echo $__env->make('keys.form', [
                    'key' => $key,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row edit__btns__group">
                    <div class="col-sm-3 col-xl-2">
                        <input class="btn btn-primary editpage__update__btn" type="submit" value="<?php echo e(trans('keys.update')); ?>">
                        </form>
                    </div>
                    <div class="col-sm-9 col-xl-10">
                        <div class="float-left ml-sm-5">
                            <a href="<?php echo e(route('keys.key.index')); ?>" class="btn waves-effect waves-light px-lg-3 darken-2 editpage__cancel__btn"><?php echo e(trans('locale.cancels')); ?></a>
                        </div>
                        <div class="float-right">
                            <form method="POST" action="<?php echo route('keys.key.destroy', $key->Key_ID); ?>" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input name="_method" value="DELETE" type="hidden">
                                <input class="btn btn-primary editpage__delete__btn" onclick="return confirm(&quot;<?php echo e(trans('keys.confirm_delete')); ?>&quot;)" type="submit" value="<?php echo e(trans('locale.deletes')); ?>">
                            </form>
                        </div>
                    </div>
            
                   
                </div>

            </div>
        </div>
    </div>

    <!-- Body -->
    
   
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/keys/edit.blade.php ENDPATH**/ ?>