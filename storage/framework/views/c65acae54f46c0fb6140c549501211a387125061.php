<?php $__env->startSection('title','Users list'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


<?php $__env->startSection('vendor-style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-users.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="users-list-wrapper section mobile_indexpage <?php if(Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?>">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper edit_title_posotion main_page_border pb-2">
        <div class="left-align">
            <h5 class="white-text"><?php echo e(isset($title) ? $title : trans('organisations.model_plural')); ?></h5>
        </div>
        <!-- "Go Up" button -->
        
        <div class="col s3 m3 l3 right-align edit_title_posotion_create">
            <a href="<?php echo e(route('organisations.organisation.create')); ?>" class="btn waves-effect waves-light d-flex align-items-center float-right mr-2 create_new_product">
                <div class="d-inline">add</div><i class="material-icons" title="<?php echo e(trans('organisations.create')); ?>">add</i>
            </a>
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

    <form method="POST" action="<?php echo e(route('organisations.organisation.update', $organisation->Organisation_ID)); ?>" 
        id="edit_organisation_form" name="edit_organisation_form" accept-charset="UTF-8" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col-12 webmobile_design mt-2">
            <div class="card-panel rounded mx-sm-1 px-sm-4">

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

                <?php echo $__env->make('organisations.form', [
                    'organisation' => $organisation,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row mt-5">
                    <div class="col-sm-3">
                        <input class="btn btn-primary btn_update px-lg-3 update_update" type="submit" value="<?php echo e(trans('organisations.update')); ?>">
                        </form>
                    </div>
                    <div class="col-sm-9 update_delete">
                        <div class="float-left">
                            <a href="<?php echo e(route('organisations.organisation.index')); ?>" class="btn waves-effect waves-light px-lg-3 darken-2 update_delete_cancel"><?php echo e(trans('locale.cancels')); ?></a>
                        </div>
                    
                        <div class="float-right update_delete_delete">
                            <form method="POST" action="<?php echo route('organisations.organisation.destroy', $organisation->Organisation_ID); ?>" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input name="_method" value="DELETE" type="hidden">
                                <input class="btn btn-primary px-lg-3 update_delete_delete_back" onclick="return confirm(&quot;<?php echo e(trans('organisations.confirm_delete')); ?>&quot;)" type="submit" value="<?php echo e(trans('locale.deletes')); ?>">
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

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/organisations/edit.blade.php ENDPATH**/ ?>