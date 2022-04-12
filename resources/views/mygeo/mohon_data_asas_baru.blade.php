@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <style>
        .hide {
            display: none;
        }

        .accordionHeader:first-child {
            color: black;
            cursor: pointer;
            border-radius: 10px;
            padding: 15px 13px;
        }

        .accordionHeader {
            background-color: #b3d1ff;
            /* border-radius: 12px; */
        }

    </style>
    <style>
        h1 {
            color: green;
        }


        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
            /* font-weight: bold; */
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkBoxes {
            display: none;
            border-radius: 3px;
            border: 1px #e4e4e4 solid;
            padding: 5px 0px
        }

        #checkBoxes label {
            display: block;
            font-weight: 100;
            padding: 0px 15px;
            margin-bottom: 0px;
        }

        #checkBoxes label:hover {
            background-color: #abe4ff;
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
                            <h6 class="h2 text-dark d-inline-block mb-0">
                                @if (Auth::user()->hasRole(['Pemohon Data']))
                                    Mohon Data
                                @elseif (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin', 'Pentadbir Aplikasi']))
                                    Permohonan Baru
                                @endif

                            </h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"></i></a>
                                    </li>
                                    @if (Auth::user()->hasRole(['Pemohon Data']))
                                        <li aria-current="page" class="breadcrumb-item active">
                                            Mohon Data
                                        </li>
                                    @endif
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Permohonan Baru
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
                        <div id="accordion">

                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">Permohonan Baru</h3>
                                        </div>

                                        <div class="col-4 text-right">
                                            <a href="{{ url()->previous() }}">
                                                <button type="button"
                                                    class="btn btn-sm btn-default float-right">Kembali</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (Auth::user()->hasRole(['Pentadbir Data']))
                                        <div class="row">
                                            <div class="col-12 pl-lg-5">
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="nama_penuh">
                                                            Nama Penuh
                                                        </label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-sm ml-3" name="nama_penuh"
                                                            type="text" value="{{ $permohonan->users->name }}" disabled />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="nric">
                                                            No Kad Pengenalan
                                                        </label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-sm ml-3" name="nric"
                                                            type="text" value="{{ $permohonan->users->nric }}" disabled />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="agensi_organisasi">
                                                            Institusi
                                                        </label>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        $var = '';
                                                        if ($permohonan->users->hasRole(['Pemohon Data'])) {
                                                            $id = $permohonan->users->agensi_organisasi;
                                                            $var = $permohonan->users->agensiOrganisasi->name;
                                                        } else {
                                                            $var = isset($permohonan->users->agensiOrganisasi) ? $permohonan->users->agensiOrganisasi->name : '';
                                                        }
                                                        ?>
                                                        <input class="form-control form-control-sm ml-3" name="institusi"
                                                            type="text" value="{{ $var }}" disabled />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="email">
                                                            Emel
                                                        </label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-sm ml-3" id="email"
                                                            type="text" value="{{ $permohonan->users->email }}"
                                                            disabled />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="tel_pejabat">
                                                            Telefon Pejabat
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control form-control-sm ml-3" name="tel_pejabat"
                                                            type="text" value="{{ $permohonan->users->phone_pejabat }}"
                                                            disabled />
                                                    </div>
                                                    <div class="col-2" style="padding-right: none !important;">
                                                        <label class="form-control-label mr-4" for="tel_bimbit" style="padding-right: none !important;margin-right:0 !important;">
                                                            Telefon Bimbit
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control form-control-sm ml-3" name="tel_bimbit"
                                                            type="text" value="{{ $permohonan->users->phone_bimbit }}"
                                                            disabled />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="peranan">
                                                            Peranan
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <?php
                                                if (!empty($permohonan->users->getRoleNames())) {
                                                    $count = 1;
                                                    foreach ($permohonan->users->getRoleNames() as $role) {
                                                        ?><input class="form-control form-control-sm ml-3"
                                                            name="peranan" type="text" value="<?php echo $role; ?> "
                                                            disabled />
                                                        <?php if ($count != count($permohonan->users->getRoleNames())) { ?>,<?php  }$count++; } } ?>

                                                    </div>
                                                    <div class="col-2">
                                                        <label class="form-control-label mr-4" for="phone_bimbit">
                                                            Kategori
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input class="form-control form-control-sm ml-3" type="text"
                                                            value="{{ $permohonan->users->kategori }}" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">
                                    @endif


                                    <form action="{{ url('kemaskini_permohonan') }}" method="POST"
                                        id="formHantarPermohonanPentadbir">
                                        @csrf
                                        <!--========== collapese1 =============================================-->
                                        <div class="acard div_c1 mb-3" id="div_c1">
                                            <div class="card-header accordionHeader" data-toggle="collapse"
                                                href="#collapse1">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h3 class="heading mb-0">Maklumat Permohonan</h3>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse in show"
                                                data-parent="#div_c1">
                                                <div class="card-body">
                                                    <div class="opacity-8">
                                                        <div class="row">
                                                            <div class="col-10 pl-lg-4">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-control-label">Tajuk
                                                                        Permohonan</label>
                                                                    <input type="text" class="form-control" name="name" id="tajukPermohonan"
                                                                        value="{{ $permohonan->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="date" class="form-control-label">Tarikh
                                                                        Permohonan</label>
                                                                    <input type="text" class="form-control" name="date"
                                                                        value="{{ Carbon\Carbon::parse($permohonan->date)->format('d/m/Y') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tujuan" class="form-control-label">Tujuan
                                                                        Permohonan</label>
                                                                    <textarea name="tujuan" cols="30" class="form-control"
                                                                        rows="10">{{ $permohonan->tujuan }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--========== collapese2 =============================================-->
                                        <div class="acard div_c2 mb-3" id="div_c2">
                                            <div class="card-header accordionHeader">
                                                <div class="row align-items-center">
                                                    <div class="col-10" data-toggle="collapse" href="#collapse2">
                                                        <h3 class="heading mb-0">Senarai Data dan Kawasan Data</h3>
                                                    </div>
                                                    <div class="col-2 text-right">
                                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                                            <a id="collapse2" class="btn btn-sm btn-default collapse"
                                                                data-toggle="modal"
                                                                data-target="#modal-senarai-kawasan-data"><span
                                                                    class="text-white">Tambah</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse in" data-parent="#div_c2">
                                                <div class="card-body">
                                                    <div class="opacity-8" style="overflow-x:auto;">
                                                        <table id="senarai_data_table"
                                                            class="tb table-bordered table-striped"
                                                            style="width: 100%; overflow-x:auto;">
                                                            <colgroup>
                                                                <col width="150px;">
                                                                <col width="150px;">
                                                                <col>
                                                                <col width="150px;">
                                                                <col>
                                                                <col>
                                                            </colgroup>
                                                            <thead>
                                                                <tr>
                                                                    <th>BIL</th>
                                                                    <th>LAPISAN DATA</th>
                                                                    <th>SUB-KATEGORI</th>
                                                                    <th>KATEGORI</th>
                                                                    <th>KAWASAN DATA</th>
                                                                    <th>JENIS DATA</th>
                                                                    <th>KELAS</th>
                                                                    @if (Auth::user()->hasRole(['Pemohon Data']))
                                                                        <th>TINDAKAN</th>
                                                                    @endif
                                                                </tr>

                                                            </thead>
                                                            <tbody>
                                                                @foreach ($skdatas as $sk)
                                                                    <tr class="">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $sk->lapisan_data }}</td>
                                                                        <td>{{ $sk->subkategori }}</td>
                                                                        <td>{{ $sk->kategori }}</td>
                                                                        <td>{{ $sk->kawasan_data }}</td>
                                                                        <td>
                                                                            <?php
                                                                            if(strpos($sk->jenis_data,'fizikal') !== false && strpos($sk->jenis_data,'map_servis') !== false){
                                                                                echo "Fizikal dan Map Servis";
                                                                            }elseif($sk->jenis_data == "fizikal"){
                                                                                echo "Fizikal";
                                                                            }elseif($sk->jenis_data == "map_servis"){
                                                                                echo "Map Servis";
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>{{ $sk->kelas }} </td>
                                                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                                                            <td>
                                                                                <a data-toggle="modal"
                                                                                    data-target="#modal-skd-{{ $sk->id }}">
                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-success"><i
                                                                                            class="fas fa-edit"></i></button>
                                                                                </a>
                                                                                <button type="button"
                                                                                    data-skid="{{ $sk->id }}"
                                                                                    class="btnDeleteSK btn btn-sm btn-danger mx-2"><i
                                                                                        class="fas fa-trash"></i>
                                                                                </button>
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--========== collapese3 =============================================-->
                                        <div class="acard div_c3 mb-3" id="div_c3">
                                            <div class="card-header accordionHeader">
                                                <div class="row align-items-center">
                                                    <div class="col-10" data-toggle="collapse" href="#collapse3">
                                                        <h3 class="heading mb-0">Dokumen Berkaitan</h3>
                                                    </div>
                                                    <div class="col-2 text-right">
                                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                                            <a id="collapse3" class="btn btn-sm btn-default collapse"
                                                                data-toggle="modal" data-target="#modal-pilih-upload"><span
                                                                    class="text-white">Tambah</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapse3" class="panel-collapse collapse in" data-parent="#div_c3">
                                                <div class="card-body" style="padding-top:1rem !important;">
                                                    <div class="opacity-8">
                                                        <span class="text-warning" style="font-size: 14px;">**Semua
                                                            dokumen yang dimuat naik
                                                            hendaklah dalam format PDF
                                                            dan saiz setiap fail tidak boleh melebihi 2MB.</span>
                                                        <table id="dokumen_table" class="tb table-bordered table-striped"
                                                            style="width:100%;">
                                                            <colgroup>
                                                                <col width="50px;">
                                                            </colgroup>
                                                            <thead>
                                                                <tr>
                                                                    <th>BIL</th>
                                                                    <th>TAJUK DOKUMEN</th>
                                                                    <th>NAMA FAIL</th>
                                                                    <th>TINDAKAN</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $count = 1; ?>
                                                                @foreach ($dokumens as $dokumen)
                                                                    <tr>
                                                                        <td>{{ $count }}</td>
                                                                        <td>
                                                                            @if ($dokumen->tajuk_dokumen == 'Surat Permohonan Rasmi')

                                                                                {{ $dokumen->tajuk_dokumen }}
                                                                                @if ($dokumen->no_rujukan)
                                                                                    <br>
                                                                                    ({{ $dokumen->no_rujukan }} |
                                                                                    {{ Carbon\Carbon::parse($dokumen->date_surat)->format('d/m/Y') }})
                                                                                @endif
                                                                            @else

                                                                                {{ $dokumen->tajuk_dokumen }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ isset($dokumen->nama_fail) ? $dokumen->nama_fail : '-' }}
                                                                        </td>
                                                                        <td>
                                                                            @if (Auth::user()->hasRole(['Pemohon Data']))
                                                                                @if ($dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Pelajar' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Dekan/Pustakawan')
                                                                                    <a data-toggle="modal"
                                                                                        data-target="#modal-pilih-upload-{{ $dokumen->id }}">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-primary mr-1"><i
                                                                                                class="fa fa-upload"></i></button>
                                                                                    </a>
                                                                                @else
                                                                                    <a data-toggle="modal"
                                                                                        data-target="#modal-kemaskini-dokumen-{{ $dokumen->id }}">
                                                                                        <button type="button"
                                                                                            class="btn btn-sm btn-primary mr-1"><i
                                                                                                class="fa fa-upload"></i></button>
                                                                                    </a>
                                                                                @endif
                                                                            @endif

                                                                            @if (!$dokumen->file_path == null)
                                                                                <a href="{{ url('/') . $dokumen->file_path }}"
                                                                                    target="_blank">
                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-success mr-1"><i
                                                                                            class="fa fa-eye"></i></button>
                                                                                </a>
                                                                            @endif
                                                                            <button type="button"
                                                                                data-dokumenid="{{ $dokumen->id }}"
                                                                                class="btnDeleteDokumen btn btn-sm btn-danger"><i
                                                                                    class="fas fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $count++; ?>
                                                                @endforeach
                                                                @if (Auth::user()->hasRole(['Pemohon Data']) && ($permohonan->users->kategori == 'IPTA - Pelajar' || $permohonan->users->kategori == 'IPTS - Pelajar'))
                                                                    <tr>
                                                                        <td>{{ $count }}</td>
                                                                        <td>Borang Akuan Pelajar</td>
                                                                        <td>-</td>
                                                                        <td>
                                                                            <a href="{{ url('akuan_pelajar/' . $permohonan->id) }}"
                                                                                class="btn btn-sm btn-default">Isi
                                                                                Borang</a>
                                                                        </td>

                                                                    </tr>
                                                                @elseif (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin', 'Pentadbir Aplikasi']))
                                                                    @if ($permohonan->users->kategori == 'IPTA - Pelajar' || $permohonan->users->kategori == 'IPTS - Pelajar')
                                                                        <tr>
                                                                            <td>{{ $count }}</td>
                                                                            <td>Borang Akuan Pelajar</td>
                                                                            <td>-</td>
                                                                            <td>
                                                                                <a href="{{ url('/akuan_pelajar/' . $permohonan->id) }}"
                                                                                    class="btn btn-sm btn-default">Papar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-3">

                                        @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin', 'Pentadbir Aplikasi']))
                                            <div class="row">
                                                <div class="col-4">
                                                    <h4 class="heading text-dark mr-2">Status Permohonan</h4>
                                                    <select class="form-control form-control-sm mb-4" name="status"
                                                        onchange="showDiv(this)">
                                                        <option disabled value="0"
                                                            {{ $permohonan->status == '0' ? 'selected' : '' }}>Pilih
                                                        </option>
                                                        <option value="1"
                                                            {{ $permohonan->status == '1' ? 'selected' : '' }}>
                                                            DILULUSKAN</option>
                                                        <option value="2"
                                                            {{ $permohonan->status == '2' ? 'selected' : '' }}>
                                                            DITOLAK</option>
                                                    </select>
                                                    <div id="hidden_div_catatan" @if ($permohonan->status == 0 || $permohonan->status == 1) class="hide" @endif>
                                                        <h4 class="heading text-dark mr-2">Catatan Permohonan</h4>
                                                        <select name="catatan" class="form-control form-control-sm mb-4"
                                                            onchange="checkCatatan(this.value);">
                                                            <option selected disabled>Pilih</option>
                                                            <option value="Maklumat tidak lengkap" @if ($permohonan->catatan == 'Maklumat tidak lengkap') selected @endif>
                                                                Maklumat tidak
                                                                lengkap</option>
                                                            <option value="Data yang dipohon tiada dalam simpanan PGN"
                                                                @if ($permohonan->catatan == 'Data yang dipohon tiada dalam simpanan PGN') selected @endif>Data yang dipohon tiada
                                                                dalam simpanan PGN</option>
                                                            <option value="Maklumat pemohon tidak sahih"
                                                                @if ($permohonan->catatan == 'Maklumat pemohon tidak sahih') selected @endif>Maklumat pemohon tidak
                                                                sahih</option>
                                                            <option value="others" @if ($permohonan->catatan == 'others') selected @endif>Lain-lain
                                                            </option>
                                                        </select>
                                                        <textarea name="catatan_lain" id="catatan"
                                                            class="form-control form-control-sm" @if ($permohonan->catatan == 'others') style="display:block;" @else style="display:none;" @endif
                                                            cols="30" rows="5">{{ $permohonan->catatan_lain }}</textarea>
                                                    </div>
                                                    <div id="hidden_div_pentadbir" @if ($permohonan->status == 0 || $permohonan->status == 2) class="hide" @endif>
                                                        <h4 class="heading text-dark mr-2">Pentadbir Ditugaskan</h4>
                                                        <select class="form-control form-control-sm" name="assign_admin">
                                                            <option selected disabled>Pilih</option>
                                                            @foreach ($pentadbirdata as $pd)
                                                                <option value="{{ $pd->name }}"
                                                                    @if ($pd->name == $permohonan->assign_admin) selected @endif>
                                                                    {{ $pd->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="float-right">
                                            <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">

                                            @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin', 'Pentadbir Aplikasi']) && $permohonan->status != 1)
                                                <button type="button"
                                                    class="btn btn-success mx-2 btnHantarPermohonanPentadbir">
                                                    Hantar
                                                @elseif(Auth::user()->hasRole(['Pemohon Data']))
                                                    @if ($permohonan->dihantar != 1 || $permohonan->status == 2)
                                                        <button type="button"
                                                            class="btn btn-outline-success mx-2 btnSimpanDraf">
                                                            Simpan
                                                    @endif
                                            @endif
                                    </form>
                                    @if (Auth::user()->hasRole(['Pemohon Data']) && ($permohonan->dihantar != 1 || $permohonan->status == 2))
                                        <form action="{{ url('hantar_permohonan') }}" method="POST"
                                            id="formHantarPermohonan">
                                            @csrf

                                            <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                            <button type="button" class="btn btn-info btnHantarPermohonan">Hantar</button>
                                        </form>
                                    @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- Modal Senarai Kawasan Data -->
    <div class="modal fade" id="modal-senarai-kawasan-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-0">
                    <h4 class="text-white">Tambah Senarai Data dan Kawasan Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('simpan_senarai_kawasan') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="kategori">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori"
                                            onchange="selectKategori()">
                                            <option selected disabled>Pilih</option>
                                            @foreach ($kategori_senarai_data as $kategori)
                                                <option value="{{ $kategori->kategori }}">{{ $kategori->kategori }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group" id="dynamicAddRemove">
                                    </div>
                                    <div class="form-group" id="dynamicAddRemove2">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="jenis_data">Jenis Data</label>
                                        <select class="form-control" name="jenis_data">
                                            <option selected disabled>Pilih</option>
                                               <option value="fizikal">Fizikal</option>
                                               <option value="map_servis">Map Servis</option>
                                               <option value="fizikal, map_servis">Fizikal dan Map Servis</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="kawasan_data">Kawasan Data</label>
                                        {{-- <input name="kawasan_data" class="form-control"
                                            placeholder="Masukkan Kawasan Data" /> --}}

                                        <select class="form-control" id="negeri" name="negeri" onchange="selectNegeri()">
                                            <option selected disabled>Negeri</option>
                                            @foreach ($negeris as $neg)
                                                <option value="{{ $neg->kod_negeri }}">{{ $neg->negeri }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group" id="dynamicDaerah">
                                    </div>

                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                    <input type="hidden" name="id" value="{{ $permohonan->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between1">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($dokumens as $dokumen)
        <div class="modal fade" id="modal-kemaskini-dokumen-{{ $dokumen->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemaskini Dokumen Berkaitan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateDokumen') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tajuk_dokumen" class="form-control-label">Tajuk Dokumen</label>
                                <input type="text" class="form-control" value="{{ $dokumen->tajuk_dokumen }}"
                                    disabled>
                            </div>
                            @if ($dokumen->tajuk_dokumen == 'Surat Permohonan Rasmi')
                                <div class="form-group">
                                    <label for="no_rujukan" class="form-control-label">No Rujukan Surat</label>
                                    <input type="text" class="form-control" name="no_rujukan"
                                        value="{{ $dokumen->no_rujukan }}">
                                </div>
                                <div class="form-group">
                                    <label for="date_surat" class="form-control-label">Tarikh Surat</label>
                                    <input type="date" class="form-control" name="date_surat"
                                        value="{{ $dokumen->date_surat }}">
                                </div>
                            @endif
                            @if ($dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Pelajar' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Dekan/Pustakawan')
                                <p style="color: orangered; font-size: 13px">**Pastikan dokumen salinan kad pengenalan yang
                                    dimuat naik mempunyai palang
                                    silang
                                    bertulis "UNTUK KEGUNAAN PGN SAHAJA"</p>
                            @endif

                            <input type="file" name="file" class="form-control" id="updateFile" onchange="getFileInfo()">

                            <p id="infofile" style="color:blueviolet; font-size: 12px"></p>

                            <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                            <input type="hidden" name="id" value="{{ $permohonan->id }}">
                            <input type="hidden" name="dokumen_id" value="{{ $dokumen->id }}">

                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Simpan
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @foreach ($dokumens as $dokumen)
        @if ($dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Pelajar' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Dekan/Pustakawan')
            <!--Modal Jana IC Depan/Belakang -->
            <div class="modal fade" id="modal-nric-{{ $dokumen->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="text-white">Jana Salinan Kad Pengenalan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('kemaskiniSalinanIC') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="tajuk_dokumen" class="form-control-label">Tajuk Dokumen</label>
                                    <input type="text" class="form-control" value="{{ $dokumen->tajuk_dokumen }}"
                                        disabled>

                                    <label for="ic_front" class="form-control-label">NRIC Depan</label>
                                    <input type="file" name="ic_front" class="form-control mb-2">

                                    <label for="ic_back" class="form-control-label">NRIC Belakang</label>
                                    <input type="file" name="ic_back" class="form-control mb-2">
                                </div>
                                <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                <input type="hidden" name="id" value="{{ $permohonan->id }}">
                                <input type="hidden" name="dokumen_id" value="{{ $dokumen->id }}">

                                <button type="submit" class="btn btn-outline-success btn-block mt-4">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <!--Modal Tambah Dokumen -->
    <div class="modal fade" id="modal-dokumen-berkaitan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-0">
                    <h4 class="text-white">Tambah Dokumen Berkaitan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('muatnaikFail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tajuk_dokumen" class="form-control-label">Tajuk Dokumen</label>
                            <select name="tajuk_dokumen" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Salinan Kad Pengenalan">Salinan Kad Pengenalan
                                </option>
                                <option value="Salinan Kad Pengenalan Pelajar">Salinan Kad Pengenalan Pelajar
                                </option>
                                <option value="Salinan Kad Pengenalan Dekan/Pustakawan">Salinan Kad Pengenalan
                                    Dekan/Pustakawan
                                </option>
                                <option value="Borang PPNM">Borang PPNM (Wakil Agensi/Pelajar)</option>
                                <option value="Borang Undertaking">Borang Undertaking (Kontraktor)</option>
                                <option value="Salinan Lesen Hak Cipta">Salinan Lesen Hak Cipta (Lot Kadaster)</option>
                            </select>
                        </div>


                        <input type="file" name="file" class="form-control">
                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                        <input type="hidden" name="id" value="{{ $permohonan->id }}">
                        <br>
                        <span class="py-0" style="color: orangered; font-size: 13px">**Pastikan dokumen salinan
                            kad pengenalan
                            yang dimuat naik mempunyai palang silang bertulis "UNTUK KEGUNAAN PGN SAHAJA"</span>

                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Simpan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--Modal Jana IC Depan/Belakang -->
    <div class="modal fade" id="modal-jana-salinan-nric">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-0">
                    <h4 class="text-white">Jana Salinan Kad Pengenalan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('janaSalinanIC') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="ic_front" class="form-control-label">NRIC Depan</label>
                            <input type="file" name="ic_front" class="form-control mb-2">

                            <label for="ic_back" class="form-control-label">NRIC Belakang</label>
                            <input type="file" name="ic_back" class="form-control mb-2">
                        </div>
                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                        <input type="hidden" name="id" value="{{ $permohonan->id }}">

                        <button type="submit" class="btn btn-outline-success btn-block mt-4">
                            Simpan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Pilih Muat Naik -->
    <div class="modal fade" id="modal-pilih-upload">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-0">
                    <h4 class="text-white">Muat Naik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <a data-toggle="modal" data-target="#modal-jana-salinan-nric" data-dismiss="modal">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Muat Naik Gambar</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a data-toggle="modal" data-target="#modal-dokumen-berkaitan" data-dismiss="modal">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Muat Naik Dokumen</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($dokumens as $dokumen)
        @if ($dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Pelajar' || $dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Dekan/Pustakawan')
            <div class="modal fade" id="modal-pilih-upload-{{ $dokumen->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="text-white">Muat Naik</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <a data-toggle="modal" data-target="#modal-nric-{{ $dokumen->id }}"
                                        data-dismiss="modal">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Muat Naik Gambar</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a data-toggle="modal" data-target="#modal-kemaskini-dokumen-{{ $dokumen->id }}"
                                        data-dismiss="modal">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Muat Naik Dokumen</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <!-- Modal Kemaskini Senarai Kawasan Data -->
    @foreach ($skdatas as $sk)
        <div class="modal fade" id="modal-skd-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemaskini Senarai Data dan Kawasan Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('kemaskini_senarai_kawasan') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="form-control-label" for="kategori">Kategori</label>
                                            <input type="hidden" name="kategori" value="{{ $sk->kategori }}">
                                            <select class="form-control" name="kategori" disabled>
                                                <option selected disabled>Pilih</option>
                                                @foreach ($kategori_senarai_data as $sdata)
                                                    <option value="{{ $sdata->kategori }}" @if ($sk->kategori == $sdata->kategori) selected @endif>
                                                        {{ $sdata->kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="subkategori">Sub-Kategori</label>
                                            <select name="subkategori" class="form-control" autofocus>
                                                <option selected disabled>Pilih</option>
                                                @foreach ($senarai_data as $sdata)
                                                    @if ($sdata->kategori == $sk->kategori)
                                                        <option value="{{ $sdata->subkategori }}"
                                                            @if ($sk->subkategori == $sdata->subkategori) selected @endif>
                                                            {{ $sdata->subkategori }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="lapisan_data">Lapisan Data</label>
                                            <select name="lapisan_data" class="form-control" autofocus>
                                                <option disabled>Pilih</option>
                                                @foreach ($lapisandata as $sdata)
                                                    @if ($sdata->subkategori == $sk->subkategori)
                                                        <option value="{{ $sdata->lapisan_data }}"
                                                            @if ($sk->lapisan_data == $sdata->lapisan_data) selected @endif>
                                                            {{ $sdata->lapisan_data }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="kawasan_data">Jenis Data</label>
                                            <select class="form-control" name="jenis_data">
                                                <option selected disabled>Pilih</option>
                                                <option value="fizikal"  {{$sk->jenis_data == 'fizikal'? 'selected' : ''}}>Fizikal</option>
                                               <option value="map_servis"  {{$sk->jenis_data == 'map_servis'? 'selected' : ''}}>Map Servis</option>
                                               <option value="fizikal, map_servis"  {{$sk->jenis_data == 'fizikal, map_servis'? 'selected' : ''}}>Fizikal dan Map Servis</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="kawasan_data">Kawasan Data</label>
                                            <input name="kawasan_data" class="form-control mb-3" id="update_kawasan"
                                                value="{{ $sk->kawasan_data }}" type="hidden" />
                                            <select class="form-control" id="negeris" name="negeri"
                                                onchange="selectUpdateNegeri()">
                                                <option selected disabled>{{ $sk->kawasan_data }}</option>
                                                @foreach ($negeris as $neg)
                                                    <option value="{{ $neg->kod_negeri }}">{{ $neg->negeri }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="dynamicDaerahs">
                                        </div>

                                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                        <input type="hidden" name="sk_id" value="{{ $sk->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between1">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    </div>

    <script>
        $(document).on("click", ".btnDeleteSK", function() {
            var sk_id = $(this).data('skid');
            var r = confirm("Adakah anda pasti untuk buang data ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "{{ url('delete_senarai_kawasan') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sk_id": sk_id
                    },
                }).done(function(response) {
                    alert("Senarai Data tersebut telah dibuang.");
                    location.reload();
                });
            }
        });

        $(document).on("click", ".btnDeleteDokumen", function() {
            var dokumen_id = $(this).data('dokumenid');
            var r = confirm("Adakah anda pasti untuk buang data ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "{{ url('delete_dokumen') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "dokumen_id": dokumen_id
                    },
                }).done(function(response) {
                    alert("Dokumen tersebut telah dibuang.");
                    location.reload();
                });
            }
        });

        $(document).ready(function() {
            $("#tajukPermohonan").keyup(function () {  
                $(this).val($(this).val().toUpperCase());  
            }); 
            
            $(document).on('click', '.btnHantarPermohonanPentadbir', function() {
                if (confirm('Anda pasti untuk menghantar permohonan?')) {
                    $('#formHantarPermohonanPentadbir').submit();
                }
            });
            $(document).on('click', '.btnHantarPermohonan', function() {
                if (confirm('Anda pasti untuk menghantar permohonan?')) {
                    $('#formHantarPermohonan').submit();
                }
            });
            $(document).on('click', '.btnSimpanDraf', function() {
                if (confirm('Anda pasti untuk menyimpan permohonan?')) {
                    $('#formHantarPermohonanPentadbir').submit();
                }
            });

            $("#senarai_data_table").DataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-3 text-center'><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'i><'col-sm-7'p>>",
                // "scrollX": true,
                "orderCellsTop": true,
                "ordering": false,
                "responsive": false,
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
            }).columns.adjust();

            $("#dokumen_table").DataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-0 text-center'><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'i><'col-sm-7'p>>",
                // "scrollX": true,
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

    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 2) {
                document.getElementById('hidden_div_catatan').style.display = "block";
                document.getElementById('hidden_div_pentadbir').style.display = "none";
            } else
            if (select.value == 1) {
                document.getElementById('hidden_div_catatan').style.display = "none";
                document.getElementById('hidden_div_pentadbir').style.display = "block";
            }
        }

        function getFileInfo() {
            var fileName = document.getElementById('updateFile').files[0].name;
            var fileSize = document.getElementById('updateFile').files[0].size;
            var fileExt = fileName.split('.').pop();
            var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
                i = 0;
            while (fileSize > 900) {
                fileSize /= 1024;
                i++;
            }
            var exactSize = (Math.round(fileSize * 100) / 100) + ' ' + fSExt[i];

            // console.log(fileName, exactSize, fileExt);
            $(document).ready(function() {
                $('p#infofile').html('<br>Nama: ' + fileName +
                    '<br>Jenis Dokumen: <span style="text-transform: uppercase;">' + fileExt +
                    '</span><br> Saiz: ' +
                    exactSize
                );
                $('.modal').on('hidden.bs.modal', function() {
                    $('p#infofile').html('');
                    // console.log('done buang');
                });
            });

        }
    </script>

    <script type="text/javascript">
        function checkCatatan(val) {
            var element = document.getElementById('catatan');
            if (val == 'Pilih' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function selectKategori() {
            d = document.getElementById("kategori").value;
            kategori = d.toString();
            sdata = {!! $senarai_data !!}
            senarai_append = ''
            sdata.forEach(element => {
                if (element['kategori'] == d) {
                    senarai_append += `<option value="` + element['subkategori'] + `">` + element['subkategori'] +
                        `</option>`
                }
            });

            $("#dynamicAddRemove").empty();
            $("#dynamicAddRemove").append(`<label class="form-control-label" for="subkategori">Sub-Kategori</label>
                                                <select name="subkategori" id="subkategori" class="form-control" onchange="selectSubKategori()" autofocus><option selected disabled>Pilih</option>'

                                                    ` + senarai_append + `

                                                 </select>`);
        }

        function selectSubKategori() {
            d = document.getElementById("subkategori").value;
            kategori = d.toString();
            sdata = {!! $lapisandata !!}
            senarai_append = ''
            sdata.forEach(element => {
                if (element['subkategori'] == d) {
                    senarai_append += `<option value="` + element['lapisan_data'] + `">` + element['lapisan_data'] +
                        ` ` + ((element['kelas']) ? `- ` + element['kelas'] : '') + `</option>`
                }
            });

            $("#dynamicAddRemove2").empty();
            $("#dynamicAddRemove2").append(`<label class="form-control-label" for="lapisan_data">Lapisan Data</label>
                                                <select name="lapisan_data" class="form-control " autofocus><option selected disabled>Pilih</option>'

                                                    ` + senarai_append + `

                                                 </select>`);

        }

        function selectNegeri() {
            d = document.getElementById("negeri").value;
            kategori = d.toString();
            sdata = {!! $daerahs !!}
            daerah_append = ''
            sdata.forEach(element => {
                if (element['negeri_id'] == d) {
                    daerah_append += `<label for="` + element['daerah'] + `">
                                                    <input type="checkbox" name="daerah[]" value="` + element[
                        'daerah'] + `" />
                                                    ` + element['daerah'] + `
                                                </label>`
                }
            });
            if (daerah_append == '') {
                $("#dynamicDaerah").empty();
            } else {
                $("#dynamicDaerah").empty();
                $("#dynamicDaerah").append(`<div class="form-group multipleSelection">
                                            <div class="selectBox"
                                                onclick="showCheckboxes()">
                                                <select class="form-control">
                                                    <option id="result">Daerah</option>
                                                </select>
                                                <div class="overSelect"></div>
                                            </div>

                                            <div id="checkBoxes" onchange="displayCheck()">
                                                <label for="selectall">
                                                    <input type="checkbox" id="checkAll" onclick="selectAll()">
                                                    Pilih Semua
                                                </label>
                                                ` + daerah_append + `
                                            </div>
                                        </div>`);
            }
        }

        function selectUpdateNegeri() {
            d = document.getElementById("negeris").value;
            kategori = d.toString();
            sdata = {!! $daerahs !!}
            daerah_append = ''
            sdata.forEach(element => {
                if (element['negeri_id'] == d) {
                    daerah_append += `<label for="` + element['daerah'] + `">
                                                    <input type="checkbox" name="daerah[]" value="` + element[
                        'daerah'] + `" />
                                                    ` + element['daerah'] + `
                                                </label>`
                }
            });

            if (daerah_append == '') {
                $("#dynamicDaerahs").empty();
            } else {
                $("#dynamicDaerahs").empty();
                $("#dynamicDaerahs").append(`<div class="form-group multipleSelection">
                                            <div class="selectBox"
                                                onclick="showCheckboxes()">
                                                <select class="form-control">
                                                    <option id="result">Daerah</option>
                                                </select>
                                                <div class="overSelect"></div>
                                            </div>

                                            <div id="checkBoxes" onchange="displayCheck()">
                                                <label for="selectall">
                                                    <input type="checkbox" id="checkAll" onclick="selectAll()">
                                                    Pilih Semua
                                                </label>
                                                ` + daerah_append + `
                                            </div>
                                        </div>`);
            }
        }

        function displayCheck() {
            $(document).ready(function() {
                var append = '';
                $("#checkBoxes input[name='daerah[]']:checked").each(function(i) {
                    var len = $("#checkBoxes input[name='daerah[]']:checked").length;
                    // alert(len);
                    if (i === (len - 1)) {
                        append += this.value;
                    } else {
                        append += this.value + ', ';
                    }

                });
                $('#result').html('( ' + append + ' )');
                $('#update_kawasan').text('( ' + append + ' )');
            });
        }

        function selectAll() {
            $("#checkAll").change(function() {
                $("input[name='daerah[]']").prop('checked', this.checked);
            });
        }

        var show = true;

        function showCheckboxes() {
            var checkboxes =
                document.getElementById("checkBoxes");

            if (show) {
                checkboxes.style.display = "block";
                show = false;
            } else {
                checkboxes.style.display = "none";
                show = true;
            }
        }
    </script>

@stop
