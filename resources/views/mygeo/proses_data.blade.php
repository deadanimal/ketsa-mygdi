@extends('layouts.app_mygeo_ketsa')

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
                            <h6 class="h2 text-dark d-inline-block mb-0">Proses Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Proses Data
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
                                        <h3 class="mb-0">Senarai Proses Data</h3>
                                    </div>

                                    <div class="col-4 text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_proses_data" class="table table-bordered table-striped"
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PERMOHONAN</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>KATEGORI</th>
                                            <th>PENTADBIR DITUGASKAN</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>{{ $permohonan->users->name }}</td>
                                                <td>{{ $permohonan->users->kategori }}</td>
                                                <td>{{ $permohonan->assign_admin }}</td>
                                                <td>
                                                    <a href="{{ url('/lihat_permohonan/' . $permohonan->id) }}"
                                                        class="btn btn-sm btn-info text-center"><i
                                                            class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-permohonanid="{{ $permohonan->id }}"
                                                        class="btnDelete btn btn-sm btn-danger mr-2"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                    <a class="btn btn-sm btn-default" data-toggle="modal"
                                                        data-target="#modal-proses-data-{{ $permohonan->id }}"><span
                                                            class="text-white">Proses</span>
                                                    </a>
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

        <!-- Modal Proses Data -->
        @foreach ($permohonan_list as $permohonan)
            <div class="modal fade" id="modal-proses-data-{{ $permohonan->id }}">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="modal-title text-white">Proses Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('simpan_proses_data') }}" method="POST">
                                @csrf
                                <h6 class="heading text-dark">Senarai Data Yang Dipohon</h6>
                                <i class="text-warning float-right" style="font-size: 13px">**Sila kemaskini surat balasan sebelum isi maklumat proses data</i>
                                <table id="table_proses_data2" class="table table-bordered table-striped"
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>LAPISAN DATA</th>
                                            <th>SUB-KATEGORI</th>
                                            <th>KATEGORI</th>
                                            <th>KAWASAN DATA</th>
                                            <th>SAIZ(MB) × HARGA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skdatas as $data)
                                            @if ($data->permohonan_id == $permohonan->id)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->lapisan_data }}</td>
                                                    <td>{{ $data->subkategori }}</td>
                                                    <td>{{ $data->kategori }}</td>
                                                    <td>{{ $data->kawasan_data }}</td>
                                                    <td>
                                                        <input class="form-control form-control-sm kiraHarga"
                                                            placeholder="Saiz Data" id="size_{{ $data->id }}"
                                                            type="number" step="0.01" name="saiz_data_{{ $data->id }}"
                                                            value="{{ $data->saiz_data }}"
                                                            data-permohonanid="{{ $permohonan->id }}"
                                                            data-hargadata="{{ $data->harga_data }}">
                                                        <label class="ml-2">× RM {{ $data->harga_data }}
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-inline float-right">
                                            <label class="form-control-label mr-2">Jumlah Harga (RM)</label>
                                            <input class="form-control form-control-sm" placeholder="0.00"
                                                style="width: 90px;" type="text" name="total_harga"
                                                id="jumlah_harga_dokumen_{{ $permohonan->id }}" step="0.01"
                                                value="{{ $permohonan->proses_datas->total_harga }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label mr-2">Pautan Data </label>
                                            <input class="form-control form-control-sm mb-2" name="pautan_data"
                                                placeholder="Masukkan Pautan Data" type="text"
                                                value="{{ $permohonan->proses_datas->pautan_data }}">

                                            <label class="form-control-label mr-2">Tempoh Muat Turun </label>
                                            <input type="text"
                                                class="form-control form-control-sm float-right tempohMuatTurun"
                                                name="tempoh">
                                        </div>
                                        <label class="form-control-label mt-4 mr-2">Surat Balasan Permohonan </label>
                                        <a href="{{ url('surat_balasan/' . $permohonan->id) }}"
                                            class="btn btn-sm btn-danger mb-2">
                                            Kemaskini
                                        </a>
                                    </div>
                                    <div class="col-xl-6 pt-9 text-right">
                                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                        <input type="hidden" name="id" value="{{ $permohonan->id }}">
                                        <button class="btn btn-success ml-auto" type="submit">
                                            Hantar
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

    </div>

    <script>
        $(document).ready(function() {
            $(document).on('change', '.kiraHarga', function() {
                var kiraHarga = $('.kiraHarga');
                var jumlahHarga = 0;
                var permohonanid = $(this).data('permohonanid');
                jQuery.each(kiraHarga, function(key, val) {
                    var size = $(val).val();
                    var hargadata = $(val).data('hargadata');
                    jumlahHarga += (size * hargadata);
                });
                jumlahHarga = parseFloat(jumlahHarga).toFixed(2);
                $("#jumlah_harga_dokumen_" + permohonanid).val(jumlahHarga);
            });

            $('.tempohMuatTurun').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
            });

            $("#table_proses_data").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
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
@stop
