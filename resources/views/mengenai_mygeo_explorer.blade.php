@extends('layouts.app_ketsa')

@section('content')
<style>
    .card {
        border-radius: 0;
        min-height: 850px;
        margin: 0;
        padding: 1.7rem 2.5rem;
    }

    .card-header {
        padding: 1.25rem 1.5rem;
        margin-bottom: 0;
        background-color: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .accordionHeader {
        background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
        background-image: linear-gradient(to right, #ebba16, #ed8a19);
        cursor: pointer;
    }
</style>
<div class="content">
    <div class="card" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="card-header">
            <h1 class="card-title m-0">Mengenai MyGeo Explorer</h1>
        </div>
        <div class="card-body">
            <p align="justify">
                MyGeo Explorer merupakan inisiatif Kerajaan untuk mengembangkan Infrastruktur Data Geospatial bagi meningkatkan kesedaran tentang ketersediaan data dan meningkatkan pautan akses ke maklumat geospatial dengan memudahkan perkongsian data di antara agensi yang mengambil bahagian.
                <br><br>
                MyGDI sebagai Infrastruktur Data Spatial Nasional (NSDI) untuk Malaysia, adalah infrastruktur data geospatial yang merangkumi teknologi, dasar, piawaian dan prosedur bagi agensi untuk menghasilkan dan berkongsi maklumat geospatial secara kerjasama.
                <br><br>
                MyGDI menyediakan dasar untuk eksplorasi, penilaian, dan aplikasi data geospatial untuk pengguna dan penyedia data dalam semua lapisan pemerintah, komersial, dan non-profit serta akademik dan masyarakat.
            </p>
        </div>
    </div>
</div>

@stop
