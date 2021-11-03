<?php $__env->startSection('title','Event Log'); ?>




<?php $__env->startSection('vendor-style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/fontawesome/css/all.css')); ?>">
<style>
  th >a{
    color:#9D9BA6;
  }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if(Session::has('success_message')): ?>
    <a name="info_button" class="waves-effect waves-light btn green" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i><?php echo session('success_message'); ?></a>
    <?php endif; ?>


<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text"><?php echo e(trans('locale.Event Log')); ?></h5>
            <p><?php echo auth()->user()->renderOrgName(); ?></p>
        </div>
        <div class="col s3 m3 l3 right-align">
            <!--<a href="<?php echo e(route('registries.registry.create')); ?>" class="btn-floating btn waves-effect waves-light red disabled">
                <i class="material-icons" title="<?php echo e(trans('registries.create')); ?>">add</i> 
            </a>-->
        </div>
    </div>
  <!-- TABLE -->
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <?php if(count($registries) == 0): ?>
            <div class="panel-body text-center">
                <h4><?php echo e(trans('registries.none_available')); ?></h4>
            </div>
        <?php else: ?>
        <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table class="table striped">
            <thead>
              <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Key_Name', trans('registries.Key')));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Employee_Name', trans('registries.Employee')));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Worksite_Name', trans('registries.Worksite')));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Action', trans('registries.Event')));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Action_Time', trans('registries.Event Time and Date')));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Battery_State', trans('registries.Battery, V')));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Signal_Level', trans('registries.Signal Strength')));?></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $registries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><a class="" href="<?php echo e(route('registries.registry.show', $registry->Registry_ID )); ?>"><?php echo e($registry->Key_Name); ?></a></td>
                <td><?php echo e($registry->Employee_Name); ?></td>
                <td><?php echo e($registry->Worksite_Name); ?></td>
                <td><?php echo e($registry->Action == 0 ? 'Arrived' : 'Left'); ?></td>
                <td><?php echo e($registry->Action_Time); ?></td>
                <td><?php echo e($registry->Battery_State); ?></td>
                <td><?php echo e($registry->Signal_Level); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <?php echo $registries->appends(\Request::except('page'))->render(); ?>


        <!-- datatable ends -->
        </div>
        <?php endif; ?>
    </div>
  </div>
</section>

<!-- users list ends -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\li\webde\resources\views/registries/index.blade.php ENDPATH**/ ?>