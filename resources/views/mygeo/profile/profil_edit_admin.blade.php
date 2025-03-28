@extends('layouts.app_mygeo_ketsa')

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
                                    <a href="{{ url('mygeo_senarai_pengguna_berdaftar') }}" class="btn btn-danger btn-sm text-white btn-icon btn-3">
                                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                                        <span class="btn-inner--text">Kembali</span>
                                    </a>
                                    <button type="button" class="btn btn-success btn-sm text-white btn-icon btn-3 btn_simpan">
                                        <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
                                        <span class="btn-inner--text">Simpan</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_admin')}}" id="form_kemaskini_profil">
                                @csrf
                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                <h6 class="heading-small text-muted mt-0 mb-4">Maklumat Pengguna</h6>
                                <div class="pl-lg-4 pb-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="uname">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" name="uname" id="uname" class="form-control form-control-sm ml-3" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="nric">
                                               No Kad Pengenalan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input type = "number" maxlength = "12" name="nric" id="nric" class="form-control form-control-sm ml-3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ $user->nric }}">
                                        </div>
                                    </div>
                                    <div class="row mb-2 divSektor">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="sektor">
                                                Sektor
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control form-control-sm ml-3" name="sektor" id="sektor">
                                                <option value="">Pilih...</option>
                                                <option value="1">Kerajaan</option>
                                                <option value="2">Swasta</option>
                                                <option value="3">Institusi Awam</option>
                                                <option value="4">Institusi Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="agensi_organisasi">
                                                Agensi / Organisasi / Institusi
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select id="agensi_organisasi" name="agensi_organisasi" class="form-control form-control-sm ml-3">
                                                <option value="">Pilih...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divBahagian">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="bahagian">
                                                Bahagian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select id="bahagian" name="bahagian" class="form-control form-control-sm ml-3">
                                                <option value="">Pilih...</option>
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
                                            <input class="form-control form-control-sm ml-3" id="email" name="email" type="email" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_pejabat">
                                                Telefon Pejabat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="phone_pejabat" type="number" value="{{ $user->phone_pejabat }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_bimbit">
                                                Telefon Bimbit
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="phone_bimbit" type="number" value="{{ $user->phone_bimbit }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_pejabat">
                                                Alamat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="alamat" type="text" value="{{ $user->alamat }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="postcode">
                                                Poskod
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="postcode" type="text" value="{{ $user->postcode }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="city">
                                                Bandar
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="city" type="text" value="{{ $user->city }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_pejabat">
                                                Negeri
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="state" class="form-control form-control-sm ml-3">
                                                <option selected disabled>Pilih...</option>
                                                <?php
                                                if (count($states) > 0) {
                                                    foreach ($states as $st) {
                                                        ?><option value="<?php echo $st->id; ?>"
                                                        {{ $user->state == $st->id ? 'selected' : '' }}>
                                                        <?php echo $st->name; ?>
                                                        </option><?php
                                                    }
                                                }                                                                                                                                                                   ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="phone_pejabat">
                                                Negara
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="country" class="form-control form-control-sm ml-3">
                                                <option selected disabled>Pilih...</option>
                                                <?php
                                                if (count($countries) > 0) {
                                                    foreach ($countries as $country) {
                                                        ?><option value="<?php echo $country->id; ?>" selected
                                                        {{ $user->country == $country->id ? 'selected' : '' }}>
                                                        <?php echo $country->name; ?></option><?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="peranan">
                                                Peranan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <?php
                                            $ids = [ 5, 6, 3, 4, 2];
                                            $peranans = $roles->sortBy(function($model) use ($ids) {
                                                return array_search($model->getKey(), $ids);
                                            });
                                            $ur = $user->getRoleNames();
                                            $urs = [];
                                            foreach($ur as $r){
                                                $urs[] = $r;
                                            }
                                            foreach($peranans as $p){
                                                if(in_array($p->name,$urs)){
                                                    ?>
                                                    <div class="col-10"><input type="checkbox" class="form-check-input mr-4" name="peranan[]" value="<?php echo $p->name; ?>" checked><?php echo $p->name; ?></div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="col-10"><input type="checkbox" class="form-check-input mr-4" name="peranan[]" value="<?php echo $p->name; ?>"><?php echo $p->name; ?></div>
                                                    <?php
                                                }
                                            }
                                            if(in_array("Penerbit Metadata",$urs) || in_array("Pengesah Metadata",$urs)){

                                            }else{
                                                ?>
                                                <script>$('.divBahagian').hide();</script>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    @if ($user->hasRole('Pemohon Data'))
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="email">
                                                Kategori
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control form-control-sm ml-3" type="text" name="kategori">
                                                <option value="">Pilih...</option>
                                                <?php
                                                if(count($kategori) > 0){
                                                    foreach($kategori as $k){
                                                        ?>
                                                <option value="{{ $k->name }}" {{ ($k->name == $user->kategori ? "selected":"") }}>{{ $k->name }}</option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </form>

                            <hr class="my-4">
                            <h6 class="heading-small text-muted mt-0 mb-4">Gambar Profil</h6>
                            <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_gambarprofil_admin')}}" id="form_kemaskini_gambarprofil" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                <div class="pl-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <?php
                                            if($user->gambar_profil != ""){
                                                ?>
                                                <image id="profileImage" alt="Image placeholder" src="{{ asset('storage/'.$user->gambar_profil) }}" style="border-radius: .95rem;max-width:250px;">
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
    <?php
    if($user->hasRole('Pemohon Data')){
        ?>
        $('.divSektor,.divBahagian').hide();
        <?php
    }
    ?>

    $(document).on('click','.btn_simpan',function(){
        var nric = $("#nric").val();
        var email = $("#email").val();
        var agensi_organisasi = $("#agensi_organisasi").val();
        var bahagian = $("#bahagian").val();
        var msg = "";
        if(nric.length < 12){
            msg = msg + "Nombor NRIC tidak lengkap\r\n\r\n"; //TEMPORARILY COMMENTED. TO UNCOMMENT AFTER BENGKEL
        }
        if(!isEmail(email)){
            msg = msg + "Emel tidak sah\r\n\r\n";
        }
        if(agensi_organisasi == ""){
            msg = msg + "Sila pilih agensi / organisasi\r\n\r\n";
        }
        @if($user->hasRole('Pengesah Metadata') || $user->hasRole('Penerbit Metadata'))
        if(bahagian == ""){
            //msg = msg + "Sila pilih bahagian\r\n\r\n";
        }
        @endif
        if(msg.length > 0){
            alert(msg);
        }else{
            $("#form_kemaskini_profil").submit();
        }
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
            $.each(data.aos, function(index,value) {
                $('#agensi_organisasi').append('<option value="'+value.id+'" data-name="'+value.name+'">'+value.name+'</option>');
            });

            $('#bahagian').html('');
            $('#bahagian').append('<option value="">Pilih...</option>');
        });
    });
    $('#agensi_organisasi').change(function() {
        var agensi_organisasi_name = $(this).find(':selected').attr('data-name');

        @if($user->hasRole('Pengesah Metadata') || $user->hasRole('Penerbit Metadata'))
        $.ajax({
            method: "POST",
            url: "{{ url('get_bahagian') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "agensi_organisasi_name": agensi_organisasi_name,
            },
        }).done(function(response) {
            var data = jQuery.parseJSON(response);
            if(data.error == '1'){
                alert(data.msg);
            }else{
                $('#bahagian').html('');
                $('#bahagian').append('<option value="">Pilih...</option>');
                $.each(data.bhgns, function(index,value) {
                    $('#bahagian').append('<option value="'+value.bahagian+'">'+value.bahagian+'</option>');
                });
            }
        });
        @endif
    });

    $('#sektor').val('<?php echo $user->sektor; ?>').change();
    setTimeout(function(){
        $('#agensi_organisasi').val('<?php echo $user->agensi_organisasi; ?>').change();
    }, 2000);
    setTimeout(function(){
        $('#bahagian').val('<?php echo $user->bahagian; ?>').change();
    }, 3000);

});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
</script>

@stop
