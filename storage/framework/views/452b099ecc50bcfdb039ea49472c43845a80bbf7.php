<!-- BEGIN: Footer-->

<footer
  class="<?php echo e($configData['mainFooterClass']); ?> <?php if($configData['isFooterFixed']=== true): ?><?php echo e('footer-fixed'); ?><?php else: ?> <?php echo e('footer-static'); ?> <?php endif; ?> <?php if($configData['isFooterDark']=== true): ?> <?php echo e('footer-dark'); ?> <?php elseif($configData['isFooterDark']=== false): ?> <?php echo e('footer-light'); ?> <?php else: ?> <?php echo e($configData['mainFooterColor']); ?> <?php endif; ?>">
  <div class="footer-copyright">
    <div class="container">
      <span class="right hide-on-small-only">&copy; 2021 <a href="http://www.fabrica.lv" target="_blank">fabrica.IT SIA</a> <?php echo e(trans('locale.footertext')); ?>

      </span>
    </div>
  </div>
</footer>

<!-- END: Footer--><?php /**PATH D:\data\10.30\li\webde\resources\views/panels/footer.blade.php ENDPATH**/ ?>