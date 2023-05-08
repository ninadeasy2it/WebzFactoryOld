@extends('layouts.auth')
@section('page-title')
{{__('Register')}}
@endsection


@php
$Subcategory=\App\Models\Utility::get_business_Subcategory();
@endphp



<script src="{{asset('custom/js/jquery.min.js')}}"></script>


<link rel="stylesheet" href="{{asset('custom/libs/select2/dist/css/select2.min.css')}}">


@section('language-bar')
<li class="nav-item bth-primary">
	<select name="language" id="language" class="form-control btn-primary mr-2 my-2 me-2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
		@foreach( Utility::languages() as $language)
		<option @if($lang==$language) selected @endif value="{{ route('register',$language) }}">{{Str::upper($language)}}</option>
		@endforeach
	</select>
</li>
@endsection

@push('custom-scripts')
@if(env('RECAPTCHA_MODULE') == 'yes')
{!! NoCaptcha::renderJs() !!}
@endif
@endpush
@php
$logo=asset(Storage::url('uploads/logo/'));
$company_logo=Utility::getValByName('company_logo');
@endphp
@section('content')


<div class="card">
	<div class="row align-items-center">
		<div class="col-xl-6">
			{{Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm'))}}
			<div class="card-body">
				<div class="">
					<h2 class="mb-3 f-w-600">{{ __('Register') }}</h2>
				</div>
				<div class="">
					<div class="form-group mb-3">
						<label class="form-label">{{ __('Full Name') }}</label>
						{{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Your Name')))}}
					</div>
					@error('name')
					<span class="error invalid-name text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
					<div class="form-group mb-3">
						<label class="form-label">{{ __('Email') }}</label>
						{{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))}}
					</div>
					@error('email')

					<span class="error invalid-email text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<div class="row mt-2">
						<div class="col-12">
							<div class="form-group mb-3">
								{{Form::label('Business',__('Business'),['class'=>'form-control-label'])}}
								{{Form::text('title',null,array('class'=>'form-control mt-2'))}}
								@error('title')
								<span class="invalid-favicon text-xs text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
					</div>


					<div class="form-group mb-3">
						{{ Form::label('category_id', __('Occupation Category'), ['class' => 'form-label']) }}
						<div class="category_id">
							<select name="category_id" id="category_id" class="form-control select2" onchange="get_business_Subcategory(this.value);" placeholder="Select a Occupation Category">
								<option value=""></option>
								@foreach(\App\Models\Utility::get_business_category() as $business_category)
								<option value="{{$business_category->category_id }}">{{Str::upper($business_category->name)}}</option>
								@endforeach
							</select>
						</div>
					</div>



					<div class="form-group mb-3">
						{{ Form::label('subcategory_id', __('Occupation Subcategory'), ['class' => 'form-label']) }}
						<div class="subcategory_id">
							<select name="subcategory_id" id="subcategory_id" class="form-control select2" placeholder="Select a Occupation Subcategory">
								<option value=""></option>
							</select>
						</div>
					</div>




					<div class="form-group mb-3">
						<label class="form-label">{{ __('Password') }}</label>
						{{Form::password('password',array('class'=>'form-control','id'=>'input-password','placeholder'=>__('Enter Your Password')))}}
					</div>
					@error('password')
					<span class="error invalid-password text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
					<div class="form-group">
						<label class="form-label">{{__('Confirm Password')}}</label>
						{{Form::password('password_confirmation',array('class'=>'form-control','id'=>'confirm-input-password','placeholder'=>__('Confirm Your Password')))}}
						{{-- <div class="input-group-append">
								<span class="input-group-text">
									<a href="#" data-toggle="password-text" data-target="#confirm-input-password">
									<i class="fas fa-eye"></i>
									</a>
								</span>
							</div> --}}
						@error('password_confirmation')
						<span class="error invalid-password_confirmation text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					@if(env('RECAPTCHA_MODULE') == 'yes')
					<div class="form-group col-lg-12 col-md-12 mt-3">
						{!! NoCaptcha::display() !!}
						@error('g-recaptcha-response')
						<span class="small text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					@endif
					<div class="d-grid">
						<button class="btn btn-primary btn-block mt-2">{{ __('Register') }}</button>
					</div>

				</div>
				<p class="mb-2 my-4 text-center">{{ __('Already have an account?') }} <a href="{{ route('login') }}" class="f-w-400 text-primary">{{ __('Login') }}</a></p>
			</div>
		</div>
		<div class="col-xl-6 img-card-side">
			<div class="auth-img-content">
				<img src="{{asset('assets/images/auth/img-auth-3.svg')}}" alt="" class="img-fluid">
				<h3 class="text-white mb-4 mt-5">{{ __('“Attention is the new currency”') }}</h3>
				<p class="text-white">{{ __('The more effortless the writing looks, the more effort the writer
					actually put into the process.')}}</p>
			</div>
		</div>
	</div>
</div>
@endsection
{{--

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Bootstrap 5 Admin Template</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8" />
	<meta
	  name="viewport"
	  content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
	/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Dashboard Template Description" />
	<meta name="keywords" content="Dashboard Template" />
	<meta name="author" content="Rajodiya Infotech" />

	<!-- Favicon icon -->
	<link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />

	<!-- font css -->
	<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
	<link rel="stylesheet" href="../assets/fonts/feather.css">
	<link rel="stylesheet" href="../assets/fonts/fontawesome.css">
	<link rel="stylesheet" href="../assets/fonts/material.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link">
	<link rel="stylesheet" href="../assets/css/customizer.css">


</head>

<body class="theme-1">
	<!-- [ auth-signup ] start -->
	<div class="auth-wrapper auth-v3">
		<div class="bg-auth-side bg-primary"></div>
		<div class="auth-content">
			<nav class="navbar navbar-expand-md navbar-light default">
				<div class="container-fluid pe-2">
					<a class="navbar-brand" href="#">
						<img src="../assets/images/logo-dark.svg" alt="logo">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
						<ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" href="#">Pages</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Authentication</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Application</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Ecommerce</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Docs</a>
							</li>
						</ul>
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="btn btn-primary my-1 me-2" href="#">Buy now</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="card">
				<div class="row align-items-center text-start">
					<div class="col-xl-6">
						<div class="card-body">
							<div class="">
								<h2 class="mb-3 f-w-600">Welcome</h2>
								<p class="mb-4 text-muted">Use these awesome forms to login or create new account in your project for free.</p>
								<h6 class="mb-3">Register with</h6>
							</div>
							<div class="">
								<div class="form-group mb-3">
									<label class="form-label">Enter Username</label>
									<input type="text" class="form-control" placeholder="Username">
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Enter Email address</label>
									<input type="email" class="form-control" placeholder="Email address">
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Enter Password</label>
									<input type="password" class="form-control" placeholder="Password">
								</div>
								<div class="form-group mb-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
											checked>
										<label class="form-check-label" for="flexCheckChecked">
											I accept the <a href="#!"> Term & condition</a>
										</label>
									</div>
								</div>
								<div class="d-grid">
									<button class="btn btn-primary btn-block mt-2">Sign Up</button>
								</div>
								<p class="my-4">or register with</p>
								<div class="row mb-4">
									<div class="col-4">
										<div class="d-grid"><button class="btn btn-light"><img src="../assets/images/auth/img-facebook.svg" alt="" class="img-fluid wid-25"></button></div>
									</div>
									<div class="col-4">
										<div class="d-grid"><button class="btn btn-light"><img src="../assets/images/auth/img-apple.svg" alt="" class="img-fluid wid-25"></button></div>
									</div>
									<div class="col-4">
										<div class="d-grid"><button class="btn btn-light"><img src="../assets/images/auth/img-google.svg" alt="" class="img-fluid wid-25"></button></div>
									</div>
								</div>
							</div>
							<p class="mb-2 ">Already have an account? <a href="#" class="f-w-400">Signin</a></p>
						</div>
					</div>
					<div class="col-xl-6 img-card-side">
						<div class="auth-img-content">
							<img src="../assets/images/auth/img-auth-3.svg" alt="" class="img-fluid">
							<h3 class="text-white mb-4 mt-5">“Attention is the new currency”</h3>
							<p class="text-white">The more effortless the writing looks, the more effort the writer
								actually put into the process.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="auth-footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<img src="../assets/images/logo-dark.svg" alt="logo">
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline mb-1">
								<li class="list-inline-item">
									<a href="#" class="link-light">Joseph</a>
								</li>
								<li class="list-inline-item">
									<a href="#" class="link-light">About Us</a>
								</li>
								<li class="list-inline-item">
									<a href="#" class="link-light">Blog</a>
								</li>
								<li class="list-inline-item">
									<a href="#" class="link-light">Library</a>
								</li>
							</ul>
							<p class="text-white">© 2022, made with love for a better web. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html> --}}
{{--
<div class="form-group auth-lang">
    <select name="language" id="language" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        @foreach(Utility::languages() as $language)
      
            <option @if($lang == $language) selected @endif value="{{ route('register',$language) }}">{{Str::upper($language)}}</option>
@endforeach
</select>
</div>
<div class="col-sm-8 col-lg-5">
	<div class="row justify-content-center mb-3">
		<a class="navbar-brand" href="#">
			<img src="{{asset(Storage::url('uploads/logo/logo.png'))}}" class="auth-logo">
		</a>
	</div>
	<div class="card shadow zindex-100 mb-0">
		{{Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm'))}}
		<div class="card-body px-md-5 py-5">
			<div class="mb-4">
				<h6 class="h3">{{__('Create account')}}</h6>
				<p class="text-muted mb-0">{{__("Don't have an account? Create your account, it takes less than a minute")}}</p>
			</div>
			<span class="clearfix"></span>
			<div class="form-group">
				<label class="form-control-label">{{__('Name')}}</label>
				<div class="input-group input-group-merge">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					{{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Your Name')))}}
				</div>
				@error('name')
				<span class="error invalid-name text-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<div class="form-group">
				<label class="form-control-label">{{__('Email')}}</label>
				<div class="input-group input-group-merge">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="far fa-envelope"></i></span>
					</div>
					{{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))}}
				</div>
				@error('email')
				<span class="error invalid-email text-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>



			<div class="form-group mb-4">
				<label class="form-control-label">{{__('Password')}}</label>
				<div class="input-group input-group-merge">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					{{Form::password('password',array('class'=>'form-control','id'=>'input-password','placeholder'=>__('Enter Your Password')))}}
					<div class="input-group-append">
						<span class="input-group-text">
							<a href="#" data-toggle="password-text" data-target="#input-password">
								<i class="fas fa-eye"></i>
							</a>
						</span>
					</div>
				</div>
				@error('password')
				<span class="error invalid-password text-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<div class="form-group">
				<label class="form-control-label">{{__('Confirm password')}}</label>
				<div class="input-group input-group-merge">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					{{Form::password('password_confirmation',array('class'=>'form-control','id'=>'confirm-input-password','placeholder'=>__('Enter Your Confirm Password')))}}
					<div class="input-group-append">
						<span class="input-group-text">
							<a href="#" data-toggle="password-text" data-target="#confirm-input-password">
								<i class="fas fa-eye"></i>
							</a>
						</span>
					</div>
				</div>
				@error('password_confirmation')
				<span class="error invalid-password_confirmation text-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>

			@if(env('RECAPTCHA_MODULE') == 'yes')
			<div class="form-group col-lg-12 col-md-12 mt-3">
				{!! NoCaptcha::display() !!}
				@error('g-recaptcha-response')
				<span class="small text-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			@endif

			<div class="mt-4">
				{{Form::submit(__('Create my account'),array('class'=>'btn btn-sm btn-primary btn-icon rounded-pill','id'=>'saveBtn'))}}
			</div>
		</div>
		<div class="card-footer px-md-5"><small>{{__('Already have an acocunt?')}}</small>
			<a href="{{ route('login') }}" class="small font-weight-bold">{{__('Login')}}</a>
		</div>
		{{Form::close()}}
	</div>
</div> --}}

<script>
	var SubcategoryArr = <?php echo json_encode($Subcategory); ?>;


	function get_business_Subcategory(id) {
		//            alert(id);
		var SubCategory = $("#category_id").val();
		var jsonArr = [{
			id: '',
			text: 'Select a Occupation Subcategory'
		}];
		for (var key in SubcategoryArr) {
			for (var key1 in SubcategoryArr[key]) {
				if (SubcategoryArr[key][key1].category_id == SubCategory) {
					jsonArr.push({
						id: SubcategoryArr[key][key1].subcategory_id,
						text: SubcategoryArr[key][key1].name,
					});
				}
			}
		}

		console.log(jsonArr);

		$("#subcategory_id").html("");
		$("#subcategory_id").select2({
			data: jsonArr,
			placeholder: 'Select a Occupation Subcategory',
		});

	}

	//$(document).ready(function() {
	$("#category_id").select2({
		placeholder: 'Select a Occupation Category'
	});

	$("#subcategory_id").select2({
		placeholder: 'Select a Occupation Subcategory'
	});

	//});
</script>
@include('partials.admin.footer')