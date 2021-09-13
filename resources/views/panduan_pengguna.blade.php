@extends('layouts.app_afiq')

@section('content')
    <style>
        .card {
            border-radius: 0;
            min-height: 850px;
            margin: 0;
            padding: 1.7rem 2.5rem;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            margin-bottom: 0;
            background-color: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .top-content .carousel-caption {
            position: relative;
            left: auto;
            right: auto;
            bottom: auto;
        }

        .top-content .carousel-indicators {
            bottom: -40px;
        }

        @media (max-width: 767px) {

            /* ... */

            .top-content .carousel-control-prev,
            .top-content .carousel-control-next {
                display: none;
            }

            .top-content .carousel-indicators li {
                margin-left: 10px;
                margin-right: 10px;
            }

            /* ... */

        }

    </style>
    <div class="content">
        <div class="card" style="background-color: rgba(255, 255, 255, 0.9);">
            <div class="section-title mb-4">
                <h2>PANDUAN PENGGUNA</h2>
            </div>
            {{-- <div class="card-body" align="center">
                {!! !is_null($panduan_pengguna) ? $panduan_pengguna->content : '' !!}
            </div> --}}
            <!-- Top content -->
            <div class="top-content">
                <div class="container">
                    <!-- Carousel row -->
                    <div class="row">
                        <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                            <!-- Carousel -->
                            <div id="panduan-pengguna" class="carousel slide">

                                <ol class="carousel-indicators">
                                    @foreach ($panduan_pengguna as $panduan)
                                        <li data-target="#panduan-pengguna" data-slide-to="{{ $loop->iteration }}"
                                            @if ($loop->iteration == '1') class="active" @endif></li>
                                    @endforeach

                                </ol>

                                <div class="carousel-inner">
                                    @foreach ($panduan_pengguna as $panduan)
                                        <div class="carousel-item @if ($loop->iteration == '1') active @endif">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item"
                                                    src="{{ $panduan->video_link }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                            <div class="carousel-caption">
                                                <h2>{{ $panduan->title }}</h2>
                                                <div class="carousel-caption-description">
                                                    <div class="text-dark">{!! $panduan->content !!}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <a class="carousel-control-prev" href="#panduan-pengguna" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#panduan-pengguna" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- End carousel -->
                        </div>
                    </div>
                    <!-- End carousel row -->
                </div>
            </div>
        </div>
    </div>

@stop
