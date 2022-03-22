@extends('layouts.app_mygeo_ketsa')

@section('content')

<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
                    <div class="col-lg-8 col-6">
                        <h6 class="h2 text-dark d-inline-block mb-0">Pengurusan Pengguna</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengurusan Pengguna
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Senarai Penerbit Dan Pengesah
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-2 text-right">

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
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h3 class="mb-0">Senarai Penerbit Dan Pengesah</h3>
                                </div>
                                <div class="col-7 text-right">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="table_newUsers" class="table table-bordered table-striped" style="overflow: auto;">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Nama</th>
                                            <th>Agensi</th>
                                            <th>Bahagian</th>
                                            <th>Peranan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $bil = 1;
                                        foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ (isset($user->agensiOrganisasi->name) ? $user->agensiOrganisasi->name:"") }}</td>
                                                <td>{{ $user->bahagian }}</td>
                                                <td>
                                                    <?php
                                                    // if (count($user->getRoleNames()) > 0) {
                                                    //     foreach ($user->getRoleNames() as $role) {
                                                    //         echo $role . "<br>";
                                                    //     }
                                                    // }
                                                    if($user->assigned_roles != ""){
                                                        $roles = explode(',',$user->assigned_roles);
                                                        foreach($roles as $r){
                                                            echo $r."<br>";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $bil++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        var table = $("#table_newUsers").DataTable({
            "orderCellsTop": true,
            "ordering": false,
            "responsive": false,
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
            },
        });

        // Setup - add a text input to each footer cell
        $('#table_newUsers thead tr').clone(true).appendTo('#table_newUsers thead');
        $('#table_newUsers thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search '+title+'" class="form-control"/>');
            $('input',this).on('keyup change', function(){
                if(table.column(i).search() !== this.value){
                    table.column(i).search(this.value).draw();
                }
            });
        });

        <?php
        if (Session::has('message')) {
            ?>
            //alert("{{ Session::get('message') }}");
            <?php
        }
        ?>
    });
</script>

@stop
