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
            <h5 class="white-text"><?php echo e(trans('locale.Keys')); ?></h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt><?php echo e(trans('keys.Key_Name')); ?></dt>
            <dd><?php echo e($key->Key_Name); ?></dd>
            <dt><?php echo e(trans('keys.Employee_ID')); ?></dt>
            <dd><?php echo e(optional($key->Employee)->Employee_Name); ?></dd>
            <dt><?php echo e(trans('keys.Is_Active')); ?></dt>
            <dd><?php echo e(($key->Is_Active) ? 'Yes' : 'No'); ?></dd>
            <dt><?php echo e(trans('keys.Created_At')); ?></dt>
            <dd><?php echo e($key->Created_At); ?></dd>
            <dt><?php echo e(trans('keys.Updated_At')); ?></dt>
            <dd><?php echo e($key->Updated_At); ?></dd>

      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/keys/show.blade.php ENDPATH**/ ?>