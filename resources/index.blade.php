@php

$social_no = 1;
$appointment_no = 0;
$service_row_no = 0;
$testimonials_row_no = 0;
$path = isset($business->banner) && !empty($business->banner) ? asset(Storage::url('card_banner/'.$business->banner)) : asset('custom/img/placeholder-image.jpg');
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

if(!is_null($business_hours) && !is_null($businesshours)){
$businesshours['is_enabled'] == '1' ? $is_enable = true : $is_enable = false;
}

if(!is_null($appoinment_hours) && !is_null($appoinment)){
$appoinment['is_enabled'] == '1' ? $is_enable_appoinment = true : $is_enable_appoinment = false;
}

if(!is_null($services_content) && !is_null($services)){
$services['is_enabled'] == '1' ? $is_enable_service = true : $is_enable_service = false;
}

if(!is_null($testimonials_content) && !is_null($testimonials)){
$testimonials['is_enabled'] == '1' ? $is_enable_testimonials = true : $is_enable_testimonials = false;
}

if(!is_null($social_content) && !is_null($sociallinks)){
$sociallinks['is_enabled'] == '1' ? $is_enable_sociallinks = true : $is_enable_sociallinks = false;
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
if(!is_null($business->is_gdpr_enabled) && !is_null($business->is_gdpr_enabled)){
(!empty($business->is_gdpr_enabled) && $business->is_gdpr_enabled == "on") ? $is_gdpr_enabled = true : $is_gdpr_enabled = false;
}

$color = substr($business->theme_color,0,6);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$business->title}}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="author" content="{{$business->title}}">
    <meta name="keywords" content="{{$business->meta_keyword}}">
    <meta name="description" content="{{$business->meta_description}}">
    @if(isset($is_slug))

    <link rel="stylesheet" href="{{ asset('custom/theme1/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('custom/theme1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom/theme1/modal/bootstrap.min.css')}}">
    <script src="{{asset('custom/theme1/modal/jquery.min.js')}}"></script>
    <script src="{{asset('custom/theme1/modal/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('custom/css/emojionearea.min.css') }}">

    @endif
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('custom/theme1/css/styles/'.$business->theme_color.'/style.css')}}">
    @if(isset($is_slug))
    @if($business->google_fonts != 'Default' && isset($business->google_fonts))
    <style>
        @import url('{{\App\Models\Utility::getvalueoffont($business->google_fonts)[' link']}}');


        :root {

            --Strawford: '{{strtok(\App\Models\Utility::getvalueoffont($business->google_fonts)[' fontfamily'],',
            ')}}',
            {
                {
                substr(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], strpos(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], ",") + 1)
            }
        }

        ;
        }
    </style>
    @endif
    @endif
    <style type="text/css">
    {{$business->customcss}}
    .vCard{
    margin: 10px 0;
    border-radius: 20px;
    }

    html.modal-open .vCard {
    filter: blur(10px);
    }
    html.modal-open .modal-backdrop.in {
    background: #b9b9b9;
    }
    ul#inputrow_contact_preview li .contact-text a h4 {
    height: 60px;
    transition: 0.5s;
    border-radius: 10px;
    width: 100%;
    text-align: center;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #EFEFEF;
    border-radius: 4.53849px;
    transition: 0.5s;
    }
    </style>
</head>

