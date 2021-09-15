@extends('layouts.app_mygeo_afiq2')

@section('content')

    <style>
        .ftest {
            display: inline;
            width: auto;
        }

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
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
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Laporan Perincian Permohonan Data-data Asas</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                <table id="laporan_perincian" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK PERMOHONAN</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>AGENSI/ORGANISASI</th>
                                            <th>EMEL</th>
                                            <th>NOMBOR TELEFON</th>
                                            <th>JUMLAH DATA YANG DIPOHON</th>
                                            <th>TARIKH PERMOHONAN DATA</th>
                                            <th>TARIKH PENJANAAN LAPORAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_perincian as $mohon)
                                            @if(isset($mohon->users))
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $mohon->name }}</td>
                                                    <td>{{ $mohon->users->name }}</td>
                                                    @if($mohon->users->hasRole('Pemohon Data'))
                                                        <td>{{ $mohon->users->agensi_organisasi }}</td>
                                                    @else
                                                        <td>{{ $mohon->users->agensiOrganisasi->name }}</td>
                                                    @endif
                                                    <td>{{ $mohon->users->email }}</td>
                                                    <td>{{ $mohon->users->phone_bimbit }}</td>
                                                    <td></td>
                                                    <td>{{ Carbon\Carbon::parse($mohon->date)->format('d/m/Y') }}</td>
                                                    <td></td>

                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
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
                                <table id="laporan_seluruh" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>AGENSI</th>
                                            <th>KATEGORI</th>
                                            <th>STATUS</th>
                                            <th>TARIKH PERMOHONAN</th>
                                            <th>TARIKH SERAHAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonans as $mohon)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $mohon->username }}</td>
                                                <td>{{ $mohon->agensi_name }}</td>
                                                <td>{{ $mohon->kategori }}</td>
                                                <td>
                                                    @if ($mohon->status == '1')
                                                        <span class="badge badge-pill badge-success">Dalam Proses</span>
                                                    @elseif($mohon->status == '2')
                                                        <span class="badge badge-pill badge-danger">Ditolak</span>
                                                    @elseif($mohon->status == '0')
                                                        <span class="badge badge-pill badge-info">Baru</span>
                                                    @endif
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($mohon->date)->format('d/m/Y') }}</td>
                                                <td>
                                                    @if ($mohon->acceptance == '1')
                                                        {{ Carbon\Carbon::parse($mohon->updated_date)->format('d/m/Y') }}
                                                    @endif
                                                    <td>{{ $mohon->users->kategori }}</td>
                                                    <td>
                                                        @if ($mohon->status == '1')
                                                            <span class="badge badge-pill badge-success">Dalam Proses</span>
                                                        @elseif($mohon->status == '2')
                                                            <span class="badge badge-pill badge-danger">Ditolak</span>
                                                        @elseif($mohon->status == '0')
                                                            <span class="badge badge-pill badge-info">Baru</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($mohon->date)->format('d/m/Y') }}</td>
                                                    <td>
                                                        @if ($mohon->acceptance == '1')
                                                            {{ Carbon\Carbon::parse($mohon->updated_date)->format('d/m/Y') }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan permohonan data yang telah diluluskan </h4>
                                <table id="laporan_lulus" class="table table-bordered table-striped"
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
                                        @foreach ($permohonan_lulus as $mohon)
                                            @if(isset($mohon->users))
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $mohon->users->name }}</td>
                                                    @if($mohon->users->hasRole('Pemohon Data'))
                                                        <td>{{ $mohon->users->agensi_organisasi }}</td>
                                                    @else
                                                        <td>{{ $mohon->users->agensiOrganisasi->name }}</td>
                                                    @endif
                                                    <td>{{ $mohon->users->kategori }}</td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan permohonan Data mengikut Kategori</h4>
                                <div class="table-responsive">
                                    <table id="laporan_kategori" class="table table-bordered table-striped"
                                        style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>BIL</th>
                                                <th>NAMA PEMOHON</th>
                                                <th>AGENSI</th>
                                                <th>JUMLAH PERMOHONAN DATA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permohonan_kategori as $mohon)
                                                @if(isset($mohon->users))
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $mohon->username }}</td>
                                                        <td>{{ $mohon->name }}</td>
                                                        <td>{{ $mohon->total }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Statistik permohonan data mengikut tahun</h4>
                                <div class="table-responsive">
                                    <table id="laporan_statistik" class="table table-bordered table-striped"
                                        style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>BIL</th>
                                                <th>NAMA PEMOHON</th>
                                                <th>AGENSI</th>
                                                <th>JUMLAH PERMOHONAN DATA</th>
                                                <th>TAHUN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permohonan_kategori as $mohon)
                                                @if(isset($mohon->users))
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $mohon->username }}</td>
                                                        <td>{{ $mohon->name }}</td>
                                                        <td>{{ $mohon->total }}</td>
                                                        <td>{{ Carbon\Carbon::parse($mohon->date)->format('Y') }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
            $("#laporan_perincian").DataTable({
                "dom": 'Bfrtip',
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
            $("#laporan_kategori").DataTable({
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
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

    <script>
        $(document).ready(function() {
            $("#laporan_statistik").DataTable({
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
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
            $("#laporan_lulus").DataTable({
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
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
            $("#laporan_seluruh").DataTable({
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN BILANGAN KESELURUHAN PERMOHONAN DATA'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN BILANGAN KESELURUHAN PERMOHONAN DATA'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN BILANGAN KESELURUHAN PERMOHONAN DATA'
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": true,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
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


        $(document).on("click", ".btnDelete", function() {
            var user_id = $(this).data('permohonanid');
            var permohonan_id = $(this).data('permohonanid');
            var r = confirm("Adakah anda pasti untuk padam permohonan ini?");
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
    </script>



@stop
