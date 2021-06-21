@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">{!! (!is_null($penyataan_privasi) ? $penyataan_privasi->title:"") !!}</h5>
              </div>
              <div class="card-body">
                {!! (!is_null($penyataan_privasi) ? $penyataan_privasi->content:"") !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop