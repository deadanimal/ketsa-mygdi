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
                        <div class="col-lg-12 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Akuan Penerimaan Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Mohon Data
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Akuan Penerimaan Data
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        {{-- <div class="col-lg-6 col-5 text-right">

                        </div> --}}
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
                                        <h3 class="text-white text-center mb-0">BORANG PENGESAHAN PENERIMAAN MAKLUMAT
                                            GEOSPATIAL MELALUI
                                            MYGDI</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="/simpan_akuan_terima" method="POST">
                                    @csrf
                                    <ol>
                                        <li>Saya bagi pihak Kementerian Tenaga dan Sumber Asli dengan ini mengesahkan telah
                                            menerima data geospatial MyGDI dari Pusat Geospatial Negara (PGN), Kementerian
                                            Tenaga dan Sumber Asli (KeTSA) seperti di <span class="text-bold">Lampiran
                                                1.</span>
                                        </li><br>
                                        <li> Kami memahami;</li><br>
                                        <dl>
                                            <ol type="i">
                                                <li>
                                                    Penggunaan data ini adalah terikat dengan Pekeliling Am Bil 1/2007:
                                                    Pekeliling Arahan Keselamatan Terhadap Dokumen Geospatial Terperingkat,
                                                    Akta Rahsia Rasmi 1972 dan Surat Pekeliling Am Bil 1 Tahun 1997 :
                                                    Peraturan Pemeliharaan Rekod-Rekod Kerajaan.
                                                </li>
                                                <li>
                                                    Sebarang bentuk penggunaan data ini selain daripada tujuan yang
                                                    dinyatakan dalam
                                                    surat permohonan perlulah mendapat kebenaran daripada pihak Agensi
                                                    Pembekal
                                                    Data
                                                    (APD) iaitu Jabatan Pertanian, JUPEM, JPSM, JPS dan MPOB.
                                                </li>
                                                <li>
                                                    Sebarang bentuk pemindahan data ini kepada pihak ketiga atau penyalinan
                                                    semula
                                                    data ini dalam sebarang bentuk/medium data adalah dilarang sama sekali.
                                                </li>
                                                <li>
                                                    Pihak APD dan PGN tidak bertanggungjawab terhadap sebarang kehilangan
                                                    atau
                                                    kerosakan yang dialami kerana menggunakan maklumat ini.
                                                </li>
                                            </ol>
                                            <div class="custom-control custom-checkbox m-5">
                                                <input class="custom-control-input checkAkuanTerima" id="customCheck1"
                                                    type="checkbox" data-permohonanid="{{ $permohonan->id }}"
                                                    {{ $permohonan->acceptance == '1' ? 'checked disabled' : '' }}>
                                                <label class="custom-control-label" for="customCheck1">Saya terima terma dan
                                                    syarat diatas berikut</label>
                                            </div>
                                        </dl>
                                    </ol>

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
        $('.checkAkuanTerima').change(function() {
            var permohonan_id = $(this).data('permohonanid');
            var newStatus = '';
            var newStatusText = '';
            if ($(this).prop('checked')) {
                newStatus = '1';
                newStatusText = 'Aktif';
            } else {
                newStatus = '0';
                newStatusText = 'Tidak Aktif';
            }

            $.ajax({
                method: "POST",
                url: "{{ url('change_akuan_terima') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "permohonan_id": permohonan_id,
                    "acceptance": newStatus
                },
            }).done(function(response) {
//                alert("Akuan Penerimaan Data telah direkodkan.");
                // $('#tdUserStatus' + userid).html(newStatusText);
                swal({
                    title: "Akuan Penerimaan Data",
                    text: "Berjaya disahkan!",
                    type: "success",
                    showConfirmButton: false,
                }).then(function(result) {
                    window.open("{{ $permohonan->proses_datas->pautan_data }}",'_blank');
                    window.location.reload();
                });
            });
        });

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
