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

    </style>
    <div class="content">
        <div class="card" style="background-color: rgba(255, 255, 255, 0.9);">
            <div class="section-title">
                <h2>{!! !is_null($panduan_pengguna) ? $panduan_pengguna->title : '' !!}</h2>
            </div>
            <div class="card-body" align="center">
                {!! !is_null($panduan_pengguna) ? $panduan_pengguna->content : '' !!}
            </div>
            <!-- Top content -->
            <div class="top-content">
                <div class="container">
                    <!-- Title and description row -->
                    <div class="row">
                        <div class="col col-md-10 offset-md-1">
                            {{-- <h1>Carousel Template with Videos, Images, Captions</h1>
                            <div class="description">
                                <p>
                                    This is a free Carousel template with Videos, Images and Captions, made with the
                                    Bootstrap 4 framework.
                                    Click on the indicators, controls and links to interact with the page.
                                </p>
                            </div> --}}
                        </div>
                    </div>
                    <!-- End title and description row -->
                    <!-- Carousel row -->
                    <div class="row">
                        <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                            <!-- Carousel -->
                            <div id="carousel-example" class="carousel slide">

                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                    <li data-target="#carousel-example" data-slide-to="3"></li>
                                    <li data-target="#carousel-example" data-slide-to="4"></li>
                                </ol>

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/I2P1zEBciq4?autoplay=1&mute=1&loop=1"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                        <div class="carousel-caption">
                                            <h3>Caption for Video 1</h3>
                                            <div class="carousel-caption-description">
                                                <p class="text-dark">This is the caption description text for video 1.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/slides/slide-img-1.jpg" class="d-block w-100"
                                            alt="slide-img-1">
                                        <div class="carousel-caption">
                                            <h3>Caption for Image 1</h3>
                                            <div class="carousel-caption-description">
                                                <p class="text-dark">This is the caption description text for image 1.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                src="https://player.vimeo.com/video/84910153?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="carousel-caption">
                                            <h3>Caption for Video 2</h3>
                                            <div class="carousel-caption-description">
                                                <p class="text-dark">This is the caption description text for video 2.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/slides/slide-img-2.jpg" class="d-block w-100"
                                            alt="slide-img-2">
                                        <div class="carousel-caption">
                                            <h3>Caption for Image 2</h3>
                                            <div class="carousel-caption-description">
                                                <p class="text-dark">This is the caption description text for image 2.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/oiKj0Z_Xnjc" allowfullscreen></iframe>
                                        </div>
                                        <div class="carousel-caption">
                                            <h3>Caption for Video 3</h3>
                                            <div class="carousel-caption-description">
                                                <p class="text-dark">This is the caption description text for video 3.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
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
