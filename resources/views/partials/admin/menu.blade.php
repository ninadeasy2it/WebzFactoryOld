@php
$users = \Auth::user();
// $profile = asset(Storage::url('uploads/avatar/'));
$profile=\App\Models\Utility::get_file('uploads/avatar/');
// $logo = asset(Storage::url('uploads/logo/'));

$logo=\App\Models\Utility::get_file('uploads/logo/');
// dd($logo);
$company_logo = Utility::getValByName('company_logo');
$company_small_logo = Utility::getValByName('company_small_logo');
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
// $layout_setting = App\Models\Utility::getLayoutsSetting();

@endphp
  <!-- [ Header ] start -->
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <header class="dash-header transprent-bg">
@else
    <header class="dash-header">
@endif
 {{-- <header class="dash-header light-sidebar {{($layout_setting['cust_theme_bg'] == 'off' && $layout_setting['SITE_RTL'] != 'on') ? '' : 'transprent-bg'}} "> --}}
    <div class="header-wrapper">
        <div class="me-auto dash-mob-drp">
          <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
              <a href="#!" class="dash-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                  <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                  </div>
                </div>
              </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
              <a
                class="dash-head-link dropdown-toggle arrow-none me-0"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                aria-expanded="false"
              >
                <span class="theme-avtar avatar avatar-sm rounded-circle">
                  <img src="{{ !empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png' }}" /></span>
                <span class="hide-mob ms-2">{{ __('Hi') }}, {{ \Auth::user()->name }}</span>
                <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
              </a>
              <div class="dropdown-menu dash-h-dropdown">
                <a href="{{ route('profile') }}" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>{{__('Profile')}}</span>
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                  <i class="ti ti-power"></i>
                  <span>{{__('Logout')}}</span>
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                            {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </div>
        <div class="ms-auto">
          <ul class="list-unstyled">
            <li class="dropdown dash-h-item drp-language">
              <a
                class="dash-head-link dropdown-toggle arrow-none me-0"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                aria-expanded="false"
              >
                <i class="ti ti-world nocolor"></i>
                <span class="drp-text hide-mob">{{Str::upper($currantLang)}}</span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
              </a>
              <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                @foreach ($languages as $language)
                <a href="{{ route('change.language', $language) }}" class="dropdown-item @if ($language == $currantLang) text-danger @endif">

                  <span>{{ Str::upper($language) }}</span>
                </a>
                @endforeach
                @if (Auth::user()->type == 'super admin')
                    <a class="dropdown-item text-primary"
                        href="{{ route('manage.language', [$currantLang]) }}">{{ __('Manage Language') }}</a>
                @endif
              </div>
            </li>
          </ul>
        </div>


    </div>
  </header>
  <!-- [ Header ] end -->
