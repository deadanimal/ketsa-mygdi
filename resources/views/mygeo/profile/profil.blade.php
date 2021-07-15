@extends('layouts.app_mygeo_afiq')

@section('content')

  <style>
    /*.card{
      opacity:0.3;
      background-color:orange;
      background-color: rgba(255, 236, 179, 0.2);
    }

    .card p{
      opacity:none;
    }

    .card a{
      opacity:none;
      color:#FFE802;
    }*/

    .ftest{
      display:inline;
      width:auto;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
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
                <h3 class="card-title" style="font-size: 2rem;">Profil Pengguna</h3>
                <a href="{{ url('kemaskini_profil') }}"><button type="button" class="btn btn-default float-right">Kemas Kini</button></a>
              </div>
              <div class="card-body">
                <form class="form-horizontal">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Nama Penuh</label>
                      <div class="col-sm-10">
                        : <label>{{ $user->name }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Kad Pengenalan</label>
                      <div class="col-sm-10">
                        : <label>{{ $user->nric }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Agensi / Organisasi</label>
                      <div class="col-sm-10">
                        : <label>{{ $user->agensi_organisasi }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Bahagian</label>
                      <div class="col-sm-10">
                        : <label>{{ $user->bahagian }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Sektor</label>
                      <div class="col-sm-10">
                        : <label>{{ ($user->sektor == '1' ? "Kerajaan":"Swasta")  }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Emel</label>
                      <div class="col-sm-10">
                        : <label>{{ $user->email }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Telefon Pejabat</label>
                      <div class="col-sm-10">
                        : <label>{{ $user->phone_pejabat }}</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Peranan</label>
                      <div class="col-sm-10">
                        : 
                        <?php
                        if(!empty($user->getRoleNames())){
                          $count = 1;
                          foreach($user->getRoleNames() as $role){
                            ?><label><?php echo $role; ?></label><?php
                            if($count != count($user->getRoleNames())){
                                ?>,<?php
                            }
                            $count++;
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_password')}}" id="form_change_password">
                @csrf
                <div class="card-header">
                  <h3 class="card-title" style="font-size: 2rem;">Tukar Kata Laluan</h3>
                  <button type="submit" class="btn btn-default float-right">Tukar</button>
                </div>
                <div class="card-body">
                  <form class="form-horizontal">
                    <div class="card-body">
                      <input type="hidden" value="{{ $user->password }}">
                      <div class="form-group row">
                        <label for="password_old" class="col-sm-2">Kata Laluan Lama</label>
                        <div class="col-sm-10">
                          : &nbsp; <input type="password" class="form-control ftest" id="password_old" name="password_old">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password_new" class="col-sm-2">Kata Laluan Baru</label>
                        <div class="col-sm-10">
                          : &nbsp; <input type="password" class="form-control ftest" id="password_new" name="password_new">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password_new_confirm" class="col-sm-2">Sah Kata Laluan Baru</label>
                        <div class="col-sm-10">
                          : &nbsp; <input type="password" class="form-control ftest" id="password_new_confirm" name="password_new_confirm">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@stop