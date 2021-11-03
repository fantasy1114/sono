<?php $__env->startSection('title','Users list'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


<?php $__env->startSection('vendor-style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/page-users.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text"><?php echo e(trans('worksites.create')); ?></h5>
        </div>
        <!-- "Go Up" button -->
        <div class="col s3 m3 l3 right-align">
            <a href="<?php echo e(route('worksites.worksite.index')); ?>" class="btn-floating btn waves-effect waves-light blue darken-2">
                <i class="material-icons" title="<?php echo e(trans('worksites.create')); ?>">arrow_upward</i>
            </a>
        </div>
    </div>


    <form method="POST" action="<?php echo e(route('worksites.worksite.store')); ?>" accept-charset="UTF-8" 
        id="create_worksite_form" name="create_worksite_form" class="form-horizontal">
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

            <?php echo $__env->make('worksites.form', [
                                        'worksite' => null,
                                      ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="row">
        <div class="col s6 m6 l6 left-align">
            <input class="btn btn-primary green" type="submit" value="<?php echo e(trans('locale.creates')); ?>">
            </form>
            <a href="<?php echo e(route('worksites.worksite.index')); ?>" class="btn waves-effect waves-light blue darken-2"><?php echo e(trans('locale.cancels')); ?></a>
        </div>
        
        <div class="col s2 m2 l2 right-align">
        </div>

    </div>
   
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/worksites/create.blade.php ENDPATH**/ ?>