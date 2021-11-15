<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/vendors.min.css')); ?>">
<style>
  @font-face {
    font-family: 'Poppins';
    src: url('<?php echo e(asset('fonts/normal/Poppins-Light.ttf')); ?>') format('truetype');
  } 
  .placeholder_fonts{
      border-left: none;
      border-top: none;
      border-right: none;
      box-shadow:none;
      border-radius:0!important;
      font-size: 12px;
      color:#2A2A2A!important;
  }
  .icons_color{
    color:#FBFDFC; 
    font-weight:500;
  }
  .icons_colors{
    color:#FBFDFC; 
    font-weight:600;
    font-family:'Poppins';
    font-size:12px;
    margin-left: 5px;
    vertical-align: super;
  }
  .show_back{
    background-color:#fff!important;
  }
  .show_background{
    color: #63D5B9!important; 
    background-color:#fff;
  }

  @media  only screen and (max-width: 992px) {
    .input-field{
        padding-right: 50px;
    }
    .show_back{
      position: fixed!important;
      top: 10px!important;
      z-index: 10000!important;
      background-color:#fff!important;
    }
  }
  .placeholder_font::placeholder {
    font-size: 11px;
  }   
  .placeholder_font{
      border-left: none;
      border-top: none;
      border-right: none;
      box-shadow:none;
      border-radius:0!important;
      font-size: 14px;
  }
  .input-field{
      padding-right: 100px;
  }
  .font_lable{
      color: #2A2A2A!important;
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 600!important; 
      font-size: 16px!important;
  }
  .create_new_product{
    padding: 22px 24px!important;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05)!important;
    background-color:#FFFFFF!important;
    color:#63D6BA!important;
    border-radius:10px!important;
  }
  .edit_title_posotion_create{
    display: none;
  }
  .create_de{
      margin-left: 50px!important;
      background-color: #5AC8EB!important;
  }
  .update_delete_cancel{
    background-color: #5AC8EB!important;
  }
  .mobile_indexpage{
    margin-top: -10px;
  }
  .create_add_bt{
    background-color:#80D64C!important;
  }
  .btn_update{
      background-color:#80D64C!important;
  }
  .update_delete_delete_back{
    background-color: #EE6859!important;
  }
  .menuactive{
    border-left: solid 5px #80D64C!important
  }
  .mobile_menu_list{
    display: none;
  }
  
  @media  only screen and (max-width: 992px) {
    
  }
  @media  only screen and (max-width: 768px) {
    .card-panel{
      box-shadow: none!important;
    }
    .menu_with_size{
      width: 120px;
      display: flex!important;
      align-items: center;
    }
    .sidenav-main{
      display: none!important;
    }
    .mobile_menu_list{
      display:flex;
      overflow:auto; 
      margin-top:75px;
    }
    .mobilemenuactive{
      color:#494747;
      background: #FFFFFF;
      border-radius: 12px;
      padding:10px;
    }
    .mobilemenuactive_color{
      color:#494747!important;
    }
   
    .mobile_menu_list li{
      display: flex;
      z-index: 10000;
      
    }
    .footer-copyright{
        display: none;
    }
    .input-field{
        padding-right: 0px;
    }
    .brand-logo-none{
      display: none;
    }
    .mobile_indexpage{
        margin-top: 30px!important;
    }
    #main .content-wrapper-before {
      height: 160px!important;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
    }
    .edit_title_posotion{
      position: absolute;
      /* top: 40px; */
      z-index: 1;
    }
    .edit_title_posotion_create{
      display: inline;
    }
    .main_page_border{
      border-bottom: solid 1px #fff;
      width: 90%;
    }
  }
  @media  only screen and (max-width: 576px) {
      .webmobile_design{
          padding-left: 0px;
          padding-right: 0px;
      }
      .col .s12{
        padding: 0px!important;
      }
      .update_update{
        width: 100%;
      }
      .update_delete{
        margin-top:20px;
      }
      .create_add_bt{
        margin-top: 20px;
        background-color:#80D64C!important;
      }
      .create_de{
        margin-top: 20px;
        margin-left: 0px!important;
      }
      .update_delete_cancel{
        margin-top: 20px;
      }
      .update_delete_delete{
        margin-top: 20px;
      }
      
      /* .main_index{
        font-weight: 600;
        font-size:28px;
        font-family:'Poppins';
        font-style: normal;
        letter-spacing:2px;
      } */
  }
</style>
<!-- BEGIN: VENDOR CSS-->
<?php echo $__env->yieldContent('vendor-style'); ?>
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<?php if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType'])): ?>
<link rel="stylesheet" type="text/css"   href="<?php echo e(asset('css/themes/'.$configData['mainLayoutType'].'-template/materialize.css')); ?>">
<link rel="stylesheet" type="text/css"  href="<?php echo e(asset('css/themes/'.$configData['mainLayoutType'].'-template/style.css')); ?>">

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