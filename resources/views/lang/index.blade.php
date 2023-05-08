@extends('layouts.admin')
@section('page-title')
    {{__('Manage Language')}}
@endsection
@section('title')
   {{__('Manage Language')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('Language')}}</li>
@endsection
@section('action-btn')
<div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center justify-content-between justify-content-md-end">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-url="{{ route('create.language') }}"
            data-bs-whatever="{{__('Create New Language')}}" data-toggle="tooltip"
            data-bs-title="{{__('Create New Language')}}"> <span class="text-white"> 
                <i class="fas fa-plus text-white"></i></span>
        </a>
        @if($currantLang != (!empty(env('default_language')) ? env('default_language') : 'en'))
                <div class="action-btn bg-danger ms-2">
                    <form method="POST" action="{{ route('lang.destroy', $currantLang) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger btn-icon m-1 show_confirm" data-toggle="tooltip"
                        title='Delete'>
                        <span class="text-white"> <i
                            class="ti ti-trash"></i></span>
                        </button>
                    </form>
                </div>
        @endif

</div>
@endsection
@section('content')

     <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach($languages as $lang)
                            <a href="{{route('manage.language',[$lang])}}" class="nav-link text-sm font-weight-bold @if($currantLang == $lang) active @endif">
                                <i class="d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">{{Str::upper($lang)}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
                    <div class="p-3 card">
            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-user-tab-1" data-bs-toggle="pill"
                        data-bs-target="#labels" type="button">{{ __('Labels')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-user-tab-2" data-bs-toggle="pill"
                        data-bs-target="#messages" type="button">{{ __('Messages')}}</button>
                </li>

            </ul>
        </div>
        <div class="card">
            <div class="card-body p-3">
                <form method="post" action="{{route('store.language.data',[$currantLang])}}">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="labels">
                            <div class="row">
                                @foreach($arrLabel as $label => $value)
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label text-dark">{{$label}}</label>
                                            <input type="text" class="form-control" name="label[{{$label}}]" value="{{$value}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="messages">
                            @foreach($arrMessage as $fileName => $fileValue)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>{{ucfirst($fileName)}}</h6>
                                    </div>
                                    @foreach($fileValue as $label => $value)
                                        @if(is_array($value))
                                            @foreach($value as $label2 => $value2)
                                                @if(is_array($value2))
                                                    @foreach($value2 as $label3 => $value3)
                                                        @if(is_array($value3))
                                                            @foreach($value3 as $label4 => $value4)
                                                                @if(is_array($value4))
                                                                    @foreach($value4 as $label5 => $value5)
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label text-dark">{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}.{{$label4}}.{{$label5}}</label>
                                                                                <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}][{{$label4}}][{{$label5}}]" value="{{$value5}}">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mb-3">
                                                                            <label class="form-label text-dark">{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}.{{$label4}}</label>
                                                                            <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}][{{$label4}}]" value="{{$value4}}">
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label text-dark">{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}</label>
                                                                    <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}]" value="{{$value3}}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label text-dark">{{$fileName}}.{{$label}}.{{$label2}}</label>
                                                            <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}]" value="{{$value2}}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label text-dark">{{$fileName}}.{{$label}}</label>
                                                    <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}]" value="{{$value}}">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-end">
                        <input type="submit" value="{{__('Save Changes')}}" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

