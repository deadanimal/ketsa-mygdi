@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>
        .accordionHeader:first-child {
            color: black;
            cursor: pointer;
            border-radius: 10px;
            padding: 10px 13px;
        }

        .accordionHeader {
            background-color: #b3d1ff;
        }

    </style>
    <style>
        .ftest {
            display: inline;
            width: auto;
        }

        .fautocomplete #searchResult {
            list-style: none;
            padding: 0px;
            position: absolute;
            margin: 0;
            z-index: 1;
        }

        .fautocomplete #searchResult li {
            background: lavender;
            padding: 4px;
            margin-bottom: 1px;
        }

        .fautocomplete #searchResult li:hover {
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
            font-size: small;
        }

        .autocomplete-items div {
            padding: 8px;
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
        <section class="header ">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Kemas Kini Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Kemas Kini Data
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
                                        <h3 class="mb-0">Senarai Kategori Data dan Sub-Kategori Data</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ url('senarai_data') }}"><button class="btn btn-danger">Kembali</button></a>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                @foreach ($kategori_sd as $ksd)
                                    <!--=============================== {{ $ksd->name }} =============================================-->
                                    <div class="acard div_c{{ $ksd->id }} mb-3" id="div_c{{ $ksd->id }}">
                                        <div class="card-header accordionHeader">
                                            <div class="row align-items-center">
                                                <div class="col-10" data-toggle="collapse"
                                                    href="#collapse{{ $ksd->id }}">
                                                    <h3 class="heading mb-0">{{ $loop->iteration }}. {{ $ksd->name }}
                                                    </h3>
                                                </div>
                                                <div class="col-2 hapusKategori" style="text-align:right;" data-kategori="{{ $ksd->name }}" data-kategoriid="{{ $ksd->id }}">
                                                    <p class="mb-0">Hapus</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse{{ $ksd->id }}" class="panel-collapse collapse"
                                            data-parent="#div_c{{ $ksd->id }}">
                                            <div class="card-body">
                                                <div class="opacity-8" style="overflow-x:auto;">

                                                    <table id="senDataTable{{ $ksd->id }}"
                                                        class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>BIL</th>
                                                                <th>SUB-KATEGORI</th>
                                                                <th>TINDAKAN</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php $count = 1; ?>
                                                            @foreach ($subkategori_sd as $subkat)
                                                                @if ($ksd->id === $subkat->kategori_id)
                                                                    <tr>
                                                                        <td>{{ $count }}</td>
                                                                        <td>{{ $subkat->name }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                data-subkatid="{{ $subkat->id }}"
                                                                                data-subkatname="{{ $subkat->name }}"
                                                                                class="btnDelete btn btn-sm btn-danger mx-2"><i
                                                                                    class="fas fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>

                                                                    <?php $count++; ?>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                if (!val) {
                    return false;
                }
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
                    } else {
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
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }
        $('#addKategori').click(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_kategori') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                console.log(data);
                if (data.error == '1') {
                    //    alert(data.msg);
                } else {
                    var availableTags = [];
                    $.each(data.kategori, function(index, value) {
                        availableTags.push(value.name);
                    });
                    autocomplete(document.getElementById("namaKategori"), availableTags);
                }
            });
        });

        $('#addSubKategori').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_subkategori') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "kategori_id": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                // console.log(data);
                if (data.error == '1') {
                    //    alert(data.msg);
                } else {
                    var availableTags = [];
                    $.each(data.subkategori, function(index, value) {
                        availableTags.push(value.name);
                    });
                    autocomplete(document.getElementById("namaSubKategori"), availableTags);
                }
            });
        });

        $(document).on('change', '.checkData', function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_lapisan_data') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "kategori_id": $('.kategori').val(),
                    "subkategori": $('.subkategori').val(),
                },
            }).done(function(response) {

                // console.log('subcat', $('.subkategori').val(), $('.kod').val());
                var data = jQuery.parseJSON(response);
                console.log('lapisan', data.lapisan);
                if (data.error == '1') {
                    //    alert(data.msg);
                } else {
                    var availableTags = [];
                    $.each(data.lapisan, function(index, value) {
                        availableTags.push(value.lapisan_data);
                    });
                    autocomplete(document.getElementById("namaLapisanData"), availableTags);
                }
            });
        });
    </script>

    @foreach ($kategori_sd as $ksd)
        <script>
            $(document).ready(function() {
                $("#senDataTable{{ $ksd->id }}").DataTable({
                    "dom": "<'row'<'col-sm-3'l> <'col-sm-6 text-center' ><'col-sm-3'f >> " +
                        "<'row'<'col-sm-12'tr>>" + "<'row mt-4'<'col-sm-5'i> <'col-sm-7'p >> ",
                    // "scrollX": true,
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
    @endforeach
    <script>
        $(document).ready(function() {
            $(document).on('change', '.checkData', function() {
                var kod = $('.kod').val();
                var kategori = $('.kategori').val();
                var subkategori = $('.subkategori').val();
                var lapisan_data = $('.lapisandata').val();
                console.log(kod, kategori, subkategori, lapisan_data);

                if (kod && kategori && subkategori && lapisan_data) {

                    $('.infoData').html('<span></span>');
                    $.ajax({
                        method: "POST",
                        url: "check_senarai_data",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "kategori": kategori,
                            "subkategori": subkategori,
                            "lapisan_data": lapisan_data,
                            "kod": kod
                        },
                    }).done(function(res) {
                        console.log(res['message']);
                        let x = res['message'];
                        var msg;
                        if (x == 'Data Wujud') {
                            msg =
                                '<span class="text-danger"><i class="fa fa-exclamation-circle"></i> Senarai Data ini telah pun wujud</span>';
                        } else if (x == 'Kod Wujud') {
                            msg =
                                '<span class="text-danger"><i class="fa fa-exclamation-circle"></i> Kod Senarai Data ini telah pun wujud</span>'
                        } else if (x == 'Data Tersedia') {
                            msg =
                                '<span class="text-success"><i class="fa fa-check-circle"></i> Senarai Data ini tersedia untuk ditambah</span>'
                        }
                        $('.infoData').html(msg);
                    });
                }

            });
        });
    </script>

    <script>
        $(document).on("click", ".btnDelete", function() {
            var sdata_id = $(this).data('subkatid');
            var sdata_name = $(this).data('subkatname');
            var r = confirm("Adakah anda pasti untuk buang data ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_subkategori_data",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": sdata_id,
                        "name": sdata_name
                    },
                }).done(function(response) {
                    alert("Data telah dibuang.");
                    location.reload();
                });
            }
        });
        $(document).on("click", ".hapusKategori", function() {
            var kategori = $(this).data('kategori');
            var kategoriid = $(this).data('kategoriid');
            var r = confirm("Adakah anda pasti untuk buang kategori ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_kategori_data",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "kategori": kategori,
                        "kategoriid": kategoriid
                    },
                }).done(function(response) {
                    alert("Kategori telah dibuang.");
                    location.reload();
                });
            }
        });
    </script>
    <script type="text/javascript">
        function selectKategori() {
            d = document.getElementById("kategori_s").value;
            kategori = d.toString();
            sdata = {!! $subkategori_sd !!}
            senarai_append = ''
            sdata.forEach(element => {
                if (element['kategori_id'] == d && element['name'] != '') {
                    senarai_append += `<option value="` + element['name'] + `">` + element['name'] +
                        `</option>`
                }
            });

            $("#dynamicAddRemove").empty();
            $("#dynamicAddRemove").append(`<label class="form-control-label" for="subkategori">Sub-Kategori</label>
                                                <select name="subkategori" id="subkategori" class="form-control form-control-sm subkategori checkData" onchange="selectSubKategori()"><option selected disabled>Pilih</option>'

                                                    ` + senarai_append + `

                                                 </select>`);

        }

        function selectSubKategori() {
            d = document.getElementById("subkategori").value;
            kategori = d.toString();
            sdata = {!! $senarai_data !!}
            senarai_append = ''
            sdata.forEach(element => {
                if (element['subkategori'] == d) {
                    senarai_append += `<option value="` + element['lapisan_data'] + `">` + element['lapisan_data'] +
                        `</option>`
                }
            });

            $("#dynamicAddRemove2").empty();
            $("#dynamicAddRemove2").append(`<label class="form-control-label" for="lapisan_data">Lapisan Data</label>
                                                <select name="lapisan_data" class="form-control" autofocus><option selected disabled>Pilih</option>'

                                                    ` + senarai_append + `

                                                 </select>`);

        }
    </script>
@stop
