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
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profil Pengguna</h3>
                                </div>

                                <div class="col-4 text-right">
                                    <a href="{{ url('kemaskini_profil') }}" class="btn btn-primary btn-sm text-white btn-icon btn-3">
                                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                                        <span class="btn-inner--text">Kemaskini Profil</span>
                                    </a>
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
                                        <input class="form-control form-control-sm ml-3" id="uname" type="text" value="{{ $user->name }}" disabled />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="nric">
                                            No Kad Pengenalan
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" id="input-nric" type="text" value="{{ $user->nric }}" disabled />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="agensi_organisasi">
                                            Agensi / Organisasi
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" id="agensi_organisasi" type="text" value="{{ $user->agensi_organisasi }}" disabled />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="bahagian">
                                            Bahagian
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" id="bahagian" type="text" value="{{ $user->bahagian }}" disabled />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="sektor">
                                            Sektor
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" id="sektor" type="text" value="{{ ($user->sektor == '1' ? "Kerajaan":"Swasta") }}" disabled />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="email">
                                            Emel
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" id="email" type="text" value="{{ $user->email }}" disabled />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="phone_pejabat">
                                            Telefon Pejabat
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control form-control-sm ml-3" id="phone_pejabat" type="text" value="{{ $user->phone_pejabat }}" disabled />
                                    </div>
                                    <?php
                                    if(Auth::user()->hasRole('Pemohon Data')){
                                        ?>
                                        <div class="col-2">
                                            <label class="form-control-label mr-4" for="phone_bimbit">
                                                Telefon Bimbit
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control form-control-sm ml-3" id="phone_bimbit" type="text" value="{{ $user->phone_bimbit }}" disabled />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="peranan">
                                            Peranan
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <?php
                                        if (!empty($user->getRoleNames())) {
                                            $count = 1;
                                            foreach ($user->getRoleNames() as $role) {
                                                ?><input class="form-control form-control-sm ml-3" id="peranan" type="text" value="<?php echo $role; ?> " disabled /><?php
                                                if ($count != count($user->getRoleNames())) {                                                                                           ?>,<?php
                                                }
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_password')}}" id="form_change_password">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Tukar Kata Laluan</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    <button type="button" class="btn btn-warning btn-sm text-white btn-icon btn-3 btnTukar">
                                            <span class="btn-inner--icon"><i class="fas fa-wrench"></i></span>
                                            <span class="btn-inner--text">Tukar</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="pl-lg-4 pb-lg-4">
                                    <input type="hidden" value="{{ $user->password }}">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-username">
                                                Kata Laluan Lama
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Masukkan Kata Laluan Lama" type="password" id="password_old" name="password_old" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-eye" onclick="myFunction1()"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-username">
                                                Kata Laluan Baru
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Masukkan Kata Laluan Baru" type="password" id="password_new" name="password_new" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-eye" onclick="myFunction2()"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-username">
                                                Sahkan Kata Laluan Baru
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Sahkan Kata Laluan Baru" type="password" id="password_new_confirm" name="password_new_confirm" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-eye" onclick="myFunction3()"></i>
                                                    </div>
                                                </div>
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

<script>
    $(document).ready(function(){
        <?php
        if(Session::has('message')){
            ?>alert("{{ Session::get('message') }}");<?php
        }
        ?>

        $(document).on('click','.btnTukar',function(){
            var passold = $('#password_old').val();
            var passnew = $('#password_new').val();
            var passnewconfirm = $('#password_new_confirm').val();

            if(passold == "" || passnew == "" || passnewconfirm == ""){
                alert('Sila pastikan maklumat kata laluan lama dan baru lengkap');
            }else{
                if(passnew == passnewconfirm){
                    $('#form_change_password').submit();
                }else{
                    alert('Sila pastikan input kata laluan baru dan sahkan kata laluan baru sama dan lengkap');
                }
            }
        });

    });
    function myFunction1() {
        var x = document.getElementById("password_old");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction2() {
        var x = document.getElementById("password_new");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction3() {
        var x = document.getElementById("password_new_confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

@stop
