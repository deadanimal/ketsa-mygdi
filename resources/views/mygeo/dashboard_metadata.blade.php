@extends('layouts.app_mygeo_ketsa')

@section('content')
    <style>
        #chart_bil_metadata_kategori {
            width: 100%;
            height: 700px;
        }

        #chart_bil_metadata_kategori_topik {
            width: 100%;
            height: 1000px;
        }

        #chart_bil_metadata_content_type {
            width: 100%;
            height: 800px;
        }

        #chart_bil_metadata_negeri {
            width: 100%;
            height: 800px;
        }

    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header ">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row p-3 pl-0 mb-0">
                                    <form style="width: 100%;" (ngSubmit)="filterCharts()">

                                        <div class="row">

                                            <div class="col-6">
                                                <label>Tarikh Mula</label>
                                                <input class="form-control" type="date" name="tarikh_mula"
                                                    autocomplete="off" />
                                            </div>
                                            <div class="col-6">
                                                <label>Tarikh Akhir</label>
                                                <input class="form-control" type="date" name="tarikh_akhir" id="tahun"
                                                    autocomplete="off" />
                                            </div>
                                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                                <button class="btn btn-primary btn-sm mr-1" type="submit"><i
                                                        class="fas fa-search"></i> CARI</button>
                                                <a href="/mygeo_dashboard_metadata" class="btn btn-sm btn-danger"
                                                    (click)="reset()">SET SEMULA</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <div class="card card-stats bg-gradient-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="font-weight-bold text-white text-uppercase mb-0">
                                            Bilangan Keseluruhan Metadata
                                        </h2>
                                        <span class="text-white text-uppercase mb-0">
                                            <?php
                                            if (Auth::user()->hasRole('Pengesah Metadata') || Auth::user()->hasRole('Penerbit Metadata')) {
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
                                    <span class="h2 text-white mr-2">100
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class=" surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Jumlah Metadata Mengikut Kategori</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_metadata_kategori"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Bar Chart</h6>
                                        <h5 class="h2 mb-0">Jumlah Metadata Mengikut Kategori Topik</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_metadata_kategori_topik"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class="surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Jumlah Metadata Mengikut Content Type</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_metadata_content_type"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Pie Chart</h6>

                                        <h5 class="h2 mb-0">Jumlah Metadata Mengikut Negeri</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_metadata_negeri"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="//www.amcharts.com/lib/4/themes/material.js"></script>

    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            am4core.useTheme(am4themes_material);
            am4core.addLicense('ch-custom-attribution');
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_metadata_kategori", am4charts.XYChart);
            chart.colors.step = 2;

            chart.legend = new am4charts.Legend()
            chart.legend.position = 'top'
            chart.legend.paddingBottom = 20
            chart.legend.labels.template.maxWidth = 95

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
            xAxis.dataFields.category = 'category'
            xAxis.renderer.cellStartLocation = 0.1
            xAxis.renderer.cellEndLocation = 0.9
            xAxis.renderer.grid.template.location = 0;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.dataFields.valueY = value;
                series.dataFields.categoryX = 'category';
                series.name = name;
                series.tooltipText = "[bold]{valueY}[/]";

                series.events.on("hidden", arrangeColumns);
                series.events.on("shown", arrangeColumns);

                var bullet = series.bullets.push(new am4charts.LabelBullet())
                bullet.interactionsEnabled = false;
                bullet.dy = 30;
                bullet.label.text = '{valueY}';
                bullet.label.fill = am4core.color('#ffffff')

                return series;
            }

            chart.data = [{
                    category: 'January',
                    first: 40,
                    second: 55,
                    third: 60,
                    forth: 43
                },
                {
                    category: 'February',
                    first: 30,
                    second: 78,
                    third: 69,
                    forth: 43
                },
                {
                    category: 'March',
                    first: 27,
                    second: 40,
                    third: 45,
                    forth: 43
                },
                {
                    category: 'April',
                    first: 50,
                    second: 33,
                    third: 22,
                    forth: 43
                },
                {
                    category: 'May',
                    first: 40,
                    second: 55,
                    third: 60,
                    forth: 43
                },
                {
                    category: 'June',
                    first: 30,
                    second: 78,
                    third: 69,
                    forth: 43
                },
                {
                    category: 'July',
                    first: 27,
                    second: 40,
                    third: 45,
                    forth: 43
                },
                {
                    category: 'August',
                    first: 50,
                    second: 33,
                    third: 22,
                    forth: 43
                },
                {
                    category: 'September',
                    first: 40,
                    second: 55,
                    third: 60,
                    forth: 43
                },
                {
                    category: 'October',
                    first: 30,
                    second: 78,
                    third: 69,
                    forth: 43
                },
                {
                    category: 'November',
                    first: 27,
                    second: 40,
                    third: 45,
                    forth: 43
                },
                {
                    category: 'December',
                    first: 50,
                    second: 33,
                    third: 22,
                    forth: 43
                },
            ]

            createSeries('first', 'DATASET');
            createSeries('second', 'SERVICES');
            createSeries('third', 'IMAGERY');
            createSeries('forth', 'GRIDDED');

            function arrangeColumns() {

                var series = chart.series.getIndex(0);

                var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                if (series.dataItems.length > 1) {
                    var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                    var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                    var delta = ((x1 - x0) / chart.series.length) * w;
                    if (am4core.isNumber(delta)) {
                        var middle = chart.series.length / 2;

                        var newIndex = 0;
                        chart.series.each(function(series) {
                            if (!series.isHidden && !series.isHiding) {
                                series.dummyData = newIndex;
                                newIndex++;
                            } else {
                                series.dummyData = chart.series.indexOf(series);
                            }
                        })
                        var visibleCount = newIndex;
                        var newMiddle = visibleCount / 2;

                        chart.series.each(function(series) {
                            var trueIndex = chart.series.indexOf(series);
                            var newIndex = series.dummyData;

                            var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                            series.animate({
                                property: "dx",
                                to: dx
                            }, series.interpolationDuration, series.interpolationEasing);
                            series.bulletsContainer.animate({
                                property: "dx",
                                to: dx
                            }, series.interpolationDuration, series.interpolationEasing);
                        })
                    }
                }
            }
            chart.cursor = new am4charts.XYCursor();
        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            am4core.useTheme(am4themes_material);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_metadata_kategori_topik", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            // Add data
            chart.data = [{
                "country": "Agriculture and Farming",
                "visits": 3025
            }, {
                "country": "Biology and Ecology",
                "visits": 1882
            }, {
                "country": "Administrative and Political Boundaries",
                "visits": 1809
            }, {
                "country": "Atmosphere and Climatic",
                "visits": 1322
            }, {
                "country": "Business and Economic",
                "visits": 1122
            }, {
                "country": "A64	Elevation and Derived Products",
                "visits": 1114
            }, {
                "country": "A65	Environment and Conservation",
                "visits": 984
            }, {
                "country": "Geological and Geophysical",
                "visits": 711
            }, {
                "country": "Human Health and Disease",
                "visits": 665
            }, {
                "country": "Imagery and Base Maps",
                "visits": 580
            }, {
                "country": "Military",
                "visits": 443
            }, {
                "country": "Inland Water Resources",
                "visits": 441
            }, {
                "country": "Locations and Geodetic Networks",
                "visits": 441
            }, {
                "country": "Oceans and Estuaries",
                "visits": 441
            }, {
                "country": "Cadastral",
                "visits": 441
            }, {
                "country": "Cultural, Society and Demography",
                "visits": 441
            }, {
                "country": "Facilities and Structures",
                "visits": 441
            }, {
                "country": "Transportation Networks",
                "visits": 441
            }, {
                "country": "Utilities and Communication",
                "visits": 441
            }];

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 285;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            // on hover, make corner radiuses bigger
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            // Cursor
            chart.cursor = new am4charts.XYCursor();
        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_metadata_content_type", am4charts.PieChart);

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";

            // Let's cut a hole in our Pie chart the size of 30% the radius
            chart.innerRadius = am4core.percent(30);

            // Put a thick white border around each Slice
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.slices.template
                // change the cursor on hover to make it apparent the object can be interacted with
                .cursorOverStyle = [{
                    "property": "cursor",
                    "value": "pointer"
                }];

            pieSeries.alignLabels = false;
            pieSeries.labels.template.bent = true;
            pieSeries.labels.template.radius = 3;
            pieSeries.labels.template.padding(0, 0, 0, 0);

            pieSeries.ticks.template.disabled = true;

            // Create a base filter effect (as if it's not there) for the hover to return to
            var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
            shadow.opacity = 0;

            // Create hover state
            var hoverState = pieSeries.slices.template.states.getKey(
                "hover"); // normally we have to create the hover state, in this case it already exists

            // Slightly shift the shadow and make it more prominent on hover
            var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
            hoverShadow.opacity = 0.7;
            hoverShadow.blur = 5;

            // Add a legend
            chart.legend = new am4charts.Legend();

            chart.data = [{
                "country": "Downloadable Data",
                "litres": 501.9
            }, {
                "country": "Offline Data",
                "litres": 165.8
            }, {
                "country": "Static Map Images",
                "litres": 139.9
            }, {
                "country": "Other Documents",
                "litres": 128.3
            }, {
                "country": "Application",
                "litres": 99
            }, {
                "country": "Geographic Services",
                "litres": 60
            }, {
                "country": "Clearing House",
                "litres": 501.9
            }, {
                "country": "Map File",
                "litres": 165.8
            }, {
                "country": "Geographic Activities",
                "litres": 139.9
            }, {
                "country": "Live Map Services",
                "litres": 128.3
            }, {
                "country": "Imagery",
                "litres": 99
            }, {
                "country": "Gridded",
                "litres": 60
            }, ];

        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chart_bil_metadata_negeri", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

            chart.legend = new am4charts.Legend();

            chart.data = [{
                    country: "JOHOR",
                    litres: 501.9
                },
                {
                    country: "KEDAH",
                    litres: 301.9
                },
                {
                    country: "KELANTAN",
                    litres: 201.1
                },
                {
                    country: "MELAKA",
                    litres: 165.8
                },
                {
                    country: "NEGERI SEMBILAN",
                    litres: 139.9
                },
                {
                    country: "PAHANG",
                    litres: 128.3
                },
                {
                    country: "PULAU PINANG",
                    litres: 99
                },
                {
                    country: "PERAK",
                    litres: 60
                },
                {
                    country: "PERLIS",
                    litres: 50
                },
                {
                    country: "SELANGOR",
                    litres: 50
                },
                {
                    country: "TERENGGANU",
                    litres: 50
                },
                {
                    country: "SARAWAK",
                    litres: 50
                },
                {
                    country: "WILAYAH PERSEKUTUAN KUALA LUMPUR",
                    litres: 50
                },
                {
                    country: "WILAYAH PERSEKUTUAN LABUAN",
                    litres: 50
                },
                {
                    country: "WILAYAH PERSEKUTUAN PUTRAJAYA",
                    litres: 50
                },
            ];

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
    </script>
@stop
