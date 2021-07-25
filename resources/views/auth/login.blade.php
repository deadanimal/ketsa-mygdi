@extends('layouts.app_afiq')

@section('content')

<div class="content bgland p-5">
    <div class="container-fluid" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 p-4 px-5">
                <div class="row img-center">
                    <img src="{{ url('assetsangular/img/logo/mygeo-logo.png') }}" alt="MyGeo Explorer" class="img-center" style="width: 80%; height: auto;">
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
                                <a class="text-primary" href="#" id="hrefDaftar" data-backdrop="false" data-toggle="modal" data-target="#modal-daftar-jenis-pengguna">Pengguna baru? Daftar sekarang.</a>
                            </div>
                            <form method="POST" action="{{ url('loginf') }}" id="formLogin">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative mb-3">
                                        <input id="id_pengguna" type="text" class="form-control @error('emailf') is-invalid @enderror" name="emailf" value="{{ old('emailf') }}" required autocomplete="emailf" autofocus placeholder="ID Pengguna">
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
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata Laluan">
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
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group">
                                            <div class="g-recaptcha" data-sitekey="6LdvEbUbAAAAAEeHGogajujfQIS-Rp98PxrU5Frz"></div>
                                        </div>
                                    </div>
                                    <div class="validation-errors">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-6 order-2">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-warning float-right btn_login">Log Masuk</button>
                                        </div>
                                    </div>
                                    <div class="col-6 order-1">
                                        <a class="text-danger" href="{{ route('password.request') }}">Lupa kata laluan?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>

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
                                                    <input class="custom-control-input" id="penerbitMetadata" name="perananSelect" type="radio" value="4" />
                                                    <label class="custom-control-label" for="penerbitMetadata">
                                                        Penerbit Metadata
                                                    </label>
                                                </div>
                                                <div class=" custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="pengesahMetadata" name="perananSelect" type="radio" value="3" />
                                                    <label class="custom-control-label" for="pengesahMetadata">
                                                        Pengesah Metadata
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input class="custom-control-input" id="pemohonData" name="perananSelect" type="radio" value="2" />
                                                    <label class="custom-control-label" for="pemohonData">
                                                        Pemohon Data
                                                    </label>

                                                    <div id="divsecond" class="divsecond">
                                                        <div class="custom-control custom-radio mb-3 2_g2c">
                                                            <input class="custom-control-input" id="2_g2c" name="perananSelect" type="radio" value="2_g2c">
                                                            <label class="custom-control-label" for="2_g2c">
                                                                G2C
                                                            </label>
                                                            <span class="ml-3" tooltip="Awam" tooltipPlacement="right">
                                                                <i class="far fa-question-circle"></i>
                                                            </span>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3 2_g2g">
                                                            <input class="custom-control-input" id="2_g2g" name="perananSelect" type="radio" value="2_g2g" />
                                                            <label class="custom-control-label" for="2_g2g">
                                                                G2G
                                                            </label>
                                                            <span class="ml-3" tooltip="Agensi, Badan Berkanun, GLC" tooltipPlacement="right">
                                                                <i class="far fa-question-circle"></i>
                                                            </span>
                                                            <div class="ml-3 mt-2">
                                                                <div class="custom-control custom-radio mb-3 2_g2g_agensiPersNeg">
                                                                    <input class="custom-control-input" id="agensiPersNeg" name="perananSelect" type="radio" value="2_g2g_agensiPersNeg" />
                                                                    <label class="custom-control-label" for="agensiPersNeg">
                                                                        Agensi Persekutuan/Agensi Negeri
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-3 2_g2g_badanBerkanun">
                                                                    <input class="custom-control-input" id="badanBerkanun" name="perananSelect" type="radio" value="2_g2g_badanBerkanun" />
                                                                    <label class="custom-control-label" for="badanBerkanun">
                                                                        Badan Berkanun
                                                                    </label>
                                                                </div>
                                                                <div class=" custom-control custom-radio mb-3 2_glc">
                                                                    <input class="custom-control-input" id="glc" name="perananSelect" type="radio" value="2_glc" />
                                                                    <label class="custom-control-label" for="glc">
                                                                        GLC
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class=" custom-control custom-radio mb-3 2_g2e">
                                                        <input class="custom-control-input" id="2_g2e" name="perananSelect" type="radio" value="2_g2e" />
                                                        <label class="custom-control-label" for="2_g2e">
                                                            G2E
                                                        </label>
                                                        <span class="ml-3" tooltip="IPTA/IPTS" tooltipPlacement="right">
                                                            <i class="far fa-question-circle"></i>
                                                        </span>
                                                        <div class="ml-3 mt-2 divthird" id="divthird">
                                                            <div class=" custom-control custom-radio mb-3 2_g2e_iptaSyarahSelidik">
                                                                <input class="custom-control-input" id="iptaSyarahSelidik" name="perananSelect" type="radio" value="2_g2e_iptaSyarahSelidik" />
                                                                <label class="custom-control-label" for="iptaSyarahSelidik">
                                                                    IPTA - Pensyarah/Penyelidik
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mb-3 2_g2e_iptaPelajar">
                                                                <input class="custom-control-input" id="iptaPelajar" name="perananSelect" type="radio" value="2_g2e_iptaPelajar" />
                                                                <label class="custom-control-label" for="iptaPelajar">
                                                                    IPTA - Pelajar
                                                                </label>
                                                            </div>
                                                            <div class=" custom-control custom-radio mb-3 2_g2e_iptsSyarahSelidik">
                                                                <input class="custom-control-input" id="iptsSyarahSelidik" name="perananSelect" type="radio" value="2_g2e_iptsSyarahSelidik" />
                                                                <label class="custom-control-label" for="iptsSyarahSelidik">
                                                                    IPTS - Pensyarah/Penyelidik
                                                                </label>
                                                            </div>
                                                            <div class=" custom-control custom-radio mb-3 2_g2e_iptsPelajar">
                                                                <input class="custom-control-input" id="iptsPelajar" name="perananSelect" type="radio" value="2_g2e_iptsPelajar" />
                                                                <label class="custom-control-label" for="iptsPelajar">
                                                                    IPTS - Pelajar
                                                                </label>
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
                                                    <input class="form-control form-control-sm ml-3" id="input-username" placeholder="Nama Penuh seperti dalam Kad Pengenalan" type="text" name="name" />
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divNric">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-nric">
                                                        No NRIC
                                                    </label>
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control form-control-sm ml-3" id="input-nric" placeholder="No Kad Pengenalan" type="text" name="nric" />
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divAgensiOrganisasi">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-agensi">Agensi/Organisasi/Institusi</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="agensi_organisasi" id="agensi_organisasi" class="form-control form-control-sm ml-3"></select>
                                                    
                                                </div>
                                            </div>
                                            <div class="row mb-2 divInstitusi">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-agensi">Institusi</label>
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control form-control-sm ml-3" placeholder="Nama Institusi" type="text" name="institusi" />
                                                </div>
                                            </div>
                                            <div class="row mb-2 divBahagian">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="bahagian">Bahagian</label>
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control form-control-sm ml-3" id="bahagian" placeholder="Bahagian" type="text" name="bahagian" />
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divSektor">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-agensi">Sektor</label>
                                                </div>
                                                <div class="col-8">
                                                    <select class=" form-control form-control-sm ml-3" id="sektor" name="sektor">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="1">Kerajaan</option>
                                                        <option value="2">Swasta</option>
                                                    </select>
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divEmel">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-emel">Emel</label>
                                                </div>
                                                <div class="col-6">
                                                    <input id="email_daftar" class="form-control form-control-sm ml-3" placeholder="Masukan E-mel anda" type="email" name="email" />
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divEmelRasmi">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-emel">Emel Rasmi</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control form-control-sm ml-3" placeholder="Masukan E-mel anda" type="text" name="email2" />
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divPhonePejabat">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-tpejabat">
                                                        Telefon Pejabat
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control form-control-sm ml-3" id="input-tpejabat" placeholder="Nombor Telefon Pejabat" type="text" name="phone_pejabat" />
                                                </div>
                                            </div>
                                            <div class="row mb-2 divPeranan">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-peranan">
                                                        Peranan
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" id="peranan" name="peranan" class="form-control form-control-sm ml-3 peranan" readonly>
                                                    <!-- <select name="peranan" class="form-control form-control-sm ml-3 peranan" readonly>
                                                <option value="Penerbit Metadata">Penerbit Metadata</option>
                                                <option value="Pengesah Metadata">Pengesah Metadata</option>
                                                <option value="Pemohon Data">Pemohon Data</option>
                                            </select> -->
                                                </div>
                                            </div>
                                            <div class="row mb-2 divAgensiOrganisasiAlamat">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-address">
                                                        Alamat
                                                    </label>
                                                </div>
                                                <div class="col-8">
                                                    <textarea class="form-control form-control-sm ml-3" id="input-address" row="4" placeholder="Alamat Agensi/Organisasi" type="text" name="alamat"></textarea>
                                                    <p class="error-message"><span></span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-2 divKategori">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4" for="input-kategori">
                                                        Kategori
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <select name="kategori" class="form-control form-control-sm ml-3 peranan">
                                                        <option value="1">Agensi Persekutuan/Agensi Negeri</option>
                                                        <option value="2">Badan Berkanun</option>
                                                        <option value="3">GLC</option>
                                                        <option value="4">IPTA - Pensyarah/Penyelidik</option>
                                                        <option value="5">IPTA - Pelajar</option>
                                                        <option value="6">IPTS - Pensyarah/Penyelidik</option>
                                                        <option value="7">IPTS - Pelajar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr class="my-4" />

                                            <h6 class="heading-small text-muted mb-4"> Kata Laluan</h6>
                                            <p style="color:red;font-size:11px;">* Kata laluan mestilah mempunyai sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil, nombor dan simbol.</p>
                                            <div class="pl-lg-4">
                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <label class="form-control-label mr-4" for="password">
                                                            Kata Laluan
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <input id="password_daftar" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
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
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
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
                                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>-->
                                <button type="button" class="btn btn-dark btn_isi_borang" id="btn_isi_borang">Isi Borang</button>
                                <button type="button" class="btn btn-default" id="btn_daftar">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
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
            if(captcha == ""){
                alert("Sila lengkapkan captcha");
            }else{
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
    });

    $('input:radio[name="perananSelect"]').change(function() {
        var per = $(this).val();
        
        //form elements to hide or show
        if (per == "3" || per == "4") {
            $(".2_g2c").hide();
            $(".2_g2g").hide();
            $(".2_g2e").hide();
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divBahagian").show();
            $(".divSektor").show();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divInstitusi").hide();
            $(".divKategori").hide();
            $('.btn_isi_borang').show();
            $(".divsecond").hide();
            $(".divthird").hide();
        } else if (per == "2") {
            $(".2_g2c").show();
            $(".2_g2g").show();
            $(".2_g2e").show();
            $(".2_g2g_agensiPersNeg").hide();
            $(".2_g2g_badanBerkanun").hide();
            $(".2_glc").hide();
            $(".2_g2e_iptaSyarahSelidik").hide();
            $(".2_g2e_iptaPelajar").hide();
            $(".2_g2e_iptsSyarahSelidik").hide();
            $(".2_g2e_iptsPelajar").hide();
            $(".2_g2g").show();
            $(".2_g2e").show();
            $(".divNama").hide();
            $(".divNric").hide();
            $(".divInstitusi").hide();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").hide();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").hide();
            $(".divPeranan").hide();
            $(".divKategori").hide();
            $(".divdaftar").show();
            $(".divsecond").show();
            $(".divthird").show();
        } else if (per == "2_g2c") {
            $(".2_g2c").show();
            $(".2_g2g").show();
            $(".2_g2e").show();
            $(".2_g2g_agensiPersNeg").hide();
            $(".2_g2g_badanBerkanun").hide();
            $(".2_glc").hide();
            $(".2_g2e_iptaSyarahSelidik").hide();
            $(".2_g2e_iptaPelajar").hide();
            $(".2_g2e_iptsSyarahSelidik").hide();
            $(".2_g2e_iptsPelajar").hide();
            $(".2_g2g").show();
            $(".2_g2e").show();
            $(".divNama").hide();
            $(".divNric").hide();
            $(".divInstitusi").hide();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").hide();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").hide();
            $(".divPeranan").hide();
            $(".divKategori").hide();
            $(".btn_isi_borang").show();
            $(".divsecond").show();
            $(".divthird").show();
        } else if (per == "2_g2g_agensiPersNeg") {
            $(".2_g2c").hide();
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").show();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $(".divAgensiOrganisasiAlamat").hide();
            $(".divInstitusi").hide();
        } else if (per == "2_g2g_badanBerkanun") {
            $(".2_g2c").hide();
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").show();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $(".divInstitusi").hide();
        } else if (per == "2_glc") {
            $(".2_g2c").hide();
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").show();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $(".divInstitusi").hide();
        } else if (per == "2_g2e_iptaSyarahSelidik") {
            $(".2_g2c").hide();
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
        } else if (per == "2_g2e_iptaPelajar") {
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
        } else if (per == "2_g2e_iptsSyarahSelidik") {
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
        } else if (per == "2_g2e_iptsPelajar") {
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divKategori").show();
        } else if (per == "2_g2g") {
            $(".2_g2c").show();
            $(".2_g2g_agensiPersNeg").show();
            $(".2_g2g_badanBerkanun").show();
            $(".2_glc").show();
            $(".2_g2e_iptaSyarahSelidik").hide();
            $(".2_g2e_iptaPelajar").hide();
            $(".2_g2e_iptsSyarahSelidik").hide();
            $(".2_g2e_iptsPelajar").hide();
            $(".2_g2g").show();
            $(".2_g2e").show();
            $(".divNama").hide();
            $(".divNric").hide();
            $(".divInstitusi").hide();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").hide();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").hide();
            $(".divPeranan").hide();
            $(".divKategori").hide();
            $(".divdaftar").show();
            // $(".divsecond").hide();
            // $(".divthird").hide();
        } else if (per == "2_g2e") {
            $(".2_g2c").show();
            $(".2_g2g_agensiPersNeg").hide();
            $(".2_g2g_badanBerkanun").hide();
            $(".2_glc").hide();
            $(".2_g2e_iptaSyarahSelidik").show();
            $(".2_g2e_iptaPelajar").show();
            $(".2_g2e_iptsSyarahSelidik").show();
            $(".2_g2e_iptsPelajar").show();
            $(".2_g2g").show();
            $(".2_g2e").show();
            $(".divNama").hide();
            $(".divNric").hide();
            $(".divInstitusi").hide();
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").hide();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").hide();
            $(".divPhonePejabat").hide();
            $(".divPeranan").hide();
            $(".divKategori").hide();
            $(".divdaftar").show();
            // $(".divsecond").hide();
            // $(".divthird").hide();
        }

        //pre-set form values based on role selected
        if (per == "3") {
            $("#peranan").val('Pengesah Metadata');
        } else if (per == "4") {
            $("#peranan").val('Penerbit Metadata');
        } else {
            $("#peranan").val('Pemohon Data');
        }
    });

    $(document).on("click", "#btn_isi_borang", function() {
        $('#div_pilihan_peranan').hide();
        $('#form_registration').show();
        $('#btn_daftar').show();
        $(this).hide();
    });
    
    $(document).on("click","#btn_daftar",function(){
        var nric = $("#input-nric").val();
        var tpejabat = $("#input-tpejabat").val();
        var password_daftar = $("#password_daftar").val();
        var password_confirm = $("#password-confirm").val();
        var email_daftar = $("#email_daftar").val();
        var msg = "";
        if(nric.length < 12){
            msg = msg + "Nombor NRIC tidak lengkap\r\n\r\n";
        }
        if(!checkPassword(password_daftar)){
            msg = msg + "Kata laluan mesti mempunyai sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil, nombor dan simbol.\r\n\r\n";
        }
        if(!isEmail(email_daftar)){
            msg = msg + "Emel tidak sah\r\n\r\n";
        }
        if(password_daftar != password_confirm){
            msg = msg + "Kata laluan yang dimasukkan berbeza dengan kata laluan yang disahkan\r\n\r\n";
        }
        if(msg.length > 0){
            alert(msg);
        }else{
            $("#formRegisterUser").submit();
        }
    });
    
    function checkPassword(str){
        // at least one number, one lowercase and one uppercase letter, at least 12 characters
        var regex = /^(?=^.{12,40}$)(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z])(?!^.*\n).*$/;
        return regex.test(str);
    }
    
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $(document).ready(function() {
        <?php
        if(Session::has('message')){
            ?>alert("{{ Session::get('message') }}");<?php
        }
        ?>
        $("#input-nric,#input-tpejabat").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 999999999999);
        });
  
        //ajax get roles
        $.ajax({
            method: "POST",
            url: "get_roles",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
        }).done(function(data) {
            data.forEach(function(the_var) {
                $("#peranan").append("<option value='" + the_var.id + "'>" + the_var.name + "</option>");
            });
        });
        
        //ajax get agensi/organisasi
        $.ajax({
            method: "POST",
            url: "get_agensiOrganisasi",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
        }).done(function(data) {
            data.forEach(function(the_var) {
                $("#agensi_organisasi").append("<option value='" + the_var.name + "'>" + the_var.name + "</option>");
            });
        });

        $('#form_registration').hide();
        $('#btn_isi_borang').hide();
        $('#btn_daftar').hide();
        $("#divsecond").hide();
        $("#divthird").hide();
        $(".2_g2e").hide();


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
