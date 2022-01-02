@extends('layouts.app_ketsa')

@section('content')

    <style>
        div.test li {
            list-style-type: square;
        }

        td, th {
            font-size: 15px !important;
        }


    </style>
    <!-- Content Wrapper. Contains page content -->

    <section class="content p-4">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Dokumen Berkaitan</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {!! $dokumen_desc->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h3 class="px-2">MUAT TURUN BORANG DAN CONTOH SURAT RASMI PERMOHONAN DATA-DATA ASAS</h3>
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Senarai Borang (Dokumen)</th>
                                        <th width="10%">Muat Turun</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dokumen_utama as $dokumen)
                                        @if ($dokumen->doc_type == 'Borang')
                                            <tr>
                                                <td>{{ $dokumen->doc_name }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm {{ is_null($dokumen->doc_path) ? 'disabled' : '' }}"
                                                        href="{{ $dokumen->doc_path }}" role="button" target="blank">Muat
                                                        Turun</a>
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Contoh Dokumen</th>
                                        <th width="10%">Muat Turun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dokumen_utama as $dokumen)
                                        @if ($dokumen->doc_type == 'Contoh')
                                            <tr>
                                                <td>{{ $dokumen->doc_name }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm {{ is_null($dokumen->doc_path) ? 'disabled' : '' }}"
                                                        href="{{ $dokumen->doc_path }}" role="button" target="blank">Muat
                                                        Turun</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <p>
                                Contoh Surat Permohonan Rasmi &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-primary btn-sm"
                                    href="{{ URL::to('/') }}/afiqadminmygeo_files/dokumen_berkaitan/borang surat permohonan data ass.docx"
                                    role="button" target="blank">Muat Turun</a>
                            </p>
                            <br>
                            <p>
                                Contoh Salinan Lesen Hak Cipta &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary btn-sm" href="javascript:void(0);" role="button"
                                    style="cursor:default;">Muat Turun</a>
                            </p>
                            <br>
                            <p>
                                Contoh Salinan Kad Pengenalan &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary btn-sm" href="javascript:void(0);" role="button"
                                    style="cursor:default;">Muat Turun</a>
                            </p>
                            <br>
                            <p>
                                Borang Undertaking by appointed Consultant/Contractor &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-primary btn-sm"
                                    href="{{ URL::to('/') }}/afiqadminmygeo_files/dokumen_berkaitan/Lampiran III_Letter Undertaking Consultant_Contractor.pdf"
                                    role="button" target="blank">Muat Turun</a>
                            </p>
                            <br>
                            <p>
                                Borang PPNM-1 Permohonan Lesen Hak Cipta / Membeli Dokumen Geospatial Secara Terperingkat
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-primary btn-sm"
                                    href="{{ URL::to('/') }}/afiqadminmygeo_files/dokumen_berkaitan/Borang PPNM PlanMalaysiaTerengganu.pdf"
                                    role="button" target="blank">Muat Turun</a>
                            </p>
                            <br>
                            <br> --}}
                            <br>
                            <p style="font-size: 13px; font-style: italic">
                                NOTA : Semua dokumen di atas adalah dalam fail "Portable Document Format" (PDF).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
