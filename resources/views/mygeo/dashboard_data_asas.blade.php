@extends('layouts.app_mygeo_ketsa')

@section('content')
    <style>
        #chart_bil_kategori_data {
            width: 100%;
            height: 700px;
        }

        #chart_bil_lapisan_data {
            width: 100%;
            height: 1000px;
        }

        #chart_bil_pemohon_data {
            width: 100%;
            height: 700px;
        }

        #chart_bil_tahun {
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
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats bg-gradient-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="font-weight-bold text-white text-uppercase mb-0">
                                            Bilangan Keseluruhan Permohonan Data
                                        </h2>
                                        <span class="text-white text-uppercase mb-0">
                                            <?php
                                            if (Auth::user()->hasRole('Pemohon Data')) {
                                                echo Auth::user()->agensiOrganisasi->name;
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">100
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats bg-gradient-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="font-weight-bold text-white text-uppercase mb-0">
                                            Bilangan Permohonan Data Yang Diluluskan
                                        </h2>
                                        <span class="text-white text-uppercase mb-0">
                                            <?php
                                            if (Auth::user()->hasRole('Pemohon Data')) {
                                                echo Auth::user()->agensiOrganisasi->name;
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">100
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats bg-gradient-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="font-weight-bold text-white text-uppercase mb-0">
                                            Bilangan Permohonan Data Yang Telah Ditolak
                                        </h2>
                                        <span class="text-white text-uppercase mb-0">
                                            <?php
                                            if (Auth::user()->hasRole('Pemohon Data')) {
                                                echo Auth::user()->agensiOrganisasi->name;
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <p class="mt-2 mb-0 text-sm">
                                    <span class="h2 text-white mr-2">100
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
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
                                                <a href="/mygeo_dashboard" class="btn btn-sm btn-danger"
                                                    (click)="reset()">SET SEMULA</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class=" surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Bilangan Permohonan Data Mengikut Kategori Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_kategori_data"></div>
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
                                        <h5 class="h2 mb-0">Bilangan Permohonan Data Mengikut Lapisan Data</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_lapisan_data"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class="surtitle">Pie Chart</h6>
                                <h5 class=" h2 mb-0">Bilangan Permohonan Data Mengikut Kategori Pemohon Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_pemohon_data"></div>
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
                                        <h6 class="surtitle">Bar Chart</h6>
                                        <h5 class="h2 mb-0">Statistik Permohonan Data Mengikut Bulan</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_tahun"></div>
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
            var chart = am4core.create("chart_bil_kategori_data", am4charts.XYChart);
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
                    category: 'Januari',
                    first: 40,
                    second: 55,
                },
                {
                    category: 'Februari',
                    first: 30,
                    second: 78,
                },
                {
                    category: 'Mac',
                    first: 27,
                    second: 40,
                },
                {
                    category: 'April',
                    first: 50,
                    second: 33,
                },
                {
                    category: 'Mei',
                    first: 40,
                    second: 55,
                },
                {
                    category: 'Jun',
                    first: 30,
                    second: 78,
                },
                {
                    category: 'Julai',
                    first: 27,
                    second: 40,
                },
                {
                    category: 'Ogos',
                    first: 50,
                    second: 33,
                },
                {
                    category: 'September',
                    first: 40,
                    second: 55,
                },
                {
                    category: 'Oktober',
                    first: 30,
                    second: 78,
                },
                {
                    category: 'November',
                    first: 27,
                    second: 40,
                },
                {
                    category: 'Disember',
                    first: 50,
                    second: 33,
                },
            ]

            createSeries('first', 'Bil. Permohonan Diterima');
            createSeries('second', 'Jum. Data Dilepaskan');

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
            var chart = am4core.create("chart_bil_lapisan_data", am4charts.XYChart);
            chart.padding(40, 40, 40, 40);

            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.minGridDistance = 1;
            categoryAxis.renderer.inversed = true;
            categoryAxis.renderer.grid.template.disabled = true;

            var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.min = 0;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.categoryY = "country";
            series.dataFields.valueX = "visits";
            series.tooltipText = "{valueX.value}"
            series.columns.template.strokeOpacity = 0;
            series.columns.template.column.cornerRadiusBottomRight = 5;
            series.columns.template.column.cornerRadiusTopRight = 5;

            var labelBullet = series.bullets.push(new am4charts.LabelBullet())
            labelBullet.label.horizontalCenter = "left";
            labelBullet.label.dx = 10;
            labelBullet.label.text = "{valueX.value}";
            labelBullet.locationX = 1;

            // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
            series.columns.template.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            categoryAxis.sortBySeries = series;

            // Add data
            chart.data = [{
                "country": "Special Use",
                "visits": 3025
            }, {
                "country": "Hypsography",
                "visits": 1882
            }, {
                "country": "Utility",
                "visits": 1809
            }, {
                "country": "Soil",
                "visits": 1322
            }, {
                "country": "Vegetation",
                "visits": 1122
            }, {
                "country": "Transportation",
                "visits": 1114
            }, {
                "country": "Hydrography",
                "visits": 984
            }, {
                "country": "Geology",
                "visits": 711
            }, {
                "country": "General",
                "visits": 665
            }, {
                "country": "Demarcation",
                "visits": 580
            }, {
                "country": "Built Environment",
                "visits": 443
            }, ];

            // Cursor
            chart.cursor = new am4charts.XYCursor();
        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var container = am4core.create("chart_bil_pemohon_data", am4core.Container);

            container.width = am4core.percent(100);
            container.height = am4core.percent(100);
            container.layout = "horizontal";


            var chart = container.createChild(am4charts.PieChart);

            // Add data
            chart.data = [{
                "country": "Kerajaan",
                "litres": 500,
                "subData": [{
                    name: "A",
                    value: 200
                }, {
                    name: "B",
                    value: 150
                }, {
                    name: "C",
                    value: 100
                }, {
                    name: "D",
                    value: 50
                }]
            }, {
                "country": "Pelajar",
                "litres": 300,
                "subData": [{
                    name: "A",
                    value: 150
                }, {
                    name: "B",
                    value: 100
                }, {
                    name: "C",
                    value: 50
                }]
            }, {
                "country": "Swasta",
                "litres": 200,
                "subData": [{
                    name: "A",
                    value: 110
                }, {
                    name: "B",
                    value: 60
                }, {
                    name: "C",
                    value: 30
                }]
            }, ];

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.states.getKey("active").properties.shiftRadius = 0;
            //pieSeries.labels.template.text = "{category}\n{value.percent.formatNumber('#.#')}%";

            pieSeries.slices.template.events.on("hit", function(event) {
                selectSlice(event.target.dataItem);
            })

            var chart2 = container.createChild(am4charts.PieChart);
            chart2.width = am4core.percent(30);
            chart2.radius = am4core.percent(80);

            // Add and configure Series
            var pieSeries2 = chart2.series.push(new am4charts.PieSeries());
            pieSeries2.dataFields.value = "value";
            pieSeries2.dataFields.category = "name";
            pieSeries2.slices.template.states.getKey("active").properties.shiftRadius = 0;
            //pieSeries2.labels.template.radius = am4core.percent(50);
            //pieSeries2.labels.template.inside = true;
            //pieSeries2.labels.template.fill = am4core.color("#ffffff");
            pieSeries.alignLabels = false;
            pieSeries.labels.template.bent = true;
            pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";
            pieSeries.labels.template.radius = 3;
            pieSeries.labels.template.padding(0, 0, 0, 0);

            var interfaceColors = new am4core.InterfaceColorSet();

            var line1 = container.createChild(am4core.Line);
            line1.strokeDasharray = "2,2";
            line1.strokeOpacity = 0.5;
            line1.stroke = interfaceColors.getFor("alternativeBackground");
            line1.isMeasured = false;

            var line2 = container.createChild(am4core.Line);
            line2.strokeDasharray = "2,2";
            line2.strokeOpacity = 0.5;
            line2.stroke = interfaceColors.getFor("alternativeBackground");
            line2.isMeasured = false;

            var selectedSlice;

            function selectSlice(dataItem) {

                selectedSlice = dataItem.slice;

                var fill = selectedSlice.fill;

                var count = dataItem.dataContext.subData.length;
                pieSeries2.colors.list = [];
                for (var i = 0; i < count; i++) {
                    pieSeries2.colors.list.push(fill.brighten(i * 2 / count));
                }

                chart2.data = dataItem.dataContext.subData;
                pieSeries2.appear();

                var middleAngle = selectedSlice.middleAngle;
                var firstAngle = pieSeries.slices.getIndex(0).startAngle;
                var animation = pieSeries.animate([{
                    property: "startAngle",
                    to: firstAngle - middleAngle
                }, {
                    property: "endAngle",
                    to: firstAngle - middleAngle + 360
                }], 600, am4core.ease.sinOut);
                animation.events.on("animationprogress", updateLines);

                selectedSlice.events.on("transformed", updateLines);

                //  var animation = chart2.animate({property:"dx", from:-container.pixelWidth / 2, to:0}, 2000, am4core.ease.elasticOut)
                //  animation.events.on("animationprogress", updateLines)
            }


            function updateLines() {
                if (selectedSlice) {
                    var p11 = {
                        x: selectedSlice.radius * am4core.math.cos(selectedSlice.startAngle),
                        y: selectedSlice.radius * am4core.math.sin(selectedSlice.startAngle)
                    };
                    var p12 = {
                        x: selectedSlice.radius * am4core.math.cos(selectedSlice.startAngle + selectedSlice
                            .arc),
                        y: selectedSlice.radius * am4core.math.sin(selectedSlice.startAngle + selectedSlice.arc)
                    };

                    p11 = am4core.utils.spritePointToSvg(p11, selectedSlice);
                    p12 = am4core.utils.spritePointToSvg(p12, selectedSlice);

                    var p21 = {
                        x: 0,
                        y: -pieSeries2.pixelRadius
                    };
                    var p22 = {
                        x: 0,
                        y: pieSeries2.pixelRadius
                    };

                    p21 = am4core.utils.spritePointToSvg(p21, pieSeries2);
                    p22 = am4core.utils.spritePointToSvg(p22, pieSeries2);

                    line1.x1 = p11.x;
                    line1.x2 = p21.x;
                    line1.y1 = p11.y;
                    line1.y2 = p21.y;

                    line2.x1 = p12.x;
                    line2.x2 = p22.x;
                    line2.y1 = p12.y;
                    line2.y2 = p22.y;
                }
            }

            chart.events.on("datavalidated", function() {
                setTimeout(function() {
                    selectSlice(pieSeries.dataItems.getIndex(0));
                }, 1000);
            });


        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chart_bil_tahun", am4charts.XYChart);
            // Add data
            chart.data = [{
                "country": "Januari",
                "visits": 4025
            }, {
                "country": "Februari",
                "visits": 1882
            }, {
                "country": "Mac",
                "visits": 1809
            }, {
                "country": "April",
                "visits": 1322
            }, {
                "country": "Mei",
                "visits": 1122
            }, {
                "country": "Jun",
                "visits": 1114
            }, {
                "country": "Julai",
                "visits": 984
            }, {
                "country": "Ogos",
                "visits": 711
            }, {
                "country": "September",
                "visits": 665
            }, {
                "country": "Oktober",
                "visits": 580
            }, {
                "country": "November",
                "visits": 441
            }, {
                "country": "Disember",
                "visits": 395
            }, ];

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.rotation = 270;
            categoryAxis.tooltip.label.horizontalCenter = "right";
            categoryAxis.tooltip.label.verticalCenter = "middle";

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Countries";
            valueAxis.title.fontWeight = "bold";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

        });
    </script>
@stop
