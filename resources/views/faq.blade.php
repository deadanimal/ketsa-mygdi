@extends('layouts.app_afiq')

@section('content')

<style>
    .accordionHeader{
        background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
        background-image: linear-gradient(to right, #ebba16, #ed8a19);
        cursor: pointer;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper col-md-12">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Soalan Lazim (FAQ)</h1>
                            <div id="accordion">
                                <?php //=== collapse1 =============================================================?>
                                <div class="card card-primary div_c1" id="div_c1">
                                    <div class="card-header accordionHeader" data-toggle="collapse" href="#collapse1">
                                        <span>METADATA</span>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in" data-parent="#div_c1">
                                        <div class="card-body">
                                            <div class="acard-body opacity-8">
                                                <strong>
                                                    <p align="justify" style="text-align: justify;font-weight: unset;"> 
                                                    Adakah Aplikasi UPI memaparkan carian nombor lot dan maklumat lain berkenaan lot tanah?
                                                    </p>
                                                </strong>
                                                <br>
                                                <p>
                                                    Tidak. Aplikasi UPI hanya memaparkan struktur kod dan nama sempadan pentadbiran tanah seperti Negeri, Daerah,Mukim/Bandar/Pekan dan Seksyen. Maklumat berkenaan lokasi nombor lot tidak dipaparkan di dalam aplikasi ini.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse2 =============================================================?>
                                <div class="card card-primary div_c2" id="div_c2">
                                    <div class="card-header accordionHeader" data-toggle="collapse" href="#collapse2">
                                        <span>DATA_DATA ASAS</span>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse in" data-parent="#div_c2">
                                        <div class="card-body">
                                            <div class="acard-body opacity-8">
                                                <strong>
                                                    <p align="justify" style="text-align: justify;font-weight: unset;"> 
                                                        Adakah pengguna perlu mendaftar untuk melayari aplikasi UPI?
                                                    </p>
                                                </strong>
                                                <br>
                                                <p>
                                                    Tidak. Aplikasi UPI terbuka untuk paparan umum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var pengesahs = [];

    $(document).ready(function () {

    });
</script>
@stop
