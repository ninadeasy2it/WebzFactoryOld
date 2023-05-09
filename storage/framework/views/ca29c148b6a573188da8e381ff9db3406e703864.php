<?php

    $card_theme = json_decode($business->card_theme);
    $content = json_decode($business->content);
    $no = 1;
    $social_no = 1;
    $stringid = $business->id;
    $appointment_no = 0;
    $service_row_no = 0;
    $testimonials_row_no = 0;
    $is_preview_bussiness_hour = 'false';
    // $banner=asset(Storage::url('card_banner/'));
    $banner=\App\Models\Utility::get_file('card_banner/');
    $logo=\App\Models\Utility::get_file('card_logo/');
    $image=\App\Models\Utility::get_file('testimonials_images/');
    $s_image=\App\Models\Utility::get_file('service_images/');
    $Subcategory=\App\Models\Utility::get_business_Subcategory();
    
    $category_id=$business->category_id;
    $subcategory_id=$business->subcategory_id;
    
    $banner_new=\App\Models\Utility::get_file('photos/');
    $logo_new=\App\Models\Utility::get_file('photos/');
    
    
?>


<?php
if((Session::has('fromTab'))){
   $fromTab=Session::get('fromTab');
}else{
    $fromTab='undefined'; 
}


//var_dump($Subcategory);


//var_dump($category_id);

//var_dump($subcategory_id);
//die;
?>


