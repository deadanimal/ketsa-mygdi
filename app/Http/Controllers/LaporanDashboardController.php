<?php

namespace App\Http\Controllers;

use App\AgensiOrganisasi;
use Carbon\Carbon;
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
use PhpOffice\PhpWord\PhpWord;

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
        ->join('agensi_organisasi',DB::raw('CAST(users.agensi_organisasi AS INT)'),'=','agensi_organisasi.id')
        ->select(DB::raw('agensi_organisasi.name as agensi'),
         DB::raw('count(*) as total'))
        ->groupBy('agensi')
        ->get();

        $permohonan_kategori = DB::table('users')
        ->join('mohon_data','users.id','=','mohon_data.user_id')
        ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
        ->select('agensi_organisasi.name','mohon_data.date',DB::raw('count(*) as total'),DB::raw('users.name as username'))
        ->groupBy('users.name','agensi_organisasi.name','mohon_data.date')
        ->get();
        $agensi =  AgensiOrganisasi::get();

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
        return view('mygeo.laporan_data_asas', compact('permohonans','permohonan_kategori','permohonan_lulus','permohonan_statistik','permohonan_count','agensi'));
    }

    public function filter_by_agensi(Request $request){
      Carbon::setlocale(config('app.locale2'));

      $from = $request->start_date;
      $to = $request->end_date;

       $by_month2 = MohonData::whereBetween('created_at', [$from, $to])->get()
       ->groupBy(function($val) {
       return Carbon::parse($val->created_at)->translatedFormat('M'); });

       $by_month = DB::table('users')
       ->join('mohon_data','users.id','=','mohon_data.user_id')
       ->join('agensi_organisasi',DB::raw('CAST(users.agensi_organisasi AS INT)'),'=','agensi_organisasi.id')
       ->whereBetween('mohon_data.created_at', [$from, $to])
       ->where('users.agensi_organisasi',$request->agensi_id)->get()
       ->groupBy(function($val) {
        return Carbon::parse($val->date)->translatedFormat('M'); });

      if($from != '' && $to != ''){
          $agensi_mohon = DB::table('users')
          ->join('mohon_data','users.id','=','mohon_data.user_id')
          ->join('agensi_organisasi',DB::raw('CAST(users.agensi_organisasi AS INT)'),'=','agensi_organisasi.id')
          ->whereBetween('mohon_data.created_at', [$from, $to])
          ->where('users.agensi_organisasi',$request->agensi_id)->get();
        //   dd($agensi_mohon);
        // $agensi_mohon = MohonData::whereBetween('created_at', [$from, $to])->get();
      } else {
        $agensi_mohon = MohonData::get();
      }
       if ($agensi_mohon) {
        $counter = 0;
        $org = '';
        $append_data = [];
        foreach ($agensi_mohon as $mohon) {
            // if(isset($mohon->users)){
                // if($mohon->users->agensi_organisasi == $request->agensi_id ){
                    $counter++;
                    $org =
                    is_numeric($mohon->users->agensi_organisasi) && isset($mohon->users->agensiOrganisasi) ? $mohon->users->agensiOrganisasi->name : $mohon->users->agensi_organisasi;

                    $temp = '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$mohon->name.'</td>
                    <td>'.$mohon->users->name.'</td>
                    <td>'.$org.'</td>
                    <td>
                        <a href="lihat_laporan_data/'.$mohon->id.'"
                            class="btn btn-sm btn-primary">Perincian</a>
                    </td>
                </tr>';
                $append_data[] = $temp;
                // }
            // }
        }
        return ['data' => $append_data,
                'month' => $by_month,
                'counter' => $counter,
                'agensi' => $org];
       }

    }

    public function laporan_data_detail($id)
    {
        $permohonan =  MohonData::where('id',$id)->first();
        return view('mygeo.data_asas_detail', compact('permohonan'));
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
        $wordTest = new PhpWord();

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
                $counter++;
                $table->addRow();
                //add cell
                $table->addCell(900)->addText($counter);
                //add cell
                $title = $met->title;
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
    public function laporan_bil_metadata_terbit_ikut_agensi(){
        //initialize
        $wordTest = new PhpWord();

        //add section
        $newSection = $wordTest->addSection();

        //add text to section
        $newSection->addText("Bilangan Keseluruhan Metadata Diterbitkan Mengikut Agensi",array('name'=>'Tahoma','size'=>15,'color'=>'red'));

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
                if($met->disahkan == "yes"){
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
                    $title = $met->title;
                    $table->addCell(3500)->addText(htmlspecialchars($title));
                    //add cell
                    $agency = "";
                    if(isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) != ""){
                        $agency = $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString;
                    }
                    $table->addCell(2500)->addText(htmlspecialchars($agency));
                    //add cell
                    $publisher = "";
                    if(isset($xml2->contact->CI_ResponsibleParty->individualName->CharacterString) && trim($xml2->contact->CI_ResponsibleParty->individualName->CharacterString) != ""){
                        $publisher = $xml2->contact->CI_ResponsibleParty->individualName->CharacterString;
                    }
                    $table->addCell(2500)->addText(htmlspecialchars($publisher));
                    //add cell
                    $category = "";
                    if (isset($xml2->hierarchyLevel->MD_ScopeCode) && $xml2->hierarchyLevel->MD_ScopeCode != "") {
                        $category = trim($xml2->hierarchyLevel->MD_ScopeCode);
                    }
                    $table->addCell(1800)->addText(htmlspecialchars($category));
                    //add cell
                    $table->addCell(1750)->addText(date('d/m/Y',strtotime($met->changedate)));
                }
            }
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('Bilangan_Keseluruhan_Metadata_Diterbitkan_Mengikut_Agensi.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('Bilangan_Keseluruhan_Metadata_Diterbitkan_Mengikut_Agensi.docx'));
    }
    public function laporan_bil_mohon_lulus(){
        //initialize
        $wordTest = new PhpWord();

        //add section
        $newSection = $wordTest->addSection();

        //add text to section
        $newSection->addText("Bilangan Metadata Yang Belum Diterbitkan",array('name'=>'Tahoma','size'=>15,'color'=>'red'));

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
                if($met->disahkan == "no" || $met->disahkan == "0" || $met->is_draf == "yes"){
                    $ftestxml2 = <<<XML
                            $met->data
                            XML;
                    $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                    $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                    $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                    $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

                    $xml2 = simplexml_load_string($ftestxml2);

                    $counter++;
                    $table->addRow();
                    //add cell
                    $table->addCell(900)->addText($counter);
                    //add cell
                    $title = $met->title;
                    $table->addCell(5000)->addText(htmlspecialchars($title));
                    //add cell
                    $agency = "";
                    if(isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) != ""){
                        $agency = $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString;
                    }
                    $table->addCell(2500)->addText($agency);
                    //add cell
                    $category = "";
                    if (isset($xml2->hierarchyLevel->MD_ScopeCode) && $xml2->hierarchyLevel->MD_ScopeCode != "") {
                        $category = trim($xml2->hierarchyLevel->MD_ScopeCode);
                    }
                    $table->addCell(2500)->addText($category);
                    //add cell
                    $table->addCell(1750)->addText(date('d/m/Y',strtotime($met->changedate)));
                }
            }
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('Bilangan_Metadata_Yang_Belum_Diterbitkan.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('Bilangan_Metadata_Yang_Belum_Diterbitkan.docx'));
    }
    public function laporan_bil_mohon_ikut_kategori(){
        //initialize
        $wordTest = new PhpWord();

        //add section
        $newSection = $wordTest->addSection();

        //add text to section
        $newSection->addText("Bilangan Metadata Mengikut Kategori",array('name'=>'Tahoma','size'=>15,'color'=>'red'));

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

                $counter++;
                $table->addRow();
                //add cell
                $table->addCell(900)->addText($counter);
                //add cell
                $title = $met->title;
                $table->addCell(4000)->addText(htmlspecialchars($title));
                //add cell
                $agency = "";
                if(isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) != ""){
                    $agency = $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString;
                }
                $table->addCell(2500)->addText(htmlspecialchars($agency));
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
                $category = "";
                if (isset($xml2->hierarchyLevel->MD_ScopeCode) && $xml2->hierarchyLevel->MD_ScopeCode != "") {
                    $category = trim($xml2->hierarchyLevel->MD_ScopeCode);
                }
                $table->addCell(2500)->addText(htmlspecialchars($category));
            }
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('Bilangan_Metadata_Mengikut_Kategori.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('Bilangan_Metadata_Mengikut_Kategori.docx'));
    }
    public function laporan_stat_mohon_ikut_tahun(){
        //initialize
        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        //add section
        $newSection = $wordTest->addSection();

        //add text to section
        $newSection->addText("Statistik Penerbitan Metadata Mengikut Tahun/Bulan",array('name'=>'Tahoma','size'=>15,'color'=>'red'));

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
                if($met->disahkan == "yes"){
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
                    $title = $met->title;
                    $table->addCell(4000)->addText(htmlspecialchars($title));
                    //add cell
                    $agency = "";
                    if(isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) && trim($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) != ""){
                        $agency = $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString;
                    }
                    $table->addCell(5000)->addText(htmlspecialchars($agency));
                    //add cell
                    $table->addCell(2500)->addText("TBA");
                }
            }
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('Statistik_Penerbitan_Metadata_Mengikut_Tahun_Bulan.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('Statistik_Penerbitan_Metadata_Mengikut_Tahun_Bulan.docx'));
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

    public function mygeo_dashboard_metadata(Request $request) {
        //request range tarikh
        $tarikh_mula = $request->tarikh_mula;

        $tarikh_akhir = $request->tarikh_akhir;

        //BILANGAN KESELURUHAN METADATA
        if (strpos(auth::user()->assigned_roles, 'Pengesah Metadata') !== false) {
            /*
            $ambik_metadata = MetadataGeo::on('pgsql2')->get();
            libxml_use_internal_errors(true);
            foreach ($ambik_metadata as $met) {
                $ftestxml2 = <<<XML
                    $met->data
                    XML;
                $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
                $ftestxml2 = str_replace("\r", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

                $xml2 = simplexml_load_string($ftestxml2);
                if (false === $xml2) {
                    continue;
                }

                $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
                    $bilmetadata[$met->id] = [$xml2, $met];
                }
            }
            $bil_keseluruhan_metadata = count($bilmetadata);
            */
            $bil_keseluruhan_metadata = count(MetadataGeo::on('pgsql2')->select('id')->where('agensi_organisasi','ilike',strtolower(auth::user()->agensiOrganisasi->name))->get());
        } else {
            $bil_keseluruhan_metadata = count(MetadataGeo::on('pgsql2')->select('id')->get());
        }

        
        if (!empty($tarikh_mula)) {
            $bil_metadata_kategori = MetadataGeo::on('pgsql2')->where('createdate', '>=', $tarikh_mula);
        } elseif (!empty($tarikh_akhir)) {
            $bil_metadata_kategori = MetadataGeo::on('pgsql2')->where('createdate', '<=', $tarikh_akhir);
        } elseif (!empty($tarikh_mula) && !empty($tarikh_akhir)) {
            $bil_metadata_kategori = MetadataGeo::on('pgsql2')->where('createdate', '>=', $tarikh_mula)->where('createdate', '<=', $tarikh_akhir);
        } else {
            $bil_metadata_kategori = MetadataGeo::on('pgsql2');
        }
        
        if (strpos(auth::user()->assigned_roles, 'Pengesah Metadata') !== false) {
            $bil_metadata_kategori = $bil_metadata_kategori->where('agensi_organisasi','ilike',auth::user()->agensiOrganisasi->name);
        }
        
        $bil_metadata_kategori = $bil_metadata_kategori->orderBy('createdate', 'asc')->get();
        $bil_metadata_kategori_topik = $bil_metadata_kategori;
        $jumlah_metadata_mengikut_negeri = $bil_metadata_kategori;

        //Jumlah Metadata Mengikut Kategori
        $metadata_kategori = [];
        libxml_use_internal_errors(true);
        foreach ($bil_metadata_kategori as $met) {
            /*
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            if (strpos(auth::user()->assigned_roles, 'Pengesah Metadata') !== false) {
                $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
                    $bilmetadata[$met->id] = [$xml2];
                    $month = date('M-Y', strtotime($met->createdate));
                    $kategori = $met->kategori;

                    if ($kategori != null) {
                        $metadata_kategori[$month][ucfirst($kategori)][] = 'test';
                    }
//                }
            } else {
            */
                $month = date('M-Y', strtotime($met->createdate));
                $kategori = $met->kategori;

                if ($kategori != null) {
                    $metadata_kategori[$month][ucfirst($kategori)][] = 'test';
                }
            //}
        }
        // dd($metadata_kategori);
        $chartkategori = [];
        foreach ($metadata_kategori as $k => $v) {
            $dataset = $imagery = $gridded = $services = 0;
            if (isset($v['Dataset'])) {
                $dataset = count($v['Dataset']);
            }
            if (isset($v['Services'])) {
                $services = count($v['Services']);
            }
            if (isset($v['Imagery'])) {
                $imagery = count($v['Imagery']);
            }
            if (isset($v['Gridded'])) {
                $gridded = count($v['Gridded']);
            }
            $chartkategori[] = ["month" => $k, "first" => $dataset, "second" => $services, "third" => $imagery, "forth" => $gridded];
        }

        // dd($chartkategori);

        //Jumlah Metadata Mengikut Kategori Topik
        $metadata_kategori_topik = [];
        libxml_use_internal_errors(true);
        foreach ($bil_metadata_kategori_topik as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            if (auth::user()->assigned_roles == 'Pengesah Metadata') {
//                $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
//                if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
                    $bilmetadata[$met->id] = [$xml2];
                    if (isset($xml2->identificationInfo->MD_DataIdentification->topicCategory)) {
                        if (count($xml2->identificationInfo->MD_DataIdentification->topicCategory) > 0) {
                            foreach ($xml2->identificationInfo->MD_DataIdentification->topicCategory as $tcd) {
                                if (trim($tcd->MD_TopicCategoryCode) != "") {
                                    $tc = trim($tcd->MD_TopicCategoryCode);
                                    $metadata_kategori_topik['kategoritopik'][$tc][] = 'test';
                                }
                            }
                        }
                    } elseif (isset($xml2->identificationInfo->SV_ServiceIdentification->topicCategory)) {
                        if (count($xml2->identificationInfo->SV_ServiceIdentification->topicCategory) > 0) {
                            foreach ($xml2->identificationInfo->SV_ServiceIdentification->topicCategory as $tcd) {
                                if (trim($tcd->MD_TopicCategoryCode) != "") {
                                    $tc = trim($tcd->MD_TopicCategoryCode);
                                    $metadata_kategori_topik['kategoritopik'][$tc][] = 'test';
                                }
                            }
                        }
                    }
//                }
            } else {
                if (isset($xml2->identificationInfo->MD_DataIdentification->topicCategory)) {
                    if (count($xml2->identificationInfo->MD_DataIdentification->topicCategory) > 0) {
                        foreach ($xml2->identificationInfo->MD_DataIdentification->topicCategory as $tcd) {
                            if (trim($tcd->MD_TopicCategoryCode) != "") {
                                $tc = trim($tcd->MD_TopicCategoryCode);
                                $metadata_kategori_topik['kategoritopik'][$tc][] = 'test';
                            }
                        }
                    }
                } elseif (isset($xml2->identificationInfo->SV_ServiceIdentification->topicCategory)) {
                    if (count($xml2->identificationInfo->SV_ServiceIdentification->topicCategory) > 0) {
                        foreach ($xml2->identificationInfo->SV_ServiceIdentification->topicCategory as $tcd) {
                            if (trim($tcd->MD_TopicCategoryCode) != "") {
                                $tc = trim($tcd->MD_TopicCategoryCode);
                                $metadata_kategori_topik['kategoritopik'][$tc][] = 'test';
                            }
                        }
                    }
                }
            }
        }
        $chartkategoritopik = [];
        foreach ($metadata_kategori_topik['kategoritopik'] as $k => $v) {
            $chartkategoritopik[] = ["country" => $k, 'visits' => count($v)];
        }

        //Jumlah Metadata Mengikut Content Type
        if (!empty($tarikh_mula)) {
            $bil_metadata_content_type = MetadataGeo::on('pgsql2')->where('createdate', '>=', $tarikh_mula);
        } elseif (!empty($tarikh_akhir)) {
            $bil_metadata_content_type = MetadataGeo::on('pgsql2')->where('createdate', '<=', $tarikh_akhir);
        } elseif (!empty($tarikh_mula) && !empty($tarikh_akhir)) {
            $bil_metadata_content_type = MetadataGeo::on('pgsql2')->where('createdate', '>=', $tarikh_mula)->where('createdate', '<=', $tarikh_akhir);
        } else {
            $bil_metadata_content_type = MetadataGeo::on('pgsql2');
        }
        
        if (strpos(auth::user()->assigned_roles, 'Pengesah Metadata') !== false) {
            $bil_metadata_content_type = $bil_metadata_content_type->where('agensi_organisasi','ilike',auth::user()->agensiOrganisasi->name);
        }
        
        $bil_metadata_content_type = $bil_metadata_content_type->orderBy('createdate', 'asc')->get();
        
        $metadata_content_type = [];
        libxml_use_internal_errors(true);
        foreach ($bil_metadata_content_type as $met) {
            /*
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            if (auth::user()->assigned_roles == 'Pengesah Metadata') {
                $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
                    // $bilmetadata[$met->id] = [$xml2];
                    $content_type = (string)(isset($xml2->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString) ? $xml2->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString : "");
                    if (strtolower($content_type) != null) {
                        $metadata_content_type['content'][ucfirst($content_type)][] = 'test';
                    }
                }
            } else {
            */
                $content_type = $met->content_type;
                if ($content_type != null) {
                    $metadata_content_type['content'][ucfirst($content_type)][] = 'test';
                }
            //}
        }
        $chartcontenttype = [];
        foreach ($metadata_content_type['content'] as $k => $v) {
            $chartcontenttype[] = ["country" => $k, 'litres' => count($v)];
        }

        //Jumlah Metadata Mengikut Negeri
        $metadatas = [];
        libxml_use_internal_errors(true);
        foreach ($jumlah_metadata_mengikut_negeri as $met) {
            /*
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            if (auth::user()->assigned_roles == 'Pengesah Metadata') {
                $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
                    // $bilmetadata[$met->id] = [$xml2];
                    $negeri = (string)(isset($xml2->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) ? $xml2->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString : "");
                    if (strtolower($negeri) != null) {
                        if ($negeri == 'wpPutrajaya') {
                            $metadatas['negeri']['W.P. Putrajaya'][] = 'test';
                        } else {
                            $metadatas['negeri'][ucfirst($negeri)][] = 'test';
                        }
                    }
                }
            } else {
            */
                $negeri = $met->c10_state;
                if ($negeri != null) {
                    if ($negeri == 'wpPutrajaya') {
                        $metadatas['negeri']['W.P. Putrajaya'][] = 'test';
                    } else {
                        $metadatas['negeri'][ucfirst($negeri)][] = 'test';
                    }
                }
            //}
        }
        $chartnegeri = [];
        foreach ($metadatas['negeri'] as $k => $v) {
            $chartnegeri[] = ["country" => $k, 'litres' => count($v)];
        }

        return view('mygeo.dashboard_metadata', compact('bil_keseluruhan_metadata', 'chartkategori', 'chartnegeri', 'chartkategoritopik', 'chartcontenttype'));
    }

    public function laporan_metadata_filter()
    {
        $agensi = AgensiOrganisasi::get();

        $tarikh = date('Y-m-d');

        //pengesah
        $metadatasdb = MetadataGeo::on('pgsql2')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        libxml_use_internal_errors(true); //skips error page detected from simplexml_load_string in the foreach below
        foreach ($metadatasdb as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            $pengesah = (string)(isset($xml2->contact->CI_ResponsibleParty->individualName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->individualName->CharacterString : "");
            array_push($metadatas, $pengesah);
        }
        $senarai_pengesah = array_unique($metadatas);
        // dd($senarai_pengesah);

        return view('mygeo.laporan_metadata_filter', compact('agensi', 'tarikh', 'senarai_pengesah'));
    }

    public function laporan_metadata_search(Request $request)
    {
        if (auth::user()->assigned_roles != 'Pengesah Metadata') {
            $agensi = $request->agensi;
        }
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $kategori = $request->kategori;
        $status = $request->status;
        $tarikh_mula = $request->tarikh_mula;
        $tarikh_akhir = $request->tarikh_akhir;
        $pengesah = $request->pengesah;
        $penerbit = $request->penerbit;

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

        if ($request->jenis_laporan == 'bil_metadata_diterbitkan') {

            return view('mygeo.laporan_metadata_diterbitkan', compact('metadatas'));
        } else {

            return view('mygeo.laporan_metadata_belum_diterbitkan', compact('metadatas'));
        }
    }

    public function mygeo_dashboard_data_asas(Request $request)
    {

        //request range tarikh
        $tarikh_mula = $request->tarikh_mula;

        $tarikh_akhir = $request->tarikh_akhir;

        $bil_keseluruhan_data = MohonData::where('status', '!=', 'Draf')->count();

        $bil_keseluruhan_data_lulus = MohonData::where('status', '=', 'Dalam Proses')->orWhere('status', '=', 'Data Tersedia')->count();

        $bil_keseluruhan_data_tolak = MohonData::where('status', '=', 'Ditolak')->count();

        return view('mygeo.dashboard_data_asas', compact('bil_keseluruhan_data', 'bil_keseluruhan_data_lulus', 'bil_keseluruhan_data_tolak'));
    }

    public function laporan_data_asas_filter()
    {
        $agensi = AgensiOrganisasi::get();

        $tarikh = date('Y-m-d');

        return view('mygeo.laporan_data_asas_filter', compact('agensi', 'tarikh'));
    }

    public function laporan_data_asas_searcb(Request $request)
    {
        $agensi = $request->agensi;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $kategori = $request->kategori;
        $pemproses = $request->pemproses;

        $permohonans = DB::table('users')
            ->join('mohon_data', 'users.id', '=', 'mohon_data.user_id')
            ->join('agensi_organisasi', DB::raw('CAST(users.agensi_organisasi AS INT)'), '=', 'agensi_organisasi.id')
            ->select(
                DB::raw('agensi_organisasi.name as agensi'),
                DB::raw('count(*) as total')
            )
            ->groupBy('agensi')
            ->get();


        if ($request->jenis_laporan == 'laporan_perlepasan_data') {

            return view('mygeo.laporan_data_asas_laporan_perlepasan_data', compact('permohonans'));
        } elseif ($request->jenis_laporan == 'laporan_perkongsian_data') {

            return view('mygeo.laporan_data_asas_laporan_perkongsian_data', compact('permohonans'));
        } elseif ($request->jenis_laporan == 'anggaran_jimat_kos') {

            return view('mygeo.laporan_data_asas_anggaran_jimat_kos', compact('permohonans'));
        } elseif ($request->jenis_laporan == 'anggaran_jimat_kos_kategori') {

            return view('mygeo.laporan_data_asas_anggaran_jimat_kos_kategori', compact('permohonans'));
        } elseif ($request->jenis_laporan == 'pelepasan_data_tema') {

            return view('mygeo.laporan_data_asas_pelepasan_data_tema', compact('permohonans'));
        } elseif ($request->jenis_laporan == 'pelepasan_data_kategori_pemohon_data') {

            return view('mygeo.laporan_data_asas_pelepasan_data_kategori_pemohon_data', compact('permohonans'));
        } else {

            return view('mygeo.laporan_data_asas_belum_pegawai_proses_permohonan', compact('permohonans'));
        }
    }
}
