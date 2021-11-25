<head>
    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./frontend/assets/css/style.css">
    
    

    
    <?php $__env->startSection('title','User Login'); ?>

    
    <?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/login.css')); ?>">
        
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/vendors/css/vendors.min.css')); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/themes/bordered-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/themes/semi-dark-layout.css')); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/css/style.css')); ?>">
    <!-- END: Custom CSS-->
    <style>
        @font-face {
            font-family: 'Poppinsbold';
            src: url('<?php echo e(asset('fonts/normal/Poppins-Bold.ttf')); ?>') format('truetype');
        }
        .custom-checkbox .custom-control-label::before{
            width:24px;
            height:24px;
            border: 1.5px solid #979494;
            border-radius: 5px;
        }
        .custom-checkbox .custom-control-label::after{
            width:24px;
            height:24px;
        }
        .form-control{
            height: 60px;
        }
        .login_all_page{
            padding-left:35px!important;
            padding-right:15px!important;
        }
        .login_top_icon{
            padding-top:12px;
            padding-left:0px;
        }
        
        .login_icons{
            zoom:170%;
        }
        .custom-control-input{
            zoom:150%;
        }
        .login_font_size{
            font-size: 14px;
            color: #979494;
            line-height: 18px;
            font-weight:600;
            padding-left:15px;
            padding-top:5px;
        }
        .login_icon_size{
            zoom: 100%;
        }
        .login_font_size_forgot{
            float: right;
            color: #18B7E9;
            line-height: 18px;
            font-size:14px;
            font-weight:600;
            padding-top:5px;
        }
        .login_mainpage{
            width: 42.5%;
            display: flex;
            justify-content: center;
            margin: 0 auto;
        }
        .login_btn{
            margin-top:50px;
        }
        .login_btn button{
            background-color: #63D6BA;
            color:#FFFFFF;
            font-weight: 600;
            font-size: 18px;
            line-height: 18px;
            padding: 32px 0px;
            border-radius:10px;
        }
        input[type="checkbox"]{
          /*transform : scale(10)!important;*/
        }
        .row{
            margin: 0px;
        }
        .card-body{
            padding-bottom:10px;
        }
        .card-title{
            font-family: 'Poppinsbold';
            font-weight: 600!important;
            font-size: 28px!important;
            font-style: normal;
            line-height: 42px;
            /* identical to box height */
            letter-spacing: 0.03em;

            color: #494747;
        }
        input::placeholder{
            font-size: 14px;
            padding-left:10px;
            font-weight:600;
        }
        input:checked {
          margin-left: 25px;
          border: 1px solid blue;
        }
        .card{
            box-shadow: 0px 4px 59px rgba(0, 0, 0, 0.05)!important;
            padding:40px 50px;
        }
        .login_input_margin{
            margin-top: 35px;
        }
        .login_logo{
            height: 235px;
            display: flex; 
            justify-content: center; 
            align-items: center;
        }
        .login_footer{
            bottom: -175px;
            color:#BBBCBC;
            line-height: 27px;
            font-size:18px;
        }
        .login_input_margin_first{
             margin-top: 28px; 
        }
        @media  only screen and (max-width: 1440px) {
            .login_all_page{
                padding-left:15px!important;
                padding-right:15px!important;
            }
            .login_top_icon{
                padding-top:5px;
                padding-left:0px;
            }
            
            .form-control{
                height: 40px;
            }
            .login_logo{
                height: 150px;
            }
            .login_footer{
                font-size:12px;
            }
            .login_icon_size{
                zoom: 70%;
            }
            .login_font_size{
                font-size: 11px!important;
            }
            .login_font_size_forgot{
                font-size: 11px;
            }
            .login_btn{
                margin-top: 30px;
            }
            .login_btn button{
                font-size: 14px;
                line-height: 18px;
                padding: 15px 0px;
            }
            .card-title{
                font-size: 20px!important;
            }
            .login_input_margin{
                margin-top: 20px;
            }
            .login_input_margin_first{
                /* margin-top: 35px; */
            }
            input::placeholder{
                font-size: 11px;
            }
            .card{
                padding:30px 30px;
            }
        }
        @media  only screen and (max-width: 992px) {
            .login_mainpage{
                width: 60%;
            }
            .card{
                padding:30px 10px;
            }
        }
        @media  only screen and (max-width: 768px) {
            .login_mainpage{
                width: 75%;
            }
        }
        @media  only screen and (max-width: 576px) {
            .login_mainpage{
                width: 100%;
            }
            body{
                background-color: #FFFFFF!important;
            }
            .col .s12{
                padding:0px;
            }
            .container{
                padding: 0px;
            }
            .col-12{
                padding: 0px;
            }
            .login_btn{
                margin-top:300px!important;
            }
            .login_logo{
                height: 100px;
            }
            .login_footer{
                display: none;
            }
            .card-body{
                padding: 0px!important;
            }
            .login_icons{
                margin-left:20px;
            }
        }
    </style>
