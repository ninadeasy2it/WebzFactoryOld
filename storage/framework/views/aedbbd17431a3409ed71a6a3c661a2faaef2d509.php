<?php
    $social_no = 1;
    $appointment_no = 0;
    $service_row_no = 0;
    $testimonials_row_no = 0;
    // $path = isset($business->banner) && !empty($business->banner) ? asset(Storage::url('card_banner/' . $business->banner)) : asset('custom/img/placeholder-image.jpg');
    $no = 1;
    $stringid = $business->id;
    $is_enable = false;
    $is_enable_appoinment = false;
    $is_enable_service = false;
    $is_enable_testimonials = false;
    $is_enable_sociallinks = false;
    $is_custom_html_enable = false;
    $custom_html = $business->custom_html_text;
    $is_branding_enabled = false;
    $branding = $business->branding_text;
    $is_gdpr_enabled = false;
    $gdpr_text = $business->gdpr_text;
    $card_theme = json_decode($business->card_theme);
    $banner=\App\Models\Utility::get_file('card_banner/');
    $image=\App\Models\Utility::get_file('testimonials_images/');
    $s_image=\App\Models\Utility::get_file('service_images/');

    if (!is_null($business_hours) && !is_null($businesshours)) {
        $businesshours['is_enabled'] == '1' ? ($is_enable = true) : ($is_enable = false);
    }

    if (!is_null($appoinment_hours) && !is_null($appoinment)) {
        $appoinment['is_enabled'] == '1' ? ($is_enable_appoinment = true) : ($is_enable_appoinment = false);
    }

    if (!is_null($services_content) && !is_null($services)) {
        $services['is_enabled'] == '1' ? ($is_enable_service = true) : ($is_enable_service = false);
    }

    if (!is_null($testimonials_content) && !is_null($testimonials)) {
        $testimonials['is_enabled'] == '1' ? ($is_enable_testimonials = true) : ($is_enable_testimonials = false);
    }

    if (!is_null($social_content) && !is_null($sociallinks)) {
        $sociallinks['is_enabled'] == '1' ? ($is_enable_sociallinks = true) : ($is_enable_sociallinks = false);
    }

    if(!is_null($custom_html) && !is_null($customhtml)){       
        $customhtml->is_custom_html_enabled == '1' ? $is_custom_html_enable = true : $is_custom_html_enable = false;
    }
    if(!is_null($business->is_branding_enabled) && !is_null($business->is_branding_enabled)){   
        (!empty($business->is_branding_enabled) && $business->is_branding_enabled == "on") ? $is_branding_enabled = true : $is_branding_enabled = false;
    }
    else {
        
        $is_branding_enabled=false;
    }
    if (!is_null($business->is_gdpr_enabled) && !is_null($business->is_gdpr_enabled)) {
        !empty($business->is_gdpr_enabled) && $business->is_gdpr_enabled == 'on' ? ($is_gdpr_enabled = true) : ($is_gdpr_enabled = false);
    }

    if (isset($color)) {
        $business->theme_color = $color;
    }
    $color = substr($business->theme_color, 0, 6);
    $SITE_RTL = Cookie::get('SITE_RTL');
    if($SITE_RTL == ''){
        $SITE_RTL = 'off';
    }
?>
<!DOCTYPE html>
<html  dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($business->title); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="author" content="<?php echo e($business->title); ?>">
    <meta name="keywords" content="<?php echo e($business->meta_keyword); ?>">
    <meta name="description" content="<?php echo e($business->meta_description); ?>">
    <?php if(isset($is_slug)): ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme6/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme6/modal/bootstrap.min.css')); ?>">
        <script src="<?php echo e(asset('custom/theme6/modal/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('custom/theme6/modal/bootstrap.min.js')); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme6/fontawesome-free/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('custom/css/emojionearea.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/theme6/css/styles/' . $business->theme_color . '/style.css')); ?>">
    <?php if(isset($is_slug)): ?>
        <?php if($business->google_fonts != 'Default' && isset($business->google_fonts)): ?>
            <style>
                @import  url('<?php echo e(\App\Models\Utility::getvalueoffont($business->google_fonts)['link']); ?>');


                :root {
                    --Strawford: '<?php echo e(strtok(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], ',')); ?>', <?php echo e(substr(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], strpos(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], ',') + 1)); ?>;
                }
            </style>
        <?php endif; ?>
    <?php endif; ?>
    <style type="text/css">
        <?php echo e($business->customcss); ?> .vCard {
            margin: 10px 0;
            border-radius: 20px;
        }

        html.modal-open .vCard {
            filter: blur(10px);
        }

        html.modal-open .modal-backdrop.in {
            background: #b9b9b9;
        }
    </style>
