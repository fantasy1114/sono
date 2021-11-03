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

<section class="users-list-wrapper section <?php if(Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?>">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s12 m12 l12 left-align">
            <h5 class="white-text"><?php echo e(isset($manager->name) ? $manager->name : 'Manager'); ?></h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt><?php echo e(trans('managers.name')); ?></dt>
            <dd><?php echo e($manager->name); ?></dd>
            <dt><?php echo e(trans('managers.email')); ?></dt>
            <dd><?php echo e($manager->email); ?></dd>
            <dt><?php echo e(trans('managers.organisation_id')); ?></dt>
            <dd><?php echo e(optional($manager->Organisation)->Organisation_Name); ?></dd>
            <dt><?php echo e(trans('managers.phone')); ?></dt>
            <dd><?php echo e($manager->phone); ?></dd>
            <dt><?php echo e(trans('managers.is_superuser')); ?></dt>
            <dd><?php echo e(($manager->is_superuser) ? trans('locale.Yes') : trans('locale.No')); ?></dd>
            <dt><?php echo e(trans('managers.is_active')); ?></dt>
            <dd><?php echo e(($manager->is_active) ? trans('locale.Yes') : trans('locale.No')); ?></dd>
            <dt><?php echo e(trans('managers.created_at')); ?></dt>
            <dd><?php echo e($manager->created_at); ?></dd>
            <dt><?php echo e(trans('managers.updated_at')); ?></dt>
            <dd><?php echo e($manager->updated_at); ?></dd>

      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/managers/show.blade.php ENDPATH**/ ?>