</head>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-12 login_all_page">
        
    <div class="col-12 text-center login_logo" style="">
        <div class="login_top_icon">
            <div class="d-inline login_icon_size" style="vertical-align: super;">
                <svg width="227" height="33" viewBox="0 0 227 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.9437 19.872H38.4341C38.6998 22.263 39.7624 23.6798 43.3046 23.6798C46.6697 23.6798 47.8209 22.263 47.8209 20.5804C47.8209 19.075 46.5811 18.278 44.6329 17.9238L40.7365 17.3925C35.5118 16.684 33.5636 14.9129 33.5636 11.1051C33.5636 7.12016 36.3088 4.02075 43.1275 4.02075C50.0347 4.02075 52.7799 7.12016 52.7799 11.1937H47.2895C47.1124 9.33402 46.404 7.74004 43.0389 7.74004C40.2052 7.74004 39.1425 8.89124 39.1425 10.7509C39.1425 12.2563 40.0281 12.8762 41.6221 13.1419L45.4299 13.6732C50.3889 14.3816 53.3112 16.0641 53.3112 20.3148C53.3112 24.2997 50.3004 27.3991 43.0389 27.3991C35.9546 27.3991 32.9437 24.2997 32.9437 19.872Z" fill="#63D6BA"/>
                    <path d="M55.7909 15.7099C55.7909 8.62558 59.8644 4.02075 67.2144 4.02075C74.5644 4.02075 78.7265 8.62558 78.7265 15.7099C78.7265 22.7943 74.653 27.3991 67.2144 27.3991C59.8644 27.3991 55.7909 22.7943 55.7909 15.7099ZM73.059 15.7099C73.059 10.7509 70.9337 8.27136 67.2144 8.27136C63.4951 8.27136 61.3698 10.7509 61.3698 15.7099C61.3698 20.669 63.4951 23.1485 67.2144 23.1485C71.0223 23.1485 73.059 20.669 73.059 15.7099Z" fill="#63D6BA"/>
                    <path d="M96.2602 26.9563V13.2304C96.2602 10.131 95.1976 8.62558 92.4524 8.62558C89.4416 8.62558 87.5819 10.7509 87.5819 14.4702V27.0449H81.9144V4.46352H87.3163V8.09425C88.556 5.70329 90.5042 4.02075 94.2235 4.02075C99.3596 4.02075 101.928 6.67738 101.928 12.0792V26.9563H96.2602Z" fill="#63D6BA"/>
                    <path d="M105.204 15.7099C105.204 8.62558 109.278 4.02075 116.628 4.02075C123.978 4.02075 128.14 8.62558 128.14 15.7099C128.14 22.7943 124.066 27.3991 116.628 27.3991C109.278 27.3991 105.204 22.7943 105.204 15.7099ZM122.472 15.7099C122.472 10.7509 120.347 8.27136 116.628 8.27136C112.908 8.27136 110.783 10.7509 110.783 15.7099C110.783 20.669 112.908 23.1485 116.628 23.1485C120.347 23.1485 122.472 20.669 122.472 15.7099Z" fill="#63D6BA"/>
                    <path d="M17.0041 27.7535H7.97158C3.80953 27.7535 0.444458 24.3885 0.444458 20.2264V11.1939C0.444458 7.03181 3.80953 3.66675 7.97158 3.66675H17.0041C21.1662 3.66675 24.5313 7.03181 24.5313 11.1939V20.2264C24.5313 24.3885 21.1662 27.7535 17.0041 27.7535Z" fill="#494747"/>
                    <path d="M8.32572 14.6473C10.0375 14.6473 11.4251 13.2596 11.4251 11.5479C11.4251 9.83614 10.0375 8.44849 8.32572 8.44849C6.61397 8.44849 5.22632 9.83614 5.22632 11.5479C5.22632 13.2596 6.61397 14.6473 8.32572 14.6473Z" fill="white"/>
                    <path d="M145.51 18.236V24H142.408V8.468H148.062C149.895 8.468 151.274 8.908 152.198 9.788C153.137 10.668 153.606 11.8633 153.606 13.374C153.606 14.8553 153.122 16.036 152.154 16.916C151.201 17.796 149.837 18.236 148.062 18.236H145.51ZM147.732 15.75C149.551 15.75 150.46 14.958 150.46 13.374C150.46 12.5967 150.247 12.0027 149.822 11.592C149.397 11.1813 148.7 10.976 147.732 10.976H145.51V15.75H147.732ZM163.563 8.248C165.015 8.248 166.328 8.58533 167.501 9.26C168.689 9.93467 169.62 10.8807 170.295 12.098C170.984 13.3007 171.329 14.6647 171.329 16.19C171.329 17.7153 170.984 19.0867 170.295 20.304C169.62 21.5213 168.689 22.4673 167.501 23.142C166.328 23.8167 165.015 24.154 163.563 24.154C162.111 24.154 160.791 23.8167 159.603 23.142C158.43 22.4673 157.498 21.5213 156.809 20.304C156.134 19.0867 155.797 17.7153 155.797 16.19C155.797 14.6647 156.134 13.3007 156.809 12.098C157.498 10.8807 158.43 9.93467 159.603 9.26C160.791 8.58533 162.111 8.248 163.563 8.248ZM163.563 11.108C162.654 11.108 161.854 11.3133 161.165 11.724C160.476 12.1347 159.933 12.7287 159.537 13.506C159.156 14.2687 158.965 15.1633 158.965 16.19C158.965 17.2167 159.156 18.1187 159.537 18.896C159.933 19.6587 160.476 20.2453 161.165 20.656C161.854 21.0667 162.654 21.272 163.563 21.272C164.472 21.272 165.272 21.0667 165.961 20.656C166.65 20.2453 167.186 19.6587 167.567 18.896C167.963 18.1187 168.161 17.2167 168.161 16.19C168.161 15.1633 167.963 14.2687 167.567 13.506C167.186 12.7287 166.65 12.1347 165.961 11.724C165.272 11.3133 164.472 11.108 163.563 11.108ZM182.418 24L178.788 17.95H177.424V24H174.322V8.468H180.24C182.044 8.468 183.415 8.908 184.354 9.788C185.307 10.668 185.784 11.8267 185.784 13.264C185.784 14.4373 185.454 15.42 184.794 16.212C184.148 17.004 183.21 17.532 181.978 17.796L185.85 24H182.418ZM177.424 15.816H179.976C181.75 15.816 182.638 15.0313 182.638 13.462C182.638 12.714 182.418 12.1347 181.978 11.724C181.552 11.2987 180.885 11.086 179.976 11.086H177.424V15.816ZM199.098 8.468V10.932H194.808V24H191.706V10.932H187.438V8.468H199.098ZM210.926 20.876H204.7L203.6 24H200.322L206.042 8.644H209.584L215.282 24H212.004L210.926 20.876ZM210.09 18.522L207.802 11.966L205.514 18.522H210.09ZM220.718 21.624H225.932V24H217.616V8.468H220.718V21.624Z" fill="#494747"/>
                    </svg>
                    
            </div>
        </div>
    </div>
    <div class="login_mainpage">
        
        <div class="col-md-12 mt-2 col-sm-12 col-12">
            <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="card" style="">
                    <div class="card-header">
                        <h3 class="card-title">Sign In</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group input-group-merge login_input_margin_first">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-search2" style="border: none;background-color: #F8F8F8;">
                                    <i data-feather='user' class="login_icons d-flex align-items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            
                                    </i></span>
                            </div>
                            <input id="email" type="email"  name="email" style="border: none;background-color: #F8F8F8;" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="User name" required autocomplete="email" />
                        </div>

                        <div class="input-group input-group-merge login_input_margin">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-search2" style="border: none;background-color: #F8F8F8;">
                                    <i data-feather='lock' class="login_icons d-flex align-items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 18.5C13.3807 18.5 14.5 17.3807 14.5 16C14.5 14.6193 13.3807 13.5 12 13.5C10.6193 13.5 9.5 14.6193 9.5 16C9.5 17.3807 10.6193 18.5 12 18.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            
                                    </i>
                                </span>
                            </div>
                            <input id="password" type="password"  name="password" required autocomplete="current-password" style="border: none;background-color: #F8F8F8;" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password" />
                            
                        </div>

                        <div class="form-group login_input_margin mx-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> id="remember-me" type="checkbox" />
                                <label class="custom-control-label login_font_size" for="remember-me"> Remember Me</label>
                                <a href="#" class="login_font_size_forgot" style="">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group login_btn">
                            <button type="submit" class="btn w-100 d-flex align-items-center justify-content-center login_btn_button" style="">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>

    <div class="col-12 text-center login_footer">
        © 2021 fabrica.IT SIA All rights reserved
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\10.30\li\webde\resources\views/auth/login.blade.php ENDPATH**/ ?>