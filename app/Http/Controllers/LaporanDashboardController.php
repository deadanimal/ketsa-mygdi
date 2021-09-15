<?php

namespace App\Http\Controllers;

use App\LaporanDashboard;
use App\MohonData;
use Illuminate\Http\Request;
use DB;
use App\MetadataGeo;
use App\User;
use App\MCategory;

class LaporanDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_laporan_data()
    {
        $permohonans = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->select('mohon_data.status','users.kategori','mohon_data.date','mohon_data.acceptance',DB::raw('count(*) as total'),DB::raw('users.name as username'),DB::raw('agensi_organisasi.name as agensi_name'),)
                                ->groupBy('agensi_organisasi.name','mohon_data.status','users.kategori','mohon_data.date','mohon_data.acceptance','users.name')
                                ->get();
        $permohonan_perincian = MohonData::get();
        $permohonan_lulus = MohonData::where(['status' => 3])->get();
        $permohonan_kategori = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->select('agensi_organisasi.name','mohon_data.date',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                                ->groupBy('users.name','agensi_organisasi.name','mohon_data.date')
                                ->get();
        // dd($permohonan_kategori);
        $permohonan_kategori_count = count($permohonan_kategori);
        return view('mygeo.laporan_data_asas', compact('permohonans','permohonan_kategori','permohonan_lulus','permohonan_perincian'));
    }
    
    public function index_laporan_metadata()
    {
        $metadatasdb = MetadataGeo::on('pgsql2')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        foreach ($metadatasdb as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            $metadatas[$met->id] = [$xml2, $met];
        }
        
        $permohonan_perincian = MohonData::get();
        $permohonan_lulus = MohonData::where(['status' => 3])->get();
        $permohonan_kategori = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->select('agensi_organisasi.name','mohon_data.date',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                                ->groupBy('users.name','agensi_organisasi.name','mohon_data.date')
                                ->get();
        // dd($permohonan_kategori);
        $permohonan_kategori_count = count($permohonan_kategori);
        return view('mygeo.laporan_metadata', compact('metadatas','permohonan_kategori','permohonan_lulus','permohonan_perincian'));
    }

    public function index_mygeo_dashboard(){
        $total_permohonan = MohonData::where('status','!=',0)->get()->count();
        $total_permohonan_lulus = MohonData::where('status','=',3)->get()->count();
        $total_permohonan_tolak = MohonData::where('status','=',2)->get()->count();
        
        //JUMLAH METADATA YANG TELAH DITERBITKAN
        $metadataTerbit = count(MetadataGeo::on('pgsql2')->where('disahkan','=','yes')->get());
        
        //Jumlah Metadata Diterbitkan Mengikut Agensi di Malaysia
        $metadataTerbitByAgency = [];
        $metadataTerbitByAgencyKeys = [];
        $metadataTerbitByAgencyVals = [];
        $agencies = User::all();
        $agencyIds = $agencies->groupBy('agensi_organisasi');
        foreach($agencyIds as $ai){
            $count = 0;
            $idsToSearch = [];
            $agencyName = "";
            foreach($ai as $user){
                if($user->hasRole('Pemohon Data')){
                    $agencyName = $user->agensi_organisasi;
                }else{
                    $agencyName = $user->agensiOrganisasi->name;
                }
                $idsToSearch[] = $user->id;
            }
            $count = count(MetadataGeo::on('pgsql2')->whereIn('portal_user_id',$idsToSearch)->get());
            $metadataTerbitByAgency[$agencyName] = $count;
            $metadataTerbitByAgencyKeys[] = $agencyName;
            $metadataTerbitByAgencyVals[] = $count;
        }
        
        //Bilangan metadata yang belum diterbitkan (Draf dan Perlu Pengesahan)
        $metadataBelumTerbit = count(MetadataGeo::on('pgsql2')->where('disahkan','=','0')->orWhere('is_draf','=','yes')->get());
        
        //Bilangan metadata mengikut kategori
        $metadataByCategory = [];
        $metadataByCategoryKeys = [];
        $metadataByCategoryVals = [];
        $categories = MCategory::get();
        foreach($categories as $c){
            $metadataByCategory[$c->name] = count(MetadataGeo::on('pgsql2')->where('data','LIKE','%codeListValue="dataset">'.$c->name.'<%')->get());
            $metadataByCategoryKeys[] = $c->name;
            $metadataByCategoryVals[] = count(MetadataGeo::on('pgsql2')->where('data','LIKE','%codeListValue="dataset">'.$c->name.'<%')->get());
        }
        
        //Statistik penerbitan metadata mengikut tahun
        $metadataByYear = [];
        $metadataByYearKeys = [];
        $metadataByYearVals = [];
        $metadatas = MetadataGeo::on('pgsql2')->get();
        $years = [];
        foreach($metadatas as $m){
            $year = date('Y',strtotime($m->createdate));
            if(array_key_exists($year,$metadataByYear)){
                $metadataByYear[$year] += 1;
            }else{
                $metadataByYear[$year] = 1;
            }
        }
        foreach($metadataByYear as $key=>$val){
            $metadataByYearKeys[] = $key;
            $metadataByYearVals[] = $val;
        }
        
        return view('mygeo.dashboard', compact('total_permohonan','total_permohonan_lulus','total_permohonan_tolak','metadataTerbit','metadataTerbitByAgency','metadataTerbitByAgencyKeys','metadataTerbitByAgencyVals','metadataBelumTerbit','metadataByCategory','metadataByCategoryKeys','metadataByCategoryVals','metadataByYear','metadataByYearKeys','metadataByYearVals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanDashboard $laporanDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanDashboard $laporanDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanDashboard $laporanDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanDashboard $laporanDashboard)
    {
        //
    }
}
