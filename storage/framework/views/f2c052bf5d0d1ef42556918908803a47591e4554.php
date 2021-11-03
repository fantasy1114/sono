<?php $__env->startSection('title','Event Log'); ?>




<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/vendors.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/themes/vertical-modern-menu-template/materialize.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/themes/vertical-modern-menu-template/style.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/pages/data-tables.min.css')); ?>">
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/custom/custom.css')); ?>">
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


  <div class="row">
  
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
          <!-- Page Length Options -->
          <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
              
                <div class="row">
                  <div class="col s12">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Key_Name', trans('registries.Key')));?></th>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Employee_Name', trans('registries.Employee')));?></th>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Worksite_Name', trans('registries.Worksite')));?></th>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Action', trans('registries.Event')));?></th>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Action_Time', trans('registries.Event Time and Date')));?></th>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Battery_State', trans('registries.Battery, V')));?></th>
                          <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Signal_Level', trans('registries.Signal Strength')));?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $registries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><a class="" href="<?php echo e(route('registries.registry.show', $registry->Registry_ID )); ?>"><?php echo e($registry->Key_Name); ?></a></td>
                            <td><?php echo e($registry->Employee_Name); ?></td>
                            <td><?php echo e($registry->Worksite_Name); ?></td>
                            <td><?php echo e($registry->Action == 0 ? trans('locale.Arrived') : trans('locale.Left')); ?></td>
                            <td><?php echo e($registry->Action_Time); ?></td>
                            <td><?php echo e($registry->Battery_State); ?></td>
                            <td><?php echo e($registry->Signal_Level); ?></td>
                          </tr>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      <tfoot>
                        
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- users list ends -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(('table/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(('table/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(('table/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/search.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/custom/custom-script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(('table/js/scripts/data-tables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/registries/index.blade.php ENDPATH**/ ?>