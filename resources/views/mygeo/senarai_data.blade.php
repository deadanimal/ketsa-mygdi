@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>
        .bg-user {
            background-color: #96C7C1
        }

        .bg-admin {
            background-color: #C8A2C8
        }

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header bg-admin">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Kemas Kini Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Kemas Kini Data
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
                                        <h3 class="mb-0">Senarai Data</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tambah
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-kategori">Kategori</a>
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-subkategori">Sub-Kategori</a>
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-lapisan-data">Lapisan Data</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                <table id="table_senarai_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>KATEGORI</th>
                                            <th>SUB-KATEGORI</th>
                                            <th>LAPISAN DATA</th>
                                            <th>KOD (MS1759)</th>
                                            <th>KELAS</th>
                                            <th>HARGA DATA</th>
                                            <th>STATUS</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($senarai_data as $sdata)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sdata->kategori }}</td>
                                                <td>{{ $sdata->subkategori }}</td>
                                                <td>{{ $sdata->lapisan_data }}</td>
                                                <td>{{ $sdata->kod }}</td>
                                                <td>{{ $sdata->kelas }}</td>
                                                <td>{{ $sdata->harga_data }}</td>
                                                <td>{{ $sdata->status }}</td>
                                                <td>
                                                    <a data-toggle="modal"
                                                        data-target="#modal-kemaskinidata-{{ $sdata->id }}">
                                                        <button type="button" class="btn btn-sm btn-success"><i
                                                                class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" data-senaraidataid="{{ $sdata->id }}"
                                                        class="btnDelete btn btn-sm btn-danger mx-2"><i
                                                            class="fas fa-trash"></i>
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

        <!-- Modal Kemaskini Data-->
        @foreach ($senarai_data as $sdata)
            <div class="modal fade" id="modal-kemaskinidata-{{ $sdata->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="text-white">Kemaskini Senarai Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="/kemaskini_senarai_data">
                            @csrf
                            <div class="modal-body row">
                                <div class="col-12">
                                    <input type="hidden" name="id_senarai_data" value="{{ $sdata->id }}">
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori</label>
                                        <input type="text" class="form-control form-control-sm" name="kategori"
                                            value="{{ $sdata->kategori }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Sub-Kategori</label>
                                        <select name="subkategori" class="form-control form-control-sm"
                                            onchange="selectSubKategori()" autofocus>
                                            <option selected disabled>Pilih</option>
                                            @foreach ($subkategori_sd as $sub)
                                                @if ($sub->name == $sdata->subkategori)
                                                    <option value="{{ $sub->name }}"
                                                        {{ $sub->name == $sdata->subkategori ? 'selected' : '' }}>
                                                        {{ $sub->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Lapisan Data</label>
                                        <input type="text" class="form-control form-control-sm" name="lapisan_data"
                                            value="{{ $sdata->lapisan_data }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Kod (MS1759)</label>
                                        <input type="text" class="form-control form-control-sm" name="kod"
                                            value="{{ $sdata->kod }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Pengkelasan Lapisan Data</label>
                                        <select class="form-control form-control-sm" name="kelas">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="Terhad" @if ($sdata->kelas == 'Terhad') selected @endif>Terhad</option>
                                            <option value="Tidak Terhad" @if ($sdata->kelas == 'Tidak Terhad') selected @endif>Tidak Terhad</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Harga Data</label>
                                        <input type="text" class="form-control form-control-sm" name="harga_data"
                                            value="{{ $sdata->harga_data }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Status Data</label>
                                        <select class="form-control form-control-sm" name="status">
                                            <option selected disabled>Pilih</option>
                                            <option value="Tersedia" @if ($sdata->status == 'Tersedia') selected @endif>Tersedia</option>
                                            <option value="Tiada" @if ($sdata->status == 'Tiada') selected @endif>Tiada</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-success float-right" type="submit">
                                        <span class="text-white">Simpan</span>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal Kategori -->
        <div class="modal fade" id="modal-kategori">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Kategori</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/simpan_kategori_senarai_data">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <input type="text" class="form-control form-control-sm" name="kategori" value="">
                                </div>
                                {{-- <input type="hidden" name="id" value="{{ $user->id }}">
                                <input type="hidden" name="data_id" value="{{ $user->id }}"> --}}

                                <button class="btn btn-success float-right mt-4" type="submit">
                                    <span class="text-white">Tambah</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Sub-Kategori -->
        <div class="modal fade" id="modal-subkategori">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Sub-Kategori</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/simpan_subkategori_senarai_data">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <select class="form-control form-control-sm" name="kategori_id" id="kategori"
                                        onchange="selectKategori()">
                                        <option selected disabled>Pilih</option>
                                        @foreach ($kategori_sd as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Sub-Kategori</label>
                                    <input type="text" class="form-control form-control-sm" name="subkategori" value="">
                                </div>

                                <button class="btn btn-success float-right mt-4" type="submit">
                                    <span class="text-white">Tambah</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Data Asas -->
        <div class="modal fade" id="modal-lapisan-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Lapisan Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/simpan_senarai_data">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <select class="form-control form-control-sm" name="kategori" id="kategori_s"
                                        onchange="selectKategori()">
                                        <option selected disabled>Pilih</option>
                                        @foreach ($kategori_sd as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="dynamicAddRemove">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Kod (MS1759)</label>
                                    <input type="text" class="form-control form-control-sm" name="kod" value="">
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Lapisan Data</label>
                                    <input type="text" class="form-control form-control-sm" name="lapisan_data" value="">
                                </div>

                                <button class="btn btn-success float-right mt-4" type="submit">
                                    <span class="text-white">Tambah</span>
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
            $("#table_senarai_data").DataTable({
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

        $(document).on("click", ".btnDelete", function() {
            var sdata_id = $(this).data('senaraidataid');
            var r = confirm("Adakah anda pasti untuk buang data ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_senarai_data",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": sdata_id
                    },
                }).done(function(response) {
                    alert("Data telah dibuang.");
                    location.reload();
                });
            }
        });
    </script>
    <script type="text/javascript">
        function selectKategori() {
            d = document.getElementById("kategori_s").value;
            kategori = d.toString();
            sdata = {!! $subkategori_sd !!}
            senarai_append = ''
            sdata.forEach(element => {
                if (element['kategori_id'] == d) {
                    senarai_append += `<option value="` + element['name'] + `">` + element['name'] +
                        `</option>`
                }
            });

            $("#dynamicAddRemove").empty();
            $("#dynamicAddRemove").append(`<label class="form-control-label" for="subkategori">Sub-Kategori</label>
                                                <select name="subkategori" id="subkategori" class="form-control form-control-sm" onchange="selectSubKategori()" autofocus><option selected disabled>Pilih</option>'

                                                    ` + senarai_append + `

                                                 </select>`);

        }

        function selectSubKategori() {
            d = document.getElementById("subkategori").value;
            kategori = d.toString();
            sdata = {!! $senarai_data !!}
            senarai_append = ''
            sdata.forEach(element => {
                if (element['subkategori'] == d) {
                    senarai_append += `<option value="` + element['lapisan_data'] + `">` + element['lapisan_data'] +
                        `</option>`
                }
            });

            $("#dynamicAddRemove2").empty();
            $("#dynamicAddRemove2").append(`<label class="form-control-label" for="lapisan_data">Lapisan Data</label>
                                                <select name="lapisan_data" class="form-control" autofocus><option selected disabled>Pilih</option>'

                                                    ` + senarai_append + `

                                                 </select>`);

        }
    </script>
@stop