</head>

<body>
    <div class="wrapper" id="boxes">
        <div class="vCard">
            <div class="vCard-header">
                <div class="bg-white overflow-hidden">
                    <div class="banner-image">
                        
                        <img src="<?php echo e(isset($business->banner) && !empty($business->banner) ? $banner . '/' . $business->banner  : asset('custom/img/placeholder-image.jpg')); ?>" id="banner_preview" alt="fs">
                    </div>
                    <div class="vcard-description">
                        <div class="profile-left">
                            <h1 id="<?php echo e($stringid . '_title'); ?>_preview" class="text-black"><?php echo e($business->title); ?></h1>
                            <h6 id="<?php echo e($stringid . '_designation'); ?>_preview" class="text-black"><?php echo e($business->designation); ?></h6>
                            <p id="<?php echo e($stringid . '_subtitle'); ?>_preview"><?php echo e($business->sub_title); ?></p>
                        </div>
                    </div>
                    <?php $j = 1; ?>
                    <?php $__currentLoopData = $card_theme->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_key => $order_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($j == $order_value): ?>
                            <?php if($order_key == 'description'): ?>
                                <div class="pb-4 text-center vcard-description">
                                    <p id="<?php echo e($stringid . '_desc'); ?>_preview"><?php echo e($business->description); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if($order_key == 'social'): ?>
                                <div class="card-contact section-border py-3" id="social-div">
                                    <div class="container-lg ">
                                        <div class="row justify-content-center" id="inputrow_socials_preview">
                                            <?php $__currentLoopData = $social_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key => $social_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $social_val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key1 => $social_val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($social_key1 != 'id'): ?>
                                                        <div class="col-2">
                                                            <div class="image-icon">
                                                                <a href="<?php echo e($social_val1); ?>" target="_blank">
                                                                    <img src="<?php echo e(asset('custom/theme6/icon/' . $color . '/social/' . strtolower($social_key1) . '.svg')); ?>"
                                                                        alt="<?php echo e($social_key1); ?>" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                            <?php if($order_key == 'contact_info'): ?>
                                <div class="card-contact p-0" id="showContact_preview">
                                    <ul class="contact-name" id="inputrow_contact_preview">
                                        <?php if(!is_null($contactinfo_content) && !is_null($contactinfo)): ?>
                                            <?php if(isset($contactinfo['is_enabled']) && $contactinfo['is_enabled'] == '1'): ?>
                                                <?php $__currentLoopData = $contactinfo_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key1 == 'Phone'): ?>
                                                            <?php $href = 'tel:'.$val1; ?>
                                                        <?php elseif($key1 == 'Email'): ?>
                                                            <?php $href = 'mailto:'.$val1; ?>
                                                        <?php elseif($key1 == 'Address'): ?>
                                                            <?php $href = ''; ?>
                                                        <?php else: ?>
                                                            <?php $href = $val1 ?>
                                                        <?php endif; ?>
                                                        <?php if($key1 != 'id'): ?>
                                                            <li class="d-flex align-items-center justify-content-start"
                                                                id="contact_<?php echo e($loop->parent->index + 1); ?>">
                                                                <div class="contact-text">
                                                                    <span><?php echo e(__($key1)); ?></span>
                                                                    <?php if($key1 == 'Address'): ?>
                                                                        <?php $__currentLoopData = $val1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($key2 == 'Address_url'): ?>
                                                                                <?php $href = $val2; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <a href="<?php echo e($href); ?>" target="_blank">
                                                                            <?php $__currentLoopData = $val1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($key2 == 'Address'): ?>
                                                                                    <h4
                                                                                        id="<?php echo e($key1 . '_' . $no); ?>_preview">
                                                                                        <?php echo e($val2); ?></h4>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php if($key1 == 'Whatsapp'): ?>
                                                                            <a href="<?php echo e(url('https://wa.me/' . $href)); ?>"
                                                                                target="_blank">
                                                                            <?php else: ?>
                                                                                <a href="<?php echo e($href); ?>"
                                                                                    target="_blank">
                                                                        <?php endif; ?>
                                                                        <h4 id="<?php echo e($key1 . '_' . $no); ?>_preview">
                                                                            <?php echo e($val1); ?></h4>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="card-border"></div>
                            <?php endif; ?>
                            <?php if($order_key == 'appointment'): ?>
                                <div class="card-contact section-radius" id="appointment-div">
                                    <div class="">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-start">
                                                <div class="contact-text">
                                                    <h3 class="theme-text"> <span> <?php echo e(__('Make an')); ?> </span>
                                                        <?php echo e(__('appointment')); ?></h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-center card-business-hours">
                                        <form action="" class="datepicker-form">
                                            <div class="date-click d-flex ">
                                                <fieldset class="d-flex align-items-center w-100">
                                                    <div class="lable-custom">
                                                        <label for="input_from"
                                                            class="Date appointment-lable"><?php echo e(__('Date')); ?></label>
                                                    </div>
                                                    <div class="radio-custom date-input">
                                                        <div class="">
                                                            <input type="text" 
                                                                class="datepicker_min text-center"
                                                                placeholder="<?php echo e(__('Pick a Date')); ?>">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="text-center pl-3 ">
                                                <span class="text-danger text-center h5 span-error-date"
                                                    style="margin-left: 78px;"></span>
                                            </div>
                                            <div class="hour-click d-flex ">
                                                <div class="lable-custom">
                                                    <label for="input_from"
                                                        class="radio-label appointment-lable"><?php echo e(__('Hour')); ?></label>
                                                </div>
                                                <div class="radio-custom" id="inputrow_appointment_preview">
                                                    <?php $radiocount = 1; ?>
                                                    <?php if(!is_null($appoinment_hours)): ?>
                                                        <?php $__currentLoopData = $appoinment_hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="radio pr-8"
                                                                id="<?php echo e('appointment_' . $appointment_no); ?>">
                                                                <input id="radio-<?php echo e($radiocount); ?>" name="time"
                                                                    type="radio"
                                                                    data-id="<?php if(!empty($hour->start)): ?> <?php echo e($hour->start); ?> <?php else: ?> 00:00 <?php endif; ?>-<?php if(!empty($hour->end)): ?> <?php echo e($hour->end); ?> <?php else: ?> 00:00 <?php endif; ?>"
                                                                    class="app_time">
                                                                <label for="radio-<?php echo e($radiocount); ?>"
                                                                    class="radio-label"><span
                                                                        id="appoinment_start_<?php echo e($appointment_no); ?>_preview">
                                                                        <?php if(!empty($hour->start)): ?>
                                                                            <?php echo e($hour->start); ?>

                                                                        <?php else: ?>
                                                                            00:00
                                                                        <?php endif; ?>
                                                                    </span> - <span
                                                                        id="appoinment_end_<?php echo e($appointment_no); ?>_preview">
                                                                        <?php if(!empty($hour->end)): ?>
                                                                            <?php echo e($hour->end); ?>

                                                                        <?php else: ?>
                                                                            00:00
                                                                        <?php endif; ?>
                                                                    </span></label>
                                                            </div>
                                                            <?php
                                                                $radiocount++;
                                                                $appointment_no++;
                                                            ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="text-center pl-3">
                                                <span class="text-danger text-center h5 span-error-time"
                                                    style="margin-left: 78px;"></span>
                                            </div>
                                            <div class="make-an-appointment d-flex">
                                                <div class="lable-custom"></div>
                                                <div class="make-an-appointment-btn">
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#appointment-modal"
                                                        class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100">
                                                        <img src="<?php echo e(asset('custom/theme6/icon/white/calender-white.svg')); ?>"
                                                            alt="calender-black" class="img-fluid">
                                                        <h4><?php echo e(__('Make an appointment')); ?></h4>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                            <?php if($order_key == 'testimonials'): ?>
                                <div class="card-contact " id="testimonials-div">
                                    <div class="">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-start m-0">
                                                <div class="contact-text">
                                                    <h3> <span> </span> <?php echo e(__('Testimonials')); ?></h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-center card-business-hours pb-0">
                                        <div class="container-lg">
                                            <div class="row" id="inputrow_testimonials_preview">
                                                <?php
                                                    $t_image_count = 0;
                                                    $rating = 0;
                                                ?>
                                                <?php $__currentLoopData = $testimonials_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $testi_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-6 pr-8 pl-0 res-pr-0"
                                                        id="testimonials_<?php echo e($testimonials_row_no); ?>">
                                                        <div class="service-card testimonials-card mb-0 pb-0">
                                                            <div class="service-card-img ">
                                                                
                                                                <img id="<?php echo e('t_image'.$t_image_count.'_preview'); ?>" src="<?php echo e(!empty($testi_content->image) ? $image . '/' . $testi_content->image : $image . 'testimonials_images/'); ?>"alt="user" class="img-fluid">    
                                                            </div>
                                                            <div class="service-card-heading testimonial-card-heading">
                                                                <h3 class="text-dark">
                                                                    <span
                                                                        class="<?php echo e('stars' . $testimonials_row_no); ?>"><?php echo e($testi_content->rating); ?></span>/5
                                                                </h3>

                                                                <?php
                                                                    if (!empty($testi_content->rating)) {
                                                                        $rating = (int) $testi_content->rating;
                                                                        $overallrating = $rating;
                                                                    } else {
                                                                        $overallrating = 0;
                                                                    }
                                                                ?>
                                                                <div class="star_color d-flex align-items-center justify-content-center"
                                                                    id="stars<?php echo e($testimonials_row_no); ?>_star">
                                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if($overallrating < $i): ?>
                                                                            <?php if(is_float($overallrating) && round($overallrating) == $i): ?>
                                                                                <i
                                                                                    class="star-color fas fa-star-half-alt"></i>
                                                                            <?php else: ?>
                                                                                <i class="fa fa-star"
                                                                                    style="color: #8a8080 !important;"></i>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <i class="star-color fas fa-star"></i>
                                                                        <?php endif; ?>
                                                                    <?php endfor; ?>
                                                                </div>
                                                                <p
                                                                    id="testimonial_description_<?php echo e($testimonials_row_no); ?>_preview">
                                                                    <?php echo e($testi_content->description); ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $t_image_count++;
                                                        $testimonials_row_no++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                            <?php if($order_key == 'bussiness_hour'): ?>
                                <div class="card-contact section-radius business-hours-div">
                                    <div class="">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-center">
                                                <div class="contact-text">
                                                    <h3><?php echo e(__('Business Hours')); ?></h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-business-hours business-hours-div">
                                        <ul>
                                            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <p><?php echo e(__($day)); ?> :<span class="days_<?php echo e($k); ?>">
                                                            <?php if(isset($business_hours->$k) && $business_hours->$k->days == 'on'): ?>
                                                                <span
                                                                    class="days_<?php echo e($k); ?>_start"><?php echo e(!empty($business_hours->$k->start_time) && isset($business_hours->$k->start_time) ? $business_hours->$k->start_time : '00:00'); ?></span>
                                                                - <span
                                                                    class="days_<?php echo e($k); ?>_end"><?php echo e(!empty($business_hours->$k->end_time) && isset($business_hours->$k->end_time) ? $business_hours->$k->end_time : '00:00'); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e(__('Closed')); ?>

                                                            <?php endif; ?>
                                                        </span></p>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-border business-hours-div"></div>
                            <?php endif; ?>
                            <?php if($order_key == 'service'): ?>
                                <div id="services-div">
                                    <div class="card-contact ">
                                        <div class="">
                                            <ul>
                                                <li class="d-flex align-items-center justify-content-start m-0">
                                                    <div class="contact-text">
                                                        <h3> <?php echo e(__('Services')); ?></h3>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-contact pt-4 ">
                                        <div class="container-lg">
                                            <div class="row" id="inputrow_service_preview">
                                                <?php $image_count = 0; ?>
                                                <?php $__currentLoopData = $services_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"
                                                        id="services_<?php echo e($service_row_no); ?>">
                                                        <div class="service-card pb-3">
                                                            <div class="service-card-img">
                                                                

                                                                <img id="<?php echo e('s_image'.$image_count.'_preview'); ?>" src="<?php echo e(!empty($content->image) ? $s_image . '/' . $content->image : $s_image . 'service_images/'); ?>"alt="image" class="img-fluid">
                                                            </div>
                                                            <div class="service-card-heading">
                                                                <h3
                                                                    id="<?php echo e('title_' . $service_row_no . '_preview'); ?>">
                                                                    <?php echo e($content->title); ?>

                                                                </h3>
                                                                <p
                                                                    id="<?php echo e('description_' . $service_row_no . '_preview'); ?>">
                                                                    <?php echo e($content->description); ?>

                                                                </p>
                                                                <?php if(!empty($content->purchase_link)): ?>
                                                                <div class="card-footer justify-content-center pb-0">
                                                                    <a href="<?php echo e(url($content->purchase_link)); ?>" class="text-white text-lg" target="_blank">
                                                                        <p id="<?php echo e('link_title_'.$service_row_no.'_preview'); ?>" class="text-white text-lg">
                                                                            <?php echo e($content->link_title); ?><i class="fas fa-angle-double-right text-white"></i>
                                                                        </p>
                                                                    </a>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $image_count++;
                                                        $service_row_no++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                            <?php if($order_key == 'more'): ?>
                                <div class="card-contact section-radius">
                                    <div class="">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-start">
                                                <div class="contact-text">
                                                    <h3> <span> </span> <?php echo e(__('More')); ?></h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-contact pt-0 pl-0 pr-0 pb-2">
                                        <div class="text-center card-business-hours p-0">
                                            <div class="make-an-appointment d-flex mb-3">
                                                <div class="w-100">
                                                    <button type="button"
                                                        class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100"
                                                        onclick="location.href = '<?php echo e(route('bussiness.save', $business->slug)); ?>'">
                                                        <img src="<?php echo e(asset('custom/theme6/icon/white/folder-white.svg')); ?>"
                                                            alt="folder" class="img-fluid">
                                                        <h4><?php echo e(__('Save card')); ?></h4>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="make-an-appointment d-flex mb-3">
                                                <div class="w-100">
                                                    <button type="button"
                                                        class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100"
                                                        data-toggle="modal" data-target="#myModal">
                                                        <img src="<?php echo e(asset('custom/theme6/icon/white/share-white.svg')); ?>"
                                                            alt="share" class="img-fluid">
                                                        <h4><?php echo e(__('Share our card')); ?></h4>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="make-an-appointment d-flex mb-3">
                                                <div class="w-100">
                                                    <button type="button"
                                                        class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100"
                                                        data-toggle="modal" data-target="#mycontactModal">
                                                        <img src="<?php echo e(asset('custom/theme6/icon/white/Phone.svg')); ?>"
                                                            alt="share" class="img-fluid">
                                                        <h4><?php echo e(__('Contact')); ?></h4>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-border"></div>
                            <?php endif; ?>
                            <?php if($order_key == 'custom_html'): ?>
                                
                                    <div id="<?php echo e($stringid . '_chtml'); ?>_preview" class="custom_html_text">
                                        <?php echo stripslashes($custom_html); ?>

                                    </div>
                                
                            <?php endif; ?>
                            <?php
                                $j = $j + 1;
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($plan->enable_branding == 'on'): ?>
                        <?php if($is_branding_enabled): ?>   
                            <div class=" text-center">
                                <div id="is_branding_enabled" class="is_branding_enable">
                                <h6 id="<?php echo e($stringid.'_branding'); ?>_preview" class="branding_text"><?php echo e($business->branding_text); ?></h6></div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($is_slug)): ?>
                        <?php if($is_gdpr_enabled): ?>
                            
                            <script type="text/javascript">
                                var defaults = {
                                    'messageLocales': {
                                        /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                                        'en': "<?php echo e($gdpr_text); ?>"
                                    },
                                    'buttonLocales': {
                                        'en': 'Ok'
                                    },
                                    'cookieNoticePosition': 'bottom',
                                    'learnMoreLinkEnabled': false,
                                    'learnMoreLinkHref': '/cookie-banner-information.html',
                                    'learnMoreLinkText': {
                                        'it': 'Saperne di più',
                                        'en': 'Learn more',
                                        'de': 'Mehr erfahren',
                                        'fr': 'En savoir plus'
                                    },
                                    'buttonLocales': {
                                        'en': 'Ok'
                                    },
                                    'expiresIn': 30,
                                    'buttonBgColor': '#d35400',
                                    'buttonTextColor': '#fff',
                                    'noticeBgColor': '#051c4b',
                                    'noticeTextColor': '#fff',
                                    'linkColor': '#009fdd'
                                };
                            </script>
                            <script src="<?php echo e(asset('custom/js/cookie.notice.js')); ?>"></script>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade appointment-modal" id="appointment-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <h4 class="modal-title"><?php echo e(__('Make Appointment')); ?></h4>
                        <button type="button" class="back-btn d-flex align-items-center justify-content-center"
                            data-dismiss="modal">
                            <img src="<?php echo e(asset('custom/theme6/icon/close.svg')); ?>" alt="back"
                                class="img-fluid">
                        </button>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form class="appointment-form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><?php echo e(__('Name')); ?>:</label>
                            <input type="text" name="name" placeholder="<?php echo e(__('Enter your name')); ?>"
                                class="form-control app_name" id="recipient-name">
                            <div class="">
                                <span class="text-danger  h5 span-error-name"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><?php echo e(__('Email')); ?>:</label>
                            <input type="email" name="email" placeholder="<?php echo e(__('Enter your email')); ?>"
                                class="form-control app_email" id="recipient-name">
                            <div class="">
                                <span class="text-danger  h5 span-error-email"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><?php echo e(__('Phone')); ?>:</label>
                            <input type="text" name="phone" placeholder="<?php echo e(__('Enter your phone no.')); ?>"
                                class="form-control app_phone" id="recipient-name">
                            <div class="">
                                <span class="text-danger  h5 span-error-phone"></span>
                            </div>
                        </div>
                        <div class="form-btn-group">
                            <button type="button" class="btn form-btn--close"
                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="button" class="btn form-btn--submit"
                                id="makeappointment"><?php echo e(__('Make Appointment')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade qr-modal" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <button type="button" class="back-btn d-flex align-items-center justify-content-center"
                            data-dismiss="modal">
                            <img src="<?php echo e(asset('custom/theme6/icon/back.svg')); ?>" alt="back"
                                class="img-fluid">
                        </button>
                        <h4 class="modal-title"><?php echo e(__('Share this card')); ?></h4>
                        <button type="button" class="logout-btn">
                            
                        </button>
                    </div>
                </div>
                <div class="modal-body border-0">
                    <div class="modal-body-section text-center">
                        <div class="qr-main-image">
                            <div class="qr-code-border">
                                <img src="<?php echo e(asset('custom/theme5/icon/left-top.svg')); ?>" alt="left-top"
                                    class="img-fluid left-top-border">
                                <img src="<?php echo e(asset('custom/theme5/icon/left-bottom.svg')); ?>" alt="left-bottom"
                                    class="img-fluid left-bottom-border">
                                <img src="<?php echo e(asset('custom/theme5/icon/right-top.svg')); ?>" alt="right-top"
                                    class="img-fluid right-top-border">
                                <img src="<?php echo e(asset('custom/theme5/icon/right-bottom.svg')); ?>" alt="right-bottom"
                                    class="img-fluid right-bottom-border">
                            </div>
                            <div class="qrcode"></div>
                        </div>
                        <div class="text">
                            <p>
                                <?php echo e(__('Point your camera at the QR code, or visit')); ?> <span
                                    class="qr-link text-center mr-2"></span>
                            </p>
                        </div>
                        <div class="text">
                            <p class="mb-0">
                                <?php echo e(__('Or check my social channels')); ?>

                            </p>
                        </div><br>
                        <div class="w-100 d-flex align-items-center justify-content-center container" id="Demo"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal appointment-modal" id="mycontactModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <h4 class="modal-title"><?php echo e(__('Make Contact')); ?></h4>
                        <button type="button" class="back-btn d-flex align-items-center justify-content-center"
                            data-dismiss="modal">
                            <img src="<?php echo e(asset('custom/theme1/icon/' . $color . '/close.svg')); ?>" alt="back"
                                class="img-fluid">
                        </button>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form action="<?php echo e(route('contacts.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><?php echo e(__('Name')); ?>:</label>
                            <input type="text" name="name" placeholder="<?php echo e(__('Enter your name')); ?>"
                                class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><?php echo e(__('Email')); ?>:</label>
                            <input type="email" name="email" placeholder="<?php echo e(__('Enter your email')); ?>"
                                class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><?php echo e(__('Phone')); ?>:</label>
                            <input type="text" name="phone" placeholder="<?php echo e(__('Enter your phone no.')); ?>"
                                class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><?php echo e(__('Message')); ?>:</label>
                            <textarea name="message" placeholder="<?php echo e(__('Enter your Message.')); ?>" class="form-control emojiarea" id="recipient-name"></textarea>
                        </div>
                        <input type="hidden" name="business_id" value="<?php echo e($business->id); ?>">
                        <div class="form-btn-group">
                            <button type="button" class="btn form-btn--close"
                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn form-btn--submit"><?php echo e(__('Make Contact')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal appointment-modal" id="passwordmodel" role="dialog" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <h4 class="modal-title mt-2"><?php echo e(__('Enter Password')); ?></h4>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form class="appointment-form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><?php echo e(__('Password')); ?>:</label>
                            <input type="password" name="Password" placeholder="<?php echo e(__('Enter password')); ?>"
                                class="form-control password_val" id="recipient-name" placeholder="Password">
                            <div class="">
                                <span class="text-danger  h5 span-error-password"></span>
                            </div>
                        </div>
                        <div class="form-btn-group ">
                            <button type="button"
                                class="btn form-btn--submit password-submit"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($is_slug)): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php endif; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js"></script>
    <script src="<?php echo e(asset('custom/js/jquery.qrcode.js')); ?>"></script>
    <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
    <script src="<?php echo e(asset('custom/js/emojionearea.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/socialSharing.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/socialSharing.min.js')); ?>"></script>
    <script type="text/javascript">
        $('#Demo').socialSharingPlugin({
            urlShare: window.location.href,
            description: $('meta[name=description]').attr('content'),
            title: $('title').text()
        })
    </script>
    <script>
        $( document ).ready(function() {
            var date = new Date();             
            $('.datepicker_min').pickadate({
            min: date,                        
            })
        });
        let ispassword;
        var ispassenable = '<?php echo e($business->enable_password); ?>';

        var business_password = '<?php echo e($business->password); ?>';
        if (ispassenable == 'on') {
            $('.password-submit').click(function() {
                ispassword = 'true';
                passwordpopup('true');
            });

            function passwordpopup(type) {

                if (type == 'false') {
                    $('#passwordmodel').modal('show');
                    $('html').addClass('modal-open');
                    $('#passwordmodel').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                } else {
                    var password_val = $('.password_val').val();
                    if (password_val == business_password) {
                        $('#passwordmodel').modal('hide');
                        $('html').removeClass('modal-open');
                    } else {
                        $(`.span-error-password`).text("<?php echo e(__('*Please enter correct password')); ?>");
                        passwordpopup('false');

                    }
                }
            }
            if (ispassword == undefined) {
                passwordpopup('false');
            }

        }
        $(document).ready(function() {
            $(".emojiarea").emojioneArea(); 
            $(`.span-error-date`).text("");
            $(`.span-error-time`).text("");
            $(`.span-error-name`).text("");
            $(`.span-error-email`).text("");
            var slug = '<?php echo e($business->slug); ?>';
            var url_link = `<?php echo e(url('/')); ?>/${slug}`;
            $(`.qr-link`).text(url_link);
            $('.qrcode').qrcode({
                width: 200,
                height: 200,
                text: url_link
            });
            var time = $('.time-dropdown-sec li').first().text();
            $('.time-dropdown span').text(time);
        });

        $(`.rating_preview`).attr('id');
        var from_$input = $('#input_from').pickadate(),
            from_picker = from_$input.pickadate('picker')

        var to_$input = $('#input_to').pickadate(),
            to_picker = to_$input.pickadate('picker')

        var is_enabled = "<?php echo e($is_enable); ?>";
        if (is_enabled) {
            $('.business-hours-div').show();
        } else {
            $('.business-hours-div').hide();
        }


        var is_enable_appoinment = "<?php echo e($is_enable_appoinment); ?>";
        if (is_enable_appoinment) {
            $('#appointment-div').show();
        } else {
            $('#appointment-div').hide();
        }

        var is_enable_service = "<?php echo e($is_enable_service); ?>";
        if (is_enable_service) {
            $('#services-div').show();
        } else {
            $('#services-div').hide();
        }

        var is_enable_testimonials = "<?php echo e($is_enable_testimonials); ?>";
        if (is_enable_testimonials) {
            $('#testimonials-div').show();
        } else {
            $('#testimonials-div').hide();
        }


        var is_enable_sociallinks = "<?php echo e($is_enable_sociallinks); ?>";
        if (is_enable_sociallinks) {
            $('#social-div').show();
        } else {
            $('#social-div').hide();
        }

        var is_custom_html_enable = "<?php echo e($is_custom_html_enable); ?>";      
        if(is_custom_html_enable){
            $('.custom_html_text').show();
        }else{
            $('.custom_html_text').hide();
        }
        
        var is_branding_enable = "<?php echo e($is_branding_enabled); ?>";      
        if(is_branding_enable){
            $('.branding_text').show();
        }else{
            $('.branding_text').hide();
        }

        $('.time-dropdown-sec').click(function() {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.time-dropdown-menu').slideToggle(300);
        });
        $('.time-dropdown-sec').focusout(function() {
            $(this).removeClass('active');
            $(this).find('.time-dropdown-menu').slideUp(300);
        });
        $('.time-dropdown-sec .time-dropdown-menu li').click(function() {
            $(this).parents('.time-dropdown-sec').find('span').text($(this).text());
            $(this).parents('.time-dropdown-sec').find('input').attr('value', $(this).attr('id'));
        });

        $(`#makeappointment`).click(function() {
            var name = $(`.app_name`).val();
            var email = $(`.app_email`).val();
            var date = $(`.datepicker_min`).val();
            var time = $("input[type='radio']:checked").data('id');
            var phone = $(`.app_phone`).val();
            var business_id = '<?php echo e($business->id); ?>';

            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }

            $(`.span-error-date`).text("");
            $(`.span-error-time`).text("");
            $(`.span-error-name`).text("");
            $(`.span-error-email`).text("");

            if (date == "") {
                $(`.span-error-date`).text("<?php echo e(__('*Please choose date')); ?>");
                $("[data-dismiss=modal]").trigger({
                    type: "click"
                });
            } else if (time.length < 1) {
                $(`.span-error-time`).text("<?php echo e(__('*Please choose time')); ?>");
                $("[data-dismiss=modal]").trigger({
                    type: "click"
                });
            } else if (name == "") {
                $(`.span-error-name`).text("<?php echo e(__('*Please enter your name')); ?>");
            } else if (email == "") {
                $(`.span-error-email`).text("<?php echo e(__('*Please enter your email')); ?>");
            } else if (phone == "") {
                //alert("DSfgbn");
                $(`.span-error-phone`).text("<?php echo e(__('*Please enter your phone no.')); ?>");
            } else {
                $(`.span-error-date`).text("");
                $(`.span-error-time`).text("");
                $(`.span-error-name`).text("");
                $(`.span-error-email`).text("");
                date = formatDate(date);
                $.ajax({
                    url: '<?php echo e(route('appoinment.store')); ?>',
                    type: 'POST',
                    data: {
                        "name": name,
                        "email": email,
                        "phone": phone,
                        "date": date,
                        "time": time,
                        "business_id": business_id,
                        "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function(data) {
                        location.reload();
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                    }
                });
            }
        });
    </script>
    <!-- Google Analytic Code -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($business->google_analytic); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo e($business->google_analytic); ?>');
    </script>
    <script>
        function show_toastr(title, message, type) {
            var o, i;
            var icon = '';
            var cls = '';
    
            if (type == 'success') {
                icon = 'ti ti-check-circle';
                cls = 'success';
            } else {
                icon = 'ti ti-times-circle';
                cls = 'danger';
            }
    
            $.notify({icon: icon, title: " " + title, message: message, url: ""}, {
                element: "body",
                type: cls,
                allow_dismiss: !0,
                placement: {from: 'top', align: 'right'},
                offset: {x: 15, y: 15},
                spacing: 80,
                z_index: 1080,
                delay: 2500,
                timer: 2000,
                url_target: "_blank",
                mouse_over: !1,
                animate: {enter: o, exit: i},
                template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            });
        }
        if ($(".datepicker").length) {
            $('.datepicker').daterangepicker({
                singleDatePicker: true,
                format: 'yyyy-mm-dd',
            });
        }
    </script>
    <?php if($message = Session::get('success')): ?>
    <script>
        show_toastr('Success', '<?php echo $message; ?>', 'success');
    </script>
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        <script>
            show_toastr('Error', '<?php echo $message; ?>', 'error');
        </script>
    <?php endif; ?>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo e($business->fbpixel_code); ?>');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($business->fbpixel_code); ?>" /></noscript>

    <!-- Custom Code -->
    <script type="text/javascript">
        <?php echo $business->customjs; ?>

    </script>
    <?php if(isset($is_pdf)): ?>
        <?php echo $__env->make('business.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/card/theme6/index.blade.php ENDPATH**/ ?>