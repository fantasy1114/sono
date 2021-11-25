<?php $__env->startSection('title','Work sites'); ?>

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
<style>

</style>
<?php if(Session::has('success_message')): ?>
    <a name="info_button" class="waves-effect waves-light btn green" style="position:fixed;" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i><?php echo session('success_message'); ?></a>
<?php endif; ?>

<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="col-12 valign-wrapper index__solid__border">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text indexpage__title__size"><?php echo e(trans('worksites.model_plural')); ?></h5>
            <p class="indexpage__user__explain"><?php echo auth()->user()->renderOrgName(); ?></p>
        </div>
        <div class="col s3 m3 l3 right-align pr-0">
            <a href="<?php echo e(route('worksites.worksite.create')); ?>" class="btn waves-effect waves-light d-flex align-items-center float-right indexpage__add__btn">
                <div class="d-inline"><?php echo e(trans('locale.add')); ?></div><i class="material-icons" title="<?php echo e(trans('worksites.create')); ?>">add</i>
            </a>
        </div>
    </div>
    <div class="col-12 mobile_menu_page">
      <ul class="mobile__menu__page__list">
        
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
            <li class="bold mobile__menu__size <?php echo e((request()->is($menu->url.'*')) ? 'active' : ''); ?><?php if($menu->url == '/organisations' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/managers' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if($menu->url == '/devices' && Auth::user()->is_superuser == 0): ?> <?php echo e('d-none'); ?> <?php endif; ?> <?php if('/'.Request::path() == $menu->url): ?> mobile__menu__active <?php endif; ?>">
              <a class="menu__page__icon__links <?php echo e($custom_classes); ?> <?php echo e((request()->is($menu->url.'*')) ? 'active '.$configData['activeMenuColor'] : ''); ?>"
                <?php if(!empty($configData['activeMenuColor'])): ?> <?php echo e('style=background:none;box-shadow:none;'); ?> <?php endif; ?>
                href="<?php if(($menu->url)==='javascript:void(0)'): ?><?php echo e($menu->url); ?> <?php else: ?><?php echo e(url($menu->url)); ?> <?php endif; ?>"
                <?php echo e(isset($menu->newTab) ? 'target="_blank"':''); ?>>
                <i class="material-icons mobile__icon__size <?php if('/'.Request::path() == $menu->url): ?> <?php endif; ?>"><?php echo $menu->icon; ?></i>
                <span class="menu-title <?php if('/'.Request::path() == $menu->url): ?> <?php endif; ?>"><?php echo e(__('locale.'.$menu->name)); ?></span>
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

    <div class="container">
      <div class="section section-data-tables">
        <!-- Page Length Options -->
        <div class="row">
          <div class="col s12 table__response__page">
            <div class="card">
              
              
                
                  
                    <div class="py-3">
                      <table id="page-length-option" class="display">
                        
                        <thead>
                          <tr>
                            <th class="px-3"><?php echo e(trans('worksites.Worksite_Name')); ?></th>
                            <th><?php echo e(trans('worksites.Worksite_Address')); ?></th>
                            <th><?php echo e(trans('worksites.Is_Active')); ?></th>
                            <th><?php echo e(trans('worksites.Organisation_ID')); ?></th>
                            <th><?php echo e(trans('locale.action')); ?></th>
                            
                          </tr>
                        </thead>
                          
                        <tbody>
                          <?php $__currentLoopData = $worksites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $worksite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td class="px-3"><?php echo e($worksite->Worksite_Name); ?></td>
                              <td><?php echo e($worksite->Worksite_Address); ?></td>
                              <td><span class="<?php echo e(($worksite->Is_Active) ? 'statusactive' : 'statusinactive'); ?>"><?php echo e(($worksite->Is_Active) ? 'Active' : 'Inactive'); ?></span></td>
                              <td><?php echo e(optional($worksite->Organisation)->Organisation_Name); ?></td>

                              <form method="POST" action="<?php echo route('worksites.worksite.destroy', $worksite->Worksite_ID); ?>" accept-charset="UTF-8">
                                <td class="">
                                  <a class="btn-flat" href="<?php echo e(route('worksites.worksite.show', $worksite->Worksite_ID )); ?>"><i class="">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.58 11.9999C15.58 13.9799 13.98 15.5799 12 15.5799C10.02 15.5799 8.41998 13.9799 8.41998 11.9999C8.41998 10.0199 10.02 8.41992 12 8.41992C13.98 8.41992 15.58 10.0199 15.58 11.9999Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 20.27C15.53 20.27 18.82 18.19 21.11 14.59C22.01 13.18 22.01 10.81 21.11 9.39997C18.82 5.79997 15.53 3.71997 12 3.71997C8.47003 3.71997 5.18003 5.79997 2.89003 9.39997C1.99003 10.81 1.99003 13.18 2.89003 14.59C5.18003 18.19 8.47003 20.27 12 20.27Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </i></a>
                                
                                  <a class="btn-flat" href="<?php echo e(route('worksites.worksite.edit', $worksite->Worksite_ID )); ?>"><i class=""><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.26 3.59997L5.04997 12.29C4.73997 12.62 4.43997 13.27 4.37997 13.72L4.00997 16.96C3.87997 18.13 4.71997 18.93 5.87997 18.73L9.09997 18.18C9.54997 18.1 10.18 17.77 10.49 17.43L18.7 8.73997C20.12 7.23997 20.76 5.52997 18.55 3.43997C16.35 1.36997 14.68 2.09997 13.26 3.59997Z" stroke="#4CAF50" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.89 5.05005C12.32 7.81005 14.56 9.92005 17.34 10.2" stroke="#4CAF50" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 22H21" stroke="#4CAF50" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </i></a>
                                
                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                  <input name="_method" value="DELETE" type="hidden">
                                  <button type="submit" class="btn-flat" title="<?php echo e(trans('worksites.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('worksites.confirm_delete')); ?>&quot;)">
                                      <i class=""><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#F5584D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#F5584D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.85 9.13989L18.2 19.2099C18.09 20.7799 18 21.9999 15.21 21.9999H8.79002C6.00002 21.9999 5.91002 20.7799 5.80002 19.2099L5.15002 9.13989" stroke="#F5584D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.33 16.5H13.66" stroke="#F5584D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.5 12.5H14.5" stroke="#F5584D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </i>
                                  </button>
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

</section>
<!-- users list ends -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('table/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('table/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('table/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('table/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(asset('table/js/search.min.js')); ?>"></script>
<script src="<?php echo e(asset('table/js/custom/custom-script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script>
  var length_one = "<?php echo e(trans('locale.10_Entries')); ?>";
  var length_two = "<?php echo e(trans('locale.25_Entries')); ?>";
  var length_three = "<?php echo e(trans('locale.50_Entries')); ?>";
  var length_four = "<?php echo e(trans('locale.all_Entries')); ?>";
</script>
<script src="<?php echo e(asset('table/js/scripts/data-tables.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/worksites/index.blade.php ENDPATH**/ ?>