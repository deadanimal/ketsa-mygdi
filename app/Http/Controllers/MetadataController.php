<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Auth;
use Mail;
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
use Session;
use App\MetadataGeo;
use App\Mail\MailtrapExample;
use App;
use App\Http\Controllers\XmlController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

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
            $metadatasdb = MetadataGeo::on('pgsql2')->where('data', 'ilike', '%' . auth::user()->agensi_organisasi . '%')->where('data', 'ilike', '%' . auth::user()->bahagian . '%')->orderBy('id', 'DESC')->get()->all();
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
            $xml2 = simplexml_load_string($ftestxml2);
            $metadatas[$met->id] = [$xml2, $met];
        }

        return view('mygeo.metadata.senarai_metadata', compact('metadatas'));
    }

    public function index_nologin() {
        $metadatas = [];
        /*
          $metadatasdb = MetadataGeo::on('pgsql2')->where('disahkan','yes')->orderBy('id', 'DESC')->get()->all();
          foreach($metadatasdb as $met){
          $ftestxml2 = <<<XML
          $met->data
          XML;
          $ftestxml2 = str_replace("gco:","",$ftestxml2);
          $ftestxml2 = str_replace("gmd:","",$ftestxml2);
          $xml2 = simplexml_load_string($ftestxml2);
          $metadatas[$met->id]=$xml2;
          }
         */

        return view('senarai_metadata_nologin', compact('metadatas'));
    }

    public function senarai_pengesahan_metadata() {
        if (isset($_GET['var']) && $_GET['var'] == 'add_dummy_metadata') {
            $this->store_todel();
        }
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
            exit();
        }
        // auth::user()->agensi_organisasi, auth::user()->agensi_organisasi
        $metadatasdb = MetadataGeo::on('pgsql2')->where('disahkan', '0')->orderBy('id', 'DESC')->get()->all();
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

            $agensi = (isset($xml2->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString : "");
            if (strtolower($agensi) == strtolower(auth::user()->agensi_organisasi)) {
                $metadatas[$met->id] = [$xml2,$met];
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
        $metadatasdb = $query->where('disahkan', 'yes')->orderBy('id', 'DESC')->get()->all();
        
        
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

        return view('senarai_metadata_nologin', compact('metadatas'));
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
        $pengesahs = User::whereHas("roles", function ($q) {
                    $q->where("name", "Pengesah Metadata");
                })->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
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

        if(isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString != ""){
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            $refSys = ReferenceSystemIdentifier::where('id',$refSysId)->get()->first();
        }else{
            $refSys = [];
        }

        return view('mygeo.metadata.lihat_metadata', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'));
    }

    public function edit($id) {
        if (!auth::user()->hasRole(['Pengesah Metadata','Penerbit Metadata', 'Super Admin'])) {
            exit();
        }

        if (isset($_GET['bhs']) && $_GET['bhs'] == 'bm') {
            App::setLocale('bm');
        } elseif (isset($_GET['bhs']) && $_GET['bhs'] == 'en') {
            App::setLocale('en');
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

        $pengesahs = User::whereHas("roles", function ($q) {
                    $q->where("name", "Pengesah Metadata");
                })->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();
        $countryId = "";
        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != ""){
            $countryId = trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if($countryId != ""){
            $countrySelected = Countries::where(['id' => $countryId])->get()->first();
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

        return view('lihat_metadata_nologin', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'));
    }

    public function show_xml_nologin(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;

        return response($ftestxml2)->withHeaders(['Content-Type' => 'text/xml']);
    }

    public function messages() {
        return [
            'c2_metadataName.required' => 'ftest1test1',
            'c2_metadataName.required' => 'ftest2test2',
        ];
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
        if(strtolower($request->kategori) == 'imagery' || strtolower($request->kategori) == 'gridded'){
            $fields["c4_scan_res"]= 'required';
            $fields["c4_ground_scan"]= 'required';
            $fields["c6_collection_name"]= 'required';
            $fields["c6_collection_id"]= 'required';
            $fields["c8_identifier"]= 'required';
            $fields["c8_type"]= 'required';
            $fields["c8_op_identifier"]= 'required';
        }
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
        ];
        $this->validate($request, $fields, $customMsg);
        
        if(count($request->c10_additional_keyword) > 0){
            $string = "";
            foreach($request->c10_additional_keyword as $var){
                $string .= $var.",";
            }
            $request->c10_additional_keyword = substr($string, 0, -1);
        }
        if(count($request->topic_category) > 0){
            $string = "";
            foreach($request->topic_category as $var){
                $string .= $var.",";
            }
            $request->topic_category = substr($string, 0, -1);
        }

        $xmlcon = new XmlController;
        $xml = $xmlcon->createXml($request);
        
        DB::connection('pgsql2')->transaction(function () use ($request,$xml) {
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
            
            if(isset($request->btn_save)){
                $mg->is_draf = "no";
            }elseif (isset($request->btn_draf)){
                $mg->is_draf = "yes";
            }
            $mg->save();
        });

        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
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
                $mg->save();
            });

            //delete uploaded xml
            Storage::disk('public')->delete($fileName);
        }

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
        if(strtolower($request->kategori) == 'imagery' || strtolower($request->kategori) == 'gridded'){
            $fields["c4_scan_res"]= 'required';
            $fields["c4_ground_scan"]= 'required';
            $fields["c6_collection_name"]= 'required';
            $fields["c6_collection_id"]= 'required';
            $fields["c8_identifier"]= 'required';
            $fields["c8_type"]= 'required';
            $fields["c8_op_identifier"]= 'required';
        }
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
        ];
        $this->validate($request, $fields, $customMsg);
        
        if(count($request->c10_additional_keyword) > 0){
            $string = "";
            foreach($request->c10_additional_keyword as $var){
                $string .= $var.",";
            }
            $request->c10_additional_keyword = substr($string, 0, -1);
        }
        if(count($request->topic_category) > 0){
            $string = "";
            foreach($request->topic_category as $var){
                $string .= $var.",";
            }
            $request->topic_category = substr($string, 0, -1);
        }

        $xmlcon = new XmlController;
        $xml = $xmlcon->createXml($request);
        
        DB::connection('pgsql2')->transaction(function () use ($request, $xml) {
            $mg = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();
            $mg->timestamps = false;
            $mg->data = $xml;
            $mg->changedate = date("Y-m-d H:i:s");
            
            if (auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
                $mg->disahkan = "no";
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
            }
            
            if(isset($request->newStatus)){
                $mg->disahkan = $request->newStatus;
            }
            
            if(isset($request->btn_save)){
                $mg->is_draf = "no";
            }elseif (isset($request->btn_draf)){
                $mg->is_draf = "yes";
            }
            $mg->update();
        });

        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
    }

    public function metadata_sahkan() {
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
            exit();
        }

        if (is_array($_POST['metadata_id'])) {
            foreach ($_POST['metadata_id'] as $mid) {
                $metadata = MetadataGeo::on('pgsql2')->find($mid);
                $metadata->timestamps = false;
                $metadata->disahkan = 'yes';
                $metadata->update();
            }
        } else {
            $metadata = MetadataGeo::on('pgsql2')->find($_POST['metadata_id']);
            $metadata->timestamps = false;
            $metadata->disahkan = 'yes';
            $metadata->update();
        }

        //send email to whom?
//        $to_name = 'pentadbiraplikasi@gmail.com';
//        $to_email = 'pentadbiraplikasi@gmail.com';
//        $data = array('name'=>$data['name']);
//        Mail::send('mails.exmpl2', $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name)->subject('Pengesahan Pendaftaran Penerbit/Pengesah Metadata MyGeo Explorer');
//            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
//        });
        exit();
    }

    public function metadata_tidak_disahkan() {
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin'])) {
            exit();
        }

        $metadata_id = $_POST['metadata_id'];
        $metadata = MetadataGeo::on('pgsql2')->find($metadata_id);
        $metadata->timestamps = false;
        $metadata->disahkan = 'no';
        $metadata->update();

        //send mail
//        Mail::to('farhan15959_test@gmail.com')->send(new MailtrapExample());
        exit();
    }

    public function delete(Request $request) {
        MetadataGeo::on('pgsql2')->find($request->metadata_id)->delete();
        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Deleted');
    }
}
