<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Auth;
//use Mail;
use DateTime;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Metadata;
use App\MCategory;
use App\MConstraints;
use App\MDataQuality;
use App\MDataSetIdentification;
use App\MDistributionInformation;
use App\MIdentificationInformation;
use App\MReferenceSystemInformation;
use App\MSpatialDomain;
use App\MTopicCategory;
use App\User;
use App\Countries;
use App\States;
use App\ReferenceSystemIdentifier;
use App\MFileUpload;
use App\ElemenMetadata;
use App\Tajuk;
use Session;
use App\MetadataGeo;
use App\PortalTetapan;
use App\Mail\MailtrapExample;
use App;
use App\Http\Controllers\XmlController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\AuditTrail;
use App\Pengumuman;
use PDF;

class MetadataController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {

    }

    public function index() {
        //call geonetwork api to retrieve metadata by uuid. missing other datas. currently not in use
        //$response = Http::withBasicAuth('admin', 'admin')->get('http://localhost:8080/geonetwork/srv/api/records/e4e26aba-8add-4168-ac10-1dc22d0bbf6f/formatters/xml?addSchemaLocation=true&increasePopularity=true&approved=true');
        //dd(
        //$response,$response->body(),$response->json(),$response->status(),$response->ok(),$response->successful(),$response->failed(),$response->serverError(),$response->clientError(),$response->headers()
        //);

        if(auth::user()->hasRole(['Penerbit Metadata'])){
            //see own metadatas
            $metadatasdb = MetadataGeo::on('pgsql2')->where('portal_user_id','=',auth::user()->id)->orderBy('id', 'DESC')->get()->all();
        }elseif(auth::user()->hasRole(['Pengesah Metadata'])){
            //see all metadatas with same agensi_organisasi and bahagian
            $metadatasdb = MetadataGeo::on('pgsql2')->where('data', 'ilike', '%' . auth::user()->agensiOrganisasi->name . '%')->where('data', 'ilike', '%' . auth::user()->bahagian . '%')->orderBy('id', 'DESC')->get()->all();
        }elseif(auth::user()->hasRole(['Pentadbir Aplikasi','Pentadbir Metadata','Super Admin'])){
            //see all metadatas regardless
            $metadatasdb = MetadataGeo::on('pgsql2')->orderBy('id', 'DESC')->get()->all();
        }

        $metadatas = [];
        foreach ($metadatasdb as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $penerbit = $this->getUser($met->portal_user_id);

            $xml2 = simplexml_load_string($ftestxml2);
            $metadatas[$met->id] = [$xml2, $met, $penerbit];
        }

        return view('mygeo.metadata.senarai_metadata', compact('metadatas'));
    }

    function getUser($user_id){
        return User::where('id',$user_id)->get()->first();
    }

    public function index_nologin(Request $request) {
        $metadatas = $metadatasdb = [];
        $carian = isset($request->carian) ? $request->carian:"";
        $query = MetadataGeo::on('pgsql2');
        
        $params = [];
        
        if(isset($carian) && trim($carian) != ""){            
            $query = $query->where('data', 'ilike', '%' . $carian . '%');
        }

        if(isset($request->content_type)){
            $params['content_type'] = $request->content_type;
            $query = $query->where('data', 'ilike', '%' . $request->content_type . '%');
        }
        if(isset($request->topic_category)){
            $params['topic_category'] = [];
            foreach($request->topic_category as $tc){
                $query = $query->orWhere('data', 'ilike', '%' . $tc . '%');
                $params['topic_category'][] = $tc;
            }
        }
        if(isset($request->tarikh_mula)){
            $params['tarikh_mula'] = $request->tarikh_mula;
            $query = $query->where('createdate', '>=', date('Y-m-d',strtotime($request->tarikh_mula)));
        }
        if(isset($request->tarikh_tamat)){
            $params['tarikh_tamat'] = $request->tarikh_tamat;
            $query = $query->where('createdate', '<=', date('Y-m-d',strtotime($request->tarikh_tamat)));
        }
            
        $metadatasdb = $query->where('disahkan', 'yes')->orderBy('id', 'DESC')->paginate(12);
        
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
            $metadatas[$met->id] = $xml2;
          }
         */
        $portal = PortalTetapan::get()->first();

        return view('senarai_metadata_nologin', compact('metadatas','metadatasdb','carian','params','portal'));
    }

    public function findMetadataByName(Request $request){
        $metadatasdb = MetadataGeo::on('pgsql2')->where('data', 'ilike', '%' . $request->carian . '%')->where('disahkan','yes')->orderBy('id', 'DESC')->get()->all();
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
            if(isset($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && trim($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) != "" && stripos(trim($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString),strval($request->carian)) !== false){
                $metadatas[$met->id] = $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
            }
        }
        echo json_encode($metadatas);exit();
    }

    public function senarai_pengesahan_metadata() {
        if (isset($_GET['var']) && $_GET['var'] == 'add_dummy_metadata') {
            $this->store_todel();
        }

        if (!auth::user()->hasRole(['Pentadbir Metadata','Pengesah Metadata', 'Super Admin'])) {
            exit();
        }

        // auth::user()->agensi_organisasi, auth::user()->agensi_organisasi
        $metadatasdb = MetadataGeo::on('pgsql2')->where('disahkan', '0')->where('is_draf','no')->orderBy('id', 'DESC')->get()->all();
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

            $penerbit = $this->getUser($met->portal_user_id);

            $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
            if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
                $metadatas[$met->id] = [$xml2,$met];
                $metadatas[$met->id] = [$xml2, $met, $penerbit];
            }
        }
        return view('mygeo.metadata.senarai_pengesahan_metadata', compact('metadatas'));
    }

    public function search(Request $request) {
        $metadatasdb = MetadataGeo::on('pgsql2')->where('data', 'ilike', '%' . $request->carian . '%')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        foreach ($metadatasdb as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $metadatas[$met->id] = [$xml2, $met, 'not_draft'];
        }

        return view('mygeo.metadata.senarai_metadata', compact('metadatas'));
    }

    public function search_nologin(Request $request) {
        $query = MetadataGeo::on('pgsql2');
        if(isset($request->carian)){
            $query = $query->where('data', 'ilike', '%' . $request->carian . '%');
        }
        if(isset($request->content_type)){
            $query = $query->where('data', 'ilike', '%' . $request->content_type . '%');
        }
        if(isset($request->topic_category)){
            foreach($request->topic_category as $tc){
                $query = $query->where('data', 'ilike', '%' . $tc . '%');
            }
        }
        if(isset($request->tarikh_mula)){
            $query = $query->where('createdate', '>=', date('Y-m-d',strtotime($request->tarikh_mula)));
        }
        if(isset($request->tarikh_tamat)){
            $query = $query->where('createdate', '<=', date('Y-m-d',strtotime($request->tarikh_tamat)));
        }
//        $metadatasdb = $query->where('disahkan', 'yes')->orderBy('id', 'DESC')->get()->all();
        $metadatasdb = $query->where('disahkan', 'yes')->orderBy('id', 'DESC')->paginate(12);


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
            $metadatas[$met->id] = $xml2;
        }

        $portal = PortalTetapan::get()->first();
        return view('senarai_metadata_nologin', compact('metadatas','metadatasdb','portal'));
    }

    public function create() {
        if (!auth::user()->hasRole(['Penerbit Metadata', 'Super Admin'])) {
            exit();
        }

        if (isset($_GET['bhs']) && $_GET['bhs'] == 'bm') {
            App::setLocale('bm');
        } elseif (isset($_GET['bhs']) && $_GET['bhs'] == 'en') {
            App::setLocale('en');
        }

        $categories = MCategory::all();
//        $pengesahs = User::whereHas("roles", function ($q) {
//                    $q->where("name", "Pengesah Metadata");
//                })->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        $pengesahs = User::where('assigned_roles','LIKE','%Pengesah Metadata%')->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        if(empty($pengesahs)){
            $pengesahs = User::where(['id'=>'9'])->get()->first(); //make Pentadbir Metadata the pengesah if no pengesahs with same agency or organisation is found
        }
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();
        $refSys = ReferenceSystemIdentifier::all();

        return view('mygeo.metadata.pengisian_metadata', compact('categories', 'states', 'countries', 'refSys', 'pengesahs'));
    }

    public function show(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadataxml = simplexml_load_string($ftestxml2);

        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != ""){
            App::setLocale(trim($metadataxml->language->CharacterString));
        }

        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countryId = "";
        if(isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != ""){
            $countryId = trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString);
        }
        if($countryId != ""){
            $countries = Countries::where(['name' => $countryId])->get()->first();
        }else{
            $countries = Countries::where(['id' => 1])->get()->first();
        }

        if(isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString != ""){
            $refSysId = trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString);
            if(is_numeric($refSysId)){
                $refSys = ReferenceSystemIdentifier::where('id',$refSysId)->get()->first();
            }else{
                $refSys = ReferenceSystemIdentifier::where('name',$refSysId)->get()->first();
            }
        }else{
            $refSys = [];
        }

        return view('mygeo.metadata.lihat_metadata', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'));
    }

    public function edit($id) {
        if (!auth::user()->hasRole(['Pengesah Metadata','Penerbit Metadata', 'Super Admin'])) {
            exit();
        }

        $metadataSearched = MetadataGeo::on('pgsql2')->where('id',$id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadataxml = simplexml_load_string($ftestxml2);

        if (isset($_GET['bhs']) && $_GET['bhs'] == 'bm'){
            App::setLocale('bm');
        }elseif(isset($_GET['bhs']) && $_GET['bhs'] == 'en'){
            App::setLocale('en');
        }else{
            if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != ""){
                App::setLocale(trim($metadataxml->language->CharacterString));
            }
        }

//        $pengesahs = User::whereHas("roles", function ($q) {
//                    $q->where("name", "Pengesah Metadata");
//                })->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        $pengesahs = User::where('assigned_roles','LIKE','%Pengesah Metadata%')->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();
        $countryId = "";
        if(isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != ""){
            $countryId = trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if($countryId != ""){
            if(is_numeric($countryId)){
                $countrySelected = Countries::where(['id' => $countryId])->get()->first();
            }else{
                $countrySelected = Countries::where('name','LIKE','%'.$countryId.'asdsadss%')->get()->first();
                if(!$countrySelected){
                    $countrySelected = Countries::where(['id' => 1])->get()->first();
                }
            }
        }else{
            $countrySelected = Countries::where(['id' => 1])->get()->first();
        }

        $refSys = ReferenceSystemIdentifier::all();
        if(isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString != ""){
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            $refSysSelected = ReferenceSystemIdentifier::where('id',$refSysId)->get()->first();
        }else{
            $refSysSelected = [];
        }

        return view('mygeo.metadata.kemaskini_metadata', compact('categories', 'contacts', 'countries', 'countrySelected', 'states', 'refSys', 'refSysSelected','metadataxml', 'metadataSearched', 'pengesahs'));
    }

    public function show_nologin(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadataxml = simplexml_load_string($ftestxml2);

        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != ""){
            App::setLocale(trim($metadataxml->language->CharacterString));
        }

        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countryId = "";
        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != ""){
            $countryId = trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if($countryId != ""){
            $countries = Countries::where(['id' => $countryId])->get()->first();
        }else{
            $countries = Countries::where(['id' => 1])->get()->first();
        }

        if(isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) != ""){
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            $refSys = ReferenceSystemIdentifier::where('id',$refSysId)->get()->first();
        }else{
            $refSys = [];
        }

        $portal = PortalTetapan::get()->first();
        return view('lihat_metadata_nologin', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched','portal'));
    }

    public function downloadMetadataPdf($id) {
        ini_set('max_execution_time', '1000');
        set_time_limit(1000);
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadataxml = simplexml_load_string($ftestxml2);

        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != ""){
            App::setLocale(trim($metadataxml->language->CharacterString));
        }

        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countryId = "";
        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != ""){
            $countryId = trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if($countryId != ""){
            $countries = Countries::where(['id' => $countryId])->get()->first();
        }else{
            $countries = Countries::where(['id' => 1])->get()->first();
        }

        if(isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) != ""){
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            $refSys = ReferenceSystemIdentifier::where('id',$refSysId)->get()->first();
        }else{
            $refSys = [];
        }

        $html = view('pdfs.pdf1', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'))->render();
        $pdf = \App::make('dompdf.wrapper')->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->loadHTML($html);
        return $pdf->stream();
        
//        $pdf = PDF::loadView('pdfs.pdf1', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'))->setOptions(['defaultFont' => 'sans-serif']);
        
//        return $pdf->download('disney.pdf');
    }

    public function show_xml_nologin(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;

        return response($ftestxml2)->withHeaders(['Content-Type' => 'text/xml']);
    }

    public function downloadMetadataXml($id) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $id)->get()->first();
        $ftestxml2 = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'.PHP_EOL.<<<XML
                $metadataSearched->data
                XML;

        $response = response($ftestxml2);
        $response->header('Content-Type', 'text/xml');
        $response->header('Cache-Control', 'public');
        $response->header('Content-Description', 'File Transfer');
        $response->header('Content-Disposition', 'attachment; filename=ftestxml.xml');
        $response->header('Content-Transfer-Encoding', 'binary');
        return $response;
    }

    public function messages() {
        return [
            'c2_metadataName.required' => 'ftest1test1',
            'c2_metadataName.required' => 'ftest2test2',
        ];
    }

    public function validateMetadataName(Request $request){
        $lowered = strtolower($request->metadataName);
        $lowered = $request->metadataName;
        $metadatas = MetadataGeo::on('pgsql2')->where('data','LIKE','%>'.$lowered.'<%')->get()->first();
        if(empty($metadatas)){
            return "not found";
        }else{
            return "found";
        }
        exit();
    }

    public function store(Request $request) {
        $fields = [
            "c1_content_info" => 'required',
            "publisher_name" => 'required',
            "publisher_agensi_organisasi" => 'required',
            "publisher_email" => 'required',
            "publisher_phone" => 'required',
            "c2_metadataName" => 'required',
            "c2_product_type" => 'required',
            "c2_abstract" => 'required',
            "c2_contact_agensiorganisasi" => 'required',
            "c2_contact_state" => 'required',
            "c2_contact_email" => 'required',
            "c2_contact_phone_office" => 'required',
            "c9_west_bound_longitude" => 'required',
            "c9_east_bound_longitude" => 'required',
            "c9_south_bound_latitude" => 'required',
            "c9_north_bound_latitude" => 'required',
            "c10_keyword" => 'required',
        ];

        if(strtolower($request->kategori) == 'dataset' && strtolower($request->c1_content_info) == 'application'){
            $fields["c10_file_url"]= 'required';
        }
        if(trim($request->c10_file_url) != ''){
            $fields["c10_file_name"]= 'required';
            $fields["c10_file_type"]= 'required';
        }
        if(trim($request->c10_file_name) != ''){
            $fields["c10_file_url"]= 'required';
            $fields["c10_file_type"]= 'required';
        }
        if(trim($request->c10_file_type) != ''){
            $fields["c10_file_url"]= 'required';
            $fields["c10_file_name"]= 'required';
        }
        if(strtolower($request->kategori) == 'services'){
            $fields["c2_serviceUrl"]= 'required';
        }
        if(strtolower($request->kategori) == 'dataset'){
            $fields["topic_category"]= 'required';
        }
        if(strtolower($request->kategori) == 'imagery' || strtolower($request->kategori) == 'gridded'){
            $fields["c4_scan_res"]= 'required';
            $fields["c4_ground_scan"]= 'required';
            $fields["c6_collection_name"]= 'required';
            $fields["c6_collection_id"]= 'required';
            $fields["c8_identifier"]= 'required';
            $fields["c8_type"]= 'required';
            $fields["c8_op_identifier"]= 'required';
        }
        /*
        if($request->c2_product_type == "Application"){
            $fields["abstractApplication_namaAplikasi"]= 'required';
            $fields["abstractApplication_tujuan"]= 'required';
            $fields["abstractApplication_tahunPembangunan"]= 'required';
            $fields["abstractApplication_kemaskini"]= 'required';
            $fields["abstractApplication_dataTerlibat"]= 'required';
            $fields["abstractApplication_sasaranPengguna"]= 'required';
            $fields["abstractApplication_versi"]= 'required';
            $fields["abstractApplication_perisianDigunaPembangunan"]= 'required';
        }elseif($request->c2_product_type == "Document"){
            $fields["abstractDocument_namaDokumen"]= 'required';
            $fields["abstractDocument_tujuan"]= 'required';
            $fields["abstractDocument_tahunTerbitan"]= 'required';
            $fields["abstractDocument_edisi"]= 'required';
        }elseif($request->c2_product_type == "GIS Activity/Project"){
            $fields["abstractGISActivityProject_namaAktiviti"]= 'required';
            $fields["abstractGISActivityProject_tujuan"]= 'required';
            $fields["abstractGISActivityProject_lokasi"]= 'required';
            $fields["abstractGISActivityProject_tahun"]= 'required';
        }elseif($request->c2_product_type == "Map"){
            $fields["abstractMap_namaPeta"]= 'required';
            $fields["abstractMap_kawasan"]= 'required';
            $fields["abstractMap_tujuan"]= 'required';
            $fields["abstractMap_tahunTerbitan"]= 'required';
            $fields["abstractMap_edisi"]= 'required';
            $fields["abstractMap_noSiri"]= 'required';
            $fields["abstractMap_skala"]= 'required';
            $fields["abstractMap_unit"]= 'required';
        }elseif($request->c2_product_type == "Raster Data"){
            $fields["abstractRasterData_namaData"]= 'required';
            $fields["abstractRasterData_lokasi"]= 'required';
            $fields["abstractRasterData_rumusanData"]= 'required';
            $fields["abstractRasterData_tujuanData"]= 'required';
            $fields["abstractRasterData_kaedahPenyediaanData"]= 'required';
            $fields["abstractRasterData_format"]= 'required';
            $fields["abstractRasterData_unit"]= 'required';
            $fields["abstractRasterData_skala"]= 'required';
            $fields["abstractRasterData_statusData"]= 'required';
            $fields["abstractRasterData_tahunPerolehan"]= 'required';
            $fields["abstractRasterData_jenisSatelit"]= 'required';
            $fields["abstractRasterData_format"]= 'required';
            $fields["abstractRasterData_resolusi"]= 'required';
            $fields["abstractRasterData_kawasanLitupan"]= 'required';
        }elseif($request->c2_product_type == "Services"){
            $fields["abstractServices_namaServis"]= 'required';
            $fields["abstractServices_lokasi"]= 'required';
            $fields["abstractServices_tujuan"]= 'required';
            $fields["abstractServices_dataTerlibat"]= 'required';
            $fields["abstractServices_polisi"]= 'required';
            $fields["abstractServices_peringkatCapaian"]= 'required';
            $fields["abstractServices_format"]= 'required';
        }elseif($request->c2_product_type == "Software"){
            $fields["abstractSoftware_namaPerisian"]= 'required';
            $fields["abstractSoftware_versi"]= 'required';
            $fields["abstractSoftware_tujuan"]= 'required';
            $fields["abstractSoftware_tahunPengunaanPerisian"]= 'required';
            $fields["abstractSoftware_kaedahPerolehan"]= 'required';
            $fields["abstractSoftware_format"]= 'required';
            $fields["abstractSoftware_pengeluar"]= 'required';
            $fields["abstractSoftware_keupayaan"]= 'required';
            $fields["abstractSoftware_dataTerlibat"]= 'required';
            $fields["abstractSoftware_keperluanPerkakas"]= 'required';
        }elseif($request->c2_product_type == "Vector Data"){
            $fields["abstractVectorData_namaData"]= 'required';
            $fields["abstractVectorData_lokasi"]= 'required';
            $fields["abstractVectorData_rumusanData"]= 'required';
            $fields["abstractVectorData_tujuanData"]= 'required';
            $fields["abstractVectorData_kaedahPenyediaanData"]= 'required';
            $fields["abstractVectorData_format"]= 'required';
            $fields["abstractVectorData_unit"]= 'required';
            $fields["abstractVectorData_skala"]= 'required';
            $fields["abstractVectorData_statusData"]= 'required';
        }
        */

        $customMsg = [
            "c1_content_info.required" => 'Content Information required',
            "publisher_name.required" => 'Publisher Name required',
            "publisher_agensi_organisasi.required" => 'Publisher Agency or Organisation required',
            "publisher_email.required" => 'Publisher Email required',
            "publisher_phone.required" => 'Publisher Phone required',
            "c2_metadataName.required" => 'Metadata Name required',
            "c2_product_type.required" => 'Type of Product required',
            "c2_abstract.required" => 'Metadata Abstract required',
            "c2_contact_agensiorganisasi.required" => 'Responsible Party Agency or Organisation required',
            "c2_contact_state.required" => 'State required',
            "c2_contact_email.required" => 'Responsible Party Email required',
            "c2_contact_phone_office.required" => 'Responsible Party Phone Number required',
            "c4_scan_res.required" => 'Scanning Resolution required',
            "c4_ground_scan.required" => 'Ground Scanning required',
            "c6_collection_name.required" => 'Collection Name required',
            "c6_collection_id.required" => 'Collection Identification required',
            "c8_identifier.required" => 'Event Identifier required',
            "c8_type.required" => 'Instrument Identification Type required',
            "c8_op_identifier.required" => 'Operation Identifier required',
            "c9_west_bound_longitude.required" => 'West Bound Longitude required',
            "c9_east_bound_longitude.required" => 'East Bound Longitude required',
            "c9_south_bound_latitude.required" => 'South Bound Latitude required',
            "c9_north_bound_latitude.required" => 'North Bound Latitude required',
            "c10_keyword.required" => 'Browsing Information Keyword required',
            "topic_category.required" => 'Topic Category required',
            /*
            "abstractApplication_namaAplikasi.required" => 'Abstract required',
            "abstractApplication_tujuan.required" => 'Abstract required',
            "abstractApplication_tahunPembangunan.required" => 'Abstract required',
            "abstractApplication_kemaskini.required" => 'Abstract required',
            "abstractApplication_dataTerlibat.required" => 'Abstract required',
            "abstractApplication_sasaranPengguna.required" => 'Abstract required',
            "abstractApplication_versi.required" => 'Abstract required',
            "abstractApplication_perisianDigunaPembangunan.required" => 'Abstract required',
            "abstractDocument_namaDokumen.required" => 'Abstract required',
            "abstractDocument_tujuan.required" => 'Abstract required',
            "abstractDocument_tahunTerbitan.required" => 'Abstract required',
            "abstractDocument_edisi.required" => 'Abstract required',
            "abstractGISActivityProject_namaAktiviti.required" => 'Abstract required',
            "abstractGISActivityProject_tujuan.required" => 'Abstract required',
            "abstractGISActivityProject_lokasi.required" => 'Abstract required',
            "abstractGISActivityProject_tahun.required" => 'Abstract required',
            "abstractMap_namaPeta.required" => 'Abstract required',
            "abstractMap_kawasan.required" => 'Abstract required',
            "abstractMap_tujuan.required" => 'Abstract required',
            "abstractMap_tahunTerbitan.required" => 'Abstract required',
            "abstractMap_edisi.required" => 'Abstract required',
            "abstractMap_noSiri.required" => 'Abstract required',
            "abstractMap_skala.required" => 'Abstract required',
            "abstractMap_unit.required" => 'Abstract required',
            "abstractRasterData_namaData.required" => 'Abstract required',
            "abstractRasterData_lokasi.required" => 'Abstract required',
            "abstractRasterData_rumusanData.required" => 'Abstract required',
            "abstractRasterData_tujuanData.required" => 'Abstract required',
            "abstractRasterData_kaedahPenyediaanData.required" => 'Abstract required',
            "abstractRasterData_format.required" => 'Abstract required',
            "abstractRasterData_unit.required" => 'Abstract required',
            "abstractRasterData_skala.required" => 'Abstract required',
            "abstractRasterData_statusData.required" => 'Abstract required',
            "abstractRasterData_tahunPerolehan.required" => 'Abstract required',
            "abstractRasterData_jenisSatelit.required" => 'Abstract required',
            "abstractRasterData_format.required" => 'Abstract required',
            "abstractRasterData_resolusi.required" => 'Abstract required',
            "abstractRasterData_kawasanLitupan.required" => 'Abstract required',
            "abstractServices_namaServis.required" => 'Abstract required',
            "abstractServices_lokasi.required" => 'Abstract required',
            "abstractServices_tujuan.required" => 'Abstract required',
            "abstractServices_dataTerlibat.required" => 'Abstract required',
            "abstractServices_polisi.required" => 'Abstract required',
            "abstractServices_peringkatCapaian.required" => 'Abstract required',
            "abstractServices_format.required" => 'Abstract required',
            "abstractSoftware_namaPerisian.required" => 'Abstract required',
            "abstractSoftware_versi.required" => 'Abstract required',
            "abstractSoftware_tujuan.required" => 'Abstract required',
            "abstractSoftware_tahunPengunaanPerisian.required" => 'Abstract required',
            "abstractSoftware_kaedahPerolehan.required" => 'Abstract required',
            "abstractSoftware_format.required" => 'Abstract required',
            "abstractSoftware_pengeluar.required" => 'Abstract required',
            "abstractSoftware_keupayaan.required" => 'Abstract required',
            "abstractSoftware_dataTerlibat.required" => 'Abstract required',
            "abstractSoftware_keperluanPerkakas.required" => 'Abstract required',
            "abstractVectorData_namaData.required" => 'Abstract required',
            "abstractVectorData_lokasi.required" => 'Abstract required',
            "abstractVectorData_rumusanData.required" => 'Abstract required',
            "abstractVectorData_tujuanData.required" => 'Abstract required',
            "abstractVectorData_kaedahPenyediaanData.required" => 'Abstract required',
            "abstractVectorData_format.required" => 'Abstract required',
            "abstractVectorData_unit.required" => 'Abstract required',
            "abstractVectorData_skala.required" => 'Abstract required',
            "abstractVectorData_statusData.required" => 'Abstract required',
            */
            "c10_file_url.required" => 'URL required',
            "c10_file_name.required" => 'File Name required',
            "c10_file_type.required" => 'File Type required',
            "c2_serviceUrl.required" => 'Service URL required',
        ];
        $this->validate($request, $fields, $customMsg);

        $keywords = "";
        if(count($request->c10_additional_keyword) > 0){
            foreach($request->c10_additional_keyword as $var){
                $keywords .= '
                    <keyword>
                        <gco:CharacterString>'.$var.'</gco:CharacterString>
                    </keyword>
                ';
            }
        }else{
            $keywords .= '
                <keyword>
                    <gco:CharacterString></gco:CharacterString>
                </keyword>
            ';
        }
        $topicCategories = "";
        if(isset($request->topic_category) && count($request->topic_category) > 0){
            foreach($request->topic_category as $var){
                $topicCategories .= '
                    <topicCategory>
                        <MD_TopicCategoryCode>'.$var.'</MD_TopicCategoryCode>
                    </topicCategory>
                ';
            }
        }else{
            $topicCategories .= '
                <topicCategory>
                    <MD_TopicCategoryCode></MD_TopicCategoryCode>
                </topicCategory>
            ';
        }
//        $fileUrl = "";
        $fileUrl = $request->c11_order_instructions;
//        if(isset($_FILES['c11_order_instructions']) && (file_exists($_FILES['c11_order_instructions']['tmp_name']))){
//            $this->validate($request,['c11_order_instructions' => 'required|mimes:pdf,doc,docx,xls,xlsx']);
//            $exists = Storage::exists($request->c11_order_instructions->getClientOriginalName());
//            $time = date('Y-m-d'.'_'.'H_i_s');
//            $fileName = $time.'_'.$request->c11_order_instructions->getClientOriginalName();
//            $fileUrl = Storage::putFileAs('/public/', $request->file('c11_order_instructions'), $fileName);
//        }
        $xmlcon = new XmlController;
        $xml = $xmlcon->createXml($request,$fileUrl,$keywords,$topicCategories);

        $msg = "";

        DB::connection('pgsql2')->transaction(function () use ($request,$xml,&$msg) {
            $maxid = MetadataGeo::on('pgsql2')->max('id');

            // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
            $data = $data ?? random_bytes(16);
            assert(strlen($data) == 16);

            // Set version to 0100
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            // Set bits 6-7 to 10
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

            // Output the 36 character UUID.
            $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

            $mg = new MetadataGeo;
            $mg->timestamps = false;
            $mg->id = $maxid + 1;
            $mg->data = $xml;
            $mg->changedate = date("Y-m-d H:i:s");
            $mg->createdate = date("Y-m-d H:i:s");
            $mg->popularity = 0;
            $mg->rating = 0;
            $mg->schemaid = "iso19139";
            $mg->istemplate = "n";
            $mg->isharvested = "n";
            $mg->owner = 1;
            $mg->source = "e1be8c47-7b4b-4fb9-862a-16a349e5f586";
            $mg->uuid = $uuid;
            $mg->disahkan = "0";
            $mg->portal_user_id = auth::user()->id;

            $msg = "";
            if(isset($request->btn_save) || (isset($request->submitAction) && $request->submitAction == "save")){
                $mg->is_draf = "no";

                if($request->c2_contact_email != ""){
                    //send email to pengesah metadata
                    $user = User::where('email',$request->c2_contact_email)->get()->first();
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title'=>$request->c2_metadataName);
                    Mail::send('mails.exmpl10', $data, function($message) use ($to_name, $to_email, $request) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pengesahan Metadata: ' . $request->c2_metadataName);
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });
                }

                $msg = "Metadata berjaya dihantar.";
            }elseif (isset($request->btn_draf) || (isset($request->submitAction) && $request->submitAction == "draf")){
                $mg->is_draf = "yes";
                $msg = "Metadata disimpan sebagai draf.";
            }
            $mg->save();
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_senarai_metadata')->with('message',$msg);
    }

    public function store_xml(Request $request) {
        if (file_exists($_FILES['file_xml']['tmp_name'])) {
            //store uploaded xml
            $fileName = time() . '_' . $request->file_xml->getClientOriginalName();
            Storage::putFileAs('public', $request->file('file_xml'), $fileName); //don't forget to set permissions at the public folder
            //read stored xml
            $uploaded_xml = Storage::disk('public')->get($fileName);
            $uploaded_xml = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $uploaded_xml);
            $xmlObject = simplexml_load_string($uploaded_xml);
            $json = json_encode($xmlObject);
            $xml_array = json_decode($json, true);

            //save in geonetwork
            DB::connection('pgsql2')->transaction(function () use ($request, $uploaded_xml) {
                $maxid = MetadataGeo::on('pgsql2')->max('id');

                // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
                $data = $data ?? random_bytes(16);
                assert(strlen($data) == 16);

                // Set version to 0100
                $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
                // Set bits 6-7 to 10
                $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

                // Output the 36 character UUID.
                $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

                $mg = new MetadataGeo;
                $mg->timestamps = false;
                $mg->id = $maxid + 1;
                $mg->data = $uploaded_xml;
                $mg->changedate = date("Y-m-d");
                $mg->createdate = date("Y-m-d");
                $mg->popularity = 0;
                $mg->rating = 0;
                $mg->schemaid = "iso19139";
                $mg->istemplate = "n";
                $mg->isharvested = "n";
                $mg->owner = 1;
                $mg->source = "e1be8c47-7b4b-4fb9-862a-16a349e5f586";
                $mg->uuid = $uuid;
                $mg->disahkan = "0";
                $mg->portal_user_id = Auth::user()->id;
                $mg->save();
            });

            //delete uploaded xml
            Storage::disk('public')->delete($fileName);
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
    }

    public function store_todel() {
        for ($r = 0; $r < 20; $r++) {
            DB::connection('pgsql2')->transaction(function () use (&$r) {

//                $xmlcon = new XmlController;
//                $xml = $xmlcon->createXml($request);
//                dd($xml);

                $maxid = MetadataGeo::on('pgsql2')->max('id');

                // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
                $data = $data ?? random_bytes(16);
                assert(strlen($data) == 16);

                // Set version to 0100
                $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
                // Set bits 6-7 to 10
                $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

                // Output the 36 character UUID.
                $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

                $mg = new MetadataGeo;
                $mg->timestamps = false;
                $mg->id = $maxid + 1;
                $mg->data = $xml;
                $mg->changedate = date("Y-m-d");
                $mg->createdate = date("Y-m-d");
                $mg->popularity = 0;
                $mg->rating = 0;
                $mg->schemaid = "iso19139";
                $mg->istemplate = "n";
                $mg->isharvested = "n";
                $mg->owner = 1;
                $mg->source = "e1be8c47-7b4b-4fb9-862a-16a349e5f586";
                $mg->uuid = $uuid;
                $mg->disahkan = "0";
                $mg->save();
            });
        }

        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
    }

    public function update(Request $request) {
        if($request->c2_saveAsNew == 'yes'){
            $this->store($request);
            return redirect('mygeo_senarai_metadata')->with('success', 'ftest');
        }
        $fields = [
            "c1_content_info" => 'required',
            "publisher_name" => 'required',
            "publisher_agensi_organisasi" => 'required',
            "publisher_email" => 'required',
            "publisher_phone" => 'required',
            "c2_metadataName" => 'required',
            "c2_product_type" => 'required',
            "c2_abstract" => 'required',
            "c2_contact_agensiorganisasi" => 'required',
            "c2_contact_state" => 'required',
            "c2_contact_email" => 'required',
            "c2_contact_phone_office" => 'required',
            "c9_west_bound_longitude" => 'required',
            "c9_east_bound_longitude" => 'required',
            "c9_south_bound_latitude" => 'required',
            "c9_north_bound_latitude" => 'required',
            "c10_keyword" => 'required',
        ];


        if(strtolower($request->kategori) == 'dataset' && strtolower($request->c1_content_info) == 'application'){
            $fields["c10_file_url"]= 'required';
        }
        if(trim($request->c10_file_url) != ''){
            $fields["c10_file_name"]= 'required';
            $fields["c10_file_type"]= 'required';
        }
        if(trim($request->c10_file_name) != ''){
            $fields["c10_file_url"]= 'required';
            $fields["c10_file_type"]= 'required';
        }
        if(trim($request->c10_file_type) != ''){
            $fields["c10_file_url"]= 'required';
            $fields["c10_file_name"]= 'required';
        }
        if(strtolower($request->kategori) == 'services'){
            $fields["c2_serviceUrl"]= 'required';
        }
        if(strtolower($request->kategori) == 'dataset'){
            $fields["topic_category"]= 'required';
        }
        if(strtolower($request->kategori) == 'imagery' || strtolower($request->kategori) == 'gridded'){
            $fields["c4_scan_res"]= 'required';
            $fields["c4_ground_scan"]= 'required';
            $fields["c6_collection_name"]= 'required';
            $fields["c6_collection_id"]= 'required';
            $fields["c8_identifier"]= 'required';
            $fields["c8_type"]= 'required';
            $fields["c8_op_identifier"]= 'required';
        }
        /*
        if($request->c2_product_type == "Application"){
            $fields["abstractApplication_namaAplikasi"]= 'required';
            $fields["abstractApplication_tujuan"]= 'required';
            $fields["abstractApplication_tahunPembangunan"]= 'required';
            $fields["abstractApplication_kemaskini"]= 'required';
            $fields["abstractApplication_dataTerlibat"]= 'required';
            $fields["abstractApplication_sasaranPengguna"]= 'required';
            $fields["abstractApplication_versi"]= 'required';
            $fields["abstractApplication_perisianDigunaPembangunan"]= 'required';
        }elseif($request->c2_product_type == "Document"){
            $fields["abstractDocument_namaDokumen"]= 'required';
            $fields["abstractDocument_tujuan"]= 'required';
            $fields["abstractDocument_tahunTerbitan"]= 'required';
            $fields["abstractDocument_edisi"]= 'required';
        }elseif($request->c2_product_type == "GIS Activity/Project"){
            $fields["abstractGISActivityProject_namaAktiviti"]= 'required';
            $fields["abstractGISActivityProject_tujuan"]= 'required';
            $fields["abstractGISActivityProject_lokasi"]= 'required';
            $fields["abstractGISActivityProject_tahun"]= 'required';
        }elseif($request->c2_product_type == "Map"){
            $fields["abstractMap_namaPeta"]= 'required';
            $fields["abstractMap_kawasan"]= 'required';
            $fields["abstractMap_tujuan"]= 'required';
            $fields["abstractMap_tahunTerbitan"]= 'required';
            $fields["abstractMap_edisi"]= 'required';
            $fields["abstractMap_noSiri"]= 'required';
            $fields["abstractMap_skala"]= 'required';
            $fields["abstractMap_unit"]= 'required';
        }elseif($request->c2_product_type == "Raster Data"){
            $fields["abstractRasterData_namaData"]= 'required';
            $fields["abstractRasterData_lokasi"]= 'required';
            $fields["abstractRasterData_rumusanData"]= 'required';
            $fields["abstractRasterData_tujuanData"]= 'required';
            $fields["abstractRasterData_kaedahPenyediaanData"]= 'required';
            $fields["abstractRasterData_format"]= 'required';
            $fields["abstractRasterData_unit"]= 'required';
            $fields["abstractRasterData_skala"]= 'required';
            $fields["abstractRasterData_statusData"]= 'required';
            $fields["abstractRasterData_tahunPerolehan"]= 'required';
            $fields["abstractRasterData_jenisSatelit"]= 'required';
            $fields["abstractRasterData_format"]= 'required';
            $fields["abstractRasterData_resolusi"]= 'required';
            $fields["abstractRasterData_kawasanLitupan"]= 'required';
        }elseif($request->c2_product_type == "Services"){
            $fields["abstractServices_namaServis"]= 'required';
            $fields["abstractServices_lokasi"]= 'required';
            $fields["abstractServices_tujuan"]= 'required';
            $fields["abstractServices_dataTerlibat"]= 'required';
            $fields["abstractServices_polisi"]= 'required';
            $fields["abstractServices_peringkatCapaian"]= 'required';
            $fields["abstractServices_format"]= 'required';
        }elseif($request->c2_product_type == "Software"){
            $fields["abstractSoftware_namaPerisian"]= 'required';
            $fields["abstractSoftware_versi"]= 'required';
            $fields["abstractSoftware_tujuan"]= 'required';
            $fields["abstractSoftware_tahunPengunaanPerisian"]= 'required';
            $fields["abstractSoftware_kaedahPerolehan"]= 'required';
            $fields["abstractSoftware_format"]= 'required';
            $fields["abstractSoftware_pengeluar"]= 'required';
            $fields["abstractSoftware_keupayaan"]= 'required';
            $fields["abstractSoftware_dataTerlibat"]= 'required';
            $fields["abstractSoftware_keperluanPerkakas"]= 'required';
        }elseif($request->c2_product_type == "Vector Data"){
            $fields["abstractVectorData_namaData"]= 'required';
            $fields["abstractVectorData_lokasi"]= 'required';
            $fields["abstractVectorData_rumusanData"]= 'required';
            $fields["abstractVectorData_tujuanData"]= 'required';
            $fields["abstractVectorData_kaedahPenyediaanData"]= 'required';
            $fields["abstractVectorData_format"]= 'required';
            $fields["abstractVectorData_unit"]= 'required';
            $fields["abstractVectorData_skala"]= 'required';
            $fields["abstractVectorData_statusData"]= 'required';
        }
        */

        $customMsg = [
            "c1_content_info.required" => 'Content Information required',
            "publisher_name.required" => 'Publisher Name required',
            "publisher_agensi_organisasi.required" => 'Publisher Agency or Organisation required',
            "publisher_email.required" => 'Publisher Email required',
            "publisher_phone.required" => 'Publisher Phone required',
            "c2_metadataName.required" => 'Metadata Name required',
            "c2_product_type.required" => 'Type of Product required',
            "c2_abstract.required" => 'Metadata Abstract required',
            "c2_contact_agensiorganisasi.required" => 'Responsible Party Agency or Organisation required',
            "c2_contact_state.required" => 'State required',
            "c2_contact_email.required" => 'Responsible Party Email required',
            "c2_contact_phone_office.required" => 'Responsible Party Phone Number required',
            "c4_scan_res.required" => 'Scanning Resolution required',
            "c4_ground_scan.required" => 'Ground Scanning required',
            "c6_collection_name.required" => 'Collection Name required',
            "c6_collection_id.required" => 'Collection Identification required',
            "c8_identifier.required" => 'Event Identifier required',
            "c8_type.required" => 'Instrument Identification Type required',
            "c8_op_identifier.required" => 'Operation Identifier required',
            "c9_west_bound_longitude.required" => 'West Bound Longitude required',
            "c9_east_bound_longitude.required" => 'East Bound Longitude required',
            "c9_south_bound_latitude.required" => 'South Bound Latitude required',
            "c9_north_bound_latitude.required" => 'North Bound Latitude required',
            "c10_keyword.required" => 'Browsing Information Keyword required',
            "topic_category.required" => 'Topic Category required',
            /*
            "abstractApplication_namaAplikasi.required" => 'Abstract required',
            "abstractApplication_tujuan.required" => 'Abstract required',
            "abstractApplication_tahunPembangunan.required" => 'Abstract required',
            "abstractApplication_kemaskini.required" => 'Abstract required',
            "abstractApplication_dataTerlibat.required" => 'Abstract required',
            "abstractApplication_sasaranPengguna.required" => 'Abstract required',
            "abstractApplication_versi.required" => 'Abstract required',
            "abstractApplication_perisianDigunaPembangunan.required" => 'Abstract required',
            "abstractDocument_namaDokumen.required" => 'Abstract required',
            "abstractDocument_tujuan.required" => 'Abstract required',
            "abstractDocument_tahunTerbitan.required" => 'Abstract required',
            "abstractDocument_edisi.required" => 'Abstract required',
            "abstractGISActivityProject_namaAktiviti.required" => 'Abstract required',
            "abstractGISActivityProject_tujuan.required" => 'Abstract required',
            "abstractGISActivityProject_lokasi.required" => 'Abstract required',
            "abstractGISActivityProject_tahun.required" => 'Abstract required',
            "abstractMap_namaPeta.required" => 'Abstract required',
            "abstractMap_kawasan.required" => 'Abstract required',
            "abstractMap_tujuan.required" => 'Abstract required',
            "abstractMap_tahunTerbitan.required" => 'Abstract required',
            "abstractMap_edisi.required" => 'Abstract required',
            "abstractMap_noSiri.required" => 'Abstract required',
            "abstractMap_skala.required" => 'Abstract required',
            "abstractMap_unit.required" => 'Abstract required',
            "abstractRasterData_namaData.required" => 'Abstract required',
            "abstractRasterData_lokasi.required" => 'Abstract required',
            "abstractRasterData_rumusanData.required" => 'Abstract required',
            "abstractRasterData_tujuanData.required" => 'Abstract required',
            "abstractRasterData_kaedahPenyediaanData.required" => 'Abstract required',
            "abstractRasterData_format.required" => 'Abstract required',
            "abstractRasterData_unit.required" => 'Abstract required',
            "abstractRasterData_skala.required" => 'Abstract required',
            "abstractRasterData_statusData.required" => 'Abstract required',
            "abstractRasterData_tahunPerolehan.required" => 'Abstract required',
            "abstractRasterData_jenisSatelit.required" => 'Abstract required',
            "abstractRasterData_format.required" => 'Abstract required',
            "abstractRasterData_resolusi.required" => 'Abstract required',
            "abstractRasterData_kawasanLitupan.required" => 'Abstract required',
            "abstractServices_namaServis.required" => 'Abstract required',
            "abstractServices_lokasi.required" => 'Abstract required',
            "abstractServices_tujuan.required" => 'Abstract required',
            "abstractServices_dataTerlibat.required" => 'Abstract required',
            "abstractServices_polisi.required" => 'Abstract required',
            "abstractServices_peringkatCapaian.required" => 'Abstract required',
            "abstractServices_format.required" => 'Abstract required',
            "abstractSoftware_namaPerisian.required" => 'Abstract required',
            "abstractSoftware_versi.required" => 'Abstract required',
            "abstractSoftware_tujuan.required" => 'Abstract required',
            "abstractSoftware_tahunPengunaanPerisian.required" => 'Abstract required',
            "abstractSoftware_kaedahPerolehan.required" => 'Abstract required',
            "abstractSoftware_format.required" => 'Abstract required',
            "abstractSoftware_pengeluar.required" => 'Abstract required',
            "abstractSoftware_keupayaan.required" => 'Abstract required',
            "abstractSoftware_dataTerlibat.required" => 'Abstract required',
            "abstractSoftware_keperluanPerkakas.required" => 'Abstract required',
            "abstractVectorData_namaData.required" => 'Abstract required',
            "abstractVectorData_lokasi.required" => 'Abstract required',
            "abstractVectorData_rumusanData.required" => 'Abstract required',
            "abstractVectorData_tujuanData.required" => 'Abstract required',
            "abstractVectorData_kaedahPenyediaanData.required" => 'Abstract required',
            "abstractVectorData_format.required" => 'Abstract required',
            "abstractVectorData_unit.required" => 'Abstract required',
            "abstractVectorData_skala.required" => 'Abstract required',
            "abstractVectorData_statusData.required" => 'Abstract required',
            */
            "c10_file_url.required" => 'URL required',
            "c10_file_name.required" => 'File Name required',
            "c10_file_type.required" => 'File Type required',
            "c2_serviceUrl.required" => 'Service URL required',
        ];
        $this->validate($request, $fields, $customMsg);

        $fileUrl = "";
        $fileUrl = $request->c11_order_instructions;
//        if(isset($_FILES['c11_order_instructions']) && (file_exists($_FILES['c11_order_instructions']['tmp_name']))){
//            $this->validate($request,['c11_order_instructions' => 'required|mimes:pdf,doc,docx,xls,xlsx']);
//            $exists = Storage::exists($request->c11_order_instructions->getClientOriginalName());
//            $time = date('Y-m-d'.'_'.'H_i_s');
//            $fileName = $time.'_'.$request->c11_order_instructions->getClientOriginalName();
//            $fileUrl = Storage::putFileAs('/public/', $request->file('c11_order_instructions'), $fileName);
//        }
        $keywords = "";
        if(count($request->c10_additional_keyword) > 0){
            foreach($request->c10_additional_keyword as $var){
                $keywords .= '
                    <keyword>
                        <gco:CharacterString>'.$var.'</gco:CharacterString>
                    </keyword>
                ';
            }
        }else{
            $keywords .= '
                <keyword>
                    <gco:CharacterString></gco:CharacterString>
                </keyword>
            ';
        }
        $topicCategories = "";
        if(isset($request->topic_category) && count($request->topic_category) > 0){
            foreach($request->topic_category as $var){
                $topicCategories .= '
                    <topicCategory>
                        <MD_TopicCategoryCode>'.$var.'</MD_TopicCategoryCode>
                    </topicCategory>
                ';
            }
        }else{
            $topicCategories .= '
                <topicCategory>
                    <MD_TopicCategoryCode></MD_TopicCategoryCode>
                </topicCategory>
            ';
        }

        $xmlcon = new XmlController;
        $xml = $xmlcon->createXml($request,$fileUrl,$keywords,$topicCategories);

        $msg = $redirect = "";

        DB::connection('pgsql2')->transaction(function () use ($request, $xml, &$msg) {
            $mg = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();
            $mg->timestamps = false;
            $mg->data = $xml;
            $mg->changedate = date("Y-m-d H:i:s");

            if (auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
//                $mg->disahkan = "no";
                $mg->catatan1 = $request->catatan1;
                $mg->catatan2 = $request->catatan2;
                $mg->catatan3 = $request->catatan3;
                $mg->catatan4 = $request->catatan4;
                $mg->catatan5 = $request->catatan5;
                $mg->catatan6 = $request->catatan6;
                $mg->catatan7 = $request->catatan7;
                $mg->catatan8 = $request->catatan8;
                $mg->catatan9 = $request->catatan9;
                $mg->catatan10 = $request->catatan10;
                $mg->catatan11 = $request->catatan11;
                $mg->catatan12 = $request->catatan12;
                $mg->catatan13 = $request->catatan13;
                $mg->catatan14 = $request->catatan14;
                $mg->catatan15 = $request->catatan15;
            }elseif (auth::user()->hasRole(['Penerbit Metadata', 'Super Admin'])) {
//                $mg->catatan1 = "";
//                $mg->catatan2 = "";
//                $mg->catatan3 = "";
//                $mg->catatan4 = "";
//                $mg->catatan5 = "";
//                $mg->catatan6 = "";
//                $mg->catatan7 = "";
//                $mg->catatan8 = "";
//                $mg->catatan9 = "";
//                $mg->catatan10 = "";
//                $mg->catatan11 = "";
//                $mg->catatan12 = "";
//                $mg->catatan13 = "";
//                $mg->catatan14 = "";
//                $mg->catatan15 = "";
//                $mg->disahkan = "0";
            }

            if(isset($request->newStatus)){
                $mg->disahkan = $request->newStatus;
            }

            $msg = "";
            if($request->submitAction == "save"){
                $mg->is_draf = "no";
                if(auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
                    $msg = "Catatan berjaya disimpan.";
                }elseif(auth::user()->hasRole(['Penerbit Metadata', 'Super Admin'])) {
                    $msg = "Metadata berjaya dihantar.";
                }
            }elseif ($request->submitAction == "draf"){
                $mg->is_draf = "yes";
                $msg = "Metadata disimpan sebagai draf.";
            }
            $mg->update();

            if ($request->submitAction == "terbit" && auth::user()->hasRole(['Pengesah Metadata'])){
                //sahkan
                $metadata = MetadataGeo::on('pgsql2')->find($mg->id);
                $metadata->timestamps = false;
                $metadata->disahkan = 'yes';
                $metadata->update();

                $ftestxml2 = <<<XML
                $metadata->data
                XML;
                $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
                $metadataxml = simplexml_load_string($ftestxml2);

                $metadataName = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                   $metadataName = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                }
                $abstract = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                   $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
                }

                $user = User::where("id",$metadata->portal_user_id)->get()->first();
                if(!empty($user)){
                    //send email to penerbit
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title'=>$metadataName);
                    Mail::send('mails.exmpl8', $data, function($message) use ($to_name, $to_email, $metadataName) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : '.$metadataName);
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });
                }

                //create new pengumuman about the new metadata
                $pengumuman = new Pengumuman();
                $pengumuman->title = $metadataName;
                $pengumuman->date = date('Y-m-d H:i:s',time());
                $pengumuman->kategori = 'Metadata Baharu';
                $pengumuman->content = 'Abstract: '.$abstract;
                $pengumuman->gambar = "banner2.jpeg";
                $pengumuman->save();

                $msg = "Metadata berjaya diterbitkan.";
            }
        });

        if(auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
            $redirect = "mygeo_pengesahan_metadata";
        }elseif(auth::user()->hasRole(['Penerbit Metadata', 'Super Admin'])) {
            $redirect = "mygeo_senarai_metadata";
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect($redirect)->with('success', $msg);
    }

    public function metadata_sahkan() {
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
            exit();
        }

        if (is_array($_POST['metadata_id'])) {
            foreach ($_POST['metadata_id'] as $mid) {
                $metadata = MetadataGeo::on('pgsql2')->find($mid);
                $metadata->timestamps = false;
                $metadata->changedate = date("Y-m-d H:i:s");
                $metadata->disahkan = 'yes';
                $metadata->update();

                $ftestxml2 = <<<XML
                $metadata->data
                XML;
                $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
                $metadataxml = simplexml_load_string($ftestxml2);

                $metadataName = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
                   $metadataName = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                }
                $abstract = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                   $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
                }

                //create new pengumuman about the new metadata
                $pengumuman = new Pengumuman();
                $pengumuman->title = $metadataName;
                $pengumuman->date = date('Y-m-d H:i:s',time());
                $pengumuman->kategori = 'Metadata Baharu';
                $pengumuman->content = 'Abstract: '.$abstract;
                $pengumuman->gambar = "banner2.jpeg";
                $pengumuman->save();

                $user = User::where("id",$metadata->portal_user_id)->get()->first();
                if(!empty($user)){
                    //send email to penerbit
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title'=>$metadataName);
                    Mail::send('mails.exmpl8', $data, function($message) use ($to_name, $to_email, $metadataName) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : '.$metadataName);
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });
                }
            }
        } else {
            $metadata = MetadataGeo::on('pgsql2')->find($_POST['metadata_id']);
            $metadata->timestamps = false;
            $metadata->disahkan = 'yes';
            $metadata->changedate = date("Y-m-d H:i:s");
            $metadata->update();

            $ftestxml2 = <<<XML
            $metadata->data
            XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $metadataxml = simplexml_load_string($ftestxml2);

            $metadataName = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
               $metadataName = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
            }
            $abstract = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
               $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
            }

            $user = User::where("id",$metadata->portal_user_id)->get()->first();
            if(!empty($user)){
                //send email to penerbit
                $to_name = $user->name;
                $to_email = $user->email;
                $data = array('title'=>$metadataName);
                Mail::send('mails.exmpl8', $data, function($message) use ($to_name, $to_email, $metadataName) {
                    $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : '.$metadataName);
                    $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                });
            }

            //create new pengumuman about the new metadata
            $pengumuman = new Pengumuman();
            $pengumuman->title = $metadataName;
            $pengumuman->date = date('Y-m-d H:i:s',time());
            $pengumuman->kategori = 'Metadata Baharu';
            $pengumuman->content = 'Abstract: '.$abstract;
            $pengumuman->gambar = "banner2.jpeg";
            $pengumuman->save();
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function metadata_tidak_disahkan() {
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
            exit();
        }

        if (is_array($_POST['metadata_id'])) {
            foreach ($_POST['metadata_id'] as $mid) {
                $metadata = MetadataGeo::on('pgsql2')->find($mid);
                $metadata->timestamps = false;
                $metadata->disahkan = 'no';
                $metadata->changedate = date("Y-m-d H:i:s");
                $metadata->update();

                $ftestxml2 = <<<XML
                $metadata->data
                XML;
                $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
                $metadataxml = simplexml_load_string($ftestxml2);

                $metadataName = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                   $metadataName = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                }

                $user = User::where("id",$metadata->portal_user_id)->get()->first();
                if(!empty($user)){
                    //send email to penerbit
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title'=>$metadataName);
                    Mail::send('mails.exmpl8', $data, function($message) use ($to_name, $to_email, $metadataName) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : '.$metadataName);
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });
                }
            }
        } else {
            $metadata = MetadataGeo::on('pgsql2')->find($_POST['metadata_id']);
            $metadata->timestamps = false;
            $metadata->disahkan = 'no';
            $metadata->changedate = date("Y-m-d H:i:s");
            $metadata->update();

            $ftestxml2 = <<<XML
            $metadata->data
            XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $metadataxml = simplexml_load_string($ftestxml2);

            $metadataName = "";
            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
               $metadataName = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
            }

            $user = User::where("id",$metadata->portal_user_id)->get()->first();
            if(!empty($user)){
                //send email to penerbit
                $to_name = $user->name;
                $to_email = $user->email;
                $data = array('title'=>$metadataName);
                Mail::send('mails.exmpl9', $data, function($message) use ($to_name, $to_email, $metadataName) {
                    $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pindaan Metadata : '.$metadataName);
                    $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                });
            }
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function delete(Request $request) {
        MetadataGeo::on('pgsql2')->find($request->metadata_id)->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('mygeo_senarai_metadata')->with('message', 'Metadata berjaya dihapus.');
    }

    public function kemaskini_elemen_metadata() {
        if(!auth::user()->hasRole(['Pentadbir Metadata'])){
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $elemens = ElemenMetadata::with('getKategori','getTajuk','getSubTajuk')->get();
        $categories = MCategory::get();

        return view('mygeo.kemaskini_elemen_metadata.senarai_elemen', compact('elemens','categories'));
    }

    public function simpan_kategori(Request $request) {
        if(!auth::user()->hasRole(['Pentadbir Metadata'])){
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $mcat = new MCategory();
        $mcat->name = $request->kategori;
        $query = $mcat->save();

        if($query){
            $msg = "Kategori berjaya ditambah.";
        }else{
            $msg = "Kategori tidak berjaya ditambah.";
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function simpan_tajuk(Request $request) {
        if(!auth::user()->hasRole(['Pentadbir Metadata'])){
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $word = "Tajuk";

        $tajuk = new Tajuk();
        $tajuk->kategori = $request->kategori;
        $tajuk->name = $request->tajuk;
        if(isset($request->sub_tajuk)){
            $tajuk->sub_tajuk = $request->sub_tajuk;
            $word = "Sub-Tajuk";
        }
        $query = $tajuk->save();


        if($query){
            $msg = $word." berjaya ditambah.";
        }else{
            $msg = $word." tidak berjaya ditambah.";
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function simpan_sub_tajuk(Request $request) {
        if(!auth::user()->hasRole(['Pentadbir Metadata'])){
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }
        $elemens = ElemenMetadata::get();

    }

    public function simpan_elemen(Request $request) {
        if(!auth::user()->hasRole(['Pentadbir Metadata'])){
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $em = new ElemenMetadata();
        $em->elemen = $request->elemen;
        $em->kategori = $request->kategori;
        $em->tajuk = $request->tajuk;
        $em->sub_tajuk = $request->sub_tajuk;
        $em->jenis_input = $request->jenis_input;
        $em->data_type = $request->data_type;
        $query = $em->save();

        if($query){
            $msg = "Elemen berjaya ditambah.";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Create';
            $at->save();
        }else{
            $msg = "Elemen tidak berjaya ditambah.";
        }

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function getTajukByCategory(Request $request){
        $tajuks = Tajuk::where('kategori',$request->kategori)->whereNull('sub_tajuk')->get();
        echo json_encode($tajuks);
        exit();
    }

    public function getSubTajuk(Request $request){
        $sub_tajuks = Tajuk::where('name',$request->tajuk)->whereNotNull('sub_tajuk')->get();
        echo json_encode(['sub_tajuks'=>$sub_tajuks]);
        exit();
    }

    public function deleteElemenMetadata(Request $request){
        $msg = "";
        $error = 0;
        $delete = ElemenMetadata::where('id',$request->rowid)->delete();
        if($delete){
            $error = 0;
            $msg = "Elemen Metadata telah dipadam";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Delete';
            $at->save();
        }else{
            $error = 1;
            $msg = "Elemen Metadata tidak berjaya dipadam";
        }
        echo json_encode(['error'=>$error,'msg'=>$msg]);
        exit();
    }
}
