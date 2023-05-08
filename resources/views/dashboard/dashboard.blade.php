@extends('layouts.admin')
@push('css-page')
    <style>
    </style>
@endpush
@section('page-title')
   {{__('Dashboard')}}
@endsection
@section('content')
<div class="row">
    <div class="page-title mb-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-10 mb-3 mb-md-0">
          <h5 class="h3 font-weight-400 mb-0">{{__('Dashboard')}}</h5>
        </div>
        <div class="col-md-2 mb-3 mb-md-0 ">
            <select class="form-control select2" name="select_card">
                <option value="0" 'selected'>{{__('All')}}</option>
                @foreach($cards as $key => $card)
                    <option value="{{$card->id}}">{{$card->title}}</option>
                @endforeach
            </select>
        </div>
      </div>
    </div>
<div class="col-sm-12">
<div class="row">
    <div class="col-xxl-4">
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="card">
                    <div class="card-body" style="min-height: 230px;">
                        <div class="theme-avtar bg-primary">
                            <i class="ti ti-briefcase dash-micon"></i>
                        </div>
                        <p class="text-muted text-sm mt-4 mb-2"></p>
                        <h6 class="mb-3">{{__('Total Business')}}</h6>
                        <h3 class="mb-0">{{$total_bussiness}} </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="card">
                    <div class="card-body" style="min-height: 230px;">
                        <div class="theme-avtar bg-warning">
                            <i class="ti ti-clipboard-check dash-micon"></i>
                        </div>
                        <p class="text-muted text-sm mt-4 mb-2"></p>
                        <h6 class="mb-3">{{__('Total Appointments')}}</h6>
                        <h3 class="mb-0">{{$total_app}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12">
            <div class="card">
                    <div class="card-header">
                        <div class="float-end">
                            <span class="mb-0 text-sm float-right mt-1">{{__('Last 15 Days')}}</span>  
                        </div>
                        <h5 class="mb-0 float-left">{{__('Browser')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                                <div id="pie-storebrowser"></div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-lg-12 col-12">
            <div class="card">
                    <div class="card-header">
                        <div class="float-end">
                            <span class="mb-0 text-sm float-right mt-1">{{__('Last 15 Days')}}</span>
                        </div>
                        <h5 class="mb-0 float-left">{{__('Device')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                                <div id="pie-storedashborad"></div>
                        </div>
                    </div>
                </div>
            </div> 
    </div>
</div>
       
       <div class="col-xxl-8">
           <div class="card">
                    <div class="card-header">
                        <div class="float-end">
                            <span class="mb-0 float-right">{{__('Last 7 Days')}}</span>
                        </div>
                        <h5>{{__('Appointments')}}</h5>  
                    </div>
                    <div class="card-body">
                        <div id="apex-storedashborad" data-color="primary" data-height="280"></div>
                    </div>
                </div>
                                <div class="col-lg-12 col-12">
            <div class="card">
                    <div class="card-header">
                        <div class="float-end">
                            <span class="mb-0 text-sm float-right mt-1">{{__('Last 15 Days')}}</span>
                        </div>
                       <h5 class="mb-0 float-left">{{('Platform')}}</h5>       
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                                <div id="user_platform-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>
</div>   
@endsection
@push('custom-scripts')
    <script src="{{ asset('custom/js/purpose.js') }}"></script>
    <script type="text/javascript">
         $(document).on("change", "select[name='select_card']", function () {
            var b_id = $("select[name='select_card']").val();
            if(b_id == '0'){
                window.location.href = '{{url('/dashboard')}}';
            }else{
                window.location.href = '{{url('business/analytics')}}/' + b_id;
            }
            
        });
    </script>
    <script>
        (function () {
        var options = {
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            series : {!! json_encode($chartData['data']) !!},
            xaxis: {labels: {format: "MMM", style: {colors: PurposeStyle.colors.gray[600], fontSize: "14px", fontFamily: PurposeStyle.fonts.base, cssClass: "apexcharts-xaxis-label"}}, axisBorder: {show: !1}, axisTicks: {show: !0, borderType: "solid", color: PurposeStyle.colors.gray[300], height: 6, offsetX: 0, offsetY: 0}, type: "text", categories: {!! json_encode($chartData['label']) !!}},
            yaxis: {labels: {style: {color: PurposeStyle.colors.gray[600], fontSize: "12px", fontFamily: PurposeStyle.fonts.base}}, axisBorder: {show: !1}, axisTicks: {show: !0, borderType: "solid", color: PurposeStyle.colors.gray[300], height: 6, offsetX: 0, offsetY: 0}},

            grid: {
                strokeDashArray: 4,
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            },
    
        };
        var chart = new ApexCharts(document.querySelector("#apex-storedashborad"), options);
        chart.render();
    })();

        var options = {
            chart: {
                height: 250,
                type: 'donut',
            },
            dataLabels: {
                enabled: true,
            },
            series: {!! json_encode($devicearray['data']) !!},
            colors: ["#6fd943", '#ffa21d', '#FF3A6E', '#3ec9d6'],
            labels: {!! json_encode($devicearray['label']) !!},
            legend: {
                show: true,
                position: 'bottom',
            },
        };
        var chart = new ApexCharts(document.querySelector("#pie-storedashborad"), options);
        chart.render();

        var options = {
            chart: {
                height:250,
                type: 'donut',
            },
            dataLabels: {
                enabled: true,
            },
            series: {!! json_encode($browserarray['data']) !!},
            colors: ["#6fd943", '#ffa21d', '#FF3A6E', '#3ec9d6'],
            labels: {!! json_encode($browserarray['label']) !!},
            legend: {
                show: true,
                position: 'bottom',
            },
        };
        var chart = new ApexCharts(document.querySelector("#pie-storebrowser"), options);
        chart.render();
    </script>
    <script>
        var WorkedHoursChart = (function () {
            var $chart = $('#user_platform-chart');

            function init($this) {
                var options = {
                    chart: {
                        height: 250,
                        type: 'bar',
                        zoom: {
                            enabled: false
                        },
                        toolbar: {
                            show: false
                        },
                        shadow: {
                            enabled: false,
                        },

                    },
                    plotOptions: {
                bar: {
                    columnWidth: '30%',
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
                    stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
                    series: [{
                        name: 'Platform',
                        data: {!! json_encode($platformarray['data']) !!},
                    }],
                    xaxis: {
                        labels: {
                            // format: 'MMM',
                            style: {
                                colors: PurposeStyle.colors.gray[600],
                                fontSize: '14px',
                                fontFamily: PurposeStyle.fonts.base,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: true,
                            borderType: 'solid',
                            color: PurposeStyle.colors.gray[300],
                            height: 6,
                            offsetX: 0,
                            offsetY: 0
                        },
                        title: {
                            text: '{{__('Platform')}}'
                        },
                        categories: {!! json_encode($platformarray['label']) !!},
                    },
                    yaxis: {
                        labels: {
                            style: {
                                color: PurposeStyle.colors.gray[600],
                                fontSize: '12px',
                                fontFamily: PurposeStyle.fonts.base,
                            },
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: true,
                            borderType: 'solid',
                            color: PurposeStyle.colors.gray[300],
                            height: 6,
                            offsetX: 0,
                            offsetY: 0
                        }
                    },
                    fill: {
                        type: 'solid',
                        opacity: 1

                    },
                    markers: {
                        size: 4,
                        opacity: 0.7,
                        strokeColor: "#fff",
                        strokeWidth: 3,
                        hover: {
                            size: 7,
                        }
                    },
                    grid: {
                        borderColor: PurposeStyle.colors.gray[300],
                        strokeDashArray: 5,
                    },
                    dataLabels: {
                        enabled: false
                    }
                }
                // Get data from data attributes
                var dataset = $this.data().dataset,
                    labels = $this.data().labels,
                    color = $this.data().color,
                    height = $this.data().height,
                    type = $this.data().type;

                // Inject synamic properties
                // options.colors = [
                //     PurposeStyle.colors.theme[color]
                // ];
                // options.markers.colors = [
                //     PurposeStyle.colors.theme[color]
                // ];
                options.chart.height = height ? height : 350;
                // Init chart
                var chart = new ApexCharts($this[0], options);
                // Draw chart
                setTimeout(function () {
                    chart.render();
                }, 300);
            }

            // Events
            if ($chart.length) {
                $chart.each(function () {
                    init($(this));
                });
            }
        })();
    </script>
@endpush


