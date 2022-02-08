@extends('layouts.app_mygeo_ketsa')

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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
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
                                <h3 class="card-title" style="font-size: 2rem;">Audit Trail</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('audit_trail') }}" method="POST" id="formFilter">
                                    @csrf
                                    <label for="reservation">Sela Masa</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="dateRange" id="dateRange" value="{{ $var }}">
                                    </div>
                                </form>
                                <br><br>
                                <table id="table_audit_trail" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>PATH</th>
                                            <th>USER</th>
                                            <th>ACTION</th>
                                            <th>DATE ACCESSED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 1;
                                        foreach ($audit_trails as $at){
                                            if(!isset($at->getUser->name)){
//                                                break;
                                            }
                                            ?>
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ $at->path }}</td>
                                                <td>{{ (isset($at->getUser->name) ? $at->getUser->name:"") }}</td>
                                                <td>
                                                    <small class="badge badge-success">{{ $at->data }}</small>
                                                </td>
                                                <td>{{ date('d/m/Y H:m:s',strtotime($at->created_at)) }}</td>
                                            </tr>
                                            <?php
                                            $counter++;
                                        }
                                        ?>
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
            var table = $("#table_audit_trail").DataTable({
                "orderCellsTop": true,
                "ordering": false,
                "responsive": false,
                "autoWidth": true,
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

            $('#dateRange').daterangepicker({
                locale: {
                    format: 'DD/M/Y'
                }
            });
            $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
                $('#formFilter').submit();
            });

            $('#table_agensi_organisasi thead tr').clone(true).appendTo('#table_agensi_organisasi thead');
            $('#table_agensi_organisasi thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search '+title+'" class="form-control"/>');
                $('input',this).on('keyup change', function(){
                    if(table.column(i).search() !== this.value){
                        table.column(i).search(this.value).draw();
                    }
                });
            });
        });

        $('#formKemaskiniBahagian .sektor').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi_by_sektor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "sektor": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                $('#formKemaskiniBahagian .agensi_organisasi').html('');
                $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos, function(index,value) {
                    $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="'+value.name+'">'+value.name+'</option>');
                });
            });
        });
    </script>
@stop
