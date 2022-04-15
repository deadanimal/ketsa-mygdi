@extends('layouts.app_ketsa')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">SETUP</div>

                    <div class="card-body">
                        <form action="/adminpentadbir" method="POST">
                            @csrf
                            @if ($user == null)
                                <label for="">Nama</label>
                                <input class="form-control" type="text" name="name" value="Admin Pentadbir" disabled>
                                <label for="">Email</label>
                                <input class="form-control" type="text" name="email" value="">
                                <label for="">Password</label>
                                <input class="form-control" type="text" name="password1" value="">
                                <label for="">NRIC</label>
                                <input class="form-control" type="text" name="nric" value="888888888888">
                                <label for="">Agensi</label>
                                <select class="form-control" name="agensi_organisasi">
                                    @foreach ($agensi as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach
                                </select>
                                <label for="">Bahagian</label>
                                <input class="form-control" type="text" name="bahagian" value="IT">
                                <label for="">Sektor</label>
                                <input class="form-control" type="text" name="sektor" value="1">
                                <label for="">Phone Pejabat</label>
                                <input class="form-control" type="text" name="phone_pejabat" value="0888888888">
                                <label for="">Phone Bimbit</label>
                                <input class="form-control" type="text" name="phone_bimbit" value="0188888888">
                                <label for="">Disahkan</label>
                                <input class="form-control" type="text" name="disahkan" value="1">

                                <label for="">Alamat</label>
                                <input class="form-control" type="text" name="alamat"
                                    value="1 Jalan Melur Taman Bunga 45502 Jasin Melaka">

                                <label for="">status</label>
                                <input class="form-control" type="text" name="status" value="1">

                                <label for="">deleted</label>
                                <input class="form-control" type="text" name="deleted" value="no">

                                <label for="">assigned_roles</label>
                                <input class="form-control" type="text" name="assigned_roles" value="Pentadbir Data">
                            @else
                                <label for="">Nama</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" disabled>
                                <label for="">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                                <label for="">Password</label>
                                <input class="form-control" type="text" name="password1" value="{{ $user->password1 }}">
                                <label for="">NRIC</label>
                                <input class="form-control" type="text" name="nric" value="{{ $user->nric }}">
                                <label for="">Agensi</label>
                                <select class="form-control" name="agensi_organisasi">
                                    @foreach ($agensi as $a)
                                        <option {{ $user->agensi_organisasi == $a->id ? 'selected' : '' }}
                                            value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach
                                </select>
                                <label for="">Bahagian</label>
                                <input class="form-control" type="text" name="bahagian" value="{{ $user->bahagian }}">
                                <label for="">Sektor</label>
                                <input class="form-control" type="text" name="sektor" value="{{ $user->sektor }}">
                                <label for="">Phone Pejabat</label>
                                <input class="form-control" type="text" name="phone_pejabat"
                                    value="{{ $user->phone_pejabat }}">
                                <label for="">Phone Bimbit</label>
                                <input class="form-control" type="text" name="phone_bimbit"
                                    value="{{ $user->phone_bimbit }}">
                                <label for="">Disahkan</label>
                                <input class="form-control" type="text" name="disahkan" value="{{ $user->disahkan }}">
                                <label for="">Alamat</label>
                                <input class="form-control" type="text" name="alamat" value="{{ $user->alamat }}">

                                <label for="">status</label>
                                <input class="form-control" type="text" name="status" value="{{ $user->status }}">

                                <label for="">deleted</label>
                                <input class="form-control" type="text" name="deleted" value="{{ $user->deleted }}">

                                <label for="">assigned_roles</label>
                                <input class="form-control" type="text" name="assigned_roles"
                                    value="{{ $user->assigned_roles }}">
                            @endif

                            <button class="btn btn-primary mt-5">Hantar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
