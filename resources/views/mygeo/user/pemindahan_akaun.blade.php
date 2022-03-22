@extends('layouts.app_mygeo_ketsa')

@section('content')

<style>
    .ftest {
        display: inline;
        width: auto;
    }
    select option[disabled] {
        display: none;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-8 col-6">
                        <h6 class="h2 text-dark d-inline-block mb-0">Pengurusan Pengguna</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengurusan Pengguna
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pemindahan Akaun
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-2 text-right">

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
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h3 class="mb-0">Pemindahan Akaun</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <form name="form_pindah_akaun" id="form_pindah_akaun" method="POST">
                                        <div class="pl-lg-4 mt-4">
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <label class="form-control-label">Pilih Agensi</label><span class="float-right">:</span>
                                                </div>
                                                <div class="col-8">
                                                    <select name="pilih_agensi" id="pilih_agensi" class="form-control">
                                                        <option selected disabled>Pilih</option>
                                                        <?php
                                                        if (isset($agensi) && count($agensi) > 0) {
                                                            foreach ($agensi as $a) {
                                                                ?>
                                                                <option value="{{ $a->name }}">{{ $a->name }}</option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <label class="form-control-label">Pilih Pengguna</label><span class="float-right">:</span>
                                                </div>
                                                <div class="col-8">
                                                    <select name="pengguna_lama" id="pengguna_lama" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <label class="form-control-label">Pengguna Baru</label><span class="float-right">:</span>
                                                </div>
                                                <div class="col-8">
                                                    <select name="pengguna_baru" id="pengguna_baru" class="form-control">
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <button type="button" class="btn btn-primary btnPindahAkaun" disabled>
                                                        Pindah Akaun
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <br><br>

                            <h5>SENARAI METADATA DI BAWAH PENGGUNA</h5>
                            <table id="table_metadata" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama Metadata</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-butiran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Maklumat Pengguna</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body modal_user_detail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between1">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#table_newUsers").DataTable({
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

        $(document).on("change", "#pilih_agensi", function() {
            // ajax get users by agency selected
            $.ajax({
                    method: "POST",
                    url: "getUsersByAgensi",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "agensi": $(this).val()
                    },
                })
                .done(function(response) {
                    $('#pengguna_lama').empty().append(response);
                    $('#pengguna_baru').empty().append(response);
                });

            validateForm();
        });

        $(document).on("change", "#pengguna_lama", function() {
            var penggunaLama = $(this).val();
            $("#pengguna_baru option").prop("disabled", false);
            $("#pengguna_baru option[value=" + penggunaLama + "]").prop("hidden", true);
            $("#pengguna_baru").val($("#pengguna_baru option:first").val());
            $("#pengguna_baru option:first").prop('disabled', true);

            // ajax get metadatas owned by selected user
            $.ajax({
                    method: "POST",
                    url: "getMetadataByUser",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": penggunaLama
                    },
                })
                .done(function(response) {
                    $('#table_metadata tbody').empty().append(response);
                });

            validateForm();
        });

        $(document).on("change", "#pengguna_baru", function() {
            validateForm();
        });

        function validateForm() {
            var agensi = $('#pilih_agensi').val();
            var pengguna_lama = $('#pengguna_lama').val();
            var pengguna_baru = $('#pengguna_baru').val();

            if (agensi === "" || !agensi || pengguna_lama === "" || !pengguna_lama || pengguna_lama === "Pilih" || pengguna_baru === "" || !pengguna_baru || pengguna_baru === "Pilih") {
                $(".btnPindahAkaun").prop('hidden', true);
            } else {
                $(".btnPindahAkaun").prop('hidden', false);
            }
        }

        $(document).on("click", ".btnPindahAkaun", function() {
            var pengguna_lama = $('#pengguna_lama').val();
            var pengguna_baru = $('#pengguna_baru').val();

            // ajax submit form
            $.ajax({
                    method: "POST",
                    url: "simpan_pemindahan_akaun",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "pengguna_lama": pengguna_lama,
                        "pengguna_baru": pengguna_baru
                    },
                })
                .done(function(response) {
                    alert("Metadata telah berpindah hak milik.");
                    window.location.reload();
                });

            validateForm();
        });
    });
</script>

@stop
