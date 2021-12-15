@extends('layouts.app_ketsa')

@section('content')

    <style>
        .active {
            font-weight: bold !important;
            color: rgb(43, 80, 226);
        }

    </style>


    <div class="content p-3">
        <div class="container-fluid">
            <h1>Senarai Data-Data Asas</h1>

            <div class="row">
                <div class="col-3">
                    <h2>Kategori :</h2>
                    @foreach ($senarai_data as $data)
                        @if (!empty($data->subkategori))
                            <?php $url = "/data_asas_senarai/$data->id"; ?>
                            <a href="{{ $url }}" {!! strpos(Request::url(), $url) !== false ? ' class="active"' : '' !!}>{{ $loop->iteration }}.&nbsp;
                                {{ $data->kategori }}</a><br>
                        @endif
                    @endforeach
                </div>
                <div class="col-3">
                    <h2>Sub-Kategori :</h2>
                    @forelse ($subs as $dataa)
                        @foreach ($senarai_data as $data)
                            @if ($dataa->kategori == $data->kategori)
                                <?php $url2 = "/data_asas_senarai/$data->id/$dataa->id"; ?>
                                <a href="{{ $url2 }}" {!! Request::url() == url($url2) ? ' class="active"' : '' !!}>{{ $dataa->subkategori }}</a><br>
                            @endif
                        @endforeach
                    @empty
                        -
                    @endforelse
                </div>
                <div class="col-3">
                    <h2>Lapisan Data :</h2>
                    @forelse ($lapisan as $ldata)
                        {{-- {{$ldata}} --}}
                        <a>{{ $ldata->lapisan_data }}</a><br>
                    @empty
                        -
                    @endforelse
                </div>
                <div class="col-3">
                    <h2>Kelas :</h2>
                    @forelse ($lapisan as $ldata)
                        {{-- {{$ldata}} --}}
                        <a>{{ $ldata->kelas }}</a><br>
                    @empty
                        -
                    @endforelse
                </div>
            </div>

            <br>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            $(".div_sub").hide();
            $(".subKategoriTitle").hide();

            $(document).on("click", ".kategori", function() {
                var divname = $(this).data('id');
                $(".div_sub").hide();
                $("." + divname).show();
                $(".subKategoriTitle").show();
            });

            $(document).on("click", ".subkategori, function () {
                //            var divname = $(this).data('id');
                //            $(".div_sub").hide();
                //            $("." + divname).show();
                //            $(".subKategoriTitle").show();
            });
        });
    </script>
@stop
