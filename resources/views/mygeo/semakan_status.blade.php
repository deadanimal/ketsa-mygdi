@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>
        .badge {
            color: rgb(44, 44, 44)
        }

        .badge-secondary{
            background: lightgray
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
                            <h6 class="h2 text-dark d-inline-block mb-0">Semakan Status</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Semakan Status
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
        <br>
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
                                        <h3 class="mb-0">Senarai Semakan Status Permohonan</h3>
                                    </div>

                                    <div class="col-4 text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="permohonan_table" class="tb table-bordered table-striped" style="width:100%;">
                                    <colgroup>
                                        <col width="50px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK PERMOHONAN</th>
                                            <th>STATUS</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
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
                                                <td>
                                                    @if (!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 1 && $permohonan->status == '3' && $permohonan->berjayaMuatTurunStatus == 0)
                                                        <span class="badge badge-pill badge-success">Data
                                                            Tersedia</span>
                                                    @elseif (!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 0 && $permohonan->status == '3' && $permohonan->berjayaMuatTurunStatus == 0)
                                                        <span class="badge badge-pill badge-warning ">Tamat
                                                            Tempoh</span>
                                                    @elseif ($permohonan->status == '1' || ($permohonan->status == '3' && $permohonan->berjayaMuatTurunStatus == 0))
                                                        <span class="badge badge-pill badge-warning">Dalam
                                                            Proses</span>
                                                    @elseif($permohonan->status == '2')
                                                        <span class="badge badge-pill badge-danger">Ditolak</span>
                                                    @elseif($permohonan->status == '3' && $permohonan->berjayaMuatTurunStatus == 1)
                                                        <span class="badge badge-pill badge-success">Selesai</span>
                                                    @elseif($permohonan->status == '0' && $permohonan->dihantar == 1)
                                                        <span class="badge badge-pill badge-info">Baru</span>
<<<<<<< HEAD
                                                    @elseif($permohonan->status == '0')
=======
                                                        @elseif($permohonan->status == '0')
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                                        <span class="badge badge-pill badge-secondary">Draf</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/lihat_permohonan/' . $permohonan->id) }}"
                                                        class="btn btn-sm btn-success text-center"
                                                        @if ($permohonan->status != 2) disabled @endif><i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-permohonanid="{{ $permohonan->id }}"
                                                        class="btnDelete btn btn-sm btn-danger mr-2"
                                                        @if ($permohonan->status != 2) disabled @endif><i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $("#permohonan_table").DataTable({
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
