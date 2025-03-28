@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">

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
                                        <a href="{{ url('kemaskini_profil') }}"
                                            class="btn btn-primary btn-sm text-white btn-icon btn-3">
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
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="uname" type="text"
                                                value="{{ $user->name }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="nric">
                                                No Kad Pengenalan
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="input-nric" type="text"
                                                value="{{ $user->nric }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2 divSektor">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="sektor">
                                                Sektor
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="sektor" type="text"
                                                value="{{ $user->sektor == '1' ? 'Kerajaan' : 'Swasta' }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="agensi_organisasi">
                                                Agensi / Organisasi / Institusi</label>
                                        </div>
                                    <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="agensi_organisasi"
                                                type="text"
                                                value="{{ is_numeric($user->agensi_organisasi) && isset($user->agensiOrganisasi) ? $user->agensiOrganisasi->name : $user->agensi_organisasi }}"
                                                disabled />
                                        </div>
                                    </div>
                                    @if (Auth::user()->hasRole(['Penerbit Metadata', 'Pengesah Metadata']))
                                        <div class="row mb-2 divBahagian">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="bahagian">
                                                    Bahagian
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="bahagian" type="text"
                                                    value="{{ $user->bahagian }}" disabled />
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="email">
                                                Emel
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="email" type="text"
                                                value="{{ $user->email }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_pejabat">
                                                Telefon Pejabat
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="phone_pejabat" type="text"
                                                value="{{ $user->phone_pejabat }}" disabled />
                                        </div>
                                    </div>
                                    @if (!Auth::user()->hasRole(['Penerbit Metadata', 'Pengesah Metadata']))
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="phone_bimbit">
                                                    Telefon Bimbit
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="phone_bimbit"
                                                    type="text" value="{{ $user->phone_bimbit }}" disabled />
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="alamat">
                                                Alamat
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="phone_pejabat" type="text"
                                                value="{{ $user->alamat }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="postcode">
                                                Poskod
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="postcode" type="text"
                                                value="{{ $user->postcode }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="city">
                                                Bandar
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="city" type="text"
                                                value="{{ $user->city }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="state">
                                                Negeri
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="state" type="text"
                                                value="{{ (isset($states->name) ? $states->name:"") }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="country">
                                                Negara
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="country" type="text"
                                                value="{{ (isset($countries->name) ? $countries->name:"") }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="peranan">
                                                Peranan
                                            </label>
                                        </div>
                                        <label class="float-right">:</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="peranan" type="text"
                                                value="<?php echo $user->assigned_roles; ?>" disabled />
                                        </div>
                                    </div>
                                    @if (Auth::user()->hasRole('Pemohon Data'))
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="email">
                                                    Kategori
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" type="text"
                                                    value="{{ $user->kategori }}" disabled />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="post" class="form-horizontal" action="{{ url('simpan_kemaskini_password') }}"
                                id="form_change_password">
                                @csrf
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <h3 class="mb-0">Tukar Kata Laluan</h3>
                                            <i class="text-warning" style="font-size:14px;">* Kata laluan mestilah
                                                mempunyai
                                                sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf
                                                kecil,
                                                nombor dan simbol.</i>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button"
                                                class="btn btn-warning btn-sm text-white btn-icon btn-3 btnTukar">
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
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-sm-7">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Masukkan Kata Laluan Lama"
                                                        type="password" id="password_old" name="password_old" />
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
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-sm-7">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Masukkan Kata Laluan Baru"
                                                        type="password" id="password_new" name="password_new" />
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
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-sm-7">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Sahkan Kata Laluan Baru"
                                                        type="password" id="password_new_confirm"
                                                        name="password_new_confirm" />
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
    <?php //apparently sweetalert is configured to auto-read and auto-display sessions with name 'message'
    ?>
    @if (Session::has('message'))
        <script>
            //alert("{{ Session::get('message') }}");
        </script>
    @endif

    <script>
        $(document).ready(function() {
            <?php
        if (Auth::user()->hasRole('Pemohon Data')) {
            ?>
            $('.divSektor,.divBahagian').hide();
            <?php
        }
        ?>

            $(document).on('click', '.btnTukar', function() {
                var passold = $('#password_old').val();
                var password_daftar = $("#password_new").val();
                var password_confirm = $("#password_new_confirm").val();
                var msg = "";
                if (passold == "") {
                    msg = msg + "Sila isi kata laluan kini\r\n\r\n"
                }
                if (!checkPassword(password_daftar)) {
                    msg = msg +
                        "Kata laluan mesti mempunyai sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil, nombor dan simbol.\r\n\r\n";
                }
                if (password_daftar != password_confirm) {
                    msg = msg +
                        "Kata laluan yang dimasukkan berbeza dengan kata laluan yang disahkan\r\n\r\n";
                }
                if (msg.length > 0) {
                    alert(msg);
                } else {
                    $('#form_change_password').submit();
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

        function checkPassword(str) {
            // at least one number, one lowercase and one uppercase letter, at least 12 characters
            var regex = /^(?=^.{12,40}$)(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z])(?!^.*\n).*$/;
            return regex.test(str);
        }
    </script>

@stop
