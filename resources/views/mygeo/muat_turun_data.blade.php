@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <style>

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Muat Turun Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Muat Turun Data
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
                                        <h3 class="mb-0">Senarai Muat Turun Data</h3>
                                    </div>

                                    <div class="col-4 text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <colgroup>
                                        <col width="50px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK PERMOHONAN</th>
                                            <th>STATUS</th>
                                            <th>TARIKH</th>
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
                                                } elseif ($currentDate <= $tempohUrlStart) {
                                                    $inTempohUrl = 2;
                                                } else {
                                                    $inTempohUrl = 0;
                                                }
                                            }
                                            $res = json_decode($permohonan->proses_datas->pautan_data);
                                            ?>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>
                                                    @if (!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 1)
                                                        <span class="badge badge-pill badge-success">Data Tersedia</span>
                                                    @elseif(!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 0)
                                                        <span class="badge badge-pill badge-info">Tamat Tempoh</span>
                                                    @elseif(!empty($permohonan->proses_datas->pautan_data) && $inTempohUrl == 2)
                                                        <span class="badge badge-pill badge-info">Belum Mula</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Dalam Proses</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ Carbon\Carbon::parse($permohonan->date)->format('d/m/Y') }}</td> --}}
                                                <td>{{ $permohonan->proses_datas->tempoh_url }}</td>
                                                <td>
                                                    @if (is_array($res) && !empty($res))
                                                        {{-- {{ dd($res) }} --}}
                                                        @foreach ($res as $key => $url)
                                                            <a
                                                                @if (!empty($url) && $inTempohUrl == 1) data-url='{{ $url }}' data-urlid='{{ $key }}' data-pemohonid='{{ $permohonan->id }}' data-acceptance='{{ $permohonan->acceptance }}' class="text-success download" disabled href="{{ $url }}" @endif>
                                                                <span class="fas fa-download mr-2">
                                                                    {{ $url }}
                                                                </span>
                                                            </a><br><br>
                                                        @endforeach
                                                    @endif
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
            $("#table_metadatas").DataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-0 text-center'><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'i><'col-sm-7'p>>",
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

        $('.download').on('click', function(event) {
            event.preventDefault();
            const url = $(this).data('url');
            const urlid = $(this).data('urlid');
            var pemohonid = $(this).data('pemohonid');
            var acceptance = $(this).data('acceptance');

            if (acceptance == '1') {
                window.open(url, '_blank');
                window.location.reload();
            } else {

                swal({
                    title: "Akuan Penerimaan Data",
                    type: "warning",
                    input: "checkbox",
                    inputPlaceholder: " Sila klik kotak 'checkbox' untuk mengesah akuan penerimaan data",
                    buttonsStyling: false,
                    allowOutsideClick: false,
                    confirmButtonClass: "btn btn-warning",
                    confirmButtonText: 'Seterusnya&nbsp;<i class="fa fa-arrow-right"></i>',
                    footer: '<a href>Baca Akuan Penerimaan Data</a>',
                    inputValidator: (result) => {
                        return !result && "Anda perlu sahkan akuan penerimaan data ini!";
                    },
                }).then(function(result) {
                    //                window.location.href = url;
                    window.location.href = "{{ url('/akuan_penerimaan') }}" + "/" + pemohonid + "/" +
                        urlid;
                    //                window.open(url, '_blank');
                });
            }
        });
    </script>
@stop
