@extends('layouts.app_mygeo_afiq')

@section('content')

<style>
    .umum_senarai_card {
        border-radius: 25px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .divCenter {
        margin-right: auto;
        margin-left: auto;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Pengumuman</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengurusan Portal
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengumuman
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ url('pengumuman_edit') }}" class="btn btn-sm btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h1 class="card-title m-0">{!! (!is_null($pengumuman) ? $pengumuman->title:"") !!}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4>{!! (!is_null($pengumuman) ? date("j M Y",strtotime($pengumuman->date)):"") !!}</h4>
                            <p>{!! (!is_null($pengumuman) ? $pengumuman->content:"") !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
