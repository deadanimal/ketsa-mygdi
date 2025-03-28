@extends('layouts.app_mygeo_afiq2')

@section('content')

    <style>
        .ftest {
            display: inline;
            width: auto;
        }

        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header ">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Laporan Metadata</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Laporan Metadata
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
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Laporan Perincian Metadata</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body mb-0">
                                <div class="mb-5" id="chartdiv"></div>
                                <h4 class="heading text-muted">Bilangan keseluruhan metadata yang diterbitkan (Mengikut
                                    agensi)</h4>
                                <table id="laporan_seluruh" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA METADATA</th>
                                            <th>AGENSI</th>
                                            <th>PENERBIT</th>
                                            <th>KATEGORI</th>
                                            <th>TARIKH DITERBITKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($metadatas as $key => $val)
                                            @if ($val[1]->disahkan == 'yes')
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>
                                                        <?php echo $val[1]->title; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $agency = '';
                                                        if (isset($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) != '') {
                                                            $agency = $val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString;
                                                        }
                                                        echo $agency;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $publisher = '';
                                                        if (isset($val[0]->contact->CI_ResponsibleParty->individualName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->individualName->CharacterString) != '') {
                                                            $publisher = $val[0]->contact->CI_ResponsibleParty->individualName->CharacterString;
                                                        }
                                                        echo $publisher;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $category = '';
                                                        if (isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != '') {
                                                            $category = trim($val[0]->hierarchyLevel->MD_ScopeCode);
                                                        }
                                                        echo $category;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        {{ date('d/m/Y', strtotime($val[1]->changedate)) }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>JUMLAH KESELURUHAN METADATA</th>
                                        <th>{{ $counter }}</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#laporan_seluruh").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)'
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)'
                    },
                    {
                        text: 'Word',
                        className: 'btn btn-sm btn-primary btn_download_word_laporan_bil_metadata_terbit_ikut_agensi',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)',
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": true,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
                    "sInfoEmpty": "Paparan 0 rekod (0 hingga 0)",
                    "sEmptyTable": "Tiada rekod ditemui",
                    "sZeroRecords": "Tiada rekod ditemui",
                    "sLengthMenu": "Papar _MENU_ rekod",
                    "sLoadingRecords": "Sila tunggu...",
                    "sSearch": "Carian:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sLast": "Terakhir",
                        "sNext": ">",
                        "sPrevious": "<",
                    }
                }
            });
        });

        $(document).ready(function() {
            $(document).on("click", ".btn_download_word_laporan_bil_metadata_terbit_ikut_agensi", function() {
                window.open("{{ url('download_laporan_bil_metadata_terbit_ikut_agensi') }}", '_blank');
            });

            $(document).on("click", ".btnDelete", function() {
                var user_id = $(this).data('permohonanid');
                var permohonan_id = $(this).data('permohonanid');
                var r = confirm("Adakah anda pasti untuk padam metadata ini?");
                if (r == true) {
                    $.ajax({
                        method: "POST",
                        url: "delete_permohonan",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "user_id": user_id,
                            "permohonan_id": permohonan_id
                        },
                    }).done(function(response) {
                        alert("Permohonan berjaya dipadam.");
                        location.reload();
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            am4core.addLicense('ch-custom-attribution');
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);

            // Add data
            chart.data = [{
                "country": "USA",
                "visits": 2025
            }, {
                "country": "China",
                "visits": 1882
            }, {
                "country": "Japan",
                "visits": 1809
            }, {
                "country": "Germany",
                "visits": 1322
            }, {
                "country": "UK",
                "visits": 1122
            }, {
                "country": "France",
                "visits": 1114
            }, {
                "country": "India",
                "visits": 984
            }, {
                "country": "Spain",
                "visits": 711
            }, {
                "country": "Netherlands",
                "visits": 665
            }, {
                "country": "Russia",
                "visits": 580
            }, {
                "country": "South Korea",
                "visits": 443
            }, {
                "country": "Canada",
                "visits": 441
            }, {
                "country": "Brazil",
                "visits": 395
            }];

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

        }); // end am4core.ready()
    </script>

@stop
