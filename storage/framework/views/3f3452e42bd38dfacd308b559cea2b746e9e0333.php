<?php $__env->startSection('title','Users list'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


<?php $__env->startSection('vendor-style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-users.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="users-list-wrapper section <?php if(Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?>">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text"><?php echo e(isset($title) ? $title : trans('devices.model_plural')); ?></h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align">
            <a href="<?php echo e(route('devices.device.index')); ?>" class="btn-floating btn waves-effect waves-light blue darken-2">
                <i class="material-icons" title="<?php echo e(trans('devices.create')); ?>">arrow_upward</i>
            </a>
        </div>
    </div>


    <form method="POST" action="<?php echo e(route('devices.device.update', $device->Device_ID)); ?>" 
        id="edit_device_form" name="edit_device_form" accept-charset="UTF-8" class="form-horizontal">
    <div class="row">
        <!-- Edit Form -->
        <div class="col s8 m8 l8">
            <div class="card-panel mb-6">

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

            <?php echo $__env->make('devices.form', [
                'device' => $device,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="row">
        <div class="col s6 m6 l6 left-align">
            <input class="btn btn-primary green" type="submit" value="<?php echo e(trans('devices.update')); ?>">
            </form>
            <a href="<?php echo e(route('devices.device.index')); ?>" class="btn waves-effect waves-light blue darken-2"><?php echo e(trans('locale.cancels')); ?></a>
        </div>
        
        <div class="col s2 m2 l2 right-align">
            <form method="POST" action="<?php echo route('devices.device.destroy', $device->Device_ID); ?>" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input name="_method" value="DELETE" type="hidden">
                <input class="btn btn-primary red" onclick="return confirm(&quot;<?php echo e(trans('devices.confirm_delete')); ?>&quot;)" type="submit" value="<?php echo e(trans('locale.deletes')); ?>">
            </form>
        </div>
        
    </div>
   
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\li\webde\resources\views/devices/edit.blade.php ENDPATH**/ ?>