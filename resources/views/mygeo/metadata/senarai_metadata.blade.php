@extends('layouts.app_mygeo_ketsa')

@section('content')
    <style>
        thead input {
            width: 100%;
        }

    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Senarai Metadata</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Senarai Metadata
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
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Senarai Metadata</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <form id="form_search" method="GET" action="{{ url('mygeo_senarai_metadata') }}"
                                    class="pl-lg-4">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label for="">Nama Metadata</label>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" name="cari_metadata" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3"><label for="">Kategori</label></div>
                                        <div class="col-5">
                                            <select name="cari_kategori" class="form-control form-control-sm">
                                                <option value="">Pilih...</option>
                                                <option value="dataset"
                                                    {{ isset($_GET['cari_kategori']) && $_GET['cari_kategori'] == 'dataset' ? 'selected' : '' }}>
                                                    Dataset</option>
                                                <option value="services"
                                                    {{ isset($_GET['cari_kategori']) && $_GET['cari_kategori'] == 'services' ? 'selected' : '' }}>
                                                    Services</option>
                                                <option value="imagery"
                                                    {{ isset($_GET['cari_kategori']) && $_GET['cari_kategori'] == 'imagery' ? 'selected' : '' }}>
                                                    Imagery</option>
                                                <option value="gridded"
                                                    {{ isset($_GET['cari_kategori']) && $_GET['cari_kategori'] == 'gridded' ? 'selected' : '' }}>
                                                    Gridded</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3"><label for="">Nama / ID Penerbit</label></div>
                                        <div class="col-5"> 
                                            <select name="nama_id_penerbit" class="form-control form-control-sm">
                                                <option value="">Pilih...</option>
                                                <?php
                                                if(isset($penerbits) && count($penerbits) > 0){
                                                    foreach($penerbits as $key=>$val){
                                                        ?>
                                                        <option value="{{ $key }}" {{ isset($_GET['nama_id_penerbit']) && $_GET['nama_id_penerbit'] == $key ? 'selected' : '' }}>{{ ucfirst($val) }}</option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3"><label for="">Status</label></div>
                                        <div class="col-5"> 
                                            <select name="cari_status"
                                                class="form-control form-control-sm">
                                                <option value="">Pilih...</option>
                                                <option value="draf"
                                                    {{ isset($_GET['cari_status']) && $_GET['cari_status'] == 'draf' ? 'selected' : '' }}>
                                                    Draf</option>
                                                <option value="perlu_pengesahan"
                                                    {{ isset($_GET['cari_status']) && $_GET['cari_status'] == 'perlu_pengesahan' ? 'selected' : '' }}>
                                                    Perlu Pengesahan</option>
                                                <option value="diterbitkan"
                                                    {{ isset($_GET['cari_status']) && $_GET['cari_status'] == 'diterbitkan' ? 'selected' : '' }}>
                                                    Diterbitkan</option>
                                                <option value="perlu_pembetulan"
                                                    {{ isset($_GET['cari_status']) && $_GET['cari_status'] == 'perlu_pembetulan' ? 'selected' : '' }}>
                                                    Perlu Pembetulan</option>
                                            </select>
                                        </div>
                                        <div class="col-3 px-0">
                                            <button type="button" id="btnResetCarian" class="btn btn-primary btn-sm mr-1">Set
                                                Semula</button>
                                            <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                                        </div>
                                    </div>
                            </form>


                            <div style="overflow-x:auto;">
                                <table id="table_metadatas" class="table table-bordered table-striped"
                                    style="overflow: auto;">
                                    <thead>
                                        <tr>
                                            @if (auth::user()->hasRole(['Pengesah Metadata']))
                                                <th>Bil</th>
                                                <th>Nama Metadata</th>
                                                <th>Nama Penerbit</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                                <th>Tarikh</th>
                                                <th>Tindakan</th>
                                            @elseif(auth::user()->hasRole(['Pentadbir Metadata']))
                                                <th>Bil</th>
                                                <th>Nama Metadata</th>
                                                <th>Nama Penerbit</th>
                                                <th>Nama Agensi</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                                <th>Tarikh</th>
                                                <th>Tindakan</th>
                                            @elseif(auth::user()->hasRole(['Penerbit Metadata', 'Pentadbir Aplikasi']))
                                                <th>Bil</th>
                                                <th>Metadata</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                                <th>Tarikh</th>
                                                <th>Tindakan</th>
                                            @else
                                                <th>Bil</th>
                                                <th>Metadata</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    $bil = ($metadatasdb->currentPage()-1)* $metadatasdb->perPage()+($metadatasdb->total() ? 1:0);
                    if(count($metadatas) > 0){
                      foreach($metadatas as $key=>$val){
                          if(isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString)){
                          }
                        ?>
                        <tr>
                          <td>{{ $bil }}</td>
                          <td>
                              <?php
                                echo $val[1]->title;
                               ?>
                          </td>
                          @if(Auth::user()->hasRole(['Pengesah Metadata']))
                              <?php //################################## ?>
                          <td>
                            {{ (isset($val[2]->name) ? $val[2]->name:"") }}
                          </td>
                            <td>
                                <?php
                                $r = "";
                                $arr = (array)$val[0]->hierarchyLevel->MD_ScopeCode;
                                foreach($arr as $ar){
                                    if(is_array($ar)){
                                        $r = $ar['codeListValue'];
                                    }
                                }
                                echo ucfirst($r);
                                ?>
                             </td>
                                <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pengesahan</strong></span>';
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                            <td <?php echo $style; ?>>
                                <?php echo $status; ?>
                            </td>
                          <td>
                              {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
                          </td>
                          <td class="pr-1">
                            <div class="form-inline">
                                <?php //lihat(view only)================================ ?>
                                <form method="post" action="{{ url('/lihat_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                </form>
                                <?php //kemaskini======================================= ?>
                                <a href="{{ url('/kemaskini_metadata/'.$val[1]->id) }}">
                                    <button type="button" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                </a>
                                <?php //delete========================================== ?>
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @elseif(auth::user()->hasRole(['Pentadbir Metadata']))
                             <?php //################################## ?>
                         <td>
                              {{ (isset($val[2]->name) ? $val[2]->name:"") }}
                          </td>
                         <td>
                              {{ (isset($val[2]->agensiOrganisasi->name) ? $val[2]->agensiOrganisasi->name:"") }}
                          </td>
                            <td>
                                <?php
                                //SMBG SINI - best way yet to get category from xml
                                $r = "";
                                $arr = (array)$val[0]->hierarchyLevel->MD_ScopeCode;
                                foreach($arr as $ar){
                                    if(is_array($ar)){
                                        $r = $ar['codeListValue'];
                                    }
                                }
                                echo ucfirst($r);
                                ?>
                             </td>
                             <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pengesahan</strong></span>';
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                            <td <?php echo $style; ?>>
                                <?php echo $status; ?>
                            </td>
                          <td>
                              {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
                          </td>
                          <td class="pr-1">
                            <div class="form-inline">
                                <?php //lihat(view only)================================ ?>
                                <form method="post" action="{{ url('/lihat_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                </form>
                                <?php //kemaskini======================================= ?>
                                <a href="{{ url('/kemaskini_metadata/'.$val[1]->id) }}">
                                    <button type="button" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                </a>
                                <?php //delete========================================== ?>
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @elseif(auth::user()->hasRole(['Penerbit Metadata','Pentadbir Aplikasi']))
                             <?php //################################## ?>
                            <td>
                                <?php
                                $r = "";
                                $arr = (array)$val[0]->hierarchyLevel->MD_ScopeCode;
                                foreach($arr as $ar){
                                    if(is_array($ar)){
                                        $r = $ar['codeListValue'];
                                    }
                                }
                                echo ucfirst($r);
                                ?>
                             </td>
                             <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pengesahan</strong></span>';
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                             <td <?php echo $style; ?>>
                                <?php echo $status; ?>
                          </td>
                          <td>
                              {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
                          </td>
                          <td class="pr-1">
                            <div class="form-inline">
                                <?php //lihat(view only)================================ ?>
                                <form method="post" action="{{ url('/lihat_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                </form>
                                <?php //kemaskini======================================= ?>
                                <a href="{{ url('/kemaskini_metadata/'.$val[1]->id) }}">
                                    <button type="button" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                </a>
                                <?php //delete========================================== ?>
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @else
                             <?php //################################## ?>
                            <td>
                                <?php
                                $r = "";
                                $arr = (array)$val[0]->hierarchyLevel->MD_ScopeCode;
                                foreach($arr as $ar){
                                    if(is_array($ar)){
                                        $r = $ar['codeListValue'];
                                    }
                                }
                                echo ucfirst($r);
                                ?>
                             </td>
                             <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pengesahan</strong></span>';
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
//                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                             <td <?php echo $style; ?>>
                                fart<?php echo $status; ?>
                          </td>
                          <td class="pr-1">
                            <div class="form-inline">
                                <?php //lihat(view only)================================ ?>
                                <form method="post" action="{{ url('/lihat_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                </form>
                                <?php //kemaskini======================================= ?>
                                <a href="{{ url('/kemaskini_metadata/'.$val[1]->id) }}">
                                    <button type="button" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                </a>
                                <?php //delete========================================== ?>
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @endif
                        </tr>
                        <?php
                        $bil++;
                      }
                    }
                    ?>
                                    </tbody>
                                </table>

                                {{ isset($metadatasdb) && !empty($metadatasdb) ? $metadatasdb->withQueryString()->links() : '' }}

                                Paparan {{ $metadatasdb->total() }} rekod
                                ({{ ($metadatasdb->currentPage() - 1) * $metadatasdb->perPage() + ($metadatasdb->total() ? 1 : 0) }}
                                hingga
                                {{ ($metadatasdb->currentPage() - 1) * $metadatasdb->perPage() + count($metadatasdb) }})

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

            var table = $("#table_metadatas").DataTable({
                "paging": false,
                "bInfo": false,
                "orderCellsTop": true,
                "ordering": false,
                "responsive": false,
                "autoWidth": true,
                "bFilter": false,
                "oLanguage": {
                    // "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
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

            $(document).on("click", "#btnResetCarian", function() {
                window.location.href = "{{ url('mygeo_senarai_metadata') }}";
            });

            $('#tarikh_mula_div,#tarikh_tamat_div').datetimepicker({
                format: 'DD-MM-YYYY H:mm:ss',
                // format: 'L'
            });

            $(document).on('click', '.btnDelete', function() {
                var conf = confirm('Anda pasti untuk menghapus metadata?');
                if (conf) {
                    $(this).parent().submit();
                }
            });
        });
    </script>
@stop
