@extends('layouts.app_mygeo_ketsa')

@section('content')

<style>
.umum_senarai_card{
    border-radius:25px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.umum_senarai_header{
/*    padding: 1.25rem 1.5rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);*/
}
thead {
    position: absolute !important;
    top: -9999px !important;
    left: -9999px !important;
}
.divCenter{
    margin-right: auto;
    margin-left: auto;
}
.td_umum:hover{
    background: yellow;
    cursor: -webkit-grab; 
    cursor: grab;
}
</style>

<div class="col-lg-9 divCenter">
    <div class="card mt-4 ml-4 p-3 umum_senarai_card">
       <div class="card-header umum_senarai_header">
          <h1 class="card-title m-0"><i class="fa fa-bullhorn mr-3"></i>Senarai Pengumuman</h1>
       </div>
       <div class="card-body scroll mt-2">
           <table id="table_pengumuman_index" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($pengumuman as $umum){
                ?>
                <tr>
                    <td class="td_umum" data-umumid="{{ $umum->id }}">
                        <form id="form_umum_{{ $umum->id }}" method="post" action="{{ url('/tunjuk_pengumuman') }}">
                            @csrf 
                            <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                            <h2><?php echo date('j M Y',strtotime($umum->created_at)); ?></h2>
                            <?php echo $umum->kategori; ?>:<br>
                            <?php echo $umum->title; ?><br>
                        </form>
                    </td>
                </tr>
                <?php
              }
              ?>
                
              <?php
              /*
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
               * 
               */
                ?>
            </tbody>
          </table>
       </div>
    </div>
 </div>

  <script>
  $(document).ready(function(){
    $("#table_pengumuman_index").DataTable({
      "ordering": false,
      "responsive": true,
      "autoWidth": false,
      "oLanguage": {
        "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
        "sEmptyTable": "Tiada rekod ditemui",
         "sZeroRecords": "Tiada rekod ditemui",
        "sLengthMenu": "Papar _MENU_ rekod",
        "sLoadingRecords": "Sila tunggu...",
        "sSearch": "Carian:",
        "oPaginate": {
           "sFirst": "Pertama",
           "sLast": "Terakhir",
           "sNext": ">",
           "sPrevious": "<",
         }
      }
    });
    
    $(document).on("click",".td_umum",function(){
       var umumid = $(this).data("umumid");
       $("#form_umum_"+umumid).submit();
    });
  });
</script>
@stop