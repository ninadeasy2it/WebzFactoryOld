<?php
    // $profile=asset(Storage::url('uploads/avatar/'));
    $profile=\App\Models\Utility::get_file('uploads/avatar/');
    // $profile=asset(Storage::url('uploads/avatar/'));
    $users = \Auth::user();
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Profile Account')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script>
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    })
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Profile')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
    <!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="row">
        <div class="col-xl-3">
            <div class="card sticky-top" style="top:30px">
                <div class="list-group list-group-flush" id="useradd-sidenav">
                    <a href="#useradd-2" class="list-group-item list-group-item-action border-0 "><?php echo e(__('Personal info')); ?>

                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    <a href="#useradd-3" class="list-group-item list-group-item-action border-0"><?php echo e(__('Change Password')); ?>

                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>   
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="useradd-2" class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Personal info')); ?></h5>
                    <small class="text-muted"><?php echo e(__('Edit details about your Password')); ?></small>
                </div>
                <?php echo e(Form::model($userDetail,array('route' => array('update.account'), 'method' => 'post', 'enctype' => "multipart/form-data"))); ?>

                <div class="card-body pb-0">
                                
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter User Name')))); ?>

                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-name" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('email',__('Email'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email')))); ?>

                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-email" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-6 col-md-6 mb-0 mt-2">
                                            <div class="choose-files">
                                                <label for="avatar">
                                                    <div class=" bg-primary company_logo_update"> <i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?></div>
                                                    <input type="file" class="form-control file" id="avatar" name="profile" data-filename="profiles" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                </label>
                                                
                                            </div>
                                        
                                      
                                            <img src="<?php echo e(storage_path() . '\uploads\avatar\avatar.png'); ?>" id="blah" width="25%"/>
                                       
                                            <img src="<?php echo e(!empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . 'avatar.png'); ?>" id="blah" width="25%"/>
                                            <span class="profiles"></span>
                                    </div>

                                </div>

                                
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-print-invoice btn-primary m-r-10'))); ?>

                    </div>
                    
                </div>
                <?php echo e(Form::close()); ?>

                
            </div>

            <div id="useradd-3" class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Change Password')); ?></h5>
                    <small class="text-muted"><?php echo e(__('Edit details about your Password')); ?></small>
                </div>
                <?php echo e(Form::model($userDetail,array('route' => array('update.password',$userDetail->id), 'method' => 'post'))); ?>

                <div class="card-body">
                    <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('current_password',__('Current Password'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::password('current_password',array('class'=>'form-control','placeholder'=>__('Enter Current Password')))); ?>

                                            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-current_password" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('new_password',__('New Password'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::password('new_password',array('class'=>'form-control','placeholder'=>__('Enter New Password')))); ?>

                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-new_password" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('confirm_password',__('Re-type New Password'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::password('confirm_password',array('class'=>'form-control','placeholder'=>__('Enter Re-type New Password')))); ?>

                                            <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-confirm_password" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                </div>
                <div class="modal-footer">
                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-print-invoice  btn-primary m-r-10'))); ?>

                            </div>
                 <?php echo e(Form::close()); ?>

                    
                                
                               
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
    <!-- [ Main Content ] end -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/user/profile.blade.php ENDPATH**/ ?>