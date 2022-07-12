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

        #chart_bil_pemproses_data {
            width: 100%;
            height: 500px;
        }

        #chart_penjimatan_kos_tahun_bulan {
            width: 100%;
            height: 800px;
        }

        #chart_penjimatan_kos_tahun_kategori {
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
                                    <span class="h2 text-white mr-2">{{ $bil_keseluruhan_data }}
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
                                    <span class="h2 text-white mr-2">{{ $bil_keseluruhan_data_lulus }}
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
                                    <span class="h2 text-white mr-2">{{ $bil_keseluruhan_data_tolak }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row p-3 pl-0 mb-0">
                                    <form style="width: 100%;" >

                                        <div class="row">

                                            <div class="col-6">
                                                <label>Tarikh Mula</label>
                                                <input class="form-control" type="date" name="tarikh_mula"
                                                    autocomplete="off" />
                                            </div>
                                            <div class="col-6">
                                                <label>Tarikh Akhir</label>
                                                <input class="form-control" type="date" name="tarikh_akhir"
                                                    id="tahun" autocomplete="off" />
                                            </div>
                                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                                <button class="btn btn-primary btn-sm mr-1" type="submit"><i
                                                        class="fas fa-search"></i> CARI</button>
                                                <a href="/mygeo_dashboard_data_asas" class="btn btn-sm btn-danger"
                                                    (click)="reset()">SET SEMULA</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="surtitle">Bar Chart</h6>
                                        <h5 class="h2 mb-0">Statistik Keseluruhan Permohonan Data</h5>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class=" card-header bg-secondary">
                                <h6 class=" surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Statistik Permohonan Data Mengikut Kategori Data</h5>
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
                                        <h5 class="h2 mb-0">Statistik Permohonan Data Mengikut Lapisan Data</h5>
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
                                <h5 class=" h2 mb-0">Statistik Permohonan Data Mengikut Kategori Pemohon Data</h5>
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
                            <div class=" card-header bg-secondary">
                                <h6 class="surtitle">Bar Chart</h6>
                                <h5 class=" h2 mb-0">Statistik Agihan Tugasan Pegawai (Pemproses Data)</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_bil_pemproses_data"></div>
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
                                <h5 class=" h2 mb-0">Anggaran Penjimatan Kos Sehingga Tahun dan Bulan</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_penjimatan_kos_tahun_bulan"></div>
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
                                <h5 class=" h2 mb-0">Anggaran Penjimatan Kos Sehingga Tahun dan Kategori</h5>
                            </div>
                            <div class="card-body">
                                <div class="amchart">
                                    <div id="chart_penjimatan_kos_tahun_kategori"></div>
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
            am4core.addLicense('ch-custom-attribution');
            // Themes end

            var chart = am4core.create("chart_bil_tahun", am4charts.XYChart);
            // Add data
            chart.data = {!! json_encode($statSeluruhMohonData) !!}
//            chart.data = [{
//                "country": "Januari",
//                "visits": 4025
//            }, {
//                "country": "Disember",
//                "visits": 395
//            }, ];

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

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            am4core.useTheme(am4themes_material);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_kategori_data", am4charts.XYChart);
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
            chart.data = {!! json_encode($statMohonMengikutCatData) !!};
//            chart.data = [{
//                "country": "Special Use",
//                "visits": 0
//            }, {
//                "country": "Built Environment",
//                "visits": 90
//            }, ];

            // Cursor
            chart.cursor = new am4charts.XYCursor();
        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_lapisan_data", am4charts.XYChart);

            // Add data
            chart.data = {!! json_encode($statMohonMengikutLapisanData) !!};
//            chart.data = [{
//                    "region": "Built Environment",
//                    "state": "Bank",
//                    "sales": 3
//                },
//                {
//                    "region": "Vegetation",
//                    "state": "Tea",
//                    "sales": 1
//                },
//            ];

            // Create axes
            var yAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            yAxis.dataFields.category = "state";
            yAxis.renderer.grid.template.location = 0;
            yAxis.renderer.labels.template.fontSize = 10;
            yAxis.renderer.minGridDistance = 10;

            var xAxis = chart.xAxes.push(new am4charts.ValueAxis());

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueX = "sales";
            series.dataFields.categoryY = "state";
            series.columns.template.tooltipText = "{categoryY}: [bold]{valueX}[/]";
            series.columns.template.strokeWidth = 0;
            series.columns.template.adapter.add("fill", function(fill, target) {
                if (target.dataItem) {
                    switch (target.dataItem.dataContext.region) {
                        case "Built Environment":
                            return chart.colors.getIndex(0);
                            break;
                        case "Soil":
                            return chart.colors.getIndex(1);
                            break;
                        case "Geology":
                            return chart.colors.getIndex(2);
                            break;
                        case "Aeronautical":
                            return chart.colors.getIndex(3);
                            break;
                    }
                }
                return fill;
            });

            var axisBreaks = {};
            var legendData = [];

            // Add ranges
            function addRange(label, start, end, color) {
                var range = yAxis.axisRanges.create();
                range.category = start;
                range.endCategory = end;
                range.label.text = label;
                range.label.disabled = false;
                range.label.fill = color;
                range.label.location = 0;
                range.label.dx = -180;
                range.label.dy = 12;
                range.label.fontWeight = "bold";
                range.label.fontSize = 10;
                range.label.horizontalCenter = "left"
                range.label.inside = true;

                range.grid.stroke = am4core.color("#396478");
                range.grid.strokeOpacity = 1;
                range.tick.length = 200;
                range.tick.disabled = false;
                range.tick.strokeOpacity = 0.6;
                range.tick.stroke = am4core.color("#396478");
                range.tick.location = 0;

                range.locations.category = 1;
                var axisBreak = yAxis.axisBreaks.create();
                axisBreak.startCategory = start;
                axisBreak.endCategory = end;
                axisBreak.breakSize = 1;
                axisBreak.fillShape.disabled = true;
                axisBreak.startLine.disabled = true;
                axisBreak.endLine.disabled = true;
                axisBreaks[label] = axisBreak;

                legendData.push({
                    name: label,
                    fill: color
                });
            }

            addRange("Built Environment", "Institusi (Institutional - BD)", "Bank", chart.colors.getIndex(0));
            addRange("Soil", "(Soil Classification)", "District or Jajahan Coverage", chart.colors.getIndex(1));
            addRange("Geology", "Jenis Batuan (Geolithology - GA)", "Lake", chart.colors.getIndex(2));
            addRange("Aeronautical", "Lapangan Terbang (Aerodrome- AB)", "Ruang Udara (Air Space - AA)", chart.colors.getIndex(3));

            chart.cursor = new am4charts.XYCursor();


            var legend = new am4charts.Legend();
            legend.position = "right";
            legend.scrollable = true;
            legend.valign = "top";
            legend.reverseOrder = true;

            chart.legend = legend;
            legend.data = legendData;

            legend.itemContainers.template.events.on("toggled", function(event) {
                var name = event.target.dataItem.dataContext.name;
                var axisBreak = axisBreaks[name];
                if (event.target.isActive) {
                    axisBreak.animate({
                        property: "breakSize",
                        to: 0
                    }, 1000, am4core.ease.cubicOut);
                    yAxis.dataItems.each(function(dataItem) {
                        if (dataItem.dataContext.region == name) {
                            dataItem.hide(1000, 500);
                        }
                    })
                    series.dataItems.each(function(dataItem) {
                        if (dataItem.dataContext.region == name) {
                            dataItem.hide(1000, 0, 0, ["valueX"]);
                        }
                    })
                } else {
                    axisBreak.animate({
                        property: "breakSize",
                        to: 1
                    }, 1000, am4core.ease.cubicOut);
                    yAxis.dataItems.each(function(dataItem) {
                        if (dataItem.dataContext.region == name) {
                            dataItem.show(1000);
                        }
                    })

                    series.dataItems.each(function(dataItem) {
                        if (dataItem.dataContext.region == name) {
                            dataItem.show(1000, 0, ["valueX"]);
                        }
                    })
                }
            })

        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_pemohon_data", am4charts.PieChart);

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
            pieSeries.labels.template.bent = false;
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

            chart.data = {!! json_encode($statMohonMengikutCatPemohonData) !!}
//            chart.data = [{
//                "country": "Agensi Persekutuan/Agensi Negeri",
//                "litres": 199
//            }, {
//                "country": "IPTS Pensyarah/Penyelidik",
//                "litres": 54
//            }];
        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_bil_pemproses_data", am4charts.XYChart);

            // Add data
            chart.data = {!! json_encode($statAgihanTugasPegawai) !!}
//            chart.data = [{
//                "country": "A",
//                "visits": 25
//            }, {
//                "country": "G",
//                "visits": 9
//            }, ];

            // Create axes

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;

            categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                if (target.dataItem && target.dataItem.index & 2 == 2) {
                    return dy + 25;
                }
                return dy;
            });

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;

        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_penjimatan_kos_tahun_bulan", am4charts.XYChart3D);

            // Add data
            chart.data = {!! json_encode($anggaranJimatKosTahunBulan) !!};
//            chart.data = [{
//                "country": "November",
//                "visits": 443
//            }, {
//                "country": "Disember",
//                "visits": 441
//            }, ];

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

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart_penjimatan_kos_tahun_kategori", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            // Add data
            chart.data = {!! json_encode($anggaranJimatKosCat) !!};
//            chart.data = [{
//                "country": "Special Use",
//                "visits": 3025
//            }, {
//                "country": "Built Environment",
//                "visits": 443
//            }, ];

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.tooltipText = "RM [{categoryX}: bold]{valueY}[/]";
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
    </script>
@stop
