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
                                        @foreach ($permohonan_list as $permohonan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>{{ $permohonan->users->name }}</td>
                                                <td>{{ $permohonan->users->kategori }}</td>
                                                <td>{{ $permohonan->assign_admin }}</td>
                                                <td>
                                                    <a href="/lihat_permohonan/{{ $permohonan->id }}"
                                                        class="btn btn-sm btn-info text-center"><i class="fas fa-eye"></i>
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
                            <h4 class="modal-title text-white">Proses Data - {{ $permohonan->id }}</h4>
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
                                            @if ($data->permohonan_id == $permohonan->id)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->lapisan_data }}</td>
                                                    <td>{{ $data->subkategori }}</td>
                                                    <td>{{ $data->kategori }}</td>
                                                    <td>{{ $data->kawasan_data }}</td>
                                                    <td>
                                                        <input class="form-control form-control-sm amount_{{$permohonan->id}}_{{$data->id}}"
                                                            placeholder="Saiz Data" id="size_{{ $data->id }}" onchange="kiraharga()" name="saiz_data[]" type="number" step="0.01">
                                                        <label class="ml-2">× RM {{ $data->harga_data }} </label>
                                                        <input type="hidden" name="senarai_kawasan_id[]" value="{{$data->id}}">
                                                        <input type="hidden" class="price_{{$permohonan->id}}"
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
                                            <input class="form-control form-control-sm" placeholder="0.00"
                                                style="width: 90px;" type="text" name="total_harga" id="jumlah_harga_dokumen" step="0.01" value="{{$permohonan->proses_datas->total_harga}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label mr-2">Pautan Data </label>
                                            <input class="form-control form-control-sm mb-2" name="pautan_data" placeholder="Masukkan Pautan Data" type="text" value="{{$permohonan->proses_datas->pautan_data}}">

                                            <label class="form-control-label mr-2">Tempoh Muat Turun </label>
                                            <input class="form-control form-control-sm" name="tempoh" placeholder="" type="date" disabled>
                                        </div>
                                        <div class="form-inline">
                                            <label class="form-control-label mr-2">Surat Balasan Permohonan </label>
                                            <a href="/surat_balasan/{{$permohonan->id}}" class="btn btn-sm btn-danger mb-2">
                                                Kemaskini
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 pt-9 text-right">
                                        <input type="hidden" name="permohonan_id" value="{{$permohonan->id}}">
                                        <input type="hidden" name="id" value="{{$permohonan->id}}">
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

        function kiraharga() {
            console.log('Kira harga');
            var pembelian = {!! $skdatas !!}
            var jumlahHarga = 0;
            pembelian.forEach(element => {
                var harga = parseFloat(element.harga_data);
                var size = document.getElementById("size_"+element.id).value ;
                var jumlah = harga * size;
                // var hargaDoc = document.getElementById("harga_"+element.id);
                // hargaDoc.value = jumlah;
                jumlahHarga += jumlah
                console.log('jumlah: ', jumlah);
            });
            jumlahHarga = parseFloat(jumlahHarga).toFixed(2);
            console.log('jumlahHarga: ', jumlahHarga);
            var jumlah_harga = document.getElementById("jumlah_harga_dokumen");
            console.log(jumlah_harga)
            jumlah_harga.value = jumlahHarga;

        }
        @foreach ($permohonan_list as $permohonan)
            @foreach ($skdatas as $data)
                // @if ($data->permohonan_id == $permohonan->id)
                // $('.amount_{{$permohonan->id}}_{{$data->id}}').change(function() {
                // var tot = 0;

                // $('.price_{{$permohonan->id}}_{{$data->id}}').each(function() {
                // var mul = 0;
                // price = +$(this).val();
                // });
                // $('.amount_{{$permohonan->id}}_{{$data->id}}').each(function() {
                // result = +$(this).val();
                // var mul = result * price;
                // tot += mul;
                // });
                // $('#total_{{$permohonan->id}}').val(tot);
                // });
                @endif
            @endforeach
        @endforeach
    </script>
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
@stop
