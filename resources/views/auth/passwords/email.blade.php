@extends('layouts.app_afiq')

@section('content')

<style>
.logo-box .logo{
    max-height: 9rem;
}
.logo-box {
    text-align: center;
    margin-bottom: 2rem;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body px-lg-5 py-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="logo-box">
                        <img class="logo" src="{{ url('afiqadminmygeo_files/mygeologo.jpeg') }}">
                        <h6 class="h2 text-default mt-3 mb-0">Set Semula Kata Laluan</h6>
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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-block my-2">
                                <span class="btn-inner--icon"><i class="fas fa-angle-left"></i></span>
                                <span class="btn-inner--text">Log Masuk</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
