@extends('layouts.app_mygeo_afiq')

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
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-12 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Akuan Penerimaan dan Penilaian Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Akuan Penerimaan dan Penilaian Data
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        {{-- <div class="col-lg-6 col-5 text-right">

                        </div> --}}
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
                                        <h3 class="mb-0">Senarai Akuan Penerimaan dan Penilaian Data</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PERMOHONAN</th>
                                            <th>TARIKH</th>
                                            <th>AKUAN PENERIMAAN DATA</th>
                                            <th>PENILAIAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->date)->format('d/m/Y') }}</td>
                                                <td>
                                                    @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                                        <a href="/akuan_penerimaan/{{ $permohonan->id }}"
                                                            class="btn btn-sm btn-primary text-center">
                                                            Lihat
                                                    @else
                                                            @if($permohonan->acceptance == '1')
                                                            <span class="badge badge-pill badge-success">Selesai</span>
                                                            @endif
                                                            <a href="/akuan_penerimaan/{{ $permohonan->id }}" @if ($permohonan->acceptance == '1') hidden @endif
                                                                class="btn btn-sm btn-primary text-center">
                                                                Buat Akuan Penerimaan
                                                    @endif

                                                    </a>
                                                </td>
                                                <td>
                                                    @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                                        <a href="/penilaian_pemohon/{{ $permohonan->id }}"
                                                            class="btn btn-sm btn-info text-center">
                                                            Lihat
                                                    @else
                                                            @if($permohonan->penilaian == '1')
                                                            <span class="badge badge-pill badge-success">Selesai</span>
                                                            @endif
                                                            <a href="{{ url('/penilaian_pemohon/'.$permohonan->id) }}" @if ($permohonan->penilaian == '1') hidden @endif
                                                                class="btn btn-sm btn-info text-center">
                                                                Buat Penilaian
                                                    @endif
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

        $(document).on("click", ".btnDelete", function() {
            var user_id = $(this).data('permohonanid');
            var permohonan_id = $(this).data('permohonanid');
            var r = confirm("Adakah anda pasti untuk padam permohonan ini?");
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
    </script>
@stop
