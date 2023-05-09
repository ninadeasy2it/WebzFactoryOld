<?php
    $profile=asset(Storage::url('uploads/avatar/'));
?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Manage Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e($emailTemplate->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('User')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="row">
    <div class="text-end">
        <?php echo e(Form::model($currEmailTempLang, ['route' => ['updateEmail.settings', $currEmailTempLang->parent_id], 'method' => 'PUT'])); ?>

        <div class="text-end">
            <div class="d-flex justify-content-end drp-languages">
                <ul class="list-unstyled mb-0 m-2">
                    <li class="dropdown dash-h-item drp-language">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false"
                            id="dropdownLanguage">
                            
                            <span
                                class="drp-text hide-mob text-primary"><?php echo e(__('Locale: ')); ?><?php echo e(Str::upper($currEmailTempLang->lang)); ?></span>
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end"
                            aria-labelledby="dropdownLanguage">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <a href="<?php echo e(route('manage.email.language', [ $lang,$emailTemplate->id])); ?>"
                                    class="dropdown-item <?php echo e($currEmailTempLang->lang == $lang ? 'text-primary' : ''); ?>"><?php echo e(Str::upper($lang)); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled mb-0 m-2">
                    <li class="dropdown dash-h-item drp-language">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false"
                            id="dropdownLanguage">
                            <span
                                class="drp-text hide-mob text-primary"><?php echo e(__('Template: ')); ?><?php echo e($emailTemplate->name); ?></span>
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end"
                            aria-labelledby="dropdownLanguage">
                            <?php $__currentLoopData = $EmailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <a href="<?php echo e(route('manage.email.language', [(Request::segment(2)?Request::segment(2):\Auth::user()->lang),$EmailTemplate->id])); ?>"
                                    class="dropdown-item <?php echo e($EmailTemplate->name == $emailTemplate->name ? 'text-primary' : ''); ?>"><?php echo e($EmailTemplate->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body ">
                
                    <h5 class="font-weight-bold pb-3 mt-4"><?php echo e(__('Placeholders')); ?></h5>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class=" card-header card-body">
                                <div class="row text-xs">
                                    <div class="row">
                                        <?php if($emailTemplate->name=='User Created'): ?>
                                            <p class="col-4"><?php echo e(__('App URL')); ?> : <span
                                                    class="pull-right text-primary">{app_url}</span></p>
                                            <p class="col-4"><?php echo e(__('User Name')); ?> : <span
                                                    class="pull-right text-primary">{user_name}</span></p>
                                            <p class="col-4"><?php echo e(__('User Email')); ?> : <span
                                                    class="pull-right text-primary">{user_email}</span></p>
                                            <p class="col-4"><?php echo e(__('User Password')); ?> : <span
                                                    class="pull-right text-primary">{user_password}</span></p>
                                            <p class="col-4"><?php echo e(__('User Type')); ?> : <span
                                                    class="pull-right text-primary">{user_type}</span></p>
                                        <?php elseif($emailTemplate->name=='Appointment Created'): ?>  
                                            <p class="col-4"><?php echo e(__('App Name')); ?> : <span
                                                class="pull-right text-primary">{app_name}</span></p>
                                            <p class="col-4"><?php echo e(__('Appointment Name')); ?> : <span
                                                    class="pull-right text-primary">{appointment_name}</span></p>
                                            <p class="col-4"><?php echo e(__('Appointment Email')); ?> : <span
                                                    class="pull-right text-primary">{appointment_email}</span></p>
                                            <p class="col-4"><?php echo e(__('Appointment Phone')); ?> : <span
                                                    class="pull-right text-primary">{appointment_phone}</span></p>
                                            <p class="col-4"><?php echo e(__('Appointment Date')); ?> : <span
                                                    class="pull-right text-primary">{appointment_date}</span></p>
                                            <p class="col-4"><?php echo e(__('Appointment Time')); ?> : <span
                                                    class="pull-right text-primary">{appointment_time}</span></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('subject', null, ['class' => 'form-control font-style', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('from', __('From'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('from', $emailTemplate->from, ['class' => 'form-control font-style', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-12">
                            <?php echo e(Form::label('content', __('Email Message'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::textarea('content', $currEmailTempLang->content, ['class' => 'summernote-simple', 'required' => 'required'])); ?>

                        </div>
                    </div> 
                    <div class="card-footer">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-12 text-end">
                               <?php echo e(Form::hidden('lang', null)); ?>

                               <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-print-invoice  btn-primary m-r-10'])); ?>

                            </div>
                        </div>
                    </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div><br><br><br>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/email_templates/index.blade.php ENDPATH**/ ?>