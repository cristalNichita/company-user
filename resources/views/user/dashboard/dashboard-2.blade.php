@extends('user.layouts.front')
@section('title', 'Dashbaord')

@section('css')
<style>
    .dot-badge-wrapper .badge-custom {
        top: 50%;
        transform: translateY(-50%);
        width: 7px;height: 7px;
    }

    .dot-badge-wrapper .badge-text {
        margin-left: 10px;
    }
</style>
@endsection

@section('content')
    <div class="wrapper flex grow flex-col">
        <main class="grow content pt-5" id="content" role="content">
            <!-- begin: container -->
            <div class="container-fixed" id="content_container">
            </div>
            <!-- begin: container -->
            <!-- begin: container -->
            <div class="container-fixed">
                <div class="flex flex-nowrap items-center lg:items-end justify-between dark:border-b-coal-100 gap-6">
                    <div class="grid">
                        <div class="scrollable-x-auto">
                            <div class="menu gap-3" data-menu="true">
                                <div class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary" data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown" data-menu-item-trigger="click">
                                    <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                                        <div class="text-2xl text-gray-900">
                                            <div class="font-medium">Dashboard</div>
                                            <div class="text-gray-600 text-lg">Central Hub for Platform Overview</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: container -->
            <!-- end: container -->
            <!-- begin: container -->
            <div class="container-fixed">
                <!-- begin: projects -->
                <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
                    <div class="flex flex-wrap items-center gap-5 justify-between">
                        <div class="flex gap-7">
                            <div class="card min-w-[180px]">
                                <div class="card-body ">
                                    <div class="flex flex-col min-w-12">
                                        <i class="ki-outline ki-key fs-2tx text-2xl text-primary"></i>
                                        <div class="mt-7">
                                            <div class="text-2.5xl font-semibold">{{ $passwordsCount }}</div>
                                            <div class="text-2sm text-gray-500">Total Passwords</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card min-w-[180px]">
                                <div class="card-body">
                                    <div class="flex flex-col">
                                        <i class="ki-outline ki-category fs-2tx text-2xl text-primary"></i>
                                        <div class="mt-7">
                                            <div class="text-2.5xl font-semibold">12</div>
                                            <div class="text-2sm text-gray-500">Total Applications</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card min-w-[180px]">
                                <div class="card-body">
                                    <div class="flex flex-col">
                                        <i class="ki-outline ki-people fs-2tx text-2xl text-primary"></i>
                                        <div class="mt-7">
                                            <div class="text-2.5xl font-semibold">{{ $usersCount }}</div>
                                            <div class="text-2sm text-gray-500">Total Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card min-w-[180px]">
                                <div class="card-body">
                                    <div class="flex flex-col">
                                        <i class="ki-outline ki-screen fs-2tx text-2xl text-primary"></i>
                                        <div class="mt-7">
                                            <div class="text-2.5xl font-semibold">6</div>
                                            <div class="text-2sm text-gray-500">Browser Extensions</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fixed mt-7">
                <!-- begin: projects -->
                <div class="flex items-stretch gap-5 lg:gap-7.5">
                    <div class="card" style="flex-basis: 33%">
                        <div class="card-header">
                            <h3 class="card-title">Total Security Score</h3>
                        </div>
                        <div class="card-body">
                            <div id="security-chart"></div>
                            <div class="flex flex-col justify-center items-center text-left">
                                <span class="flex flex-col gap-1.5">
                                    <span class="relative dot-badge-wrapper">
                                        <span class="badge badge-dot badge-success absolute badge-custom"></span>
                                        <span class="badge-text text-gray-700">Strong Passwords: 15</span>
                                    </span>
                                    <span class="relative dot-badge-wrapper">
                                        <span class="badge badge-dot badge-warning absolute badge-custom"></span>
                                        <span class="badge-text text-gray-700">Medium Passwords: 24</span>
                                    </span>
                                    <span class="relative dot-badge-wrapper">
                                        <span class="badge badge-dot badge-danger absolute badge-custom"></span>
                                        <span class="badge-text text-gray-700">Weak Passwords: 24</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="flex-basis: 67%">
                        <div class="card-header">
                            <h3 class="card-title">Total Passwords</h3>
                        </div>
                        <div class="card-body">
                            <div id="passwords-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fixed mt-7">
                <!-- begin: projects -->
                <div class="flex flex-col items-stretch gap-6 lg:gap-7.5">
                    <div class="flex justify-between gap-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Browsers Overview</h3>
                            </div>
                            <div class="card-body">
                                <div id="browsers-chart"></div>
                            </div>
                            <div class="card-footer justify-center">
                                <a class="btn btn-link" href="html/demo1/public-profile/works.html">
                                    View Security Score
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Unique Records Passwords</h3>
                            </div>
                            <div class="card-body">
                                <div id="pass-records-chart"></div>
                            </div>
                            <hr>
                            <div class="card-footer justify-center">
                                <a class="btn btn-link" href="html/demo1/public-profile/works.html">
                                    View Security Score
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">MFA Enabled</h3>
                            </div>
                            <div class="card-body">
                                <div id="mfa-chart"></div>
                            </div>
                            <hr>
                            <div class="card-footer justify-center">
                                <a class="btn btn-link" href="html/demo1/public-profile/works.html">
                                    View Security Score
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fixed mt-7 mb-7.5">
                <!-- begin: projects -->
                <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
                    <div class="flex justify-between gap-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Total Applications
                                </h3>
                            </div>
                            <div class="card-body min-w-app-card">
                                <div class="grid gap-y-5">
                                    <div class="flex align-start min-w-full">
                                        <div class="flex gap-2.5 w-full">
                                            <img alt="" class="h-9" src="assets/img/brand-logos/jira.svg"/>
                                            <a class="text-sm font-semibold pt-2.5 text-gray-800 leading-none hover:text-primary-active" href="#">
                                                Jira
                                            </a>
                                        </div>
                                        <button class="menu-toggle text-md btn btn-sm btn-icon btn-light btn-clear">
                                            <i class="ki-filled ki-dots-vertical">
                                            </i>
                                        </button>
                                    </div>
                                    <div class="flex align-start min-w-full">
                                        <div class="flex gap-2.5 w-full">
                                            <img alt="" class="h-9" src="assets/img/brand-logos/gitlab.svg"/>
                                            <a class="text-sm font-semibold pt-2.5 text-gray-800 leading-none hover:text-primary-active" href="#">
                                                Gitlab
                                            </a>
                                        </div>
                                        <button class="menu-toggle text-md btn btn-sm btn-icon btn-light btn-clear">
                                            <i class="ki-filled ki-dots-vertical">
                                            </i>
                                        </button>
                                    </div>
                                    <div class="flex align-start min-w-full">
                                        <div class="flex gap-2.5 w-full">
                                            <img alt="" class="h-9" src="assets/img/brand-logos/amazon-2.svg"/>
                                            <a class="text-sm font-semibold pt-2.5 text-gray-800 leading-none hover:text-primary-active" href="#">
                                                AWS S3
                                            </a>
                                        </div>
                                        <button class="menu-toggle text-md btn btn-sm btn-icon btn-light btn-clear">
                                            <i class="ki-filled ki-dots-vertical">
                                            </i>
                                        </button>
                                    </div>
                                    <div class="flex align-start">
                                        <div class="flex gap-2.5 w-full">
                                            <img alt="" class="h-9" src="assets/img/brand-logos/google.svg"/>
                                            <a class="text-sm font-semibold pt-2.5 text-gray-800 leading-none hover:text-primary-active" href="#">
                                                Google
                                            </a>
                                        </div>
                                        <button class="menu-toggle text-md btn btn-sm btn-icon btn-light btn-clear">
                                            <i class="ki-filled ki-dots-vertical">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-center">
                                <a class="btn btn-link" href="html/demo1/public-profile/works.html">
                                    All Applications
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('js')
    <script>
        changeBreadcrumbs('Admin', 'Dashboard');

        var securityChartOptions = {
            series: [70],
            chart: {
                height: 350,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '70%',
                    },

                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            offsetY: 10,
                            color: '#000',
                            fontSize: '40px',
                            fontWeight: '800'
                        }
                    }
                },
            },
            colors: ['#edb52c'],
        };

        var datesPasswords = [
            { x: new Date('2020-01-01').getTime(), y: 30 },
            { x: new Date('2020-01-02').getTime(), y: 31 },
            { x: new Date('2020-01-03').getTime(), y: 29 },
            { x: new Date('2020-01-04').getTime(), y: 32 },
            { x: new Date('2020-01-05').getTime(), y: 33 },
            // Добавьте больше данных по мере необходимости
        ];

        var mfaChartOptions = {
            series: [30, 90],
            chart: {
                type: 'donut',
                height: 350,
            },
            labels: ['Enabled', 'Disabled'],
            colors: ['#17C653', '#E42855'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var passRecordsChartOptions = {
            series: [44, 55],
            chart: {
                type: 'donut',
                height: 350,
            },
            labels: ['Unique', 'Reused'],
            colors: ['#17C653', '#E42855'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var browsersChartOptions = {
            series: [44, 55, 41, 17],
            chart: {
                type: 'donut',
                height: 350,
            },
            labels: ['Chrome', 'Firefox', 'Safari', 'Edge'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var passwordChartOptions = {
            series: [{
                name: 'Passwords',
                data: datesPasswords
            }],
            chart: {
                type: 'area',
                stacked: false,
                height: 350,
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: true
                },
                toolbar: {
                    show:false
                }
            },
            dataLabels: {
                enabled: false
            },
            markers: {
                size: 0,
                colors: ['#BD6DF9'],  // Цвет маркеров
                strokeColors: '#BD6DF9',  // Цвет обводки маркеров
                hover: {
                    size: 7,  // Размер маркера при наведении
                    sizeOffset: 3
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    stops: [0, 90, 100],
                    colorStops: [
                        {
                            offset: 0,
                            color: "#BD6DF9",
                            opacity: 0.5
                        },
                        {
                            offset: 100,
                            color: "#BD6DF9",
                            opacity: 0
                        }
                    ]
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
                colors: ['#BD6DF9']  // Изменение цвета линии
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        return val;
                    },
                },
            },
            xaxis: {
                type: 'datetime',
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        };

        var passwordChart = new ApexCharts(document.querySelector("#passwords-chart"), passwordChartOptions);
        passwordChart.render();

        var browsersChart = new ApexCharts(document.querySelector("#browsers-chart"), browsersChartOptions);
        browsersChart.render();

        var passRecordsChart = new ApexCharts(document.querySelector("#pass-records-chart"), passRecordsChartOptions);
        passRecordsChart.render();

        var mfaChart = new ApexCharts(document.querySelector("#mfa-chart"), mfaChartOptions);
        mfaChart.render();

        var securityChart = new ApexCharts(document.querySelector("#security-chart"), securityChartOptions);
        securityChart.render();

    </script>
@endsection
