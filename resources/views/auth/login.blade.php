@extends('layouts.app_ketsa')

@section('content')
    <style>
        .card {
            border-radius: 2rem;
        }

    </style>
    <style>
        div.g-recaptcha {
            margin: 0 auto;
            width: 304px;
        }

    </style>

    <div class="content bgland p-5">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 p-4 px-5">
                    <div class="row img-center">
                        <img src="{{ url('assetsangular/img/logo/mygeo-logo.png') }}" alt="MyGeo Explorer"
                            class="img-center" style="width: 80%; height: auto;">
                    </div>
                    <div class="row justify-content-center">
                        <div class="card" style="background-color: rgba(255, 255, 255, 0.7);">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-muted" style="font-size: 17px;">
                                    <h2 class="mb-0 pb-0 text-muted">Maklumat geospatial kini dihujung jari anda.</h2>
                                    <h2 class="mb-0 pb-0 text-muted">Log Masuk.</h2>
                                    <br>
                                </div>
                                <div class="mb-4">
                                    <a class="text-primary" href="#" id="hrefDaftar" data-backdrop="false"
                                        data-toggle="modal" data-target="#modal-daftar-jenis-pengguna">Pengguna baru? Daftar
                                        sekarang.</a>
                                </div>
                                <form method="POST" action="{{ url('loginf') }}" id="formLogin">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative mb-3">
                                            <input id="id_pengguna" type="text"
                                                class="form-control @error('emailf') is-invalid @enderror" name="emailf"
                                                value="{{ old('emailf') }}" required autocomplete="emailf" autofocus
                                                placeholder="ID Pengguna">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Kata Laluan">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-eye" onclick="myFunction3()"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="validation-errors">
                                        </div>
                                    </div>
                                    <div class="form-group justify-item-center">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group">
                                                <div class="g-recaptcha"
                                                    data-sitekey="6LdvEbUbAAAAAEeHGogajujfQIS-Rp98PxrU5Frz" width="100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="validation-errors">
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 order-2">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-warning float-right btn_login">Log
                                                    Masuk</button>
                                            </div>
                                        </div>
                                        <div class="col-6 order-1">
                                            <a class="text-danger" href="{{ route('password.request') }}">Lupa kata
                                                laluan?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
        <!--===== MODALS =====-->
        <div class="modal fade" id="modal-daftar-jenis-pengguna">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Sebagai:</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id='formRegisterUser'>
                        @csrf
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="div_pilihan_peranan">
                                            <div class=" custom-control custom-radio mb-3">
                                                <input class="custom-control-input perananCheckbox kategoriCheck" id="penerbitMetadata"
                                                    name="perananSelect" type="checkbox" value="4" />
                                                <label class="custom-control-label" for="penerbitMetadata">
                                                    Penerbit Metadata
                                                </label>
                                            </div>
                                            <div class=" custom-control custom-radio mb-3">
                                                <input class="custom-control-input perananCheckbox kategoriCheck" id="pengesahMetadata"
                                                    name="perananSelect" type="checkbox" value="3" />
                                                <label class="custom-control-label" for="pengesahMetadata">
                                                    Pengesah Metadata
                                                </label>
                                            </div>
                                            <div class="custom-control custom-radio mb-2">
                                                <input class="custom-control-input perananCheckbox" id="perananSelectbogey" name="perananSelectbogey" type="checkbox" value="2" />
                                                <label class="custom-control-label" for="perananSelectbogey">
                                                    Pemohon Data
                                                </label>

                                                <div id="divsecond" class="divsecond">
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input class="custom-control-input" id="2_options_g2c" name="2_options" type="radio" value="2_g2c" disabled>
                                                        <label class="custom-control-label" for="2_options_g2c">
                                                            G2C
                                                        </label>
                                                        <span class="ml-3" tooltip="Awam"tooltipPlacement="right"><i class="far fa-question-circle"></i></span>
                                                    </div>

                                                    <div class="custom-control custom-radio mb-3">
                                                        <input class="custom-control-input" id="2_options_g2g" name="2_options" type="radio" value="2_g2g" />
                                                        <label class="custom-control-label" for="2_options_g2g">
                                                            G2G
                                                        </label>
                                                        <span class="ml-3" tooltip="Agensi, Badan Berkanun, GLC" tooltipPlacement="right"><i class="far fa-question-circle"></i></span>
                                                        <div class="ml-3 mt-2 2_g2g_options">
                                                            <div class="custom-control custom-radio mb-3">
                                                                <input class="custom-control-input 2_options_g2g_sub kategoriCheck" id="agensiPersNeg" name="perananSelect" type="radio"
                                                                    value="Agensi Persekutuan/Agensi Negeri" />
                                                                <label class="custom-control-label" for="agensiPersNeg">
                                                                    Agensi Persekutuan/Agensi Negeri
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mb-3">
                                                                <input class="custom-control-input 2_options_g2g_sub kategoriCheck" id="badanBerkanun" name="perananSelect" type="radio"
                                                                    value="Badan Berkanun" />
                                                                <label class="custom-control-label" for="badanBerkanun">
                                                                    Badan Berkanun
                                                                </label>
                                                            </div>
                                                            <div class=" custom-control custom-radio mb-3">
                                                                <input class="custom-control-input 2_options_g2g_sub kategoriCheck" id="glc" name="perananSelect" type="radio" value="GLC" />
                                                                <label class="custom-control-label" for="glc">
                                                                    GLC
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class=" custom-control custom-radio mb-3 divG2e">
                                                        <input class="custom-control-input" id="2_options_g2e" name="2_options" type="radio" value="2_g2e" />
                                                        <label class="custom-control-label" for="2_options_g2e">
                                                            G2E
                                                        </label>
                                                        <span class="ml-3" tooltip="IPTA/IPTS" tooltipPlacement="right">
                                                            <i class="far fa-question-circle"></i>
                                                        </span>
                                                        <div class="ml-3 mt-2 2_g2e_options">
                                                            <div class=" custom-control custom-radio mb-3 2_g2e_iptaSyarahSelidik">
                                                                <input class="custom-control-input 2_options_g2e_sub kategoriCheck" id="iptaSyarahSelidik"
                                                                    name="perananSelect" type="radio"
                                                                    value="IPTA - Pensyarah/Penyelidik" />
                                                                <label class="custom-control-label" for="iptaSyarahSelidik">
                                                                    IPTA - Pensyarah/Penyelidik
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mb-3 2_g2e_iptaPelajar">
                                                                <input class="custom-control-input 2_options_g2e_sub kategoriCheck" id="iptaPelajar"
                                                                    name="perananSelect" type="radio" value="IPTA - Pelajar" />
                                                                <label class="custom-control-label" for="iptaPelajar">
                                                                    IPTA - Pelajar
                                                                </label>
                                                            </div>
                                                            <div
                                                                class=" custom-control custom-radio mb-3 2_g2e_iptsSyarahSelidik">
                                                                <input class="custom-control-input 2_options_g2e_sub kategoriCheck" id="iptsSyarahSelidik"
                                                                    name="perananSelect" type="radio"
                                                                    value="IPTS - Pensyarah/Penyelidik" />
                                                                <label class="custom-control-label" for="iptsSyarahSelidik">
                                                                    IPTS - Pensyarah/Penyelidik
                                                                </label>
                                                            </div>
                                                            <div class=" custom-control custom-radio mb-3 2_g2e_iptsPelajar">
                                                                <input class="custom-control-input 2_options_g2e_sub kategoriCheck" id="iptsPelajar"
                                                                    name="perananSelect" type="radio" value="IPTS - Pelajar" />
                                                                <label class="custom-control-label" for="iptsPelajar">
                                                                    IPTS - Pelajar
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //=================
                                    ?>
                                    <div id="form_registration">
                                        <div class="row mb-2 divNama">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-username">
                                                    Nama Penuh
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="input-username"
                                                    placeholder="Nama Penuh seperti dalam Kad Pengenalan" type="text"
                                                    name="name" />
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divNric">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-nric">
                                                    No Kad Pengenalan
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="input-nric"
                                                    placeholder="No Kad Pengenalan" type="text" name="nric" />
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divSektor">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-agensi">Sektor</label>
                                            </div>
                                            <div class="col-8">
                                                <select class=" form-control form-control-sm ml-3" id="sektor"
                                                    name="sektor">
                                                    <option value="" selected>Pilih...</option>
                                                    <option value="1">Kerajaan</option>
                                                    <option value="2">Swasta</option>
                                                    <option value="3">Institusi Awam</option>
                                                    <option value="4">Institusi Swasta</option>
                                                </select>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divAgensiOrganisasi">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4"
                                                    for="input-agensi">Agensi/Organisasi/Institusi</label>
                                            </div>
                                            <div class="col-8">
                                                <select name="agensi_organisasi" id="agensi_organisasi"
                                                    class="form-control form-control-sm ml-3">
                                                    <option value="" data-name="">Pilih...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divBahagian">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="bahagian">Bahagian</label>
                                            </div>
                                            <div class="col-8">
                                                <select name="bahagian" id="bahagian"
                                                    class="form-control form-control-sm ml-3">
                                                    <option value="">Pilih...</option>
                                                </select>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4 divEmel"
                                                    for="input-emel">E-mel</label>
                                            </div>
                                            <div class="col-8">
                                                <input id="email_daftar" class="form-control form-control-sm ml-3"
                                                    placeholder="Masukan E-mel anda" type="email" name="email" />
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divPhonePejabat">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-tpejabat">
                                                    Telefon Pejabat
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="input-tpejabat"
                                                    placeholder="Nombor Telefon Pejabat" type="text" name="phone_pejabat" />
                                            </div>
                                        </div>
                                        <div class="row mb-2 divPhoneBimbit">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-tbimbit">
                                                    Telefon Bimbit
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="input-tbimbit"
                                                    placeholder="Nombor Telefon Bimbit" type="text" name="phone_bimbit" />
                                            </div>
                                        </div>
                                        <div class="row mb-2 divAgensiOrganisasiAlamat">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-address">
                                                    Alamat
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <textarea class="form-control form-control-sm ml-3" id="input-address"
                                                    row="4" placeholder="Alamat" type="text"
                                                    name="alamat"></textarea>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-address">
                                                    Bandar
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <textarea class="form-control form-control-sm ml-3" id="input-city"
                                                    row="2" placeholder="Bandar" name="city"></textarea>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-address">
                                                    Poskod
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm ml-3" id="input-postcode"
                                                    placeholder="Poskod"name="postcode">
                                                <p class="error-message"><span></span></p>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-address">
                                                    Negeri
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <select name="state" class="form-control form-control-sm ml-3">
                                                    <option selected disabled>Pilih...</option>
                                                    <?php
                                                    if (count($states) > 0) {
                                                        foreach ($states as $st) {
                                                            ?><option value="<?php echo $st->name; ?>"
                                                        {{ $st->name == old('c2_contact_state') ? 'selected' : '' }}>
                                                        <?php echo $st->name; ?>
                                                    </option><?php
                                                        }
                                                    }                                                                                                                                                                   ?>
                                                </select>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-address">
                                                    Negara
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input type="hidden" id="country" name="country" value="1">
                                                <select name="countryBogey" class="form-control form-control-sm ml-3" disabled>
                                                    <option selected disabled>Pilih...</option>
                                                    <?php
                                                    if (count($countries) > 0) {
                                                        foreach ($countries as $country) {
                                                            ?><option value="<?php echo $country->id; ?>" selected
                                                            {{ $country->id == old('c2_contact_country') ? 'selected' : '' }}>
                                                            <?php echo $country->name; ?></option><?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divPeranan">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-peranan">
                                                    Peranan
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" id="peranan" name="peranan"
                                                    class="form-control form-control-sm ml-3 peranan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-2 divKategori">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="input-kategori">
                                                    Kategori
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input type="hidden" name="kategori" id="hiddenKategori">
                                                <input type="text" id="kategoriPemohonData" name="kategoriPemohonData" class="form-control form-control-sm ml-3">
<!--                                                <select name="kategoriPemohonData" id="kategoriPemohonData">
                                                    <option value="Agensi Persekutuan/Agensi Negeri">G2G - Agensi
                                                        Persekutuan/Agensi Negeri</option>
                                                    <option value="Badan Berkanun">G2G - Badan Berkanun</option>
                                                    <option value="GLC">G2G - GLC</option>
                                                    <option value="IPTA - Pensyarah/Penyelidik">G2E - IPTA -
                                                        Pensyarah/Penyelidik</option>
                                                    <option value="IPTA - Pelajar">G2E - Pelajar</option>
                                                    <option value="IPTS - Pensyarah/Penyelidik">G2E - Pensyarah/Penyelidik
                                                    </option>
                                                    <option value="IPTS - Pelajar">G2E - Pelajar</option>
                                                </select>-->
                                            </div>
                                        </div>
                                        <hr class="my-4" />

                                        <h6 class="heading-small text-muted mb-4"> Kata Laluan</h6>
                                        <i class="text-warning" style="font-size:11px;">* Kata laluan mestilah mempunyai
                                            sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil,
                                            nombor dan simbol.</i>
                                        <div class="pl-lg-4 mt-2">
                                            <div class="row mb-2">
                                                <div class="col-4">
                                                    <label class="form-control-label mr-4" for="password">
                                                        Kata Laluan
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input id="password_daftar" type="password" class="form-control"
                                                            name="password" required autocomplete="new-password"
                                                            placeholder="Password">
                                                        <span class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-eye" onclick="myFunction()"></i>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4">
                                                    <label class="form-control-label mr-4" for="input-password-sah">
                                                        Sahkan Kata Laluan
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password" placeholder="Password">
                                                        <span class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-eye" onclick="myFunction2()"></i>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //=================
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between1">
                            <button type="button" class="btn btn-default" id='btn_batal'>Kembali</button>
                            <button type="button" class="btn btn-dark btn_isi_borang" id="btn_isi_borang">Isi
                                Borang</button>
                            <button type="button" class="btn btn-default" id="btn_daftar">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $(document).on("click", ".btn_login", function() {
        var captcha = $('#g-recaptcha-response').val();
        <?php
        if($_SERVER['HTTP_HOST'] == "localhost:8888"){
            ?>
            $("#formLogin").submit();
            <?php
        }else{
            ?>
            if (captcha == "") {
                alert("Sila lengkapkan captcha");
            } else {
                $("#formLogin").submit();
            }
            <?php
        }
        ?>
        });

        $(document).on("click", "#btn_hantar2", function() {
            $('#modal-daftar-jenis-pengguna').modal('hide');
            $('#modal-daftar-pengguna').modal('hide');
            $('#modal-hantar').modal('show');
            $('#btn_isi_borang').hide();
        });

        $(document).on("click", "#hrefDaftar", function() {
            $('#div_pilihan_peranan').show();
            $('#form_registration').hide();
            $('#btn_isi_borang').hide();
            $('#btn_daftar').hide();
            $('#btn_batal').hide();
        });

        $('#sektor').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi_by_sektor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "sektor": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                $('#agensi_organisasi').html('');
                $('#agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos, function(index, value) {
                    $('#agensi_organisasi').append('<option value="' + value.id + '" data-name="' +
                        value.name + '">' + value.name + '</option>');
                });

                $('#bahagian').html('');
                $('#bahagian').append('<option value="">Pilih...</option>');
            });
        });
        $('#agensi_organisasi').change(function() {
            var sel = $('input[name="perananSelect"]:checked').val();
            if(sel == "3" || sel == "4"){
                var agensi_organisasi_name = $(this).find(':selected').attr('data-name');

                $.ajax({
                    method: "POST",
                    url: "{{ url('get_bahagian') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "agensi_organisasi_name": agensi_organisasi_name,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    if (data.error == '1') {
                        alert(data.msg);
                    } else {
                        $('#bahagian').html('');
                        $('#bahagian').append('<option value="">Pilih...</option>');
                        $.each(data.bhgns, function(index, value) {
                            $('#bahagian').append('<option value="' + value.bahagian + '">' + value
                                .bahagian + '</option>');
                        });
                    }
                });
            }
        });

        $(document).on('click','.perananCheckbox',function(){
            var clickedElement = $(this);

            //show options when selecting Pemohon Data role
            if($(this).prop('checked') == true && $(this).val() == "2"){
                $(".divsecond").show();
            }else if($(this).prop('checked') == false && $(this).val() == "2"){
                $(".divsecond").hide();
            }

            //check if at least one peranan is selected before showing the Isi Borang button
            var hasChecked = 1;
            $('.perananCheckbox').each(function(i, obj) {
                if($(this).prop('checked') == true){
                    hasChecked *= 0;
                }
            });
            if(hasChecked == 0){
                $('.btn_isi_borang').show();
            }else{
                $('.btn_isi_borang').hide();
            }

            //pre-set form peranan input based on role selected
            var selectedPeranan = "";
            if(clickedElement.prop('checked') == true){
                $('.perananCheckbox').each(function() {
                    if ($(this).prop('checked') == true && $(this).val() == "3") {
                        selectedPeranan = selectedPeranan + 'Pengesah Metadata,';
                    } else if ($(this).prop('checked') == true && $(this).val() == "4") {
                        selectedPeranan = selectedPeranan + 'Penerbit Metadata,';
                    } else if($(this).prop('checked') == true){
                        selectedPeranan = selectedPeranan + 'Pemohon Data,';
                    }
                });
            }

            //select G2G if Pemohon Data and Penerbit/Pengesah Metadata are selected together
            if(selectedPeranan.replace(/,\s*$/, "").includes('Pemohon') && selectedPeranan.replace(/,\s*$/, "").includes('Metadata')){
                $('#2_options_g2g').attr('checked', true).trigger('click');
                $('.2_options_g2e_sub').each(function() {
                    $(this).prop('checked', false);
                });
                alert('Sekiranya anda memilih peranan Penerbit/Pengesah Metadata dan ingin mendaftar sebagai Pemohon Data juga, kategori yang boleh dipilih hanya G2G sahaja.');
                $('.divG2e').hide();
            }else{
                $('.divG2e').show();
            }
        });

        $(document).on('click','.2_options_g2g_sub',function(){
            $("#2_options_g2g").prop('checked',true);
            $('.2_options_g2e_sub').each(function() {
                $(this).prop('checked',false);
            });
        });
        $(document).on('click','.2_options_g2e_sub',function(){
            $("#2_options_g2e").prop('checked',true);
            $(".2_options_g2g_sub").each(function() {
                $(this).prop('checked',false);
            });

            //pre-set form peranan input based on role selected
            var selectedPeranan = "";
            $('.perananCheckbox').each(function() {
                if ($(this).prop('checked') == true && $(this).val() == "3") {
                    selectedPeranan = selectedPeranan + 'Pengesah Metadata,';
                } else if ($(this).prop('checked') == true && $(this).val() == "4") {
                    selectedPeranan = selectedPeranan + 'Penerbit Metadata,';
                } else if($(this).prop('checked') == true){
                    selectedPeranan = selectedPeranan + 'Pemohon Data,';
                }
            });

            //deselect Penerbit/Pengesah Metadata if G2E and Penerbit/Pengesah Metadata are selected together
            if(selectedPeranan.replace(/,\s*$/, "").includes('Pemohon') && selectedPeranan.replace(/,\s*$/, "").includes('Metadata')){
                $('#pengesahMetadata').prop('checked',false);
                $('#penerbitMetadata').prop('checked',false);
                alert('Sekiranya anda memilih peranan Penerbit/Pengesah Metadata dan ingin mendaftar sebagai Pemohon Data juga, kategori yang boleh dipilih hanya G2G sahaja.');
            }
        });

        $(document).on('click','#2_options_g2g',function(){
            $(".2_options_g2e_sub").each(function() {
                $(this).prop('checked',false);
            });
        });
        $(document).on('click','#2_options_g2e',function(){
            $(".2_options_g2g_sub").each(function() {
                $(this).prop('checked',false);
            });
        });

        //show kategori only for pemohon data. also show bahagian for penerbit and pengesah only
        $('.kategoriCheck').click(function() {
            var hasPemohonData = 1;
            var hasPenerbitPengesah = 1;
            $('.kategoriCheck').each(function(i, obj) {
                if(($(this).prop('checked') == true && $(this).val() == "3") || ($(this).prop('checked') == true && $(this).val() == "4")){
                    hasPenerbitPengesah *= 0;
                }else if(($(this).prop('checked') == true && $(this).val() != "3") || ($(this).prop('checked') == true && $(this).val() != "4")){
                    hasPemohonData *= 0;
                    $("#hiddenKategori").val($(this).val());
                    $("#kategoriPemohonData").val($(this).val()).attr('disabled', true).show();
                }
            });
            if(hasPemohonData == 0){
                $(".divKategori").show();
                hasPemohonData = 1;
            }else{
                $(".divKategori").hide();
                $("#hiddenKategori").val('');
                $("#kategoriPemohonData").val('').attr('disabled', true).hide();
            }
            if(hasPenerbitPengesah == 0){
                $(".divBahagian").show();
                hasPenerbitPengesah = 1;
            }else{
                $(".divBahagian").hide();
                $('#bahagian').html('');
                $('#bahagian').append('<option value="">Pilih...</option>');
            }
        });

        $(document).on("click", "#btn_isi_borang", function() {
            //pre-set form peranan input based on role selected
            var selectedPeranan = "";
            $('.perananCheckbox').each(function() {
                if ($(this).prop('checked') == true && $(this).val() == "3") {
                    selectedPeranan = selectedPeranan + 'Pengesah Metadata,';
                } else if ($(this).prop('checked') == true && $(this).val() == "4") {
                    selectedPeranan = selectedPeranan + 'Penerbit Metadata,';
                } else if($(this).prop('checked') == true){
                    selectedPeranan = selectedPeranan + 'Pemohon Data,';
                }
            });
            $("#peranan").val(selectedPeranan.replace(/,\s*$/, ""));

            //show or hide role-specific inputs
            if(selectedPeranan.replace(/,\s*$/, "").includes('Metadata')){
                $('.divBahagian').show();
            }else{
                $('.divBahagian').hide();
            }
            if(selectedPeranan.replace(/,\s*$/, "").includes('Pemohon')){
                $('.divPhoneBimbit').show();
            }else{
                $('.divPhoneBimbit').hide();
            }

            $('#div_pilihan_peranan').hide();
            $('#form_registration').show();
            $('#btn_daftar').show();
            $('#btn_batal').show();
            $(this).hide();
        });
        $(document).on("click", "#btn_batal", function() {
            $('#div_pilihan_peranan').show();
            $('#form_registration').hide();
            $('#btn_daftar').hide();
            $('#btn_batal').hide();
            $('#formRegisterUser').trigger("reset");
            $('#2_options_g2g').prop('checked',false);
            $('#divsecond').hide();
            $(".divKategori").hide();
            $("#hiddenKategori").val('');
            $("#kategoriPemohonData").val('').attr('disabled', true).hide();
        });

        $(document).on("click", "#btn_daftar", function() {
            var nric = $("#input-nric").val();
            var tpejabat = $("#input-tpejabat").val();
            var password_daftar = $("#password_daftar").val();
            var password_confirm = $("#password-confirm").val();
            var email_daftar = $("#email_daftar").val();
            var msg = "";
            if (nric.length < 12) {
                msg = msg + "Nombor NRIC tidak lengkap\r\n\r\n";
            }
            if (!checkPassword(password_daftar)) {
                msg = msg +
                    "Kata laluan mesti mempunyai sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil, nombor dan simbol.\r\n\r\n";
            }
            if (!isEmail(email_daftar)) {
                msg = msg + "Emel tidak sah\r\n\r\n";
            }
            if (password_daftar != password_confirm) {
                msg = msg + "Kata laluan yang dimasukkan berbeza dengan kata laluan yang disahkan\r\n\r\n";
            }
            if (msg.length > 0) {
                alert(msg);
            } else {
                $("#formRegisterUser").submit();
            }
        });

        function checkPassword(str) {
            // at least one number, one lowercase and one uppercase letter, at least 12 characters
            var regex = /^(?=^.{12,40}$)(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z])(?!^.*\n).*$/;
            return regex.test(str);
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        $(document).ready(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('getKelasKongsis') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                jQuery.each(data, function(key, val) {
                    if (val.category == "G2C" && val.subcategory == "Awam" && val.status == "1") {
                        $('#2_g2c').prop('disabled', false);
                    } else if (val.category == "G2C" && val.subcategory == "Awam" && val.status ==
                        "0") {
                        $('#2_g2c').prop('disabled', true);
                    }

                    if (val.category == "G2G" && val.subcategory == "Badan Berkanun" && val
                        .status == "1") {
                        $('#badanBerkanun').prop('disabled', false);
                    } else if (val.category == "G2G" && val.subcategory == "Badan Berkanun" && val
                        .status == "0") {
                        $('#badanBerkanun').prop('disabled', true);
                    }
                    if (val.category == "G2G" && val.subcategory ==
                        "Agensi Persekutuan/Agensi Negeri" && val.status == "1") {
                        $('#agensiPersNeg').prop('disabled', false);
                    } else if (val.category == "G2G" && val.subcategory ==
                        "Agensi Persekutuan/Agensi Negeri" && val.status == "0") {
                        $('#agensiPersNeg').prop('disabled', true);
                    }
                    if (val.category == "G2G" && val.subcategory == "GLC" && val.status == "1") {
                        $('#glc').prop('disabled', false);
                    } else if (val.category == "G2G" && val.subcategory == "GLC" && val.status ==
                        "0") {
                        $('#glc').prop('disabled', true);
                    }

                    if (val.category == "G2E" && val.subcategory == "IPTA - Pensyarah/Penyelidik" &&
                        val.status == "1") {
                        $('#iptaSyarahSelidik').prop('disabled', false);
                    } else if (val.category == "G2E" && val.subcategory ==
                        "IPTA - Pensyarah/Penyelidik" && val.status == "0") {
                        $('#iptaSyarahSelidik').prop('disabled', true);
                    }
                    if (val.category == "G2E" && val.subcategory == "IPTA - Pelajar" && val
                        .status == "1") {
                        $('#iptaPelajar').prop('disabled', false);
                    } else if (val.category == "G2E" && val.subcategory == "IPTA - Pelajar" && val
                        .status == "0") {
                        $('#iptaPelajar').prop('disabled', true);
                    }
                    if (val.category == "G2E" && val.subcategory == "IPTS - Pensyarah/Penyelidik" &&
                        val.status == "1") {
                        $('#iptsSyarahSelidik').prop('disabled', false);
                    } else if (val.category == "G2E" && val.subcategory ==
                        "IPTS - Pensyarah/Penyelidik" && val.status == "0") {
                        $('#iptsSyarahSelidik').prop('disabled', true);
                    }
                    if (val.category == "G2E" && val.subcategory == "IPTS - Pelajar" && val
                        .status == "1") {
                        $('#iptsPelajar').prop('disabled', false);
                    } else if (val.category == "G2E" && val.subcategory == "IPTS - Pelajar" && val
                        .status == "0") {
                        $('#iptsPelajar').prop('disabled', true);
                    }
                });
            });

            var msg = "";
            <?php
            if($errors->any()){
                foreach($errors->all() as $error){
                    ?>msg = msg + "{{ $error }}\n\n";<?php
                }
                ?>alert(msg);<?php
            }
            ?>
            <?php
            if(Session::has('message')){
                ?>alert("{{ Session::get('message') }}");<?php
            }
            ?>
            $("#input-nric,#input-tpejabat,#input-tbimbit").inputFilter(function(value) {
                return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 999999999999);
            });

            $('#form_registration').hide();
            $('#btn_isi_borang').hide();
            $('#btn_daftar').hide();
            $('#btn_batal').hide();
            $("#divsecond").hide();
            $(".divKategori").hide();

            $(document).on("click", "#btn_backdoor", function() {
                $("#form_backdoor").submit();
            });

            <?php
            if (null !== Session::get('msg') && !is_null(Session::get('msg')) && 'NULL' != Session::get('msg')) {
                ?>alert("<?php echo Session::get('msg'); ?>");
                <?php
            }
            ?>
        });

        function myFunction() {
            var x = document.getElementById("password_daftar");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("password-confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction3() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));
    </script>

@stop
