 <?php echo e(Form::model($plan, array('route' => array('plans.update', $plan->id), 'method' => 'PUT', 'enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))); ?>

        </div>
        <?php if($plan->id != 1): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('price',__('Price'),['class'=>'form-label'])); ?>

                <?php echo e(Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'),'required'=>'required'))); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('duration', __('Duration'),['class'=>'form-label'])); ?>

            <?php echo Form::select('duration', $arrDuration, null,array('class' => 'form-control select2','required'=>'required')); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('business', __('Max Business'),['class'=>'form-label'])); ?>

            <?php echo e(Form::number('business',null,array('class'=>'form-control','placeholder'=>__('Enter Max Business Create Limite')))); ?>

            <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
        </div>
        <div class="col-6">

        <div class="form-check form-switch custom-switch-v1">
            <input type="checkbox" class="form-check-input input-primary" name="enable_custdomain" id="enable_custdomain" <?php echo e(($plan['enable_custdomain'] == 'on') ? 'checked=checked' : ''); ?>>
            <label class="form-check-label" for="enable_custdomain"><?php echo e(__('Enable Domain')); ?></label>
        </div>
        </div>
        <div class="col-6">
            <div class="form-check form-switch custom-switch-v1">
                <input type="checkbox" class="form-check-input input-primary" name="enable_custsubdomain" id="enable_custsubdomain" <?php echo e(($plan['enable_custsubdomain'] == 'on') ? 'checked=checked' : ''); ?>>
                <label class="form-check-label" for="enable_custsubdomain"><?php echo e(__('Enable Sub Domain')); ?></label>
            </div>
        </div>
        <div class="col-6"><br>
            <div class="form-check form-switch custom-switch-v1">
                <input type="checkbox" class="form-check-input input-primary" name="enable_branding" id="enable_branding" <?php echo e(($plan['enable_branding'] == 'on') ? 'checked=checked' : ''); ?>>
                <label class="form-check-label" for="enable_branding"><?php echo e(__('Enable Branding')); ?></label>
            </div>
        </div>
        <div class="horizontal mt-3">

            <div class="verticals twelve">
                <div class="form-group col-md-6">
                  <?php echo e(Form::label('Select Themes', __('Select Themes'),['class'=>'form-label'])); ?>

                </div>
                <ul class="uploaded-pics">
                    <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            if(in_array($key,$plan->getThemes())){
                                $checked = 'checked';
                            }else{
                                $checked = '';
                            }
                        ?>
                    <li>
                        <input type="checkbox" id="checkthis<?php echo e($loop->index); ?>" value="<?php echo e($key); ?>" name="themes[]" <?php echo e($checked); ?>/>
                        <label for="checkthis<?php echo e($loop->index); ?>"><img src="<?php echo e(asset(Storage::url('uploads/card_theme/'.$key.'/color1.png'))); ?>" /></label>
                    </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
         
        </div>
        
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-label'])); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']); ?>

        </div>
        
    </div>
    <div class="modal-footer p-0 pt-3">
        <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <input class="btn btn-primary" type="submit" value="<?php echo e(__('Edit')); ?>">
    </div>
    <?php echo e(Form::close()); ?>

<script>
 $(document).ready(function() {
            $('#enable_branding').trigger('change');
        });
        $(document).on('change', '#enable_branding', function(e) {
            $('.showbranding').hide();
            if ($("#enable_branding").prop('checked') == true) {
                $('.showbranding').show();
            }
        });
</script><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/plan/edit.blade.php ENDPATH**/ ?>