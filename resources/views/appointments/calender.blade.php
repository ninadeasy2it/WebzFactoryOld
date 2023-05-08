@extends('layouts.admin')
@section('page-title')
    {{ __('Calendar') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Calender') }}</li>
@endsection
@section('title')
   {{__('Calendar')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Calendar</h5>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card ">
                <div class="card-body ">
                    <h4 class="mb-4">{{ __('Appointments') }}</h4>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100 ">
                        @foreach ($arrayJson as $appointment)
                            @php
                                $month = date('m', strtotime($appointment['start']));
                            @endphp
                            @if ($month == date('m'))
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="ti ti-calendar"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="">{{ $appointment['title'] }}</h6>
                                                    <small class="text-muted mt-2">{{ $appointment['start'] }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <a data-bs-target="#exampleModal" data-url="{{ $appointment['url'] }}"
                data-bs-whatever="{{ $appointment['title'] }}" data-bs-toggle="modal" class="btn btn-sm"><i class="ti ti-eye"></i></a> -->
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ asset('custom/libs/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        (function() {
            var etitle;
            var etype;
            var etypeclass;
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    timeGridDay: "{{ __('Day') }}",
                    timeGridWeek: "{{ __('Week') }}",
                    dayGridMonth: "{{ __('Month') }}"
                },
                themeSystem: 'bootstrap',
                navLinks: true,
                selectable: true,
                selectMirror: true,
                editable: true,
                dayMaxEvents: true,
                handleWindowResize: true,
                events: <?php echo json_encode($arrayJson); ?>,
                viewRender: function(t) {
                    e.fullCalendar("getDate").month(), $(".fullcalendar-title").html(t.title)
                },
                eventClick: function(e) {
                    e.jsEvent.preventDefault();
                    var title = e.title;
                    var url = e.el.href;

                    if (typeof url != 'undefined') {
                        $("#commonModal .modal-title").html(e.event.title);
                        $("#commonModal .modal-dialog").addClass('modal-md');
                        $("#commonModal").modal('show');

                        $.get(url, {}, function(data) {
                            console.log()
                            $('#commonModal .modal-body ').html(data);
                        });
                        return false;
                    }
                }
            });
            calendar.render();
        })();
    </script>
@endpush
