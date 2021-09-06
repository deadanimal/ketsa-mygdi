@extends('layouts.app_mygeo_afiq')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">

     <!-- SweetAlert2 -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <style>
    </style>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Muat Turun Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Muat Turun Data
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
                                        <h3 class="mb-0">Senarai Muat Turun Data</h3>
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
                                            <th>STATUS</th>
                                            <th>TARIKH</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>
                                                    @if (!empty($permohonan->proses_datas->pautan_data))
                                                        <span class="badge badge-pill badge-success">Data Tersedia</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Dalam Proses</span>
                                                    @endif
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->date)->format('d/m/Y') }}</td>
                                                <td>
                                                    <a @if(!empty($permohonan->proses_datas->pautan_data)) data-pemohonid='{{ $permohonan->id }}' data-acceptance='{{ $permohonan->acceptance }}' class="text-success download" disabled href="{{ $permohonan->proses_datas->pautan_data }}" @endif><span
                                                            class="fas fa-download mr-2"></span>
                                                        Muat Turun</a>
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

        $('.download').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            var pemohonid = $(this).data('pemohonid');
            var acceptance = $(this).data('acceptance');
            
            if(acceptance == '1'){
                window.open("{{ (isset($permohonan->proses_datas) ? $permohonan->proses_datas->pautan_data:'') }}",'_blank');
                window.location.reload();
            }else{
                swal({
                    title: "Akuan Penerimaan Data",
                    type: "warning",
                    input: "checkbox",
                    inputPlaceholder: " Sila klik kotak 'checkbox' untuk mengesah akuan penerimaan data",
                    buttonsStyling: false,
                    allowOutsideClick: false,
                    confirmButtonClass: "btn btn-warning",
                    confirmButtonText: 'Seterusnya&nbsp;<i class="fa fa-arrow-right"></i>',
                    footer: '<a href>Baca Akuan Penerimaan Data</a>',
                    inputValidator: (result) => {
                        return !result && "Anda perlu sahkan akuan penerimaan data ini!";
                    },
                }).then(function(result) {
    //                window.location.href = url;
                    window.location.href = "{{ url('/akuan_penerimaan/') }}"+"/"+pemohonid;
    //                window.open(url, '_blank');
                });     
            }
        });
    </script>
@stop
