@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>
        .badge {
            color: rgb(44, 44, 44)
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
                            <h6 class="h2 text-dark d-inline-block mb-0">Status Permohonan</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item active">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Status Permohonan
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
                                        <h3 class="mb-0">Senarai Status Permohonan</h3>
                                    </div>

                                    <div class="col-4 text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_status_mohon" class="tb table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PERMOHONAN</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>KATEGORI</th>
                                            <th>STATUS</th>
                                            <th>MUAT TURUN</th>
                                            <th>PENILAIAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            @if ($permohonan->users)
                                                <?php
                                                $inTempohUrl = 0;
                                                $currentDate = date('d-m-Y');
                                                $explodedTempohUrl = explode(' - ', $permohonan->proses_datas->tempoh_url);
                                                $tempohUrlStart = isset($explodedTempohUrl[0]) ? $explodedTempohUrl[0] : '';
                                                $tempohUrlEnd = isset($explodedTempohUrl[1]) ? $explodedTempohUrl[1] : '';
                                                if ($tempohUrlStart != '' && $tempohUrlEnd != '') {
                                                    if ($currentDate >= $tempohUrlStart && $currentDate <= $tempohUrlEnd) {
                                                        $inTempohUrl = 1;
                                                    } else {
                                                        $inTempohUrl = 0;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $permohonan->name }}</td>
                                                    <td>{{ $permohonan->users->name }}</td>
                                                    <td>{{ $permohonan->users->kategori }}</td>
                                                    <td>
                                                        @if (!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 1 && $permohonan->status == '3')
                                                            <span class="badge badge-pill badge-success">Data
                                                                Tersedia</span>
                                                        @elseif(!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 0 && $permohonan->status == '3')
                                                            <span class="badge badge-pill badge-warning ">Tamat Tempoh</span>
                                                            <a data-toggle="modal" data-target="#modal-kemaskini-tempoh"
                                                                data-mohon-id="{{ $permohonan->id }}">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-primary ml-1"><i
                                                                        class="fas fa-edit"></i></button>
                                                            @elseif ($permohonan->status == '1' || ($permohonan->status == '3' && $permohonan->berjayaMuatTurunStatus == 0))
                                                                <span class="badge badge-pill badge-warning">Dalam
                                                                    Proses</span>
                                                            @elseif($permohonan->status == '2')
                                                                <span class="badge badge-pill badge-danger">Ditolak</span>
                                                            @elseif($permohonan->status == '3' && $permohonan->berjayaMuatTurunStatus == 1)
                                                                <span class="badge badge-pill badge-success">Selesai</span>
                                                            @elseif($permohonan->status == '0')
                                                                <span class="badge badge-pill badge-info">Baru</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->acceptance == '1' && $permohonan->berjayaMuatTurunStatus == '1')
                                                            <span class="badge badge-pill badge-success">Selesai</span>
                                                        @elseif($permohonan->status == '2')
                                                            <span class="badge badge-pill badge-danger">Ditolak</span>
                                                        @else
                                                            <span class="badge badge-pill badge-info">Baru</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($permohonan->penilaian == '1')
                                                            <span class="badge badge-pill badge-success">Selesai</span>
                                                        @else
                                                            <span class="badge badge-pill badge-info">Baru</span>
                                                        @endif
                                                    </td>
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
        </section>
        <!-- Modal Tambah Permohonan -->
        <div class="modal fade" id="modal-kemaskini-tempoh">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemaskini Tempoh Muat Turun</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('kemaskini_tempoh_url') }}">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mr-2">Tempoh Muat Turun </label>
                                    <input type="text" class="form-control form-control-sm float-right tempohMuatTurun"
                                        name="tempoh">
                                        <input type="hidden" name="permohonan_id">
                                </div>
                                <br>
                                <button class="btn btn-primary float-right" type="submit">
                                    <span class="text-white">Simpan</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#table_status_mohon").DataTable({
                "dom": "<'row'<'col-sm-6'i><'col-sm-0 text-center'><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
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
            $('.tempohMuatTurun').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY',
                },
                // opens: 'left',
                // drops: 'up',
                // batchMode: 'week-range',
                // showShortcuts: false
            });
            $('#modal-kemaskini-tempoh').on('show.bs.modal', function(e) {
                var mohon_id = $(e.relatedTarget).data('mohon-id');
                $(e.currentTarget).find('input[name="permohonan_id"]').val(mohon_id);
            });

        });
    </script>
@stop
