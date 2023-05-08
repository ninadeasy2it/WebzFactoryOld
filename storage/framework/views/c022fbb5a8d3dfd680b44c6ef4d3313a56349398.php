<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Contacts')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Contacts')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
   <?php echo e(__('Contacts')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                              <th><?php echo e(__('Business Name')); ?></th>
                              <th><?php echo e(__('Name')); ?></th>
                              <th><?php echo e(__('Email')); ?></th>
                              <th><?php echo e(__('Phone')); ?></th>
                              <th><?php echo e(__('Message')); ?></th>
                              <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $contacts_deatails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($val->business_name); ?></td>
                                  <td><?php echo e($val->name); ?></td>
                                  <td><?php echo e($val->email); ?></td>
                                  <td><?php echo e($val->phone); ?></td>
                                  <td><?php echo e($val->message); ?></td>
                                        <div class="row ">
                                            <td class="d-flex">
                                                <div class="action-btn bg-info  ms-2">
                                                    <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-url="<?php echo e(route('contacts.edit',$val->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit contacts')); ?>"  data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Edit contacts')); ?>"> <span class="text-white"> <i
                                                        class="ti ti-edit text-white"></i></span></a>
                                                </div>
                                                <div class="action-btn bg-danger ms-2">
                                                    <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center"  data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($val->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                </div>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $val->id],'id'=>'delete-form-'.$val->id]); ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                           
                                        </div>
                                   
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/contacts/index.blade.php ENDPATH**/ ?>