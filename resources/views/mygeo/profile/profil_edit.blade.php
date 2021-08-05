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
                                    <h3 class="mb-0">Kemaskini Profil Pengguna</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ url('mygeo_profil') }}" class="btn btn-danger btn-sm text-white btn-icon btn-3">
                                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                                        <span class="btn-inner--text">Balik</span>
                                    </a>
                                    <button type="button" class="btn btn-success btn-sm text-white btn-icon btn-3 btn_simpan">
                                        <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
                                        <span class="btn-inner--text">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_profil')}}" id="form_kemaskini_profil">
                                @csrf
                                <h6 class="heading-small text-muted mt-0 mb-4">Maklumat Pengguna</h6>
                                <div class="pl-lg-4 pb-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="uname">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <?php
                                            if($user->editable == "1"){
                                                ?><input type="text" name="uname" id="uname" class="form-control form-control-sm ml-3" value="{{ $user->name }}"><?php
                                            }else{
                                                ?>
                                                <p>{{ $user->name }}</p>
                                                <input type="hidden" name="uname" id="uname" value="{{ $user->name }}">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="nric">
                                                Kad Pengenalan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <?php
                                            if($user->editable == "1"){
                                                ?><input type = "number" maxlength = "12" name="nric" id="nric" class="form-control form-control-sm ml-3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ $user->nric }}"><?php
                                            }else{
                                                ?>
                                                <p>{{ $user->nric }}</p>
                                                <input type="hidden" name="nric" id="nric" value="{{ $user->nric }}">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="agensi_organisasi">
                                                Agensi / Organisasi
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select id="agensi_organisasi" name="agensi_organisasi" class="form-control form-control-sm ml-3">
                                                <option value="">Pilih...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="bahagian">
                                                Bahagian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="bahagian" id="bahagian" type="text" value="{{ $user->bahagian }}" />
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
                                        <?php
                                        if(Auth::user()->hasRole('Pemohon Data')){
                                            ?>
                                            <div class="col-2">
                                                <label class="form-control-label mr-4" for="phone_bimbit">
                                                    Telefon Bimbit
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-sm ml-3" name="phone_bimbit" type="text" value="{{ $user->phone_bimbit }}" />
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
                                            $roles = Auth::user()->getRoleNames();
                                            if(!empty($roles) && count($roles) > 0){
                                                foreach($roles as $r){
                                                    ?><p>{{ $r }}</p><?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr class="my-4">
                            <h6 class="heading-small text-muted mt-0 mb-4">Gambar Profil</h6>
                            <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_gambarprofil')}}" id="form_kemaskini_gambarprofil" enctype="multipart/form-data">
                                @csrf
                                <div class="pl-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <?php
                                            if(auth::user()->gambar_profil != ""){
                                                ?>
                                                <image id="profileImage" alt="Image placeholder" src="{{ asset('storage/'.auth::user()->gambar_profil) }}" style="border-radius: .95rem;max-width:250px;">
                                                <?php
                                            }else{
                                                ?>
                                                <image id="profileImage" alt="Image placeholder" src="./afiqadminmygeo_files/avatar.png" style="border-radius: .95rem;max-width:250px;">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-6 ml-4 ">
                                            <label class="form-control-label">Pilih Gambar</label>
                                            <div class="form-inline">
                                                <input id="imageUpload" type="file" name="gambar_profil" placeholder="Photo" class="form-control form-control-sm p-0">
                                                <button class="btn btn-sm btn-warning ml-3">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','.btn_simpan',function(){
        var nric = $("#nric").val();
        var agensi_organisasi = $("#agensi_organisasi").val();
        var bahagian = $("#bahagian").val();
        var msg = "";
        if(nric.length < 12){
            msg = msg + "Nombor NRIC tidak lengkap\r\n\r\n";
        }
        if(agensi_organisasi == ""){
            msg = msg + "Sila pilih agensi / organisasi\r\n\r\n";
        }
        if(bahagian == ""){
            msg = msg + "Sila pilih bahagian\r\n\r\n";
        }
        if(msg.length > 0){
            alert(msg);
        }else{
            $("#form_kemaskini_profil").submit();
        }
    });
    
    $.ajax({
        method: "POST",
        url: "get_agensiOrganisasi",
        data: {
            "_token": "{{ csrf_token() }}"
        },
        dataType: "json",
    }).done(function(data) {
        data.forEach(function(the_var) {
            var selected = "<?php echo $user->agensi_organisasi; ?>";
            if(selected != "" && selected == the_var.name){
                selected = "selected";
            }
            $("#agensi_organisasi").append("<option value='" + the_var.name + "' " + selected + ">" + the_var.name + "</option>");
        });
    });
});
</script>

@stop
