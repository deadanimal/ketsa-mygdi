@extends('layouts.app_afiq')

@section('content')

    <style>
        .accordionHeader {
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

        .badge-custom[href][_ngcontent-tvu-c486]:hover,
        .badge-custom[href][_ngcontent-tvu-c486]:focus {
            text-decoration: none;
            color: #fff;
            background-color: #fa3a0e;
        }

        p[_ngcontent-tvu-c486]:hover {
            background-color: #e4e6ff;
        }

    </style>
    <style>
        .square[_ngcontent-tvu-c497] {
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

        .btn-primary[_ngcontent-tvu-c497],
        .bg-primary[_ngcontent-tvu-c497] {
            background-color: #0A80B6 !important;
            border-color: #0A80B6;
        }

        .card2[_ngcontent-tvu-c497] {
            border-radius: 0;
            /*top: 250px;*/
            left: 0;
            right: 0;
        }

        .div_subkategori {
            margin-left: 50px;
        }

    </style>
    <!-- Content Wrapper. Contains page content -->
    <section class="content p-4">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Tatacara Permohonan</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img height="150"  class="img-center" src="afiqadminmygeo_files/dataapp.png" alt="">
                                </div>
                                <div class="col-8">
                                    <p class="heading text-muted">1) Daftar Pengguna</p>
                                    <ul type="square">
                                        <li>Pemohon perlu daftar masuk aplikasi MyGeo Explorer sebagai Pemohon Data terlebih
                                            dahulu.</li>
                                        <li>Pilih Kategori pemohon sama ada G2C, G2G atau G2E.</li>
                                        <li>Isi maklumat pendaftaran dengan lengkap.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img height="150"  class="img-center" src="afiqadminmygeo_files/contact-form.png" alt="">
                                </div>
                                <div class="col-8">
                                    <p class="heading text-muted">2) Isi Maklumat Permohonan</p>
                                    <ul type="square">
                                        <li>Pentadbir akan mengesahkan permohonan daripada pemohon.</li>
                                        <li>Nyatakan tujuan, data yang dimohon dan kawasan lapisan data yang dimohon.</li>
                                        <li> Pemohon perlu memuat naik surat rasmi beserta dokumen berkaitan ketika mengisi
                                            maklumat permohonon.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img height="150"  class="img-center" src="afiqadminmygeo_files/checklist.png" alt="">
                                </div>
                                <div class="col-8">
                                    <p class="heading text-muted">3) Pengesahan Permohonan</p>
                                    <ul type="square">
                                        <li>Pentadbir akan mengesahkan permohonan daripada pemohon.</li>
                                        <li>Sekiranya permohonan lengkap permohonan akan diluluskan dan dimajukan untuk
                                            pemprosesan data yang
                                            dimohon.</li>
                                        <li>Pemohon akan menerima notifikasi melalui e-mel sekiranya permohonan ditolak</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img height="150"  class="img-center" src="afiqadminmygeo_files/data.png" alt="">
                                </div>
                                <div class="col-8">
                                    <p class="heading text-muted">4) Proses Data</p>
                                    <ul type="square">
                                        <li>Pentadbir akan memproses data dan menghantar surat balasan permohonan kepada
                                            pemohon.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img height="150"  class="img-center" src="afiqadminmygeo_files/direct-download.png" alt="">
                                </div>
                                <div class="col-8">
                                    <p class="heading text-muted">5) Terima Data</p>
                                    <ul type="square">
                                        <li>Pemohon akan menerima notifikasi muat turun data melalui e-mel berserta surat
                                            balasan permohonon.</li>
                                        <li>Pemohon log masuk sistem untuk muat turun data.</li>
                                        <li>Sistem akan meminta pengesahan sama ada pemohon berjaya atau tidak muat turun
                                            data dalam masa tiga (3)
                                            jam setelah pemohon menekan poutan muat turun data. Jika tidak, pemohon boleh
                                            memuat turun semula dan
                                            proses akan berulang sehingga pemohon berjaya memuat turun data.</li>
                                        <li>Pemohon membuat akuan penerimaan data selepas berjaya memohon data.</li>
                                        <li>Pautan data hanya sah untuk tempoh dua (2) minggu sahaja.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <img height="150"  class="img-center" src="afiqadminmygeo_files/comment.png" alt="Penilaian">
                                </div>
                                <div class="col-8">
                                    <p class="heading text-muted">6) Membuat Penilaian</p>
                                    <ul type="square">
                                        <li>Sistem menghantar notifikasi penilaian melalui e-mel setelah pemohon berjaya
                                            memuat turun data.</li>
                                        <li>Sekiranya pemohon masih belum membuat penilaian data, sistem akan menghantar
                                            notifikasi peringatan
                                            berulang melalui e-mel setiap dua (2) bulan sekali dalam tempoh enam (6) bulan
                                            daripada proses berjaya
                                            muat turun data.</li>
                                        <li>Mesej peringatan akan muncul apabila pemohon log masuk sistem sekiranya pemohon
                                            gagal untuk membuat
                                            penilaian data dalam masa enam (6) bulan.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <script>
        $(document).ready(function() {

        });
    </script>
@stop
