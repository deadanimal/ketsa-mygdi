@extends('layouts.app_afiq')

@section('content')

<div class="col-lg-5 p-4 mt-7">
    <div class="card" style="background-color: rgba(255, 255, 255, 0.2);">
        <div class="card-body px-lg-5 py-lg-5">
            <div class="text-white" style="font-size: 17px;">
                <span>Maklumat geospatial kini dihujung jari anda.</span>
                <br>
                <span>Log Masuk.</span>
                <br>
                <br>
            </div>
            <div class="mb-4">
                <a class="text-yellow" href="#" id="hrefDaftar" data-toggle="modal" data-target="#modal-daftar-jenis-pengguna">Pengguna baru? Daftar sekarang.</a>
            </div>
            <form method="POST" action="{{ url('loginf') }}">
                                @csrf
                <div class="form-group mb-3">
                    <div class="input-group mb-3">
                        <input id="id_pengguna" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ID Pengguna">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata Laluan">
                        <div class="input-group-append">
                            <div class="input-group-text" style="cursor:grab;" onclick="myFunction3()">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div _ngcontent-lqr-c499="" class="validation-errors">
                    </div>
                </div>
                <div _ngcontent-lqr-c499="" class="row align-items-center">
                    <div _ngcontent-lqr-c499="" class="col-6 order-2">
                        <div _ngcontent-lqr-c499="" class="text-center">
                            <button type="submit" class="btn btn-warning float-right">Log Masuk</button>
                        </div>
                    </div>
                    <div _ngcontent-lqr-c499="" class="col-6 order-1">
                        <label _ngcontent-lqr-c499="" class="forget-label">
                            <a class="pointer text-white" href="{{ route('password.request') }}">Lupa kata laluan?</a>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div _ngcontent-lqr-c499="" class="col-lg-6"></div>
<div _ngcontent-lqr-c499="" class="col-lg-1">
    <div _ngcontent-lqr-c499="" class="form-group mt-7">
        <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 ml-4 float-right">
            <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0" ng-reflect-router-link="/metadata">
                <a href="{{ url('senarai_metadata_nologin') }}"><img _ngcontent-lqr-c499="" height="50" src="./afiqlogin_files/metadata.png"></a>
            </div>
            <span _ngcontent-lqr-c499="" class="text-center mt-2">Metadata</span>
        </div>
        <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 ml-4 float-right">
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

