@extends('layouts.app_mygeo')

@section('content')

  <style>
    .card{
      /*opacity:0.3;
      background-color:orange;*/
      background-color: rgba(255, 236, 179, 0.2);
    }

    .card p{
      opacity:none;
    }

    .card a{
      opacity:none;
      color:#FFE802;
    }
  </style>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><span style="color:#FFE802;">Pengumuman</span></h5>
              </div>
              <div class="card-body">
                <span style="color:#FFE802;">1 JAN 2021</span>
                <p>Makluman: <br>
                Selamat tahun baru kepada semua pengguna MyGeo Explorer</p>
                <span style="color:#FFE802;">25 DIS 2020</span>
                <p>Peringatan: <br>
                Agensi hendaklah mengemaskini metadata masing-masing</p>
                <span style="color:#FFE802;">23 DIS 2020</span>
                <p>Metadata Baharu: <br>
                Grid for Climate Change Projection for Peninsular Malaysia</p>
                <span style="color:#FFE802;">21 DIS 2020</span>
                <p>Pengemaskinian: <br>
                Climate Change Projection for Peninsular Malaysia (2010-2099)</p>
                <span style="color:#FFE802;">18 DIS 2020</span>
                <p>Metadata Baharu: Taman Laut Negeri Terengganu</p> <br>
              </div>
            </div>
          </div>
          <div class="col-lg-7"></div>
          <div class="col-lg-2">
            <div class="card">
              <div class="card-body">
                <a href="#">Metadata</a> <br> <hr>
                <a href="#">Permohonan Data Asas</a> <br> <hr>
                <a href="#">Tutorial</a> <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop