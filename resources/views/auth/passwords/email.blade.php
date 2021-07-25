@extends('layouts.app_afiq')

@section('content')

<style>
    .logo-box .logo {
        min-width: 9rem;
    }

    .logo-box {
        text-align: center;
        margin-bottom: 2rem;
    }

    .card {
        width: 500px;
    }
</style>

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
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <div class="logo-box">
                                <h5 class="h2 text-muted mb-0">Set Semula Kata Laluan</h5>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary">
                                                <i class="fas fa-envelope text-white"></i>
                                            </span>
                                        </div>
                                        <input placeholder="Masukkan Emel ..." type="email" id="email" name="email" class="form-control text-dark @error('email') is-invalid @enderror" autocomplete="email" required value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block my-4">Set Semula</button>
                                    <a href="{{ route('login') }}" class="btn btn-icon btn-outline-primary btn-block my-2">
                                        <span class="btn-inner--icon"><i class="fas fa-angle-left"></i></span>
                                        <span class="btn-inner--text">Log Masuk</span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
@stop
