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
            <h5 class="white-text"><?php echo e(isset($title) ? $title : trans('devices.model_plural')); ?></h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt><?php echo e(trans('devices.Tracker_Code')); ?></dt>
            <dd><?php echo e($device->Tracker_Code); ?></dd>
            <dt><?php echo e(trans('devices.Worksite_ID')); ?></dt>
            <dd><?php echo e(optional($device->Worksite)->Worksite_Name); ?></dd>
            <dt><?php echo e(trans('devices.Is_Active')); ?></dt>
            <dd><?php echo e(($device->Is_Active) ? 'Yes' : 'No'); ?></dd>
            <dt><?php echo e(trans('devices.Created_At')); ?></dt>
            <dd><?php echo e($device->Created_At); ?></dd>
            <dt><?php echo e(trans('devices.Updated_At')); ?></dt>
            <dd><?php echo e($device->Updated_At); ?></dd>

      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\li\webde\resources\views/devices/show.blade.php ENDPATH**/ ?>