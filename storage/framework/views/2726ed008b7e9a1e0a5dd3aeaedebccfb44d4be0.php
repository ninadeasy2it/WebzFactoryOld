<?php
    // $logo=asset(Storage::url(''));
    $company_logo = \App\Models\Utility::GetLogo();
    $logo=\App\Models\Utility::get_file('uploads/logo/');
    // dd($company_logo);
?>


<!-- [ navigation menu ] start -->

<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
<?php else: ?>
    <nav class="dash-sidebar light-sidebar">
<?php endif; ?>

    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="index.html" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                
                    
                    
                
                <!--  <img src="<?php echo e(asset('assets/images/logo-light.png')); ?>" alt="" class="logo logo-lg" /> -->
                <!-- <img src="<?php echo e(asset('assets/images/logo-dark.svg')); ?>" alt="" class="logo logo-sm" /> -->
                  <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>"
                alt="<?php echo e(config('app.name', 'AccountGo')); ?>" class="logo logo-lg">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="dash-navbar">
                <li class="dash-item <?php echo e((Request::segment(1) == 'home' || Request::segment(1) == '' ||Request::segment(1) == 'dashboard')?'active':''); ?>">
                    <a href="<?php echo e(route('home')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-home"></i></span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>

                </li>
                <?php if(Auth::user()->type =='company'): ?>
                <li class="dash-item <?php echo e((Request::segment(1) == 'business')?'active':''); ?>">
                    <a href="<?php echo e(route('business.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-credit-card"></i></span><span class="dash-mtext"><?php echo e(__('Business')); ?></span></a>

                </li>
                <li class="dash-item <?php echo e((Request::segment(1) == 'appointments')?'active':''); ?>">
                    <a href="<?php echo e(route('appointments.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-calendar-time"></i></span><span class="dash-mtext"><?php echo e(__('Appointments')); ?></span></a>

                </li>
                <li class="dash-item <?php echo e((Request::segment(1) == 'contacts')?'active':''); ?>">
                    <a href="<?php echo e(route('contacts.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-phone"></i></span><span class="dash-mtext"><?php echo e(__('Contacts')); ?></span></a>

                </li>
                <li class="dash-item <?php echo e((Request::segment(1) == 'appointment-calendar')?'active':''); ?>">
                    <a href="<?php echo e(route('appointment.calendar')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-calendar"></i></span><span class="dash-mtext"><?php echo e(__('Calendar')); ?></span></a>

                </li>
                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <li class="dash-item <?php echo e((Request::segment(1) == 'users')?'active':''); ?>">
                    <a href="<?php echo e(route('users.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Users')); ?></span></a>

                    </li>
                    
                    <li class="dash-item <?php echo e((Request::segment(1) == 'business')?'active':''); ?>">
                        <a href="<?php echo e(route('business.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-credit-card"></i></span><span class="dash-mtext"><?php echo e(__('Business')); ?></span></a>

                    </li>
                    
                    
                <?php endif; ?>
                    
                    <li class="dash-item <?php echo e((\Request::route()->getName() == 'plans') || (\Request::route()->getName() == 'stripe') ?'active':''); ?>">
                    <a href="<?php echo e(route('plans.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-award "></i></span><span class="dash-mtext"><?php echo e(__('Plans')); ?></span></a>

                    </li>
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <li class="dash-item <?php echo e((Request::route()->getName() == 'plan_request.index') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('plan_request.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-brand-telegram"></i></span><span class="dash-mtext"><?php echo e(__('Plan Request')); ?></span></a>

                    </li>
                    <li class="dash-item <?php echo e((Request::segment(1) == 'coupons')?'active':''); ?>">
                    <a href="<?php echo e(route('coupons.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-gift"></i></span><span class="dash-mtext"><?php echo e(__('Coupons')); ?></span></a>

                    </li>

                    <li class="dash-item <?php echo e((Request::segment(1) == 'order')?'active':''); ?>">
                    <a href="<?php echo e(route('order.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-shopping-cart"></i></span><span class="dash-mtext"><?php echo e(__('Order')); ?></span></a>

                    </li>
                    <li class="dash-item <?php echo e((Request::segment(1) == 'email_template_lang')?'active':''); ?>">
                        <a href="<?php echo e(route('manage.email.language',\Auth::user()->lang)); ?>" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-mail"></i></span><span class="dash-mtext"><?php echo e(__('Email Template')); ?></span></a>

                        </li>
                <?php endif; ?>


                <li class="dash-item <?php echo e((Request::segment(1) == 'systems')?'active':''); ?>">
                    <a href="<?php echo e(route('systems.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-settings"></i></span><span class="dash-mtext"><?php echo e(__('Setting')); ?></span></a>

                    </li>
            <!-- </li> -->




            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/partials/admin/sidemenu.blade.php ENDPATH**/ ?>