@extends('layouts.app_mygeo_afiq2')

@section('content')

    <style>
        .ftest {
            display: inline;
            width: auto;
        }



    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header bg-admin">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Laporan Metadata</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Laporan Metadata
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">

                        </div>
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
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Laporan Perincian Metadata</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                <table id="laporan_perincian" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK LAPORAN</th>
                                            <th>STATUS PENERBITAN METADATA</th>
                                            <th>TARIKH PENJANAAN LAPORAN</th>
                                            <th>PERINCIAN MAKLUMAT METADATA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($metadatas as $key => $val)
                                            <?php $counter++; ?>
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>
                                                    <?php echo $val[1]->title; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $status = '';
                                                    if ($val[1]->is_draf == 'yes') {
                                                        $status = 'Draf';
                                                    } else {
                                                        if ($val[1]->disahkan == '0') {
                                                            $status = 'Perlu Pengesahan';
                                                        } elseif ($val[1]->disahkan == 'yes') {
                                                            $status = 'Diterbitkan';
                                                        } elseif ($val[1]->disahkan == 'yes') {
                                                            $status = 'Perlu Pembetulan';
                                                        }
                                                    }
                                                    echo $status;
                                                    ?>
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($val[1]->changedate)) }}</td>
                                                <td>
                                                    <form action='{{ url('lihat_metadata_nologin') }}' method='POST'>
                                                        @csrf
                                                        <input type='hidden' name='metadata_id' value='{{ $key }}'>
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary mr-2">Perincian</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>JUMLAH KESELURUHAN METADATA</th>
                                        <th>{{ count($metadatas) }}</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Laporan Statistik Penerbitan Metadata</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan keseluruhan metadata yang diterbitkan (Mengikut
                                    agensi)</h4>
                                <table id="laporan_seluruh" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA METADATA</th>
                                            <th>AGENSI</th>
                                            <th>PENERBIT</th>
                                            <th>KATEGORI</th>
                                            <th>TARIKH DITERBITKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($metadatas as $key => $val)
                                            @if ($val[1]->disahkan == 'yes')
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>
                                                        <?php echo $val[1]->title; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $agency = '';
                                                        if (isset($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) != '') {
                                                            $agency = $val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString;
                                                        }
                                                        echo $agency;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $publisher = '';
                                                        if (isset($val[0]->contact->CI_ResponsibleParty->individualName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->individualName->CharacterString) != '') {
                                                            $publisher = $val[0]->contact->CI_ResponsibleParty->individualName->CharacterString;
                                                        }
                                                        echo $publisher;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $category = '';
                                                        if (isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != '') {
                                                            $category = trim($val[0]->hierarchyLevel->MD_ScopeCode);
                                                        }
                                                        echo $category;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        {{ date('d/m/Y', strtotime($val[1]->changedate)) }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>JUMLAH KESELURUHAN METADATA</th>
                                        <th>{{ $counter }}</th>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan metadata yang belum diterbitkan</h4>
                                <table id="laporan_lulus" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA METADATA</th>
                                            <th>AGENSI</th>
                                            <th>STATUS</th>
                                            <th>KATEGORI</th>
                                            <th>TARIKH DITERBITKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($metadatas as $key => $val)
                                            @if ($val[1]->disahkan == 'no' || $val[1]->disahkan == '0' || $val[1]->is_draf == 'yes')
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>
                                                        <?php echo $val[1]->title; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $agency = '';
                                                        if (isset($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) != '') {
                                                            $agency = $val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString;
                                                        }
                                                        echo $agency;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = '';
                                                        if ($val[1]->is_draf == 'yes') {
                                                            $status = 'Draf';
                                                        } else {
                                                            if ($val[1]->disahkan == '0') {
                                                                $status = 'Perlu Pengesahan';
                                                            } elseif ($val[1]->disahkan == 'yes') {
                                                                $status = 'Diterbitkan';
                                                            } elseif ($val[1]->disahkan == 'yes') {
                                                                $status = 'Perlu Pembetulan';
                                                            }
                                                        }
                                                        echo $status;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $category = '';
                                                        if (isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != '') {
                                                            $category = trim($val[0]->hierarchyLevel->MD_ScopeCode);
                                                        }
                                                        echo $category;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        {{ date('d/m/Y', strtotime($val[1]->changedate)) }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>JUMLAH KESELURUHAN METADATA</th>
                                        <th>{{ $counter }}</th>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Bilangan metadata mengikut kategori</h4>
                                <div class="table-responsive">
                                    <table id="laporan_kategori" class="table table-bordered table-striped"
                                        style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>BIL</th>
                                                <th>NAMA METADATA</th>
                                                <th>AGENSI</th>
                                                <th>STATUS</th>
                                                <th>KATEGORI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @foreach ($metadatas as $key => $val)
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>
                                                        <?php echo $val[1]->title; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $agency = '';
                                                        if (isset($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) != '') {
                                                            $agency = $val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString;
                                                        }
                                                        echo $agency;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = '';
                                                        if ($val[1]->is_draf == 'yes') {
                                                            $status = 'Draf';
                                                        } else {
                                                            if ($val[1]->disahkan == '0') {
                                                                $status = 'Perlu Pengesahan';
                                                            } elseif ($val[1]->disahkan == 'yes') {
                                                                $status = 'Diterbitkan';
                                                            } elseif ($val[1]->disahkan == 'yes') {
                                                                $status = 'Perlu Pembetulan';
                                                            }
                                                        }
                                                        echo $status;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $category = '';
                                                        if (isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != '') {
                                                            $category = trim($val[0]->hierarchyLevel->MD_ScopeCode);
                                                        }
                                                        echo $category;
                                                        ?>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>JUMLAH KESELURUHAN METADATA</th>
                                            <th>{{ $counter }}</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="heading text-muted">Statistik penerbitan metadata mengikut tahun/bulan</h4>
                                <div class="table-responsive">
                                    <table id="laporan_statistik" class="table table-bordered table-striped"
                                        style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>BIL</th>
                                                <th>NAMA METADATA</th>
                                                <th>AGENSI</th>
                                                <th>BILANGAN METADATA DITERBITKAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @foreach ($metadatas as $key => $val)
                                                @if ($val[1]->disahkan == 'yes')
                                                    <?php $counter++; ?>
                                                    <tr>
                                                        <td>{{ $counter }}</td>
                                                        <td>
                                                            <?php echo $val[1]->title; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $agency = '';
                                                            if (isset($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString) != '') {
                                                                $agency = $val[0]->contact->CI_ResponsibleParty->organisationName->CharacterString;
                                                            }
                                                            echo $agency;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            TBA
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>JUMLAH KESELURUHAN METADATA</th>
                                            <th>{{ $counter }}</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#laporan_perincian").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'Laporan Perincian Permohonan Metadata',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'Laporan Perincian Permohonan Metadata',
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'Laporan Perincian Permohonan Metadata',
                    },
                    {
                        text: 'Word',
                        className: 'btn btn-sm btn-primary btn_download_word_laporan_perincian_metadata',
                        title: 'Laporan Perincian Permohonan Metadata',
                    }
                ],
                "scrollX": true,
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

        $(document).ready(function() {
            $("#laporan_kategori").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    },
                    {
                        text: 'Word',
                        className: 'btn btn-sm btn-primary btn_download_word_laporan_bil_mohon_ikut_kategori',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA MENGIKUT KATEGORI',
                    }
                ],
                "scrollX": true,
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

    <script>
        $(document).ready(function() {
            $("#laporan_statistik").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    },
                    {
                        text: 'Word',
                        className: 'btn btn-sm btn-primary btn_download_word_laporan_stat_mohon_ikut_tahun',
                        title: 'LAPORAN STATISTIK PERMOHONAN DATA MENGIKUT TAHUN',
                    }
                ],
                "scrollX": true,
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
        $(document).ready(function() {
            $("#laporan_lulus").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    },
                    {
                        text: 'Word',
                        className: 'btn btn-sm btn-primary btn_download_word_laporan_bil_mohon_lulus',
                        title: 'LAPORAN BILANGAN PERMOHONAN DATA YANG TELAH DILULUSKAN',
                    }
                ],
                "scrollX": true,
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
        $(document).ready(function() {
            $("#laporan_seluruh").DataTable({
                "dom": "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "buttons": [{
                        extend: 'csv',
                        className: 'btn btn-sm btn-danger',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-success',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)'
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-sm btn-primary',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)'
                    },
                    {
                        text: 'Word',
                        className: 'btn btn-sm btn-primary btn_download_word_laporan_bil_metadata_terbit_ikut_agensi',
                        title: 'BILANGAN KESELURUHAN METADATA YANG DITERBITKAN (MENGIKUT AGENSI)',
                    }
                ],
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": true,
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

        $(document).ready(function() {
            $(document).on("click", ".btn_download_word_laporan_perincian_metadata", function() {
                window.open("{{ url('download_laporan_perincian_metadata') }}", '_blank');
            });
            $(document).on("click", ".btn_download_word_laporan_bil_metadata_terbit_ikut_agensi", function() {
                window.open("{{ url('download_laporan_bil_metadata_terbit_ikut_agensi') }}", '_blank');
            });
            $(document).on("click", ".btn_download_word_laporan_bil_mohon_lulus", function() {
                window.open("{{ url('download_laporan_bil_mohon_lulus') }}", '_blank');
            });
            $(document).on("click", ".btn_download_word_laporan_bil_mohon_ikut_kategori", function() {
                window.open("{{ url('download_laporan_bil_mohon_ikut_kategori') }}", '_blank');
            });
            $(document).on("click", ".btn_download_word_laporan_stat_mohon_ikut_tahun", function() {
                window.open("{{ url('download_laporan_stat_mohon_ikut_tahun') }}", '_blank');
            });

            $(document).on("click", ".btnDelete", function() {
                var user_id = $(this).data('permohonanid');
                var permohonan_id = $(this).data('permohonanid');
                var r = confirm("Adakah anda pasti untuk padam metadata ini?");
                if (r == true) {
                    $.ajax({
                        method: "POST",
                        url: "delete_permohonan",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "user_id": user_id,
                            "permohonan_id": permohonan_id
                        },
                    }).done(function(response) {
                        alert("Permohonan berjaya dipadam.");
                        location.reload();
                    });
                }
            });
        });
    </script>



@stop
