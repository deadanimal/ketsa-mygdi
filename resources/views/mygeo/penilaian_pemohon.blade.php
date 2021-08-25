@extends('layouts.app_mygeo_afiq')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <style>
        .ftest {
            display: inline;
            width: auto;
        }

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
            <div class=" container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Penilaian</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Penilaian
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-header bg-default">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="text-white mb-0">Borang Penilaian Data</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-4 px-">
                                <div class="row">
                                    <div class="col-xl-12 text-right">
                                        <h6 class="heading text-muted">Lampiran 3</h6>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-xl-12">
                                        <h3 class="text-dark">BORANG PENILAIAN PERKONGSIAN DATA GEOSPATIAL<br>PUSAT
                                            GEOSPATIAL NEGARA
                                            (PGN)</h3>
                                    </div>
                                </div>
                                <hr class="my-2 bg-dark">
                                <ul align="justify">
                                    <li>Borang penilaian ini dibentuk untuk mendapatkan maklumbalas tentang kualiti
                                        perkongsian data melalui
                                        MyGDI yang disediakan oleh Pusat Geospatial Negara (PGN).</li>
                                    <li>Kami mengalu-alukan kerjasama dari pihak YBhg. Dato'/ Datin/Prof./Dr./Tuan/Puan
                                        untuk mengisi borang
                                        soal selidik ini dan diharapkan dapat membantu memperbaiki dan menambahbaik kualiti
                                        perkongsian data yang
                                        diberikan.</li>
                                </ul>
                                <div class="py-2 mt-2 bg-light">
                                    <h3 class="text-dark mb-0 text-center">BAHAGIAN A: MAKLUMAT PEMOHON/PENGGUNA</h3>
                                </div>
                                <form method="POST" action="/simpan_penilaian" enctype="multipart/form-data">
                                    @csrf
                                    <div class="px-2">
                                        <div class="py-4" style="font-weight: bold;">Sila tandakan [&#10003;] pada ruangan
                                            yang
                                            berkenaan.</div>
                                        <div class="mb-3">1.&nbsp; Kategori Pengguna</div>
                                        <div class="row pl-lg-5 mb-4">
                                            <div class="col-xl-12">
                                                <div class="custom-control custom-radio mb-2">
                                                    <input class=" custom-control-input" id="radioCheck1" name="kategori"
                                                        type="radio" value="Agensi Perseketuan" @if ($penilaian->kategori == 'Agensi Perseketuan') checked @endif />
                                                    <label class=" custom-control-label" for="radioCheck1">
                                                        Agensi Perseketuan
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input class=" custom-control-input" id="radioCheck2" name="kategori"
                                                        type="radio" value="Agensi Negeri" @if ($penilaian->kategori == 'Agensi Negeri') checked @endif />
                                                    <label class=" custom-control-label" for="radioCheck2">
                                                        Agensi Negeri
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input class="custom-control-input" id="radioCheck3" name="kategori"
                                                        type="radio" value="Pelajar/Penyelidik" @if ($penilaian->kategori == 'Pelajar/Penyelidik') checked @endif />
                                                    <label class="custom-control-label" for="radioCheck3">
                                                        Pelajar/Penyelidik
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-4">2.&nbsp; Sumber maklumat tentang kesediaan data yang dipohon</div>
                                        <div class="row pl-lg-2 mb-4">
                                            <div class="col-xl-4">
                                                <div class=" custom-control custom-radio mb-2">
                                                    <input class=" custom-control-input" id="radioCheck21" name="info_data"
                                                        type="radio" value="Internet (MyGeo Explorer)" @if ($penilaian->info_data == 'Internet (MyGeo Explorer)') checked @endif />
                                                    <label class=" custom-control-label" for="radioCheck21">
                                                        Internet (MyGeo Explorer)
                                                    </label>
                                                </div>
                                                <div class=" custom-control custom-radio mb-2">
                                                    <input class=" custom-control-input" id="radioCheck22" name="info_data"
                                                        type="radio" value="Simposium/Pameran/Brochure" @if ($penilaian->info_data == 'Simposium/Pameran/Brochure') checked @endif />
                                                    <label class=" custom-control-label" for="radioCheck22">
                                                        Simposium/Pameran/Brochure
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class=" custom-control custom-radio mb-2">
                                                    <input class=" custom-control-input" id="radioCheck23" name="info_data"
                                                        type="radio" value="Agensi Kerajaan Lain" @if ($penilaian->info_data == 'Agensi Kerajaan Lain') checked @endif />
                                                    <label class=" custom-control-label" for="radioCheck23">
                                                        Agensi Kerajaan Lain
                                                    </label>
                                                </div>
                                                <div class=" custom-control custom-radio mb-2">
                                                    <input class=" custom-control-input" id="radioCheck24" name="info_data"
                                                        type="radio" value="Lain-Lain" @if ($penilaian->info_data == 'Lain-Lain') checked @endif />
                                                    <label class=" custom-control-label" for="radioCheck24">
                                                        Lain-Lain
                                                    </label>
                                                </div>
                                                <div class=" custom-control custom-radio mb-2">
                                                    <input class="form-control form-control-sm" id="others" type="text"
                                                        placeholder="Sila Nyatakan ..." />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2 mt-2 bg-light">
                                        <h4 class="heading text-dark mb-0 text-center">BAHAGIAN B: PENILAIAN PENGURUSAN
                                            PERKONGSIAN DATA GEOSPATIAL
                                        </h4>
                                    </div>
                                    <div class="px-2">
                                        <div class="py-4" style="font-weight: bold;">Sila tandakan [&#10003;] pada ruangan
                                            yang
                                            berkenaan mengikut
                                            sekala penilaian yang diberikan.</div>
                                        <div class="form-inline pl-5">
                                            <label class="mr-4"><b class="bg-light mr-2">&nbsp;1&nbsp;</b> Tidak
                                                Memuaskan</label>
                                            <label class="mr-4"><b class="bg-light mr-2">&nbsp;2&nbsp;</b> Kurang
                                                Memuaskan</label>
                                            <label class="mr-4"><b class="bg-light mr-2">&nbsp;3&nbsp;</b> Memuaskan</label>
                                            <label class="mr-4"><b class="bg-light mr-2">&nbsp;4&nbsp;</b> Baik</label>
                                            <label class="mr-4"><b class="bg-light mr-2">&nbsp;5&nbsp;</b> Cemerlang</label>
                                        </div>
                                        <div class="row py-4">
                                            <div class="col-xl-12 px-5">
                                                <table>
                                                    <tr class="bg-light">
                                                        <th class="text-center" colspan="2" rowspan="2">Pengurusan
                                                            Perkongsian
                                                            Data Geospatial</th>
                                                        <th class="text-center" colspan="5">Skala Penilaian</th>
                                                    </tr>
                                                    <tr class="bg-light">
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th>5</th>
                                                    </tr>
                                                    <tr>
                                                        <td>a.</td>
                                                        <td>Proses kelulusan permohonan data adalah cepat dan efektif</td>
                                                        <td><input type="radio" name="bhg_b_a" value="1" @if ($penilaian->bhg_b_a == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_a" value="2" @if ($penilaian->bhg_b_a == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_a" value="3" @if ($penilaian->bhg_b_a == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_a" value="4" @if ($penilaian->bhg_b_a == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_a" value="5" @if ($penilaian->bhg_b_a == '5') checked @endif></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b.</td>
                                                        <td>Data yang diberikan menepati keperluan pengguna</td>
                                                        <td><input type="radio" name="bhg_b_b" value="1" @if ($penilaian->bhg_b_b == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_b" value="2" @if ($penilaian->bhg_b_b == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_b" value="3" @if ($penilaian->bhg_b_b == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_b" value="4" @if ($penilaian->bhg_b_b == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_b" value="5" @if ($penilaian->bhg_b_b == '5') checked @endif></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c.</td>
                                                        <td>Kaedah perkongsian data yang diamalkan adalah selamat </td>
                                                        <td><input type="radio" name="bhg_b_c" value="1" @if ($penilaian->bhg_b_c == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_c" value="2" @if ($penilaian->bhg_b_c == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_c" value="3" @if ($penilaian->bhg_b_c == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_c" value="4" @if ($penilaian->bhg_b_c == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_c" value="5" @if ($penilaian->bhg_b_c == '5') checked @endif></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d.</td>
                                                        <td>Data yang diterima adalah selamat untuk digunakan (no viruses,
                                                            not
                                                            corrupted)</td>
                                                        <td><input type="radio" name="bhg_b_d" value="1" @if ($penilaian->bhg_b_d == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_d" value="2" @if ($penilaian->bhg_b_d == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_d" value="3" @if ($penilaian->bhg_b_d == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_d" value="4" @if ($penilaian->bhg_b_d == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_d" value="5" @if ($penilaian->bhg_b_d == '5') checked @endif></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e.</td>
                                                        <td>Adakah serahan data ini selamat dan terjamin </td>
                                                        <td><input type="radio" name="bhg_b_e" value="1" @if ($penilaian->bhg_b_e == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_e" value="2" @if ($penilaian->bhg_b_e == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_e" value="3" @if ($penilaian->bhg_b_e == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_e" value="4" @if ($penilaian->bhg_b_e == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_e" value="5" @if ($penilaian->bhg_b_e == '5') checked @endif></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f.</td>
                                                        <td>Kawalan keselamatan terhadap proses serahan data yang
                                                            dipraktikkan
                                                            adalah memadai (encryption
                                                            data, password)</td>
                                                        <td><input type="radio" name="bhg_b_f" value="1" @if ($penilaian->bhg_b_f == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_f" value="2" @if ($penilaian->bhg_b_f == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_f" value="3" @if ($penilaian->bhg_b_f == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_f" value="4" @if ($penilaian->bhg_b_f == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_f" value="5" @if ($penilaian->bhg_b_f == '5') checked @endif></td>
                                                    </tr>
                                                    <tr>
                                                        <td>g.</td>
                                                        <td>Pemohon mendapat kerjasama yang baik daripada pegawai yang
                                                            menguruskan permohonan data.</td>
                                                        <td><input type="radio" name="bhg_b_g" value="1" @if ($penilaian->bhg_b_g == '1') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_g" value="2" @if ($penilaian->bhg_b_g == '2') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_g" value="3" @if ($penilaian->bhg_b_g == '3') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_g" value="4" @if ($penilaian->bhg_b_g == '4') checked @endif></td>
                                                        <td><input type="radio" name="bhg_b_g" value="5" @if ($penilaian->bhg_b_g == '5') checked @endif></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2 my-4 bg-light">
                                        <h4 class="heading text-dark mb-0 text-center">BAHAGIAN C: PENGUNAAN DATA</h4>
                                    </div>
                                    <div class="px-2">
                                        <div class="row mb-4">
                                            <div class="col-xl-10">
                                                <div class="my-2">1.&nbsp;&nbsp; Kegunaan utama data yang dipohon. (Sila
                                                    nyatakan)</div>
                                                <input class="form-control form-control-sm ml-4" type="text" name="bhg_c_1"
                                                    value="{{ $penilaian->bhg_c_1 }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="mb-2">2.&nbsp;&nbsp; Data yang diterima telah ditambahnilai
                                                    <i>(value added)</i>
                                                </div>
                                                <div class="row pl-lg-4 mb-4">
                                                    <div class="col-xl-3">
                                                        <div class="custom-control custom-radio mb-2">
                                                            <input class=" custom-control-input" type="radio" id="choice1"
                                                                name="bhg_c_2" value="yes" @if ($penilaian->bhg_c_2 == 'yes') checked @endif>
                                                            <label class="custom-control-label" for="choice1">
                                                                Ya
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="custom-control custom-radio">
                                                            <input class=" custom-control-input" type="radio" id="choice2"
                                                                name="bhg_c_2" value="no" @if ($penilaian->bhg_c_2 == 'no') checked @endif>
                                                            <label class="custom-control-label" for="choice2">
                                                                Tidak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-2">3.&nbsp;&nbsp; Data yang diterima telah dimanfaatkan
                                                    sepenuhnya</div>
                                                <div class="row pl-lg-4 mb-4">
                                                    <div class="col-xl-3">
                                                        <div class="custom-control custom-radio mb-2">
                                                            <input class=" custom-control-input" type="radio" id="choice3"
                                                                name="bhg_c_3" value="yes" @if ($penilaian->bhg_c_3 == 'yes') checked @endif>
                                                            <label class="custom-control-label" for="choice3">
                                                                Ya
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="custom-control custom-radio">
                                                            <input class=" custom-control-input" type="radio" id="choice4"
                                                                name="bhg_c_3" value="no" @if ($penilaian->bhg_c_3 == 'no') checked @endif>
                                                            <label class="custom-control-label" for="choice4">
                                                                Tidak
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">4.&nbsp;&nbsp; Berikut merupakan screenshot
                                            kajian/analisis/laporan
                                            yang sedang/telah
                                            dilaksanakan menggunakan data yang dikongsi melalui MyGeo Explorer.
                                        </div>
                                        <div class="container p-0"
                                            style="border: 1px solid lightgray; border-radius: .25rem; min-height: 200px;">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                                <label class="custom-file-label" for="chooseFile">Pilih Fail</label>
                                            </div>
                                            <img style="max-height: 500px; max-width: 900px" class="p-2" alt="..."
                                                src="{{ $penilaian->bhg_c_4_file_path }}">
                                        </div>
                                        <div class="small py-4">Pihak kami mengalu-alukan sekiranya terdapat komen atau
                                            cadangan
                                            bagi meningkatkan
                                            pengurusan perkongsian data melalui MyGeo Explorer. Terima Kasih.
                                        </div>
                                        <h4 style="font-weight: bold;">Komen / Cadangan</h4>
                                        <textarea class="form-control form-control-sm mb-4" rows="3" type="text"
                                            placeholder="Masukkan Komen / Cadangan anda disini ..."
                                            name="komen_cadangan">{{ $penilaian->komen_cadangan }}</textarea>
                                        <hr class="my-2 bg-dark">
                                        <div class="container p-3">
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label class="form-control-label">Nama</label>
                                                    <input class="form-control form-control-sm" type="text" value="{{$pemohon->users->name}}" disabled>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-control-label">Emel</label>
                                                    <input class="form-control form-control-sm" type="text" value="{{$pemohon->users->email}}" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-control-label">No Telefon</label>
                                                    <input class="form-control form-control-sm" type="text" value="{{$pemohon->users->phone_pejabat}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                                    @if (Auth::user()->hasRole(['Pemohon Data']))
                                    <button type="submit" class="btn btn-primary">Hantar</button>
                                    @endif
                                </form>
                                <div class="row mb-0 mt-5">
                                    <div class="col-xl-12">
                                        <h6 class="heading text-muted">PGN-ISMS-P3-019-002-260</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $("#table_metadatas").DataTable({
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
                    "sEmptyTable": "Tiada rekod ditemui",
                    "sZeroRecords": "Tiada rekod ditemui",
                    "sLengthMenu": "Papar _MENU_ rekod",
                    "sLoadingRecords": "Sila tunggu...",
                    "sSearch": "Carian:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sLast": "Terakhir",
                        "sNext": ">",
                        "sPrevious": "<",
                    }
                }
            });
        });
    </script>
@stop
