<?php

use Illuminate\Database\Seeder;
use App\AgensiOrganisasi;

class AgensiOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgensiOrganisasi::create(['name' => "Agensi Angkasa Negara (ANGKASA)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Bahagian Pengairan dan Saliran Pertanian (BPSP)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Penerbangan Awam Malaysia (DCA)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Pertanian Malaysia (DOA)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Perikanan Malaysia (DOF)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Perangkaan Malaysia (DOS)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Indah Water Konsortium Sdn. Bhd. (IWK)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Alam Sekitar (JAS)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Ketua Pengarah Tanah dan Galian (JKPTG)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Kerja Raya Malaysia (JKR)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Kerajaan Tempatan (JKT)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Kerajaan Tempatan (JLM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Mineral dan Geosains Malaysia (JMG)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Meteorologi Malaysia (JMM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Perancang Bandar dan Desa Semenanjung Malaysia (JPBD)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Pengairan dan Saliran Malaysia (JPS)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Perhutanan Semenanjung Malaysia (JPSM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Taman Laut Malaysia (JTLM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Tanah dan Survei Sarawak (JTSS)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Tanah dan Ukur Sabah (JTUS)"]);
        AgensiOrganisasi::create(['name' => "Jabatan Ukur dan Pemetaan Malaysia (JUPEM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Kementerian Kesihatan Malaysia (KKM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Kementerian Kerja Raya (KKR)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Kementerian Pendidikan Malaysia (KPM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Lembaga Lebuhraya Malaysia (LLM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Majaari Services Sdn. Bhd. (MAJAARI)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Kementerian Pengangkutan (MOT)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pengurusan Aset Air Berhad (PAAB)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Perbadanan Aset Keretapi (PAK)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pihak Berkuasa Air Negeri (PBAN)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pihak Berkuasa Tempatan (PBT)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Jabatan Perlindungan Hidupan Liar dan Taman Negara (PERHILITAN)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Petroliam Nasional Berhad (PETRONAS)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pusat Hidrografi Nasional (PHN)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pejabat Tanah Daerah (PTD)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pejabat Tanah dan Galian (PTG)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Pejabat Tanah dan Jajahan (PTJ)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Suruhanjaya Komunikasi dan Multimedia Malaysia (SKMM)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Suruhanjaya Pilihan Raya (SPR)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Suruhanjaya Tenaga (ST)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Tenaga Nasional Berhad (TNB)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Unit Perancang Ekonomi Negeri (UPEN)",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "Petroliam Nasional Berhad",'sektor'=>'1']);
        AgensiOrganisasi::create(['name' => "KFC",'sektor'=>'2']);
        AgensiOrganisasi::create(['name' => "Dominos",'sektor'=>'2']);
        AgensiOrganisasi::create(['name' => "Marrybrown",'sektor'=>'2']);
        AgensiOrganisasi::create(['name' => "Open University",'sektor'=>'4']);
        AgensiOrganisasi::create(['name' => "UniKL",'sektor'=>'4']);
        AgensiOrganisasi::create(['name' => "Cosmopoint College",'sektor'=>'4']);
        AgensiOrganisasi::create(['name' => "UITM",'sektor'=>'3']);
        AgensiOrganisasi::create(['name' => "UKM",'sektor'=>'3']);
        AgensiOrganisasi::create(['name' => "UNISEL",'sektor'=>'3']);
    }
}
