
<?php if(isset($pageConfigs)): ?>
<?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>
<!DOCTYPE html>
<?php
$configData = Helper::applClasses();
?>
<!--
Template Name: Materialize - Material Design Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
Renew Support: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading"
  lang="<?php if(session()->has('locale')): ?><?php echo e(session()->get('locale')); ?><?php else: ?><?php echo e($configData['defaultLanguage']); ?><?php endif; ?>"
  data-textdirection="ltr">
<!-- BEGIN: Head1-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('title'); ?> | Materialize - Material Design Admin Template</title>
  <link rel="apple-touch-icon" href="../../../images/favicon/apple-touch-icon-152x152.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../images/favicon/favicon-32x32.png">

  <!-- Include core + vendor Styles -->
  <?php echo $__env->make('panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<!-- END: Head-->

<body
  class="<?php echo e($configData['mainLayoutTypeClass']); ?> <?php if(!empty($configData['bodyCustomClass'])): ?> <?php echo e($configData['bodyCustomClass']); ?> <?php endif; ?>"
  data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
  <div class="row">
    <div class="col s12">
      <div class="container">
        <!--  main content -->
        <?php echo $__env->yieldContent('content'); ?>
      </div>
      
      <div class="content-overlay"></div>
    </div>
  </div>
  
  <?php echo $__env->make('panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH D:\data\10.30\li\webde\resources\views/layouts/fullLayoutMaster.blade.php ENDPATH**/ ?>