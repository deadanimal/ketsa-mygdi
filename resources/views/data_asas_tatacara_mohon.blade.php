@extends('layouts.app_ketsa')

@section('content')

    <style>
        li {
            list-style-type: square;
        }

    </style>
    <!-- Content Wrapper. Contains page content -->
    <section class="content p-4">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Tatacara Permohonan</h2>
            </div>
            <div class="row">
                @foreach ($tatacara_mohon as $tatacara)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <img height="150" class="img-center"
                                            src="{{ !is_null($tatacara) ? $tatacara->icon_path : '' }}" alt="">
                                    </div>
                                    <div class="col-8">
                                        <p class="heading text-muted">{{ $loop->iteration }}) {{ $tatacara->title }}
                                        </p>
                                        {!! $tatacara->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function() {

        });
    </script>
@stop
