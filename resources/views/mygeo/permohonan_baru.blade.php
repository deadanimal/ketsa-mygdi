@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>


    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header ">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Permohonan Baru</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Permohonan Baru
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
                                        <h3 class="mb-0">Senarai Permohonan Baru</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        {{-- <a href="{{url('mohon_data_asas_baru')}}" data-toggle="modal" data-target="#modal-senarai-kawasan-data">
                                        <button type="button" class="btn btn-sm btn-default float-right"><i class="fas fa-plus mr-2"></i>Permohonan Baru</button>
                                    </a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK PERMOHONAN</th>
                                            <th>NAMA PEMOHON</th>
                                            <th>KATEGORI</th>
                                            <th>TARIKH</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            @if (isset($permohonan->users))
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $permohonan->name }}</td>
                                                    <td>{{ $permohonan->users->name }}</td>
                                                    <td>{{ $permohonan->users->kategori }}</td>
                                                    <td>{{ Carbon\Carbon::parse($permohonan->date)->format('d/m/Y') }}
                                                    </td>
                                                    <td>
                                                        @if (auth()->user()->email == 'pentadbirdata1@gmail.com')
                                                            <a href="{{ url('lihat_permohonan/' . $permohonan->id) }}"
                                                                class="btn btn-sm btn-success text-center">Semak</a>
                                                            <button type="button"
                                                                data-permohonanid="{{ $permohonan->id }}"
                                                                class="btnDelete btn btn-sm btn-danger mr-2"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @else
                                                            <a href="{{ url('lihat_permohonan/' . $permohonan->id) }}"
                                                                class="btn btn-sm btn-success text-center">Semak</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
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
                "dom": "<'row'<'col-sm-6'l><'col-sm-0 text-center'><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'i><'col-sm-7'p>>",
                "scrollX": true,
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
                    "sInfoEmpty": "Paparan 0 rekod (0 hingga 0)",
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
