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
use App\DrafMetadata;
use Session;
use App\MetadataGeo;
use App\Mail\MailtrapExample;
use App;
//use Illuminate\Support\Facades\Mail;

class MetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    function __construct(){
       
    }

    public function index() {
        $metadatasdb = MetadataGeo::on('pgsql2')->where('data','ilike','%'.auth::user()->agensi_organisasi.'%')->where('data','ilike','%'.auth::user()->bahagian.'%')->orderBy('id', 'DESC')->get()->all(); //disahkan(Diterbitkan) and tidak disahkan(Perlu Pengesahan) and 0(Perlu Pengesahan) and Perlu Pembetulan (catatan)
        $metadatas = [];
        foreach($metadatasdb as $met){
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:","",$ftestxml2);
            $ftestxml2 = str_replace("gmd:","",$ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
            $metadatas[$met->id]=[$xml2,$met,'not_draft'];
        }
        
         $draftsdb = DrafMetadata::where('created_by',auth::user()->id)->get()->all();
         $drafts = [];
         foreach($draftsdb as $met){
             $ftestxml2 = <<<XML
                     $met->data
                     XML;
             $ftestxml2 = str_replace("gco:","",$ftestxml2);
             $ftestxml2 = str_replace("gmd:","",$ftestxml2);
             $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
             $xml2 = simplexml_load_string($ftestxml2);
//             $drafts[$met->id]=[$xml2,$met,'draft'];
             $metadatas[]=[$xml2,$met,'draft'];
         }

        return view('mygeo.senarai_metadata',compact('metadatas'));
    }

    public function index_draf() {
        $draftsdb = DrafMetadata::where('created_by',auth::user()->id)->get()->all();
        $drafts = [];
        foreach($draftsdb as $met){
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:","",$ftestxml2);
            $ftestxml2 = str_replace("gmd:","",$ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
            $drafts[$met->id]=$xml2;
        }

        return view('mygeo.senarai_draf_metadata',compact('drafts'));
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

        return view('senarai_metadata_nologin',compact('metadatas'));
    }

    public function senarai_pengesahan_metadata() {
        if(isset($_GET['var']) && $_GET['var'] == 'add_dummy_metadata'){
            $this->store_todel();
        }
        if(!auth::user()->hasRole(['Pengesah Metadata','Super Admin'])){
            exit();
        }
        // auth::user()->agensi_organisasi, auth::user()->agensi_organisasi
        $metadatasdb = MetadataGeo::on('pgsql2')->where('disahkan','0')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        foreach($metadatasdb as $met){
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:","",$ftestxml2);
            $ftestxml2 = str_replace("gmd:","",$ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);

            $agensi = (isset($xml2->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString:"");
            if(strtolower($agensi) == strtolower(auth::user()->agensi_organisasi)){
                $metadatas[$met->id]=$xml2;
            }
        }

        return view('mygeo.senarai_pengesahan_metadata',compact('metadatas'));
    }
    
    public function search(Request $request) {
        $metadatasdb = MetadataGeo::on('pgsql2')->where('data','ilike','%'.$request->carian.'%')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        foreach($metadatasdb as $met){
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:","",$ftestxml2);
            $ftestxml2 = str_replace("gmd:","",$ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $metadatas[$met->id]=[$xml2,$met,'not_draft'];
        }
        
        $draftsdb = DrafMetadata::where('created_by',auth::user()->id)->get()->all();
         $drafts = [];
         foreach($draftsdb as $met){
             $ftestxml2 = <<<XML
                     $met->data
                     XML;
             $ftestxml2 = str_replace("gco:","",$ftestxml2);
             $ftestxml2 = str_replace("gmd:","",$ftestxml2);
             $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
             $xml2 = simplexml_load_string($ftestxml2);
             $metadatas[]=[$xml2,$met,'draft'];
         }
        
        return view('mygeo.senarai_metadata',compact('metadatas'));
    }
    
    public function search_nologin(Request $request) {
        $metadatasdb = MetadataGeo::on('pgsql2')->where('data','ilike','%'.$request->carian.'%')->where('disahkan','yes')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        foreach($metadatasdb as $met){
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:","",$ftestxml2);
            $ftestxml2 = str_replace("gmd:","",$ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
            $metadatas[$met->id]=$xml2;
        }
        return view('senarai_metadata_nologin',compact('metadatas'));
    }

    public function create(){
        if(!auth::user()->hasRole(['Penerbit Metadata','Super Admin'])){
            exit();
        }

        if(isset($_GET['bhs']) && $_GET['bhs'] == 'bm'){
            App::setLocale('bm');
        }elseif(isset($_GET['bhs']) && $_GET['bhs'] == 'en'){
            App::setLocale('en');
        }
        
        $categories = MCategory::all();
        $pengesahs = User::whereHas("roles", function($q){ $q->where("name", "Pengesah Metadata"); })->where('agensi_organisasi',auth::user()->agensi_organisasi)->where('bahagian',auth::user()->bahagian)->get()->first();
        $states = States::where(['country'=>1])->get()->all();
        $countries = Countries::where(['id'=>1])->get()->all();
        $refSysIds = ReferenceSystemIdentifier::all();
        
        return view('mygeo.pengisian_metadata', compact('categories','states','countries','refSysIds','pengesahs'));
    }
    
    public function show(Request $request){
        if($request->metadata_type == "not_draf"){
            $metadataSearched = MetadataGeo::on('pgsql2')->where('id',$request->metadata_id)->get()->first();        
        }elseif($request->metadata_type == "draf"){
            $metadataSearched = DrafMetadata::find($request->metadata_id);
        }
        
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:","",$ftestxml2);
        $ftestxml2 = str_replace("gmd:","",$ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadata = simplexml_load_string($ftestxml2);
        $metadata_id = $metadataSearched->id;
        
        $metadata = $metadata;
        $metadata_id = $metadata_id;
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country'=>1])->get()->all();
        $countries = Countries::where(['id'=>1])->get()->all();
        $refSysIds = ReferenceSystemIdentifier::all();
//        dd($metadata_id);
        
        return view('mygeo.lihat_metadata', compact('categories','contacts','countries','states','refSysIds','metadata','metadata_id','metadataSearched'));
    }

    public function show_draf(Request $request){
//        $vars = [];
        $metadataSearched = DrafMetadata::find($request->metadata_id);
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:","",$ftestxml2);
        $ftestxml2 = str_replace("gmd:","",$ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadata = simplexml_load_string($ftestxml2);
        $metadata_id = $metadataSearched->id;
        
        $metadata = $metadata;
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country'=>1])->get()->all();
        $countries = Countries::where(['id'=>1])->get()->all();
        $refSysIds = ReferenceSystemIdentifier::all();
        
        return view('mygeo.lihat_draf_metadata', compact('categories','contacts','countries','states','refSysIds','metadata','metadata_id'));
    }
    
    public function edit(Request $request){
        if($request->metadata_type == "not_draf"){
            $metadataSearched = MetadataGeo::on('pgsql2')->where('id',$request->metadata_id)->get()->first();        
        }elseif($request->metadata_type == "draf"){
            $metadataSearched = DrafMetadata::find($request->metadata_id);
        }
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:","",$ftestxml2);
        $ftestxml2 = str_replace("gmd:","",$ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadata = simplexml_load_string($ftestxml2);
        $metadata_id = $metadataSearched->id;
        
        $metadata_type = $request->metadata_type;
        $metadata = $metadata;
        $metadata_id = $metadata_id;
        $pengesahs = User::whereHas("roles", function($q){ $q->where("name", "Pengesah Metadata"); })->where('agensi_organisasi',auth::user()->agensi_organisasi)->where('bahagian',auth::user()->bahagian)->get()->first();
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country'=>1])->get()->all();
        $countries = Countries::where(['id'=>1])->get()->all();
        $refSysIds = ReferenceSystemIdentifier::all();
        
        if($request->metadata_type == "not_draf"){
            return view('mygeo.kemaskini_metadata', compact('categories','contacts','countries','states','refSysIds','metadata','metadata_id','metadataSearched','metadata_type','pengesahs'));
        }elseif($request->metadata_type == "draf"){
            return view('mygeo.kemaskini_draf_metadata', compact('categories','contacts','countries','states','refSysIds','metadata','metadata_id','metadataSearched','metadata_type','pengesahs'));
        }
    }
    
    public function show_nologin(Request $request){
//        $vars = [];
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id',$request->metadata_id)->get()->first();
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:","",$ftestxml2);
        $ftestxml2 = str_replace("gmd:","",$ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
        $metadata = simplexml_load_string($ftestxml2);
        $metadata_id = $metadataSearched->id;
//        dd($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString.' ');
        
        $metadata = $metadata;
        $metadata_id = $metadata_id;
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country'=>1])->get()->all();
        $countries = Countries::where(['id'=>1])->get()->all();
        $refSysIds = ReferenceSystemIdentifier::all();
        
        return view('lihat_metadata_nologin', compact('categories','contacts','countries','states','refSysIds','metadata','metadata_id'));
    }
    
    public function show_xml_nologin(Request $request){
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id',$request->metadata_id)->get()->first();
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        
        return response($ftestxml2)->withHeaders([
            'Content-Type' => 'text/xml'
        ]);
    }

    public function store(Request $request){
        // $fields = [
        //     'cf_id'=>'required',
        //     'cf_loc'=>'required',
        // ];
        // $customMsg = [
        //     'cf_id.required' => 'Facility is required',
        //     'cf_loc.required' => 'Location is required',
        // ];
        // $this->validate($request,$fields,$customMsg);

        DB::connection('pgsql2')->transaction(function() use ($request) {
            $xml = '
                <gmd:MD_Metadata xmlns:gmd="http://www.isotc211.org/2005/gmd" xmlns:gco="http://www.isotc211.org/2005/gco" xmlns:gml="http://www.opengis.net/gml" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.isotc211.org/2005/gmd http://www.isotc211.org/2005/gmd/metadataEntity.xsd">
  <gmd:fileIdentifier>
    <gco:CharacterString>{76CE56BC-B8C2-495B-A59B-7AF64AEAFF9D}</gco:CharacterString>
  </gmd:fileIdentifier>
  <gmd:language>
    <gco:CharacterString />
  </gmd:language>
  <gmd:characterSet>
    <gmd:MD_CharacterSetCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode" codeListValue="8859part3">8859part3</gmd:MD_CharacterSetCode>
  </gmd:characterSet>
  <gmd:hierarchyLevel>
    <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">'.$request->kategori.'</gmd:MD_ScopeCode>
  </gmd:hierarchyLevel>
  <gmd:contact>
    <gmd:CI_ResponsibleParty>
      <gmd:organisationName>
        <gco:CharacterString>'.$request->publisher_agensi_organisasi.'</gco:CharacterString>
      </gmd:organisationName>
      <gmd:individualName>
        <gco:CharacterString>'.$request->publisher_name.'</gco:CharacterString>
      </gmd:individualName>
      <gmd:role>
        <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
      </gmd:role>
      <gmd:contactInfo>
        <gmd:CI_Contact>
          <gmd:phone>
            <gmd:CI_Telephone>
              <gmd:voice>
                <gco:CharacterString>'.$request->publisher_phone.'</gco:CharacterString>
              </gmd:voice>
            </gmd:CI_Telephone>
          </gmd:phone>
          <gmd:address>
            <gmd:CI_Address>
              <gmd:electronicMailAddress>
                <gco:CharacterString>'.$request->publisher_email.'</gco:CharacterString>
              </gmd:electronicMailAddress>
            </gmd:CI_Address>
          </gmd:address>
        </gmd:CI_Contact>
      </gmd:contactInfo>
    </gmd:CI_ResponsibleParty>
  </gmd:contact>
  <gmd:dateStamp>
    <gco:Date>2009-04-13</gco:Date>
  </gmd:dateStamp>
  <gmd:metadataStandardName>
    <gco:CharacterString>MS ISO 19115</gco:CharacterString>
  </gmd:metadataStandardName>
  <gmd:metadataStandardVersion>
    <gco:CharacterString>MMS (MMS Level 2)</gco:CharacterString>
  </gmd:metadataStandardVersion>
  <gmd:metadataMaintenance>
    <gmd:MD_MaintenanceInformation>
      <gmd:maintenanceAndUpdateFrequency>
        <gmd:MD_MaintenanceFrequencyCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_MaintenanceFrequencyCode" codeListValue="" />
      </gmd:maintenanceAndUpdateFrequency>
    </gmd:MD_MaintenanceInformation>
  </gmd:metadataMaintenance>
  <gmd:referenceSystemInfo>
    <gmd:MD_ReferenceSystem>
      <gmd:referenceSystemIdentifier>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString />
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:referenceSystemIdentifier>
    </gmd:MD_ReferenceSystem>
    <gmd:MD_CRS>
      <gmd:projection>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>BRSO</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:projection>
      <gmd:ellipsoid>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>Modified Everest</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:ellipsoid>
      <gmd:datum>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>Timbalai 68</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:datum>
      <gmd:ellipsoidParameters>
        <gmd:MD_EllipsoidParameters>
          <gmd:semiMajorAxis>
            <gco:CharacterString />
          </gmd:semiMajorAxis>
          <gmd:axisUnits>
            <gco:UomLength />
          </gmd:axisUnits>
          <gmd:denominatorOfFlatteningRatio>
            <gco:CharacterString />
          </gmd:denominatorOfFlatteningRatio>
        </gmd:MD_EllipsoidParameters>
      </gmd:ellipsoidParameters>
    </gmd:MD_CRS>
  </gmd:referenceSystemInfo>
  <gmd:contentInfo>
    <gmd:MD_FeatureCatalogueDescription>
      <gmd:complianceCode>
        <gco:Boolean />
      </gmd:complianceCode>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:featureCatalogueCitation>
        <gmd:CI_Citation>
          <gmd:edition>
            <gco:CharacterString />
          </gmd:edition>
          <gmd:editionDate>
            <gco:Date>1970</gco:Date>
          </gmd:editionDate>
        </gmd:CI_Citation>
      </gmd:featureCatalogueCitation>
    </gmd:MD_FeatureCatalogueDescription>
  </gmd:contentInfo>
  <gmd:identificationInfo>
    <gmd:MD_DataIdentification>
      <gmd:citation>
        <gmd:CI_Citation>
          <gmd:title>
            <gco:CharacterString>'.$request->c2_metadataName.'</gco:CharacterString>
          </gmd:title>
          <gmd:date>
            <gmd:CI_Date>
              <gmd:date>
                <gco:Date>2005-01-01</gco:Date>
              </gmd:date>
              <gmd:dateType>
                <gmd:CI_DateTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode" codeListValue="publication">publication</gmd:CI_DateTypeCode>
              </gmd:dateType>
            </gmd:CI_Date>
          </gmd:date>
          <gmd:series>
            <gmd:CI_Series />
          </gmd:series>
        </gmd:CI_Citation>
      </gmd:citation>
      <gmd:abstract>
        <gco:CharacterString>'.$request->c2_abstract.'</gco:CharacterString>
      </gmd:abstract>
      <gmd:purpose>
        <gco:CharacterString>PKA adalah rujukan kemduahan awam yang disediakan MP Sandakan</gco:CharacterString>
      </gmd:purpose>
      <gmd:credit>
        <gco:CharacterString>SABAH STATE GOVERMENT</gco:CharacterString>
      </gmd:credit>
      <gmd:status>
        <gmd:MD_ProgressCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ProgressCode" codeListValue="completed">completed</gmd:MD_ProgressCode>
      </gmd:status>
      <gmd:pointOfContact>
        <gmd:CI_ResponsibleParty>
          <gmd:individualName>
            <gco:CharacterString>'.$request->c2_contact_name.'</gco:CharacterString>
          </gmd:individualName>
          <gmd:organisationName>
            <gco:CharacterString>'.$request->c2_contact_agensiorganisasi.'</gco:CharacterString>
          </gmd:organisationName>
          <gmd:positionName>
            <gco:CharacterString>PRESIDEN MPS</gco:CharacterString>
          </gmd:positionName>
          <gmd:contactInfo>
            <gmd:CI_Contact>
              <gmd:phone>
                <gmd:CI_Telephone>
                  <gmd:voice>
                    <gco:CharacterString>'.$request->c2_contact_phone_office.'</gco:CharacterString>
                  </gmd:voice>
                  <gmd:facsimile>
                    <gco:CharacterString>'.$request->c2_contact_fax.'</gco:CharacterString>
                  </gmd:facsimile>
                  <gmd:bimbit>
                <gco:CharacterString>'.$request->c2_contact_phone_mobile.'</gco:CharacterString>
              </gmd:bimbit>
                </gmd:CI_Telephone>
              </gmd:phone>
              <gmd:address>
                <gmd:CI_Address>
                  <gmd:deliveryPoint>
                    <gco:CharacterString>'.$request->c2_contact_address1.'</gco:CharacterString>
                  </gmd:deliveryPoint>
                  <gmd:city>
                    <gco:CharacterString>'.$request->c2_contact_address2.'</gco:CharacterString>
                  </gmd:city>
                  <gmd:administrativeArea>
                    <gco:CharacterString>'.$request->c2_contact_address4.'</gco:CharacterString>
                  </gmd:administrativeArea>
                  <gmd:postalCode>
                    <gco:CharacterString>'.$request->c2_contact_address3.'</gco:CharacterString>
                  </gmd:postalCode>
                  <gmd:country>
                    <gco:CharacterString>'.$request->c2_contact_country.'</gco:CharacterString>
                  </gmd:country>
                  <gmd:electronicMailAddress>
                    <gco:CharacterString>'.$request->c2_contact_email.'</gco:CharacterString>
                  </gmd:electronicMailAddress>
                </gmd:CI_Address>
              </gmd:address>
              <gmd:onlineResource>
                <gmd:CI_OnlineResource>
                  <gmd:linkage>
                    <gmd:URL>'.$request->c2_contact_website.'</gmd:URL>
                  </gmd:linkage>
                </gmd:CI_OnlineResource>
              </gmd:onlineResource>
              <gmd:hoursOfService>
                <gco:CharacterString>08.00-17.00(GMT+8)</gco:CharacterString>
              </gmd:hoursOfService>
            </gmd:CI_Contact>
          </gmd:contactInfo>
          <gmd:role>
            <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
          </gmd:role>
        </gmd:CI_ResponsibleParty>
      </gmd:pointOfContact>
      <gmd:graphicOverview />
      <gmd:descriptiveKeywords>
        <gmd:MD_Keywords>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_keyword.'</gco:CharacterString>
          </gmd:keyword>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_add_keyword1.'</gco:CharacterString>
          </gmd:keyword>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_add_keyword2.'</gco:CharacterString>
          </gmd:keyword>
        </gmd:MD_Keywords>
      </gmd:descriptiveKeywords>
      <gmd:spatialRepresentationType>
        <gmd:MD_SpatialRepresentationTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_SpatialRepresentationTypeCode" codeListValue="vector">vector</gmd:MD_SpatialRepresentationTypeCode>
      </gmd:spatialRepresentationType>
      <gmd:spatialResolution>
        <gmd:MD_Resolution>
          <gmd:equivalentScale>
            <gmd:MD_RepresentativeFraction>
              <gmd:denominator>
                <gco:Integer>50000</gco:Integer>
              </gmd:denominator>
            </gmd:MD_RepresentativeFraction>
          </gmd:equivalentScale>
        </gmd:MD_Resolution>
      </gmd:spatialResolution>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>economy</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>structure</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>transportation</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:extent>
        <gmd:EX_Extent>
          <gmd:geographicElement>
            <gmd:EX_GeographicBoundingBox>
              <gmd:westBoundLongitude>
                <gco:Decimal>'.$request->c9_west_bound_longitude.'</gco:Decimal>
              </gmd:westBoundLongitude>
              <gmd:eastBoundLongitude>
                <gco:Decimal>'.$request->c9_east_bound_longitude.'</gco:Decimal>
              </gmd:eastBoundLongitude>
              <gmd:southBoundLatitude>
                <gco:Decimal>'.$request->c9_south_bound_latitude.'</gco:Decimal>
              </gmd:southBoundLatitude>
              <gmd:northBoundLatitude>
                <gco:Decimal>'.$request->c9_north_bound_latitude.'</gco:Decimal>
              </gmd:northBoundLatitude>
            </gmd:EX_GeographicBoundingBox>
          </gmd:geographicElement>
        </gmd:EX_Extent>
      </gmd:extent>
      <gmd:supplementalInformation>
        <gco:CharacterString />
      </gmd:supplementalInformation>
      <gmd:resourceSpecificUsage>
        <gmd:MD_Usage>
          <gmd:specificUsage>
            <gco:CharacterString />
          </gmd:specificUsage>
          <gmd:userDeterminedLimitations>
            <gco:CharacterString />
          </gmd:userDeterminedLimitations>
        </gmd:MD_Usage>
      </gmd:resourceSpecificUsage>
      <gmd:resourceConstraints>
        <gmd:MD_Constraints />
        <gmd:MD_LegalConstraints>
          <gmd:accessConstraints>
            <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
          </gmd:accessConstraints>
          <gmd:useConstraints>
            <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
          </gmd:useConstraints>
        </gmd:MD_LegalConstraints>
        <gmd:MD_SecurityConstraints>
          <gmd:classification>
            <gmd:MD_ClassificationCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ClassificationCode" codeListValue="unclassified" />
          </gmd:classification>
        </gmd:MD_SecurityConstraints>
      </gmd:resourceConstraints>
    </gmd:MD_DataIdentification>
  </gmd:identificationInfo>
  <gmd:distributionInfo>
    <gmd:MD_Distribution>
      <gmd:distributor>
        <gmd:MD_Distributor>
          <gmd:distributorContact>
            <gmd:CI_ResponsibleParty>
              <gmd:organisationName>
                <gco:CharacterString>Majlis Perbandaran Sandakan</gco:CharacterString>
              </gmd:organisationName>
              <gmd:role>
                <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
              </gmd:role>
            </gmd:CI_ResponsibleParty>
          </gmd:distributorContact>
          <gmd:distributionOrderProcess>
            <gmd:MD_StandardOrderProcess>
              <gmd:fees>
                <gco:CharacterString />
              </gmd:fees>
              <gmd:plannedAvailableDateTime>
                <gco:DateTime />
              </gmd:plannedAvailableDateTime>
              <gmd:orderingInstructions>
                <gco:CharacterString />
              </gmd:orderingInstructions>
            </gmd:MD_StandardOrderProcess>
          </gmd:distributionOrderProcess>
        </gmd:MD_Distributor>
      </gmd:distributor>
      <gmd:transferOptions>
        <gmd:MD_DigitalTransferOptions>
          <gmd:unitsOfDistribution>
            <gco:CharacterString />
          </gmd:unitsOfDistribution>
          <gmd:transferSize>
            <gco:Real />
          </gmd:transferSize>
          <gmd:onLine>
            <gmd:CI_OnlineResource>
              <gmd:linkage>
                <gmd:URL />
              </gmd:linkage>
              <gmd:description>
                <gco:CharacterString>offlineData</gco:CharacterString>
              </gmd:description>
              <gmd:function>
                <gmd:CI_OnLineFunctionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_OnLineFunctionCode" codeListValue="" />
              </gmd:function>
            </gmd:CI_OnlineResource>
          </gmd:onLine>
          <gmd:offLine>
            <gmd:MD_Medium>
              <gmd:name />
            </gmd:MD_Medium>
          </gmd:offLine>
        </gmd:MD_DigitalTransferOptions>
      </gmd:transferOptions>
    </gmd:MD_Distribution>
  </gmd:distributionInfo>
  <gmd:dataQualityInfo>
    <gmd:DQ_DataQuality>
      <gmd:scope>
        <gmd:DQ_Scope>
          <gmd:level>
            <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">dataset</gmd:MD_ScopeCode>
          </gmd:level>
        </gmd:DQ_Scope>
      </gmd:scope>
      <gmd:lineage>
        <gmd:LI_Lineage>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
        </gmd:LI_Lineage>
      </gmd:lineage>
      <gmd:report>
        <gmd:DQ_Element>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
        </gmd:DQ_Element>
        <gmd:DQ_CompletenessCommission>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_CompletenessCommission>
        <gmd:DQ_CompletenessOmission>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_CompletenessOmission>
        <gmd:DQ_ConceptualConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_ConceptualConsistency>
        <gmd:DQ_DomainConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_DomainConsistency>
        <gmd:DQ_FormatConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_FormatConsistency>
        <gmd:DQ_TopologicalConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TopologicalConsistency>
        <gmd:DQ_AbsoluteExternalPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_AbsoluteExternalPositionalAccuracy>
        <gmd:DQ_RelativeInternalPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_RelativeInternalPositionalAccuracy>
        <gmd:DQ_GriddedDataPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_GriddedDataPositionalAccuracy>
        <gmd:DQ_AccuracyOfATimeMeasurement>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_AccuracyOfATimeMeasurement>
        <gmd:DQ_TemporalConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TemporalConsistency>
        <gmd:DQ_TemporalValidity>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TemporalValidity>
        <gmd:DQ_ThematicClassificationCorrectness>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_ThematicClassificationCorrectness>
        <gmd:DQ_NonQuantitativeAttributeAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_NonQuantitativeAttributeAccuracy>
        <gmd:DQ_QuantitativeAttributeAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_QuantitativeAttributeAccuracy>
      </gmd:report>
    </gmd:DQ_DataQuality>
  </gmd:dataQualityInfo>
</gmd:MD_Metadata>
                    ';

            if(isset($request->btn_save)){
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
                $mg->id = $maxid+1;
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
            }elseif(isset($request->btn_draf)){
                $draf = new DrafMetadata();
                $draf->data = $xml;
                $draf->created_by = auth::user()->id; 
                $draf->save();
            }
        });
        
        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
    }
    
    public function store_xml(Request $request){
//        dd($request,$_FILES['file_xml']);
        if(file_exists($_FILES['file_xml']['tmp_name'])){
            //store uploaded xml
            $fileName = time().'_'.$request->file_xml->getClientOriginalName();
            Storage::putFileAs('public', $request->file('file_xml'), $fileName); //don't forget to set permissions at the public folder

            //read stored xml
            $uploaded_xml = Storage::disk('public')->get($fileName);
            $uploaded_xml = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $uploaded_xml);
            $xmlObject = simplexml_load_string($uploaded_xml);
            $json = json_encode($xmlObject);
            $xml_array = json_decode($json, true); 
            
            //save in geonetwork
            DB::connection('pgsql2')->transaction(function() use ($request,$uploaded_xml) {
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
                $mg->id = $maxid+1;
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

    public function store_todel(){
        for($r = 0;$r<20;$r++){
            DB::connection('pgsql2')->transaction(function() use(&$r) {
                $xml = '
                    <gmd:MD_Metadata xmlns:gmd="http://www.isotc211.org/2005/gmd" xmlns:gco="http://www.isotc211.org/2005/gco" xmlns:gml="http://www.opengis.net/gml" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.isotc211.org/2005/gmd http://www.isotc211.org/2005/gmd/metadataEntity.xsd">
      <gmd:fileIdentifier>
        <gco:CharacterString>{76CE56BC-B8C2-495B-A59B-7AF64AEAFF9D}</gco:CharacterString>
      </gmd:fileIdentifier>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:characterSet>
        <gmd:MD_CharacterSetCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode" codeListValue="8859part3">8859part3</gmd:MD_CharacterSetCode>
      </gmd:characterSet>
      <gmd:hierarchyLevel>
        <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">'.($r > 10 ? 'dataset':'imagery').'</gmd:MD_ScopeCode>
      </gmd:hierarchyLevel>
      <gmd:contact>
        <gmd:CI_ResponsibleParty>
          <gmd:organisationName>
            <gco:CharacterString>Pipeline</gco:CharacterString>
          </gmd:organisationName>
          <gmd:individualName>
            <gco:CharacterString>Super Admin</gco:CharacterString>
          </gmd:individualName>
          <gmd:role>
            <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
          </gmd:role>
          <gmd:contactInfo>
            <gmd:CI_Contact>
              <gmd:phone>
                <gmd:CI_Telephone>
                  <gmd:voice>
                    <gco:CharacterString>0888888888</gco:CharacterString>
                  </gmd:voice>
                </gmd:CI_Telephone>
              </gmd:phone>
              <gmd:address>
                <gmd:CI_Address>
                  <gmd:electronicMailAddress>
                    <gco:CharacterString>superadmin@pipeline.com</gco:CharacterString>
                  </gmd:electronicMailAddress>
                </gmd:CI_Address>
              </gmd:address>
            </gmd:CI_Contact>
          </gmd:contactInfo>
        </gmd:CI_ResponsibleParty>
      </gmd:contact>
      <gmd:dateStamp>
        <gco:Date>2009-04-13</gco:Date>
      </gmd:dateStamp>
      <gmd:metadataStandardName>
        <gco:CharacterString>MS ISO 19115</gco:CharacterString>
      </gmd:metadataStandardName>
      <gmd:metadataStandardVersion>
        <gco:CharacterString>MMS (MMS Level 2)</gco:CharacterString>
      </gmd:metadataStandardVersion>
      <gmd:metadataMaintenance>
        <gmd:MD_MaintenanceInformation>
          <gmd:maintenanceAndUpdateFrequency>
            <gmd:MD_MaintenanceFrequencyCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_MaintenanceFrequencyCode" codeListValue="" />
          </gmd:maintenanceAndUpdateFrequency>
        </gmd:MD_MaintenanceInformation>
      </gmd:metadataMaintenance>
      <gmd:referenceSystemInfo>
        <gmd:MD_ReferenceSystem>
          <gmd:referenceSystemIdentifier>
            <gmd:RS_Identifier>
              <gmd:codeSpace>
                <gco:CharacterString />
              </gmd:codeSpace>
            </gmd:RS_Identifier>
          </gmd:referenceSystemIdentifier>
        </gmd:MD_ReferenceSystem>
        <gmd:MD_CRS>
          <gmd:projection>
            <gmd:RS_Identifier>
              <gmd:codeSpace>
                <gco:CharacterString>BRSO</gco:CharacterString>
              </gmd:codeSpace>
            </gmd:RS_Identifier>
          </gmd:projection>
          <gmd:ellipsoid>
            <gmd:RS_Identifier>
              <gmd:codeSpace>
                <gco:CharacterString>Modified Everest</gco:CharacterString>
              </gmd:codeSpace>
            </gmd:RS_Identifier>
          </gmd:ellipsoid>
          <gmd:datum>
            <gmd:RS_Identifier>
              <gmd:codeSpace>
                <gco:CharacterString>Timbalai 68</gco:CharacterString>
              </gmd:codeSpace>
            </gmd:RS_Identifier>
          </gmd:datum>
          <gmd:ellipsoidParameters>
            <gmd:MD_EllipsoidParameters>
              <gmd:semiMajorAxis>
                <gco:CharacterString />
              </gmd:semiMajorAxis>
              <gmd:axisUnits>
                <gco:UomLength />
              </gmd:axisUnits>
              <gmd:denominatorOfFlatteningRatio>
                <gco:CharacterString />
              </gmd:denominatorOfFlatteningRatio>
            </gmd:MD_EllipsoidParameters>
          </gmd:ellipsoidParameters>
        </gmd:MD_CRS>
      </gmd:referenceSystemInfo>
      <gmd:contentInfo>
        <gmd:MD_FeatureCatalogueDescription>
          <gmd:complianceCode>
            <gco:Boolean />
          </gmd:complianceCode>
          <gmd:language>
            <gco:CharacterString />
          </gmd:language>
          <gmd:featureCatalogueCitation>
            <gmd:CI_Citation>
              <gmd:edition>
                <gco:CharacterString />
              </gmd:edition>
              <gmd:editionDate>
                <gco:Date>1970</gco:Date>
              </gmd:editionDate>
            </gmd:CI_Citation>
          </gmd:featureCatalogueCitation>
        </gmd:MD_FeatureCatalogueDescription>
      </gmd:contentInfo>
      <gmd:identificationInfo>
        <gmd:MD_DataIdentification>
          <gmd:citation>
            <gmd:CI_Citation>
              <gmd:title>
                <gco:CharacterString>pasir'.$r.'@pasir'.$r.'com TODEL</gco:CharacterString>
              </gmd:title>
              <gmd:date>
                <gmd:CI_Date>
                  <gmd:date>
                    <gco:Date>2005-01-01</gco:Date>
                  </gmd:date>
                  <gmd:dateType>
                    <gmd:CI_DateTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode" codeListValue="publication">publication</gmd:CI_DateTypeCode>
                  </gmd:dateType>
                </gmd:CI_Date>
              </gmd:date>
              <gmd:series>
                <gmd:CI_Series />
              </gmd:series>
            </gmd:CI_Citation>
          </gmd:citation>
          <gmd:abstract>
            <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
          </gmd:abstract>
          <gmd:purpose>
            <gco:CharacterString>PKA adalah rujukan kemduahan awam yang disediakan MP Sandakan</gco:CharacterString>
          </gmd:purpose>
          <gmd:credit>
            <gco:CharacterString>SABAH STATE GOVERMENT</gco:CharacterString>
          </gmd:credit>
          <gmd:status>
            <gmd:MD_ProgressCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ProgressCode" codeListValue="completed">completed</gmd:MD_ProgressCode>
          </gmd:status>
          <gmd:pointOfContact>
            <gmd:CI_ResponsibleParty>
              <gmd:individualName>
                <gco:CharacterString>Penerbit Metadata 3</gco:CharacterString>
              </gmd:individualName>
              <gmd:organisationName>
                <gco:CharacterString>Pipeline</gco:CharacterString>
              </gmd:organisationName>
              <gmd:positionName>
                <gco:CharacterString>PRESIDEN MPS</gco:CharacterString>
              </gmd:positionName>
              <gmd:contactInfo>
                <gmd:CI_Contact>
                  <gmd:phone>
                    <gmd:CI_Telephone>
                      <gmd:voice>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:voice>
                      <gmd:facsimile>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:facsimile>
                      <gmd:bimbit>
                    <gco:CharacterString></gco:CharacterString>
                  </gmd:bimbit>
                    </gmd:CI_Telephone>
                  </gmd:phone>
                  <gmd:address>
                    <gmd:CI_Address>
                      <gmd:deliveryPoint>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:deliveryPoint>
                      <gmd:city>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:city>
                      <gmd:administrativeArea>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:administrativeArea>
                      <gmd:postalCode>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:postalCode>
                      <gmd:country>
                        <gco:CharacterString>1</gco:CharacterString>
                      </gmd:country>
                      <gmd:electronicMailAddress>
                        <gco:CharacterString>pasir@pasir.com</gco:CharacterString>
                      </gmd:electronicMailAddress>
                    </gmd:CI_Address>
                  </gmd:address>
                  <gmd:onlineResource>
                    <gmd:CI_OnlineResource>
                      <gmd:linkage>
                        <gmd:URL>pasir@pasir.com</gmd:URL>
                      </gmd:linkage>
                    </gmd:CI_OnlineResource>
                  </gmd:onlineResource>
                  <gmd:hoursOfService>
                    <gco:CharacterString>08.00-17.00(GMT+8)</gco:CharacterString>
                  </gmd:hoursOfService>
                </gmd:CI_Contact>
              </gmd:contactInfo>
              <gmd:role>
                <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
              </gmd:role>
            </gmd:CI_ResponsibleParty>
          </gmd:pointOfContact>
          <gmd:graphicOverview />
          <gmd:descriptiveKeywords>
            <gmd:MD_Keywords>
              <gmd:keyword>
                <gco:CharacterString></gco:CharacterString>
              </gmd:keyword>
              <gmd:keyword>
                <gco:CharacterString></gco:CharacterString>
              </gmd:keyword>
              <gmd:keyword>
                <gco:CharacterString></gco:CharacterString>
              </gmd:keyword>
            </gmd:MD_Keywords>
          </gmd:descriptiveKeywords>
          <gmd:spatialRepresentationType>
            <gmd:MD_SpatialRepresentationTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_SpatialRepresentationTypeCode" codeListValue="vector">vector</gmd:MD_SpatialRepresentationTypeCode>
          </gmd:spatialRepresentationType>
          <gmd:spatialResolution>
            <gmd:MD_Resolution>
              <gmd:equivalentScale>
                <gmd:MD_RepresentativeFraction>
                  <gmd:denominator>
                    <gco:Integer>50000</gco:Integer>
                  </gmd:denominator>
                </gmd:MD_RepresentativeFraction>
              </gmd:equivalentScale>
            </gmd:MD_Resolution>
          </gmd:spatialResolution>
          <gmd:language>
            <gco:CharacterString />
          </gmd:language>
          <gmd:topicCategory>
            <gmd:MD_TopicCategoryCode>economy</gmd:MD_TopicCategoryCode>
          </gmd:topicCategory>
          <gmd:topicCategory>
            <gmd:MD_TopicCategoryCode>structure</gmd:MD_TopicCategoryCode>
          </gmd:topicCategory>
          <gmd:topicCategory>
            <gmd:MD_TopicCategoryCode>transportation</gmd:MD_TopicCategoryCode>
          </gmd:topicCategory>
          <gmd:extent>
            <gmd:EX_Extent>
              <gmd:geographicElement>
                <gmd:EX_GeographicBoundingBox>
                  <gmd:westBoundLongitude>
                    <gco:Decimal>101.68,2.91</gco:Decimal>
                  </gmd:westBoundLongitude>
                  <gmd:eastBoundLongitude>
                    <gco:Decimal>101.68,2.93</gco:Decimal>
                  </gmd:eastBoundLongitude>
                  <gmd:southBoundLatitude>
                    <gco:Decimal>101.66,2.91</gco:Decimal>
                  </gmd:southBoundLatitude>
                  <gmd:northBoundLatitude>
                    <gco:Decimal>101.66,2.93</gco:Decimal>
                  </gmd:northBoundLatitude>
                </gmd:EX_GeographicBoundingBox>
              </gmd:geographicElement>
            </gmd:EX_Extent>
          </gmd:extent>
          <gmd:supplementalInformation>
            <gco:CharacterString />
          </gmd:supplementalInformation>
          <gmd:resourceSpecificUsage>
            <gmd:MD_Usage>
              <gmd:specificUsage>
                <gco:CharacterString />
              </gmd:specificUsage>
              <gmd:userDeterminedLimitations>
                <gco:CharacterString />
              </gmd:userDeterminedLimitations>
            </gmd:MD_Usage>
          </gmd:resourceSpecificUsage>
          <gmd:resourceConstraints>
            <gmd:MD_Constraints />
            <gmd:MD_LegalConstraints>
              <gmd:accessConstraints>
                <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
              </gmd:accessConstraints>
              <gmd:useConstraints>
                <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
              </gmd:useConstraints>
            </gmd:MD_LegalConstraints>
            <gmd:MD_SecurityConstraints>
              <gmd:classification>
                <gmd:MD_ClassificationCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ClassificationCode" codeListValue="unclassified" />
              </gmd:classification>
            </gmd:MD_SecurityConstraints>
          </gmd:resourceConstraints>
        </gmd:MD_DataIdentification>
      </gmd:identificationInfo>
      <gmd:distributionInfo>
        <gmd:MD_Distribution>
          <gmd:distributor>
            <gmd:MD_Distributor>
              <gmd:distributorContact>
                <gmd:CI_ResponsibleParty>
                  <gmd:organisationName>
                    <gco:CharacterString>Majlis Perbandaran Sandakan</gco:CharacterString>
                  </gmd:organisationName>
                  <gmd:role>
                    <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
                  </gmd:role>
                </gmd:CI_ResponsibleParty>
              </gmd:distributorContact>
              <gmd:distributionOrderProcess>
                <gmd:MD_StandardOrderProcess>
                  <gmd:fees>
                    <gco:CharacterString />
                  </gmd:fees>
                  <gmd:plannedAvailableDateTime>
                    <gco:DateTime />
                  </gmd:plannedAvailableDateTime>
                  <gmd:orderingInstructions>
                    <gco:CharacterString />
                  </gmd:orderingInstructions>
                </gmd:MD_StandardOrderProcess>
              </gmd:distributionOrderProcess>
            </gmd:MD_Distributor>
          </gmd:distributor>
          <gmd:transferOptions>
            <gmd:MD_DigitalTransferOptions>
              <gmd:unitsOfDistribution>
                <gco:CharacterString />
              </gmd:unitsOfDistribution>
              <gmd:transferSize>
                <gco:Real />
              </gmd:transferSize>
              <gmd:onLine>
                <gmd:CI_OnlineResource>
                  <gmd:linkage>
                    <gmd:URL />
                  </gmd:linkage>
                  <gmd:description>
                    <gco:CharacterString>offlineData</gco:CharacterString>
                  </gmd:description>
                  <gmd:function>
                    <gmd:CI_OnLineFunctionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_OnLineFunctionCode" codeListValue="" />
                  </gmd:function>
                </gmd:CI_OnlineResource>
              </gmd:onLine>
              <gmd:offLine>
                <gmd:MD_Medium>
                  <gmd:name />
                </gmd:MD_Medium>
              </gmd:offLine>
            </gmd:MD_DigitalTransferOptions>
          </gmd:transferOptions>
        </gmd:MD_Distribution>
      </gmd:distributionInfo>
      <gmd:dataQualityInfo>
        <gmd:DQ_DataQuality>
          <gmd:scope>
            <gmd:DQ_Scope>
              <gmd:level>
                <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">dataset</gmd:MD_ScopeCode>
              </gmd:level>
            </gmd:DQ_Scope>
          </gmd:scope>
          <gmd:lineage>
            <gmd:LI_Lineage>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
            </gmd:LI_Lineage>
          </gmd:lineage>
          <gmd:report>
            <gmd:DQ_Element>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
            </gmd:DQ_Element>
            <gmd:DQ_CompletenessCommission>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_CompletenessCommission>
            <gmd:DQ_CompletenessOmission>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_CompletenessOmission>
            <gmd:DQ_ConceptualConsistency>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_ConceptualConsistency>
            <gmd:DQ_DomainConsistency>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_DomainConsistency>
            <gmd:DQ_FormatConsistency>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_FormatConsistency>
            <gmd:DQ_TopologicalConsistency>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_TopologicalConsistency>
            <gmd:DQ_AbsoluteExternalPositionalAccuracy>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_AbsoluteExternalPositionalAccuracy>
            <gmd:DQ_RelativeInternalPositionalAccuracy>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_RelativeInternalPositionalAccuracy>
            <gmd:DQ_GriddedDataPositionalAccuracy>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_GriddedDataPositionalAccuracy>
            <gmd:DQ_AccuracyOfATimeMeasurement>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_AccuracyOfATimeMeasurement>
            <gmd:DQ_TemporalConsistency>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_TemporalConsistency>
            <gmd:DQ_TemporalValidity>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_TemporalValidity>
            <gmd:DQ_ThematicClassificationCorrectness>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_ThematicClassificationCorrectness>
            <gmd:DQ_NonQuantitativeAttributeAccuracy>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_NonQuantitativeAttributeAccuracy>
            <gmd:DQ_QuantitativeAttributeAccuracy>
              <gmd:statement>
                <gco:CharacterString />
              </gmd:statement>
              <gmd:dateTime>
                <gco:Date />
              </gmd:dateTime>
              <gmd:measureDescription>
                <gco:CharacterString />
              </gmd:measureDescription>
              <gmd:result>
                <gmd:DQ_ConformanceResult>
                  <gmd:explanation>
                    <gco:CharacterString />
                  </gmd:explanation>
                </gmd:DQ_ConformanceResult>
              </gmd:result>
            </gmd:DQ_QuantitativeAttributeAccuracy>
          </gmd:report>
        </gmd:DQ_DataQuality>
      </gmd:dataQualityInfo>
    </gmd:MD_Metadata>
                        ';

            
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
                $mg->id = $maxid+1;
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
   
    public function update(Request $request){
        DB::connection('pgsql2')->transaction(function() use ($request) {
            $xml = '
                <gmd:MD_Metadata xmlns:gmd="http://www.isotc211.org/2005/gmd" xmlns:gco="http://www.isotc211.org/2005/gco" xmlns:gml="http://www.opengis.net/gml" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.isotc211.org/2005/gmd http://www.isotc211.org/2005/gmd/metadataEntity.xsd">
  <gmd:fileIdentifier>
    <gco:CharacterString>{76CE56BC-B8C2-495B-A59B-7AF64AEAFF9D}</gco:CharacterString>
  </gmd:fileIdentifier>
  <gmd:language>
    <gco:CharacterString />
  </gmd:language>
  <gmd:characterSet>
    <gmd:MD_CharacterSetCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode" codeListValue="8859part3">8859part3</gmd:MD_CharacterSetCode>
  </gmd:characterSet>
  <gmd:hierarchyLevel>
    <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">'.$request->kategori.'</gmd:MD_ScopeCode>
  </gmd:hierarchyLevel>
  <gmd:contact>
    <gmd:CI_ResponsibleParty>
      <gmd:organisationName>
        <gco:CharacterString>'.$request->publisher_agensi_organisasi.'</gco:CharacterString>
      </gmd:organisationName>
      <gmd:individualName>
        <gco:CharacterString>'.$request->publisher_name.'</gco:CharacterString>
      </gmd:individualName>
      <gmd:role>
        <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
      </gmd:role>
      <gmd:contactInfo>
        <gmd:CI_Contact>
          <gmd:phone>
            <gmd:CI_Telephone>
              <gmd:voice>
                <gco:CharacterString>'.$request->publisher_phone.'</gco:CharacterString>
              </gmd:voice>
            </gmd:CI_Telephone>
          </gmd:phone>
          <gmd:address>
            <gmd:CI_Address>
              <gmd:electronicMailAddress>
                <gco:CharacterString>'.$request->publisher_email.'</gco:CharacterString>
              </gmd:electronicMailAddress>
            </gmd:CI_Address>
          </gmd:address>
        </gmd:CI_Contact>
      </gmd:contactInfo>
    </gmd:CI_ResponsibleParty>
  </gmd:contact>
  <gmd:dateStamp>
    <gco:Date>2009-04-13</gco:Date>
  </gmd:dateStamp>
  <gmd:metadataStandardName>
    <gco:CharacterString>MS ISO 19115</gco:CharacterString>
  </gmd:metadataStandardName>
  <gmd:metadataStandardVersion>
    <gco:CharacterString>MMS (MMS Level 2)</gco:CharacterString>
  </gmd:metadataStandardVersion>
  <gmd:metadataMaintenance>
    <gmd:MD_MaintenanceInformation>
      <gmd:maintenanceAndUpdateFrequency>
        <gmd:MD_MaintenanceFrequencyCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_MaintenanceFrequencyCode" codeListValue="" />
      </gmd:maintenanceAndUpdateFrequency>
    </gmd:MD_MaintenanceInformation>
  </gmd:metadataMaintenance>
  <gmd:referenceSystemInfo>
    <gmd:MD_ReferenceSystem>
      <gmd:referenceSystemIdentifier>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString />
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:referenceSystemIdentifier>
    </gmd:MD_ReferenceSystem>
    <gmd:MD_CRS>
      <gmd:projection>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>BRSO</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:projection>
      <gmd:ellipsoid>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>Modified Everest</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:ellipsoid>
      <gmd:datum>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>Timbalai 68</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:datum>
      <gmd:ellipsoidParameters>
        <gmd:MD_EllipsoidParameters>
          <gmd:semiMajorAxis>
            <gco:CharacterString />
          </gmd:semiMajorAxis>
          <gmd:axisUnits>
            <gco:UomLength />
          </gmd:axisUnits>
          <gmd:denominatorOfFlatteningRatio>
            <gco:CharacterString />
          </gmd:denominatorOfFlatteningRatio>
        </gmd:MD_EllipsoidParameters>
      </gmd:ellipsoidParameters>
    </gmd:MD_CRS>
  </gmd:referenceSystemInfo>
  <gmd:contentInfo>
    <gmd:MD_FeatureCatalogueDescription>
      <gmd:complianceCode>
        <gco:Boolean />
      </gmd:complianceCode>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:featureCatalogueCitation>
        <gmd:CI_Citation>
          <gmd:edition>
            <gco:CharacterString />
          </gmd:edition>
          <gmd:editionDate>
            <gco:Date>1970</gco:Date>
          </gmd:editionDate>
        </gmd:CI_Citation>
      </gmd:featureCatalogueCitation>
    </gmd:MD_FeatureCatalogueDescription>
  </gmd:contentInfo>
  <gmd:identificationInfo>
    <gmd:MD_DataIdentification>
      <gmd:citation>
        <gmd:CI_Citation>
          <gmd:title>
            <gco:CharacterString>'.$request->c2_metadataName.'</gco:CharacterString>
          </gmd:title>
          <gmd:date>
            <gmd:CI_Date>
              <gmd:date>
                <gco:Date>2005-01-01</gco:Date>
              </gmd:date>
              <gmd:dateType>
                <gmd:CI_DateTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode" codeListValue="publication">publication</gmd:CI_DateTypeCode>
              </gmd:dateType>
            </gmd:CI_Date>
          </gmd:date>
          <gmd:series>
            <gmd:CI_Series />
          </gmd:series>
        </gmd:CI_Citation>
      </gmd:citation>
      <gmd:abstract>
        <gco:CharacterString>'.$request->c2_abstract.'</gco:CharacterString>
      </gmd:abstract>
      <gmd:purpose>
        <gco:CharacterString>PKA adalah rujukan kemduahan awam yang disediakan MP Sandakan</gco:CharacterString>
      </gmd:purpose>
      <gmd:credit>
        <gco:CharacterString>SABAH STATE GOVERMENT</gco:CharacterString>
      </gmd:credit>
      <gmd:status>
        <gmd:MD_ProgressCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ProgressCode" codeListValue="completed">completed</gmd:MD_ProgressCode>
      </gmd:status>
      <gmd:pointOfContact>
        <gmd:CI_ResponsibleParty>
          <gmd:individualName>
            <gco:CharacterString>'.$request->c2_contact_name.'</gco:CharacterString>
          </gmd:individualName>
          <gmd:organisationName>
            <gco:CharacterString>'.$request->c2_contact_agensiorganisasi.'</gco:CharacterString>
          </gmd:organisationName>
          <gmd:positionName>
            <gco:CharacterString>PRESIDEN MPS</gco:CharacterString>
          </gmd:positionName>
          <gmd:contactInfo>
            <gmd:CI_Contact>
              <gmd:phone>
                <gmd:CI_Telephone>
                  <gmd:voice>
                    <gco:CharacterString>'.$request->c2_contact_phone_office.'</gco:CharacterString>
                  </gmd:voice>
                  <gmd:facsimile>
                    <gco:CharacterString>'.$request->c2_contact_fax.'</gco:CharacterString>
                  </gmd:facsimile>
                  <gmd:bimbit>
                <gco:CharacterString>'.$request->c2_contact_phone_mobile.'</gco:CharacterString>
              </gmd:bimbit>
                </gmd:CI_Telephone>
              </gmd:phone>
              <gmd:address>
                <gmd:CI_Address>
                  <gmd:deliveryPoint>
                    <gco:CharacterString>'.$request->c2_contact_address1.'</gco:CharacterString>
                  </gmd:deliveryPoint>
                  <gmd:city>
                    <gco:CharacterString>'.$request->c2_contact_address2.'</gco:CharacterString>
                  </gmd:city>
                  <gmd:administrativeArea>
                    <gco:CharacterString>'.$request->c2_contact_address4.'</gco:CharacterString>
                  </gmd:administrativeArea>
                  <gmd:postalCode>
                    <gco:CharacterString>'.$request->c2_contact_address3.'</gco:CharacterString>
                  </gmd:postalCode>
                  <gmd:country>
                    <gco:CharacterString>'.$request->c2_contact_country.'</gco:CharacterString>
                  </gmd:country>
                  <gmd:electronicMailAddress>
                    <gco:CharacterString>'.$request->c2_contact_email.'</gco:CharacterString>
                  </gmd:electronicMailAddress>
                </gmd:CI_Address>
              </gmd:address>
              <gmd:onlineResource>
                <gmd:CI_OnlineResource>
                  <gmd:linkage>
                    <gmd:URL>'.$request->c2_contact_website.'</gmd:URL>
                  </gmd:linkage>
                </gmd:CI_OnlineResource>
              </gmd:onlineResource>
              <gmd:hoursOfService>
                <gco:CharacterString>08.00-17.00(GMT+8)</gco:CharacterString>
              </gmd:hoursOfService>
            </gmd:CI_Contact>
          </gmd:contactInfo>
          <gmd:role>
            <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
          </gmd:role>
        </gmd:CI_ResponsibleParty>
      </gmd:pointOfContact>
      <gmd:graphicOverview />
      <gmd:descriptiveKeywords>
        <gmd:MD_Keywords>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_keyword.'</gco:CharacterString>
          </gmd:keyword>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_add_keyword1.'</gco:CharacterString>
          </gmd:keyword>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_add_keyword2.'</gco:CharacterString>
          </gmd:keyword>
        </gmd:MD_Keywords>
      </gmd:descriptiveKeywords>
      <gmd:spatialRepresentationType>
        <gmd:MD_SpatialRepresentationTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_SpatialRepresentationTypeCode" codeListValue="vector">vector</gmd:MD_SpatialRepresentationTypeCode>
      </gmd:spatialRepresentationType>
      <gmd:spatialResolution>
        <gmd:MD_Resolution>
          <gmd:equivalentScale>
            <gmd:MD_RepresentativeFraction>
              <gmd:denominator>
                <gco:Integer>50000</gco:Integer>
              </gmd:denominator>
            </gmd:MD_RepresentativeFraction>
          </gmd:equivalentScale>
        </gmd:MD_Resolution>
      </gmd:spatialResolution>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>economy</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>structure</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>transportation</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:extent>
        <gmd:EX_Extent>
          <gmd:geographicElement>
            <gmd:EX_GeographicBoundingBox>
              <gmd:westBoundLongitude>
                <gco:Decimal>'.$request->c9_west_bound_longitude.'</gco:Decimal>
              </gmd:westBoundLongitude>
              <gmd:eastBoundLongitude>
                <gco:Decimal>'.$request->c9_east_bound_longitude.'</gco:Decimal>
              </gmd:eastBoundLongitude>
              <gmd:southBoundLatitude>
                <gco:Decimal>'.$request->c9_south_bound_latitude.'</gco:Decimal>
              </gmd:southBoundLatitude>
              <gmd:northBoundLatitude>
                <gco:Decimal>'.$request->c9_north_bound_latitude.'</gco:Decimal>
              </gmd:northBoundLatitude>
            </gmd:EX_GeographicBoundingBox>
          </gmd:geographicElement>
        </gmd:EX_Extent>
      </gmd:extent>
      <gmd:supplementalInformation>
        <gco:CharacterString />
      </gmd:supplementalInformation>
      <gmd:resourceSpecificUsage>
        <gmd:MD_Usage>
          <gmd:specificUsage>
            <gco:CharacterString />
          </gmd:specificUsage>
          <gmd:userDeterminedLimitations>
            <gco:CharacterString />
          </gmd:userDeterminedLimitations>
        </gmd:MD_Usage>
      </gmd:resourceSpecificUsage>
      <gmd:resourceConstraints>
        <gmd:MD_Constraints />
        <gmd:MD_LegalConstraints>
          <gmd:accessConstraints>
            <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
          </gmd:accessConstraints>
          <gmd:useConstraints>
            <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
          </gmd:useConstraints>
        </gmd:MD_LegalConstraints>
        <gmd:MD_SecurityConstraints>
          <gmd:classification>
            <gmd:MD_ClassificationCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ClassificationCode" codeListValue="unclassified" />
          </gmd:classification>
        </gmd:MD_SecurityConstraints>
      </gmd:resourceConstraints>
    </gmd:MD_DataIdentification>
  </gmd:identificationInfo>
  <gmd:distributionInfo>
    <gmd:MD_Distribution>
      <gmd:distributor>
        <gmd:MD_Distributor>
          <gmd:distributorContact>
            <gmd:CI_ResponsibleParty>
              <gmd:organisationName>
                <gco:CharacterString>Majlis Perbandaran Sandakan</gco:CharacterString>
              </gmd:organisationName>
              <gmd:role>
                <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
              </gmd:role>
            </gmd:CI_ResponsibleParty>
          </gmd:distributorContact>
          <gmd:distributionOrderProcess>
            <gmd:MD_StandardOrderProcess>
              <gmd:fees>
                <gco:CharacterString />
              </gmd:fees>
              <gmd:plannedAvailableDateTime>
                <gco:DateTime />
              </gmd:plannedAvailableDateTime>
              <gmd:orderingInstructions>
                <gco:CharacterString />
              </gmd:orderingInstructions>
            </gmd:MD_StandardOrderProcess>
          </gmd:distributionOrderProcess>
        </gmd:MD_Distributor>
      </gmd:distributor>
      <gmd:transferOptions>
        <gmd:MD_DigitalTransferOptions>
          <gmd:unitsOfDistribution>
            <gco:CharacterString />
          </gmd:unitsOfDistribution>
          <gmd:transferSize>
            <gco:Real />
          </gmd:transferSize>
          <gmd:onLine>
            <gmd:CI_OnlineResource>
              <gmd:linkage>
                <gmd:URL />
              </gmd:linkage>
              <gmd:description>
                <gco:CharacterString>offlineData</gco:CharacterString>
              </gmd:description>
              <gmd:function>
                <gmd:CI_OnLineFunctionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_OnLineFunctionCode" codeListValue="" />
              </gmd:function>
            </gmd:CI_OnlineResource>
          </gmd:onLine>
          <gmd:offLine>
            <gmd:MD_Medium>
              <gmd:name />
            </gmd:MD_Medium>
          </gmd:offLine>
        </gmd:MD_DigitalTransferOptions>
      </gmd:transferOptions>
    </gmd:MD_Distribution>
  </gmd:distributionInfo>
  <gmd:dataQualityInfo>
    <gmd:DQ_DataQuality>
      <gmd:scope>
        <gmd:DQ_Scope>
          <gmd:level>
            <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">dataset</gmd:MD_ScopeCode>
          </gmd:level>
        </gmd:DQ_Scope>
      </gmd:scope>
      <gmd:lineage>
        <gmd:LI_Lineage>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
        </gmd:LI_Lineage>
      </gmd:lineage>
      <gmd:report>
        <gmd:DQ_Element>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
        </gmd:DQ_Element>
        <gmd:DQ_CompletenessCommission>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_CompletenessCommission>
        <gmd:DQ_CompletenessOmission>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_CompletenessOmission>
        <gmd:DQ_ConceptualConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_ConceptualConsistency>
        <gmd:DQ_DomainConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_DomainConsistency>
        <gmd:DQ_FormatConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_FormatConsistency>
        <gmd:DQ_TopologicalConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TopologicalConsistency>
        <gmd:DQ_AbsoluteExternalPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_AbsoluteExternalPositionalAccuracy>
        <gmd:DQ_RelativeInternalPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_RelativeInternalPositionalAccuracy>
        <gmd:DQ_GriddedDataPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_GriddedDataPositionalAccuracy>
        <gmd:DQ_AccuracyOfATimeMeasurement>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_AccuracyOfATimeMeasurement>
        <gmd:DQ_TemporalConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TemporalConsistency>
        <gmd:DQ_TemporalValidity>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TemporalValidity>
        <gmd:DQ_ThematicClassificationCorrectness>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_ThematicClassificationCorrectness>
        <gmd:DQ_NonQuantitativeAttributeAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_NonQuantitativeAttributeAccuracy>
        <gmd:DQ_QuantitativeAttributeAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_QuantitativeAttributeAccuracy>
      </gmd:report>
    </gmd:DQ_DataQuality>
  </gmd:dataQualityInfo>
</gmd:MD_Metadata>
                    ';
            $mg = MetadataGeo::on('pgsql2')->where('id',$request->metadata_id)->get()->first();
            $mg->timestamps = false;
            $mg->data = $xml;
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
            $mg->update();
        });
        
        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
    }

    public function update_draf(Request $request){
        DB::connection('pgsql2')->transaction(function() use ($request) {
            $xml = '
                <gmd:MD_Metadata xmlns:gmd="http://www.isotc211.org/2005/gmd" xmlns:gco="http://www.isotc211.org/2005/gco" xmlns:gml="http://www.opengis.net/gml" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.isotc211.org/2005/gmd http://www.isotc211.org/2005/gmd/metadataEntity.xsd">
  <gmd:fileIdentifier>
    <gco:CharacterString>{76CE56BC-B8C2-495B-A59B-7AF64AEAFF9D}</gco:CharacterString>
  </gmd:fileIdentifier>
  <gmd:language>
    <gco:CharacterString />
  </gmd:language>
  <gmd:characterSet>
    <gmd:MD_CharacterSetCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode" codeListValue="8859part3">8859part3</gmd:MD_CharacterSetCode>
  </gmd:characterSet>
  <gmd:hierarchyLevel>
    <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">'.$request->kategori.'</gmd:MD_ScopeCode>
  </gmd:hierarchyLevel>
  <gmd:contact>
    <gmd:CI_ResponsibleParty>
      <gmd:organisationName>
        <gco:CharacterString>'.$request->publisher_agensi_organisasi.'</gco:CharacterString>
      </gmd:organisationName>
      <gmd:individualName>
        <gco:CharacterString>'.$request->publisher_name.'</gco:CharacterString>
      </gmd:individualName>
      <gmd:role>
        <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
      </gmd:role>
      <gmd:contactInfo>
        <gmd:CI_Contact>
          <gmd:phone>
            <gmd:CI_Telephone>
              <gmd:voice>
                <gco:CharacterString>'.$request->publisher_phone.'</gco:CharacterString>
              </gmd:voice>
            </gmd:CI_Telephone>
          </gmd:phone>
          <gmd:address>
            <gmd:CI_Address>
              <gmd:electronicMailAddress>
                <gco:CharacterString>'.$request->publisher_email.'</gco:CharacterString>
              </gmd:electronicMailAddress>
            </gmd:CI_Address>
          </gmd:address>
        </gmd:CI_Contact>
      </gmd:contactInfo>
    </gmd:CI_ResponsibleParty>
  </gmd:contact>
  <gmd:dateStamp>
    <gco:Date>2009-04-13</gco:Date>
  </gmd:dateStamp>
  <gmd:metadataStandardName>
    <gco:CharacterString>MS ISO 19115</gco:CharacterString>
  </gmd:metadataStandardName>
  <gmd:metadataStandardVersion>
    <gco:CharacterString>MMS (MMS Level 2)</gco:CharacterString>
  </gmd:metadataStandardVersion>
  <gmd:metadataMaintenance>
    <gmd:MD_MaintenanceInformation>
      <gmd:maintenanceAndUpdateFrequency>
        <gmd:MD_MaintenanceFrequencyCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_MaintenanceFrequencyCode" codeListValue="" />
      </gmd:maintenanceAndUpdateFrequency>
    </gmd:MD_MaintenanceInformation>
  </gmd:metadataMaintenance>
  <gmd:referenceSystemInfo>
    <gmd:MD_ReferenceSystem>
      <gmd:referenceSystemIdentifier>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString />
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:referenceSystemIdentifier>
    </gmd:MD_ReferenceSystem>
    <gmd:MD_CRS>
      <gmd:projection>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>BRSO</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:projection>
      <gmd:ellipsoid>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>Modified Everest</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:ellipsoid>
      <gmd:datum>
        <gmd:RS_Identifier>
          <gmd:codeSpace>
            <gco:CharacterString>Timbalai 68</gco:CharacterString>
          </gmd:codeSpace>
        </gmd:RS_Identifier>
      </gmd:datum>
      <gmd:ellipsoidParameters>
        <gmd:MD_EllipsoidParameters>
          <gmd:semiMajorAxis>
            <gco:CharacterString />
          </gmd:semiMajorAxis>
          <gmd:axisUnits>
            <gco:UomLength />
          </gmd:axisUnits>
          <gmd:denominatorOfFlatteningRatio>
            <gco:CharacterString />
          </gmd:denominatorOfFlatteningRatio>
        </gmd:MD_EllipsoidParameters>
      </gmd:ellipsoidParameters>
    </gmd:MD_CRS>
  </gmd:referenceSystemInfo>
  <gmd:contentInfo>
    <gmd:MD_FeatureCatalogueDescription>
      <gmd:complianceCode>
        <gco:Boolean />
      </gmd:complianceCode>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:featureCatalogueCitation>
        <gmd:CI_Citation>
          <gmd:edition>
            <gco:CharacterString />
          </gmd:edition>
          <gmd:editionDate>
            <gco:Date>1970</gco:Date>
          </gmd:editionDate>
        </gmd:CI_Citation>
      </gmd:featureCatalogueCitation>
    </gmd:MD_FeatureCatalogueDescription>
  </gmd:contentInfo>
  <gmd:identificationInfo>
    <gmd:MD_DataIdentification>
      <gmd:citation>
        <gmd:CI_Citation>
          <gmd:title>
            <gco:CharacterString>'.$request->c2_metadataName.'</gco:CharacterString>
          </gmd:title>
          <gmd:date>
            <gmd:CI_Date>
              <gmd:date>
                <gco:Date>2005-01-01</gco:Date>
              </gmd:date>
              <gmd:dateType>
                <gmd:CI_DateTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode" codeListValue="publication">publication</gmd:CI_DateTypeCode>
              </gmd:dateType>
            </gmd:CI_Date>
          </gmd:date>
          <gmd:series>
            <gmd:CI_Series />
          </gmd:series>
        </gmd:CI_Citation>
      </gmd:citation>
      <gmd:abstract>
        <gco:CharacterString>'.$request->c2_abstract.'</gco:CharacterString>
      </gmd:abstract>
      <gmd:purpose>
        <gco:CharacterString>PKA adalah rujukan kemduahan awam yang disediakan MP Sandakan</gco:CharacterString>
      </gmd:purpose>
      <gmd:credit>
        <gco:CharacterString>SABAH STATE GOVERMENT</gco:CharacterString>
      </gmd:credit>
      <gmd:status>
        <gmd:MD_ProgressCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ProgressCode" codeListValue="completed">completed</gmd:MD_ProgressCode>
      </gmd:status>
      <gmd:pointOfContact>
        <gmd:CI_ResponsibleParty>
          <gmd:individualName>
            <gco:CharacterString>'.$request->c2_contact_name.'</gco:CharacterString>
          </gmd:individualName>
          <gmd:organisationName>
            <gco:CharacterString>'.$request->c2_contact_agensiorganisasi.'</gco:CharacterString>
          </gmd:organisationName>
          <gmd:positionName>
            <gco:CharacterString>PRESIDEN MPS</gco:CharacterString>
          </gmd:positionName>
          <gmd:contactInfo>
            <gmd:CI_Contact>
              <gmd:phone>
                <gmd:CI_Telephone>
                  <gmd:voice>
                    <gco:CharacterString>'.$request->c2_contact_phone_office.'</gco:CharacterString>
                  </gmd:voice>
                  <gmd:facsimile>
                    <gco:CharacterString>'.$request->c2_contact_fax.'</gco:CharacterString>
                  </gmd:facsimile>
                  <gmd:bimbit>
                <gco:CharacterString>'.$request->c2_contact_phone_mobile.'</gco:CharacterString>
              </gmd:bimbit>
                </gmd:CI_Telephone>
              </gmd:phone>
              <gmd:address>
                <gmd:CI_Address>
                  <gmd:deliveryPoint>
                    <gco:CharacterString>'.$request->c2_contact_address1.'</gco:CharacterString>
                  </gmd:deliveryPoint>
                  <gmd:city>
                    <gco:CharacterString>'.$request->c2_contact_address2.'</gco:CharacterString>
                  </gmd:city>
                  <gmd:administrativeArea>
                    <gco:CharacterString>'.$request->c2_contact_address4.'</gco:CharacterString>
                  </gmd:administrativeArea>
                  <gmd:postalCode>
                    <gco:CharacterString>'.$request->c2_contact_address3.'</gco:CharacterString>
                  </gmd:postalCode>
                  <gmd:country>
                    <gco:CharacterString>'.$request->c2_contact_country.'</gco:CharacterString>
                  </gmd:country>
                  <gmd:electronicMailAddress>
                    <gco:CharacterString>'.$request->c2_contact_email.'</gco:CharacterString>
                  </gmd:electronicMailAddress>
                </gmd:CI_Address>
              </gmd:address>
              <gmd:onlineResource>
                <gmd:CI_OnlineResource>
                  <gmd:linkage>
                    <gmd:URL>'.$request->c2_contact_website.'</gmd:URL>
                  </gmd:linkage>
                </gmd:CI_OnlineResource>
              </gmd:onlineResource>
              <gmd:hoursOfService>
                <gco:CharacterString>08.00-17.00(GMT+8)</gco:CharacterString>
              </gmd:hoursOfService>
            </gmd:CI_Contact>
          </gmd:contactInfo>
          <gmd:role>
            <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
          </gmd:role>
        </gmd:CI_ResponsibleParty>
      </gmd:pointOfContact>
      <gmd:graphicOverview />
      <gmd:descriptiveKeywords>
        <gmd:MD_Keywords>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_keyword.'</gco:CharacterString>
          </gmd:keyword>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_add_keyword1.'</gco:CharacterString>
          </gmd:keyword>
          <gmd:keyword>
            <gco:CharacterString>'.$request->c5_add_keyword2.'</gco:CharacterString>
          </gmd:keyword>
        </gmd:MD_Keywords>
      </gmd:descriptiveKeywords>
      <gmd:spatialRepresentationType>
        <gmd:MD_SpatialRepresentationTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_SpatialRepresentationTypeCode" codeListValue="vector">vector</gmd:MD_SpatialRepresentationTypeCode>
      </gmd:spatialRepresentationType>
      <gmd:spatialResolution>
        <gmd:MD_Resolution>
          <gmd:equivalentScale>
            <gmd:MD_RepresentativeFraction>
              <gmd:denominator>
                <gco:Integer>50000</gco:Integer>
              </gmd:denominator>
            </gmd:MD_RepresentativeFraction>
          </gmd:equivalentScale>
        </gmd:MD_Resolution>
      </gmd:spatialResolution>
      <gmd:language>
        <gco:CharacterString />
      </gmd:language>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>economy</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>structure</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:topicCategory>
        <gmd:MD_TopicCategoryCode>transportation</gmd:MD_TopicCategoryCode>
      </gmd:topicCategory>
      <gmd:extent>
        <gmd:EX_Extent>
          <gmd:geographicElement>
            <gmd:EX_GeographicBoundingBox>
              <gmd:westBoundLongitude>
                <gco:Decimal>'.$request->c9_west_bound_longitude.'</gco:Decimal>
              </gmd:westBoundLongitude>
              <gmd:eastBoundLongitude>
                <gco:Decimal>'.$request->c9_east_bound_longitude.'</gco:Decimal>
              </gmd:eastBoundLongitude>
              <gmd:southBoundLatitude>
                <gco:Decimal>'.$request->c9_south_bound_latitude.'</gco:Decimal>
              </gmd:southBoundLatitude>
              <gmd:northBoundLatitude>
                <gco:Decimal>'.$request->c9_north_bound_latitude.'</gco:Decimal>
              </gmd:northBoundLatitude>
            </gmd:EX_GeographicBoundingBox>
          </gmd:geographicElement>
        </gmd:EX_Extent>
      </gmd:extent>
      <gmd:supplementalInformation>
        <gco:CharacterString />
      </gmd:supplementalInformation>
      <gmd:resourceSpecificUsage>
        <gmd:MD_Usage>
          <gmd:specificUsage>
            <gco:CharacterString />
          </gmd:specificUsage>
          <gmd:userDeterminedLimitations>
            <gco:CharacterString />
          </gmd:userDeterminedLimitations>
        </gmd:MD_Usage>
      </gmd:resourceSpecificUsage>
      <gmd:resourceConstraints>
        <gmd:MD_Constraints />
        <gmd:MD_LegalConstraints>
          <gmd:accessConstraints>
            <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
          </gmd:accessConstraints>
          <gmd:useConstraints>
            <gmd:MD_RestrictionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_RestrictionCode" codeListValue="restricted" />
          </gmd:useConstraints>
        </gmd:MD_LegalConstraints>
        <gmd:MD_SecurityConstraints>
          <gmd:classification>
            <gmd:MD_ClassificationCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ClassificationCode" codeListValue="unclassified" />
          </gmd:classification>
        </gmd:MD_SecurityConstraints>
      </gmd:resourceConstraints>
    </gmd:MD_DataIdentification>
  </gmd:identificationInfo>
  <gmd:distributionInfo>
    <gmd:MD_Distribution>
      <gmd:distributor>
        <gmd:MD_Distributor>
          <gmd:distributorContact>
            <gmd:CI_ResponsibleParty>
              <gmd:organisationName>
                <gco:CharacterString>Majlis Perbandaran Sandakan</gco:CharacterString>
              </gmd:organisationName>
              <gmd:role>
                <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian">custodian</gmd:CI_RoleCode>
              </gmd:role>
            </gmd:CI_ResponsibleParty>
          </gmd:distributorContact>
          <gmd:distributionOrderProcess>
            <gmd:MD_StandardOrderProcess>
              <gmd:fees>
                <gco:CharacterString />
              </gmd:fees>
              <gmd:plannedAvailableDateTime>
                <gco:DateTime />
              </gmd:plannedAvailableDateTime>
              <gmd:orderingInstructions>
                <gco:CharacterString />
              </gmd:orderingInstructions>
            </gmd:MD_StandardOrderProcess>
          </gmd:distributionOrderProcess>
        </gmd:MD_Distributor>
      </gmd:distributor>
      <gmd:transferOptions>
        <gmd:MD_DigitalTransferOptions>
          <gmd:unitsOfDistribution>
            <gco:CharacterString />
          </gmd:unitsOfDistribution>
          <gmd:transferSize>
            <gco:Real />
          </gmd:transferSize>
          <gmd:onLine>
            <gmd:CI_OnlineResource>
              <gmd:linkage>
                <gmd:URL />
              </gmd:linkage>
              <gmd:description>
                <gco:CharacterString>offlineData</gco:CharacterString>
              </gmd:description>
              <gmd:function>
                <gmd:CI_OnLineFunctionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_OnLineFunctionCode" codeListValue="" />
              </gmd:function>
            </gmd:CI_OnlineResource>
          </gmd:onLine>
          <gmd:offLine>
            <gmd:MD_Medium>
              <gmd:name />
            </gmd:MD_Medium>
          </gmd:offLine>
        </gmd:MD_DigitalTransferOptions>
      </gmd:transferOptions>
    </gmd:MD_Distribution>
  </gmd:distributionInfo>
  <gmd:dataQualityInfo>
    <gmd:DQ_DataQuality>
      <gmd:scope>
        <gmd:DQ_Scope>
          <gmd:level>
            <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset">dataset</gmd:MD_ScopeCode>
          </gmd:level>
        </gmd:DQ_Scope>
      </gmd:scope>
      <gmd:lineage>
        <gmd:LI_Lineage>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
        </gmd:LI_Lineage>
      </gmd:lineage>
      <gmd:report>
        <gmd:DQ_Element>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
        </gmd:DQ_Element>
        <gmd:DQ_CompletenessCommission>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_CompletenessCommission>
        <gmd:DQ_CompletenessOmission>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_CompletenessOmission>
        <gmd:DQ_ConceptualConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_ConceptualConsistency>
        <gmd:DQ_DomainConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_DomainConsistency>
        <gmd:DQ_FormatConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_FormatConsistency>
        <gmd:DQ_TopologicalConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TopologicalConsistency>
        <gmd:DQ_AbsoluteExternalPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_AbsoluteExternalPositionalAccuracy>
        <gmd:DQ_RelativeInternalPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_RelativeInternalPositionalAccuracy>
        <gmd:DQ_GriddedDataPositionalAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_GriddedDataPositionalAccuracy>
        <gmd:DQ_AccuracyOfATimeMeasurement>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_AccuracyOfATimeMeasurement>
        <gmd:DQ_TemporalConsistency>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TemporalConsistency>
        <gmd:DQ_TemporalValidity>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_TemporalValidity>
        <gmd:DQ_ThematicClassificationCorrectness>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_ThematicClassificationCorrectness>
        <gmd:DQ_NonQuantitativeAttributeAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_NonQuantitativeAttributeAccuracy>
        <gmd:DQ_QuantitativeAttributeAccuracy>
          <gmd:statement>
            <gco:CharacterString />
          </gmd:statement>
          <gmd:dateTime>
            <gco:Date />
          </gmd:dateTime>
          <gmd:measureDescription>
            <gco:CharacterString />
          </gmd:measureDescription>
          <gmd:result>
            <gmd:DQ_ConformanceResult>
              <gmd:explanation>
                <gco:CharacterString />
              </gmd:explanation>
            </gmd:DQ_ConformanceResult>
          </gmd:result>
        </gmd:DQ_QuantitativeAttributeAccuracy>
      </gmd:report>
    </gmd:DQ_DataQuality>
  </gmd:dataQualityInfo>
</gmd:MD_Metadata>
                    ';
            
            if(isset($request->btn_save)){
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
                $mg->id = $maxid+1;
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

                DrafMetadata::find($request->metadata_id)->delete();
            }elseif(isset($request->btn_draf)){
                $dm = DrafMetadata::find($request->metadata_id);
                $dm->timestamps = false;
                $dm->data = $xml;
                $dm->update();
            }
        });
        
        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Saved');
    }
    
    public function metadata_sahkan(){
        if(!auth::user()->hasRole(['Pengesah Metadata','Super Admin'])){
            exit();
        }

        if(is_array($_POST['metadata_id'])){
            foreach($_POST['metadata_id'] as $mid){
                $metadata = MetadataGeo::on('pgsql2')->find($mid);
                $metadata->timestamps = false;
                $metadata->disahkan = 'yes';
                $metadata->update();
            }
        }else{
            $metadata = MetadataGeo::on('pgsql2')->find($_POST['metadata_id']);
            $metadata->timestamps = false;
            $metadata->disahkan = 'yes';
            $metadata->update();
        }
        

        //send mail
        Mail::to('farhan15959_test@gmail.com')->send(new MailtrapExample()); 
        exit();
    }

    public function metadata_tidak_disahkan(){
        if(!auth::user()->hasRole(['Pengesah Metadata','Super Admin'])){
            exit();
        }
        
        $metadata_id = $_POST['metadata_id'];
        $metadata = MetadataGeo::on('pgsql2')->find($metadata_id);
        $metadata->timestamps = false;
        $metadata->disahkan = 'no';
        $metadata->update();

        //send mail
        Mail::to('farhan15959_test@gmail.com')->send(new MailtrapExample()); 
        exit();
    }
    
    public function delete_draf(Request $request){
        DrafMetadata::find($request->metadata_id)->delete();
        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Deleted');
    }
    
    public function delete(Request $request){
        MetadataGeo::on('pgsql2')->find($request->metadata_id)->delete();
//        $metadataSearched = MetadataGeo::on('pgsql2')->where('id',$request->metadata_id)->get()->first();        
//        $metadataSearched->disahkan = "no";
//        $metadataSearched->save();
        return redirect('mygeo_senarai_metadata')->with('success', 'Metadata Deleted');
    }
}
