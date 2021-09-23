<?php

namespace App\Http\Controllers;

use App\LaporanDashboard;
use App\MohonData;
use App\SenaraiKawasanData;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\MetadataGeo;
use App\User;
use App\MCategory;
use Auth;

class LaporanDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_laporan_data()
    {
        $permohonans = MohonData::get();

        $permohonan_lulus = MohonData::where(['status' => 3])->get();
        $permohonan_kategori = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->join('senarai_kawasan_data','mohon_data.id','=','senarai_kawasan_data.permohonan_id')
                                ->select('agensi_organisasi.name','senarai_kawasan_data.kategori',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                                ->groupBy('users.name','agensi_organisasi.name','senarai_kawasan_data.kategori')
                                ->get();
        $permohonan_statistik = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->select(DB::raw('EXTRACT( year from mohon_data.date) as tahun'),DB::raw('agensi_organisasi.name as agensi_name'),DB::raw('count(*) as total_permohonan'))
                                ->groupBy('agensi_organisasi.name','tahun')
                                ->get();
        // dd($permohonan_statistik);
        $permohonan_count = count($permohonans);
        return view('mygeo.laporan_data_asas', compact('permohonans','permohonan_kategori','permohonan_lulus','permohonan_statistik','permohonan_count'));
    }

    public function index_laporan_metadata()
    {
        //perincian
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

        $categories = MCategory::get();

        //Jumlah Metadata Diterbitkan Mengikut Agensi di Malaysia
//        $metadatasdb = MetadataGeo::on('pgsql2')->orderBy('id', 'DESC')->get()->all();
//        $metadatas = [];
//        foreach ($metadatasdb as $met) {
//            $ftestxml2 = <<<XML
//                    $met->data
//                    XML;
//            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
//            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
//            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
//            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
//
//            $xml2 = simplexml_load_string($ftestxml2);
//            $metadatas[$met->id] = [$xml2, $met];
//        }

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
        
        return view('mygeo.laporan_metadata', compact('metadatas','categories','permohonan_kategori','permohonan_lulus','permohonan_perincian'));
    }
    
    public function laporan_perincian_metadata(){
        //initialize
        $wordTest = new \PhpOffice\PhpWord\PhpWord();
 
        //add section
        $newSection = $wordTest->addSection();
        
        //add text to section
        $newSection->addText("Laporan Perincian Metadata",array('name'=>'Tahoma','size'=>15,'color'=>'red'));
        
        //set table style
        $tableStyle = array(
            'borderColor' => '006699',
            'borderSize'  => 6,
            'cellMargin'  => 50
        );
        //set first row style
        $firstRowStyle = array('bgColor' => '66BBFF');
        //add styles to the document (at this point it is not yet applied. this is similar to linking css)
        $wordTest->addTableStyle('myTable', $tableStyle, $firstRowStyle);
        
        //add table to document and apply style created in previous lines
        $table = $newSection->addTable('myTable');
            $metadatasdb = MetadataGeo::on('pgsql2')->orderBy('id', 'DESC')->get()->all();
            $counter = 0;
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
                
                $counter++;
                $table->addRow();
                //add cell
                $table->addCell(900)->addText($counter);
                //add cell
                $title = "";
                if(isset($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && trim($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) != ""){
                    $title = $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                }
                $table->addCell(5000)->addText(htmlspecialchars($title));
                //add cell
                $status = "";
                if($met->is_draf == "yes"){
                    $status = "Draf";
                }else{
                    if($met->disahkan == "0"){
                        $status = "Perlu Pengesahan";
                    }elseif($met->disahkan == "yes"){
                        $status = "Diterbitkan";
                    }elseif($met->disahkan == "yes"){
                        $status = "Perlu Pembetulan";
                    }
                }
                $table->addCell(2500)->addText($status);
                //add cell
                $table->addCell(1750)->addText(date('d/m/Y',strtotime($met->changedate)));
            }
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('Laporan_Perincian_Metadata.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('Laporan_Perincian_Metadata.docx'));
    }

    public function index_mygeo_dashboard(){
        $total_permohonan = MohonData::get()->count();
        $total_permohonan_lulus = MohonData::where('status','=',3)->get()->count();
        $total_permohonan_tolak = MohonData::where('status','=',2)->get()->count();
        $permohonans = DB::table('mohon_data')
                                ->select(DB::raw('EXTRACT( year from date) as tahun'),DB::raw('count(*) as total_permohonan'))
                                ->groupBy('tahun')
                                ->get();
        $permohonan_kategori = DB::table('mohon_data')
                                ->join('senarai_kawasan_data','mohon_data.id','=','senarai_kawasan_data.permohonan_id')
                                ->select('senarai_kawasan_data.kategori',DB::raw('count(*) as total'))
                                ->groupBy('senarai_kawasan_data.kategori')
                                ->get();
        // dd($permohonan_kategori);

        //JUMLAH METADATA YANG TELAH DITERBITKAN
        if(Auth::user()->hasRole('Pemohon Data')){
            $agencyName = Auth::user()->agensi_organisasi;
        }else{
            $agencyName = Auth::user()->agensiOrganisasi->name;
        }
        $metadataTerbit = count(MetadataGeo::on('pgsql2')->where('data','LIKE','%>'.$agencyName.'<%')->get());

        //Jumlah Metadata Diterbitkan Mengikut Agensi di Malaysia
//        $metadataTerbitByAgency = [];
//        $metadataTerbitByAgencyKeys = [];
//        $metadataTerbitByAgencyVals = [];
//        $agencies = User::all();
//        $agencyIds = $agencies->groupBy('agensi_organisasi');
//        foreach($agencyIds as $key=>$val){
//            $count = 0;
//            $idsToSearch = [];
//            $agencyName = "";
//            foreach($val as $user){
//                $userRoles = explode(',',$user->assigned_roles);
//                if(!in_array('Pemohon Data',$userRoles)){
//                    $agencyName = $user->agensiOrganisasi->name;
//                }else{
//                    break 2;
//                }
//                $idsToSearch[] = $user->id;
//            }
//            $count = count(MetadataGeo::on('pgsql2')->whereIn('portal_user_id',$idsToSearch)->get());
//            $metadataTerbitByAgency[$agencyName] = $count;
//            $metadataTerbitByAgencyKeys[] = $agencyName;
//            $metadataTerbitByAgencyVals[] = $count;
//        }

        //Jumlah Metadata Diterbitkan Mengikut Agensi di Malaysia
        $metadataTerbitByAgency = [];
        $metadataTerbitByAgencyKeys = [];
        $metadataTerbitByAgencyVals = [];
        $agencyBhgnsToSearch = [];
        $agencies = User::all();
        $agencyIds = $agencies->groupBy('agensi_organisasi');
        $idsToSearch = [];
        foreach($agencyIds as $key=>$val){
            foreach($val as $user){
                $userRoles = explode(",",$user->assigned_roles);
                if(in_array('Pemohon Data',$userRoles)){
                    break;
                }
                if(trim($user->bahagian) == ""){
                    $var = $user->agensiOrganisasi->name;
                }else{
                    $var = $user->agensiOrganisasi->name.' ('.$user->bahagian.')';
                }
                $idsToSearch[$var][] = $user->id;
            }
        }
        foreach($idsToSearch as $key=>$val){
            $count = 0;
            foreach($val as $userid){
                $count += count(MetadataGeo::on('pgsql2')->where('portal_user_id',$userid)->get());
            }
            $metadataTerbitByAgencyKeys[] = $key;
            $metadataTerbitByAgencyVals[] = $count;
        }

        //Bilangan metadata yang belum diterbitkan (Draf dan Perlu Pengesahan)
        $metadataBelumTerbit = count(MetadataGeo::on('pgsql2')->where('disahkan','=','0')->orWhere('disahkan','=','no')->orWhere('is_draf','=','yes')->get());

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

        //Jumlah metadata diterbitkan mengikut topik kategori
        $metadataByTopicCategory = [
            'Administrative and Political Boundaries' => 0,
            'Agriculture and Farming' => 0,
            'Atmosphere and Climatic' => 0,
            'Biology and Ecology' => 0,
            'Business and Economic' => 0,
            'Cadastral' => 0,
            'Cultural, Society and Demography' => 0,
            'Elevation and Derived Products' => 0,
            'Environment and Conservation' => 0,
            'Facilities and Structures' => 0,
            'Geological and Geophysical' => 0,
            'Human Health and Disease' => 0,
            'Imagery and Base Maps' => 0,
            'Inland Water Resources' => 0,
            'Locations and Geodetic Networks' => 0,
            'Military' => 0,
            'Oceans and Estuaries' => 0,
            'Transportation Networks' => 0,
            'Utilities and Communication' => 0,
        ];
        foreach($metadataByTopicCategory as $key=>$val){
            $metadatas = count(MetadataGeo::on('pgsql2')->where('data','LIKE','%<MD_TopicCategoryCode>'.$key.'<%')->get());
            $metadataByTopicCategory[$key] = $metadatas;
        }

        return view('mygeo.dashboard', compact('total_permohonan','total_permohonan_lulus','total_permohonan_tolak','metadataTerbit','metadataTerbitByAgency','metadataTerbitByAgencyKeys','metadataTerbitByAgencyVals','metadataBelumTerbit','metadataByCategory','metadataByCategoryKeys','metadataByCategoryVals','metadataByYear','metadataByYearKeys','metadataByYearVals','metadataByTopicCategory','permohonan_kategori','permohonans'));
    }

    public function generate_pdf_laporan_perincian_data(Request $request){

        $permohonan = MohonData::where('id', $request->permohonan_id)->first();
        $senarai_kawasan = SenaraiKawasanData::where('permohonan_id', $request->permohonan_id)->get();
        $pdf = PDF::loadView('pdfs.laporan_data', compact('senarai_kawasan','permohonan'));

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        return $pdf->stream();
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
