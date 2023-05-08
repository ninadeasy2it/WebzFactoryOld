@extends('layouts.admin')
@section('content')
@section('page-title')
   {{__('Appointments')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('Appointments')}}</li>
@endsection
@section('title')
   {{__('Appointments')}}
@endsection
<div class="col-xl-12">
    <div class="card">
        <div class="card-body table-border-style">
            <h5></h5>
            <div class="table-responsive">
                <table class="table" id="pc-dt-simple">
                    <thead>
                        <tr>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Time')}}</th>
                            <th>{{__('Business Name')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointment_deatails as $val)
                            <tr>
                                <td>{{ $val->date }}</td>
                                <td>{{ $val->time }}</td>
                                <td>{{ $val->business_name }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->phone }}</td>
                                @if($val->status == 'pending')
                                    <td><span class="badge bg-warning p-2 px-3 rounded">{{ ucFirst($val->status) }}</span></td>
                                @else
                                    <td><span class="badge bg-success p-2 px-3 rounded">{{ ucFirst($val->status) }}</span></td>
                                @endif
                                <div class="row float-end">
                                    <td class="d-flex">
                                        <div class="action-btn bg-danger ms-2">
                                            <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center"  data-confirm="{{__('Are You Sure?')}}" data-text="{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="delete-form-{{$val->id}}" title="{{__('Delete')}}" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                        </div>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['appointments.destroy', $val->id],'id'=>'delete-form-'.$val->id]) !!}
                                        {!! Form::close() !!}
                                        <div class="action-btn bg-success  ms-2">
                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center cp_link" data-toggle="modal" data-target="#commonModal" data-ajax-popup="true" data-size="lg" data-url="{{ route('appointment.add-note',$val->id) }}" data-title="{{__('Add Note & Change Status')}}" data-bs-toggle="tooltip" data-bs-original-title="{{__('Add Note & Change Status')}}"> <span class="text-white"><i
                                                    class="ti ti-note"></i></span></a>
                                        </div>
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