<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $(document).on('click', '.code', function () {
            var type = $(this).val();
            if (type == 'manual') {
                $('#manual').removeClass('d-none');
                $('#manual').addClass('d-block');
                $('#auto').removeClass('d-block');
                $('#auto').addClass('d-none');
            } else {
                $('#auto').removeClass('d-none');
                $('#auto').addClass('d-block');
                $('#manual').removeClass('d-block');
                $('#manual').addClass('d-none');
            }
        });

        $(document).on('click', '#code-generate', function () {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Manage Coupon')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
   <?php echo e(__('Manage Coupon')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Coupon')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Create')); ?>">
    
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-url="<?php echo e(route('coupons.create')); ?>"
            data-bs-whatever="<?php echo e(__('Create New Coupon')); ?>" > <span class="text-white"> 
                <i class="ti ti-plus text-white" ></i></span>
        </a>
     
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <h5></h5>
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th> <?php echo e(__('Name')); ?></th>
                                <th> <?php echo e(__('Code')); ?></th>
                                <th> <?php echo e(__('Discount (%)')); ?></th>
                                <th> <?php echo e(__('Limit')); ?></th>
                                <th> <?php echo e(__('Used')); ?></th>
                                <th> <?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($coupon->name); ?></td>
                                    <td><?php echo e($coupon->code); ?></td>
                                    <td><?php echo e($coupon->discount); ?></td>
                                    <td><?php echo e($coupon->limit); ?></td>
                                    <td><?php echo e($coupon->used_coupon()); ?></td>
                                        <div class="row ">
                                            <td class="d-flex">
                                                <div class="action-btn bg-success  ms-2">
                                                        <a href="<?php echo e(route('coupons.show',$coupon->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center"  data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Show Coupon')); ?>"> <span class="text-white"> <i
                                                                    class="ti ti-eye text-white"></i></span></a>
                                                </div>
                                                <div class="action-btn bg-info  ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-url="<?php echo e(route('coupons.edit',$coupon->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Coupon')); ?>"  data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Edit Coupon')); ?>"> <span class="text-white"> <i
                                                                    class="ti ti-edit text-white"></i></span></a>
                                                </div>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <form method="POST" action="<?php echo e(route('coupons.destroy', $coupon->id)); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm" data-toggle="tooltip"
                                                            title='Delete'>
                                                            <span class="text-white"> <i
                                                                class="ti ti-trash"></i></span>
                                                            </button>
                                                        </form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/coupon/index.blade.php ENDPATH**/ ?>