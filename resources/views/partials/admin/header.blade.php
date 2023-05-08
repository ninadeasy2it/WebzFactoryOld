@php
    $logo=\App\Models\Utility::get_file('uploads/logo/');
    $company_favicon=Utility::getValByName('company_favicon');
@endphp

<head>
    <title>@yield('page-title') - @if(Auth::user()->type == 'super admin')  {{config('app.name', 'vCard SaaS')}} @else {{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'vCard SaaS')}} @endif</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8"  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    @if(Auth::user()->type == 'super admin')
        <link rel="icon" href="{{$logo.'/favicon.png'}}" type="image" sizes="16x16">
    @else
        <link rel="icon" href="{{ $logo . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}" type="image" sizes="16x16">
    @endif

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{asset('custom/libs/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('custom/libs/select2/dist/css/select2.min.css')}}">
     @stack('css-page')
  
    
    <!-- vendor css -->
    @if ($setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    @if( isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/css/emojionearea.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-switch-button.min.css')}}">
    <script src="{{asset('custom/js/jquery.min.js')}}"></script>
    
</head>


