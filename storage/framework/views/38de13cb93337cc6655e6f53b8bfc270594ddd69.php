
<?php
    // $profile=asset(Storage::url('uploads/avatar/'));
    $profile=\App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Manage Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
   <?php echo e(__('Manage Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Create New User')); ?>">
    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
        data-bs-target="#exampleModal" data-url="<?php echo e(route('users.create')); ?>"
        data-bs-whatever="<?php echo e(__('Create New User')); ?>" data-toggle="tooltip"
        data-bs-title="<?php echo e(__('Create New User')); ?>"> <span class="text-white"> 
            <i class="ti ti-plus text-white" ></i></span>
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('User')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3">
            <div class="card text-center">
               <div class="d-flex justify-content-between align-items-center px-3 pt-3">
                    <div class="border-0 pb-0 ">
                        <h6 class="mb-0">
                            <div class="badge p-2 px-3 rounded bg-primary"><?php echo e(ucfirst($user->type)); ?></div>
                        </h6>
                    </div>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="feather icon-more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item" data-url="<?php echo e(route('users.edit',$user->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Update User')); ?>"><i class="ti ti-edit mr-1"></i><span class="ml-2"><?php echo e(__('Edit')); ?></span></a>

                                   <a href="#" class="dropdown-item" data-ajax-popup="true" data-title="<?php echo e(__('Reset Password')); ?>" data-url="<?php echo e(route('user.reset',\Crypt::encrypt($user->id))); ?>"><i class="ti ti-key"></i>
                                     <span class="ml-2"><?php echo e(__('Reset Password')); ?></span></a>  
                                    <a href="#" class="bs-pass-para dropdown-item"  data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($user->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><i class="ti ti-trash"></i><span class="ml-2"><?php echo e(__('Delete')); ?></span></a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],'id'=>'delete-form-'.$user->id]); ?>

                                        <?php echo Form::close(); ?> 
                            </div>
                        </div>
                    </div>
               </div>
                <div class="card-body">
                    <div class="avatar">
                        <a href="<?php echo e((!empty($user->avatar))? asset(Storage::url('uploads/avatar/'.$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))); ?>" target="_blank">
                             <img src="<?php echo e((!empty($user->avatar))? asset(Storage::url('uploads/avatar/'.$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))); ?>" class="rounded-circle img_users_fix_size">
                        </a>
                    </div>
                    <h4 class="mt-2"><?php echo e($user->name); ?></h4>
                    <small><?php echo e($user->email); ?></small>
                    <?php if(\Auth::user()->type == 'super admin'): ?>
                    <div class=" mb-0 mt-3">
                        <div class=" p-3">
                            <div class="row">
                                   <div class="col-5 text-start">
                                        <h6 class="mb-0  mt-1"><?php echo e(!empty($user->currentPlan)?$user->currentPlan->name:''); ?></h6>
                                    </div>
                                     <div class="col-7 text-end">
                                        <a href="#" data-url="<?php echo e(route('plan.upgrade',$user->id)); ?>" class="btn btn-sm btn-primary btn-icon" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Upgrade Plan')); ?>"><?php echo e(__('Upgrade Plan')); ?></a>  
                                    </div>
                                   <!--  <div class="col-6 <?php echo e(Auth::user()->type == 'admin' ? 'text-end' : 'text-start'); ?>  ">
                                        <h6 class="mb-0 px-3"><?php echo e(__('Plan Expired : ')); ?> <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date): __('Unlimited')); ?></h6>
                                    </div> -->
                                    <div class="col-6 text-start mt-4">
                                        <h6 class="mb-0 px-3"><?php echo e($user->totalBusiness($user->id)); ?></h6>
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Business')); ?></p>
                                    </div>

                                <div class="col-6 text-end mt-4">
                                    <h6 class="mb-0 px-3"><?php echo e($user->getTotalAppoinments()); ?></h6>
                                    <p class="text-muted text-sm mb-0"><?php echo e(__('Appointments')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-2 mb-0">
                    
                        <button class="btn btn-sm btn-neutral mt-3 font-weight-500">
                            <a><?php echo e(__('Plan Expired : ')); ?> <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date): __('Unlimited')); ?></a>
                        </button>
                    
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
        <a href="#" class="btn-addnew-project"  data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Create New User')); ?>" data-url="<?php echo e(route('users.create')); ?>">
            <div class="badge bg-primary proj-add-icon">
                <i class="ti ti-plus"></i>
            </div>
            <h6 class="mt-4 mb-2"><?php echo e(__('New User')); ?></h6>
            <p class="text-muted text-center"><?php echo e(__('Click here to add New User')); ?></p>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/user/index.blade.php ENDPATH**/ ?>