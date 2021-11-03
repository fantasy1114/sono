  <!-- Customized by Yuris -->
  <body
  class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns"
  data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    <?php echo $__env->make('panels.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </header>
  <!-- END: Header-->

  <!-- BEGIN: SideNav-->
  <?php echo $__env->make('panels.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <div id="main">
    <div class="row">
      <?php if($configData["navbarLarge"] === true): ?>
      <?php if(($configData["mainLayoutType"]) === 'vertical-modern-menu'): ?>
      
      <div
        class="content-wrapper-before <?php if(!empty($configData['navbarBgColor'])): ?> <?php echo e($configData['navbarBgColor']); ?> <?php else: ?> <?php echo e($configData["navbarLargeColor"]); ?> <?php endif; ?>">
      </div>
      <?php else: ?>
      
      <div class="content-wrapper-before <?php echo e($configData["navbarLargeColor"]); ?>">
      </div>
      <?php endif; ?>
      <?php endif; ?>


      <?php if($configData["pageHeader"] === true && isset($breadcrumbs)): ?>
      
      <?php echo $__env->make('panels.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
      <div class="col s12">
        <div class="container">
          
          <?php echo $__env->yieldContent('content'); ?>
          
          <?php echo $__env->make('pages.sidebar.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>
  <!-- END: Page Main-->


  
  <?php echo $__env->make('panels.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->make('panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body><?php /**PATH D:\data\10.30\li\webde\resources\views/layouts/verticalLayoutMaster.blade.php ENDPATH**/ ?>