<?php $__env->startSection('title','Organisations'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if(Session::has('success_message')): ?>
    <a name="info_button" class="waves-effect waves-light btn green" style="position:fixed;" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i><?php echo session('success_message'); ?></a>
    <?php endif; ?>

<!-- users list start -->
<section class="users-list-wrapper section pt-2 <?php if(Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?>">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper edit_title_posotion main_page_border pb-2">
        <div class="">
            <h5 class="white-text main_index"><?php echo e(trans('organisations.model_plural')); ?></h5>
        </div>
        <div class="col m3 right-align">
            <a href="<?php echo e(route('organisations.organisation.create')); ?>" class=" btn waves-effect waves-light d-flex align-items-center float-right mr-2 create_new_product <?php echo e(auth()->user()->is_superuser ? '' : 'disabled'); ?> ">
              <div class="d-inline">add</div><i class="material-icons" title="<?php echo e(trans('organisations.create')); ?>">add</i>
            </a>
        </div>
    </div>
    <div class="col-12">
      <ul class="mobile_menu_list" style="">
        
        <?php if(!empty($menuData[0]) && isset($menuData[0])): ?>
          <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($menu->navheader)): ?>
            
            <?php else: ?>
            <?php
              $custom_classes="";
              if(isset($menu->class))
              {
              $custom_classes = $menu->class;
              }
            ?>
            <li class="bold px-2 <?php echo e((request()->is($menu->url.'*')) ? 'active' : ''); ?><?php if($menu->url == '/organisations' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/managers' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/devices' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if('/'.Request::path() == $menu->url): ?> mobilemenuactive <?php endif; ?>">
              <a class="menu_with_size <?php echo e($custom_classes); ?> <?php echo e((request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''); ?>"
                <?php if(!empty($configData['activeMenuColor'])): ?> <?php echo e('style=background:none;box-shadow:none;'); ?> <?php endif; ?>
                href="<?php if(($menu->url)==='javascript:void(0)'): ?><?php echo e($menu->url); ?> <?php else: ?><?php echo e(url($menu->url)); ?> <?php endif; ?>"
                <?php echo e(isset($menu->newTab) ? 'target="_blank"':''); ?>>
                <i class="material-icons icons_color <?php if('/'.Request::path() == $menu->url): ?> mobilemenuactive_color <?php endif; ?>"><?php echo e($menu->icon); ?></i>
                <span class="menu-title icons_colors <?php if('/'.Request::path() == $menu->url): ?> mobilemenuactive_color <?php endif; ?>"><?php echo e(__('locale.'.$menu->name)); ?></span>
                <?php if(isset($menu->tag)): ?>
                <span class="<?php echo e($menu->tagcustom); ?>"><?php echo e($menu->tag); ?></span>
                <?php endif; ?>
              </a>
              <?php if(isset($menu->submenu)): ?>
                <?php echo $__env->make('panels.submenu', ['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php endif; ?>
            </li>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </ul>
    </div>
  <!-- TABLE -->
  <div class="row">
    
    <div class="col s12 ">
      <div class="container">
        <div class="section section-data-tables pt-0">
          <!-- Page Length Options -->
          
            <div class="card rounded mobile_indexpage">
              <div class="card-content">
              
                <div class="row">
                  <div class="col s12">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th><?php echo e(trans('organisations.Organisation_Name')); ?></th>
                          <th><?php echo e(trans('locale.thshow')); ?></th>
                          <th><?php echo e(trans('locale.thedit')); ?></th>
                          <th><?php echo e(trans('locale.thdelete')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($organisation->Organisation_Name); ?></td>
                            <form method="POST" action="<?php echo route('organisations.organisation.destroy', $organisation->Organisation_ID); ?>" accept-charset="UTF-8">
                              <td>
                                <a class="btn-flat" href="<?php echo e(route('organisations.organisation.show', $organisation->Organisation_ID )); ?>"><i class="material-icons dark-blue-text">remove_red_eye</i></a>
                              </td>
                              <td>
                                <a class="btn-flat" href="<?php echo e(route('organisations.organisation.edit', $organisation->Organisation_ID )); ?>"><i class="material-icons green-text">edit</i></a>
                              </td>
                              <td>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input name="_method" value="DELETE" type="hidden">
                                <button type="submit" class="btn-flat" title="<?php echo e(trans('organisations.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('organisations.confirm_delete')); ?>&quot;)">
                                    <i class="material-icons red-text">delete_forever</i>
                                </button>
                                <!-- <a href="" onclick="return confirm(&quot;<?php echo e(trans('organisations.confirm_delete')); ?>&quot;)"><i class="material-icons red-text">delete_forever</i></a> -->
                                
                              </td>
                            </form>
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

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/organisations/index.blade.php ENDPATH**/ ?>