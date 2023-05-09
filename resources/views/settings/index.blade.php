@extends('layouts.admin')
@section('page-title')
    {{__('Settings')}}
@endsection
@php
    $logo=\App\Models\Utility::get_file('uploads/logo/');
    $lang=\App\Models\Utility::getValByName('default_language');
    $logo_img=\App\Models\Utility::getValByName('company_logo');
    $logo_light_img=\App\Models\Utility::getValByName('company_logo_light');
    // dd($logo_light_img);
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    // dd($logo_favicon);
    $setting = App\Models\Utility::getLayoutsSetting(); 
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('Settings')}}</li>
@endsection
@section('title')
    {{__('Settings')}}
@endsection
@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="row">
        <div class="col-xl-3">
            <div class="card sticky-top" style="top:30px">
                <div class="list-group list-group-flush" id="useradd-sidenav">
                    <a href="#useradd-1" class="list-group-item list-group-item-action active
                     border-0">{{ __('Site Setting') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>   
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="useradd-1" class="card">
                {{Form::model($settings,array('route'=>'company.settings.store','method'=>'POST','enctype' => "multipart/form-data"))}}
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
                                    <div class="card-body min-250">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-4">
                                                {{-- <a href="{{asset(Storage::url($logo_img))}}" target="_blank">
                                                    <img src="{{asset(Storage::url($logo_img))}}" class="big-logo" id="company_logo_update">    
                                                </a> --}}
                                                {{-- <a href="{{$logo.'logodark.png'}}" target="_blank">
                                                    <img id="blah" alt="your image" src="{{$logo.'logo_dark.png'}}" width="150px" class="big-logo">
                                                </a> --}}
                                                {{--<a href="{{$logo.(isset($logo_img) && !empty($logo_img)? $logo_img:'logo-dark.png')}}" target="_blank">
                                                    <img id="company_logo_update" alt="your image" src="{{$logo.(isset($logo_img) && !empty($logo_img)? $logo_img:'logo-dark.png')}}" width="150px" class="big-logo">
                                                </a>--}}
                                                
                                                <a href="{{$logo.(isset($logo_img) && !empty($logo_img)? $logo_img:'logo-dark.png')}}" target="_blank">
                                                    <img id="blah" alt="your image" src="{{$logo.(isset($logo_img) && !empty($logo_img)? $logo_img:'logo-dark.png')}}" width="150px" class="big-logo">
                                                </a>
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_logo">
                                                    <div class="mt-4 bg-primary company_logo_update"> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Select image') }}</div>
                                                    <input type="file" class="form-control file" name="company_logo" id="company_logo"
                                                        data-filename="edit-logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                                                </label>
                                            </div>
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
                                    <div class="card-body min-250">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-4">
                                                {{-- <a href="{{asset(Storage::url($logo_light_img))}}" target="_blank">
                                                    <img src="{{asset(Storage::url($logo_light_img))}}" class="big-logo1 img_setting" alt="" id="logo-light">
                                                </a> --}}

                                                <a href="{{$logo.(isset($logo_light_img) && !empty($logo_light_img)?$logo_light_img:'company_logo_light.png')}}" target="_blank">
                                                    <img id="blah1" alt="your image" src="{{$logo.(isset($logo_light_img) && !empty($logo_light_img)?$logo_light_img:'company_logo_light.png')}}" width="150px" class="big-logo img_setting">
                                                </a>
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="logo_light">
                                                    <div class="mt-4 bg-primary company_favicon_update"> <i class="ti ti-upload px-1"></i>{{ __('Select image') }}
                                                    </div>
                                                    <input type="file" class="form-control file" name="company_logo_light"
                                                        id="logo_light" data-filename="logo_light_update" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                </label>
                                            </div>
                                            @error('logo-light')
                                                <span class="invalid-company_favicon text-xs text-danger"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ __('Favicon') }}</h5>
                                    </div>
                                    <div class="card-body min-250">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-4">
                                                <a href="{{$logo.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" target="_blank">
                                                    <img id="blah2" alt="your image" src="{{$logo.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" width="20%" class="img_setting">
                                                </a>

                                                <!-- <img src="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" width="50px"
                                                    class="big-logo img_setting" width="150px"> -->
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_favicon">
                                                    <div class="mt-3 bg-primary company_favicon_update "> <i
                                                            class="ti ti-upload px-1"></i>{{ __('Select image') }}
                                                    </div>
                                                    <input type="file" name="company_favicon" id="company_favicon" class="form-control file" data-filename="company_favicon_update" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">


                                                    <!-- <input type="file" class="form-control file"  id="company_favicon" name="company_favicon"
                                                        data-filename="company_favicon_update"> -->
                                                </label>
                                            </div>
                                            @error('logo')
                                            <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                    <div class="col-md-12 col-lg-4 col-sm-12">
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
                                <div class="col-md-12 col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        {{Form::label('timezone',__('Timezone'),array('class'=>'form-label'))}}
                                        <select type="text" name="timezone" class="form-control" id="timezone"> 
                                            <option value="">{{__('Select Timezone')}}</option>
                                            @foreach($timezones as $k=>$timezone)
                                                <option value="{{$k}}" {{(env('APP_TIMEZONE')==$k)?'selected':''}}>{{$timezone}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-4 col-sm-12">
                                    <div class="form-group">
                                    {{Form::label('SITE_RTL',__('RTL'),array('class'=>'form-label')) }}
                                    
                                        <div class="d-flex align-items-center  justify-content-between border-0 borderleft">
                                            <input type="checkbox"  data-toggle="switchbutton" data-onstyle="primary"  name="SITE_RTL" id="SITE_RTL" {{ $setting['SITE_RTL'] == 'on' ? 'checked="checked"' : '' }}>
                                            <label class="form-label" for="SITE_RTL"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{Form::label('company_email',__('System Email'),array('class'=>'form-label')) }}
                                        <small>{{ __('(Note: For appointment mail send.)') }}</small>
                                        {{Form::text('company_email',null,array('class'=>'form-control','placeholder'=>__('System Email')))}}
                                        @error('company_email')
                                        <span class="invalid-title_text" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{Form::label('company_email_from_name',__('Email (From Name)'),array('class'=>'form-label')) }}
                                        <small>{{ __('(Note: For appointment mail send.)') }}</small>
                                        {{Form::text('company_email_from_name',null,array('class'=>'form-control','placeholder'=>__('Email (From Name)')))}}
                                        @error('company_email_from_name')
                                        <span class="invalid-title_text" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                        @enderror
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
                                            <input type="hidden" name="color" id="color_value" value="{{ $settings['color'] }}">
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
                            <div class="card-footer">
                                <div class="col-sm-12">
                                    <div class="text-end">
                                        <input type="submit" value="{{__('Save Changes')}}" class="btn btn-lg btn-primary">
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <!-- <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                <h4 class="h4 font-weight-400 float-left pb-2">{{__('Site settings')}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title">{{__('Logo')}}</h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="logo-content">
                                        <img src="{{asset(Storage::url($logo_img))}}" class="big-logo filter" alt=""/>
                                    </div>
                                    <div class="choose-file mt-4">
                                        <label for="logo">
                                            <div>{{__('Choose file here')}}</div>
                                            <input type="file" class="form-control" name="logo" id="logo" data-filename="edit-logo">
                                        </label>
                                        <p class="edit-logo"></p>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title">{{__('Favicon')}}</h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="logo-content">
                                    </div>
                                    <div class="choose-file mt-5">
                                        <label for="small-favicon">
                                            <div>{{__('Choose file here')}}</div>
                                            <input type="file" class="form-control" name="favicon" id="small-favicon" data-filename="edit-favicon">
                                        </label>
                                        <p class="edit-favicon"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title">{{__('Settings')}}</h4>
                                <div class="card setting-card">
                                    <div class="form-group">
                                        {{Form::label('title_text',__('Title Text'),array('class'=>'form-control-label')) }}
                                        {{Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))}}
                                        @error('title_text')
                                        <span class="invalid-title_text" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('company_email',__('System Email'),array('class'=>'form-control-label')) }}
                                        <small>{{ __('(Note: For appointment mail send.)') }}</small>
                                        {{Form::text('company_email',null,array('class'=>'form-control','placeholder'=>__('System Email')))}}
                                        @error('company_email')
                                        <span class="invalid-title_text" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('company_email_from_name',__('Email (From Name)'),array('class'=>'form-control-label')) }}
                                        <small>{{ __('(Note: For appointment mail send.)') }}</small>
                                        {{Form::text('company_email_from_name',null,array('class'=>'form-control','placeholder'=>__('Email (From Name)')))}}
                                        @error('company_email_from_name')
                                        <span class="invalid-title_text" role="alert">
                                             <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('timezone',__('Timezone'))}}
                                        <select type="text" name="timezone" class="form-control" id="timezone"> 
                                            <option value="">{{__('Select Timezone')}}</option>

                                            @foreach($timezones as $k=>$timezone)
                                                <option value="{{$k}}" {{(env('APP_TIMEZONE')==$k)?'selected':''}}>{{$timezone}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12 text-right">
                                <input type="submit" value="{{__('Save Changes')}}" class="btn-submit">
                            </div>
                        </div> -->
                        {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- [ sample-page ] end -->
</div>
    <!-- [ Main Content ] end -->
</div>
@endsection

@push('custom-scripts')

    <script>
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

        function check_theme(color_val) {

            $('.theme-color').prop('checked', false);
            $('input[value="'+color_val+'"]').prop('checked', true);
            $('#color_value').val(color_val);
        }
    </script>
@endpush