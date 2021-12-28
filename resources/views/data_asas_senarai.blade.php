@extends('layouts.app_ketsa')

@section('content')

    <style>
        .active {
            font-weight: bold !important;
            color: rgb(43, 80, 226);
            font-size: 15px;
        }

        a {
            font-size: 15px;
        }

        a:hover {
            font-weight: bold !important;
            color: blueviolet;
        }

    </style>


    <div class="content p-3">
        <div class="container-fluid">
            <h1>Senarai Data-Data Asas</h1>
            <div class="row">
                <div class="col-2">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td class="heading">Kategori</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senarai_data as $data)
                                <tr>
                                    <td>
                                        @if (!empty($data->subkategori))
                                            <?php $url = "/data_asas_senarai/$data->id/";
                                            $cur_url = Request::url() . '/'; ?>
                                            <a href="{{ $url }}"
                                                {!! strpos($cur_url, $url) !== false ? ' class="active"' : '' !!}>{{ $loop->iteration }}.&nbsp;
                                                {{ $data->kategori }}</a><br>

                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-auto">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td class="heading">Sub-Kategori</td>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($subs as $dataa)
                                <tr>
                                    <td>

                                        @foreach ($senarai_data as $data)
                                            @if ($dataa->kategori == $data->kategori)
                                                <?php $url2 = "/data_asas_senarai/$data->id/$dataa->id"; ?>
                                                <a href="{{ $url2 }}"
                                                    {!! Request::url() == url($url2) ? ' class="active"' : '' !!}>{{ $dataa->subkategori }}</a><br>
                                            @endif
                                        @endforeach

                                    </td>

                                </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="col-6">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td class="heading">Lapisan Data</td>
                                <td class="heading">Kod (MS1759)</td>
                                <td class="heading">Kelas</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lapisan as $ldata)
                                <tr>
                                    <td><a>{{ $ldata->lapisan_data }}</a></td>

                                    <td><a>{{ $ldata->kod }}</a></td>

                                    <td><a>{{ $ldata->kelas }}</a></td>
                                </tr>
                            @empty
                            @endforelse
                </div>
                </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-2">
                <h2>Kategori :</h2>
                @foreach ($senarai_data as $data)
                    @if (!empty($data->subkategori))
                        <?php $url = "/data_asas_senarai/$data->id/";
                        $cur_url = Request::url() . '/'; ?>
                        <a href="{{ $url }}" {!! strpos($cur_url, $url) !== false ? ' class="active"' : '' !!}>{{ $loop->iteration }}.&nbsp;
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
                <ul>
                    @forelse ($lapisan as $ldata)
                        <li><a>{{ $ldata->lapisan_data }}</a></li>
                    @empty
                        -
                    @endforelse
                </ul>
            </div>
            <div class="col-2">
                <h2>Kod (MS1759) :</h2>
                @forelse ($lapisan as $ldata)
                    <a>{{ $ldata->kod }}</a><br>
                @empty
                    -
                @endforelse
            </div>
            <div class="col-2">
                <h2>Kelas :</h2>
                @forelse ($lapisan as $ldata)
                    <a>{{ $ldata->kelas }}</a><br>
                @empty
                    -
                @endforelse
            </div>
        </div> --}}

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
