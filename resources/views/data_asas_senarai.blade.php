@extends('layouts.app_afiq')

@section('content')

<style>
    .accordionHeader{
        background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
        background-image: linear-gradient(to right, #ebba16, #ed8a19);
        cursor: pointer;
    }
</style>
<style>
    .fancy_card[_ngcontent-tvu-c486] {
        box-shadow: 8px 14px 38px rgba(39, 44, 49, 0.06), 1px 3px 8px rgba(39, 44, 49, 0.03);
        -webkit-transition: all 0.7s ease;
        transition: all 0.7s ease;

        color: transparent;
        text-transform: uppercase;
        background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
        background-image: linear-gradient(to right, #ebba16, #ed8a19);
    }

    .fancy_card[_ngcontent-tvu-c486]:hover {
        box-shadow: 8px 28px 50px rgba(39, 44, 49, 0.07), 1px 6px 12px rgba(39, 44, 49, 0.04);
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;

        -webkit-transform: translate3D(0, -1px, 0) scale(1.2);
        transform: translate3D(0, -1px, 0) scale(1.2);
        font-size: 110%;
        color: #ffffff;
        background-image: -webkit-gradient(linear, left top, right top, from(#ebc64c), to(#e4a053));
        background-image: linear-gradient(to right, #ebc64c, #e4a053);
    }

    .badge-custom[_ngcontent-tvu-c486] {
        color: #303030;
        background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
        background-image: linear-gradient(to right, #ebba16, #ed8a19);
        font-size: 80%;
        padding: 0.75rem 1.05rem;
    }

    .badge-custom[href][_ngcontent-tvu-c486]:hover, .badge-custom[href][_ngcontent-tvu-c486]:focus {
        text-decoration: none;
        color: #fff;
        background-color: #fa3a0e;
    }

    p[_ngcontent-tvu-c486]:hover {
        background-color: #e4e6ff;
    }</style><style>.square[_ngcontent-tvu-c497] {
        width: 130px;
        height: 130px;
    }

    .auto[_ngcontent-tvu-c497] {
        cursor: auto;
    }

    .default[_ngcontent-tvu-c497] {
        cursor: default;
    }

    .none[_ngcontent-tvu-c497] {
        cursor: none;
    }

    .context-menu[_ngcontent-tvu-c497] {
        cursor: context-menu;
    }

    .help[_ngcontent-tvu-c497] {
        cursor: help;
    }

    .pointer[_ngcontent-tvu-c497] {
        cursor: pointer;
    }

    .progress[_ngcontent-tvu-c497] {
        cursor: progress;
    }

    .wait[_ngcontent-tvu-c497] {
        cursor: wait;
    }

    .cell[_ngcontent-tvu-c497] {
        cursor: cell;
    }

    .crosshair[_ngcontent-tvu-c497] {
        cursor: crosshair;
    }

    .text[_ngcontent-tvu-c497] {
        cursor: text;
    }

    .vertical-text[_ngcontent-tvu-c497] {
        cursor: vertical-text;
    }

    .alias[_ngcontent-tvu-c497] {
        cursor: alias;
    }

    .copy[_ngcontent-tvu-c497] {
        cursor: copy;
    }

    .move[_ngcontent-tvu-c497] {
        cursor: move;
    }

    .no-drop[_ngcontent-tvu-c497] {
        cursor: no-drop;
    }

    .not-allowed[_ngcontent-tvu-c497] {
        cursor: not-allowed;
    }

    .all-scroll[_ngcontent-tvu-c497] {
        cursor: all-scroll;
    }

    .col-resize[_ngcontent-tvu-c497] {
        cursor: col-resize;
    }

    .row-resize[_ngcontent-tvu-c497] {
        cursor: row-resize;
    }

    .n-resize[_ngcontent-tvu-c497] {
        cursor: n-resize;
    }

    .e-resize[_ngcontent-tvu-c497] {
        cursor: e-resize;
    }

    .s-resize[_ngcontent-tvu-c497] {
        cursor: s-resize;
    }

    .w-resize[_ngcontent-tvu-c497] {
        cursor: w-resize;
    }

    .ns-resize[_ngcontent-tvu-c497] {
        cursor: ns-resize;
    }

    .ew-resize[_ngcontent-tvu-c497] {
        cursor: ew-resize;
    }

    .ne-resize[_ngcontent-tvu-c497] {
        cursor: ne-resize;
    }

    .nw-resize[_ngcontent-tvu-c497] {
        cursor: nw-resize;
    }

    .se-resize[_ngcontent-tvu-c497] {
        cursor: se-resize;
    }

    .sw-resize[_ngcontent-tvu-c497] {
        cursor: sw-resize;
    }

    .nesw-resize[_ngcontent-tvu-c497] {
        cursor: nesw-resize;
    }

    .nwse-resize[_ngcontent-tvu-c497] {
        cursor: nwse-resize;
    }

    .bgg[_ngcontent-tvu-c497] {
        background-image: url('mygeo-background.jpg');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .fancy_card[_ngcontent-tvu-c497] {
        box-shadow: 8px 14px 38px rgba(39, 44, 49, 0.06), 1px 3px 8px rgba(39, 44, 49, 0.03);
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;

        text-transform: uppercase;
        background-color: #0A80B6;
        font-weight: 500;
    }

    .fancy_card[_ngcontent-tvu-c497]:hover {
        box-shadow: 8px 28px 50px rgba(39, 44, 49, 0.07), 1px 6px 12px rgba(39, 44, 49, 0.04);
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;

        -webkit-transform: translate3D(0, -1px, 0) scale(1.2);
        transform: translate3D(0, -1px, 0) scale(1.2);
        color: #272727;
        font-size: 100%;
        background-color: #0094d8;
    }

    .btn-primary[_ngcontent-tvu-c497], .bg-primary[_ngcontent-tvu-c497] {
        background-color: #0A80B6 !important;
        border-color: #0A80B6;
    }

    .card2[_ngcontent-tvu-c497] {
        border-radius: 0;
        /*top: 250px;*/
        left: 0;
        right: 0;
    }

    .div_subkategori{
        margin-left:50px;
        }</style>


<div _ngcontent-tvu-c497="" class="card22 mt-29 p-26" style="width:100%;background-color: rgba(255, 255, 255, 0.9);">
    <div class="card-body">
        <h1>Senarai Data-Data Asas</h1>

        <div class="row">
            <div class="col-3">
                <h2>Kategori :</h2>
                @foreach ($senarai_data as $data)
                    @if (!empty($data->subkategori))
                        <a href="/data_asas_senarai/{{$data->id}}">{{$loop->iteration}}.&nbsp; {{$data->kategori}}</a><br>
                    @endif

                @endforeach
            </div>
            <div class="col-3">
                <h2>Sub-Kategori :</h2>
                @forelse ($subs as $dataa)
                <a href="/data_asas_senarai/{{$data->id}}/{{$dataa->id}}">{{$dataa->subkategori}}</a><br>
                @empty
                    -
                @endforelse
            </div>
            <div class="col-3">
                <h2>Lapisan Data :</h2>
                @forelse ($lapisan as $ldata)
                {{-- {{$ldata}} --}}
                <a>{{$ldata->lapisan_data}}</a><br>
                @empty
                    -
                @endforelse
            </div>
            <div class="col-3">
                <h2>Kelas :</h2>
                @forelse ($lapisan as $ldata)
                {{-- {{$ldata}} --}}
                <a>{{$ldata->kelas}}</a><br>
                @empty
                    -
                @endforelse
            </div>
        </div>




        <br>
        {{-- <div class="row">
            <div class="col-md-2 div_kategori">

                <p class="kategori" data-id="Aeronautical">1)  Aeronautical</p>
                <p class="kategori" data-id="Built_Environment">2)  Built Environment</p>
                <p class="kategori" data-id="Demarcation">3)  Demarcation</p>
                <p class="kategori" data-id="Geology">4)  Geology</p>
                <p class="kategori" data-id="Hydrography">5)  Hydrography</p>
                <p class="kategori" data-id="Hypsography">6)  Hypsography</p>
                <p class="kategori" data-id="Soil">7)  Soil</p>
                <p class="kategori" data-id="Transportation">8)  Transportation</p>
                <p class="kategori" data-id="Utility">9)  Utility</p>
                <p class="kategori" data-id="Vegetation">10)  Vegetation</p>
                <p class="kategori" data-id="Special_Use">11)  Special Use</p>
                <p class="kategori" data-id="General">12)  General</p>
            </div>
            <div class="div_subkategori">
                <h2 class="subKategoriTitle" style="display:none;">Sub-Kategori:</h2>
                <div class="div_sub Aeronautical" style="display:none;">
                    <p class="subkategori" data-id="General">1) Ruang Udara (Air Space - AA)</p>
                    <p class="subkategori">2) Lapangan Terbang (Aerodrome - AB)</p>
                    <p class="subkategori">3) Kediaman (Residential - BA)</p>
                </div>
                <div class="div_sub Built_Environment" style="display:none;">
                    <p class="subkategori">1)  Kediaman (Residential - BA)</p>
                    <p class="subkategori">2)  Komersial (Commercial - BB)</p>
                    <p class="subkategori">3)  Industri (Industrial - BC)</p>
                    <p class="subkategori">4)  Pendidikan (Educational - BE)</p>
                    <p class="subkategori">5)  Keagamaan (Religious - BF)</p>
                    <p class="subkategori">6)  Kemudahan Rekreasi (Recreational - BG)</p>
                    <p class="subkategori">7)  Perkuburan (Cemetery - BH)</p>
                    <p class="subkategori">8)  Struktur Kekal (Built-Up - BJ)</p>
                </div>
                <div class="div_sub Demarcation" style="display:none;">
                    <p class="subkategori">1)  (Topographic - [Boundaries/Limites/Zones] - DA)</p>
                    <p class="subkategori">2)  Maritim (Maritime - DB)</p>
                    <p class="subkategori">3)  Kadaster (Cadastral - DC)</p>
                    <p class="subkategori">4)  Guna Tanah Perancangan (Planning Land Use - DD)</p>
                </div>
                <div class="div_sub Geology" style="display:none;">
                    <p class="subkategori">1)  Jenis Batuan (Geolithology - GA)</p>
                    <p class="subkategori">2)  Mineral (Minerals - GB)</p>
                    <p class="subkategori">3)  Penjelajahan (Exploration - GE)</p>
                    <p class="subkategori">4)  Fitur Geologi (Geological Features - GF)</p>
                    <p class="subkategori">5)  Geosains (Geoscience - GG)</p>
                </div>
                <div class="div_sub Hydrography" style="display:none;">
                    <p class="subkategori">1)  Hidrografi Pinggir Laut (Coastal Hydrography – HA)</p>
                    <p class="subkategori">2)  Struktur Garis Pesisir Pelabuhan (Shoreline Structure - HB)</p>
                    <p class="subkategori">3)  Pelabuhan (Ports and Harbours - HD)</p>
                    <p class="subkategori">4)  Bantuan Navigasi (Navigation Aids - HE)</p>
                    <p class="subkategori">5)  Makumat Kedalaman (Depth Information - HG)</p>
                    <p class="subkategori">6)  Air Daratan (Inland Water - HH)</p>
                    <p class="subkategori">7)  Pulau (Island - HL)</p>
                </div>
                <div class="div_sub Hypsography" style="display:none;">
                    <p class="subkategori">1)  Gambaran Relief (Relief Portrayal - RA)</p>
                </div>
                <div class="div_sub Soil" style="display:none;">
                    <p class="subkategori">1)  (Soil Classification)</p>
                </div>
                <div class="div_sub Transportation" style="display:none;">
                    <p class="subkategori">1)  (Land Transportation - TA</p>
                </div>
                <div class="div_sub Utility" style="display:none;">
                    <p class="subkategori">1)  Elektrik (Electricity - UA)</p>
                    <p class="subkategori">2)  Bekalan Air (Water Supply - UC)</p>
                    <p class="subkategori">3)  Pembetungan (Sewerage - UF)</p>
                    <p class="subkategori">4)  Pengurusan Sisa Pepejal (Waste Management – UG)</p>
                </div>
                <div class="div_sub Vegetation" style="display:none;">
                    <p class="subkategori">1)  Pertanian (Agriculture - VA)</p>
                    <p class="subkategori">2)  Perhutanan (Forest - VB)</p>
                    <p class="subkategori">3)  Pelbagai (Miscellaneous - VC)</p>
                </div>
                <div class="div_sub Special_Use" style="display:none;">
                    <p class="subkategori">1)  Analisis Muka Bumi (Terrain Analysis Dataset - XA)</p>
                    <p class="subkategori">2)  Meteorologi (Meteorological Dataset - XB)</p>
                    <p class="subkategori">3)  Data Bergrid dan Imej (Imagery & Gridded Dataset – XC)</p>
                </div>
                <div class="div_sub General" style="display:none;">
                    <p class="subkategori">1)  Titik Kawal (Control Point - ZA)</p>
                    <p class="subkategori">2)  Label Nama Geografi (Label of Geography Name - ZB)</p>
                </div>
            </div>
        </div> --}}
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".div_sub").hide();
        $(".subKategoriTitle").hide();

        $(document).on("click", ".kategori", function () {
            var divname = $(this).data('id');
            $(".div_sub").hide();
            $("." + divname).show();
            $(".subKategoriTitle").show();
        });

        $(document).on("click", ".subkategori, function () {
//            var divname = $(this).data('id');
//            $(".div_sub").hide();
//            $("." + divname).show();
//            $(".subKategoriTitle").show();
        });
    });
</script>
@stop
