@extends('layouts.app_mygeo_afiq2')

@section('content')

    <style>
        .ftest {
            display: inline;
            width: auto;
        }

        th,
        td {
            width: fit-content;
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
                            <h6 class="h2 text-dark d-inline-block mb-0">Laporan Data Asas</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Laporan Data Asas
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
                            <div class="card-body">
                                <div class="row pl-lg-5 my-2">
                                    <div class="col-2">
                                        <label class="form-control-label" for="">Agensi</label>
                                    </div>
                                    <div class="col-7">
                                        <select class="form-control form-control-sm pilihAgensi" name="agensi">
                                            <option selected>Pilih</option>
                                            @foreach ($agensi as $ag)
                                                <option value="{{ $ag->id }}">{{ $ag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row pl-lg-5 my-2">
                                    <div class="col-2">
                                        <label class="form-control-label" for="">Tahun</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control form-control-sm pilihTahun" name="tahun"
                                            id="tahun">
                                    </div>
                                </div>
                                <div class="row pl-lg-5 my-2">
                                    <div class="col-2">
                                        <label class="form-control-label" for="">Bulan dari</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control form-control-sm startMonth" id="startmonth"
                                            name="month">
                                    </div>
                                    <div class="col-1">
                                        <label class="form-control-label" for="">ke</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control form-control-sm endMonth" name="month"
                                            id="endmonth">
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-primary filterBtn float-right">Cari</button>
                                {{-- <div class="tableTest"></div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Laporan Statistik Permohonan Data-data Asas</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart mb-4">
                                    <canvas id="bar-chart-horizontal" class="chart-canvas"></canvas>
                                </div>
                                {{-- <input type="button" value="Add Data" onclick="addData()"> --}}
                                <table id="laporan_perincian" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK PERMOHONAN</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>AGENSI/ORGANISASI</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($permohonans as $mohon)
                                            @if (isset($mohon->users))
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>{{ $mohon->name }}</td>
                                                    <td>{{ $mohon->users->name }}</td>
                                                    <td>
                                                        <?php
                                                        if ($mohon->users->hasRole('Pemohon Data')) {
                                                            $id = $mohon->users->agensi_organisasi;
                                                            $org = App\AgensiOrganisasi::where('id', $id)->first()->name;
                                                            echo $org;
                                                        } else {
                                                            echo $mohon->users->agensiOrganisasi->name;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="lihat_laporan_data/{{ $mohon->id }}"
                                                            class="btn btn-sm btn-primary">Perincian</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>JUMLAH KESELURUHAN DATA</th>
                                        <th>
                                            <div class="countRow">{{ $counter }}</div>
                                        </th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Laporan Statistik Permohonan Data</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan Keseluruhan Permohonan Data </h4>
                                <table id="laporan_seluruh" class="display table table-bordered table-striped"
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>AGENSI</th>
                                            <th>KATEGORI</th>
                                            <th>STATUS</th>
                                            <th>TARIKH PERMOHONAN</th>
                                            <th>TARIKH SERAHAN</th>
                                            <th>KPI</th>
                                            <th>KPI(+/-)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($permohonans as $mohon)
                                            @if (isset($mohon->users))
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>{{ $mohon->users->name }}</td>
                                                    <td>
                                                        <?php
                                                        if ($mohon->users->hasRole('Pemohon Data')) {
                                                            echo $mohon->users->agensi_organisasi;
                                                        } else {
                                                            echo $mohon->users->agensiOrganisasi->name;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>{{ $mohon->users->kategori }}</td>
                                                    <td>
                                                        @if ($mohon->status == '1')
                                                            <span class="badge badge-pill badge-primary">Dalam Proses</span>
                                                        @elseif($mohon->status == '2')
                                                            <span class="badge badge-pill badge-danger">Ditolak</span>
                                                        @elseif($mohon->status == '3')
                                                            <span class="badge badge-pill badge-success">Selesai</span>
                                                        @elseif($mohon->status == '0')
                                                            <span class="badge badge-pill badge-info">Baru</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($mohon->created_at)->format('d/m/Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($mohon->acceptance == '1')
                                                            {{ Carbon\Carbon::parse($mohon->updated_date)->format('d/m/Y') }}
                                                        @endif
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>JUMLAH KESELURUHAN DATA</th>
                                        <th>{{ $counter }}</th>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan permohonan data yang telah diluluskan </h4>
                                <table id="laporan_lulus" class="display table table-bordered table-striped"
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>AGENSI</th>
                                            <th>KATEGORI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($permohonan_lulus as $mohon)
                                            @if (isset($mohon->users))
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>{{ $mohon->users->name }}</td>
                                                    <td>
                                                        <?php
                                                        if ($mohon->users->hasRole('Pemohon Data')) {
                                                            echo $mohon->users->agensi_organisasi;
                                                        } else {
                                                            echo $mohon->users->agensiOrganisasi->name;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>{{ $mohon->users->kategori }}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan permohonan Data mengikut Kategori</h4>
                                <div class="table-responsive">
                                    <table id="laporan_kategori" class="display table table-bordered table-striped"
                                        style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>BIL</th>
                                                <th>NAMA PEMOHON</th>
                                                <th>AGENSI</th>
                                                <th>KATEGORI</th>
                                                <th>JUMLAH PERMOHONAN DATA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @foreach ($permohonan_kategori as $mohon)
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>{{ $mohon->username }}</td>
                                                    <td>{{ $mohon->name }}</td>
                                                    <td>{{ $mohon->kategori }}</td>
                                                    <td>{{ $mohon->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>JUMLAH KESELURUHAN DATA</th>
                                            <th>{{ $counter }}</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Statistik permohonan data mengikut tahun</h4>
                                <div class="table-responsive">
                                    <table id="laporan_statistik" class="display table table-bordered table-striped"
                                        style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>BIL</th>
                                                <th>AGENSI</th>
                                                <th>JUMLAH PERMOHONAN DATA</th>
                                                <th>TAHUN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @foreach ($permohonan_statistik as $mohon)
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>{{ $mohon->agensi_name }}</td>
                                                    <td>{{ $mohon->total_permohonan }}</td>
                                                    <td>{{ $mohon->tahun }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>JUMLAH KESELURUHAN DATA</th>
                                            <th>{{ $counter }}</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#laporan_perincian").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'Laporan Perincian Permohonan Data-data Asas',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'Laporan Perincian Permohonan Data-data Asas',
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'Laporan Perincian Permohonan Data-data Asas',
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
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
    </script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        // Bar chart horizontal
        var ctx6 = document.getElementById("bar-chart-horizontal").getContext("2d");

        var chart = new Chart(ctx6, {
            type: "bar",
            data: {
                labels: [
                    @foreach ($permohonans as $mohon)
                        '{{ $mohon->agensi }}',
                    @endforeach
                ],
                datasets: [{
                    label: " Agensi / Jumlah Permohonan",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 4,
                    backgroundColor: '#0384fc',
                    data: [
                        @foreach ($permohonans as $mohon)
                            '{{ $mohon->total }}',
                        @endforeach
                    ],
                    fill: false,
                    maxBarThickness: 20
                }],
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: "Statistik Jumlah Permohonan Data berdasarkan Agensi",
                        fontSize: 18,
                    },
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: true,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [3, 3]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7',
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: true,
                            display: true,
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

        $(document).ready(function() {
            $.fn.datepicker.dates['en'] = {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August",
                    "September", "October", "November", "December"
                ],
                monthsShort: ["Jan", "Feb", "Mac", "Apr", "Mei", "Jun", "Jul", "Ogos", "Sep", "Okt", "Nov",
                    "Dis"
                ],
                today: "Today",
                clear: "Clear",
                format: "mm/dd/yyyy",
                titleFormat: "MM yyyy",
                /* Leverages same syntax as 'format' */
                weekStart: 0
            };

            from = $("#startmonth").datepicker({
                format: "mm",
                startView: "months",
                minViewMode: "months",
                minViewMode: "months",
                updateViewDate: true,
                changeYear: true,
                autoClose: true,
            })
            to = $("#endmonth").datepicker({
                format: "mm",
                startView: "months",
                minViewMode: "months",
                updateViewDate: true,
                changeYear: true,
                autoClose: true
            });

            year = $("#tahun").datepicker({
                format: "yyyy",
                startView: "years",
                minViewMode: "years",
                autoClose: true

            }).on("change", function() {
                // console.log(year.val());
                from.datepicker('update', new Date(year.val()));
                to.datepicker('update', new Date(year.val()));
            });

            $('.filterBtn').click(function() {
                var year = $('.pilihTahun').val();
                var agensi_id = $('.pilihAgensi').val();
                var start_month = $('.startMonth').val();
                var end_month = $('.endMonth').val();
                var sd = new Date(year, parseInt(start_month) - 1, 1);
                var ed = new Date(year, parseInt(end_month), 1);
                ed.setDate(ed.getDate() - 1);
                var start_date = sd.getFullYear() + "-" + (sd.getMonth() + 1) + "-" + sd.getDate() +
                    " 00:00:00";;
                var end_date = ed.getFullYear() + "-" + (ed.getMonth() + 1) + "-" + ed.getDate() +
                    " 00:00:00";
                console.log(agensi_id, start_date, end_date);

                if (year != '') {
                    $.ajax({
                        method: "POST",
                        url: "filter_by_agensi",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "agensi_id": agensi_id,
                            "start_date": start_date,
                            "end_date": end_date
                        },
                    }).done(function(res) {
                        // alert("Status pengguna berjaya diubah.");
                        console.log(res['data']);
                        let array = res['data'];
                        $('#laporan_perincian').DataTable().clear().draw();
                        if (res['data'].length > 0) {
                            array.forEach(element => {
                                $('#laporan_perincian').DataTable().row.add($(element))
                                    .draw();
                            });
                        }
                        $('.countRow').html(res['counter']);

                        removeData();
                        let bln = res['month'];
                        console.log('hmmmm', bln);
                        let result = [];
                        result = Object.entries(bln);
                        console.log('res', result, chart.data.labels.length);
                        result.forEach(e => {
                            // console.log(e);
                            chart.data.labels.push(e[0]);
                            chart.data.datasets[0].data.push(e[1].length);
                        });
                        chart.update();

                    });
                }
            });

            function getRandomIntInclusive(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            function addData() {
                chart.data.labels.push("NEW")
                chart.data.datasets[0].data.push(getRandomIntInclusive(1, 25));
                chart.update();
            }

            function removeData() {
                let total = chart.data.labels.length;

                while (total >= 0) {
                    chart.data.labels.pop();
                    chart.data.datasets[0].data.pop();
                    total--;
                }

                chart.update();
                console.log('remove', total);
            }
        });
    </script>



@stop
