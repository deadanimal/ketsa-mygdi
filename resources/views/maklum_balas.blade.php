@extends('layouts.app_ketsa')

@section('content')
<style>
    .card {
        background-color: white;
    }
</style>
<!-- Content Wrapper. Contains page content -->

<div class="content p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title m-0">Anda perlukan sebarang bantuan atau pertanyaan?</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{url('simpan_maklum_balas')}}" id="form_maklum_balas">
                            <h6 class="heading-small text-muted mb-4">Maklum Balas</h6>
                            <div class="pl-lg-4">
                                <div class="row mb-3">
                                    <div class="col-2"><label for="input-agensi" class="form-control-label mr-4"> Kategori </label></div>
                                    <div class="col-9"><select id="input-agensi" class="form-control form-control-sm ml-3">
                                            <option selected disabled hidden=""> Pilih Kategori </option>
                                            <option value="metadata">Metadata</option>
                                            <option value="permohonan data asas">Permohonan Data-data Asas</option>
                                            <option value="lain-lain">Lain-lain</option>
                                        </select></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2"><label for="input-feedback" class="form-control-label mr-4"> Pertanyaan </label></div>
                                    <div class="col-9"><textarea name="pertanyaan" placeholder="Nyatakan maklum balas anda" type="text" rows="5" class="form-control form-control-sm ml-3"></textarea></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2"><label for="input-emel" class="form-control-label mr-4"> Emel Personal </label></div>
                                    <div class="col-7"><input placeholder="Masukan E-mel anda" type="text" name="email" class="form-control form-control-sm ml-3">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btnHantar">Hantar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->

<script>
    $(document).ready(function() {

    });

    $(document).on('click', '#btnHantar', function() {
        alert("Maklum balas berjaya dihantar.");
    });
</script>
@stop
