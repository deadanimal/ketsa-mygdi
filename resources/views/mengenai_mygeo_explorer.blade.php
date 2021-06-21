@extends('layouts.app_afiq')

@section('content')

<style>
    .accordionHeader{
        background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
        background-image: linear-gradient(to right, #ebba16, #ed8a19);
        cursor: pointer;
    }
</style>

<div class="content-wrapper col-md-12">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Mengenai MyGeo Explorer</h1>
                            <br>
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
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {

    });
</script>
@stop
