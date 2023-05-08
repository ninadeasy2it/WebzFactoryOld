@php
    // $logo=asset(Storage::url(''));
    $company_logo = \App\Models\Utility::GetLogo();
    $logo=\App\Models\Utility::get_file('uploads/logo/');
    // dd($company_logo);
@endphp


<!-- [ navigation menu ] start -->

@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
@else
    <nav class="dash-sidebar light-sidebar">
@endif
{{-- <nav class="dash-sidebar light-sidebar {{($layout_setting['cust_theme_bg'] == 'off' &&  $layout_setting['SITE_RTL'] != 'on') ? '' : 'transprent-bg'}}"> --}}
    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="index.html" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                {{-- @if(Auth::user()->type == 'super admin') --}}
                    {{-- <img src="{{$logo.'/'.$company_logo}}" class="logo logo-lg" alt="..."> --}}
                    {{-- <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                alt="{{ config('app.name', 'AccountGo') }}" class="logo logo-lg"> --}}
                {{-- <img id="dark-logo" alt="your image" src="{{$logo.'logo-dark.png'}}" width="150px" class="big-logo">
                @else
                    {{-- <img src="{{asset(Storage::url($company_logo))}}" class="logo logo-lg" alt="...">
                    <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                alt="{{ config('app.name', 'AccountGo') }}" class="logo logo-lg">
                @endif --}}
                <!--  <img src="{{ asset('assets/images/logo-light.png') }}" alt="" class="logo logo-lg" /> -->
                <!-- <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="" class="logo logo-sm" /> -->
                  <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                alt="{{ config('app.name', 'AccountGo') }}" class="logo logo-lg">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="dash-navbar">
                <li class="dash-item {{ (Request::segment(1) == 'home' || Request::segment(1) == '' ||Request::segment(1) == 'dashboard')?'active':''}}">
                    <a href="{{route('home')}}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-home"></i></span><span class="dash-mtext">{{ __('Dashboard') }}</span></a>

                </li>
                @if(Auth::user()->type =='company')
                <li class="dash-item {{ (Request::segment(1) == 'business')?'active':''}}">
                    <a href="{{route('business.index')}}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-credit-card"></i></span><span class="dash-mtext">{{ __('Business') }}</span></a>

                </li>
                <li class="dash-item {{ (Request::segment(1) == 'appointments')?'active':''}}">
                    <a href="{{route('appointments.index')}}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-calendar-time"></i></span><span class="dash-mtext">{{ __('Appointments') }}</span></a>

                </li>
                <li class="dash-item {{ (Request::segment(1) == 'contacts')?'active':''}}">
                    <a href="{{route('contacts.index')}}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-phone"></i></span><span class="dash-mtext">{{ __('Contacts') }}</span></a>

                </li>
                <li class="dash-item {{ (Request::segment(1) == 'appointment-calendar')?'active':''}}">
                    <a href="{{route('appointment.calendar')}}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-calendar"></i></span><span class="dash-mtext">{{ __('Calendar') }}</span></a>

                </li>
                @endif
                @if(Auth::user()->type == 'super admin')
                    <li class="dash-item {{ (Request::segment(1) == 'users')?'active':''}}">
                    <a href="{{ route('users.index') }}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Users') }}</span></a>

                    </li>
                    
                    <li class="dash-item {{ (Request::segment(1) == 'business')?'active':''}}">
                        <a href="{{route('business.index')}}" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-credit-card"></i></span><span class="dash-mtext">{{ __('Business') }}</span></a>

                    </li>
                    
                    
                @endif
                    {{-- <li class="dash-item {{ (Request::segment(1) == 'plans')?'active':''}}"> --}}
                    <li class="dash-item {{ (\Request::route()->getName() == 'plans') || (\Request::route()->getName() == 'stripe') ?'active':''}}">
                    <a href="{{ route('plans.index') }}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-award "></i></span><span class="dash-mtext">{{ __('Plans') }}</span></a>

                    </li>
                @if(Auth::user()->type == 'super admin')
                    <li class="dash-item {{ (Request::route()->getName() == 'plan_request.index') ? 'active' : '' }}">
                    <a href="{{ route('plan_request.index') }}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-brand-telegram"></i></span><span class="dash-mtext">{{__('Plan Request')}}</span></a>

                    </li>
                    <li class="dash-item {{ (Request::segment(1) == 'coupons')?'active':''}}">
                    <a href="{{ route('coupons.index') }}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-gift"></i></span><span class="dash-mtext">{{ __('Coupons') }}</span></a>

                    </li>

                    <li class="dash-item {{ (Request::segment(1) == 'order')?'active':''}}">
                    <a href="{{ route('order.index') }}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-shopping-cart"></i></span><span class="dash-mtext">{{__('Order')}}</span></a>

                    </li>
                    <li class="dash-item {{ (Request::segment(1) == 'email_template_lang')?'active':''}}">
                        <a href="{{route('manage.email.language',\Auth::user()->lang)}}" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-mail"></i></span><span class="dash-mtext">{{ __('Email Template') }}</span></a>

                        </li>
                @endif


                <li class="dash-item {{ (Request::segment(1) == 'systems')?'active':''}}">
                    <a href="{{route('systems.index')}}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-settings"></i></span><span class="dash-mtext">{{ __('Setting') }}</span></a>

                    </li>
            <!-- </li> -->




            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
