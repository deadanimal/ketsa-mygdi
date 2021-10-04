@extends('layouts.app_mygeo_ketsa')

@section('content')

<style>
    .ftest {
        display: inline;
        width: auto;
    }

    .fautocomplete #searchResult{
        list-style: none;
        padding: 0px;
        position: absolute;
        margin: 0;
        z-index: 1;
   }

   .fautocomplete #searchResult li{
        background: lavender;
        padding: 4px;
        margin-bottom: 1px;
   }

   .fautocomplete #searchResult li:hover{
        cursor: pointer;
   }
    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
    }
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }
    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }
    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
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
                                <h3 class="card-title" style="font-size: 2rem;">Senarai Agensi / Organisasi</h3>
                                <button type="button" class="btn btn-sm btn-default float-right dropdown-toggle" data-toggle="dropdown"><i class="fas fa-plus mr-2"></i>Tambah</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_tambah_agensi_organisasi">Agensi / Organisasi +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_tambah_bahagian">Bahagian +</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_agensi_organisasi" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>SEKTOR</th>
                                            <th>AGENSI / ORGANISASI</th>
                                            <th>BAHAGIAN</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 1;
                                        foreach ($aos as $ao){
                                            ?>
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ ($ao->sektor == '1' ? 'Kerajaan':'Swasta') }}</td>
                                                <td>{{ $ao->name }}</td>
                                                <td>{{ ($ao->bahagian != "" ? $ao->bahagian:$ao->name) }}</td>
                                                <td>
                                                    @if($ao->bahagian != "")
                                                    <button type="button" class="btn btn-sm btn-success btnKemaskiniBahagian" data-rowid="{{ $ao->id }}" data-toggle="modal" data-target="#modal_kemaskini_bahagian">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-sm btn-success btnKemaskiniAgensiOrganisasi" data-rowid="{{ $ao->id }}" data-toggle="modal" data-target="#modal_kemaskini_agensi_organisasi">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    @endif
                                                    @if($ao->bahagian != "")
                                                    <button type="button" data-rowid="{{ $ao->id }}" data-type="bahagian" class="btnDelete btn btn-sm btn-danger mx-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" data-rowid="{{ $ao->id }}" data-type="agensi_organisasi" class="btnDelete btn btn-sm btn-danger mx-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @endif
                                                </td>
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


        <div class="modal fade" id="modal_tambah_agensi_organisasi">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Agensi / Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_agensi_organisasi') }}" id="formTambahAgensiOrganisasi">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama Agensi / Organisasi</label>
                                    <!--<input type="text" name="namaAgensiOrganisasi" class="form-control form-control-sm namaAgensiOrganisasi">-->
                                    
                                    <div class="fautocomplete">
                                        <div>
                                            <div class="autocomplete" style="width:300px;">
                                                <input type="text" name="namaAgensiOrganisasi" id="namaAgensiOrganisasi" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <ul id="searchResult"></ul>
                                        <div class="clear"></div>
                                    </div>
                                    
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanAgensiOrganisasi">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_tambah_bahagian">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Bahagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_agensi_organisasi') }}" id="formTambahBahagian">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Agensi / Organisasi</label>
                                    <select name="agensi_organisasi" class="form-control form-control-sm agensi_organisasi">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="namaBahagian" class="form-control form-control-sm namaBahagian">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanBahagian">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_kemaskini_agensi_organisasi">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemas Kini Agensi / Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_kemaskini_agensi_organisasi') }}" id="formKemaskiniAgensiOrganisasi">
                        @csrf
                        <input type="hidden" name="rowid" class="rowid">
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama Agensi / Organisasi</label>
                                    <input type="text" name="namaAgensiOrganisasi" class="form-control form-control-sm namaAgensiOrganisasi">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanKemaskiniAgensiOrganisasi">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_kemaskini_bahagian">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemas Kini Bahagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_kemaskini_agensi_organisasi') }}" id="formKemaskiniBahagian">
                        @csrf
                        <input type="hidden" name="rowid" class="rowid">
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Agensi / Organisasi</label>
                                    <select name="agensi_organisasi" class="form-control form-control-sm agensi_organisasi">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="namaBahagian" class="form-control form-control-sm namaBahagian">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanKemaskiniBahagian">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    if (arr[i].toLowerCase().indexOf(val.toLowerCase()) == -1) {
                        //not found
                    }else{
                        //found
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = arr[i].substr(0, val.length);
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }

        $(document).ready(function() {
            var availableTags = <?php echo json_encode($agensiOrganisasi); ?>;
            autocomplete(document.getElementById("namaAgensiOrganisasi"), availableTags);
            
            var table = $("#table_agensi_organisasi").DataTable({
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
                }
            });

            // Setup - add a text input to each footer cell
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


        $(document).on("click", ".btnSimpanAgensiOrganisasi", function() {
            var sektor = $('#formTambahAgensiOrganisasi .sektor').val().trim();
            var namaAgensiOrganisasi = $('#formTambahAgensiOrganisasi .namaAgensiOrganisasi').val().trim();
            var msg = "";

            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(namaAgensiOrganisasi == ""){
                msg = msg + "Sila isi nama Agensi / Organisasi.\r\n";
            }

            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sektor": sektor,
                        "namaAgensiOrganisasi": namaAgensiOrganisasi,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });
        $(document).on("click", ".btnSimpanKemaskiniAgensiOrganisasi", function() {
            var rowid = $('#formKemaskiniAgensiOrganisasi .rowid').val().trim();
            var sektor = $('#formKemaskiniAgensiOrganisasi .sektor').val().trim();
            var namaAgensiOrganisasi = $('#formKemaskiniAgensiOrganisasi .namaAgensiOrganisasi').val().trim();
            var msg = "";

            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(namaAgensiOrganisasi == ""){
                msg = msg + "Sila isi nama Agensi / Organisasi.\r\n";
            }

            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_kemaskini_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "rowid": rowid,
                        "sektor": sektor,
                        "namaAgensiOrganisasi": namaAgensiOrganisasi,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });
        $(document).on("click", ".btnSimpanKemaskiniBahagian", function() {
            var rowid = $('#formKemaskiniBahagian .rowid').val().trim();
            var sektor = $('#formKemaskiniBahagian .sektor').val().trim();
            var agensi_organisasi = $('#formKemaskiniBahagian .agensi_organisasi').val().trim();
            var namaBahagian = $('#formKemaskiniBahagian .namaBahagian').val().trim();
            var msg = "";

            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(agensi_organisasi == ""){
                msg = msg + "Sila pilih Agensi / Organisasi.\r\n";
            }
            if(namaBahagian == ""){
                msg = msg + "Sila isi nama Bahagian.\r\n";
            }

            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_kemaskini_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "rowid": rowid,
                        "sektor": sektor,
                        "namaAgensiOrganisasi": agensi_organisasi,
                        "bahagian": namaBahagian,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });

        $(document).on("click", ".btnSimpanBahagian", function() {
            var sektor = $('#formTambahBahagian .sektor').val().trim();
            var agensi_organisasi = $('#formTambahBahagian .agensi_organisasi').val().trim();
            var namaBahagian = $('#formTambahBahagian .namaBahagian').val().trim();
            var msg = "";

            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(agensi_organisasi == ""){
                msg = msg + "Sila pilih Agensi / Organisasi.\r\n";
            }
            if(namaBahagian == ""){
                msg = msg + "Sila isi nama Bahagian.\r\n";
            }

            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sektor": sektor,
                        "namaAgensiOrganisasi": agensi_organisasi,
                        "namaBahagian": namaBahagian,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });

        $(document).on("click", ".btnDelete", function() {
            var rowid = $(this).data('rowid');
            var type = $(this).data('type');
            var confirmMsg = "";

            if(type == 'bahagian'){
                confirmMsg = "Adakah anda pasti untuk buang Bahagian ini?";
            }else{
                confirmMsg = "Adakah anda pasti untuk buang Agensi/Organisasi ini?";
            }

        var r = confirm(confirmMsg);
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_agensi_organisasi",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": rowid,
                        "type": type,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }
        });

        $('#formTambahBahagian .sektor').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi_by_sektor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "sektor": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                $('#formTambahBahagian .agensi_organisasi').html('');
                $('#formTambahBahagian .agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos, function(index,value) {
                    $('#formTambahBahagian .agensi_organisasi').append('<option value="'+value.name+'">'+value.name+'</option>');
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

        $(document).on('click','.btnKemaskiniAgensiOrganisasi',function(){
            var rowid = $(this).data('rowid');

            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowid": rowid,
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);

                //rowid
                $("#formKemaskiniAgensiOrganisasi .rowid").val(data.ao.id).change();
                //sektor
                $("#formKemaskiniAgensiOrganisasi .sektor").val(data.ao.sektor).change();
                //nama
                $('#formKemaskiniAgensiOrganisasi .namaAgensiOrganisasi').val(data.ao.name);
            });
        });
        $(document).on('click','.btnKemaskiniBahagian',function(){
            var rowid = $(this).data('rowid');

            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowid": rowid,
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);

                //rowid
                $("#formKemaskiniBahagian .rowid").val(data.ao.id).change();
                //sektor
                $("#formKemaskiniBahagian .sektor").val(data.ao.sektor).change();
                //agensi_organisasi
                $('#formKemaskiniBahagian .agensi_organisasi').html('');
                $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos,function(index,value){
                    $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="'+value.name+'">'+value.name+'</option>');
                });
                $('#formKemaskiniBahagian .agensi_organisasi').val(data.ao.name);
                //nama
                $('#formKemaskiniBahagian .namaBahagian').val(data.ao.bahagian);
            });
        });
    </script>
@stop