<!--===== MODALS =====-->
<div class="modal fade" id="modal-daftar-jenis-pengguna">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Sebagai:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onClick="window.parent.location.reload();window.close()">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="div_pilihan_peranan">
                                    <div class=" custom-control custom-radio mb-3">
                                        <input class="custom-control-input" id="penerbitMetadata" name="perananSelect" type="radio" value="4"/>
                                        <label class="custom-control-label" for="penerbitMetadata">
                                            Penerbit Metadata
                                        </label>
                                    </div>
                                    <div class=" custom-control custom-radio mb-3">
                                        <input class="custom-control-input" id="pengesahMetadata" name="perananSelect" type="radio" value="3"/>
                                        <label class="custom-control-label" for="pengesahMetadata">
                                            Pengesah Metadata
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input class="custom-control-input" id="pemohonData" name="perananSelect" type="radio" value="pemohonData" />
                                        <label class="custom-control-label" for="pemohonData">
                                            Pemohon Data
                                        </label>

                                        <div>
                                            <div class="divPemohonDataG2s">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="g2c" name="perananSelect" type="radio" value="2_g2c">
                                                    <label class="custom-control-label" for="g2c">
                                                        G2C
                                                    </label>
                                                    <span class="ml-3" tooltip="Awam" tooltipPlacement="right">
                                                        <i class="far fa-question-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="g2g" name="perananSelect" type="radio" value="2_g2g"/>
                                                    <label class="custom-control-label" for="g2g">
                                                        G2G
                                                    </label>
                                                    <span class="ml-3" tooltip="Agensi, Badan Berkanun, GLC" tooltipPlacement="right">
                                                        <i class="far fa-question-circle"></i>
                                                    </span>
                                                    <div class="ml-3 mt-2 divG2gOptions">
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="agensiPersNeg" name="perananSelect" type="radio" value="2_g2g_agensiPersNeg" />
                                                            <label class="custom-control-label" for="agensiPersNeg">
                                                                Agensi Persekutuan/Agensi Negeri
                                                            </label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="badanBerkanun" name="perananSelect" type="radio" value="2_g2g_badanBerkanun" />
                                                            <label class="custom-control-label" for="badanBerkanun">
                                                                Badan Berkanun
                                                            </label>
                                                        </div>
                                                        <div class=" custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="glc" name="perananSelect" type="radio" value="2_glc" />
                                                            <label class="custom-control-label" for="glc">
                                                                GLC
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="g2e" name="perananSelect" type="radio" value="2_g2e"/>
                                                    <label class="custom-control-label" for="g2e">
                                                        G2E
                                                    </label>
                                                    <span class="ml-3" tooltip="IPTA/IPTS" tooltipPlacement="right">
                                                        <i class="far fa-question-circle"></i>
                                                    </span>
                                                    <div class="ml-3 mt-2 divG2eOptions">
                                                        <div class=" custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="iptaSyarahSelidik" name="perananSelect" type="radio" value="2_g2e_iptaSyarahSelidik" />
                                                            <label class="custom-control-label" for="iptaSyarahSelidik">
                                                                IPTA - Pensyarah/Penyelidik
                                                            </label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="iptaPelajar" name="perananSelect" type="radio" value="2_g2e_iptaPelajar" />
                                                            <label class="custom-control-label" for="iptaPelajar">
                                                                IPTA - Pelajar
                                                            </label>
                                                        </div>
                                                        <div class=" custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="iptsSyarahSelidik" name="perananSelect" type="radio" value="2_g2e_iptsSyarahSelidik" />
                                                            <label class="custom-control-label" for="iptsSyarahSelidik">
                                                                IPTS - Pensyarah/Penyelidik
                                                            </label>
                                                        </div>
                                                        <div class=" custom-control custom-radio mb-3">
                                                            <input class="custom-control-input" id="iptsPelajar" name="perananSelect" type="radio" value="2_g2e_iptsPelajar" />
                                                            <label class="custom-control-label" for="iptsPelajar">
                                                                IPTS - Pelajar
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=================?>
                                <div id="form_registration">
                                    <div class="row mb-2 divNama">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-username">
                                                Nama Penuh
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="input-username" placeholder="Nama Penuh seperti dalam Kad Pengenalan" type="text" name="name"/>
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divNric">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-nric">
                                                No NRIC
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="input-nric" placeholder="No Kad Pengenalan" type="text" name="nric"/>
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divAgensiOrganisasi">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-agensi">Agensi/Organisasi/Institusi</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="agensi_organisasi" class="form-control form-control-sm ml-3 txt_agensi_organisasi1">
                                                <option value="Agensi Angkasa Negara (ANGKASA)">Agensi Angkasa Negara (ANGKASA)</option>
                                                <option value="Bahagian Pengairan dan Saliran Pertanian (BPSP)">Bahagian Pengairan dan Saliran Pertanian (BPSP)</option>
                                                <option value="Jabatan Penerbangan Awam Malaysia (DCA)">Jabatan Penerbangan Awam Malaysia (DCA)</option>
                                                <option value="Jabatan Pertanian Malaysia (DOA)">Jabatan Pertanian Malaysia (DOA)</option>
                                                <option value="Jabatan Perikanan Malaysia (DOF)">Jabatan Perikanan Malaysia (DOF)</option>
                                                <option value="Jabatan Perangkaan Malaysia (DOS)">Jabatan Perangkaan Malaysia (DOS)</option>
                                                <option value="Indah Water Konsortium Sdn. Bhd. (IWK)">Indah Water Konsortium Sdn. Bhd. (IWK)</option>
                                                <option value="Jabatan Alam Sekitar (JAS)">Jabatan Alam Sekitar (JAS)</option>
                                                <option value="Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)">Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)</option>
                                                <option value="Jabatan Kerja Raya Malaysia (JKR)">Jabatan Kerja Raya Malaysia (JKR)</option>
                                                <option value="Jabatan Kerajaan Tempatan (JKT)">Jabatan Kerajaan Tempatan (JKT)</option>
                                                <option value="Jabatan Kerajaan Tempatan (JLM)">Jabatan Kerajaan Tempatan (JLM)</option>
                                                <option value="Jabatan Mineral dan Geosains Malaysia (JMG)">Jabatan Mineral dan Geosains Malaysia (JMG)</option>
                                                <option value="Jabatan Meteorologi Malaysia (JMM)">Jabatan Meteorologi Malaysia (JMM)</option>
                                                <option value="Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)">Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)</option>
                                                <option value="Jabatan Pengairan dan Saliran Malaysia (JPS)">Jabatan Pengairan dan Saliran Malaysia (JPS)</option>
                                                <option value="Jabatan Perhutanan Semenanjung Malaysia (JPSM)">Jabatan Perhutanan Semenanjung Malaysia (JPSM)</option>
                                                <option value="Jabatan Taman Laut Malaysia (JTLM)">Jabatan Taman Laut Malaysia (JTLM)</option>
                                                <option value="Jabatan Tanah dan Survei Sarawak (JTSS)">Jabatan Tanah dan Survei Sarawak (JTSS)</option>
                                                <option value="Jabatan Tanah dan Ukur Sabah (JTUS)">Jabatan Tanah dan Ukur Sabah (JTUS)</option>
                                                <option value="Jabatan Ukur dan Pemetaan Malaysia (JUPEM)">Jabatan Ukur dan Pemetaan Malaysia (JUPEM)</option>
                                                <option value="Kementerian Kesihatan Malaysia (KKM)">Kementerian Kesihatan Malaysia (KKM)</option>
                                                <option value="Kementerian Kerja Raya (KKR)">Kementerian Kerja Raya (KKR)</option>
                                                <option value="Kementerian Pendidikan Malaysia (KPM)">Kementerian Pendidikan Malaysia (KPM)</option>
                                                <option value="Lembaga Lebuhraya Malaysia (LLM)">Lembaga Lebuhraya Malaysia (LLM)</option>
                                                <option value="Majaari Services Sdn. Bhd. (MAJAARI)">Majaari Services Sdn. Bhd. (MAJAARI)</option>
                                                <option value="Kementerian Pengangkutan (MOT)">Kementerian Pengangkutan (MOT)</option>
                                                <option value="Pengurusan Aset Air Berhad (PAAB)">Pengurusan Aset Air Berhad (PAAB)</option>
                                                <option value="Perbadanan Aset Keretapi (PAK)">Perbadanan Aset Keretapi (PAK)</option>
                                                <option value="Pihak Berkuasa Air Negeri (PBAN)">Pihak Berkuasa Air Negeri (PBAN)</option>
                                                <option value="Pihak Berkuasa Tempatan (PBT)">Pihak Berkuasa Tempatan (PBT)</option>
                                                <option value="Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)">Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)</option>
                                                <option value="Petroliam Nasional Berhad (PETRONAS)">Petroliam Nasional Berhad (PETRONAS)</option>
                                                <option value="Pusat Hidrografi Nasional (PHN)">Pusat Hidrografi Nasional (PHN)</option>
                                                <option value="Pejabat Tanah Daerah (PTD)">Pejabat Tanah Daerah (PTD)</option>
                                                <option value="Pejabat Tanah dan Galian (PTG)">Pejabat Tanah dan Galian (PTG)</option>
                                                <option value="Pejabat Tanah dan Jajahan (PTJ)">Pejabat Tanah dan Jajahan (PTJ)</option>
                                                <option value="Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)">Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)</option>
                                                <option value="Suruhanjaya Pilihan Raya (SPR)">Suruhanjaya Pilihan Raya (SPR)</option>
                                                <option value="Suruhanjaya Tenaga (ST)">Suruhanjaya Tenaga (ST)</option>
                                                <option value="Tenaga Nasional Berhad (TNB)">Tenaga Nasional Berhad (TNB)</option>
                                                <option value="Unit Perancang Ekonomi Negeri (UPEN)">Unit Perancang Ekonomi Negeri (UPEN)</option>
                                                <option value="Petroliam Nasional Berhad">Petroliam Nasional Berhad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divInstitusi">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-agensi">Institusi</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="agensi_organisasi" class="form-control form-control-sm ml-3 txt_agensi_organisasi2">
                                                <option value="Agensi Angkasa Negara (ANGKASA)">Agensi Angkasa Negara (ANGKASA)</option>
                                                <option value="Bahagian Pengairan dan Saliran Pertanian (BPSP)">Bahagian Pengairan dan Saliran Pertanian (BPSP)</option>
                                                <option value="Jabatan Penerbangan Awam Malaysia (DCA)">Jabatan Penerbangan Awam Malaysia (DCA)</option>
                                                <option value="Jabatan Pertanian Malaysia (DOA)">Jabatan Pertanian Malaysia (DOA)</option>
                                                <option value="Jabatan Perikanan Malaysia (DOF)">Jabatan Perikanan Malaysia (DOF)</option>
                                                <option value="Jabatan Perangkaan Malaysia (DOS)">Jabatan Perangkaan Malaysia (DOS)</option>
                                                <option value="Indah Water Konsortium Sdn. Bhd. (IWK)">Indah Water Konsortium Sdn. Bhd. (IWK)</option>
                                                <option value="Jabatan Alam Sekitar (JAS)">Jabatan Alam Sekitar (JAS)</option>
                                                <option value="Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)">Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)</option>
                                                <option value="Jabatan Kerja Raya Malaysia (JKR)">Jabatan Kerja Raya Malaysia (JKR)</option>
                                                <option value="Jabatan Kerajaan Tempatan (JKT)">Jabatan Kerajaan Tempatan (JKT)</option>
                                                <option value="Jabatan Kerajaan Tempatan (JLM)">Jabatan Kerajaan Tempatan (JLM)</option>
                                                <option value="Jabatan Mineral dan Geosains Malaysia (JMG)">Jabatan Mineral dan Geosains Malaysia (JMG)</option>
                                                <option value="Jabatan Meteorologi Malaysia (JMM)">Jabatan Meteorologi Malaysia (JMM)</option>
                                                <option value="Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)">Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)</option>
                                                <option value="Jabatan Pengairan dan Saliran Malaysia (JPS)">Jabatan Pengairan dan Saliran Malaysia (JPS)</option>
                                                <option value="Jabatan Perhutanan Semenanjung Malaysia (JPSM)">Jabatan Perhutanan Semenanjung Malaysia (JPSM)</option>
                                                <option value="Jabatan Taman Laut Malaysia (JTLM)">Jabatan Taman Laut Malaysia (JTLM)</option>
                                                <option value="Jabatan Tanah dan Survei Sarawak (JTSS)">Jabatan Tanah dan Survei Sarawak (JTSS)</option>
                                                <option value="Jabatan Tanah dan Ukur Sabah (JTUS)">Jabatan Tanah dan Ukur Sabah (JTUS)</option>
                                                <option value="Jabatan Ukur dan Pemetaan Malaysia (JUPEM)">Jabatan Ukur dan Pemetaan Malaysia (JUPEM)</option>
                                                <option value="Kementerian Kesihatan Malaysia (KKM)">Kementerian Kesihatan Malaysia (KKM)</option>
                                                <option value="Kementerian Kerja Raya (KKR)">Kementerian Kerja Raya (KKR)</option>
                                                <option value="Kementerian Pendidikan Malaysia (KPM)">Kementerian Pendidikan Malaysia (KPM)</option>
                                                <option value="Lembaga Lebuhraya Malaysia (LLM)">Lembaga Lebuhraya Malaysia (LLM)</option>
                                                <option value="Majaari Services Sdn. Bhd. (MAJAARI)">Majaari Services Sdn. Bhd. (MAJAARI)</option>
                                                <option value="Kementerian Pengangkutan (MOT)">Kementerian Pengangkutan (MOT)</option>
                                                <option value="Pengurusan Aset Air Berhad (PAAB)">Pengurusan Aset Air Berhad (PAAB)</option>
                                                <option value="Perbadanan Aset Keretapi (PAK)">Perbadanan Aset Keretapi (PAK)</option>
                                                <option value="Pihak Berkuasa Air Negeri (PBAN)">Pihak Berkuasa Air Negeri (PBAN)</option>
                                                <option value="Pihak Berkuasa Tempatan (PBT)">Pihak Berkuasa Tempatan (PBT)</option>
                                                <option value="Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)">Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)</option>
                                                <option value="Petroliam Nasional Berhad (PETRONAS)">Petroliam Nasional Berhad (PETRONAS)</option>
                                                <option value="Pusat Hidrografi Nasional (PHN)">Pusat Hidrografi Nasional (PHN)</option>
                                                <option value="Pejabat Tanah Daerah (PTD)">Pejabat Tanah Daerah (PTD)</option>
                                                <option value="Pejabat Tanah dan Galian (PTG)">Pejabat Tanah dan Galian (PTG)</option>
                                                <option value="Pejabat Tanah dan Jajahan (PTJ)">Pejabat Tanah dan Jajahan (PTJ)</option>
                                                <option value="Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)">Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)</option>
                                                <option value="Suruhanjaya Pilihan Raya (SPR)">Suruhanjaya Pilihan Raya (SPR)</option>
                                                <option value="Suruhanjaya Tenaga (ST)">Suruhanjaya Tenaga (ST)</option>
                                                <option value="Tenaga Nasional Berhad (TNB)">Tenaga Nasional Berhad (TNB)</option>
                                                <option value="Unit Perancang Ekonomi Negeri (UPEN)">Unit Perancang Ekonomi Negeri (UPEN)</option>
                                                <option value="Petroliam Nasional Berhad">Petroliam Nasional Berhad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divBahagian">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="bahagian">Bahagian</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="bahagian" placeholder="Bahagian" type="text" name="bahagian"/>
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divSektor">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-agensi">Sektor</label>
                                        </div>
                                        <div class="col-8">
                                            <select class=" form-control form-control-sm ml-3" id="sektor" name="sektor">
                                                <option selected disabled>Pilih</option>
                                                <option value="1">Kerajaan</option>
                                                <option value="2">Swasta</option>
                                            </select>
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divEmel">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-emel">Emel</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control form-control-sm ml-3 input_email" placeholder="Masukan E-mel anda" type="text" name="email" />
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divEmelRasmi">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-emel">Emel Rasmi</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control form-control-sm ml-3 input_email_rasmi" placeholder="Masukan E-mel anda" type="text" name="email" />
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divPhonePejabat">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-tpejabat">
                                                Telefon Pejabat
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control form-control-sm ml-3" id="input-tpejabat" placeholder="Nombor Telefon Pejabat" type="text" name="phone_pejabat" />
                                        </div>
                                    </div>
                                    <div class="row mb-2 divPhoneBimbit">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-tbimbit">
                                                Telefon Bimbit
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control form-control-sm ml-3" id="input-tbimbit" placeholder="Nombor Telefon Bimbit" type="text" name="phone_bimbit" />
                                        </div>
                                    </div>
                                    <div class="row mb-2 divPeranan">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-peranan">
                                                Peranan
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="peranan" name="peranan" class="form-control form-control-sm ml-3 peranan" readonly>
                                            <!-- <select name="peranan" class="form-control form-control-sm ml-3 peranan" readonly>
                                                <option value="Penerbit Metadata">Penerbit Metadata</option>
                                                <option value="Pengesah Metadata">Pengesah Metadata</option>
                                                <option value="Pemohon Data">Pemohon Data</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="row mb-2 divAgensiOrganisasiAlamat">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-address">
                                                Alamat
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <textarea class="form-control form-control-sm ml-3" id="input-address" row="4" placeholder="Alamat Agensi/Organisasi" type="text" name="alamat"></textarea>
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-2 divKategori">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input-kategori">
                                                Kategori
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <select name="kategori" class="form-control form-control-sm ml-3 peranan">
                                                <option value="1">Agensi Persekutuan/Agensi Negeri</option>
                                                <option value="2">Badan Berkanun</option>
                                                <option value="3">GLC</option>
                                                <option value="4">IPTA - Pensyarah/Penyelidik</option>
                                                <option value="5">IPTA - Pelajar</option>
                                                <option value="6">IPTS - Pensyarah/Penyelidik</option>
                                                <option value="7">IPTS - Pelajar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="my-4" />

                                    <h6 class="heading-small text-muted mb-4"> Kata Laluan</h6>
                                    <div class="pl-lg-4">
                                        <div class="row mb-2">
                                            <div class="col-4">
                                                <label class="form-control-label mr-4" for="password">
                                                    Kata Laluan
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <input id="password_daftar" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                                                    <span class="input-group-append">
                                                      <button type="button" class="btn btn-link btn-flat" onclick="myFunction()">Show Password</button>
                                                    </span>
                                                </div>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4">
                                                <label class="form-control-label mr-4" for="input-password-sah">
                                                    Sahkan Kata Laluan
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                                                    <span class="input-group-append">
                                                      <button type="button" class="btn btn-link btn-flat" onclick="myFunction2()">Show Password</button>
                                                    </span>
                                                </div>
                                                <p class="error-message"><span></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=================?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>-->
                    <button type="button" class="btn btn-dark" id="btn_isi_borang">Isi Borang</button>
                    <button type="submit" class="btn btn-default" id="btn_daftar">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on("click", "#btn_hantar2", function () {
        $('#modal-daftar-jenis-pengguna').modal('hide');
        $('#modal-daftar-pengguna').modal('hide');
        $('#modal-hantar').modal('show');
    });
    
    $(document).on("click", "#hrefDaftar", function () {
        $('#div_pilihan_peranan').show();
        $('#form_registration').hide();
        $('#btn_daftar').hide();
    });
    
    $('input:radio[name="perananSelect"]').change(function() {
        var per = $(this).val();
        
        //form elements to hide or show
        if(per == "3" || per == "4"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divBahagian").show();
            $(".divSektor").show();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".input_email_rasmi").prop("disabled",true);
            $(".input_email").prop("disabled",false);
            $(".divPhonePejabat").show();
            $(".divPeranan").show();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divInstitusi").hide();
            $(".txt_agensi_organisasi1").prop('disabled',false);
            $(".txt_agensi_organisasi2").prop('disabled',true);
            $(".divPhoneBimbit").hide();
            $(".divKategori").hide();
            $('.divPemohonDataG2s').hide();
            $('#btn_isi_borang').show();
        }else if(per == "pemohonData"){
            $('.divPemohonDataG2s').show();
            $('#btn_isi_borang').hide();
        }else if(per == "2_g2c"){
            $('#btn_isi_borang').show();
        }else if(per == "2_g2g"){
            $('#btn_isi_borang').hide();
            $('.divG2gOptions').show();
            $('.divG2eOptions').hide();
        }else if(per == "2_g2e"){
            $('#btn_isi_borang').hide();
            $('.divG2gOptions').hide();
            $('.divG2eOptions').show();
        }else if(per == "2_g2g_agensiPersNeg"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").show();
            $(".input_email_rasmi").prop("disabled",false);
            $(".input_email").prop("disabled",true);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $(".divAgensiOrganisasiAlamat").hide();
            $(".divInstitusi").hide();
            $(".txt_agensi_organisasi1").prop('disabled',false);
            $(".txt_agensi_organisasi2").prop('disabled',true);
            $('#btn_isi_borang').show();
        }else if(per == "2_g2g_badanBerkanun"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").show();
            $(".input_email_rasmi").prop("disabled",false);
            $(".input_email").prop("disabled",true);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $(".divInstitusi").hide();
            $(".txt_agensi_organisasi1").prop('disabled',false);
            $(".txt_agensi_organisasi2").prop('disabled',true);
            $('#btn_isi_borang').show();
        }else if(per == "2_glc"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divAgensiOrganisasi").show();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").hide();
            $(".divEmelRasmi").show();
            $(".input_email_rasmi").prop("disabled",false);
            $(".input_email").prop("disabled",true);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $(".divInstitusi").hide();
            $(".txt_agensi_organisasi1").prop('disabled',false);
            $(".txt_agensi_organisasi2").prop('disabled',true);
            $('#btn_isi_borang').show();
        }else if(per == "2_g2e_iptaSyarahSelidik"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".txt_agensi_organisasi1").prop('disabled',true);
            $(".txt_agensi_organisasi2").prop('disabled',false);
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".input_email_rasmi").prop("disabled",true);
            $(".input_email").prop("disabled",false);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $('#btn_isi_borang').show();
        }else if(per == "2_g2e_iptaPelajar"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".txt_agensi_organisasi1").prop('disabled',true);
            $(".txt_agensi_organisasi2").prop('disabled',false);
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".input_email_rasmi").prop("disabled",true);
            $(".input_email").prop("disabled",false);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $('#btn_isi_borang').show();
        }else if(per == "2_g2e_iptsSyarahSelidik"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".txt_agensi_organisasi1").prop('disabled',true);
            $(".txt_agensi_organisasi2").prop('disabled',false);
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".input_email_rasmi").prop("disabled",true);
            $(".input_email").prop("disabled",false);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $('#btn_isi_borang').show();
        }else if(per == "2_g2e_iptsPelajar"){
            $(".divNama").show();
            $(".divNric").show();
            $(".divInstitusi").show();
            $(".txt_agensi_organisasi1").prop('disabled',true);
            $(".txt_agensi_organisasi2").prop('disabled',false);
            $(".divAgensiOrganisasi").hide();
            $(".divAgensiOrganisasiAlamat").show();
            $(".divBahagian").hide();
            $(".divSektor").hide();
            $(".divEmel").show();
            $(".divEmelRasmi").hide();
            $(".input_email_rasmi").prop("disabled",true);
            $(".input_email").prop("disabled",false);
            $(".divPhonePejabat").show();
            $(".divPhoneBimbit").show();
            $(".divPeranan").show();
            $(".divKategori").show();
            $('#btn_isi_borang').show();
        }

        //pre-set form values based on role selected
        if(per == "3"){
            $("#peranan").val('Pengesah Metadata');
        }else if(per == "4"){
            $("#peranan").val('Penerbit Metadata');
        }else{
            $("#peranan").val('Pemohon Data');
        }
    });
    
    $(document).on("click", "#btn_isi_borang", function () {
        $('#div_pilihan_peranan').hide();
        $('#form_registration').show();
        $('#btn_daftar').show();
        $(this).hide();
    });
    
    $(document).ready(function () {
        //ajax get roles
        $.ajax({
            method: "POST",
            url: "get_roles",
            data: {"_token": "{{ csrf_token() }}"},
            dataType: "json",
        }).done(function (data) {
            data.forEach(function (the_var) {
                $("#peranan").append("<option value='" + the_var.id + "'>" + the_var.name + "</option>");
            });
        });
        
        $('#form_registration').hide();
        $('#btn_isi_borang').hide();
        $('#btn_daftar').hide();
        $('.divPemohonDataG2s').hide();
        $('.divG2gOptions').hide();
        $('.divG2eOptions').hide();
        
        
        $(document).on("click","#btn_backdoor",function(){
           $("#form_backdoor").submit(); 
        });

        <?php
        if(null !== Session::get('msg') && !is_null(Session::get('msg')) && 'NULL' != Session::get('msg')){
            ?>alert("<?php echo Session::get('msg'); ?>");<?php
        }
        ?>
                
        $("#input-nric,#input-tpejabat").inputFilter(function(value) {
          return /^\d*$/.test(value);
        });
        
    });
    
    function myFunction() {
        var x = document.getElementById("password_daftar");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
    }
    function myFunction2() {
        var x = document.getElementById("password-confirm");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
    }
    function myFunction3() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
    }
</script>

@stop
