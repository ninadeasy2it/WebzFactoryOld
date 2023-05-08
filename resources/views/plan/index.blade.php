@extends('layouts.admin')
@php
    $dir= asset(Storage::url('uploads/plan'));
@endphp
@section('page-title')
   {{__('Plans')}}
@endsection

@section('title')
   {{__('Manage Plan')}}
@endsection
@section('action-btn')
<div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" data-bs-toggle="tooltip"
 data-bs-original-title="{{__('Create')}}">
    @if(App\Models\Utility::getPaymentIsOn() && \Auth::user()->type=='super admin' )
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-url="{{ route('plans.create') }}"
            data-bs-whatever="{{__('Create New Plan')}}" data-size="lg" data-toggle="tooltip"
            data-bs-title="{{__('Create New Plan')}}"> <span class="text-white"> 
                <i class="ti ti-plus text-white"></i></span>
        </a>
     @endif    
</div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('Plans')}}</li>
@endsection
@section('content')

<div class="row">
@foreach($plans as $plan)
<div class="plan_card">
  <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
    <div class="card-body">
      <span class="price-badge bg-primary">{{$plan->name}}</span>
      @if (\Auth::user()->type == 'company' && \Auth::user()->plan == $plan->id)
          <div class="d-flex flex-row-reverse m-0 p-0 ">
              <span class="d-flex align-items-center ">
                  <i class="f-10 lh-1 fas fa-circle text-success"></i>
                  <span class="ms-2">{{ __('Active') }}</span>
              </span>
          </div>
      @endif
      @if(\Auth::user()->type=='super admin')
      
      <div class="col-12 text-end">
        <div class="action-btn bg-primary ms-2"> 
          <a data-url="{{ route('plans.edit',$plan->id) }}" data-size="lg" data-ajax-popup="true" data-bs-placement="top" data-bs-toggle="tooltip"
 data-bs-original-title="{{__('Edit')}}" data-title="{{__('Edit Plan')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"
              class="mx-3 btn btn-sm d-inline-flex align-items-center">
              <i class="ti ti-edit"></i>
          </a>
        </div>
      </div>
        @endif
        <span class="mb-4 p-price m"><span style="font-weight: 600">{{(env('CURRENCY_SYMBOL')) ? env('CURRENCY_SYMBOL') : '$'}}{{$plan->price}}</span><small class="text-sm">{{__('/ Duration : ').__(ucfirst($plan->duration))}}</small></span>
      <p class="mb-0">
        {{ $plan->description }}
      </p>
      
      @if(\Auth::user()->type=='company' && \Auth::user()->plan == $plan->id)
        @if($plan->duration !== 'Unlimited')
            @if(\Auth::user()->type == 'company' && (empty(\Auth::user()->plan_expire_date) || \Auth::user()->plan_expire_date < date('Y-m-d')))
                <p class="mb-0">
                    {{__('Plan Expired') }}
                </p>
            @else
            <p class="mb-0">
                {{__('Plan Expired : ') }} {{!empty( \Auth::user()->plan_expire_date) ?  date('d-m-Y',strtotime(\Auth::user()->plan_expire_date)):'Unlimited'}}
            </p>
            @endif
        @else
        <p class="mb-0">
                {{__('Plan Expired : Unlimited') }}
            </p>
        
        @endif
    @endif
      <ul class="list-unstyled my-4">
        <li>
          <span class="theme-avtar">
            <i class="text-primary ti ti-circle-plus"></i></span>
          {{count($plan->getThemes())}} {{__('Themes')}}
        </li>
        <li>
          <span class="theme-avtar">
            <i class="text-primary ti ti-circle-plus"></i></span>
          {{$plan->business == '-1'?'Unlimited':$plan->business;}} {{__('Business')}}
        </li>
        @if($plan->enable_custdomain == 'on')
          <li>
            <span class="theme-avtar">
              <i class="text-primary ti ti-circle-plus"></i></span>
            {{__('Custom Domain')}}
          </li>
        @else
            <li>

            <span class="theme-avtar">
              <i data-feather="x"  class="text-danger"></i></span>
              <span class="text-danger"> {{__('Custom Domain')}}</span>
            
          </li>
        @endif
        @if($plan->enable_custsubdomain == 'on')
            <li>
            <span class="theme-avtar">
              <i class="text-primary ti ti-circle-plus"></i></span>
            {{__('Sub Domain')}}
          </li>
        @else
            <li>
            <span class="theme-avtar">
              <i data-feather="x"  class="text-danger"></i></span>
              <span class="text-danger"> {{__('Sub Domain')}}</span>
            
          </li>
        @endif
        @if($plan->enable_branding == 'on')
          <li>
            <span class="theme-avtar">
              <i class="text-primary ti ti-circle-plus"></i></span>
              {{__('Branding')}}
          </li>
          @else
            <li>
              <span class="theme-avtar">
                <i data-feather="x" class="text-danger"></i></span>
                <span class="text-danger">{{__('Branding')}}</span>
            </li>    
        @endif
      </ul>
      <div class="row d-flex justify-content-between">
        <div class="col-8">
          @if(\Auth::user()->type == 'company' && (empty(\Auth::user()->plan_expire_date) || \Auth::user()->plan_expire_date < date('Y-m-d')))
          @if(App\Models\Utility::getPaymentIsOn())
                 
              @if($plan->price > 0)
              
                  <div class="d-grid text-center">
                      <a href="{{route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"
                          class="btn  btn-primary d-flex justify-content-center align-items-center ">{{ __('Subscribe') }}
                          <i class="fas fa-arrow-right m-1"></i></a>
                      <p></p>
                  </div>

              {{-- @else
                  <a href="#" class="btn  btn-primary d-flex justify-content-center align-items-center">{{__('Free')}}</a> --}}
              @endif
                 
          @endcan
          
      @else
          @if(App\Models\Utility::getPaymentIsOn())
                  @if($plan->id != \Auth::user()->plan && \Auth::user()->type=='company')
                      @if($plan->price > 0)
                      <div class="d-grid text-center">
                          <a href="{{route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"
                              class="btn btn-primary btn-sm d-flex justify-content-center align-items-center">{{ __('Subscribe') }}
                              <i class="ti ti-arrow-right ms-1"></i></a>
                          <p></p>
                      </div>
                      {{-- @else
                          <a href="#" class="btn  btn-primary d-flex justify-content-center align-items-center ">{{__('Free')}}</a> --}}
                      @endif
                  @endif
          @endcan
      @endif
        </div>
          @if(\Auth::user()->type != 'super admin' && \Auth::user()->plan != $plan->id)

          @if($plan->id != 1)
                  @if(\Auth::user()->requested_plan != $plan->id)
                      <div class="col-4">
                          <a href="{{ route('send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)]) }}"
                              class="btn btn-primary btn-icon btn-sm"
                              data-title="{{ __('Send Request') }}" data-bs-placement="top" data-bs-toggle="tooltip"
 data-bs-original-title="{{__('Send Request')}}" data-toggle="tooltip">
                              <span class="btn-inner--icon"><i class="ti ti-arrow-forward-up"></i></span>
                          </a>
                      </div>
                  @else
                      <div class="col-4">
                          <a href="{{ route('request.cancel',\Auth::user()->id) }}"
                              class="btn btn-icon  btn-danger btn-sm" data-bs-placement="top" data-bs-toggle="tooltip"
 data-bs-original-title="{{__('Cancel Request')}}" >
                              <span class="btn-inner--icon"><i class="ti ti-x"></i></span>
                          </a>
                      </div>
                  @endif
          @endif
      @endif
      </div>
      
      
      
    </div>
  </div>
</div>
@endforeach

    </div>
@endsection
