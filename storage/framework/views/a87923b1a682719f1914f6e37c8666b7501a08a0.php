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

<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s12 m12 l12 left-align">
            <h5 class="white-text"><?php echo e(isset($title) ? $title : trans('locale.Event Log')); ?></h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt><?php echo e(trans('registries.Key_Name')); ?></dt>
            <dd><?php echo e($registry->Key_Name); ?></dd>
            <dt><?php echo e(trans('registries.Action')); ?></dt>
            <dd><?php echo e($registry->Action); ?></dd>
            <dt><?php echo e(trans('registries.Action_Time')); ?></dt>
            <dd><?php echo e($registry->Action_Time); ?></dd>
            <dt><?php echo e(trans('registries.Battery_State')); ?></dt>
            <dd><?php echo e($registry->Battery_State); ?></dd>

      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\li\webde\resources\views/registries/show.blade.php ENDPATH**/ ?>