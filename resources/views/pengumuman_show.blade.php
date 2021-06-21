@extends('layouts.app_afiq')

@section('content')

<style>
.umum_senarai_card{
    border-radius:25px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.divCenter{
    margin-right: auto;
    margin-left: auto;
}
</style>

<div class="col-lg-9 divCenter">
    <div class="card mt-4 ml-4 p-3 umum_senarai_card">
       <div class="card-header umum_senarai_header">
          <h1 class="card-title m-0">{!! (!is_null($pengumuman) ? $pengumuman->title:"") !!}</h1>
       </div>
       <div class="card-body scroll mt-2">
           <h4>{!! (!is_null($pengumuman) ? date("j M Y",strtotime($pengumuman->date)):"") !!}</h4>
           <p>{!! (!is_null($pengumuman) ? $pengumuman->content:"") !!}</p>
       </div>
    </div>
 </div>
@stop