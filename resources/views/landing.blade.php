@extends('layouts.app_afiq')

@section('content')

<style>
.umum_card{
    border-radius:25px;
}
.umum_header{
    background-color: #fff0;
    padding-bottom: 0px;
}
.umum_body{
    border-radius:25px;
}
.umum_footer{
    padding-top: 0px;
    background-color: #fff0;
}
.scrollf{
    max-height: 450px;
    overflow-y: scroll;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
}
.scrollf::-webkit-scrollbar { /* WebKit */
    width: 0;
    height: 0;
}
</style>

<div class="col-lg-4">
    <div _ngcontent-ula-c486="" class="card umum_card" style="background-color: rgba(255, 255, 255, 0.527);">
        <div class="card-header text-center umum_header">
            <h1 class="card-title m-0" style="color: #161616;"><i class="ni ni-notification-70 fa-spin mr-2"></i>PENGUMUMAN</h1>
        </div>
        <div class="card-body">
            <div class="card mb-0 umum_body" style="background-color: rgba(255, 255, 255, 0.808);">
                <div class="card-body scrollf">
                    <?php
                    foreach($pengumuman as $umum){
                        ?>
                        <form id="form_umum_{{ $umum->id }}" method="post" action="{{ url('/tunjuk_pengumuman') }}">
                            @csrf 
                            <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                            <a href="#" class="aUmum" data-umumid="{{ $umum->id }}">
                                <span style="color: #252525;"><?php echo date('j M Y',strtotime($umum->created_at)); ?></span>
                                <p class="text-black"><?php echo $umum->kategori; ?>: <br> <?php echo $umum->title; ?></p>
                            </a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-center umum_footer">
            <a class="badge btnPaparSemuaPengumuman" href="{{ url('/senarai_pengumuman') }}">PAPAR SEMUA &gt;</a>
        </div>
    </div>
</div>
<div _ngcontent-lqr-c499="" class="col-lg-7"></div>
<div _ngcontent-lqr-c499="" class="col-lg-1">
    <div _ngcontent-lqr-c499="" class="form-group mt-7">
        <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 ml-4 float-right">
            <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0" ng-reflect-router-link="/metadata">
                <a href="{{ url('senarai_metadata_nologin') }}"><img _ngcontent-lqr-c499="" height="50" src="./afiqlogin_files/metadata.png"></a>
            </div>
            <span _ngcontent-lqr-c499="" class="text-center mt-2">Metadata</span>
        </div>
        <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 ml-4 float-right linkDataAsas">
            <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0" ng-reflect-router-link="/data-asas">
                <img _ngcontent-lqr-c499="" height="50" src="./afiqlogin_files/dataapp.png">
            </div>
            <span _ngcontent-lqr-c499="" class="text-center mt-2">Data Asas</span>
        </div>
        <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 float-right">
            <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0" ng-reflect-router-link="/tutorial">
                <img _ngcontent-lqr-c499="" height="50" src="./afiqlogin_files/tutorial.png">
            </div>
            <span _ngcontent-lqr-c499="" class="text-center mt-2">Tutorial</span>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $(document).on("click",".aUmum",function(){
       var umumid = $(this).data("umumid");
       $("#form_umum_"+umumid).submit();
    });
    
    $(document).on("click",".linkDataAsas",function(){
        window.location.href = "{{url('data_asas_landing')}}";
    });
  });
</script>

@stop
