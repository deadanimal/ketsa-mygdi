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
</style>
<div class="content">
    <div class="card" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="section-title">
            <h2>{!! (!is_null($panduan_pengguna) ? $panduan_pengguna->title:"") !!}</h2>
        </div>
        <div class="card-body" align="center">
            {!! (!is_null($panduan_pengguna) ? $panduan_pengguna->content:"") !!}
        </div>
    </div>
</div>

@stop
