@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('Contacts')}}</li>
@endsection
@section('page-title')
   {{__('Contacts')}}
@endsection
@section('title')
   {{__('Contacts')}}
@endsection
@section('content')


<div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                              <th>{{__('Business Name')}}</th>
                              <th>{{__('Name')}}</th>
                              <th>{{__('Email')}}</th>
                              <th>{{__('Phone')}}</th>
                              <th>{{__('Message')}}</th>
                              <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($contacts_deatails as $val)
                                <tr>
                                  <td>{{ $val->business_name }}</td>
                                  <td>{{ $val->name }}</td>
                                  <td>{{ $val->email }}</td>
                                  <td>{{ $val->phone }}</td>
                                  <td>{{ $val->message }}</td>
                                        <div class="row ">
                                            <td class="d-flex">
                                                <div class="action-btn bg-info  ms-2">
                                                    <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-url="{{ route('contacts.edit',$val->id) }}" data-ajax-popup="true" data-title="{{__('Edit contacts')}}"  data-bs-toggle="tooltip" data-bs-original-title="{{__('Edit contacts')}}"> <span class="text-white"> <i
                                                        class="ti ti-edit text-white"></i></span></a>
                                                </div>
                                                <div class="action-btn bg-danger ms-2">
                                                    <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center"  data-confirm="{{__('Are You Sure?')}}" data-text="{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="delete-form-{{$val->id}}" title="{{__('Delete')}}" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                </div>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $val->id],'id'=>'delete-form-'.$val->id]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                           
                                        </div>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

@endsection