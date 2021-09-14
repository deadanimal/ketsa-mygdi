@extends('layouts.app_ketsa')

@section('content')

<style>
    .umum_senarai_card {
        border-radius: 25px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .divCenter {
        margin-right: auto;
        margin-left: auto;
    }

    .ql-align-center {
            text-align: center;
        }
</style>
<section class="bgland">
    <div class="section-title">
        <h2 class="text-white">{!! (!is_null($penafian) ? $penafian->title:"") !!}</h2>
    </div>
    <div class="col-lg-9 pt-4 divCenter">
        <div class="card mt-2 umum_senarai_card">
            <div class="card-body scroll mt-2">
                <span align="justify">
                    {!! (!is_null($penafian) ? $penafian->content:"") !!}
                </span>
            </div>
        </div>
    </div>
</section>
@stop