<body class="tech-card-body" id="boxes">
    <div class="wrapper">
        <div class="vCard dsfghgs">
            <div class="vCard-header">
                <div class="bg-white overflow-hidden">
                    <div class="banner-image">
                        <div class="banner-image-main">
                            <img src="{{ isset($business->banner) && !empty($business->banner) ? asset(Storage::url('card_banner/'.$business->banner)) : asset('custom/img/placeholder-image.jpg') }}" id="banner_preview" alt="fs">
                        </div>
                        <div class="media align-items-center justify-content-center profile-head">
                            <div class="profile">
                                <img src="{{ isset($business->logo) && !empty($business->logo) ? asset(Storage::url('card_logo/'.$business->logo)) : asset('custom/img/logo-placeholder-image-2.png') }}" id="business_logo_preview" alt="user" class="mb-4 img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="p-2 text-center vcard-description mb-5">
                        <h1 id="{{$stringid.'_title'}}_preview">{{$business->title}}</h1>
                        <h6 id="{{$stringid.'_designation'}}_preview">{{$business->designation}}</h6>
                        <p id="{{$stringid.'_subtitle'}}_preview">{{$business->sub_title}}</p>
                    </div>
                    @php $j = 1; @endphp
                    @foreach($card_theme->order as $order_key => $order_value)

                    @if($j == $order_value)

                    @if($order_key == 'description')
                    <div class="p-2 pb-4 text-center vcard-description">
                        <p id="{{$stringid.'_desc'}}_preview">{{$business->description}}</p>
                    </div>
                    @endif
                    @if($order_key == 'contact_info')

                    <div class="card-detail">
                        <div class="text-center card-contact" id="showContact_preview">
                            <ul id="inputrow_contact_preview">
                                @if(!is_null($contactinfo_content) && !is_null($contactinfo))
                                @if(isset($contactinfo['is_enabled']) && $contactinfo['is_enabled'] == '1')
                                @foreach($contactinfo_content as $key => $val)

                                @foreach($val as $key1 => $val1)
                                @if($key1 == 'Phone')
                                @php $href = 'tel:'.$val1; @endphp
                                @elseif($key1 == 'Email')
                                @php $href = 'mailto:'.$val1; @endphp
                                @elseif($key1 == 'Address')
                                @php $href = ''; @endphp
                                @else
                                @php $href = $val1 @endphp
                                @endif
                                @if($key1 != 'id')

                                <li class="d-flex align-items-center justify-content-center" id="contact_{{$loop->parent->index+1}}">
                                    <div class="image-icon">
                                        <img src="{{asset('custom/theme1/icon/'.$color.'/'.strtolower($key1).'.svg')}}" class="img-fluid">
                                    </div>
                                    <div class="contact-text">
                                        <div class="col">
                                            @if($key1 == "Address")
                                            @foreach($val1 as $key2 => $val2)
                                            @if($key2 == "Address_url")
                                            @php $href = $val2; @endphp
                                            @endif
                                            @endforeach
                                            <a href="{{$href}}" target="_blank">
                                                @foreach($val1 as $key2 => $val2)
                                                @if($key2 == "Address")
                                                <h4 id="{{$key1.'_'.$no}}_preview">{{$val2}}</h4>
                                                @endif
                                                @endforeach

                                            </a>
                                            @else
                                            @if($key1 == 'Whatsapp')
                                            <a href="{{url('https://wa.me/'.$href)}}" target="_blank">
                                                @else
                                                <a href="{{$href}}" target="_blank">
                                                    @endif
                                                    <h4 id="{{$key1.'_'.$no}}_preview">{{$val1}}</h4>
                                                </a>
                                                @endif
                                        </div>
                                </li>
                                @endif
                                @php
                                $no++;
                                @endphp
                                @endforeach
                                @endforeach
                                @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if($order_key == 'bussiness_hour')
                    <div class="card-detail" id="business-hours-div"><br><br>
                        <div class="text-center card-business-hours">
                            <div class="business-hours-image image-icon contact-icon">
                                <img src="{{asset('custom/theme1/icon/'.$color.'/clock.svg')}}" alt="clock" class="img-fluid">
                            </div>
                            <h4>{{ __('Business Hours') }}</h4>
                            <ul class="pl-5">
                                @foreach($days as $k=>$day)
                                <li>
                                    <p>{{ __($day) }}:<span class="days_{{$k}}"> @if(isset($business_hours->$k) && $business_hours->$k->days=='on')
                                            <span class="days_{{$k}}_start">{{ !empty($business_hours->$k->start_time) && isset($business_hours->$k->start_time) ? $business_hours->$k->start_time : '00:00' }}</span>-<span class="days_{{$k}}_end">{{ !empty($business_hours->$k->end_time) && isset($business_hours->$k->end_time) ? $business_hours->$k->end_time : '00:00' }}</span>
                                            @else
                                            {{__('Closed')}}
                                            @endif</span></p>
                                </li>

                                @endforeach
                            </ul>

                        </div>
                    </div>
                    @endif
                    @if($order_key == 'appointment')
                    <div class="card-detail card-business-date" id="appointment-div"><br><br>
                        <div class="text-center card-business-hours ">
                            <div class="image-icon contact-icon">
                                <img src="{{asset('custom/theme1/icon/'.$color.'/calendar.svg')}}" alt="calendar" class="img-fluid">
                            </div>
                            <h3>{{__('Make an')}} <span> {{__('appointment')}} </span></h3>
                            <form action="" class="datepicker-form">
                                <div class="date-click d-flex">

                                    <fieldset class="d-flex align-items-center w-100 m-0">
                                        <div class="lable-custom">
                                            <label for="input_from" class="Date appointment-lable">{{__('Date')}}</label>
                                        </div>
                                        <div class="radio-custom date-input">
                                            <div class="">
                                                <input type="text" id="input_from" name="date" class="text-center app_date" placeholder="Pick a Date">
                                            </div>
                                        </div>

                                    </fieldset>

                                </div>
                                <div class="text-center pl-3 mt-0">
                                    <span class="text-danger text-center h5 span-error-date" style="margin-left: 100px;"></span>
                                </div>

                                <div class="hour-click d-flex ">
                                    <div class="lable-custom">
                                        <label for="input_from" class="radio-label appointment-lable">{{__('Hour')}}</label>
                                    </div>
                                    <div class="radio-custom row" id="inputrow_appointment_preview">
                                        @php $radiocount = 1; @endphp
                                        @if(!is_null($appoinment_hours))
                                        @foreach($appoinment_hours as $k => $hour)
                                        <div class="col-md-6">

                                            <div class="radio pr-8" id="{{'appointment_'.$appointment_no}}">
                                                <input id="radio-{{$radiocount}}" name="time" type="radio" data-id="@if(!empty($hour->start)) {{$hour->start}} @else 00:00  @endif-@if(!empty($hour->end)) {{$hour->end}} @else 00:00  @endif" class="app_time">
                                                <label for="radio-{{$radiocount}}" class="radio-label"><span id="appoinment_start_{{$appointment_no}}_preview">@if(!empty($hour->start)) {{$hour->start}} @else 00:00 @endif </span> - <span id="appoinment_end_{{$appointment_no}}_preview">@if(!empty($hour->end)) {{$hour->end}} @else 00:00 @endif</span></label>
                                            </div>
                                        </div>

                                        @php
                                        $radiocount++;
                                        $appointment_no++;
                                        @endphp
                                        @endforeach
                                        @endif
                                    </div>

                                </div>
                                <div class="text-center pl-3 mt-0">
                                    <span class="text-danger text-center h5 span-error-time" style="margin-left: 78px;"></span>
                                </div>
                                <div class="make-an-appointment d-flex">
                                    <div class="lable-custom"></div>
                                    <div class="make-an-appointment-btn">
                                        <button type="button" class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100 appointmentModal" data-target="#appointmentModal" data-toggle="modal">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 3C6 2.44772 6.44772 2 7 2C7.55228 2 8 2.44772 8 3V4H16V3C16 2.44772 16.4477 2 17 2C17.5523 2 18 2.44772 18 3V4H19C20.6569 4 22 5.34315 22 7V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V7C2 5.34315 3.34315 4 5 4H6V3Z" fill="#000" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12C9.44772 12 9 12.4477 9 13C9 13.5523 9.44772 14 10 14H17C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12H10ZM7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H7Z" fill="var(--theme-bg)" />
                                            </svg>
                                            <h4>{{__('Make an appointment')}}</h4>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    @if($order_key == 'service')
                    <div class="card-detail card-business-date" id="services-div"><br><br>
                        <div class="text-center card-business-hours">
                            <div class="image-icon contact-icon">
                                <img src="{{asset('custom/theme1/icon/'.$color.'/phone.svg')}}" alt="phone" class="img-fluid">
                            </div>
                            <h3><span> {{ __('Services') }} </span></h3>
                            <div class="container-lg">
                                <div class="row" id="inputrow_service_preview">
                                    @php $image_count = 0; @endphp
                                    @foreach($services_content as $k1 => $content)
                                    <div class="col-lg-6" id="services_{{$service_row_no}}">
                                        <div class="service-card pb-3">
                                            <div class="service-card-img">
                                                <img id="{{'s_image'.$image_count.'_preview'}}" src="{{ !empty($content->image) ? asset(Storage::url('service_images/'.$content->image)) : asset('custom/theme1/icon/image.svg') }}" alt="image" class="img-fluid">
                                            </div>
                                            <div class="service-card-heading">
                                                <h3 id="{{'title_'.$service_row_no.'_preview'}}">
                                                    {{$content->title}}
                                                </h3>
                                                <p id="{{'description_'.$service_row_no.'_preview'}}">
                                                    {{$content->description}}
                                                </p>
                                                @if(!empty($content->purchase_link))
                                                <div class="card-footer justify-content-center pb-0">
                                                    <a href="{{url($content->purchase_link)}}" class="text-white text-lg" target="_blank">
                                                    </a>
                                                </div>
                                                <p id="{{'link_title_'.$service_row_no.'_preview'}}" class="text-white text-lg">
                                                    {{$content->link_title}}<i class="fas fa-angle-double-right text-white"></i>
                                                </p>
                                                @endif

                                            </div>



                                        </div>

                                    </div>
                                    @php
                                    $image_count++;
                                    $service_row_no++;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($order_key == 'more')
                    <div class="card-detail card-business-date"><br><br>
                        <div class="text-center card-business-hours">
                            <div class="image-icon contact-icon">
                                <img src="{{asset('custom/theme1/icon/'.$color.'/bookmark.svg')}}" alt="bookmark" class="img-fluid">
                            </div>
                            <h3><span> {{__('More')}} </span></h3>
                            <div class="make-an-appointment d-flex mb-3">
                                <div class="w-100">
                                    <button type="button" class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100" onclick="location.href = '{{route('bussiness.save',$business->slug)}}'">
                                        <img src="{{asset('custom/theme1/icon/'.$color.'/folder.svg')}}" alt="folder" class="img-fluid">
                                        <h4><a href="{{ route('bussiness.save',$business->slug)}}">{{__('Save card')}}</a></h4>
                                    </button>
                                </div>
                            </div>
                            <div class="make-an-appointment d-flex mb-3">
                                <div class="w-100">
                                    <button type="button" class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100" data-toggle="modal" data-target="#myModal">
                                        <img src="{{asset('custom/theme1/icon/'.$color.'/signout.svg')}}" alt="signout" class="img-fluid">
                                        <h4>{{__('Share our card')}}</h4>
                                    </button>
                                </div>
                            </div>
                            <div class="make-an-appointment d-flex mb-3">
                                <div class="w-100">
                                    <button type="button" class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100" data-toggle="modal" data-target="#mycontactModal">
                                        <img src="{{asset('custom/theme1/icon/'.$color.'/phone.svg')}}" alt="signout" class="img-fluid">
                                        <h4>{{__('Contact')}}</h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($order_key == 'testimonials')
                    <div class="card-detail card-business-date mb-2" id="testimonials-div">
                        <div class="text-center card-business-hours pb-0">
                            <div class="image-icon contact-icon">
                                <img src="{{asset('custom/theme1/icon/'.$color.'/user.svg')}}" alt="user" class="img-fluid">
                            </div>
                            <h3><span> {{ __('Testimonials') }} </span></h3>
                            <div class="container-lg">
                                <div class="row" id="inputrow_testimonials_preview">
                                    @php
                                    $t_image_count = 0;
                                    $rating = 0;
                                    @endphp
                                    @foreach($testimonials_content as $k2 => $testi_content)
                                    <div class="col-lg-6 pr-8 pl-0 res-pr-0" id="testimonials_{{$testimonials_row_no}}">
                                        <div class="service-card testimonials-card">
                                            <div class="service-card-img ">
                                                <img id="{{'t_image'.$t_image_count.'_preview'}}" src="{{ !empty($testi_content->image) ? asset(Storage::url('testimonials_images/'.$testi_content->image)) : asset('custom/img/logo-placeholder-image-2.png') }}" alt="user" class="img-fluid">
                                            </div>
                                            <div class="service-card-heading">
                                                <h3>
                                                    <span class="{{'stars'.$testimonials_row_no}}">{{$testi_content->rating}}</span>/5
                                                </h3>

                                                @php
                                                if(!empty($testi_content->rating)){
                                                $rating = (int)$testi_content->rating;
                                                $overallrating = $rating;
                                                }
                                                else{
                                                $overallrating = 0;
                                                }
                                                @endphp
                                                <span id="{{'stars'.$testimonials_row_no}}_star" class="star-section d-flex align-items-center justify-content-center">
                                                    @for($i=1; $i<=5; $i++) @if($overallrating < $i) @if(is_float($overallrating) && (round($overallrating)==$i)) <i class="star-color fas fa-star-half-alt"></i>
                                                        @else
                                                        <i class=" fa fa-star"></i>
                                                        @endif
                                                        @else
                                                        <i class="star-color fas fa-star"></i>
                                                        @endif
                                                        @endfor
                                                </span>
                                                <p id="{{'testimonial_description_'.$testimonials_row_no.'_preview'}}">
                                                    {{$testi_content->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $t_image_count++;
                                    $testimonials_row_no++;
                                    @endphp
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($order_key == 'social')
                    <div class="social-icon mb-2" id="social-div">
                        <div class="text-center card-business-hours pb-20">
                            <div class="image-icon contact-icon">
                                <img src="{{asset('custom/theme1/icon/'.$color.'/share.svg')}}" alt="share" class="img-fluid">
                            </div>
                            <h3><span> {{ __('Social') }} </span></h3>
                            <div class="container-lg">
                                <div class="row">
                                    <div class="social-icon w-100 d-flex align-items-center justify-content-center">
                                        <div class="container">
                                            <div class="row justify-content-center" id="inputrow_socials_preview">
                                                @foreach($social_content as $social_key => $social_val)
                                                @foreach($social_val as $social_key1 => $social_val1)
                                                @if($social_key1 != 'id')
                                                <div class="col-2 {{'socials_'.$social_no}}">
                                                    <span id="{{'socials_'.$social_no}}">
                                                        <a href="{{url($social_val1)}}" id="{{'social_link_'.$social_no.'_href_preview'}}" class="{{'social_link_'.$social_no.'_href_preview'}}" target="_blank">
                                                            <div class="image-icon">
                                                                <img src="{{asset('custom/theme1/icon/'.$color.'/'.strtolower($social_key1).'.svg')}}" alt="twitter" class="img-fluid">
                                                            </div>
                                                        </a>
                                                    </span>
                                                </div>
                                                @endif
                                                @php
                                                $social_no++;
                                                @endphp
                                                @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($order_key == 'custom_html')
                    <div id="{{$stringid.'_chtml'}}_preview" class="custom_html_text">
                        {!! stripslashes($custom_html) !!}
                    </div>
                    @endif
                    @php
                    $j = $j+1;
                    @endphp
                    @endif
                    @endforeach
                    @if ($plan->enable_branding == 'on')
                    @if($is_branding_enabled)
                    <div class=" text-center">
                        <div id="is_branding_enabled" class="is_branding_enable">
                            <h6 id="{{$stringid.'_branding'}}_preview" class="branding_text">{{$business->branding_text}}</h6>
                        </div>
                    </div>
                    @endif
                    @endif
                    @if(isset($is_slug))
                    @if($is_gdpr_enabled)
                    <script type="text/javascript">
                        var defaults = {
                            'messageLocales': {
                                'en': "{{ $gdpr_text }}"
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
                    <script src="{{ asset('custom/js/cookie.notice.js')}}"></script>
                    @endif
                    @endif

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

                        <button type="button" class="back-btn d-flex align-items-center justify-content-center" data-dismiss="modal">
                            <img src="{{asset('custom/theme1/img/back.svg')}}" alt="back" class="img-fluid">
                        </button>

                        <h4 class="modal-title">{{__('Share this card')}}</h4>

                        <button type="button" class="logout-btn">
                            <img src="{{asset('custom/theme1/icon/'.$color.'/signout.svg')}}" alt="signout" class="img-fluid">
                        </button>

                    </div>
                </div>
                <div class="modal-body border-0">

                    <div class="modal-body-section text-center">
                        <div class="qr-main-image">
                            <div class="qr-code-border">
                                <img src="{{asset('custom/img/left-top.svg')}}" alt="left-top" class="img-fluid left-top-border">
                                <img src="{{asset('custom/img/left-bottom.svg')}}" alt="left-bottom" class="img-fluid left-bottom-border">
                                <img src="{{asset('custom/img/right-top.svg')}}" alt="right-top" class="img-fluid right-top-border">
                                <img src="{{asset('custom/img/right-bottom.svg')}}" alt="right-bottom" class="img-fluid right-bottom-border">
                            </div>
                            <div class="qrcode"></div>
                        </div>
                        <div class="text">
                            <p>
                                {{__('Point your camera at the QR code, or visit')}} <span class="qr-link text-center mr-2"></span>
                            </p>
                        </div>

                        <div class="text">
                            <p class="mb-0">
                                {{__('Or check my social channels')}}
                            </p>
                        </div>
                        <div class="social-icon-section modal-social-icon-section"><br><br>
                            <div class="text-center card-business-hours pb-20">
                                <div class="container-lg">
                                    <div class="row">
                                        <div class="social-icon w-100 d-flex align-items-center justify-content-center">
                                            <div class="container">
                                                <div class="row justify-content-center inputrow_socials_preview" id="inputrow_socials_preview">
                                                    @foreach($social_content as $social_key => $social_val)
                                                    @foreach($social_val as $social_key1 => $social_val1)
                                                    @if($social_key1 != 'id')
                                                    <div class="col-2 socials_{{$loop->parent->index+1}}" id="socials_{{$loop->parent->index+1}}">
                                                        <span>
                                                            <a href="{{url($social_val1)}}" class="social_link_{{$loop->parent->index+1}}_href_preview'}}" id="social_link_{{$loop->parent->index+1}}_href_preview" target="_blank">
                                                                <div class="image-icon">
                                                                    <img src="{{asset('custom/theme1/icon/'.$color.'/'.strtolower($social_key1).'.svg')}}" alt="{{$social_key1}}" class="img-fluid">
                                                                </div>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade appointment-modal" id="appointmentModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <h4 class="modal-title">{{__('Make Appointment')}}</h4>
                        <button type="button" class="back-btn d-flex align-items-center justify-content-center" data-dismiss="modal">
                            <img src="{{asset('custom/theme1/icon/'.$color.'/close.svg')}}" alt="back" class="img-fluid">
                        </button>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form class="appointment-form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{__('Name')}}:</label>
                            <input type="text" name="name" placeholder="{{__('Enter your name')}}" class="form-control app_name" id="recipient-name">
                            <div class="">
                                <span class="text-danger  h5 span-error-name"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{__('Email')}}:</label>
                            <input type="email" name="email" placeholder="{{__('Enter your email')}}" class="form-control app_email" id="recipient-name">
                            <div class="">
                                <span class="text-danger  h5 span-error-email"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{__('Phone')}}:</label>
                            <input type="text" name="phone" placeholder="{{__('Enter your phone no.')}}" class="form-control app_phone" id="recipient-name">
                            <div class="">
                                <span class="text-danger  h5 span-error-phone"></span>
                            </div>
                        </div>
                        <div class="form-btn-group">
                            <button type="button" class="btn form-btn--close" data-dismiss="modal">{{__('Close')}}</button>
                            <button type="button" class="btn form-btn--submit" id="makeappointment">{{__('Make Appointment')}}</button>
                        </div>
                    </form>

                </div>

            </div>


        </div>
    </div>

    <div class="modal fade modal appointment-modal" id="mycontactModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <h4 class="modal-title">{{__('Make Contact')}}</h4>
                        <button type="button" class="back-btn d-flex align-items-center justify-content-center" data-dismiss="modal">
                            <img src="{{asset('custom/theme1/icon/'.$color.'/close.svg')}}" alt="back" class="img-fluid">
                        </button>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form action="{{route('contacts.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{__('Name')}}:</label>
                            <input type="text" name="name" placeholder="{{__('Enter your name')}}" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{__('Email')}}:</label>
                            <input type="email" name="email" placeholder="{{__('Enter your email')}}" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{__('Phone')}}:</label>
                            <input type="text" name="phone" placeholder="{{__('Enter your phone no.')}}" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{__('Message')}}:</label>
                            <textarea name="message" placeholder="{{__('Enter your Message.')}}" class="form-control emojiarea" id="recipient-name"></textarea>
                        </div>
                        <input type="hidden" name="business_id" value="{{$business->id}}">
                        <div class="form-btn-group">
                            <button type="button" class="btn form-btn--close" data-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn form-btn--submit">{{__('Make Contact')}}</button>
                        </div>
                    </form>

                </div>

            </div>


        </div>
    </div>

    <div class="modal fade modal appointment-modal" id="passwordmodel" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                        <h4 class="modal-title mt-2">{{__('Enter Password')}}</h4>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form class="appointment-form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{__('Password')}}:</label>
                            <input type="password" name="Password" placeholder="{{__('Enter password')}}" class="form-control password_val" id="recipient-name" placeholder="Password">
                            <div class="">
                                <span class="text-danger  h5 span-error-password"></span>
                            </div>
                        </div>
                        <div class="form-btn-group ">
                            <button type="button" class="btn form-btn--submit password-submit">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>
    </div>




    @if(isset($is_slug))

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="{{ asset('custom/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script> --}}
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js"></script>
    <script src="{{asset('custom/js/jquery.qrcode.js')}}"></script>
    <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
    {{-- <script type="text/javascript" src="http://static.runoob.com/assets/qrcode/qrcode.min.js"></script> --}}
    <script src="{{ asset('custom/js/emojionearea.min.js')}}"></script>


    <script>
        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        };

        // $(".qrdownload").click(function(){
        //     var canvas = document.querySelector('.qrcode').querySelector('canvas');
        //     console.log(canvas)
        //     let dataURL = canvas.toDataURL();
        //     //let dataUrl = document.querySelector('.qrcode').querySelector('img').src;
        //     let qrcode = new QRCode(document.getElementByClass("qrcode"),
        //              {
        //               text: dataUrl,
        //               width: 450,
        //               height: 450,
        //               colorDark : "#000000",
        //               colorLight : "#ffffff",
        //               correctLevel : QRCode.CorrectLevel.H
        //             });  
        //   setTimeout(
        //     function ()
        //     {
        //         let dataUrl = document.querySelector('.qrcode').querySelector('img').src;
        //         downloadURI(dataUrl, 'qrcode.png');
        //     }
        //     ,1000);
        // });





        //$(`.rating_preview`).attr('id');
        //console.log($('#appointmentModal').hasClass('in'));
        let ispassword;
        var ispassenable = '{{$business->enable_password}}';

        var business_password = '{{$business->password}}';
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
                        $(`.span-error-password`).text("{{__('*Please enter correct password')}}");
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
            var slug = '{{$business->slug}}';
            var url_link = `{{ url("/") }}/${slug}`;
            $(`.qr-link`).text(url_link);
            $('.qrcode').qrcode(url_link);
        });

        $(`.rating_preview`).attr('id');
        var from_$input = $('#input_from').pickadate(),
            from_picker = from_$input.pickadate('picker')

        var to_$input = $('#input_to').pickadate(),
            to_picker = to_$input.pickadate('picker')

        var is_enabled = "{{$is_enable}}";
        if (is_enabled) {
            $('#business-hours-div').show();
        } else {
            $('#business-hours-div').hide();
        }

        var is_enable_appoinment = "{{$is_enable_appoinment}}";
        if (is_enable_appoinment) {
            $('#appointment-div').show();
        } else {
            $('#appointment-div').hide();
        }

        var is_enable_service = "{{$is_enable_service}}";
        if (is_enable_service) {
            $('#services-div').show();
        } else {
            $('#services-div').hide();
        }

        var is_enable_testimonials = "{{$is_enable_testimonials}}";
        if (is_enable_testimonials) {
            $('#testimonials-div').show();
        } else {
            $('#testimonials-div').hide();
        }


        var is_enable_sociallinks = "{{$is_enable_sociallinks}}";
        if (is_enable_sociallinks) {
            $('#social-div').show();
        } else {
            $('#social-div').hide();
        }

        var is_custom_html_enable = "{{$is_custom_html_enable}}";
        if (is_custom_html_enable) {
            $('.custom_html_text').show();
        } else {
            $('.custom_html_text').hide();
        }
        var is_branding_enable = "{{$is_branding_enabled}}";
        if (is_branding_enable) {
            $('.branding_text').show();
        } else {
            $('.branding_text').hide();
        }

        //  $("#is_branding_enable").change(function() {
        //      var $input = $(this);
        //      var enable = $input.is(":checked")
        //      console.log(enable);
        //      if (enable == true) {
        //          console.log('dfd');
        //          $('#branding-div').show();
        //          $('#showbranding').show();
        //      }
        //      if (enable == false) {
        //          $('#branding-div').hide();
        //          $('#showbranding').hide();
        //      }
        //  }).change();

        $(`#makeappointment`).click(function() {

            var name = $(`.app_name`).val();
            var email = $(`.app_email`).val();
            var date = $(`.app_date`).val();
            var phone = $(`.app_phone`).val();
            var time = $("input[type='radio']:checked").data('id');
            var business_id = '{{$business->id}}';

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
                $(`.span-error-date`).text("*Please choose date");
                $("[data-dismiss=modal]").trigger({
                    type: "click"
                });
            } else if (document.querySelectorAll('input[type="radio"][name="time"]:checked').length < 1) {
                $(`.span-error-time`).text("*Please choose time");
                $("[data-dismiss=modal]").trigger({
                    type: "click"
                });
            } else if (name == "") {
                //alert("DSfgbn");
                $(`.span-error-name`).text("{{__('*Please enter your name')}}");
            } else if (email == "") {
                //alert("DSfgbn");
                $(`.span-error-email`).text("{{__('*Please enter your email')}}");
            } else if (phone == "") {
                //alert("DSfgbn");
                $(`.span-error-phone`).text("{{__('*Please enter your phone no.')}}");
            } else {
                $(`.span-error-date`).text("");
                $(`.span-error-time`).text("");
                $(`.span-error-name`).text("");
                $(`.span-error-email`).text("");


                date = formatDate(date);
                $.ajax({
                    url: '{{route('
                    appoinment.store ')}}',
                    type: 'POST',
                    data: {
                        "name": name,
                        "email": email,
                        "phone": phone,
                        "date": date,
                        "time": time,
                        "business_id": business_id,
                        "_token": "{{ csrf_token() }}",
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
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('error'))
            toastr.error('{{ Session::get('
                error ') }}');
            @elseif(Session::has('success'))
            toastr.success('{{ Session::get('
                success ') }}');
            @endif
        });
    </script>
    <!-- Google Analytic Code -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$business->google_analytic}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ $business->google_analytic }}');
    </script>

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
        fbq('init', '{{$business->fbpixel_code}}');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript={{$business->fbpixel_code}}" /></noscript>

    <!-- Custom Code -->
    <script type="text/javascript">
        {
            !!$business - > customjs!!
        }
    </script>
    @if(isset($is_pdf))
    @include('business.script');
    @endif
    @push('custom-scripts')
    <script type="text/javascript">
        $('.cp_link').on('click', function() {
            var value = $(this).attr('data-link');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
            toastrs('{{__('
                Success ')}}', '{{__('
                Link Copy on Clipboard ')}}', 'success');
        });

        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', "{{ __('Link copied') }}", 'success');
        }

        $(".textboxhover").mouseover(function() {
            $(this).removeClass("border-0");
        }).mouseout(function() {
            $(this).addClass("border-0");
        });
    </script>

    @endpush
</body>

</html>