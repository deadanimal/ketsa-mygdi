@extends('layouts.app_ketsa')

@section('content')

    <style>
        .logo-box .logo {
            min-width: 9rem;
        }

        .logo-box {
            text-align: center;
            margin-bottom: 2rem;
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
                            <div class="card-header">
                                <h4 class="text-center">Tukar Kata Laluan</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('password.update') }}" id="formTukarPassword">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Emel</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus readonly>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <i class="text-danger" style="font-size:11px;">*Kata laluan mestilah mempunyai sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil, nombor dan simbol.</i>
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Kata
                                            Laluan</label>

                                        <div class="col-md-6">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-eye" onclick="myFunction3()"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Sahkan
                                            Kata Laluan</label>

                                        <div class="col-md-6">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-eye" onclick="myFunction4()"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="button" class="btn btn-primary btnSubmit">
                                                Kemaskini Kata Laluan
                                            </button>
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
    </div>
@stop


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btnSubmit', function() {
            var email = $('#email').val();
            var password = $("#password").val();
            var password_confirm = $("#password-confirm").val();
            var msg = "";
            if (email == "") {
                msg = msg + "Sila isi email\r\n\r\n"
            }
            if (!checkPassword(password)) {
                msg = msg +
                    "Kata laluan mesti mempunyai sekurang-kurangnya 12 aksara terdiri daripada gabungan huruf besar, huruf kecil, nombor dan simbol.\r\n\r\n";
            }
            if (password != password_confirm) {
                msg = msg +
                    "Kata laluan yang dimasukkan berbeza dengan kata laluan yang disahkan\r\n\r\n";
            }
            if (msg.length > 0) {
                alert(msg);
            } else {
                $('#formTukarPassword').submit();
            }
        });
    });

    function myFunction3() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction4() {
        var x = document.getElementById("password-confirm");
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
