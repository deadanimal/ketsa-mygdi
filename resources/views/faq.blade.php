@extends('layouts.app_afiq')

@section('content')

    <style>
        .accordionHeader {
            background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
            background-image: linear-gradient(to right, #ebba16, #ed8a19);
            cursor: pointer;
            border-radius: 10px;
        }

        .card,
        .card-header:first-child {
            background-color: white;
            border-radius: 12px;
        }

    </style>

    <!-- Content Wrapper. Contains page content -->
    <section class="content bgland p-5">
        <div class="container-fluid">
            <div class="section-title">
                <h2 class="text-white">Soalan Lazim (FAQ)</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        @foreach ($faqs as $faq)
                            <!--========== collapese{{ $faq->id }} =============================================-->
                            <div class="card card-primary div_c{{ $faq->id }}" id="div_c{{ $faq->id }}">
                                <div class="card-header accordionHeader" data-toggle="collapse"
                                    href="#collapse{{ $faq->id }}">
                                    <b class="mb-0 pb-0" style="text-transform: uppercase;">{{ $faq->category }}</b>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="panel-collapse collapse in"
                                    data-parent="#div_c{{ $faq->id }}">
                                    <div class="card-body">
                                        <div class="acard-body opacity-8">
                                            <?php echo $faq->content; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var pengesahs = [];

        $(document).ready(function() {

        });
    </script>
@stop
