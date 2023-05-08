@extends('layouts.admin')
@section('page-title')
    {{__('Settings')}}
@endsection
@php
    // $logo=asset(Storage::url('uploads/'));
    $logo=\App\Models\Utility::get_file('uploads/logo/');
    
    $lang=\App\Models\Utility::getValByName('default_language');

    $file_type = config('files_types');
    $setting = App\Models\Utility::settings();

    $local_storage_validation    = $setting['local_storage_validation'];
    $local_storage_validations   = explode(',', $local_storage_validation);

    $s3_storage_validation    = $setting['s3_storage_validation'];
    $s3_storage_validations   = explode(',', $s3_storage_validation);

    $wasabi_storage_validation    = $setting['wasabi_storage_validation'];
    $wasabi_storage_validations   = explode(',', $wasabi_storage_validation);

@endphp
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('Settings')}}</li>
@endsection
@section('title')
    {{__('Settings')}}
@endsection
@php
    // $color = Cookie::get('color');
    $color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
@endphp
{{-- @dd($color) --}}
@if($color == 'theme-3')
    <style>
    .btn-check:checked + .btn-outline-success, .btn-check:active + .btn-outline-success, .btn-outline-success:active, .btn-outline-success.active, .btn-outline-success.dropdown-toggle.show {
            color: #ffffff;
            background-color: #6fd943 !important;
            border-color: #6fd943 !important;
        
        }
        
        .btn-outline-success:hover
        {
            color: #ffffff;
            background-color: #6fd943 !important;
            border-color: #6fd943 !important;
        }
        .btn.btn-outline-success{
            color: #6fd943;
            border-color: #6fd943 !important;
        }
    </style>
@endif
@if($color == 'theme-2')
    <style>
        .btn-check:checked + .btn-outline-success, .btn-check:active + .btn-outline-success, .btn-outline-success:active, .btn-outline-success.active, .btn-outline-success.dropdown-toggle.show {
            color: #ffffff;
            background: linear-gradient(141.55deg, rgba(240, 244, 243, 0) 3.46%, #4ebbd3 99.86%)#1f3996 !important;
            border-color: #1F3996 !important;
        
        }
        
        .btn-outline-success:hover
        {
            color: #ffffff;
            background: linear-gradient(141.55deg, rgba(240, 244, 243, 0) 3.46%, #4ebbd3 99.86%)#1f3996 !important;
            border-color: #1F3996 !important;
        }
        .btn.btn-outline-success{
            color: #1F3996;
            border-color: #1F3996 !important;
        }
        </style>
@endif    
@if($color == 'theme-4')
    <style>
        .btn-check:checked + .btn-outline-success, .btn-check:active + .btn-outline-success, .btn-outline-success:active, .btn-outline-success.active, .btn-outline-success.dropdown-toggle.show {
            color: #ffffff;
            background-color: #584ed2 !important;
            border-color: #584ed2 !important;
        
        }
        
        .btn-outline-success:hover
        {
            color: #ffffff;
            background-color: #584ed2 !important;
            border-color: #584ed2 !important;
        }
        .btn.btn-outline-success{
            color: #584ed2;
            border-color: #584ed2 !important;
        }
    </style>
@endif
@if($color == 'theme-1')
    <style>
        .btn-check:checked + .btn-outline-success, .btn-check:active + .btn-outline-success, .btn-outline-success:active, .btn-outline-success.active, .btn-outline-success.dropdown-toggle.show {
            color: #ffffff;
            background: linear-gradient(141.55deg, rgba(81, 69, 157, 0) 3.46%, rgba(255, 58, 110, 0.6) 99.86%), #51459d !important;
            border-color: #51459d !important;
        
        }
        
        .btn-outline-success:hover
        {
            color: #ffffff;
            background: linear-gradient(141.55deg, rgba(81, 69, 157, 0) 3.46%, rgba(255, 58, 110, 0.6) 99.86%), #51459d !important;
            border-color: #51459d !important;
        }
        .btn.btn-outline-success{
            color: #51459d;
            border-color: #51459d !important;
        }
    </style>
@endif
@push('custom-scripts')
<script>
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    });
    var multipleCancelButton = new Choices(
        '#choices-multiple-remove-button', {
            removeItemButton: true,
        }
    );
    var multipleCancelButton = new Choices(
        '#choices-multiple-remove-button1', {
            removeItemButton: true,
        }
    );
    var multipleCancelButton = new Choices(
        '#choices-multiple-remove-button2', {
            removeItemButton: true,
        }
    );
