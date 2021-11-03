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
            <h5 class="white-text"><?php echo e(trans('locale.Work sites')); ?></h5>
        </div>
    </div>

    <!-- Body -->
    <div class="card">
      <div class="card-content">
                    <dt><?php echo e(trans('worksites.Worksite_Name')); ?></dt>
            <dd><?php echo e($worksite->Worksite_Name); ?></dd>
            <dt><?php echo e(trans('worksites.Worksite_Address')); ?></dt>
            <dd><?php echo e($worksite->Worksite_Address); ?></dd>
            <dt><?php echo e(trans('worksites.Is_Active')); ?></dt>
            <dd><?php echo e(($worksite->Is_Active) ? trans('locale.Yes') : trans('locale.No')); ?></dd>
            <dt><?php echo e(trans('worksites.Organisation_ID')); ?></dt>
            <dd><?php echo e(optional($worksite->Organisation)->Organisation_Name); ?></dd>
            <dt><?php echo e(trans('worksites.Date_From')); ?></dt>
            <dd><?php echo e($worksite->Date_From); ?></dd>
            <dt><?php echo e(trans('worksites.Created_At')); ?></dt>
            <dd><?php echo e($worksite->Created_At); ?></dd>
            <dt><?php echo e(trans('worksites.Updated_At')); ?></dt>
            <dd><?php echo e($worksite->Updated_At); ?></dd>

      </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/worksites/show.blade.php ENDPATH**/ ?>