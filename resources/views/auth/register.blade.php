@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Penuh</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter email">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kad Pengenalan</label>
                            <input type="text" class="form-control" id="nric" name="nric" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Agensi / Organisasi</label>
                            <input type="text" class="form-control" id="agensi_organisasi" name="agensi_organisasi" placeholder="Nama agensi / organisasi.">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Bahagian</label>
                            <input type="text" class="form-control" id="bahagian" name="bahagian" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Sektor</label>
                            <select class="form-control" id="sektor" name="sektor">
                              <option selected disabled>Pilih sektor.</option>
                              <option value="1">Kerajaan</option>
                              <option value="2">Swasta</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Emel</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Telefon (Pej)</label>
                            <input type="text" class="form-control" id="phone_pejabat" name="phone_pejabat" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Telefon Bimbit</label>
                            <input type="text" class="form-control" id="phone_bimbit" name="phone_bimbit" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Peranan</label>
                            <select class="form-control" id="peranan" name="peranan">
                              <option selected disabled>Pilih peranan.</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Surat Sokongan</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="surat_sokongan" name="surat_sokongan">
                                <label class="custom-file-label" for="exampleInputFile1120">Tiada file dipilih.</label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Kata Laluan</label>
                            <input id="password_daftar" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Sah Kata Laluan</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                          </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // ajax get roles
        $.ajax({
            method: "POST",
            url: "get_roles",
            data: { "_token": "{{ csrf_token() }}" },
            dataType:"json",
        })
        .done(function(data) {
            data.forEach(function(the_var) {
                $("#peranan").append("<option value='"+the_var.id+"'>"+the_var.name+"</option>");
            });
        });
    });
  </script>
@endsection
