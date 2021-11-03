
<?php if(isset($pageConfigs)): ?>
<?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>

<!DOCTYPE html>
<?php
// confiData variable layoutClasses array in Helper.php file.
$configData = Helper::applClasses();
?>

<html class="loading" lang="<?php if(session()->has('locale')): ?><?php echo e(session()->get('locale')); ?><?php else: ?><?php echo e($configData['defaultLanguage']); ?><?php endif; ?>" data-textdirection="<?php echo e(env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr'); ?>">
<!-- BEGIN: Head-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="apple-touch-icon" href="../../images/favicon/apple-touch-icon-152x152.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/favicon-32x32.png">

  
  <?php echo $__env->make('panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<!-- END: Head-->


<?php if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType'])): ?>
<?php echo $__env->make(($configData['mainLayoutType'] === 'horizontal-menu') ? 'layouts.horizontalLayoutMaster':
'layouts.verticalLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>

<h1><?php echo e('mainLayoutType Option is empty in config custom.php file.'); ?></h1>
<?php endif; ?>

</html><?php /**PATH D:\data\10.30\li\webde\resources\views/layouts/contentLayoutMaster.blade.php ENDPATH**/ ?>