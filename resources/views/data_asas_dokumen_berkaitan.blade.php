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
        <h1>Dokumen Berkaitan</h1>
        <br>
        <p>Setiap permohonan <b>WAJIB</b> disertakan dengan surat rasmi permohonan.</p>
        <p>Bagi permohonan yang melibatkan lapisan <b>data terhad</b>, pemohon perlu memuat naik bersama:</p>
        <p><b>1) Salinan Kad Pengenalan</b></p>
        <p><b>1) Borang PPNM-1 Permohonan Lesen Hak Cipta / Membeli Dokumen Geospatial Secara Terperingkat</b></p>
        <p><b>1) Borang Undertaking by Appointed Consulted/Contractor</b> (Sekiranya permohonan menguunakan khidmat kontraktor)</p>
        <p><b>1) Borang Akuan Pelajar</b> (Diisi melalui sistem melalui Pemohon Data memilih kategori Pelajar)</p>
        <br>
        <h3>MUAT TURUN BORANG DAN CONTOH SURAT RASMI PERMOHONAN DATA-DATA ASAS</h3>
        <br>
        <p>
            Contoh Surat Permohonan Rasmi &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/') }}/afiqadminmygeo_files/dokumen_berkaitan/borang surat permohonan data ass.docx" role="button" target="blank">Muat Turun</a>
        </p>
        <br>
        <p>
            Contoh Salinan Lesen Hak Cipta &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary btn-sm" href="javascript:void(0);" role="button" style="cursor:default;">Muat Turun</a>
        </p>
        <br>
        <p>
            Contoh Salinan Kad Pengenalan &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary btn-sm" href="javascript:void(0);" role="button" style="cursor:default;">Muat Turun</a>
        </p>
        <br>
        <p>
            Borang Undertaking by appointed Consultant/Contractor &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/') }}/afiqadminmygeo_files/dokumen_berkaitan/Lampiran III_Letter Undertaking Consultant_Contractor.pdf" role="button" target="blank">Muat Turun</a>
        </p>
        <br>
        <p>
            Borang PPNM-1 Permohonan Lesen Hak Cipta / Membeli Dokumen Geospatial Secara Terperingkat &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/') }}/afiqadminmygeo_files/dokumen_berkaitan/Borang PPNM PlanMalaysiaTerengganu.pdf" role="button" target="blank">Muat Turun</a>
        </p>
        <br>
        <br>
        <p>
            NOTA: Semua dokumen di atas adalah dalam fail "Portable Document Format" (PDF).
        </p>
    </div>
</div>


<script>
    $(document).ready(function () {
        
    });
</script>
@stop
