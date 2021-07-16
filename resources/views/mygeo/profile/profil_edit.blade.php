@extends('layouts.app_mygeo_afiq')

@section('content')


<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">

<style>
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Profil</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Profil
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
                        <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_profil')}}" id="form_kemaskini_profil">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Kemaskini Profil Pengguna</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ url('mygeo_profil') }}" class="btn btn-danger btn-sm text-white btn-icon btn-3">
                                            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                                            <span class="btn-inner--text">Balik</span>
                                        </a>
                                        <button type="submit" class="btn btn-success btn-sm text-white btn-icon btn-3">
                                            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
                                            <span class="btn-inner--text">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mt-0 mb-4">Maklumat Pengguna</h6>
                                <div class="pl-lg-4 pb-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="uname">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="uname" type="text" value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="nric">
                                                Kad Pengenalan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="nric" type="text" value="{{ $user->nric }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="agensi_organisasi">
                                                Agensi / Organisasi
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="agensi_organisasi" type="text" value="{{ $user->agensi_organisasi }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="bahagian">
                                                Bahagian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="bahagian" type="text" value="{{ $user->bahagian }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="sektor">
                                                Sektor
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control form-control-sm ml-3" name="sektor">
                                                <option value="1" {{ ($user->sektor == '1' ? "selected":"") }}>Kerajaan</option>
                                                <option value="2" {{ ($user->sektor == '2' ? "selected":"") }}>Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="email">
                                                Emel
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="email" type="email" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_pejabat">
                                                Telefon Pejabat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control form-control-sm ml-3" name="phone_pejabat" type="text" value="{{ $user->phone_pejabat }}" />
                                        </div>
                                        <div class="col-2">
                                            <label class="form-control-label mr-4" for="phone_bimbit">
                                                Telefon Bimbit
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control form-control-sm ml-3" name="phone_bimbit" type="text" value="{{ $user->phone_bimbit }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="peranan">
                                                Peranan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control form-control-sm ml-3" id="peranan" name="peranan[]">
                                                <?php
                                                if (!empty($roles)) {
                                                    foreach ($roles as $role) {
                                                        $assigned = 1; //0=assigned,1=unassigned
                                                        if (!empty($user->getRoleNames())) {
                                                            foreach ($user->getRoleNames() as $roleUser) {
                                                                if ($role->name == $roleUser) {
                                                                    $assigned = $assigned * 0;
                                                                }
                                                            }

                                                            if ($assigned == 0) {
                                                                ?><option value="{{ $role->name }}" selected>{{ $role->name }} 1</option><?php
                                                                                                                                                        } else {
                                                                                                                                                            ?><option value="{{ $role->name }}">{{ $role->name }} 1</option><?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        ?><option value="{{ $role->name }}">{{ $role->name }} 1</option><?php
                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <h6 class="heading-small text-muted mt-0 mb-4">Gambar Profil</h6>
                                <div class="pl-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <image id="profileImage" src="http://lorempixel.com/200/250" style="border-radius: .95rem"/>
                                        </div>
                                        <div class="col-6 ml-4 ">
                                            <label class="form-control-label">Pilih Gambar</label>
                                            <div class="form-inline">
                                                <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" class="form-control form-control-sm p-0">
                                            <button class="btn btn-sm btn-warning ml-3">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop
