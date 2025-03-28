@extends('layouts.app_ketsa')

@section('content')
<style>
    .card {
        border-radius: 0;
        top: 250px;
        left: 0;
        right: 0;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="card mt-7 p-4" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h1 class="text-center">Hubungi Kami</h1>
                </div>
                <div class="col">

                    Pusat Geospatial Negara (PGN) <br>
                    Kementerian Tenaga dan Sumber Asli (KeTSA) <br>
                    Aras 7 & 8, Wisma Sumber Asli <br>
                    No 25, Persiaran Perdana, Presint 4 <br>
                    62574, Putrajaya, Malaysia <br><br>
                    Tel:+603 8886 1156 | Faks: +603 8889 4851<br>
                    <i class="fas fa-envelope"></i> adminexplorer@ketsa.gov.my <br>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
