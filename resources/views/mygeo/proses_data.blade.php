@extends('layouts.app_mygeo_afiq')

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
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
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
                                        @foreach ($pemohons as $pemohon)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pemohon->name }}</td>
                                                <td>{{ $pemohon->users->name }}</td>
                                                <td>{{ $pemohon->users->kategori }}</td>
                                                <td>{{ $pemohon->assign_admin }}</td>
                                                <td>
                                                    <a href="/lihat_permohonan/{{ $pemohon->id }}"
                                                        class="btn btn-sm btn-info text-center"><i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-permohonanid="{{ $pemohon->id }}"
                                                        class="btnDelete btn btn-sm btn-danger mr-2"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                    <a class="btn btn-sm btn-default" data-toggle="modal"
                                                        data-target="#modal-proses-data-{{ $pemohon->id }}"><span
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
        @foreach ($pemohons as $pemohon)
            <div class="modal fade" id="modal-proses-data-{{ $pemohon->id }}">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="modal-title text-white">Proses Data - {{ $pemohon->id }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/simpan_proses_data" method="POST">
                                @csrf
                                <h6 class="heading text-dark">Senarai Data Yang Dipohon</h6>
                                <table id="table_metadatas2" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>LAPISAN DATA</th>
                                            <th>SUB-KATEGORI</th>
                                            <th>KATEGORI</th>
                                            <th>KAWASAN DATA</th>
                                            <th>SAIZ × HARGA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skdatas as $data)
                                            @if ($data->permohonan_id == $pemohon->id)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->lapisan_data }}</td>
                                                    <td>{{ $data->subkategori }}</td>
                                                    <td>{{ $data->kategori }}</td>
                                                    <td>{{ $data->kawasan_data }}</td>
                                                    <td>
                                                        <input class="form-control form-control-sm amount_{{$pemohon->id}}"
                                                            placeholder="Saiz Data" name="saiz_data_{{$pemohon->id}}" type="number" step="0.01">
                                                        <label class="ml-2">× RM {{ $data->harga_data }}</label>
                                                        <input type="hidden" class="price_{{$pemohon->id}}"
                                                            value="{{ $data->harga_data }}">
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
                                            <input class="form-control form-control-sm" placeholder="RM0.00"
                                                style="width: 90px;" type="text" name="total_harga" id="total_{{$pemohon->id}}" value="{{$pemohon->proses_datas->total_harga}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label mr-2">Pautan Data </label>
                                            <input class="form-control form-control-sm mb-2" name="pautan_data" placeholder="Masukkan Pautan Data" type="text" value="{{$pemohon->proses_datas->pautan_data}}">

                                            <label class="form-control-label mr-2">Tempoh Muat Turun </label>
                                            <input class="form-control form-control-sm" name="tempoh" placeholder="" type="date" disabled>
                                        </div>
                                        <div class="form-inline">
                                            <label class="form-control-label mr-2">Surat Balasan Permohonan </label>
                                            <a href="/surat_balasan/{{$pemohon->id}}" class="btn btn-sm btn-danger mb-2">
                                                Kemaskini
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 pt-9 text-right">
                                        <input type="hidden" name="permohonan_id" value="{{$pemohon->id}}">
                                        <input type="hidden" name="id" value="{{$pemohon->id}}">
                                        <button class="btn btn-success ml-auto" type="submit">
                                            Hantar
                                        </button>
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
            $("#table_metadatas").DataTable({
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
        @foreach ($pemohons as $pemohon)
            $('.amount_{{$pemohon->id}}').change(function() {
            var result = 0;
            var mul = 0;

            $('.price_{{$pemohon->id}}').each(function() {
            price = +$(this).val();
            });
            $('.amount_{{$pemohon->id}}').each(function() {
            result = +$(this).val();
            mul += result * price;
            });
            $('#total_{{$pemohon->id}}').val(mul);
            });

        @endforeach
    </script>
@stop
