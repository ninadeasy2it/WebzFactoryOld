<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Appointments')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Appointments')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
   <?php echo e(__('Appointments')); ?>

<?php $__env->stopSection(); ?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body table-border-style">
            <h5></h5>
            <div class="table-responsive">
                <table class="table" id="pc-dt-simple">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Time')); ?></th>
                            <th><?php echo e(__('Business Name')); ?></th>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Email')); ?></th>
                            <th><?php echo e(__('Phone')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $appointment_deatails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($val->date); ?></td>
                                <td><?php echo e($val->time); ?></td>
                                <td><?php echo e($val->business_name); ?></td>
                                <td><?php echo e($val->name); ?></td>
                                <td><?php echo e($val->email); ?></td>
                                <td><?php echo e($val->phone); ?></td>
                                <?php if($val->status == 'pending'): ?>
                                    <td><span class="badge bg-warning p-2 px-3 rounded"><?php echo e(ucFirst($val->status)); ?></span></td>
                                <?php else: ?>
                                    <td><span class="badge bg-success p-2 px-3 rounded"><?php echo e(ucFirst($val->status)); ?></span></td>
                                <?php endif; ?>
                                <div class="row float-end">
                                    <td class="d-flex">
                                        <div class="action-btn bg-danger ms-2">
                                            <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center"  data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($val->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                        </div>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['appointments.destroy', $val->id],'id'=>'delete-form-'.$val->id]); ?>

                                        <?php echo Form::close(); ?>

                                        <div class="action-btn bg-success  ms-2">
                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center cp_link" data-toggle="modal" data-target="#commonModal" data-ajax-popup="true" data-size="lg" data-url="<?php echo e(route('appointment.add-note',$val->id)); ?>" data-title="<?php echo e(__('Add Note & Change Status')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Add Note & Change Status')); ?>"> <span class="text-white"><i
                                                    class="ti ti-note"></i></span></a>
                                        </div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/appointments/index.blade.php ENDPATH**/ ?>