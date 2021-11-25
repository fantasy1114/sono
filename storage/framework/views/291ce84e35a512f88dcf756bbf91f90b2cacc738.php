
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/vendors.min.css')); ?>">
<style>
  .select__location{
    margin: 0px!important;
    left: 0px!important;
    padding: 0px!important;
  }
  .custom-control-input:checked~.custom-control-label::before{
    background-color: #fff!important;
    color:black!important;
  }
  .custom-checkbox .custom-control-input:checked~.custom-control-label::after{
    background-color:black!important;
  }
  table.dataTable.display tbody tr:hover{
    background-color:#fff!important;
  }
  .sorting, .sorting_asc, .sorting_desc {
        background : none!important;
  }
  .sorting_1{
    background-color: #fff!important;
  }
  .sidenav li > a:hover {
    background-color: red !important;
  }
  .indexpage__user__explain span{
    font-style: normal;
    font-weight: 500!important;
    font-size: 20px!important;
    line-height: 30px!important;
    color: #FFFFFF!important;
  }
  .card{
    /* min-width: 570px!important; */
  }
  .section-data-tables{
    /* overflow: hidden!important; */
  }
  
  .section-data-tables::-webkit-scrollbar {
    display: none!important;
  }
  .mobile__menu__active > .menu__page__icon__links > .mobile__icon__size > .general_menu_icon {
    color: #494747!important;
  }
  .show__back__btn{
    background-color: #FFFFFF!important;
  }
  .show__back__btn i{
    color: #63D5B9!important;
  }
  .show__add__btn{
    display: none!important;
  }
  .edit__btns__group{
    margin-top: 75px!important;
  }
  /* add */
  .add__page__position{
    padding-top: 40px;
    padding-left: 40px;
    padding-right: 40px;
  }
  .create__add__btn{
    background: #80D64C!important;
    border-radius: 10px!important;
    width: 200px!important;
    height: 60px!important;
    font-style: normal;
    font-weight: 600!important;
    font-size: 18px!important;
    line-height: 18px!important;
    float: left;
  }
  .create__cancel__btn{
    background: #5AC8EB!important;
    border-radius: 10px!important;
    width: 200px!important;
    height: 60px!important;
    font-style: normal!important;;
    font-weight: 600!important;;
    font-size: 18px!important;;
    line-height: 18px!important;;
    display: flex!important;;
    align-items: center!important;
    justify-content: center;
    float: right;
  }
  
  /* fORM */
  .edit__page__table{
    padding: 50px 140px!important;
  }
  .card-width{
    padding-top: 50px!important;
  }
  .input-field input{
    border-left:none!important;
    border-right:none!important;
    border-top:none!important;
    border-radius: 0px!important;
    border-bottom:solid 1px #CFD7E9!important;

    font-style: normal!important;
    font-weight: 500!important;
    font-size: 15px!important;
    line-height: 22px!important;
    color: #2A2A2A!important;
  }
  .input-field label{
    font-style: normal!important;
    font-weight: 600!important;
    font-size: 16px!important;
    line-height: 30px!important;
    color: #2A2A2A!important;

  }
  /* Edit */
  .editpage__delete__btn{
    background: #EE6859!important;
    border-radius: 10px!important;
    width: 200px!important;
    height: 60px!important;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 18px;
    display: flex!important;
    align-items: center;
    justify-content: center;
  }
  .editpage__cancel__btn{
    background: #5AC8EB!important;
    border-radius: 10px!important;
    width: 200px!important;
    height: 60px!important;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 18px;
    display: flex!important;
    align-items: center;
    justify-content: center;
  }
  .editpage__update__btn{
    background: #80D64C!important;
    border-radius: 10px!important;
    width: 200px!important;
    height: 60px!important;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 18px;
    display: flex!important;
    align-items: center;
    justify-content: center;
  }
  .edit__add__btn{
    display: none!important;
  }
  .edit__page__position{
    padding-top: 50px;
    padding-left: 40px;
    padding-right: 40px;
  }
  .edit__page__table{
    background: #FFFFFF!important;
    box-shadow: 0px 4px 59px rgba(0, 0, 0, 0.05)!important;
    border-radius: 7px!important;
  }
  /* Index */
  .statusactive{
    background: rgba(43, 243, 51, 0.11)!important;
    border-radius: 5px!important;
    padding: 10px;
    color: #2BF333;
  }
  .statusinactive{
    background: rgba(196, 196, 196, 0.11);
    border-radius: 5px;
    padding: 10px;
    color: #ADADAD;
  }
  .table__response__page{
    padding-left: 30px!important;
    padding-right:30px!important;
  }
  .language__font__size{
    padding: 0px 10px!important;
    font-weight:600;
    font-size:18px;
  }
  .avatar__image__size{
    vertical-align: baseline !important;
    width: 50px!important;
  }
  .card{
    border: none!important;
    background: #FFFFFF;
    box-shadow: 0px 4px 59px rgba(0, 0, 0, 0.05)!important;
    border-radius: 7px!important;
  }
  .indexpage__add__btn{
    background: #FFFFFF!important;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05)!important;
    border-radius: 12px!important;
    /* width: 122px!important; */
    /* height: 70px!important; */
    padding: 35px 40px!important;
    color:#63D6BA!important;
    display: flex;
    align-items: center;
    font-style: normal;
    font-weight: 500;
    font-size: 18px!important;
    line-height: 27px;
  }
  .indexpage__title__size{
    font-style: normal;
    font-weight: 600;
    font-size: 38px;
    line-height: 57px;
    color: #FFFFFF;
  }
  .mobile_menu_page{
    display: none;
  }
  .general_menu_icon{
    zoom: 1.2;
    color: #494747;
  }
  .menu-title{
    font-style: normal;
    font-weight: 500;
    font-size: 16px!important;
    line-height: 24px;
    color: #494747;
  }
  .navigation-header{
    padding:14px 70px!important;
  }
  .menu__icon__font{
    padding:10px 50px!important;
  }
  .navigation-header-text{
    font-style: normal;
    font-weight: 500;
    font-size: 18px!important;
    line-height: 27px;
    color: rgba(73, 71, 71, 0.66);
  }
  .menuactive{
    background: rgba(98, 212, 184, 0.13);
    border-left: solid 6px #63D4B9;
    /* padding-left:-6px!important; */
  }
  @media  only screen and (max-width: 1600px) {
    /* add */
    .create__add__btn{
      border-radius: 8px!important;
      width: 160px!important;
      height: 45px!important;
      font-size: 16px!important;
      line-height: 16px!important;
 
    }
    .create__cancel__btn{
      border-radius: 8px!important;
      width: 180px!important;
      height: 45px!important;
      font-size: 16px!important;
      line-height: 16px!important;
    
    }
    .edit__page__table{
      padding: 35px 100px!important;
    }
    /* edit */
    .editpage__delete__btn{
      background: #EE6859!important;
      border-radius: 10px!important;
      width: 140px!important;
      height: 40px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
    .editpage__cancel__btn{
      background: #5AC8EB!important;
      border-radius: 6px!important;
      width: 140px!important;
      height: 40px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
    .editpage__update__btn{
      background: #80D64C!important;
      border-radius: 6px!important;
      width: 140px!important;
      height: 40px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
    /* index */
    .navigation-header{
      padding:5px 70px!important;
    }
    .menu__icon__font{
      padding:5px 50px!important;
    }
    
  }
  @media  only screen and (max-width: 1440px) {
    /* Edit */
    
    /* Index */
    .card-width{
      padding-top: 30px!important;
    }
    .navigation-header{
      padding:5px 70px!important;
    }
    .menu__icon__font{
      padding:5px 50px!important;
    }
  }
  @media  only screen and (max-width: 1366px) {
    .create__add__btn{
      border-radius: 8px!important;
      width: 120px!important;
      height: 40px!important;
      font-size: 14px!important;
      line-height: 14px!important;
 
    }
    .create__cancel__btn{
      border-radius: 8px!important;
      width: 120px!important;
      height: 40px!important;
      font-size: 14px!important;
      line-height: 14px!important;
    
    }
    .edit__page__table{
      padding: 30px 50px!important;
    }
    /* Edit */
    .card-width{
      padding-top: 25px!important;
    }
    
    /* INdex */
   .sidebar__logo__size{
     zoom: 75%;
   }
   .navigation-header{
      padding:5px 40px!important;
    }
    .menu__icon__font{
      padding:5px 25px!important;
    }
    .menu-title{
      font-size: 12px!important;
    }
  }
  @media  only screen and (max-width: 992px) {
    /* Add */
    .edit__page__table{
      padding: 30px 65px!important;
    }
    /* Edit */
    .editpage__delete__btn{
      background: #EE6859!important;
      border-radius: 5px!important;
      width: 100px!important;
      height: 40px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
    .editpage__cancel__btn{
      background: #5AC8EB!important;
      border-radius: 5px!important;
      width: 100px!important;
      height: 40px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
    .editpage__update__btn{
      background: #80D64C!important;
      border-radius: 5px!important;
      width: 100px!important;
      height: 40px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
  }
  @media  only screen and (max-width: 768px) {
    .indexpage__user__explain span{
      font-size: 14px!important;
    }
    .show__index__name{
      float: left;
    }
    .show__back__btn{
      position: fixed!important;
      top: 12px!important;
      left: 12px!important;
      z-index: 9999!important;
    }
    .show__add__btn{
      display: flex!important;
      width: 95px!important;
      height: 40px!important;
      background: #FFFFFF!important;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05)!important;
      border-radius: 12px;
      color: #63D6BA!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 21px
    }
    .edit__page__table{
      padding: 10px 5px!important;
    }
    /* Edit */
    .edit__page__position{
      
      padding-left: 0px;
      padding-right: 0px;
    }
    .edit__index__page{
      padding-top: 40px!important;
    }
    
    .edit__add__btn{
      display: flex!important;
      background: #FFFFFF!important;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05)!important;
      border-radius: 12px!important;
      width: 95px!important;
      height: 40px!important;
      color:#63D6BA!important;
      display: flex;
      align-items: center;
      font-style: normal;
      font-weight: 500;
      font-size: 14px!important;
      line-height: 21px;
    }
    /* index */
    .table__response__page{
      padding-left: 0px!important;
      padding-right:0px!important;
    }
    .index__solid__border{
      padding-bottom: 15px;
      border-bottom: solid 1px #AEF5E4;
    }
    .language__font__size{
     
      font-size:14px;
    }
    .avatar__image__size{
      width: 34px !important;
    }
    .content-wrapper-before{
      border-radius: 0px 0px 20px 20px;
      
    }
    .indexpage__title__size{
      font-style: normal;
      font-weight: 600;
      font-size: 24px;
      line-height: 36px;
      color: #FFFFFF;
    }
    
    .indexpage__add__btn{
      background: #FFFFFF!important;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05)!important;
      border-radius: 12px!important;
      /* width: 95px!important;
      height: 40px!important; */
      padding: 20px 30px!important
      color:#63D6BA!important;
      display: flex;
      align-items: center;
      font-style: normal;
      font-weight: 500;
      font-size: 14px!important;
      line-height: 21px;
    }
    .mobile__menu__active{
      background: #FFFFFF;
      border-radius: 12px;
    }
    .mobile__menu__active > .menu__page__icon__links > .material-icons >svg >path{
      fill: #494747;
    }
    .mobile__menu__active > .menu__page__icon__links > .menu-title  {
      color: #494747;
    }
    .general_menu_icon{
      color: #FBFDFC;
    }
    .mobile__icon__size{
      zoom: 0.6;
    }
    .menu__page__icon__links > .material-icons >svg >path{
      fill: #FBFDFC;
    }
    .menu-title{
      margin-left: 10px!important;
      color: #FBFDFC;
      white-space: nowrap;
      font-weight: bold;
      font-size:11px!important;
    }
    .menu__page__icon__links{
      display: flex!important;
      align-items: center;
      justify-content: center;
    }
    .mobile__menu__page__list{
      padding-top: 15px;
      display: flex;
      overflow: auto!important;
    }
    .mobile__menu__page__list::-webkit-scrollbar {
      display: none;
    }
    .mobile__menu__size{
      display: inline!important;
      margin: 0px 7px;
      padding: 8px 8px 8px 6px;
    }
    .mobile_menu_page{
      display:block;
    }
    .sidebar__logo__size{
      display: none;
    }
    .sidenav-main{
      display: none;
    }
  }
  @media  only screen and (max-width: 576px) {
    .row .col{
      padding-left:0px!important;
    }
   
   /* Edit */
   .editpage__delete__btn{
      background: #EE6859!important;
      border-radius: 5px!important;
      width: 100px!important;
      height: 45px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
      margin-top: 20px;
    }
    .editpage__cancel__btn{
      background: #5AC8EB!important;
      border-radius: 5px!important;
      width: 100px!important;
      height: 45px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
      margin-top: 20px;
    }
    .editpage__update__btn{
      background: #80D64C!important;
      border-radius: 5px!important;
      width: 100%!important;
      height: 45px!important;
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 14px;
    }
  }
  @media  only screen and (max-width: 444px) {
   
  }
  @media  only screen and (max-width: 375px) {
    .section-data-tables{
      /* overflow: auto!important; */
    }
    .indexpage__user__explain{
      white-space: nowrap;
    }

    .editpage__delete__btn{
      background: #EE6859!important;
      border-radius: 5px!important;
      width: 100%!important;
      height: 45px!important;
     
    }
    .editpage__cancel__btn{
      background: #5AC8EB!important;
      border-radius: 5px!important;
      width: 100%!important;
      height: 45px!important;
     
    }
    .editpage__update__btn{
      background: #80D64C!important;
      border-radius: 5px!important;
      width: 100%!important;
      height: 45px!important;
     
    }
  }
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
 
  table.dataTable.no-footer {
    border-bottom: solid 1px #CFD7E9!important
  }
  tr{
    border: none!important
  }
  th{
    font-style: normal!important;
    font-weight: 600!important;
    font-size: 16px!important;
    line-height: 30px!important;
    color: #2A2A2A!important;
  }
  @font-face {
    font-family: 'Poppins';
    src: url('<?php echo e(asset('fonts/normal/Poppins-Light.ttf')); ?>') format('truetype');
  }
  #page-length-option_paginate{
    padding-right: 30px!important;
  }
  #page-length-option_info{
    padding-left: 30px!important;
  }
  #page-length-option_filter input{
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
    background-repeat: no-repeat;
    background-color: #fff;
    background-position: right 0% bottom 50%!important;
    background-color: #F6F6F6;
    
  }
  #page-length-option_filter label{
    padding-right: 42px;
  }
  #page-length-option_filter input::placeholder{
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
  }
  #page-length-option_filter input[type=search]:not(.browser-default) {
    border:none!important;
  }
  .dataTables_length label{
    padding-left: 42px!important;
  }
  .dataTables_length >label > select {
    border:none!important;
  }
  #page-length-option_length label{
    color:#2A2A2A;
    font-size: 14px;
    font-weight: 600;
  }
  #page-length-option_length label select{
    margin-left: 14px;
    background-color: #F6F6F6;
    height: 46px!important;
  }
  #page-length-option_length{
    display: inline;
    float: left;
  }
  #page-length-option_filter{
    display: inline;
    float: right;
    margin-top:0px;
  }
  #page-length-option_filter > label > input{
    height: 46px!important;
  }
  #page-length-option_filter input::placeholder{
    color:#2A2A2A;
    font-size: 12px;
    font-weight: 600;
    padding-left: 10px;
  }
  thead{
    background-color: #F6F6F6;
  }
  .data-tables .dataTables_wrapper table.dataTable.display tbody tr{
    height: 65px!important;
  }
  input[type=search]:not(.browser-default){
    border: 1px solid #9e9e9e!important;
    border-bottom: 1px solid #9e9e9e;
    border-radius: 5px!important;
    height: 30px!important;
    margin-left: 10px!important;
  }
  input[type=search]:not(.browser-default):focus:not([readonly]){
    box-shadow:none!important;
  }
  *{
    font-family: 'Poppins';
  }
  #main .section-data-tables .dataTables_wrapper table.dataTable.display tbody tr{
      height:60px!important;
  }
  #main .section-data-tables .dataTables_wrapper #page-length-option_paginate .paginate_button.current{
    background: #63D6BA!important;
    border-radius: 4.63636px!important;
    border: solid 1px #ffffff!important;
    box-shadow: none!important;
    width: 27.82px!important;
    height: 27.82px!important;
  }
  .fa-sort:before {
    content: "\f0dc";
    display: none!important;
  }
  .custom-control-label::after, .custom-control-label::before{
    width: 24px!important;
    height: 24px!important;
    border: 1.5px solid #979494!important;
    border-radius: 5px!important;
  }
  .custom-control-label{
    padding-top: 0px!important;
    padding-left: 20px!important;
  }

  @media  only screen and (max-width: 768px) {
    #page-length-option_info{
      padding-left: 0px!important;
    }
    #page-length-option_paginate{
      padding-right: 0px!important;
    }
  }
</style>
<?php /**PATH D:\data\10.30\li\webde\resources\views/panels/styles.blade.php ENDPATH**/ ?>