<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/dropzonejs/dropzone.css')); ?>">
    <style>
        @import  url(<?php echo e(asset('css/font-awesome.css')); ?>);
        .image {
            position: relative;
        }
        .image .actions {
            right: 1em;
            top: 1em;
            display: block;
            position: absolute;
        }
        .image .actions a {
            display: inline-block;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Business')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Business Information')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page">
        <a href="<?php echo e(route('business.index')); ?>"><?php echo e(__('Business')); ?></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Business Edit')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('get.card', $business->slug)); ?>" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip"
        data-bs-original-title="<?php echo e(__('Download')); ?>" title="<?php echo e(__('Download')); ?>" target="_blanks">
        <span class="text-white">
            <i class="ti ti-printer"></i>
        </span>
    </a>
    
    <a  class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" id="download-qr"
        data-bs-original-title="<?php echo e(__('Qr Code')); ?>" title="<?php echo e(__('Qr Code')); ?>" target="_blanks">
        <span class="text-white"><i class="fa fa-qrcode"></i></span>
    </a>
    
    <a class="btn btn-sm btn-primary btn-icon m-4 ml-0" data-bs-toggle="tooltip"
        data-bs-original-title="<?php echo e(__('Preview')); ?>" href="<?php echo e(url('/' . $business->slug)); ?>" target="-blank"><span
            class="text-white"><i class="ti ti-eye"></i></span></a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php // var_dump($business); ?>
    <div class="row mb-5">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12 col-md-12 col-xxl-12">
            <div class="p-3 card">
                <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($fromTab=='theme-setting'){echo 'active';} ?> <?php if($fromTab=='undefined'){echo 'active';} ?>" id="theme-setting-tab" data-bs-toggle="pill"
                            data-bs-target="#theme-setting" type="button"><?php echo e(__('Theme')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($fromTab=='details-setting'){echo 'active';} ?>" id="details-setting-tab" data-bs-toggle="pill"
                            data-bs-target="#details-setting" type="button"><?php echo e(__('Details')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($fromTab=='domain-setting'){echo 'active';} ?>" id="domain-setting-tab" data-bs-toggle="pill"
                            data-bs-target="#domain-setting" type="button"><?php echo e(__('Custom')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($fromTab=='block-setting'){echo 'active';} ?>" id="block-setting-tab" data-bs-toggle="pill"
                            data-bs-target="#block-setting" type="button"><?php echo e(__('Change Blocks')); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($fromTab=='seo-setting'){echo 'active';} ?>" id="seo-setting-tab" data-bs-toggle="pill" data-bs-target="#seo-setting"
                            type="button"><?php echo e(__('SEO')); ?></button>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($fromTab=='file-manager'){echo 'active';} ?>" id="file-manager-tab" data-bs-toggle="pill" data-bs-target="#file-manager"
                            type="button">File Manager</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade  <?php if($fromTab=='theme-setting'){echo 'active show';} ?> <?php if($fromTab=='undefined'){echo 'active show';} ?>" id="theme-setting" role="tabpanel"
                    aria-labelledby="pills-user-tab-1">
                    <div class="row">
                        <div class="col-lg-7 mb-5">
                            <div class="card bg-none card-box">
                                <?php echo e(Form::open(['route' => ['business.edit-theme', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="card-body">
                                    <div class="row">
                                        <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($key, Auth::user()->getPlanThemes())): ?>
                                                <div class="col-4 cc-selector mb-2">
                                                    <div class="mb-3 screen image">
                                                        <img class="color1" data-id="<?php echo e($key); ?>"
                                                            src="<?php echo e(asset(Storage::url('uploads/card_theme/' . $key . '/color1.png'))); ?>"
                                                            class="img-center pro_max_width pro_max_height <?php echo e($key); ?>_img">
                                                        <div class="actions">
                                                            <a href="">
                                                                <button type="button"
                                                                    class="btn btn-default delete-image-btn pull-right">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                                </button>
                                                            </a>
                                                            <a href="">
                                                                <button type="button"
                                                                    class="btn btn-default edit-image-btn pull-right">
                                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row gutters-xs" id="<?php echo e($key); ?>">
                                                            <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col" style="padding-right: 0px !important">
                                                                    <label class="colorinput">
                                                                        <input name="theme_color" id="<?php echo e($css); ?>"
                                                                            type="radio" value="<?php echo e($css); ?>"
                                                                            data-theme="<?php echo e($key); ?>"
                                                                            data-imgpath="<?php echo e($val['img_path']); ?>"
                                                                            class="colorinput-input"
                                                                            <?php echo e(isset($business->theme_color) && $business->theme_color == $css ? 'checked' : ''); ?>>
                                                                        <span class="colorinput-color"
                                                                            style="background:<?php echo e($val['color']); ?>"></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class=" card-footer">
                                    <div class="col-12 d-flex justify-content-end ">
                                        <?php echo e(Form::hidden('themefile', null, ['id' => 'themefile'])); ?>


                                        <button type="submit"
                                            class="btn  btn-primary btn-lg float-end"><?php echo e(__('Save changes')); ?></button><br>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!--  <iframe  class="w-100 h-1050" frameborder="0" src="<?php echo e(url('business/preview/card', $business->id)); ?>"></iframe> -->
                            <div class="card bg-none card-box">
                                <img src="<?php echo e(asset(Storage::url('uploads/card_theme/theme1/color1.png'))); ?>"
                                    class="img-fluid img-center w-75 theme_preview_img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?php if($fromTab=='details-setting'){echo 'active show';} ?>" id="details-setting" role="tabpanel" aria-labelledby="pills-user-tab-2">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Edit Business Details')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <?php echo e(Form::open(['route' => ['business.update', $business->id], 'method' => 'put', 'enctype' => 'multipart/form-data'])); ?>

                                    <input type="hidden" name="url" value="<?php echo e(url('/')); ?>" id="url">
                                    <!-- General information -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn  btn-primary btn-lg">
                                                       <?php echo e(__('Banner')); ?>

                                                    </a>
                                                  </span>
                                                    <input id="thumbnail" class="form-control" type="text" name="banner_new" style="display:none;">
                                                </div>
                                                <?php $__errorArgs = ['banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="holder" style="max-height:100px;">
                                                
                                                
                                                <img src="<?php echo e(isset($business->banner_new) && !empty($business->banner_new) ? $banner_new . '/' . $business->banner_new : asset('custom/img/placeholder-image.jpg')); ?>"
                                                    class="imagepreview" id="banner">
                                                
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn  btn-primary btn-lg">
                                                       <?php echo e(__('Logo')); ?>

                                                    </a>
                                                  </span>
                                                    <input id="thumbnail1" class="form-control" type="text" name="logo_new" style="display:none;">
                                                    <input type="hidden" name="business_id"
                                                            value="<?php echo e($business->id); ?>">
                                                </div>
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="holder1" style="max-height:100px;">
                                                
                                                
                                                <img src="<?php echo e(isset($business->logo_new) && !empty($business->logo_new) ? $logo_new . '/' . $business->logo_new  : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                    class="avatar avatar-xl rounded-circle mr-3" id="business_logo">

                                                    
                                            
                                                
                                                 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
<!--                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="file" name="banner" id="file-1"
                                                        class="custom-input-file custom-input-file-link banner d-none"
                                                        data-multiple-caption="{count} files selected">
                                                    <label for="file-1">
                                                        <button type="button" class="btn  btn-primary btn-lg"
                                                            onclick="selectFile('banner')"><?php echo e(__('Banner')); ?></button>
                                                    </label>
                                                    <?php $__errorArgs = ['banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-favicon text-xs text-danger"
                                                            role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo e(isset($business->banner) && !empty($business->banner) ? $banner . '/' . $business->banner : asset('custom/img/placeholder-image.jpg')); ?>"
                                                    class="imagepreview" id="banner">
                                                    
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="file" name="logo" id="file-1"
                                                        class="custom-input-file custom-input-file-link business_logo d-none"
                                                        data-multiple-caption="{count} files selected" multiple="">
                                                    <label for="file-1">
                                                        <button type="button" class="btn  btn-primary btn-lg"
                                                            onclick="selectFile('business_logo')"><?php echo e(__('Logo')); ?></button>
                                                        <input type="hidden" name="business_id"
                                                            value="<?php echo e($business->id); ?>">
                                                    </label>
                                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-favicon text-xs text-danger"
                                                            role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="<?php echo e(isset($business->logo) && !empty($business->logo) ? $logo . '/' . $business->logo  : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                    class="avatar avatar-xl rounded-circle mr-3" id="business_logo">

                                                    
                                            </div>
                                        </div>-->
                                    
                                    
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Title', __('Title'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('title', $business->title, ['class' => 'form-control ', 'id' => $stringid . '_title', 'placeholder' => __('Enter Title')])); ?>

                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Designation', __('Designation'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('designation', $business->designation, ['class' => 'form-control', 'id' => $stringid . '_designation', 'placeholder' => __('Enter Designation')])); ?>

                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Sub_Title', __('Sub Title'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('sub_title', $business->sub_title, ['class' => 'form-control ', 'id' => $stringid . '_subtitle', 'placeholder' => __('Enter Sub Title')])); ?>

                                                <?php $__errorArgs = ['sub_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Description', __('Description'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::textarea('description', $business->description, ['class' => 'form-control description-text ','rows' => '3', 'id' => $stringid . '_desc', 'placeholder' => __('Enter Description')])); ?>

                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Occupation Category', __('Occupation Category'), ['class' => 'form-label'])); ?>

                                                
                                                    
                                                   
                                                    <select name="category_id" id="category_id" class="form-control" onchange="get_business_Subcategory(this.value);" placeholder="Select a Occupation Category" readonly>
                                                         <option value=""></option> 
                                                        <?php $__currentLoopData = \App\Models\Utility::get_business_category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($business->category_id == $business_category->category_id): ?> selected <?php endif; ?> value="<?php echo e($business_category->category_id); ?>"><?php echo e(Str::upper($business_category->name)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('Occupation Subcategory', __('Occupation Subcategory'), ['class' => 'form-label'])); ?>

                                                <div class="subcategory_id">
                                                    <select name="subcategory_id" id="subcategory_id" class="form-control select2" placeholder="Select a Occupation Subcategory" readonly>
                                                        <option value=""></option> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php echo e(Form::label('slug', __('Personalized Link'), ['class' => 'form-label'])); ?>

                                                <div class="input-group">
                                                    <div class="input-group-append res">
                                                        <span class="input-group-text h-44 py-1"
                                                            id="">
                                                            
                                                            <?php echo e($business_url); ?>

                                                        </span>
                                                    </div>
                                                  <?php echo e(Form::text('slug', $business->slug, ['class' => 'form-control', 'placeholder' => __('Enter Slug')])); ?>

                                                </div>
                                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-0" />
                                    <div class="faq">
                                        <div class="accordion accordion-flush" id="accordionExample">
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ti ti-info-circle text-primary"></i>
                                                            <?php echo e(__('Contact Info')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div id="showContacts">
                                                            <div
                                                                class=" d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft ">
                                                                <input type="hidden" name="is_contacts_enabled"
                                                                    value="off">
                                                                <input type="checkbox" data-toggle="switchbutton"
                                                                    data-onstyle="primary" name="is_contacts_enabled"
                                                                    id="is_contacts_enabled"
                                                                    <?php echo e(isset($contactinfo['is_enabled']) && $contactinfo['is_enabled'] == '1' ? 'checked="checked"' : ''); ?>>

                                                                <div class="col-auto justify-content-end">
                                                                    <button href="javascript:void(0)"
                                                                        class="btn btn-sm btn-primary btn-icon m-1"
                                                                        type="button" value="sdfcvgbnn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#fieldModal"
                                                                        data-bs-whatever="<?php echo e(__('Choose contact field')); ?>"
                                                                        data-bs-toggle="tooltip"><i
                                                                            class="fas fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table border-0" data-repeater-list="stages">
                                                                    <tbody id="inputrow_contact">
                                                                        <?php if(!is_null($contactinfo_content)): ?>
                                                                            <?php $__currentLoopData = $contactinfo_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if($key1 != 'id'): ?>
                                                                                        <tr id="inputFormRow"
                                                                                            class="inputFormRow border-0">
                                                                                            <td>
                                                                                                <div
                                                                                                    class="form-icon-user">
                                                                                                    <?php if($key1 == 'Address'): ?>
                                                                                                        <?php $__currentLoopData = $val1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                            <div
                                                                                                                class="input-group">
                                                                                                                <span
                                                                                                                    class="input-group-text"><img
                                                                                                                        src="<?php echo e(asset('custom/icon/black/' . strtolower($key1) . '.svg')); ?>"></span>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php if($key2 == 'Address'): ?> id="<?php echo e($key1 . '_' . $no); ?>" <?php endif; ?>
                                                                                                                    name="<?php echo e('contact[' . $no . '][' . $key1 . '][' . $key2 . ']'); ?>"
                                                                                                                    class="form-control"
                                                                                                                    value="<?php echo e($val2); ?>"
                                                                                                                    required />
                                                                                                            </div>
                                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="<?php echo e('contact[' . $no . '][id]'); ?>"
                                                                                                            value="<?php echo e($no); ?>">
                                                                                                    <?php else: ?>
                                                                                                        <div
                                                                                                            class="input-group">
                                                                                                            <span
                                                                                                                class="input-group-text"><img
                                                                                                                    src="<?php echo e(asset('custom/icon/black/' . strtolower($key1) . '.svg')); ?>"></span>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                name="<?php echo e('contact[' . $no . '][' . $key1 . ']'); ?>"
                                                                                                                value="<?php echo e($val1); ?>"
                                                                                                                id="<?php echo e($key1 . '_' . $no); ?>"
                                                                                                                class="form-control"
                                                                                                                placeholder="Username">
                                                                                                        </div>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="<?php echo e('contact[' . $no . '][id]'); ?>"
                                                                                                            value="<?php echo e($no); ?>">
                                                                                                    <?php endif; ?>

                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="text-right">
                                                                                                <div
                                                                                                    class="action-btn bg-danger ms-2">
                                                                                                    <button
                                                                                                        class=" btn btn-sm d-inline-flex align-items-center"
                                                                                                        id="removeRow_contact"
                                                                                                        data-id="contact_<?php echo e($loop->parent->index + 1); ?>"><i
                                                                                                            class="ti ti-trash text-white"></i></button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php endif; ?>
                                                                                    <?php
                                                                                        $no++;
                                                                                    ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal fade" id="fieldModal" tabindex="-1"
                                                                role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">
                                                                                <?php echo e(__('Add Field')); ?></h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <?php $__currentLoopData = $businessfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <div class="col-lg-4 col-md-6">
                                                                                        <div class="card shadow getvalue"
                                                                                            value="<?php echo e($val); ?>"
                                                                                            id="<?php echo e($val); ?>"
                                                                                            data-id="<?php echo e($val); ?>"
                                                                                            onclick="getValue(this.id)">
                                                                                            <div class="card-body p-3">
                                                                                                <div
                                                                                                    class="d-flex align-items-center justify-content-between">
                                                                                                    <div
                                                                                                        class="d-flex align-items-center">
                                                                                                        <div
                                                                                                            class="theme-avtar bg-primary">
                                                                                                            <img src="<?php echo e(asset('custom/icon/white/' . $val . '.svg')); ?>"
                                                                                                                alt="image"
                                                                                                                class="<?php echo e($val); ?>">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="ms-3">
                                                                                                            <?php if($val == 'Web_url'): ?>
                                                                                                                <h5>
                                                                                                                    <?php echo e(__('Web Url')); ?>

                                                                                                                </h5>
                                                                                                            <?php else: ?>
                                                                                                                <h5>
                                                                                                                    <?php echo e($val); ?>

                                                                                                                </h5>
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        <span class="d-flex align-items-center">
                                                            <i
                                                                class="ti ti-info-circle text-primary"></i><?php echo e(__('Business Hours')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 py-2 text-right">
                                                                    <div
                                                                        class="d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft">
                                                                        <input type="hidden"
                                                                            name="is_business_hours_enabled"
                                                                            value="off">
                                                                        <input type="checkbox" data-toggle="switchbutton"
                                                                            data-onstyle="primary"
                                                                            name="is_business_hours_enabled"
                                                                            id="is_business_hours_enabled"
                                                                            <?php echo e(isset($businesshours['is_enabled']) && $businesshours['is_enabled'] == '1' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-4 res" id="showElement">
                                                                <div class="row bg-light mb-3 p-2">
                                                                    <div class="col-3">
                                                                        <label class="font-bold"><small>Day</small></label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label class="font-bold"><small>Start
                                                                                        Time</small></label>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label class="font-bold"><small>End
                                                                                        Time</small></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <div class="form-check"
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo e(__('On/Off')); ?>">
                                                                                    <input class="form-check-input days"
                                                                                        type="checkbox"
                                                                                        name="days_<?php echo e($k); ?>"
                                                                                        id="days_<?php echo e($k); ?>"
                                                                                        <?php if(!is_null($business_hours)): ?> <?php echo e(isset($business_hours->$k) && $business_hours->$k->days == 'on' ? 'checked' : ''); ?> <?php endif; ?>>
                                                                                    <label class="custom-control-label"
                                                                                        for="days_<?php echo e($k); ?>"><?php echo e($day); ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-9 mb-3">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    
                                                                                    <input type="time"
                                                                                        id="days_<?php echo e($k); ?>_start"
                                                                                        data-id="days_<?php echo e($k); ?>"
                                                                                        class="form-control timepicker"
                                                                                        name="start-<?php echo e($k); ?>"
                                                                                        value="<?php echo e(!is_null($business_hours) && isset($business_hours->$k) && $business_hours->$k->days == 'on' ? $business_hours->$k->start_time : ''); ?>"
                                                                                        onchange="changeFunction(this.id)">
                                                                                </div>

                                                                                <div class="col-6">
                                                                                    
                                                                                    <input type="time"
                                                                                        id="days_<?php echo e($k); ?>_end"
                                                                                        data-id="days_<?php echo e($k); ?>"
                                                                                        class="form-control timepicker"
                                                                                        name="end-<?php echo e($k); ?>"
                                                                                        value="<?php echo e(!is_null($business_hours) && isset($business_hours->$k) && $business_hours->$k->days == 'on' ? $business_hours->$k->end_time : ''); ?>"
                                                                                        onchange="changeFunction(this.id)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ti ti-info-circle text-primary"></i>
                                                            <?php echo e(__('Appointment')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div class="">
                                                            <div class="py-4 res">
                                                                <div class="rounded-12 appoinment-element  px-4"
                                                                    data-value="<?php echo e(json_encode($appoinment_hours)); ?>">
                                                                    <div
                                                                        class="d-flex align-items-center  justify-content-between border-0 py-2 borderleft">
                                                                        <input type="hidden" name="is_appoinment_enabled"
                                                                            value="off">
                                                                        <input type="checkbox" data-toggle="switchbutton"
                                                                            data-onstyle="primary"
                                                                            name="is_appoinment_enabled"
                                                                            id="is_appoinment_enabled"
                                                                            <?php echo e(isset($appoinment['is_enabled']) && $appoinment['is_enabled'] == '1' ? 'checked="checked"' : ''); ?>>
                                                                        <div class="col-auto justify-content-end">
                                                                            <button href="javascript:void(0)"
                                                                                class="btn btn-sm btn-primary btn-icon m-1"
                                                                                type="button"
                                                                                onclick="appointmentRepeater()"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div id="showAppoinment">
                                                                        <table class="table mt-2">
                                                                            <thead>
                                                                                <th><?php echo e(__('Starting Hour')); ?></th>
                                                                                <th><?php echo e(__('Ending Hour')); ?></th>
                                                                                <th class="text-end">
                                                                                    <?php echo e(__('Delete')); ?></th>
                                                                            </thead>
                                                                            <tbody id="inputrow_appointment">
                                                                                <tr>
                                                                                    <?php if(!is_null($appoinment_hours)): ?>
                                                                                        <?php $__currentLoopData = $appoinment_hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <tr id="inputFormRow1">
                                                                                                <td>
                                                                                                    <input type="time"
                                                                                                        class="form-control appointment_time timepicker"
                                                                                                        id="appoinment_start_<?php echo e($appointment_no); ?>"
                                                                                                        name="<?php echo e('hours[' . $appointment_no . '][start]'); ?>"
                                                                                                        value="<?php echo e($hour->start); ?>"
                                                                                                        onchange="changeTime(this.id)">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="time"
                                                                                                        class="form-control appointment_time timepicker"
                                                                                                        id="appoinment_end_<?php echo e($appointment_no); ?>"
                                                                                                        name="<?php echo e('hours[' . $appointment_no . '][end]'); ?>"
                                                                                                        value="<?php echo e($hour->end); ?>"
                                                                                                        onchange="changeTime(this.id)">
                                                                                                </td>
                                                                                                <td class="text-right">
                                                                                                    <div
                                                                                                        class="action-btn bg-danger ms-2 float-end">
                                                                                                        <a class="btn btn-sm d-inline-flex align-items-center"
                                                                                                            id="removeRow_appointment"
                                                                                                            data-id="<?php echo e('appointment_' . $appointment_no); ?>"><i
                                                                                                                class="ti ti-trash text-white"></i></a>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <?php
                                                                                                $appointment_no++;
                                                                                            ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php endif; ?>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ti ti-info-circle text-primary"></i>
                                                            <?php echo e(__('Services')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div class="rounded-12 appoinment-element">
                                                            <div
                                                                class="d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft pb-3">
                                                                <input type="hidden" name="is_services_enabled"
                                                                    value="off">
                                                                <input type="checkbox" data-toggle="switchbutton"
                                                                    data-onstyle="primary" name="is_services_enabled"
                                                                    id="is_services_enabled"
                                                                    <?php echo e(isset($services['is_enabled']) && $services['is_enabled'] == '1' ? 'checked="checked"' : ''); ?>>
                                                                <div class="col-auto justify-content-end">
                                                                    <button href="javascript:void(0)"
                                                                        class="btn btn-sm btn-primary btn-icon m-1"
                                                                        type="button" onclick="servieRepeater()"><i
                                                                            class="fas fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div id="showServices">
                                                                <div class="row" id="inputrow_service">
                                                                    <?php $image_count = 0; ?>
                                                                    <?php if(!is_null($services_content)): ?>
                                                                        <?php $__currentLoopData = $services_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col-md-6 col-sm-12" id="inputFormRow2">
                                                                                <div
                                                                                    class="card min-393 border-primary border-2 border-bottom-0 border-start-0 border-end-0">
                                                                                    <div class="card-body text-center">
                                                                                        <div
                                                                                            class="float-end action-btn bg-danger ms-2">
                                                                                            <a class="btn btn-sm d-inline-flex align-items-center hover-none"
                                                                                                id="removeRow_services"
                                                                                                data-id="<?php echo e('services_' . $service_row_no); ?>"><i
                                                                                                    class="ti ti-trash"></i></a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="position-relative ml-2 d-inline-flex ">
                                                                                            

                                                                                                <img alt="Image placeholder"
                                                                                                        src="<?php echo e(!empty($content->image) ? $s_image . '/' . $content->image : $s_image . 'service_images/'); ?>"
                                                                                                        id="<?php echo e('s_image' . $image_count); ?>"
                                                                                                        class="imagepreview">
                                                                                            <div
                                                                                                class="position-absolute top-50 start-100 translate-middle">
                                                                                                <input type="file"
                                                                                                    id="file-1"
                                                                                                    class="custom-input-file custom-input-file-link s_image<?php echo e($image_count); ?> d-none"
                                                                                                    data-multiple-caption="{count} files selected"
                                                                                                    multiple=""
                                                                                                    name="<?php echo e('services[' . $service_row_no . '][image]'); ?>">
                                                                                                <input type="hidden"
                                                                                                    name="<?php echo e('services[' . $service_row_no . '][get_image]'); ?>"
                                                                                                    value="<?php echo e($content->image); ?>">
                                                                                                <span
                                                                                                    class="btn btn-sm btn-info btn-icon" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                                                    onclick="selectFile('s_image<?php echo e($image_count); ?>')"><i
                                                                                                        class="ti ti-pencil"
                                                                                                        onclick="selectFile('s_image<?php echo e($image_count); ?>')"></i>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <h5
                                                                                            class="mt-4 font-weight-bold mb-0 input-h4">
                                                                                            <input type="text"
                                                                                                id="<?php echo e('title_' . $service_row_no); ?>"
                                                                                                name="<?php echo e('services[' . $service_row_no . '][title]'); ?>"
                                                                                                class="h5 textboxhover border-0 "
                                                                                                placeholder="Enter title"
                                                                                                value="<?php echo e($content->title); ?>">
                                                                                        </h5>
                                                                                        <div
                                                                                            class="mt-2 text-dark textarea-adjust">
                                                                                            <textarea class="border-0 textboxhover input-text-location text-center"
                                                                                                name="<?php echo e('services[' . $service_row_no . '][description]'); ?>" id="<?php echo e('description_' . $service_row_no); ?>"
                                                                                                placeholder="Enter Description"><?php echo e($content->description); ?></textarea>
                                                                                        </div>
                                                                                        <h4
                                                                                            class="mt-2 font-weight-bold mb-0 input-h4">
                                                                                            <input type="text"
                                                                                                id="<?php echo e('purchase_link_' . $service_row_no); ?>"
                                                                                                name="<?php echo e('services[' . $service_row_no . '][purchase_link]'); ?>"
                                                                                                class="h5 textboxhover border-0 "
                                                                                                placeholder="Purchase link"
                                                                                                value="<?php if(isset($content->purchase_link)): ?> <?php echo e($content->purchase_link); ?> <?php endif; ?>">
                                                                                        </h4>
                                                                                        <div
                                                                                            class="mt-2 text-dark textarea-adjust">
                                                                                            <textarea class="border-0 textboxhover input-text-location text-center"
                                                                                                name="<?php echo e('services[' . $service_row_no . '][link_title]'); ?>" id="<?php echo e('link_title_' . $service_row_no); ?>"
                                                                                                placeholder="Enter link title"><?php echo e($content->link_title); ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                                $image_count++;
                                                                                $service_row_no++;
                                                                            ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ti ti-info-circle text-primary"></i>
                                                            <?php echo e(__('Testimonials')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div class="">
                                                            <div>
                                                                <div class="rounded-12 appoinment-element">
                                                                    <div
                                                                        class=" d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="hidden"
                                                                                name="is_testimonials_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                data-toggle="switchbutton"
                                                                                data-onstyle="primary"
                                                                                name="is_testimonials_enabled"
                                                                                id="is_testimonials_enabled"
                                                                                <?php echo e(isset($testimonials['is_enabled']) && $testimonials['is_enabled'] == '1' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                        <div class="col-auto justify-content-end">
                                                                            <button href="javascript:void(0)"
                                                                                class="btn btn-sm btn-primary btn-icon m-1"
                                                                                type="button"
                                                                                onclick="testimonialRepeater()"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div id="showTestimonials">
                                                                        <div class="row" id="inputrow_testimonials">
                                                                            <?php
                                                                                $t_image_count = 0;
                                                                                $t_rating_count = 0;
                                                                            ?>
                                                                            <?php if(!is_null($testimonials_content)): ?>
                                                                                <?php $__currentLoopData = $testimonials_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $testi_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <div class="col-md-6 col-sm-12"
                                                                                        id="inputFormRow3"><br>
                                                                                        <div
                                                                                            class="card min-393 border-primary border-2 border-bottom-0 border-start-0 border-end-0">
                                                                                            <div
                                                                                                class="card-body text-center">
                                                                                                <div
                                                                                                    class="float-end action-btn bg-danger ms-2">
                                                                                                    <a class="btn btn-sm d-inline-flex align-items-center hover-none"
                                                                                                        id="removeRow_testimonials"
                                                                                                        data-id="<?php echo e('testimonials_' . $testimonials_row_no); ?>"><i
                                                                                                            class="ti ti-trash"></i></a>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="position-relative ml-2 d-inline-flex">
                                                                                                    <img alt="Image placeholder"
                                                                                                        src="<?php echo e(!empty($testi_content->image) ? $image . '/' . $testi_content->image : $image . 'testimonials_images/'); ?>"
                                                                                                        id="<?php echo e('t_image' . $t_image_count); ?>"
                                                                                                        class="imagepreview">

                                                                                                        
                                                                                                    <div
                                                                                                        class="position-absolute top-50 start-100 translate-middle">
                                                                                                        <input
                                                                                                            type="file"
                                                                                                            id="file-1"
                                                                                                            class="custom-input-file d-none custom-input-file-link t_image<?php echo e($t_image_count); ?>"
                                                                                                            data-multiple-caption="{count} files selected"
                                                                                                            multiple=""
                                                                                                            name="<?php echo e('testimonials[' . $testimonials_row_no . '][image]'); ?>">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="<?php echo e('testimonials[' . $t_image_count . '][get_image]'); ?>"
                                                                                                            value="<?php echo e($testi_content->image); ?>">
                                                                                                        <span
                                                                                                            class="btn btn-sm btn-info btn-icon" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                                                            onclick="selectFile('t_image<?php echo e($t_image_count); ?>')">
                                                                                                            <i
                                                                                                                class="fas fa-pen"></i>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <h5
                                                                                                    class="mt-4 font-weight-bold mb-0 input-h4">
                                                                                                    <span
                                                                                                        class="<?php echo e('stars' . $testimonials_row_no); ?>"><?php echo e($testi_content->rating); ?></span>/5
                                                                                                </h5>
                                                                                                <div
                                                                                                    class="text-center testimonial-ratings mt-2">
                                                                                                    <fieldset
                                                                                                        id='demo1'
                                                                                                        class="rating">
                                                                                                        <input
                                                                                                            class="<?php echo e('stars' . $testimonials_row_no); ?>"
                                                                                                            type="radio"
                                                                                                            id="<?php echo e('testimonials-5' . $t_rating_count); ?>"
                                                                                                            name="<?php echo e('testimonials[' . $testimonials_row_no . '][rating]'); ?>"
                                                                                                            value="5"
                                                                                                            onclick="getRadio(this)"
                                                                                                            <?php echo e(isset($testi_content->rating) && $testi_content->rating == '5' ? 'checked="checked"' : ''); ?> />
                                                                                                        <label
                                                                                                            class="full"
                                                                                                            for="<?php echo e('testimonials-5' . $t_rating_count); ?>"
                                                                                                            title="Awesome - 5 stars"></label>
                                                                                                        <input
                                                                                                            class="<?php echo e('stars' . $testimonials_row_no); ?>"
                                                                                                            type="radio"
                                                                                                            id="<?php echo e('testimonials-4' . $t_rating_count); ?>"
                                                                                                            name="<?php echo e('testimonials[' . $testimonials_row_no . '][rating]'); ?>"
                                                                                                            value="4"
                                                                                                            onclick="getRadio(this)"
                                                                                                            <?php echo e(isset($testi_content->rating) && $testi_content->rating == '4' ? 'checked="checked"' : ''); ?> />
                                                                                                        <label
                                                                                                            class="full"
                                                                                                            for="<?php echo e('testimonials-4' . $t_rating_count); ?>"
                                                                                                            title="Pretty good - 4 stars"></label>
                                                                                                        <input
                                                                                                            class="<?php echo e('stars' . $testimonials_row_no); ?>"
                                                                                                            type="radio"
                                                                                                            id="<?php echo e('testimonials-3' . $t_rating_count); ?>"
                                                                                                            name="<?php echo e('testimonials[' . $testimonials_row_no . '][rating]'); ?>"
                                                                                                            value="3"
                                                                                                            onclick="getRadio(this)"
                                                                                                            <?php echo e(isset($testi_content->rating) && $testi_content->rating == '3' ? 'checked="checked"' : ''); ?> />
                                                                                                        <label
                                                                                                            class="full"
                                                                                                            for="<?php echo e('testimonials-3' . $t_rating_count); ?>"
                                                                                                            title="Meh - 3 stars"></label>
                                                                                                        <input
                                                                                                            class="<?php echo e('stars' . $testimonials_row_no); ?>"
                                                                                                            type="radio"
                                                                                                            id="<?php echo e('testimonials-2' . $t_rating_count); ?>"
                                                                                                            name="<?php echo e('testimonials[' . $testimonials_row_no . '][rating]'); ?>"
                                                                                                            value="2"
                                                                                                            onclick="getRadio(this)"
                                                                                                            <?php echo e(isset($testi_content->rating) && $testi_content->rating == '2' ? 'checked="checked"' : ''); ?> />
                                                                                                        <label
                                                                                                            class="full"
                                                                                                            for="<?php echo e('testimonials-2' . $t_rating_count); ?>"
                                                                                                            title="Kinda bad - 2 stars"></label>
                                                                                                        <input
                                                                                                            class="<?php echo e('stars' . $testimonials_row_no); ?>"
                                                                                                            type="radio"
                                                                                                            id="<?php echo e('testimonials-1' . $t_rating_count); ?>"
                                                                                                            name="<?php echo e('testimonials[' . $testimonials_row_no . '][rating]'); ?>"
                                                                                                            value="1"
                                                                                                            onclick="getRadio(this)"
                                                                                                            <?php echo e(isset($testi_content->rating) && $testi_content->rating == '1' ? 'checked="checked"' : ''); ?> />
                                                                                                        <label
                                                                                                            class="full"
                                                                                                            for="<?php echo e('testimonials-1' . $t_rating_count); ?>"
                                                                                                            title="Sucks big time - 1 star"></label>
                                                                                                    </fieldset>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mt-2 text-dark textarea-adjust">
                                                                                                    <blade
                                                                                                        ___html_tags_1___ />
                                                                                                </div>
                                                                                                <div class="mt-4 text-dark textarea-adjust">
                                                                                                    <textarea class="border-0 textboxhover input-text-location ml-46px" id="<?php echo e('testimonial_description_' . $testimonials_row_no); ?>"
                                                                                                        name="<?php echo e('testimonials[' . $testimonials_row_no . '][description]'); ?>"
                                                                                                        placeholder="Enter Description"><?php echo e($testi_content->description); ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                        $t_rating_count++;
                                                                                        $t_image_count++;
                                                                                        $testimonials_row_no++;
                                                                                    ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                        aria-expanded="false" aria-controls="collapseSix">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ti ti-info-circle text-primary"></i>
                                                            <?php echo e(__('Social Links')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseSix" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div
                                                            class="d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft">
                                                            <input type="hidden" name="is_socials_enabled"
                                                                value="off">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" name="is_socials_enabled"
                                                                id="is_socials_enabled"
                                                                <?php echo e(isset($sociallinks['is_enabled']) && $sociallinks['is_enabled'] == '1' ? 'checked="checked"' : ''); ?>>
                                                            <div class="col-auto justify-content-end">
                                                                <button href="javascript:void(0)"
                                                                    class="btn btn-sm btn-primary btn-icon m-1"
                                                                    type="button" value="sdfcvgbnn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#socialsModal"><i
                                                                        class="fas fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div id="showSocials">
                                                            <table class="table mt-3">
                                                                <tbody id="inputrow_socials">
                                                                    <?php if(!is_null($social_content)): ?>
                                                                        <?php $__currentLoopData = $social_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key => $social_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $__currentLoopData = $social_val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key1 => $social_val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($social_key1 != 'id'): ?>
                                                                                    <tr id="inputFormRow4"
                                                                                        class="border-0">
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-text">
                                                                                                    <img
                                                                                                        src="<?php echo e(asset('custom/icon/black/' . strtolower($social_key1) . '.svg')); ?>">
                                                                                                </span>
                                                                                                <input type="text"
                                                                                                    placeholder="Enter link"
                                                                                                    name="<?php echo e('socials[' . $social_no . '][' . $social_key1 . ']'); ?>"
                                                                                                    class="form-control social_href "
                                                                                                    value="<?php echo e($social_val1); ?>"
                                                                                                    id="<?php echo e('social_link_' . $social_no); ?>"
                                                                                                    required />
                                                                                                <input type="hidden"
                                                                                                    name="<?php echo e('socials[' . $social_no . '][id]'); ?>"
                                                                                                    value="<?php echo e($social_no); ?>"><br>
                                                                                                <h6 class="text-danger text-xs"
                                                                                                    id="<?php echo e('social_link_' . $social_no . '_error_href'); ?>">
                                                                                                </h6>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="text-right float-end">
                                                                                            <div
                                                                                                class="action-btn bg-danger ms-2">
                                                                                                <button
                                                                                                    class="btn btn-sm d-inline-flex align-items-center"
                                                                                                    id="removeRow_socials"
                                                                                                    data-id="socials_<?php echo e($loop->parent->index + 1); ?>"><i
                                                                                                        class="ti ti-trash text-white"></i></button>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php endif; ?>
                                                                                <?php
                                                                                    $social_no++;
                                                                                ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card">
                                                <h2 class="accordion-header" id="headingseven">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseseven"
                                                        aria-expanded="false" aria-controls="collapseseven">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ti ti-info-circle text-primary"></i>
                                                            <?php echo e(__('Custom HTML')); ?>

                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseseven" class="accordion-collapse collapse"
                                                    aria-labelledby="headingseven" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div
                                                            class="d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft">
                                                            <input type="hidden" name="is_custom_html_enabled"
                                                                value="off">

                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" name="is_custom_html_enabled"
                                                                id="is_custom_html_enabled"
                                                                <?php echo e(isset($customhtml['is_custom_html_enabled']) && $customhtml['is_custom_html_enabled'] == '1' ? 'checked="checked"' : ''); ?>>
                                                        </div>
                                                        <div id="">
                                                            <div class="form-group custom_html_text mt-3">
                                                                <textarea id=<?php echo e($stringid); ?>_chtml type="text" name="custom_html_text" class="form-control emojiarea" rows="4"
                                                                    style="height: auto"><?php echo e(isset($customhtml['custom_html_text']) && $customhtml['custom_html_text'] ? $customhtml['custom_html_text'] : ''); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Save changes buttons -->
                                    <div class="card-footer ">
                                        <button type="submit"
                                            class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                    </div><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5">
                            <!--  <iframe  class="w-100 h-1050" frameborder="0" src="<?php echo e(url('business/preview/card', $business->id)); ?>"></iframe> -->
                            <div class="card bg-none card-box ">
                                <img src="<?php echo e(asset(Storage::url('uploads/card_theme/theme1/color1.png'))); ?>"
                                    class="img-fluid img-center w-75 theme_preview_img">
                            </div>
                        </div>
                        
                        
<!--                        <div class="col-lg-5">
                            <div class="sticky-top tech-card-body card bg-none card-box preview-height" id="sticky">
                                <div class="h-100 sfdsafg">
                                      <iframe  class="w-100 h-1050" frameborder="0" src="<?php echo e(url('business/preview/card', $business->id)); ?>"></iframe> 
                                    include('card.' . $card_theme->theme . '.index')
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="tab-pane fade <?php if($fromTab=='domain-setting'){echo 'active show';} ?>" id="domain-setting" role="tabpanel" aria-labelledby="pills-user-tab-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <?php echo e(Form::open(['route' => ['business.domain-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="card-body">
                                    <div class="">
                                        <h5 class="mt-3 mb-4"><?php echo e(__('Custom Domain')); ?></h5>
                                        <?php if($plan->enable_custdomain == 'on' || $plan->enable_custsubdomain == 'on'): ?>
                                            <div class="col-12 pt-2 pb-4 px-0 custom-domain">
                                                <div class="btn-group btn-group-toggle" data-bs-toggle="buttons">
                                                    <label for="enable_storelink"
                                                        class="btn btn-primary mr-2 tab_btn <?php echo e($business->enable_businesslink == 'on' ? 'active' : ''); ?>">
                                                        <input type="radio" class="domain_click d-none"
                                                            name="enable_domain" value="enable_businesslink"
                                                            id="enable_storelink"
                                                            <?php echo e($business->enable_businesslink == 'on' ? 'checked' : ''); ?>">
                                                        <?php echo e(__('Business Link')); ?>

                                                    </label>
                                                    <?php if($plan->enable_custdomain == 'on'): ?>
                                                        <label for="enable_domain"
                                                            class="btn btn-primary mr-2 tab_btn <?php echo e($business->enable_domain == 'on' ? 'active' : ''); ?>">
                                                            <input type="radio" class="domain_click d-none"
                                                                name="enable_domain" value="enable_domain"
                                                                id="enable_domain"
                                                                <?php echo e($business->enable_domain == 'on' ? 'checked' : ''); ?>>
                                                            <?php echo e(__('Domain')); ?>

                                                        </label>
                                                    <?php endif; ?>
                                                    <?php if($plan->enable_custsubdomain == 'on'): ?>
                                                        <label for="enable_subdomain"
                                                            class="btn domain_click btn-primary mr-2 tab_btn <?php echo e($business->enable_subdomain == 'on' ? 'active' : ''); ?>">
                                                            <input type="radio" class="domain_click d-none"
                                                                name="enable_domain" value="enable_subdomain"
                                                                id="enable_subdomain"
                                                                <?php echo e($business->enable_subdomain == 'on' ? 'checked' : ''); ?>>
                                                            <?php echo e(__('Sub Domain')); ?>

                                                        </label>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 " id="StoreLink"
                                            style="<?php echo e($business->enable_businesslink == 'on' ? 'display: block' : 'display: none'); ?>">
                                            <?php echo e(Form::label('business_link', __('Business Link'), ['class' => 'form-label'])); ?>

                                            <div class="input-group">
                                                <input type="text" value="<?php echo e($business_url); ?>" id="myInput"
                                                    class="form-control d-inline-block" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn h-44 btn-outline-primary py-1" type="button"
                                                        onclick="myFunction()" id="button-addon2"><i
                                                            class="far fa-copy"></i>
                                                        <?php echo e(__('Copy Link')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 domain"
                                            style="<?php echo e($business->enable_domain == 'on' ? 'display:block' : 'display:none'); ?>">
                                            <?php echo e(Form::label('business_domain', __('Custom Domain'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('domains', $business->domains, ['class' => 'form-control', 'placeholder' => __('xyz.com')])); ?>

                                        </div>
                                        <div class="form-group col-md-12 text-sm mt-3" id="domainnote"
                                            style="display: none">
                                            <?php echo e(__('Note : Before add custom domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?>

                                            <br>
                                        </div>
                                        <?php if($plan->enable_custsubdomain == 'on'): ?>
                                            <div class="form-group col-md-12 sundomain"
                                                style="<?php echo e($business->enable_subdomain == 'on' ? 'display:block' : 'display:none'); ?>">
                                                <?php echo e(Form::label('business_subdomain', __('Sub Domain'), ['class' => 'form-label'])); ?>

                                                <div class="input-group">
                                                    <?php echo e(Form::text('subdomain', $business->slug, ['class' => 'form-control', 'placeholder' => __('Enter Domain'), 'readonly'])); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text h-44 py-1"
                                                            id="basic-addon2">.<?php echo e($subdomain_name); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="form-group col-md-12" id="StoreLink">
                                            <?php echo e(Form::label('business_link', __('Business Link'), ['class' => 'form-control-label'])); ?>

                                            <div class="input-group">
                                                <input type="text" value="<?php echo e($business_url); ?>" id="myInput"
                                                    class="form-control d-inline-block" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="myFunction()" id="button-addon2"><i
                                                            class="far fa-copy"></i>
                                                        <?php echo e(__('Copy Link')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="col-12 ">
                                        <button type="submit"
                                            class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                    </div><br><br>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card ">
                                <?php echo e(Form::open(['route' => ['business.custom-js-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="card-body min-296">
                                    <div class="">
                                        <h5 class="mt-3 mb-4"><?php echo e(__('Custom JS and CSS')); ?></h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo e(Form::label('customjs', __('Custom JS'), ['class' => 'form-label '])); ?>

                                                <?php echo e(Form::textarea('customjs', $business->customjs, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Custom JS')])); ?>

                                                <?php $__errorArgs = ['customjs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-about" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-md-12"><br>
                                                <?php echo e(Form::label('customcss', __('Custom CSS'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::textarea('customcss', $business->customcss, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Custom Css')])); ?>

                                                <?php $__errorArgs = ['customcss'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-about" role="alert">
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
                                <div class="card-footer ">
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                    </div><br><br>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <?php echo e(Form::open(['route' => ['business.googlefont-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="card-body">
                                    <div class="">
                                        <h5 class="mt-3 mb-4"><?php echo e(__('Google Fonts')); ?></h5>
                                        <div class="row mt-2 mb-4">
                                            <div class="col-6">
                                                
                                                <!-- <?php echo e(Form::text('google_fonts', $business->google_fonts, ['class' => 'form-control', 'rows' => '3', 'placeholder' => __('Enter Google Fonts')])); ?> -->
                                                <select type="text" name="google_fonts" class="form-control select2">
                                                    <option value=""><?php echo e(__('Select Font')); ?></option>

                                                    <?php $__currentLoopData = \App\Models\Utility::getfonts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $fonts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($k); ?>"
                                                            <?php echo e($business->google_fonts == $k ? 'selected' : ''); ?>>
                                                            <?php if($k == 'TimesNewRoman'): ?>
                                                                Times New Roman
                                                            <?php elseif($k == 'OpenSans'): ?>
                                                                Open Sans
                                                            <?php elseif($k == 'WorkSans'): ?>
                                                                Work Sans
                                                            <?php elseif($k == 'PTSans'): ?>
                                                                PT Sans
                                                            <?php elseif($k == 'ConcertOne'): ?>
                                                                Concert One
                                                            <?php else: ?>
                                                                <?php echo e($k); ?>

                                                            <?php endif; ?>
                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['google_fonts'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-favicon text-xs text-danger"
                                                        role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                    </div><br><br>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <?php echo e(Form::open(['route' => ['business.password-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="card-body">
                                    <div class="">
                                        <h5 class="mt-3 mb-4"><?php echo e(__('Password')); ?></h5>
                                        <div class="row mt-2 mb-4">
                                            <div class="col-6">
                                                
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control" <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="password" id="input-password" placeholder="Password"
                                                        value="<?php echo e($business->password); ?>">
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-password text-danger" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div
                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft float-end">
                                                    <input type="hidden" name="is_password_enabled" value="off">
                                                    <input type="checkbox" data-toggle="switchbutton"
                                                        data-onstyle="primary" name="is_password_enabled"
                                                        id="is_password_enabled"
                                                        <?php echo e(isset($business->enable_password) && $business->enable_password == 'on' ? 'checked="checked"' : ''); ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                    </div><br><br>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <?php echo e(Form::open(['route' => ['business.gdpr-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="mt-3 mb-4 col-6"><?php echo e(__('GDPR Cookies')); ?></h5>
                                        <div class="form-group col-6">
                                            
                                            <div
                                                class="d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft float-end">
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary"
                                                    name="gdpr_cookie" id="gdpr_cookie"
                                                    <?php echo e(isset($business['is_gdpr_enabled']) && $business['is_gdpr_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group gdpr_cookie_text">
                                        <textarea id="btn" type="text" name="cookie_text" class="form-control emojiarea" rows="4"
                                            style="height: auto"
                                            value="<?php echo e(isset($business['gdpr_text']) && $business['gdpr_text'] ? $business['gdpr_text'] : ''); ?>"
                                            placeholder="<?php echo e(isset($business['gdpr_text']) && $business['gdpr_text'] ? $business['gdpr_text'] : ''); ?>"><?php echo e(isset($business['gdpr_text']) && $business['gdpr_text'] ? $business['gdpr_text'] : ''); ?></textarea>
                                    </div>    
                                    <div class="row card-footer ">
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($plan->enable_branding == 'on'): ?>
                        <div id="showbranding">
                            <div class="row">
                                <div class="col-lg-12" id="branding-div">
                                    <div class="card" >
                                        <?php echo e(Form::open(['route' => ['business.branding-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                        <div class="card-body">
                                            <div class="row">
                                                <h5 class="mt-3 mb-4 col-6"><?php echo e(__('Branding')); ?></h5>
                                                <div class="form-group col-6">
                                                    <div
                                                        class="d-flex align-items-center  justify-content-between border-0 mt-3 py-2 borderleft float-end">
                                                        <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary"
                                                            name="branding" id="branding"
                                                            <?php echo e(isset($business['is_branding_enabled']) && $business['is_branding_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group branding_text">
                                                <textarea id = "<?php echo e($stringid . '_branding'); ?>" type="text" name="branding_text" class="form-control emojiarea" rows="4"
                                                    style="height: auto" <?php echo e($business->branding); ?>

                                                    value="<?php echo e(isset($business['branding_text']) && $business['branding_text'] ? $business['branding_text'] : ''); ?>"
                                                    placeholder="<?php echo e(isset($business['branding_text']) && $business['branding_text'] ? $business['branding_text'] : ''); ?>"><?php echo e(isset($business['branding_text']) && $business['branding_text'] ? $business['branding_text'] : ''); ?></textarea> 
                                            </div>    
                                            <div class="row card-footer ">
                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                                </div>
                                            </div>  
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="tab-pane fade <?php if($fromTab=='block-setting'){echo 'active show';} ?>" id="block-setting" role="tabpanel" aria-labelledby="pills-user-tab-4">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo e(Form::open(['route' => ['business.block-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                    <div class="card">
                                        <div class="col-12 pt-2 pb-4 ">
                                            <div class="card-body ml-3">
                                                <ul class="list-group sortable">
                                                    <input type="hidden" name="theme_name"
                                                        value="<?php echo e($card_theme->theme); ?>">
                                                    <input type="hidden" name="order" value="" id="hidden_order">
                                                    <?php for($i = 1; $i < 10; $i++): ?>
                                                        <?php $__currentLoopData = $card_theme->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_key => $order_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($i == $order_value): ?>
                                                                <li class="list-group-item" data-id="<?php echo e($order_key); ?>">
                                                                    <div class="row">
                                                                        <?php if($order_key == 'scan_me'): ?>
                                                                            <div class="col-6 text-xs text-dark">
                                                                                <h6><i class="fas fa-crosshairs">&nbsp;&nbsp;&nbsp;<?php echo e(__('Scan Me')); ?></i></h6>
                                                                            </div>
                                                                        <?php elseif($order_key == 'contact_info'): ?>
                                                                            <div class="col-6 text-xs text-dark">
                                                                                <h6><i class="fas fa-crosshairs">&nbsp;&nbsp;&nbsp;<?php echo e(__('Contact Info')); ?></i></h6>
                                                                            </div>
                                                                        <?php elseif($order_key == 'bussiness_hour'): ?>
                                                                            <div class="col-6 text-xs text-dark">
                                                                                <h6><i class="fas fa-crosshairs">&nbsp;&nbsp;&nbsp;<?php echo e(__('Business Hour')); ?></i></h6>
                                                                            </div>
                                                                        <?php elseif($order_key == 'custom_html'): ?>
                                                                            <div class="col-6 text-xs text-dark">
                                                                                <h6><i class="fas fa-crosshairs">&nbsp;&nbsp;&nbsp;<?php echo e(__('Custom HTML')); ?></i></h6>
                                                                            </div>
                                                                        <?php elseif($order_key == 'branding'): ?>
                                                                            <div class="col-6 text-xs text-dark">
                                                                                <h6><i class="fas fa-crosshairs">&nbsp;&nbsp;&nbsp;<?php echo e(__('Branding')); ?></i></h6>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="col-6 text-xs text-dark">
                                                                                <h6><i class="fas fa-crosshairs">&nbsp;&nbsp;&nbsp;<?php echo e(ucfirst($order_key)); ?></i></h6>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <div class="col-2 text-end">
                                                                            <?php if($order_key != 'description' && $order_key != 'more' && $order_key != 'scan_me'): ?>
                                                                                <div
                                                                                    class="form-check form-switch custom-switch-v1">
                                                                                    <input type="hidden"
                                                                                        name="is_<?php echo e($order_key); ?>_enabled"
                                                                                        value="off">

                                                                                    <input type="checkbox"
                                                                                        class="form-check-input input-primary"
                                                                                        name="is_<?php echo e($order_key); ?>_enabled"
                                                                                        id="is_<?php echo e($order_key); ?><?php echo e($order_key == 'custom_html' ? '11' : ''); ?>_enabled"
                                                                                        <?php echo e(\App\Models\Utility::isEnableBlock($order_key, $business->id) == '1' ? 'checked="checked"' : ''); ?>>

                                                                                    <label class="form-check-label"
                                                                                        for="is_<?php echo e($order_key); ?><?php echo e($order_key == 'custom_html' ? '11' : ''); ?>_enabled"></label>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <p>This is required</p>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endfor; ?>
                                                </ul>
                                                <p class="mt-4">
                                                    <?php echo e(__('Note: You can easily order change of card blocks using drag & drop.')); ?>

                                                </p>
                                            </div>
                                            <div class="card-footer mt-4 ">
                                                <div class="col-12 text-right">
                                                    <button type="submit" class="btn btn-primary me-2 float-end"
                                                        id="btnSubmit"><?php echo e(__('Save changes')); ?></button>
                                                </div>
                                            </div><br><br>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade <?php if($fromTab=='seo-setting'){echo 'active show';} ?>" id="seo-setting" role="tabpanel" aria-labelledby="pills-user-tab-4">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <?php echo e(Form::open(['route' => ['business.seo-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                        <div class="card-body">
                                            <div class="">
                                                <div class="row mt-2 mb-5">
                                                    <div class="col-12">
                                                        <?php echo e(Form::label('meta_keyword', __('Meta Keywords'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('meta_keyword', $business->meta_keyword, ['class' => 'form-control', 'rows' => '3', 'placeholder' => __('Enter Meta Keywords')])); ?>

                                                        <?php $__errorArgs = ['metakeywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-favicon text-xs text-danger"
                                                                role="alert"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-5">
                                                    <div class="col-12">
                                                        <?php echo e(Form::label('meta_description', __('Meta Description'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::textarea('meta_description', $business->meta_description, ['class' => 'form-control', 'rows' => '3', 'placeholder' => __('Enter Meta Description')])); ?>

                                                        <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-favicon text-xs text-danger"
                                                                role="alert"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-google" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('google_analytic', __('Google Analytic'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('google_analytic', $business->google_analytic, ['class' => 'form-control', 'placeholder' => 'UA-XXXXXXXXX-X'])); ?>

                                                            <?php $__errorArgs = ['google_analytic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-google_analytic" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('facebook_pixel_code', __('Facebook Pixel'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('fbpixel_code', $business->fbpixel_code, ['class' => 'form-control', 'placeholder' => 'UA-0000000-0'])); ?>

                                                            <?php $__errorArgs = ['facebook_pixel_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-google_analytic" role="alert">
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
                                        </div>
                                        <div class="card-footer ">
                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </div><br><br>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="tab-pane fade <?php if($fromTab=='file-manager'){echo 'active show';} ?>" id="file-manager" role="tabpanel" aria-labelledby="pills-user-tab-5">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        
                                        <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
<!--                                        <?php echo e(Form::open(['route' => ['business.seo-setting', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                        <div class="card-body">
                                            <div class="">
                                                <div class="row mt-2 mb-5">
                                                    <div class="col-12">
                                                        <?php echo e(Form::label('meta_keyword', __('Meta Keywords'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('meta_keyword', $business->meta_keyword, ['class' => 'form-control', 'rows' => '3', 'placeholder' => __('Enter Meta Keywords')])); ?>

                                                        <?php $__errorArgs = ['metakeywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-favicon text-xs text-danger"
                                                                role="alert"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-5">
                                                    <div class="col-12">
                                                        <?php echo e(Form::label('meta_description', __('Meta Description'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::textarea('meta_description', $business->meta_description, ['class' => 'form-control', 'rows' => '3', 'placeholder' => __('Enter Meta Description')])); ?>

                                                        <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-favicon text-xs text-danger"
                                                                role="alert"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-google" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('google_analytic', __('Google Analytic'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('google_analytic', $business->google_analytic, ['class' => 'form-control', 'placeholder' => 'UA-XXXXXXXXX-X'])); ?>

                                                            <?php $__errorArgs = ['google_analytic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-google_analytic" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('facebook_pixel_code', __('Facebook Pixel'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('fbpixel_code', $business->fbpixel_code, ['class' => 'form-control', 'placeholder' => 'UA-0000000-0'])); ?>

                                                            <?php $__errorArgs = ['facebook_pixel_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-google_analytic" role="alert">
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
                                        </div>
                                        <div class="card-footer ">
                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary me-2 float-end"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </div><br><br>
                                        <?php echo e(Form::close()); ?>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                </div>  
            </div>
        </div>
    <!-- [ Main Content ] end -->
    </div>
    <div class="modal fade" id="socialsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Add Field')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php $__currentLoopData = $businessfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($val != 'Email' && $val != 'Phone'): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card shadow getvalue" value="<?php echo e($val); ?>"
                                        id="<?php echo e($val); ?>" data-id="<?php echo e($val); ?>"
                                        onclick="socialRepeater(this.id)">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="theme-avtar bg-primary">

                                                        <img src="<?php echo e(asset('custom/icon/white/' . $val . '.svg')); ?>"
                                                            alt="image" class="<?php echo e($val); ?>">
                                                    </div>
                                                    <div class="ms-3">
                                                        <?php if($val == 'Web_url'): ?>
                                                            <h5><?php echo e(__('Web Url')); ?></h6>
                                                            <?php else: ?>
                                                                <h5><?php echo e($val); ?></h6>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div id="addnewfield">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="qrdata"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?> 
    <script src="<?php echo e(asset('custom/libs/dropzonejs/min/dropzone.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('custom/js/repeaterInput.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-toggle.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/jquery.qrcode.js')); ?>"></script>
    <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
    
    <script src="<?php echo e(asset('custom/libs/jquery-ui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap-switch-button.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    
    
    <script>
    <?php echo \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')); ?>

  </script>
      <script>
    var route_prefix = "/filemanager";     
          
          
    $('#lfm').filemanager('image', {prefix: route_prefix});
    // $('#lfm').filemanager('file', {prefix: route_prefix});
    
    $('#lfm1').filemanager('image', {prefix: route_prefix});
  
    var lfm = function(id, type, options) {
      let button = document.getElementById(id);

      button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');

          // set the value of the desired input to image url
          target_input.value = file_path;
          target_input.dispatchEvent(new Event('change'));

          // clear previous preview
          target_preview.innerHtml = '';

          // set or change the preview image src
          items.forEach(function (item) {
            let img = document.createElement('img')
            img.setAttribute('style', 'height: 5rem')
            img.setAttribute('src', item.thumb_url)
            target_preview.appendChild(img);
          });

          // trigger change event
          target_preview.dispatchEvent(new Event('change'));
        };
      });
    };

    
   
  </script>
    <script>
        
        var SubcategoryArr = <?php echo json_encode($Subcategory); ?>;
        
        var edit_category_id = <?php echo $category_id; ?>;
        
        var edit_subcategory_id = <?php echo $subcategory_id; ?>;
        
        
        
        
        $(function() {
            $(".sortable").sortable();
            $(".sortable").disableSelection();
            $(".sortable").sortable({
                stop: function() {
                    var order = [];
                    $(this).find('li').each(function(index, data) {
                        order[index] = $(data).attr('data-id');
                    });
                    $('#hidden_order').val(order);
                }
            });
            var block_order = [];
            $(".sortable").find('li').each(function(index, data) {
                block_order[index] = $(data).attr('data-id');
            });
            $('#hidden_order').val(block_order);
        });
    </script>
    <script type="text/javascript">
        var theme = '<?php echo e($card_theme->theme); ?>';
        var theme_path = `<?php echo e(asset('custom/${theme}/icon/')); ?>`;
        var asset_path = `<?php echo e(asset('custom/icon/')); ?>`
        var color = `<?php echo e($business->theme_color); ?>`.substring(0, 6);
        var add_row_no = <?php echo e($no); ?>;
        function getValue(el) {
            //alert(el);
            var data = repeaterInput(el, 'contact', add_row_no, 'inputrow_contact', theme_path, `${theme}`, color,
                asset_path);
            add_row_no = data;
        }
        var row_no = <?php echo e($appointment_no); ?>;

        function appointmentRepeater() {

            var data = repeaterInput('', 'appointment', row_no, 'inputrow_appointment', "", `${theme}`, color, asset_path);
            row_no = data;
        }
        var service_row_no = <?php echo e($service_row_no); ?>;

        function servieRepeater() {
            var data = repeaterInput('', 'service', service_row_no, 'inputrow_service', theme_path, `${theme}`, color,
                asset_path);
            service_row_no = data;
        }

        var testimonials_row_no = <?php echo e($testimonials_row_no); ?>;

        function testimonialRepeater() {
            var data = repeaterInput('', 'testimonial', testimonials_row_no, 'inputrow_testimonials',
                "<?php echo e(asset('custom/img/logo-placeholder-image-2.png')); ?>", `${theme}`, color, asset_path);
            testimonials_row_no = data;
        }

        var socials_row_no = <?php echo e($social_no); ?>;

        function socialRepeater(el) {
            //alert(el);
            var data = repeaterInput(el, 'social_links', socials_row_no, 'inputrow_socials', theme_path, `${theme}`, color,
                asset_path);
            socials_row_no = data;
        }
        $("#is_business_hours_enabled").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            //console.log(enable);
            if (enable == true) {
                $('#business-hours-div').show();
                $('.business-hours-div').show();
                //console.log('dfd');
                $('#showElement').show();
            }
            if (enable == false) {
                $('#showElement').hide();
                $('#business-hours-div').hide();
                $('.business-hours-div').hide();
            }
        }).change();

        $("#is_appoinment_enabled").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            //console.log(enable);
            if (enable == true) {
                //console.log('dfd');
                $('#appointment-div').show();
                $('#showAppoinment').show();
            }
            if (enable == false) {
                $('#appointment-div').hide();
                $('#showAppoinment').hide();
            }
        }).change();

        $("#is_socials_enabled").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            //console.log(enable);
            if (enable == true) {
                //console.log('dfd');
                $('#social-div').show();
                $('.social-div').show();
                $('#showSocials').show();
            }
            if (enable == false) {
                $('#social-div').hide();
                $('#showSocials').hide();
            }
        }).change();

        $("#is_testimonials_enabled").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            //console.log(enable);
            if (enable == true) {
                //console.log('dfd');
                $('#testimonials-div').show();
                $('#showTestimonials').show();
            }
            if (enable == false) {
                $('#testimonials-div').hide();
                $('#showTestimonials').hide();
            }
        }).change();

        $("#is_services_enabled").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            //console.log(enable);
            if (enable == true) {
                //console.log('dfd');
                $('#services-div').show();
                $('#showServices').show();
            }
            if (enable == false) {
                $('#services-div').hide();
                $('#showServices').hide();
            }
        }).change();

        $("#enable_branding").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            // console.log(enable);
            if (enable == true) {
                // console.log('dfd');
                $('#branding-div').show();
                $('#showbranding').show();
            }
            if (enable == false) {
                $('#branding-div').hide();
                $('#showbranding').hide();
            }
        }).change();
        
        $("#is_contacts_enabled").change(function() {
            var $input = $(this);
            var enable = $input.is(":checked");

            //console.log(enable);
            if (enable == true) {
                //console.log('dfd');
                $('#showContact').show();
                $('#showContact_preview').show();
            }
            if (enable == false) {
                $('#showContact').hide();
                $('#showContact_preview').hide();
            }
        }).change();

        var count = document.querySelectorAll('.inputFormRow').length;
        if (count < 3) {
            $('.hideelement').show();
        } else {
            $('.hideelement').hide();
        }
        /*var testinomials_radio_class = 'stars' + testimonials_row_no;
        $(document).on("change", "input[class=" + testinomials_radio_class + "]", function () {
            //alert("hiii");
            var stars_view = $(this).val();
            var stars_class = $(this).attr('class');
            console.log('#' + stars_class);
            $('#' + stars_class).text(stars_view);
            //console.log(color);
        });
        */

        function changeFunction(el) {
            var data_preview_id = $(`#${el}`).data('id');
            var start_time_preview = $(`#${data_preview_id}_start`).val();
            var end_time_preview = $(`#${data_preview_id}_end`).val();
            var time_preview = start_time_preview + '-' + end_time_preview;
            //var is_closed = $(`.${data_preview_id}`).text();
            if ($(`#${data_preview_id}`).prop('checked')) {
                $(`.${data_preview_id}`).text(time_preview);
            }
            //var preview_time = $(`#${el}`).val();
            //$(`.${el}`).text(preview_time);
        }

        function getRadio(el) {
            //var classss = $(el).attr('class');
            var get_val = $(el).val();
            //alert(get_val);
            var get_class = $(el).attr('class');
            $('.' + get_class).text(get_val);
            var span_star = '';
            /*for (let i = 1; i <= 5; i++) {
            if(i <= get_val){
                span_star =  `<i class="text-warning fas fa-star-half-alt"></i>`;
            }
            else{
            span_star = `<i class="fas fa-star"></i>`;
            }
            }
            $('#' + get_class + '_star').html(span_star);*/

            const arr = [
                1,
                2,
                3,
                4,
                5
            ];
            $('#' + get_class + '_star').text('')
            $.each(arr, function(index, value) {
                //console.log(value);
                // Will stop running after "three"
                //return (value !== 3);
                if (value <= get_val) {
                    span_star = `<i class="star-color  fas fa-star"></i>`;
                } else {
                    span_star = `<i class="fa fa-star"></i>`;
                }
                console.log(span_star);
                $('#' + get_class + '_star').append(span_star);
            });
            //console.log(span_star);
        }

        function validURL(str) {
            var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
            return !!pattern.test(str);
        }

        $("input").keyup(function() {
            var id = $(this).attr('id');
            //console.log(id);
            var preview = $(`#${id}`).val();
            $(`#${id}_preview`).text(preview);
        });

        $(".social_href").keyup(function() {
            var id = $(this).attr('id');
            //console.log(id);
            var preview = $(`#${id}`).val();
            var h_preview = validURL(preview);
            //console.log(h_preview);
            if (h_preview == true) {
                $(`#${id}_error_href`).text("");
                $(`#${id}_href_preview`).attr("href", preview);
            } else {
                $(`#${id}_error_href`).text("Please enter valid link");
                $(`#${id}_href_preview`).attr("href", "#");
            }
            //var h_preview = `<?php echo e(url('')); ?>/${preview}`;

        });

        $("textarea").keyup(function() {
            var id = $(this).attr('id');
            //console.log(id);
            var preview = $(`#${id}`).val();
            $(`#${id}_preview`).text(preview);
            $(`.description-div`).show();
            if ($('.description-text').val() == "") {
                $(`.description-div`).hide();
            }
        });

        $(".days").change(function() {
            var day_id = $(this).attr('id');
            //console.log(day_id);
            if ($(this).prop('checked')) {
                var this_attr_id = $(this).attr('id');
                var start_time = $(`#${this_attr_id}_start`).val();
                var end_time = $(`#${this_attr_id}_end`).val();
                if (start_time == '' && end_time == '') {
                    //var time = start_time + '-' + end_time;
                    $(`.${day_id}`).text('00:00');
                    //console.log("empty");
                    //console.log("Checked Box Selected");
                } else {
                    var time = start_time + '-' + end_time;
                    $(`.${day_id}`).text(time);
                }
            } else {
                $(`.${day_id}`).text('closed');
                //console.log("Checked Box deselect");
            }
        });

        function changeTime(el) {
            //alert("hii");
            var time_input = $(`#${el}`).val();
            $(`#${el}_preview`).text(time_input);
        }

        $(document).on('click', 'input[name="theme_color"]', function() {

            var eleParent = $(this).attr('data-theme');
            $('#themefile').val(eleParent);
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
            //console.log(imgpath);
            $('.theme_preview_img').attr('src', imgpath);
            setTimeout(function(e) {
                $('.theme-save').trigger('click');
            }, 200);
        });

        $(document).ready(function() {
            setTimeout(function(e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('#themefile').val(checked.attr('data-theme'));
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
                $('.theme_preview_img').attr('src', checked.attr('data-imgpath'));
                //console.log(checked.attr('data-imgpath'));
            }, 300);
        });

        $(document).on('change', '.domain_click#enable_storelink', function(e) {
            $('#StoreLink').show();
            $('.sundomain').hide();
            $('.domain').hide();
            $('#domainnote').hide();
        });
        $(document).on('change', '.domain_click#enable_domain', function(e) {
            $('.domain').show();
            $('#StoreLink').hide();
            $('.sundomain').hide();
            $('#domainnote').show();
        });
        $(document).on('change', '.domain_click#enable_subdomain', function(e) {
            $('.sundomain').show();
            $('#StoreLink').hide();
            $('.domain').hide();
            $('#domainnote').hide();
        });

        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', "<?php echo e(__('Link copied')); ?>", 'success');
        }

        $(".textboxhover").mouseover(function() {
            $(this).removeClass("border-0");
        }).mouseout(function() {
            $(this).addClass("border-0");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#is_custom_html_enabled').trigger('change');
        });
        $(document).on('change', '#is_custom_html_enabled', function(e) {
            $('.custom_html_text').hide();
            if ($("#is_custom_html_enabled").prop('checked') == true) {
                $('.custom_html_text').show();
            }
        });

        // $(document).ready(function() {
        //     $('#is_branding_enabled').trigger('change');
        // });
        // $(document).on('change', '#is_branding_enabled', function(e) {
        //     $('.branding_text').hide();
        //     if ($("#is_branding_enabled").prop('checked') == true) {
        //         $('.branding_text').show();
        //     }
        // });

        $(".input-text-location").each(function() {
            var textarea = $(this);
            var text = textarea.text();
            var div = $('<div id="temp"></div>');
            div.css({
                "width": "530px"
            });
            div.text(text);
            $('body').append(div);
            var divHeight = $('#temp').height();
            div.remove();
            divHeight += 32;
            this.setAttribute("style", "height:" + divHeight + "px;overflow-y:hidden;");
        }).on("input", function() {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#gdpr_cookie').trigger('change');
        });
        $(document).on('change', '#gdpr_cookie', function(e) {
            $('.gdpr_cookie_text').hide();
            if ($("#gdpr_cookie").prop('checked') == true) {
                $('.gdpr_cookie_text').show();
            }
        });
        $(document).ready(function() {
            $('#branding').trigger('change');
        });
        $(document).on('change', '#branding', function(e) {
            $('.branding_text').hide();
            if ($("#branding").prop('checked') == true) {
                $('.branding_text').show();
            }
        });  

        $(document).on('change', '.domain_click#enable_storelink', function(e) {
            $('#StoreLink').show();
            $('.sundomain').hide();
            $('.domain').hide();
            $('#domainnote').hide();
            $("#enable_storelink").parent().addClass('active');
            $("#enable_domain").parent().removeClass('active');
            $("#enable_subdomain").parent().removeClass('active');
        });
        $(document).on('change', '.domain_click#enable_domain', function(e) {
            $('.domain').show();
            $('#StoreLink').hide();
            $('.sundomain').hide();
            $('#domainnote').show();
            $("#enable_domain").parent().addClass('active');
            $("#enable_storelink").parent().removeClass('active');
            $("#enable_subdomain").parent().removeClass('active');
        });
        $(document).on('change', '.domain_click#enable_subdomain', function(e) {
            $('.sundomain').show();
            $('#StoreLink').hide();
            $('.domain').hide();
            $('#domainnote').hide();
            $("#enable_subdomain").parent().addClass('active');
            $("#enable_domain").parent().removeClass('active');
            $("#enable_domain").parent().removeClass('active');
        });

        $(".color1").click(function() {
            var dataId = $(this).attr("data-id");
            $('#color1-' + dataId).trigger('click');
        });

        $('#download-qr').on('click',function(){  
            var qrcode = '<?php echo e($business->slug); ?>';          
            $.ajax({
                    url: '<?php echo e(route('download.qr')); ?>',
                    type: 'GET',
                    data: {
                        "qrData": qrcode,
                    },                    
                    success: function (data) { 
                     
                       if(data.success==true)
                       {
                            $('#qrdata').html(data.data);
                       }  
                       setTimeout(() => {
                            // canvasdata();
                            var element = document.querySelector("#qrdata");
                            saveCapture(element)
                            $("#qrdata").html('');
                        }, 200);
                                      
                    }
                });
        });

        function download(url){
            var a = $("<a style='display:none' id='js-downloder'>")
            .attr("href", url)
            .attr("download", "<?php echo e($business->slug); ?>")
            .appendTo("body");
            a[0].click();
            a.remove();
        }

        function saveCapture(element) {
        html2canvas(element).then(function(canvas) {
            download(canvas.toDataURL("image/png"));
        })
        }

        function canvasdata() {
            html2canvas($('#qrdata'), 
            {
            onrendered: function (canvas) {
                var a = document.createElement('a');
                // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
                a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
                a.download = 'somefilename.jpg';
                a.click();
            }
            });

            // var element = document.getElementById('qrdata');      
                            
            // var opt = {
            //     // margin: 0.3,
            //     filename: 'dsa',
            //     image: {type: 'jpeg', quality: 1},
            //     // html2canvas: {scale: 4, dpi: 72, letterRendering: true},
            //     // jsPDF: {unit: 'in', format: 'A4'}
            // };
            // html2pdf().set(opt).from(element).toImg().save();
        }
        // $('#download-qr').on('click',function(){
        //   var canvas =  $(".qrcode").children("canvas").addClass( "data");
        //   var utl = this.href = $('.data')[0].toDataURL();
          
        //     this.download = '<?php echo e($business->slug); ?>';
        // });
        
        $( document ).ready(function() {
            $(".emojiarea").emojioneArea();   
            var slug = '<?php echo e($business->slug); ?>';
            var url_link = `<?php echo e(url("/")); ?>/${slug}`;
            $(`.qr-link`).text(url_link);
            $('.qrcode').qrcode(url_link);
            
//            console.log($('.qrcode').qrcode(url_link));
            
            
            get_business_Subcategory(edit_category_id);
            
            
            
            
            $("#category_id").select2({disabled:'readonly'});
            
            $("#subcategory_id").select2({disabled:'readonly'});
            
            
            
            
            
            
            
            
            
        });
        
        
        function get_business_Subcategory(category_id){
//            alert(id);
            
             
            
//            var CategoryVal = $("#category_id").val();    
            var jsonArr = [{ id: '', text: 'Select a Occupation Subcategory' }];
            for(var key in SubcategoryArr) {
                for (var key1 in SubcategoryArr[key]) {
                    
                    
                    if(SubcategoryArr[key][key1].category_id==category_id){   
                        
//                         console.log(jsonArr);
                        
                        jsonArr.push({
                            id: SubcategoryArr[key][key1].subcategory_id,
                            text: SubcategoryArr[key][key1].name,
                        });
                    }                    
                }
             }

//            console.log(jsonArr);

            $("#subcategory_id").html("");
            $("#subcategory_id").select2({
                data: jsonArr,                
                placeholder: 'Select a Occupation Subcategory',
            });
            
            if (typeof edit_subcategory_id !== 'undefined' ){
                $('#subcategory_id').val(edit_subcategory_id).trigger('change');
            }
            
            
            }
        
//        $(document).ready(function() {
//            $("#category_id").select2({                 
//                placeholder: 'Select a Occupation Category'
//            }); 
//            
//            $("#subcategory_id").select2({                 
//                placeholder: 'Select a Occupation Subcategory'
//            });
//            
//        });
        
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
   
   
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/business/edit.blade.php ENDPATH**/ ?>