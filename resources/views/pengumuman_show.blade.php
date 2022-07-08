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
</style>
<section class="bgland">
    <div class="section-title">
        <h2 class="text-white">{!! (!is_null($pengumuman) ? $pengumuman->title:"") !!}</h2>
    </div>
    <div class="col-lg-9 pt-4 divCenter">
        <div class="card mt-2 umum_senarai_card">
            <div class="card-body scroll mt-2">
                <h4>{!! (!is_null($pengumuman) ? date("j M Y",strtotime($pengumuman->date)):"") !!}</h4>
                <p>{!! (!is_null($pengumuman) ? $pengumuman->content:"") !!}</p>
                <div class="row">
                    <div class="col-3">
                        <?php
                        if($pengumuman->gambar != ""){
                            ?>
                            <image id="gambar" alt="Image placeholder" src="{{ asset('storage/'.$pengumuman->gambar) }}" style="border-radius: .95rem;max-width:250px;">
                            <?php
                        }else{
                            ?>
                            <image id="gambar" alt="Image placeholder" src="./assetsweb/img/banner2.jpeg" style="border-radius: .95rem;width:100%;padding-top:10px;">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <form method="post" action="{{ url('/lihat_metadata_nologin') }}" id="formViewMetadata" target="_blank">
                        @csrf
                        <input type="hidden" name="metadata_id" value="{{ $pengumuman->metadata_id }}">
                    </form>
                    <a href="{{ url('lihat_metadata_nologin').'/'.$pengumuman->metadata_id }}" class="aViewMetadata" data-metid="{{$pengumuman->metadata_id}}">Perincian Metadata</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
    });
</script>

@stop

