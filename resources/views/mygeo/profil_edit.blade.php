@extends('layouts.app_mygeo_afiq')

@section('content')

  <style>
    .ftest{
      display:inline;
      width:auto;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form method="post" class="form-horizontal" action="{{url('simpan_kemaskini_profil')}}" id="form_kemaskini_profil"  enctype="multipart/form-data">
                @csrf  
                <div class="card-header">
                  <h3 class="card-title" style="font-size: 2rem;">Kemaskini Profil Pengguna</h3>
                  <button type="submit" class="btn btn-default float-right">Simpan</button>
                </div>
                <div class="card-body">
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="gambar_profil" class="col-sm-2">Gambar Profil</label>
                        <div class="col-lg-8">
                            : 
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar_profil" name="gambar_profil" accept="image/jpg,image/png,image/jpeg">
                                    <label class="custom-file-label gambar_profil_text" for="gambar_profil">Tiada gambar dipilih.</label>
                                </div>
                            </div>
                            <br>
                            <span class="avatar avatar-md rounded-circle ml-3 spanfpreview" style="display:none;">
                                <img alt="Image Preview" id="fpreview" src="">
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Nama Penuh</label>
                      <div class="col-lg-8">
                        : <input type="text" class="form-control" name="uname" value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Kad Pengenalan</label>
                      <div class="col-lg-8">
                        : <input type="text" class="form-control" name="nric" value="{{ $user->nric }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Agensi / Organisasi</label>
                      <div class="col-lg-8">
                        : <select name="agensi_organisasi" class="form-control">
                            <option value="Agensi Angkasa Negara (ANGKASA)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Agensi Angkasa Negara (ANGKASA)</option>
                            <option value="Bahagian Pengairan dan Saliran Pertanian (BPSP)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Bahagian Pengairan dan Saliran Pertanian (BPSP)</option>
                            <option value="Jabatan Penerbangan Awam Malaysia (DCA)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Penerbangan Awam Malaysia (DCA)</option>
                            <option value="Jabatan Pertanian Malaysia (DOA)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Pertanian Malaysia (DOA)</option>
                            <option value="Jabatan Perikanan Malaysia (DOF)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Perikanan Malaysia (DOF)</option>
                            <option value="Jabatan Perangkaan Malaysia (DOS)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Perangkaan Malaysia (DOS)</option>
                            <option value="Indah Water Konsortium Sdn. Bhd. (IWK)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Indah Water Konsortium Sdn. Bhd. (IWK)</option>
                            <option value="Jabatan Alam Sekitar (JAS)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Alam Sekitar (JAS)</option>
                            <option value="Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)</option>
                            <option value="Jabatan Kerja Raya Malaysia (JKR)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Kerja Raya Malaysia (JKR)</option>
                            <option value="Jabatan Kerajaan Tempatan (JKT)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Kerajaan Tempatan (JKT)</option>
                            <option value="Jabatan Kerajaan Tempatan (JLM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Kerajaan Tempatan (JLM)</option>
                            <option value="Jabatan Mineral dan Geosains Malaysia (JMG)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Mineral dan Geosains Malaysia (JMG)</option>
                            <option value="Jabatan Meteorologi Malaysia (JMM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Meteorologi Malaysia (JMM)</option>
                            <option value="Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)</option>
                            <option value="Jabatan Pengairan dan Saliran Malaysia (JPS)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Pengairan dan Saliran Malaysia (JPS)</option>
                            <option value="Jabatan Perhutanan Semenanjung Malaysia (JPSM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Perhutanan Semenanjung Malaysia (JPSM)</option>
                            <option value="Jabatan Taman Laut Malaysia (JTLM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Taman Laut Malaysia (JTLM)</option>
                            <option value="Jabatan Tanah dan Survei Sarawak (JTSS)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Tanah dan Survei Sarawak (JTSS)</option>
                            <option value="Jabatan Tanah dan Ukur Sabah (JTUS)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Tanah dan Ukur Sabah (JTUS)</option>
                            <option value="Jabatan Ukur dan Pemetaan Malaysia (JUPEM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Ukur dan Pemetaan Malaysia (JUPEM)</option>
                            <option value="Kementerian Kesihatan Malaysia (KKM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Kementerian Kesihatan Malaysia (KKM)</option>
                            <option value="Kementerian Kerja Raya (KKR)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Kementerian Kerja Raya (KKR)</option>
                            <option value="Kementerian Pendidikan Malaysia (KPM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Kementerian Pendidikan Malaysia (KPM)</option>
                            <option value="Lembaga Lebuhraya Malaysia (LLM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Lembaga Lebuhraya Malaysia (LLM)</option>
                            <option value="Majaari Services Sdn. Bhd. (MAJAARI)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Majaari Services Sdn. Bhd. (MAJAARI)</option>
                            <option value="Kementerian Pengangkutan (MOT)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Kementerian Pengangkutan (MOT)</option>
                            <option value="Pengurusan Aset Air Berhad (PAAB)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pengurusan Aset Air Berhad (PAAB)</option>
                            <option value="Perbadanan Aset Keretapi (PAK)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Perbadanan Aset Keretapi (PAK)</option>
                            <option value="Pihak Berkuasa Air Negeri (PBAN)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pihak Berkuasa Air Negeri (PBAN)</option>
                            <option value="Pihak Berkuasa Tempatan (PBT)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pihak Berkuasa Tempatan (PBT)</option>
                            <option value="Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)</option>
                            <option value="Petroliam Nasional Berhad (PETRONAS)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Petroliam Nasional Berhad (PETRONAS)</option>
                            <option value="Pusat Hidrografi Nasional (PHN)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pusat Hidrografi Nasional (PHN)</option>
                            <option value="Pejabat Tanah Daerah (PTD)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pejabat Tanah Daerah (PTD)</option>
                            <option value="Pejabat Tanah dan Galian (PTG)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pejabat Tanah dan Galian (PTG)</option>
                            <option value="Pejabat Tanah dan Jajahan (PTJ)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Pejabat Tanah dan Jajahan (PTJ)</option>
                            <option value="Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)</option>
                            <option value="Suruhanjaya Pilihan Raya (SPR)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Suruhanjaya Pilihan Raya (SPR)</option>
                            <option value="Suruhanjaya Tenaga (ST)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Suruhanjaya Tenaga (ST)</option>
                            <option value="Tenaga Nasional Berhad (TNB)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Tenaga Nasional Berhad (TNB)</option>
                            <option value="Unit Perancang Ekonomi Negeri (UPEN)" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Unit Perancang Ekonomi Negeri (UPEN)</option>
                            <option value="Petroliam Nasional Berhad" {{ (strtolower($user->agensi_organisasi) == strtolower("ftest") ? $user->agensi_organisasi:"") }}>Petroliam Nasional Berhad</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Bahagian</label>
                      <div class="col-lg-8">
                        : <input type="text" class="form-control" name="bahagian" value="{{ $user->bahagian }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Sektor</label>
                      <div class="col-lg-8">
                        : 
                        <select class="form-control" name="sektor">
                          <option value="1" {{ ($user->sektor == '1' ? "selected":"") }}>Kerajaan</option>
                          <option value="2" {{ ($user->sektor == '2' ? "selected":"") }}>Swasta</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Emel</label>
                      <div class="col-lg-8">
                        : <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Telefon Pejabat</label>
                      <div class="col-lg-8">
                        : <input type="text" class="form-control" name="phone_pejabat" value="{{ $user->phone_pejabat }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2">Peranan</label>
                      <div class="col-lg-8">
                        : 
                        <select class="form-control" id="peranan" name="peranan[]" multiple>
                          <?php
                          if(!empty($roles)){
                            foreach($roles as $role){
                              $assigned = 1; //0=assigned,1=unassigned
                              if(!empty($user->getRoleNames())){
                                foreach($user->getRoleNames() as $roleUser){
                                  if($role->name == $roleUser){
                                    $assigned = $assigned * 0;
                                  }
                                }

                                if($assigned == 0){
                                  ?><option value="{{ $role->name }}" selected>{{ $role->name }} 1</option><?php
                                }else{
                                  ?><option value="{{ $role->name }}">{{ $role->name }} 1</option><?php
                                }
                              }else{
                                ?><option value="{{ $role->name }}">{{ $role->name }} 1</option><?php
                              }
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <script>
        $(document).ready(function(){  
            $('#gambar_profil').change(function(){    
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#fpreview').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
                $('.spanfpreview').show();
                $('.gambar_profil_text').text(this.files[0].name);
            });
        });
  </script>
@stop