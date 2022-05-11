@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header ">
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
                                <table id="table_proses_data" class="tb table-bordered table-striped" style="width:100%;">
                                    <colgroup>
                                        <col width="40px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PERMOHONAN</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>KATEGORI</th>
                                            {{-- <th>PENTADBIR DITUGASKAN</th> --}}
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            <?php $count = 1; ?>
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>{{ $permohonan->users->name }}</td>
                                                <td>{{ $permohonan->users->kategori }}</td>
                                                {{-- <td>{{ $permohonan->assign_admin }}</td> --}}
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
                                            <?php $count++; ?>
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
                            <h4 class="modal-title text-white">Proses Data {{ $permohonan->id }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('simpan_proses_data') }}" method="POST"
                                id="formProsesData-{{ $permohonan->id }}">
                                @csrf
                                <h6 class="heading text-dark">Senarai Data Yang Dipohon</h6>
                                <i class="text-warning float-right" style="font-size: 16px">**Sila kemaskini surat balasan
                                    sebelum isi maklumat proses data</i>
                                <table id="table_proses_data2" class="tb table-custom table-bordered table-striped"
                                    style="width:100%;">
                                    <colgroup>
                                        <col width="40px;">
                                    </colgroup>
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
                                        <?php $count = 1; ?>
                                        @foreach ($skdatas as $data)
                                            @if ($data->permohonan_id == $permohonan->id)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $data->lapisan_data }}</td>
                                                    <td>{{ $data->subkategori }}</td>
                                                    <td>{{ $data->kategori }}</td>
                                                    <td>{{ $data->kawasan_data }}</td>
                                                    <td>
                                                        <input class="form-control form-control-sm kiraHarga"
                                                            placeholder="Saiz Data" name="saiz_data_{{ $data->id }}"
                                                            type="number" step="0.01" value="{{ $data->saiz_data }}"
                                                            data-permohonanid="{{ $permohonan->id }}"
                                                            data-hargadata="{{ $data->harga_data }}">
                                                        <label class="ml-2">× RM {{ $data->harga_data }}
                                                        </label>
                                                    </td>
                                                </tr>
                                                <?php $count++; ?>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row mt-2">
                                    <div class="col-xl-12">
                                        <div class="form-inline float-right">
                                            <label class="form-control-label mr-2">Jumlah Harga (RM)</label>
                                            <input class="form-control form-control-sm" placeholder="0.00"
                                                style="width: 90px;" type="text" name="total_harga"
                                                id="jumlah_harga_dokumen_{{ $permohonan->id }}" step="0.01"
                                                value="{{ $permohonan->proses_datas->total_harga ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label mr-2">Pautan Data </label>
                                            <?php
                                            if ($permohonan->proses_datas != null) {
                                                $res = json_decode($permohonan->proses_datas->pautan_data);
                                                $firstURL = $res ? $res['0'] : '';
                                                $firstline = true;
                                                $i = 1;
                                            } 
                                            ?>

                                            <i id="error" class="text-warning float-right" style="font-size: 11px"></i>
                                            <div class="d-flex mb-2">
                                                <input class="form-control form-control-sm mr-2" name="pautan_data[0]"
                                                    placeholder="Masukkan Pautan Data" type="text" id="pautan_datas"
                                                    value="{{ $firstURL }}">

                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                    onclick="addPautanData()"><i class='fas fa-plus pb-0 mb-0'></i></button>
                                            </div>

                                            <div class="form-group dynamicAddPautan" id="dynamicAddPautan">
                                                @if (is_array($res) && !empty($res))
                                                    @foreach ($res as $url)
                                                        @if (!$firstline)
                                                            <span class="d-flex mb-2">
                                                                <input type="text" name="pautan_data[{{ $i }}]"
                                                                    value="{{ $url }}"
                                                                    class="form-control form-control-sm mr-2"><button
                                                                    type="button"
                                                                    class="btn btn-outline-warning btn-sm remove-input-field"><i
                                                                        class="fas fa-trash"></i>
                                                                </button>
                                                            </span>
                                                        @endif
                                                        <?php $i++;
                                                        $firstline = false; ?>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <i id="error_two" class="text-warning float-right" style="font-size: 11px"></i>
                                            <label class="form-control-label mr-2">Tempoh Muat Turun </label>
                                            <input type="text"
                                                class="form-control form-control-sm float-right tempohMuatTurun"
                                                name="tempoh" autocomplete="off" id="tempohval">
                                        </div>
                                        <div class="row">
                                            <div class="col-6"></div>
                                        </div>
                                        <label class="form-control-label mt-4 mr-2">Surat Balasan Permohonan </label>
                                        <a href="{{ url('surat_balasan/' . $permohonan->id) }}"
                                            class="btn btn-sm btn-danger mb-2">
                                            Kemaskini
                                        </a>
                                    </div>
                                </div>
                                <div class="row px-3 text-right">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">

                                    <input type="hidden" name="id" value="{{ $permohonan->id }}">
                                    <button class="btn btn-success ml-auto btnValid{{ $permohonan->id }}" type="button">
                                        Hantar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var i = {{ $i }};

                function addPautanData() {
                    d = document.getElementById("pautan_datas").value;
                    $(".dynamicAddPautan").append(
                        `<span class="d-flex mb-2"><input type="text" name="pautan_data[` + i +
                        `]" class="form-control form-control-sm mr-2"><button type="button" class="btn btn-outline-warning btn-sm remove-input-field"><i class="fas fa-trash"></i>
                    </button></span>`
                    );
                    ++i;

                }
                $(document).on('click', '.remove-input-field', function() {
                    --i;
                    $(this).parents('span').remove();
                });
            </script>

            <script>
                $(document).ready(function() {
                    $(document).on('click', '.btnValid' + {{ $permohonan->id }}, function() {
                        var pautan = $('#pautan_datas').val();
                        var tempoh = $('#tempohval').val();
                        console.log({{ $permohonan->id }}, tempoh.length);
                        var msg = "";
                        var msg2 = "";


                        if (pautan.length == 0) {
                            msg = msg + "Sila isi pautan data\r\n\r\n"
                        }
                        if (tempoh.length <= 10) {
                            msg2 = msg2 + "Sila pilih tarikh\r\n\r\n"
                        }
                        if (pautan.length == 0 || tempoh.length <= 10) {
                            $('i#error').text(msg);
                            $('i#error_two').text(msg2);
                        } else {
                            $('i#error').text('');
                            $('i#error_two').text('');
                            $('#formProsesData-' + {{ $permohonan->id }}).submit();
                        }

                    });
                });
            </script>
        @endforeach

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
                    console.log(kiraHarga.length, jumlahHarga);
                    $("#jumlah_harga_dokumen_" + permohonanid).val(jumlahHarga);
                });

                $('.tempohMuatTurun').daterangepicker({
                    locale: {
                        format: 'DD-MM-YYYY',
                    },
                    opens: 'left',
                    drops: 'up',
                    singleDatePicker: true,
                    autoApply: true,
                });
                $('.tempohMuatTurun').on('hide.daterangepicker', function(ev, picker) {
                    var start = picker.startDate;
                    var end = picker.endDate.add(14, 'days');
                    $(this).val(start.format('DD-MM-YYYY') + ' - ' + end.format(
                        'DD-MM-YYYY'));
                    picker.endDate.subtract(14, 'days');
                });

                $("#table_proses_data").DataTable({
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
        </script>
    @stop
