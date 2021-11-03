
<?php if($paginator->hasPages()): ?>
    <div class="row mb-1">
        <div class="col s4 purple lighten-2 white-text">
            <ul class="">
            <li>
                <?php echo __('Showing'); ?>

                    <span class=""><?php echo e($paginator->firstItem()); ?></span>
                    <?php echo __('to'); ?>

                    <span class=""><?php echo e($paginator->lastItem()); ?></span>
                    <?php echo __('of'); ?>

                    <span class=""><?php echo e($paginator->total()); ?></span>
                    <?php echo __('results'); ?>

            </li>
            </ul>
        </div>
        <div class="col s8 purple lighten-2 right-align">
            <ul id="navlist" class="">
                    
                    <?php if($paginator->onFirstPage()): ?>
                        <li class="">
                            <span class="">&lsaquo;</span>
                        </li>
                    <?php else: ?>
                        <li class="">
                            <a class="white-text" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&lt;</a>
                        </li>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <li class=""><span class=""><?php echo e($element); ?></span></li>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <li class=""><span class=""><?php echo e($page); ?></span></li>
                                <?php else: ?>
                                    <li class=""><a class="white-text" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($paginator->hasMorePages()): ?>
                        <li class="">
                            <a class="white-text" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">&gt;</a>
                        </li>
                    <?php else: ?>
                        <li class="">
                            <span class="">&rsaquo;</span>
                        </li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\data\10.30\li\webde\resources\views/vendor/pagination/mat.blade.php ENDPATH**/ ?>