</script>
    <script>
        $(document).ready(function () {
            if ($('.gdpr_fulltime').is(':checked') ) {

                $('.fulltime').show();
            } else {

                $('.fulltime').hide();
            }

            $('#gdpr_cookie').on('change', function() {
                if ($('.gdpr_fulltime').is(':checked') ) {

                    $('.fulltime').show();
                } else {

                    $('.fulltime').hide();
                }
            });
        });
    </script>
    <script src="{{asset('custom/libs/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', "{{__('Link copied')}}", 'success');
        }

        $(document).on('click', 'input[name="theme_color"]', function () {
            var eleParent = $(this).attr('data-theme');
            $('#themefile').val(eleParent);
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
        });

        $(document).ready(function () {
            setTimeout(function (e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('#themefile').val(checked.attr('data-theme'));
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
            }, 300);
        });
    </script>
    <script>
        function check_theme(color_val) {

        $('.theme-color').prop('checked', false);
        $('input[value="'+color_val+'"]').prop('checked', true);
        }
    </script>

    <script type="text/javascript"> 
        $(document).on("click", '.send_email', function(e) 
        {        
        e.preventDefault();
        var title = $(this).attr('data-title');
        var size = 'md';
        var url = $(this).attr('data-url');
        console.log(url);
        if (typeof url != 'undefined') {
            $("#commonModal .modal-title").html(title);
            $("#commonModal .modal-dialog").addClass('modal-' + size);
            $("#commonModal").modal('show');
            
            $.post(url, {
                _token:'{{csrf_token()}}',
                mail_driver: $("#mail_driver").val(),
                mail_host: $("#mail_host").val(),
                mail_port: $("#mail_port").val(),
                mail_username: $("#mail_username").val(),
                mail_password: $("#mail_password").val(),
                mail_encryption: $("#mail_encryption").val(),
                mail_from_address: $("#mail_from_address").val(),
                mail_from_name: $("#mail_from_name").val(),

            }, function(data) {
                    $('#commonModal .modal-body').html(data);
                });
            }
        });
        $(document).on('submit', '#test_email', function(e) {
                e.preventDefault();
                $("#email_sending").show();
                var post = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    type: "post",
                    url: url,
                    data: post,
                    cache: false,
                    beforeSend: function() {
                        $('#test_email .btn-create').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                    
                        if (data.is_success) {
                            toastrs('Success', data.message, 'success');
                        } else {
                            toastrs('Error', data.message, 'error');
                        }
                        $("#email_sending").hide();
                        $('#commonModal').modal('hide');

                    },
                    complete: function() {
                        $('#test_email .btn-create').removeAttr('disabled');
                    },
                });
            });
    </script>

    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,
        })
        $(".list-group-item").click(function(){
            $('.list-group-item').filter(function(){
                return this.href == id;
            }).parent().removeClass('text-primary');
        });

        function check_theme(color_val) {
            $('#theme_color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }

        $(document).on('change','[name=storage_setting]',function(){
            if($(this).val() == 's3'){
                $('.s3-setting').removeClass('d-none');
                $('.wasabi-setting').addClass('d-none');
                $('.local-setting').addClass('d-none');
            }else if($(this).val() == 'wasabi'){
                $('.s3-setting').addClass('d-none');
                $('.wasabi-setting').removeClass('d-none');
                $('.local-setting').addClass('d-none');
            }else{
                $('.s3-setting').addClass('d-none');
                $('.wasabi-setting').addClass('d-none');
                $('.local-setting').removeClass('d-none');
            }
        });
    </script>
@endpush
@section('content')

<div class="row">
    <!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="row">
        <div class="col-xl-3">
            <div class="card sticky-top" style="top:30px">
                <div class="list-group list-group-flush" id="useradd-sidenav">
                    <a href="#useradd-1" class="list-group-item list-group-item-action border-0">{{ __('Site Setting') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    <a href="#useradd-2" class="list-group-item list-group-item-action border-0">{{ __('Email Setting') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    <a href="#useradd-3" class="list-group-item list-group-item-action border-0">{{ __('Payment Setting') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    <a href="#useradd-4" class="list-group-item list-group-item-action border-0">{{ __('ReCaptcha Setting') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>    
                    <a href="#useradd-13" class="list-group-item list-group-item-action border-0">{{ __('Storage Setting') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>    
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="useradd-1" class="">
                <div class="card"> 
                    {{Form::model($settings,array('url'=>'systems','method'=>'POST','enctype' => "multipart/form-data"))}}
                    <div class="card-header">
                        <h5>{{ __('Site Setting') }}</h5>
                        <small class="text-muted">{{ __('Edit details about your Company') }}</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ __('Logo Dark') }}</h5>
                                    </div>
                                    <div class="card-body pt-1 min-250">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-5">
                                                <a href="{{$logo.'logo-dark.png'}}" target="_blank">
                                                            <img id="dark-logo" alt="your image" src="{{$logo.'logo-dark.png'}}" width="150px" class="big-logo">
                                                </a> 
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_logo">
                                                    <div class="mt-3 bg-primary company_logo_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Select image') }}</div>
                                                    <input type="file" class="form-control file" name="logo" id="company_logo"
                                                        data-filename="editlogo" onchange="document.getElementById('dark-logo').src = window.URL.createObjectURL(this.files[0])">   
                                                </label>
                                            </div>
                                            <p class="editlogo" ></p>
                                            @error('logo')
                                                <span class="invalid-company_logo text-xs text-danger"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{__('Logo Light')}}</h5>
                                    </div>
                                    <div class="card-body pt-1 min-250">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-5">
                                                {{-- <a href="{{$logo.'/logo/logo-light.png'}}">
                                                    <img src="{{$logo.'/logo/logo-light.png'}}"
                                                    class="big-logo1 img_setting" alt="" id="light-logo">    
                                                </a> --}}
                                                <a href="{{$logo.'logo-light.png'}}" target="_blank">
                                                    <img id="light-logo" alt="your image" src="{{$logo.'logo-light.png'}}" width="150px" class="big-logo img_setting">
                                                </a>
                                                
                                            </div>
                                            <div class="choose-files mt-5 ">
                                                <label for="landing_logo">
                                                    <div class="mt-3 bg-primary company_favicon_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Select image') }}
                                                    </div>
                                                    <input type="file" class="form-control file" name="landing_logo"
                                                        id="landing_logo" data-filename="landing_logo_update" onchange="document.getElementById('light-logo').src = window.URL.createObjectURL(this.files[0])">
                                                </label>
                                            </div>
                                            @error('landing_logo')
                                                <span class="invalid-company_favicon text-xs text-danger"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{__('Favicon')}}</h5>
                                    </div>
                                    <div class="card-body min-250">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-4">
                                                {{-- <a href="{{$logo.'/logo/favicon.png'}}">
                                                    <img src="{{$logo.'/logo/favicon.png'}}"
                                                    class="big-logo2 img_setting" alt="" id="favicon-logo">    
                                                </a> --}}
                                                <a href="{{$logo.(isset($logo) && !empty($logo)? $logo :'favicon.png')}}" target="_blank">
                                                    <img id="favicon-logo" alt="your image" src="{{$logo.'favicon.png'}}" width="50px" class="img_setting">
                                                </a>
                                            </div>
                                            <div class="choose-files mt-5 ">
                                                <label for="favicon">
                                                    <div class="mt-3 bg-primary company_favicon_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Select image') }}
                                                    </div>
                                                    <input type="file" class="form-control file" name="favicon"
                                                        id="favicon" data-filename="favicon_update" onchange="document.getElementById('favicon-logo').src = window.URL.createObjectURL(this.files[0])">
                                                </label>
                                            </div>
                                            @error('favicon')
                                                <span class="invalid-company_favicon text-xs text-danger"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-612">
                                <div class="row">
                                        <div class="col-lg-6 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {{Form::label('title_text',__('Title Text'),array('class'=>'form-label')) }}
                                                {{Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))}}
                                                @error('title_text')
                                                <span class="invalid-title_text" role="alert">
                                                     <strong class="text-danger">{{ $message }}</strong>
                                                     </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {{Form::label('default_language',__('Default Language'),array('class'=>'form-label')) }}
                                                <div class="changeLanguage">
                                                    <select name="default_language" id="default_language" class="form-control select2">
                                                        @foreach(\App\Models\Utility::languages() as $language)
                                                            <option @if($lang == $language) selected @endif value="{{$language }}">{{Str::upper($language)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                    {{Form::label('SITE_RTL',__('RTL'),array('class'=>'form-label')) }}
                                    
                                        <div class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                            <input type="checkbox"  data-toggle="switchbutton" data-onstyle="primary"  name="SITE_RTL" id="SITE_RTL" {{ env('SITE_RTL') == 'on' ? 'checked="checked"' : '' }}>
                                            <label class="form-label" for="SITE_RTL"></label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                        {{Form::label('Landing Page Display',__('Landing Page Display'),array('class'=>'form-label')) }}
                                        <div class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                            <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" name="display_landing_page" id="display_landing_page" {{ $settings['display_landing_page'] == 'on' ? 'checked="checked"' : '' }}>
                                            <label class="custom-control-label form-control-label" for="display_landing_page"></label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            {{Form::label('signup_button',__('Sign Up')) }}
                                            <div class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                <input type="checkbox"  data-toggle="switchbutton" data-onstyle="primary"  name="signup_button" id="signup_button" {{ isset($settings['signup_button']) && $settings['signup_button'] == 'on' ? 'checked="checked"' : '' }}>
                                                <label class=" form-label" for="signup_button"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            {{Form::label('gdpr_cookie',__('GDPR Cookie')) }}
                                            <div class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                <input type="checkbox"  data-toggle="switchbutton" data-onstyle="primary"  class="custom-control-input gdpr_fulltime gdpr_type" name="gdpr_cookie" id="gdpr_cookie" {{ isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : '' }}>
                                                <label class=" form-label" for="gdpr_cookie"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{Form::label('cookie_text',__('GDPR Cookie Text'),array('class'=>'fulltime form-label mb-3') )}}
                                            <textarea name="cookie_text" class="form-control fulltime" rows="2" cols="30" style="display: hidden;">{{isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-card setting-logo-box p-3">
                                    <div class="row">
                                        <h4 class="small-title">{{__('Theme Customizer')}}</h4>
                                        <div class="col-4 my-auto">
                                            <h6 class="mt-2">
                                                <i data-feather="credit-card" class="me-2"></i>{{ __('Primary color settings') }}
                                            </h6>
                                            <hr class="my-2" />
                                            <div class="theme-color themes-color">
                                                <a href="#!" class="{{($settings['color'] == 'theme-1') ? 'active_color' : ''}}" data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-1" style="display: none;">

                                                <a href="#!" class="{{($settings['color'] == 'theme-2') ? 'active_color' : ''}}" data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-2" style="display: none;">

                                                <a href="#!" class="{{($settings['color'] == 'theme-3') ? 'active_color' : ''}}" data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-3" style="display: none;">

                                                <a href="#!" class="{{($settings['color'] == 'theme-4') ? 'active_color' : ''}}" data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                <input type="radio" class="theme_color"  name="color" value="theme-4" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto mt-2">
                                            <h6 >
                                                <i data-feather="layout" class="me-2"></i>{{__('Sidebar settings')}}
                                            </h6>
                                            <hr class="my-2" />
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="cust-theme-bg" name="cust_theme_bg" {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }} />
                                                <label class="form-check-label f-w-600 pl-1" for="cust-theme-bg"
                                                >{{__('Transparent layout')}}</label
                                                >
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto mt-2">
                                            <h6 >
                                            <i data-feather="sun" class="me-2"></i>{{__('Layout settings')}}
                                            </h6>
                                            <hr class="my-2" />
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" class="form-check-input" id="cust-darklayout" name="cust_darklayout"{{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }} />
                                                <label class="form-check-label f-w-600 pl-1" for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                {{Form::submit(__('Save Changes'),array('class'=>'btn btn-print-invoice  btn-primary m-r-10'))}}
                                </div>
                            </div>
                            
                        </div>

                        </div>
                    {{Form::close()}}
            </div>

            <div id="useradd-2" class="card">
                <div class="card-header">
                    <h5>{{ __('Email settings') }}</h5>
                    <small class="text-muted">{{ __('Edit details about your Email') }}</small>
                </div>
                    {{Form::open(array('route'=>'email.settings','method'=>'post'))}}
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_driver',__('Mail Driver'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_driver',env('MAIL_DRIVER'),array('class'=>'form-control','placeholder'=>__('Enter Mail Driver')))}}
                                    @error('mail_driver')
                                    <span class="invalid-mail_driver" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_host',__('Mail Host'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_host',env('MAIL_HOST'),array('class'=>'form-control ','placeholder'=>__('Enter Mail Host')))}}
                                    @error('mail_host')
                                    <span class="invalid-mail_driver" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_port',__('Mail Port'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_port',env('MAIL_PORT'),array('class'=>'form-control','placeholder'=>__('Enter Mail Port')))}}
                                    @error('mail_port')
                                    <span class="invalid-mail_port" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_username',__('Mail Username'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_username',env('MAIL_USERNAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Username')))}}
                                    @error('mail_username')
                                    <span class="invalid-mail_username" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_password',__('Mail Password'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_password',env('MAIL_PASSWORD'),array('class'=>'form-control','placeholder'=>__('Enter Mail Password')))}}
                                    @error('mail_password')
                                    <span class="invalid-mail_password" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_encryption',__('Mail Encryption'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_encryption',env('MAIL_ENCRYPTION'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))}}
                                    @error('mail_encryption')
                                    <span class="invalid-mail_encryption" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_from_address',__('Mail From Address'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_from_address',env('MAIL_FROM_ADDRESS'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Address')))}}
                                    @error('mail_from_address')
                                    <span class="invalid-mail_from_address" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                    {{Form::label('mail_from_name',__('Mail From Name'),array('class'=>'form-label')) }}
                                    {{Form::text('mail_from_name',env('MAIL_FROM_NAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Name')))}}
                                    @error('mail_from_name')
                                    <span class="invalid-mail_from_name" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-auto">
                                        <a href="#"  data-url="{{route('test.mail')}}" data-ajax-popup="true" data-title="{{__('Send Test Mail')}}" class="send_email btn m-r-10 mt-1 btn-primary">
                                            {{__('Send Test Mail')}}
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                       {{Form::submit(__('Save Changes'),array('class'=>'btn btn-print-invoice  btn-primary m-r-10'))}}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
            </div>

            <div id="useradd-3" class="card">
                {{Form::open(array('route'=>'payment.settings','method'=>'post'))}}
                <div class="card-header">
                    <h5>{{__('Payment settings')}}</h5>
                    <small class="text-muted">{{ __('This detail will use for collect payment on plan from company . On plan company will find out pay now button based on your below configuration.') }}</small>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('currency',__('Currency *'),array('class'=>'form-label')) }}
                                    {{Form::text('currency',env('CURRENCY'),array('class'=>'form-control font-style','required','placeholder'=>__('Enter Currency')))}}
                                    @error('currency')
                                    <span class="invalid-currency" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('currency_symbol',__('Currency Symbol *'),array('class'=>'form-label')) }}
                                    {{Form::text('currency_symbol',env('CURRENCY_SYMBOL'),array('class'=>'form-control','required','placeholder'=>__('Enter Currency Symbol')))}}
                                    <small> {{__('Note: Add currency code as per three-letter ISO code.')}}<a href="https://stripe.com/docs/currencies" target="_blank">{{__(' you can find out here..')}}</a></small> <br>
                                    @error('currency_symbol')
                                    <span class="invalid-currency_symbol" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="faq">
                          <div class="accordion accordion-flush" id="accordionExample">
                              <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i> {{__('Stripe')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <div class="form-check form-switch form-switch-right mb-2"><br>
                                                <label class="form-check-label" for="is_stripe_enabled">Enable</label>
                                                <input type="hidden" name="is_stripe_enabled" value="off">
                                                <input type="checkbox" class="form-check-input mx-2" name="is_stripe_enabled" id="is_stripe_enabled" {{ isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{Form::label('stripe_key',__('Stripe Key'),array('class'=>'form-label')) }}
                                                {{Form::text('stripe_key',isset($admin_payment_setting['stripe_key'])?$admin_payment_setting['stripe_key']:'',['class'=>'form-control','placeholder'=>__('Enter Stripe Key')])}}<br>
                                                @if ($errors->has('stripe_key'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('stripe_key') }}
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{Form::label('stripe_secret',__('Stripe Secret'),array('class'=>'form-label')) }}
                                                {{Form::text('stripe_secret',isset($admin_payment_setting['stripe_secret'])?$admin_payment_setting['stripe_secret']:'',['class'=>'form-control ','placeholder'=>__('Enter Stripe Secret')])}}
                                                @if ($errors->has('stripe_secret'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('stripe_secret') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('PayPal')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-12 text-end"><br>
                                            <div class="form-check form-switch form-switch-right mb-2">
                                                <label class="form-check-label" for="is_paypal_enabled">Enable</label>
                                                <input type="hidden" name="is_paypal_enabled" value="off">
                                                <input type="checkbox" class="form-check-input mx-2" name="is_paypal_enabled" id="is_paypal_enabled" {{ isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                            <div class="row pt-2">
                                                 <label class="pb-2" for="paypal_mode">{{__('Paypal Mode')}}</label> 
                                                <div class="col-lg-3">
                                                    <div class="border card p-3">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input input-primary" name="paypal_mode" value="sandbox" {{ isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == '' || isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'checked="checked"' : '' }}>
                                                            <label class="form-check-label d-block" for="">
                                                                <span>
                                                                    <span class="h5 d-block"><strong
                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="border card p-3">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input input-primary" name="paypal_mode" value="live" {{ isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                            <label class="form-check-label d-block" for="">
                                                                <span>
                                                                    <span class="h5 d-block"><strong
                                                                    class="float-end"></strong>{{ __('Live') }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="paypal_client_id" class="form-label">{{ __('Client ID') }}</label>
                                                <input type="text" name="paypal_client_id" id="paypal_client_id" class="form-control" value="{{isset($admin_payment_setting['paypal_client_id'])?$admin_payment_setting['paypal_client_id']:''}}" placeholder="{{ __('Client ID') }}"/>
                                                @if ($errors->has('paypal_client_id'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('paypal_client_id') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="paypal_secret_key" class="form-label">{{ __('Secret Key') }}</label>
                                                <input type="text" name="paypal_secret_key" id="paypal_secret_key" class="form-control" value="{{isset($admin_payment_setting['paypal_secret_key'])?$admin_payment_setting['paypal_secret_key']:''}}" placeholder="{{ __('Secret Key') }}"/><br>
                                                @if ($errors->has('paypal_secret_key'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('paypal_secret_key') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingThree">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i> {{__('Paystack')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"  aria-labelledby="headingThree" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                    <div class="row">
                                      <div class="col-12 text-end">
                                        <div class="form-check form-switch form-switch-right mb-2"><br>
                                            <label class="form-check-label" for="is_paystack_enabled">Enable</label>
                                            <input type="hidden" name="is_paystack_enabled" value="off">
                                            <input type="checkbox" class="form-check-input mx-2" name="is_paystack_enabled" id="is_paystack_enabled" {{ isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        </div>
                                    </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="paypal_client_id" class="form-label">{{ __('Public Key') }}</label>
                                              <input type="text" name="paystack_public_key" id="paystack_public_key" class="form-control form-control-label" value="{{isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key']:''}}" placeholder="{{ __('Public Key') }}"/>
                                              @if ($errors->has('paystack_public_key'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('paystack_public_key') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="paystack_secret_key" class="form-label">{{ __('Secret Key') }}</label>
                                              <input type="text" name="paystack_secret_key" id="paystack_secret_key" class="form-control form-control-label" value="{{isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key']:''}}" placeholder="{{ __('Secret Key') }}"/><br>
                                              @if ($errors->has('paystack_secret_key'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('paystack_secret_key') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                    </div>
                                </div>    
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingFour">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i> {{__('Flutterwave')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"  aria-labelledby="headingFour" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                  <div class="row">
                                      <div class="col-12 text-end">
                                        <div class="form-check form-switch form-switch-right mb-2"><br>
                                            <label class="form-check-label" for="is_flutterwave_enabled">Enable</label>
                                            <input type="hidden" name="is_flutterwave_enabled" value="off">
                                            <input type="checkbox" class="form-check-input mx-2" name="is_flutterwave_enabled" id="is_flutterwave_enabled" {{ isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        </div>
                                    </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="paypal_client_id" class="form-label">{{ __('Public Key') }}</label>
                                              <input type="text" name="flutterwave_public_key" id="flutterwave_public_key" class="form-control" value="{{isset($admin_payment_setting['flutterwave_public_key'])?$admin_payment_setting['flutterwave_public_key']:''}}" placeholder="{{ __('Public Key') }}"/>
                                              @if ($errors->has('flutterwave_public_key'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('flutterwave_public_key') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="paystack_secret_key" class="form-label">{{ __('Secret Key') }}</label>
                                              <input type="text" name="flutterwave_secret_key" id="flutterwave_secret_key" class="form-control" value="{{isset($admin_payment_setting['flutterwave_secret_key'])?$admin_payment_setting['flutterwave_secret_key']:''}}" placeholder="{{ __('Secret Key') }}"/><br>
                                              @if ($errors->has('flutterwave_secret_key'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('flutterwave_secret_key') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                </div>  
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingFive">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                    aria-expanded="false" aria-controls="collapseFive" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('Razorpay')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"  aria-labelledby="headingFive" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                    <div class="row">
                                            <div class="col-12 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2"><br>
                                                    <label class="form-check-label" for="is_razorpay_enabled">Enable</label>
                                                    <input type="hidden" name="is_razorpay_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2" name="is_razorpay_enabled" id="is_razorpay_enabled" {{ isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                </div>
                                            </div>

                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="paypal_client_id" class="form-label">{{ __('Public Key') }}</label>

                                                  <input type="text" name="razorpay_public_key" id="razorpay_public_key" class="form-control" value="{{ isset($admin_payment_setting['razorpay_public_key'])?$admin_payment_setting['razorpay_public_key']:''}}" placeholder="{{ __('Public Key') }}"/>
                                                  @if ($errors->has('razorpay_public_key'))
                                                      <span class="invalid-feedback d-block">
                                                          {{ $errors->first('razorpay_public_key') }}
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="paystack_secret_key" class="form-label">{{ __('Secret Key') }}</label>
                                                  <input type="text" name="razorpay_secret_key" id="razorpay_secret_key" class="form-control" value="{{ isset($admin_payment_setting['razorpay_secret_key'])?$admin_payment_setting['razorpay_secret_key']:''}}" placeholder="{{ __('Secret Key') }}"/><br>
                                                  @if ($errors->has('razorpay_secret_key'))
                                                      <span class="invalid-feedback d-block">
                                                          {{ $errors->first('razorpay_secret_key') }}
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>
                                    </div>
                                </div>      
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                    <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix" >
                                        <span class="d-flex align-items-center">
                                        <i class="ti ti-credit-card text-primary"></i>{{__('Mercado Pago')}}
                                        </span>
                                    </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse"  aria-labelledby="headingSix" data-bs-parent="#accordionExample"
                                    >
                                    <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <div class="form-check form-switch form-switch-right mb-2"><br>
                                                <label class="form-check-label" for="is_mercado_enabled">Enable</label>
                                                <input type="hidden" name="is_mercado_enabled" value="off">
                                                <input type="checkbox" class="form-check-input mx-2" name="is_mercado_enabled" id="is_mercado_enabled" {{ isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                            <div class="row pt-2">
                                                <label class="pb-2" for="paypal_mode">{{__('Mercado Mode')}}</label> 
                                                <div class="col-lg-3">
                                                    <div class="border card p-3">
                                                        <div class="form-check">
                                                            <input type="radio" name="mercado_mode" class="form-check-input input-primary" value="sandbox" {{ isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == '' || isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox' ? 'checked="checked"' : '' }}>
                                                            <label class="form-check-label d-block" for="">
                                                                <span>
                                                                    <span class="h5 d-block"><strong
                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="border card p-3">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input input-primary" name="mercado_mode" value="live" {{ isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                            <label class="form-check-label d-block" for="">
                                                                <span>
                                                                    <span class="h5 d-block"><strong
                                                                    class="float-end"></strong>{{ __('Live') }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mercado_access_token" class="form-label">{{ __('Access Token') }}</label>
                                            <input type="text" name="mercado_access_token" id="mercado_app_id" class="form-control" value="{{isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token']:''}}" placeholder="{{ __('App ID') }}"/><br>
                                            @if ($errors->has('mercado_access_token'))
                                                <span class="invalid-feedback d-block">
                                                    {{ $errors->first('mercado_access_token') }}
                                                </span>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingSeven">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                    aria-expanded="false" aria-controls="collapseSeven" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('Paytm')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"  aria-labelledby="headingSeven" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                   <div class="row">
                                          <div class="col-12 text-end">
                                        <div class="form-check form-switch form-switch-right mb-2"><br>
                                            <label class="form-check-label" for="is_paytm_enabled">Enable</label>
                                            <input type="hidden" name="is_paytm_enabled" value="off">
                                            <input type="checkbox" class="form-check-input mx-2" name="is_paytm_enabled" id="is_paytm_enabled" {{ isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        </div>
                                    </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                <div class="row pt-2">
                                                     <label class="pb-2" for="paypal_mode">{{__('Paytm Environment')}}</label> 
                                                    <div class="col-lg-3">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                
                                                                <label class="form-check-label d-block" for="">
                                                                    <input type="radio" name="paytm_mode" class="form-check-input input-primary" value="local" {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == '' || isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : '' }}>
                                                                    {{__('Local')}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                
                                                                <label class="form-check-label d-block" for="">
                                                                    <input type="radio" name="paytm_mode" class="form-check-input input-primary" value="production" {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : '' }}>
                                                                    {{__('Production')}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="paytm_public_key" class="form-label">{{ __('Merchant ID') }}</label>
                                                  <input type="text" name="paytm_merchant_id" id="paytm_merchant_id" class="form-control" value="{{isset($admin_payment_setting['paytm_merchant_id'])? $admin_payment_setting['paytm_merchant_id']:''}}" placeholder="{{ __('Merchant ID') }}"/>
                                                  @if ($errors->has('paytm_merchant_id'))
                                                      <span class="invalid-feedback d-block">
                                                      {{ $errors->first('paytm_merchant_id') }}
                                                  </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="paytm_secret_key" class="form-label">{{ __('Merchant Key') }}</label>
                                                  <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" class="form-control" value="{{ isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key']:''}}" placeholder="{{ __('Merchant Key') }}"/>
                                                  @if ($errors->has('paytm_merchant_key'))
                                                      <span class="invalid-feedback d-block">
                                                      {{ $errors->first('paytm_merchant_key') }}
                                                  </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="paytm_industry_type" class="form-label"> {{ __('Industry Type') }}</label>
                                                  <input type="text" name="paytm_industry_type" id="paytm_industry_type" class="form-control" value="{{isset($admin_payment_setting['paytm_industry_type']) ?$admin_payment_setting['paytm_industry_type']:''}}" placeholder="{{ __('Industry Type') }}"/><br>
                                                  @if ($errors->has('paytm_industry_type'))
                                                      <span class="invalid-feedback d-block">
                                                      {{ $errors->first('paytm_industry_type') }}
                                                  </span>
                                                  @endif
                                              </div>
                                          </div>
                                    </div>
                                </div>    
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingEight">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                    aria-expanded="false" aria-controls="collapseEight" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('Mollie')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"  aria-labelledby="headingEight" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                  <div class="row">
                                          <div class="col-12 text-end">
                                        <div class="form-check form-switch form-switch-right mb-2"><br>
                                            <label class="form-check-label" for="is_mollie_enabled">Enable</label>
                                            <input type="hidden" name="is_mollie_enabled" value="off">
                                            <input type="checkbox" class="form-check-input mx-2" name="is_mollie_enabled" id="is_mollie_enabled" {{ isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        </div>
                                    </div> 

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="mollie_api_key" class="form-label">{{ __('Mollie Api Key') }}</label>
                                              <input type="text" name="mollie_api_key" id="mollie_api_key" class="form-control" value="{{ isset($admin_payment_setting['mollie_api_key'])?$admin_payment_setting['mollie_api_key']:''}}" placeholder="{{ __('Mollie Api Key') }}"/>
                                              @if ($errors->has('mollie_api_key'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('mollie_api_key') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="mollie_profile_id" class="form-label">{{ __('Mollie Profile Id') }}</label>
                                              <input type="text" name="mollie_profile_id" id="mollie_profile_id" class="form-control" value="{{ isset($admin_payment_setting['mollie_profile_id'])?$admin_payment_setting['mollie_profile_id']:''}}" placeholder="{{ __('Mollie Profile Id') }}"/>
                                              @if ($errors->has('mollie_profile_id'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('mollie_profile_id') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="mollie_partner_id" class="form-label">{{ __('Mollie Partner Id') }}</label>
                                              <input type="text" name="mollie_partner_id" id="mollie_partner_id" class="form-control" value="{{ isset($admin_payment_setting['mollie_partner_id'])?$admin_payment_setting['mollie_partner_id']:''}}" placeholder="{{ __('Mollie Partner Id') }}"/><br>
                                              @if ($errors->has('mollie_partner_id'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('mollie_partner_id') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                </div>  
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingNine">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                    aria-expanded="false" aria-controls="collapseNine" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('Skrill')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse"  aria-labelledby="headingNine" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                  <div class="row">
                                      <div class="col-12 text-end">
                                        <div class="form-check form-switch form-switch-right mb-2"><br>
                                            <label class="form-check-label" for="is_skrill_enabled">Enable</label>
                                            <input type="hidden" name="is_skrill_enabled" value="off">
                                            <input type="checkbox" class="form-check-input mx-2" name="is_skrill_enabled" id="is_skrill_enabled" {{ isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="mollie_api_key" class="form-label">{{ __('Skrill Email') }}</label>
                                              <input type="email" name="skrill_email" id="skrill_email" class="form-control" value="{{ isset($admin_payment_setting['skrill_email'])?$admin_payment_setting['skrill_email']:''}}" placeholder="{{ __('Mollie Api Key') }}"/><br>
                                              @if ($errors->has('skrill_email'))
                                                  <span class="invalid-feedback d-block">
                                                      {{ $errors->first('skrill_email') }}
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                </div>  
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingTen">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                    aria-expanded="false" aria-controls="collapseTen" >
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('CoinGate')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse"  aria-labelledby="headingTen" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <div class="form-check form-switch form-switch-right mb-2"><br>
                                                <label class="form-check-label" for="is_coingate_enabled">Enable</label>
                                                <input type="hidden" name="is_coingate_enabled" value="off">
                                                <input type="checkbox" class="form-check-input mx-2" name="is_coingate_enabled" id="is_coingate_enabled" {{ isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                            </div>
                                        </div> 
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                            <div class="row pt-2">
                                                 <label class="pb-2" for="paypal_mode">{{__('CoinGate Mode')}}</label> 
                                                <div class="col-lg-3">
                                                    <div class="border card p-3">
                                                        <div class="form-check">
                                                            
                                                            <label class="form-check-label d-block" for="">
                                                                <input type="radio" name="coingate_mode" class="form-check-input input-primary" value="sandbox" {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == '' || isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : '' }}>
                                                                {{__('Sandbox')}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="border card p-3">
                                                        <div class="form-check">
                                                            
                                                            <label class="form-check-label d-block" for="">
                                                                <input type="radio" class="form-check-input input-primary" name="coingate_mode" value="live" {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : '' }}>{{__('Live')}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="coingate_auth_token" class="form-label">{{ __('CoinGate Auth Token') }}</label>
                                                <input type="text" name="coingate_auth_token" id="coingate_auth_token" class="form-control" value="{{ isset($admin_payment_setting['coingate_auth_token'])?$admin_payment_setting['coingate_auth_token']:''}}" placeholder="{{ __('CoinGate Auth Token') }}"/><br>
                                                @if($errors->has('coingate_auth_token'))
                                                    <span class="invalid-feedback d-block">
                                                    {{ $errors->first('coingate_auth_token') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>
                                </div>
                                <div class="accordion-item card">
                                <h2 class="accordion-header" id="headingEleven">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven"
                                    aria-expanded="false" aria-controls="collapseEleven">
                                    <span class="d-flex align-items-center">
                                      <i class="ti ti-credit-card text-primary"></i>{{__('PaymentWall')}}
                                    </span>
                                  </button>
                                </h2>
                                <div id="collapseEleven" class="accordion-collapse collapse"  aria-labelledby="headingEleven" data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                <div class="row">
                                            <div class="col-12 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2"><br>
                                                    <label class="form-check-label" for="is_paymentwall_enabled">Enable</label>
                                                    <input type="hidden" name="is_paymentwall_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2" name="is_paymentwall_enabled" id="is_paymentwall_enabled" {{ isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paymentwall_public_key" class="form-label">{{ __('Public Key') }}</label>
                                                    <input type="text" name="paymentwall_public_key" id="paymentwall_public_key" class="form-control" value="{{isset($admin_payment_setting['paymentwall_public_key'])?$admin_payment_setting['paymentwall_public_key']:''}}" placeholder="{{ __('Public Key') }}"/>
                                                    @if ($errors->has('paymentwall_public_key'))
                                                        <span class="invalid-feedback d-block">
                                                            {{ $errors->first('paymentwall_public_key') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paymentwall_private_key" class="form-label">{{ __('Private Key') }}</label>
                                                    <input type="text" name="paymentwall_private_key" id="paymentwall_private_key" class="form-control form-control-label" value="{{isset($admin_payment_setting['paymentwall_private_key'])?$admin_payment_setting['paymentwall_private_key']:''}}" placeholder="{{ __('Private Key') }}"/><br>
                                                    @if ($errors->has('paymentwall_private_key'))
                                                        <span class="invalid-feedback d-block">
                                                            {{ $errors->first('paymentwall_private_key') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                    <div class="row">
                        <div class="form-group col-md-6 float-end">
                           {{Form::submit(__('Save Changes'),array('class'=>'btn btn-print-invoice  btn-primary m-r-10'))}}
                        </div>
                    </div>   
                </div>    
                </div>
                {{Form::close()}}
            </div>
            <div id="useradd-4" class="card">
                <form method="POST" action="{{ route('recaptcha.settings.store') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="card-header row d-flex justify-content-between">
                        <div class="col-auto">
                            <h5>{{ __('ReCaptcha settings') }}</h5>
                            <small class="text-muted"><a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/" target="_blank" class="text-muted">
                                    ({{__('How to Get Google reCaptcha Site and Secret key')}})                            
                                </a>
                            </small><br>
                        </div>
                        <div class="col-auto">
                            <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" name="recaptcha_module" id="recaptcha_module" value="yes" {{ env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : '' }}> 
                        </div>                 
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <label for="google_recaptcha_key" class="form-label">{{ __('Google Recaptcha Key') }}</label>
                                        <input class="form-control" placeholder="{{ __('Enter Google Recaptcha Key') }}" name="google_recaptcha_key" type="text" value="{{env('NOCAPTCHA_SITEKEY')}}" id="google_recaptcha_key">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <label for="google_recaptcha_secret" class="form-label">{{ __('Google Recaptcha Secret') }}</label>
                                        <input class="form-control " placeholder="{{ __('Enter Google Recaptcha Secret') }}" name="google_recaptcha_secret" type="text" value="{{env('NOCAPTCHA_SECRET')}}" id="google_recaptcha_secret">
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="form-group col-md-6 float-end">
                            {{Form::submit(__('Save Changes'),array('class'=>'btn btn-print-invoice  btn-primary m-r-10'))}}
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
            <div id="useradd-13" class="card mb-3">
                {{ Form::open(array('route' => 'storage.setting.store', 'enctype' => "multipart/form-data")) }}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <h5 class="">{{ __('Storage Settings') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="pe-2">
                                <input type="radio" class="btn-check" name="storage_setting" id="local-outlined" autocomplete="off" {{  $setting['storage_setting'] == 'local'?'checked':'' }} value="local" checked>
                                <label class="btn btn-outline-success" for="local-outlined">{{ __('Local') }}</label>
                            </div>
                            <div  class="pe-2">
                                <input type="radio" class="btn-check" name="storage_setting" id="s3-outlined" autocomplete="off" {{  $setting['storage_setting']=='s3'?'checked':'' }}  value="s3">
                                <label class="btn btn-outline-success" for="s3-outlined"> {{ __('AWS S3') }}</label>
                            </div>

                            <div  class="pe-2">
                                <input type="radio" class="btn-check" name="storage_setting" id="wasabi-outlined" autocomplete="off" {{  $setting['storage_setting']=='wasabi'?'checked':'' }} value="wasabi">
                                <label class="btn btn-outline-success" for="wasabi-outlined">{{ __('Wasabi') }}</label>
                            </div>
                        </div>
                        <div  class="mt-2">
                        <div class="local-setting row {{  $setting['storage_setting']=='local'?' ':'d-none' }}">
                            <div class="col-lg-6 col-md-11 col-sm-12">
                                {{Form::label('local_storage_validation',__('Only Upload Files'),array('class'=>' form-label')) }}
                                <select name="local_storage_validation[]" class="form-control" name="choices-multiple-remove-button" id="choices-multiple-remove-button" placeholder="This is a placeholder" multiple>
                                    @foreach($file_type as $f)
                                    <option @if (in_array($f, $local_storage_validations)) selected @endif>{{$f}}</option>
                                @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-lg-6 col-md-11 col-sm-12">
                                <select class="form-control" name="choices-multiple-remove-button" id="choices-multiple-remove-button" placeholder="This is a placeholder" multiple>
                                    <option value="Choice 1" selected>Choice 1</option>
                                    <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option>
                                    <option value="Choice 4">Choice 4</option>
                                </select>
                            </div> --}}
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="local_storage_max_upload_size">{{ __('Max upload size ( In MB)')}}</label>
                                    <input type="number" name="local_storage_max_upload_size" class="form-control" value="{{(!isset($setting['local_storage_max_upload_size']) || is_null($setting['local_storage_max_upload_size'])) ? '' : $setting['local_storage_max_upload_size']}}" placeholder="{{ __('Max upload size') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="s3-setting row {{  $setting['storage_setting']=='s3'?' ':'d-none' }}">
                            
                            <div class=" row ">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_key">{{ __('S3 Key') }}</label>
                                        <input type="text" name="s3_key" class="form-control" value="{{(!isset($setting['s3_key']) || is_null($setting['s3_key'])) ? '' : $setting['s3_key']}}" placeholder="{{ __('S3 Key') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_secret">{{ __('S3 Secret') }}</label>
                                        <input type="text" name="s3_secret" class="form-control" value="{{(!isset($setting['s3_secret']) || is_null($setting['s3_secret'])) ? '' : $setting['s3_secret']}}" placeholder="{{ __('S3 Secret') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_region">{{ __('S3 Region') }}</label>
                                        <input type="text" name="s3_region" class="form-control" value="{{(!isset($setting['s3_region']) || is_null($setting['s3_region'])) ? '' : $setting['s3_region']}}" placeholder="{{ __('S3 Region') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_bucket">{{ __('S3 Bucket') }}</label>
                                        <input type="text" name="s3_bucket" class="form-control" value="{{(!isset($setting['s3_bucket']) || is_null($setting['s3_bucket'])) ? '' : $setting['s3_bucket']}}" placeholder="{{ __('S3 Bucket') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_url">{{ __('S3 URL')}}</label>
                                        <input type="text" name="s3_url" class="form-control" value="{{(!isset($setting['s3_url']) || is_null($setting['s3_url'])) ? '' : $setting['s3_url']}}" placeholder="{{ __('S3 URL')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_endpoint">{{ __('S3 Endpoint')}}</label>
                                        <input type="text" name="s3_endpoint" class="form-control" value="{{(!isset($setting['s3_endpoint']) || is_null($setting['s3_endpoint'])) ? '' : $setting['s3_endpoint']}}" placeholder="{{ __('S3 Bucket') }}">
                                    </div>
                                </div>
                                <div class="form-group col-8 switch-width">
                                    {{Form::label('s3_storage_validation',__('Only Upload Files'),array('class'=>' form-label')) }}
                                        <select name="s3_storage_validation[]"  class="form-control" name="choices-multiple-remove-button" id="choices-multiple-remove-button1" placeholder="This is a placeholder" multiple>
                                            @foreach($file_type as $f)
                                                <option @if (in_array($f, $s3_storage_validations)) selected @endif>{{$f}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_max_upload_size">{{ __('Max upload size ( In MB)')}}</label>
                                        <input type="number" name="s3_max_upload_size" class="form-control" value="{{(!isset($setting['s3_max_upload_size']) || is_null($setting['s3_max_upload_size'])) ? '' : $setting['s3_max_upload_size']}}" placeholder="{{ __('Max upload size') }}">
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="wasabi-setting row {{  $setting['storage_setting']=='wasabi'?' ':'d-none' }}">
                            <div class=" row ">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_key">{{ __('Wasabi Key') }}</label>
                                        <input type="text" name="wasabi_key" class="form-control" value="{{(!isset($setting['wasabi_key']) || is_null($setting['wasabi_key'])) ? '' : $setting['wasabi_key']}}" placeholder="{{ __('Wasabi Key') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_secret">{{ __('Wasabi Secret') }}</label>
                                        <input type="text" name="wasabi_secret" class="form-control" value="{{(!isset($setting['wasabi_secret']) || is_null($setting['wasabi_secret'])) ? '' : $setting['wasabi_secret']}}" placeholder="{{ __('Wasabi Secret') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="s3_region">{{ __('Wasabi Region') }}</label>
                                        <input type="text" name="wasabi_region" class="form-control" value="{{(!isset($setting['wasabi_region']) || is_null($setting['wasabi_region'])) ? '' : $setting['wasabi_region']}}" placeholder="{{ __('Wasabi Region') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="wasabi_bucket">{{ __('Wasabi Bucket') }}</label>
                                        <input type="text" name="wasabi_bucket" class="form-control" value="{{(!isset($setting['wasabi_bucket']) || is_null($setting['wasabi_bucket'])) ? '' : $setting['wasabi_bucket']}}" placeholder="{{ __('Wasabi Bucket') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="wasabi_url">{{ __('Wasabi URL')}}</label>
                                        <input type="text" name="wasabi_url" class="form-control" value="{{(!isset($setting['wasabi_url']) || is_null($setting['wasabi_url'])) ? '' : $setting['wasabi_url']}}" placeholder="{{ __('Wasabi URL')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="wasabi_root">{{ __('Wasabi Root')}}</label>
                                        <input type="text" name="wasabi_root" class="form-control" value="{{(!isset($setting['wasabi_root']) || is_null($setting['wasabi_root'])) ? '' : $setting['wasabi_root']}}" placeholder="{{ __('Wasabi Bucket') }}">
                                    </div>
                                </div>
                                <div class="form-group col-8 switch-width">
                                    {{Form::label('wasabi_storage_validation',__('Only Upload Files'),array('class'=>'form-label')) }}

                                    <select name="wasabi_storage_validation[]" class="form-control" name="choices-multiple-remove-button" id="choices-multiple-remove-button2" placeholder="This is a placeholder" multiple>
                                        @foreach($file_type as $f)
                                            <option @if (in_array($f, $wasabi_storage_validations)) selected @endif>{{$f}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="wasabi_root">{{ __('Max upload size ( In MB)')}}</label>
                                        <input type="number" name="wasabi_max_upload_size" class="form-control" value="{{(!isset($setting['wasabi_max_upload_size']) || is_null($setting['wasabi_max_upload_size'])) ? '' : $setting['wasabi_max_upload_size']}}" placeholder="{{ __('Max upload size') }}">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <input class="btn btn-print-invoice  btn-primary m-r-10" type="submit" value="{{ __('Save Changes') }}">
                            {{Form::close()}}
                        </div>
                    </div><br>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/repeater.js') }}"></script>
