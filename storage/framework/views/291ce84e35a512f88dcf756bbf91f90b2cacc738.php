<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/vendors.min.css')); ?>">
<!-- BEGIN: VENDOR CSS-->
<?php echo $__env->yieldContent('vendor-style'); ?>
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<?php if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType'])): ?>
<link rel="stylesheet" type="text/css"
  href="<?php echo e(asset('css/themes/'.$configData['mainLayoutType'].'-template/materialize.css')); ?>">
<link rel="stylesheet" type="text/css"
  href="<?php echo e(asset('css/themes/'.$configData['mainLayoutType'].'-template/style.css')); ?>">

<?php if($configData['mainLayoutType'] === 'horizontal-menu'): ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/layouts/style-horizontal.css')); ?>">
<?php endif; ?>
<?php else: ?>
<h1>mainLayoutType option is either empty or not set in config custom.php file.</h1>
<?php endif; ?>

<?php echo $__env->yieldContent('page-style'); ?>

<?php if($configData['direction'] === 'rtl'): ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style-rtl.css')); ?>">
<?php endif; ?>
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/laravel-custom.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/custom.css')); ?>">
<!-- END: Custom CSS-->
<style>
  th{
    font-weight: 300!important;
  }
  .profile-button{
    display: inline-flex;
  }
</style><?php /**PATH D:\data\10.30\li\webde\resources\views/panels/styles.blade.php ENDPATH**/ ?>