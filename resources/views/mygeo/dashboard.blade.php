@extends('layouts.app_mygeo_ketsa')

@section('content')
    <style>
        #form-container {
            width: 500px;
        }

        .row.form-group {
            padding-left: 15px;
            padding-right: 15px;
        }

        .change-link {
            background-color: #000;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            bottom: 0;
            color: #fff;
            opacity: 0.8;
            padding: 4px;
            position: absolute;
            text-align: center;
            width: 150px;
        }

        .change-link:hover {
            color: #fff;
            text-decoration: none;
        }

        #editor-container {
            height: 130px;
        }

    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Dashboard</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">

                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-md-6">
                        <div class="card card-stats bg-gradient-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="font-weight-bold text-white text-uppercase mb-0">
                                            Jumlah Metadata Yang Telah Diterbit
                                        </h2>
                                        <span class="text-white text-uppercase mb-0">
                                            <?php
                                            if(Auth::user()->hasRole('Pemohon Data')){
                                                echo Auth::user()->agensi_organisasi;
                                            }else{
                                                echo Auth::user()->agensiOrganisasi->name;
                                            }
                                            ?>
                                        </span>
                                    </div>

                                    <div class="col-auto">
                                        <div class=" icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="fas fa-stream"> </i>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">{{ $metadataTerbit }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class=" surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Jumlah Metadata Mengikut Kategori</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="bar-chart" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class="surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Jumlah Metadata Mengikut Agensi</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="bar-chart2" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Bar Chart</h6>

                                        <h5 class="h2 mb-0">Jumlah Metadata Mengikut Tahun</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="bar-chart3" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Pie Chart</h6>

                                        <h5 class="h2 mb-0">Jumlah Metadata Diterbit Mengikut Topik Kategori</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="pie-chart1" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-stats bg-gradient-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="card-title font-weight-bold text-uppercase text-white mb-0">
                                            Bilangan Keseluruhan Permohonan Data
                                        </h2>
                                    </div>

                                    <div class="col-auto">
                                        <div class=" icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-paste"> </i>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">{{$total_permohonan}}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-stats bg-gradient-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="card-title font-weight-bold text-white text-uppercase mb-0">
                                            Bilangan Permohonan Data Dilulus
                                        </h2>
                                    </div>

                                    <div class="col-auto">
                                        <div class=" icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-calendar-check"> </i>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">{{$total_permohonan_lulus}}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-stats bg-gradient-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="card-title font-weight-bold text-white text-uppercase mb-0">
                                            Bilangan Permohonan Data Ditolak
                                        </h2>
                                    </div>

                                    <div class="col-auto">
                                        <div class=" icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-calendar-times"> </i>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">{{$total_permohonan_tolak}}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Bar Chart</h6>

                                        <h5 class="h2 mb-0">Jumlah Permohonan Data Mengikut Tahun</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="bar-chart4" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Pie Chart</h6>

                                        <h5 class="h2 mb-0">Jumlah Permohonan Data Mengikut Kategori</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="pie-chart2" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php //dd(json_encode($metadataTerbitByAgencyKeys));?>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Bar chart 1
        var bar1 = document.getElementById("bar-chart").getContext("2d");

        new Chart(bar1, {
            type: "bar",
            data: {
                labels: <?php echo json_encode($metadataByCategoryKeys); ?>,
                datasets: [{
                    label: "Jumlah Metadata / Bahagian",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 10,
                    backgroundColor: '#3eb8f0',
                    data: <?php echo json_encode($metadataByCategoryVals); ?>,
                    fill: true,
                    maxBarThickness: 65,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10
                        }
                    },
                },
            },
        });

        // Bar chart 2
        var bar2 = document.getElementById("bar-chart2").getContext("2d");

        new Chart(bar2, {
            type: "bar",
            data: {
//                labels: ['A', 'B', 'C', 'D', 'E', 'F'],
                labels: <?php echo json_encode($metadataTerbitByAgencyKeys); ?>,
                datasets: [{
                    label: "Jumlah Metadata / Bahagian",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 8,
                    backgroundColor: '#b061ff',
                    data: <?php echo json_encode($metadataTerbitByAgencyVals); ?>,
                    fill: false,
                    maxBarThickness: 35
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10
                        }
                    },
                },
            },
        });

        // Bar chart 3
        var bar3 = document.getElementById("bar-chart3").getContext("2d");

        new Chart(bar3, {
            type: "bar",
            data: {
                labels: <?php echo json_encode($metadataByYearKeys); ?>,
                datasets: [{
                    label: "Jumlah Metadata / Bahagian",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 20,
                    backgroundColor: '#ffa361',
                    data: <?php echo json_encode($metadataByYearVals); ?>,
                    fill: false,
                    maxBarThickness: 20
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10
                        }
                    },
                },
            },
        });

        // Bar chart 4
        var bar4 = document.getElementById("bar-chart4").getContext("2d");

        new Chart(bar4, {
            type: "bar",
            data: {
                labels: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020'],
                datasets: [{
                    label: "Jumlah Metadata / Bahagian",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 20,
                    backgroundColor: '#35b83e',
                    data: [3025, 1382, 925, 1282, 825, 1882, 825, 1882, 1282, 825, 2009],
                    fill: false,
                    maxBarThickness: 20
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10
                        }
                    },
                },
            },
        });

        // Pie chart
        var pie1 = document.getElementById("pie-chart1").getContext("2d");

        new Chart(pie1, {
            type: "pie",
            data: {
                labels: ['Administrative and Political Boundaries','Agriculture and Farming','Atmosphere and Climatic','Biology and Ecology','Business and Economic','Cadastral','Cultural, Society and Demography','Elevation and Derived Products','Environment and Conservation','Facilities and Structures','Geological and Geophysical','Human Health and Disease','Imagery and Base Maps','Inland Water Resources','Locations and Geodetic Networks','Military','Oceans and Estuaries','Transportation Networks','Utilities and Communication'
                ],
                datasets: [{
                    label: "Projects",
                    weight: 9,
                    cutout: 0,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 2,
                    backgroundColor: ['#17c1e8', '#cb0c9f', '#a8b8d8', '#3A415F', '#a8b8d8'],
                    data: [
                        {{ $metadataByTopicCategory['Administrative and Political Boundaries'] }},
                        {{ $metadataByTopicCategory['Agriculture and Farming'] }},
                        {{ $metadataByTopicCategory['Atmosphere and Climatic'] }},
                        {{ $metadataByTopicCategory['Biology and Ecology'] }},
                        {{ $metadataByTopicCategory['Business and Economic'] }},
                        {{ $metadataByTopicCategory['Cadastral'] }},
                        {{ $metadataByTopicCategory['Cultural, Society and Demography'] }},
                        {{ $metadataByTopicCategory['Elevation and Derived Products'] }},
                        {{ $metadataByTopicCategory['Environment and Conservation'] }},
                        {{ $metadataByTopicCategory['Facilities and Structures'] }},
                        {{ $metadataByTopicCategory['Geological and Geophysical'] }},
                        {{ $metadataByTopicCategory['Human Health and Disease'] }},
                        {{ $metadataByTopicCategory['Imagery and Base Maps'] }},
                        {{ $metadataByTopicCategory['Inland Water Resources'] }},
                        {{ $metadataByTopicCategory['Locations and Geodetic Networks'] }},
                        {{ $metadataByTopicCategory['Military'] }},
                        {{ $metadataByTopicCategory['Oceans and Estuaries'] }},
                        {{ $metadataByTopicCategory['Transportation Networks'] }},
                        {{ $metadataByTopicCategory['Utilities and Communication'] }},
                    ],
                    fill: false
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false,
                        }
                    },
                },
            },
        });

        // Pie chart
        var pie2 = document.getElementById("pie-chart2").getContext("2d");

        new Chart(pie2, {
            type: "pie",
            data: {
                labels: ['General', 'Aeronautical','Demarcation', 'Built Environment', 'Hydrography'],
                datasets: [{
                    label: "Projects",
                    weight: 9,
                    cutout: 0,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 2,
                    backgroundColor: ['#17c1e8', '#cb0c9a', '#a8c8d8', '#3A416F', '#a8b8d8'],
                    data: [139.9, 341.9, 301.9, 251.1, 165.8],
                    fill: false
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false,
                        }
                    },
                },
            },
        });

        // Line chart
        var ctx1 = document.getElementById("line-chart").getContext("2d");

        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Organic Search",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 2,
                        pointBackgroundColor: "#cb0c9f",
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6
                    },
                    {
                        label: "Referral",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 2,
                        pointBackgroundColor: "#3A416F",
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                    {
                        label: "Direct",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 2,
                        pointBackgroundColor: "#17c1e8",
                        borderColor: "#17c1e8",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        data: [40, 80, 70, 90, 30, 90, 140, 130, 200],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 10,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        // Line chart with gradient
        var ctx2 = document.getElementById("line-chart-gradient").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 10,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        // Doughnut chart
        var ctx3 = document.getElementById("doughnut-chart").getContext("2d");

        new Chart(ctx3, {
            type: "doughnut",
            data: {
                labels: ['Creative Tim', 'Github', 'Bootsnipp', 'Dev.to', 'Codeinwp'],
                datasets: [{
                    label: "Projects",
                    weight: 9,
                    cutout: 60,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 2,
                    backgroundColor: ['#2152ff', '#3A416F', '#f53939', '#a8b8d8', '#cb0c9f'],
                    data: [15, 20, 12, 60, 20],
                    fill: false
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false,
                        }
                    },
                },
            },
        });



        // Bar chart
        var ctx5 = document.getElementById("bar-chart").getContext("2d");

        new Chart(ctx5, {
            type: "bar",
            data: {
                labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42+'],
                datasets: [{
                    label: "Sales by age",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 4,
                    backgroundColor: '#3A416F',
                    data: [15, 20, 12, 60, 20, 15],
                    fill: false,
                    maxBarThickness: 35
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10
                        }
                    },
                },
            },
        });

        // Bar chart horizontal
        var ctx6 = document.getElementById("bar-chart-horizontal").getContext("2d");

        new Chart(ctx6, {
            type: "bar",
            data: {
                labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42+'],
                datasets: [{
                    label: "Sales by age",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 4,
                    backgroundColor: '#3A416F',
                    data: [15, 20, 12, 60, 20, 15],
                    fill: false
                }],
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7'
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10
                        }
                    },
                },
            },
        });

        // Mixed chart
        var ctx7 = document.getElementById("mixed-chart").getContext("2d");

        new Chart(ctx7, {
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        type: "bar",
                        label: "Organic Search",
                        weight: 5,
                        tension: 0.4,
                        borderWidth: 0,
                        pointBackgroundColor: "#3A416F",
                        borderColor: "#3A416F",
                        backgroundColor: '#3A416F',
                        borderRadius: 4,
                        borderSkipped: false,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 10,
                    },
                    {
                        type: "line",
                        label: "Referral",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        pointBackgroundColor: "#cb0c9f",
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        fill: true,
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 10,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        // Bubble chart
        var ctx8 = document.getElementById("bubble-chart").getContext("2d");

        new Chart(ctx8, {
            type: "bubble",
            data: {
                labels: ['0', '10', '20', '30', '40', '50', '60', '70', '80', '90'],
                datasets: [{
                        label: 'Dataset 1',
                        data: [{
                            x: 100,
                            y: 0,
                            r: 10
                        }, {
                            x: 60,
                            y: 30,
                            r: 20
                        }, {
                            x: 40,
                            y: 350,
                            r: 10
                        }, {
                            x: 80,
                            y: 80,
                            r: 10
                        }, {
                            x: 20,
                            y: 30,
                            r: 15
                        }, {
                            x: 0,
                            y: 100,
                            r: 5
                        }],
                        backgroundColor: '#cb0c9f',
                    },
                    {
                        label: 'Dataset 2',
                        data: [{
                            x: 70,
                            y: 40,
                            r: 10
                        }, {
                            x: 30,
                            y: 60,
                            r: 20
                        }, {
                            x: 10,
                            y: 300,
                            r: 25
                        }, {
                            x: 60,
                            y: 200,
                            r: 10
                        }, {
                            x: 50,
                            y: 300,
                            r: 15
                        }, {
                            x: 20,
                            y: 350,
                            r: 5
                        }],
                        backgroundColor: '#3A416F',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 10,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        // Radar chart
        var ctx9 = document.getElementById("radar-chart").getContext("2d");

        new Chart(ctx9, {
            type: "radar",
            data: {
                labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
                datasets: [{
                    label: "Student A",
                    backgroundColor: "rgba(58,65,111,0.2)",
                    data: [65, 75, 70, 80, 60, 80],
                    borderDash: [5, 5],
                }, {
                    label: "Student B",
                    backgroundColor: "rgba(203,12,159,0.2)",
                    data: [54, 65, 60, 70, 70, 75]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });

        // Radar chart
        var ctx10 = document.getElementById("polar-chart").getContext("2d");

        new Chart(ctx10, {
            type: "polarArea",
            data: {
                labels: [
                    'Red',
                    'Green',
                    'Yellow',
                    'Grey',
                    'Blue'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [11, 16, 7, 3, 14],
                    backgroundColor: ['#17c1e8', '#cb0c9f', '#3A416F', '#a8b8d8', '#82d616'],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    </script>
@stop
