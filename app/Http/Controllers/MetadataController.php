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
use App\CustomMetadataInput;
//use Dompdf\Dompdf;
use App\AgensiOrganisasi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\MetadataTemplate;

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


        $metadatas = $metadatasdb = [];
        $carian = isset($request->carian) ? $request->carian : "";
        $query = MetadataGeo::on('pgsql2');

        if (auth::user()->hasRole(['Penerbit Metadata'])) {
            //see own metadatas
            $query = $query->where('portal_user_id', '=', auth::user()->id);
        } elseif (auth::user()->hasRole(['Pengesah Metadata'])) {
            //see all metadatas with same agensi_organisasi and bahagian
            $query = $query->where('data', 'ilike', '%' . auth::user()->agensiOrganisasi->name . '%')->where('data', 'ilike', '%' . auth::user()->bahagian . '%');
        } elseif (auth::user()->hasRole(['Pentadbir Aplikasi', 'Pentadbir Metadata', 'Super Admin'])) {
            //see all metadatas regardless
        }

        $metadatasdb = $query->orderBy('id', 'DESC')->get();
//        $metadatasdbtitle = $query->select('id','data')->get();
        $metadatasdbtitle = [];

        libxml_use_internal_errors(true); //Disable libxml errors and allow user to fetch error information as needed
        $metadatas = [];
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

            $penerbit = $this->getUser($met->portal_user_id);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            $metadatas[$met->id] = [$xml2, $met, $penerbit];
        }

        $metadataTitles = [];
        /*
          foreach ($metadatasdbtitle as $met) {
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

          if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
          $metadataTitles[] = strtolower(strval($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString));
          }elseif(isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
          $metadataTitles[] = strtolower(strval($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString));
          }
          }
         */

        return view('mygeo.metadata.senarai_metadata', compact('metadatas', 'metadataTitles'));
    }

    public function getSenaraiMetadata(Request $request) {
        $data = [];
        $data['draw'] = $request->draw;

        $query = MetadataGeo::on('pgsql2');

        if (auth::user()->hasRole(['Penerbit Metadata'])) {
            //see own metadatas
            $query = $query->where('portal_user_id', '=', auth::user()->id);
        } elseif (auth::user()->hasRole(['Pengesah Metadata'])) {
            //see all metadatas with same agensi_organisasi and bahagian
            $query = $query->where('data', 'ilike', '%' . auth::user()->agensiOrganisasi->name . '%')->where('data', 'ilike', '%' . auth::user()->bahagian . '%');
        } elseif (auth::user()->hasRole(['Pentadbir Aplikasi', 'Pentadbir Metadata', 'Super Admin'])) {
            //see all metadatas regardless
        }

        $metadatas = $query->orderBy('id', 'DESC')->offset($request->start)->limit($request->length)->get();

        $data['recordsTotal'] = count($metadatas);
        $data['recordsFiltered'] = count($metadatas);

        libxml_use_internal_errors(true); //Disable libxml errors and allow user to fetch error information as needed
        $counter = 1;
//        echo "<pre>";
//        var_dump($request->start);
//        var_dump($request->length);
//        var_dump(count($metadatas));
//        var_dump($query->toSql());
//        var_dump(auth::user()->name);
//        echo "</pre>";
        $data['data'] = [];

        foreach ($metadatas as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = str_replace("\n", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $penerbit = $this->getUser($met->portal_user_id);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            $title = $met->title;

            $kategori = "";
            if (isset($xml2->hierarchyLevel->MD_ScopeCode) && $xml2->hierarchyLevel->MD_ScopeCode != "") {
                $kategori = strval($xml2->hierarchyLevel->MD_ScopeCode);
            }

            $status = "";
            if ($met->is_draf == 'yes') {
                $status = "Draf";
            } else {
                if ($met->disahkan == '0') {
                    $status = "Perlu Pengesahan";
                } elseif ($met->disahkan == 'yes') {
                    $status = "Diterbitkan";
                } elseif ($met->disahkan == 'no') {
                    $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                } elseif ($met->disahkan == 'delete') {
                    $status = "Dipadam";
                }
            }

            $tindakan = "";
            $tindakan .= '<form method="post" action="' . url('/lihat_metadata') . '">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="metadata_id" value="' . $met->id . '">
                <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
            </form>';
            $tindakan .= '<a href="' . url('/kemaskini_metadata/' . $met->id) . '">
                <button type="button" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
            </a>';
            $tindakan .= '<form method="post" action="' . url('/delete_metadata') . '">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="metadata_id" value="' . $met->id . '">
                <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
            </form>';

            $data['data'][] = [
                "bil" => $counter,
                "title" => $title,
                "kategori" => $kategori,
                "status" => $status,
                "tindakan" => $tindakan,
            ];

            $counter++;
        }

        echo json_encode($data);
        exit();
    }

    function getUser($user_id) {
        return User::where('id', $user_id)->get()->first();
    }

    public function index_nologin(Request $request) {
        //extract each metadata title to its own column in db. run once.==========================================================
        /*
          $metadatasdbtemp = MetadataGeo::on('pgsql2')->get();
          foreach ($metadatasdbtemp as $met) {
          $ftestxml2 = <<<XML
          $met->data
          XML;
          $ftestxml2 = str_replace("gco:", "", $ftestxml2);
          $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
          $ftestxml2 = str_replace("srv:", "", $ftestxml2);
          $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
          $ftestxml2 = str_replace("\r", "", $ftestxml2);
          $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

          libxml_use_internal_errors(true); //skips error page detected from simplexml_load_string in the foreach below

          $xml2 = simplexml_load_string($ftestxml2);
          if (false === $xml2) {
          continue;
          }

          if(isset($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
          $title = strtolower(strval($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString));
          }elseif(isset($xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
          $title = strtolower(strval($xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString));
          }
          $met->title = $title;
          $met->save();
          }
         */
        //=========================================================================================================================

        $metadatas = $metadatasdb = [];
        $carian = isset($request->carian) ? $request->carian : "";
        $query = MetadataGeo::on('pgsql2');

        $params = [];

        if (isset($carian) && trim($carian) != "") {
            $query = $query->where('title', 'ilike', '%' . $carian . '%');
        }

        if (isset($request->content_type) && $request->content_type != "") {
            $params['content_type'] = $request->content_type;
            $query = $query->where('data', 'ilike', '%>' . $request->content_type . '<%');
        }
        $params['topic_category'] = [];
        if (isset($request->topic_category)) {
            $query = $query->where(function ($query) use ($request, &$params) {
                foreach ($request->topic_category as $tc) {
                    $query->orWhere('data', 'ilike', '%<MD_TopicCategoryCode>' . $tc . '</MD_TopicCategoryCode>%');
                    $params['topic_category'][] = $tc;
                }
            });
        }

        if (isset($request->tarikh_mula) && $request->tarikh_mula != "" && isset($request->tarikh_tamat) && $request->tarikh_tamat != "" && ($request->tarikh_mula == $request->tarikh_tamat)) {
            $query = $query->whereBetween('createdate', [$request->tarikh_mula . ' 00:00:01', $request->tarikh_tamat . ' 59:59:59']);
        } else {
            if (isset($request->tarikh_mula) && $request->tarikh_mula != "") {
                $params['tarikh_mula'] = $request->tarikh_mula;
                $query = $query->where('createdate', '>=', date('Y-m-d H:i:s', strtotime($request->tarikh_mula . ' 00:00:01')));
            }
            if (isset($request->tarikh_tamat) && $request->tarikh_tamat != "") {
                $params['tarikh_tamat'] = $request->tarikh_tamat;
                $query = $query->where('createdate', '<=', date('Y-m-d H:i:s', strtotime($request->tarikh_tamat . ' 23:59:59')));
            }
        }

        $metadatasdb = $query->where('disahkan', 'yes')->orderBy('id', 'DESC')->paginate(12);
        $metadatasdbtitle = MetadataGeo::on('pgsql2')->select('id', 'data', 'title')->where('disahkan', 'yes')->get();

        $metadatas = [];
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

            libxml_use_internal_errors(true); //skips error page detected from simplexml_load_string in the foreach below

            $sxe = simplexml_load_string($ftestxml2);
            if (false === $sxe) {
                continue;
            }

            $metadatas[$met->id] = $sxe;
        }

        $metadataTitles = [];
        foreach ($metadatasdbtitle as $met) {
            $metadataTitles[] = $met->title;
        }

        $portal = PortalTetapan::get()->first();

        return view('senarai_metadata_nologin', compact('metadatas', 'metadatasdb', 'carian', 'params', 'portal', 'metadataTitles'));
    }

    public function findMetadataByName(Request $request) {
        $metadatasdb = MetadataGeo::on('pgsql2')->where('data', 'ilike', '%' . $request->carian . '%')->where('disahkan', 'yes')->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        foreach ($metadatasdb as $met) {
            $metadatas[$met->id] = $met->title;
        }
        echo json_encode($metadatas);
        exit();
    }

    public function senarai_pengesahan_metadata() {
        if (isset($_GET['var']) && $_GET['var'] == 'add_dummy_metadata') {
            $this->store_todel();
        }

        if (!auth::user()->hasRole(['Pentadbir Metadata', 'Pengesah Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
            exit();
        }

        // auth::user()->agensi_organisasi, auth::user()->agensi_organisasi
        $metadatasdb = MetadataGeo::on('pgsql2')->where('disahkan', '0')->where('is_draf', 'no')->orderBy('id', 'DESC')->get()->all();
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
            $ftestxml2 = str_replace("\n", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            $penerbit = $this->getUser($met->portal_user_id);

            $agensi = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
            if (strtolower($agensi) == strtolower(auth::user()->agensiOrganisasi->name)) {
//                $metadatas[$met->id] = [$xml2,$met];
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
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            $metadatas[$met->id] = [$xml2, $met, 'not_draft'];
        }

        return view('mygeo.metadata.senarai_metadata', compact('metadatas'));
    }

    public function search_nologin(Request $request) {
        $query = MetadataGeo::on('pgsql2');
        if (isset($request->carian)) {
            $query = $query->where('data', 'ilike', '%' . $request->carian . '%');
        }
        if (isset($request->content_type)) {
            $query = $query->where('data', 'ilike', '%' . $request->content_type . '%');
        }
        if (isset($request->topic_category)) {
            foreach ($request->topic_category as $tc) {
                $query = $query->where('data', 'ilike', '%' . $tc . '%');
            }
        }
        if (isset($request->tarikh_mula)) {
            $query = $query->where('createdate', '>=', date('Y-m-d', strtotime($request->tarikh_mula)));
        }
        if (isset($request->tarikh_tamat)) {
            $query = $query->where('createdate', '<=', date('Y-m-d', strtotime($request->tarikh_tamat)));
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
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $xml2 = simplexml_load_string($ftestxml2);
            if (false === $xml2) {
                continue;
            }

            $metadatas[$met->id] = $xml2;
        }

        $portal = PortalTetapan::get()->first();
        return view('senarai_metadata_nologin', compact('metadatas', 'metadatasdb', 'portal'));
    }

    public function create() {
        if (!auth::user()->hasRole(['Penerbit Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
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
        $pengesahs = User::where('assigned_roles', 'LIKE', '%Pengesah Metadata%')->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        if (empty($pengesahs)) {
            $pengesahs = User::where(['id' => '9'])->get()->first(); //make Pentadbir Metadata the pengesah if no pengesahs with same agency or organisation is found
        }
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();
        $refSys = ReferenceSystemIdentifier::all();
        if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
            $kategori = MCategory::where('name', $_GET['kategori'])->get()->first();
            $elemenMetadata = ElemenMetadata::where('kategori', $kategori->id)->get()->keyBy('input_name');
            $customMetadataInput = CustomMetadataInput::where('kategori', $kategori->id)->get()->all();
        } else {
            $elemenMetadata = ElemenMetadata::where('kategori', '4')->get()->keyBy('input_name');
            $customMetadataInput = CustomMetadataInput::all();
        }

        return view('mygeo.metadata.pengisian_metadata', compact('categories', 'states', 'countries', 'refSys', 'pengesahs', 'customMetadataInput', 'elemenMetadata'));
    }

    public function show(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
        $ftestxml2 = str_replace("\r", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

        $metadataxml = simplexml_load_string($ftestxml2);
        if (false === $metadataxml) {
//            continue;
        }

        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != "") {
            App::setLocale(trim($metadataxml->language->CharacterString));
        }

        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countryId = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != "") {
            $countryId = trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString);
        }
        if ($countryId != "") {
            if (is_numeric($countryId)) {
                $countries = Countries::where('id', $countryId)->get()->first();
            } else {
                $countries = Countries::where('name', $countryId)->get()->first();
            }
        } else {
            $countries = Countries::where(['id' => 1])->get()->first();
        }

        if (isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString != "") {
            $refSysId = trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString);
            if (is_numeric($refSysId)) {
                $refSys = ReferenceSystemIdentifier::where('id', $refSysId)->get()->first();
            } else {
                $refSys = ReferenceSystemIdentifier::where('name', $refSysId)->get()->first();
            }
        } else {
            $refSys = [];
        }

        $portal = PortalTetapan::get()->first();
        $customMetadataInput = CustomMetadataInput::all();

        return view('mygeo.metadata.lihat_metadata', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched', 'portal', 'customMetadataInput'));
    }

    public function edit($id) {
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Penerbit Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
            exit();
        }

        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
        $ftestxml2 = str_replace("\r", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

        $metadataxml = simplexml_load_string($ftestxml2);
        if (false === $metadataxml) {
//            continue;
        }

        if (isset($_GET['bhs']) && $_GET['bhs'] == 'bm') {
            App::setLocale('bm');
        } elseif (isset($_GET['bhs']) && $_GET['bhs'] == 'en') {
            App::setLocale('en');
        } else {
            if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != "") {
                App::setLocale(trim($metadataxml->language->CharacterString));
            }
        }

//        $pengesahs = User::whereHas("roles", function ($q) {
//                    $q->where("name", "Pengesah Metadata");
//                })->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        $pengesahs = User::where('assigned_roles', 'LIKE', '%Pengesah Metadata%')->where('agensi_organisasi', auth::user()->agensi_organisasi)->where('bahagian', auth::user()->bahagian)->get()->first();
        if (empty($pengesahs)) {
            $pengesahs = User::where(['id' => '9'])->get()->first(); //make Pentadbir Metadata the pengesah if no pengesahs with same agency or organisation is found
        }
        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();
        $countryId = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != "") {
            $countryId = trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if ($countryId != "") {
            if (is_numeric($countryId)) {
                $countrySelected = Countries::where(['id' => $countryId])->get()->first();
            } else {
                $countrySelected = Countries::where('name', 'LIKE', '%' . $countryId . 'asdsadss%')->get()->first();
//                $countrySelected = Countries::where('id',$countryId)->get()->first();
                if (!$countrySelected) {
                    $countrySelected = Countries::where(['id' => 1])->get()->first();
                }
            }
        } else {
            $countrySelected = Countries::where(['id' => 1])->get()->first();
        }

        $refSys = ReferenceSystemIdentifier::all();
        $refSysId = "";
        if (isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString != "") {
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
        } elseif (isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->code->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->code->CharacterString != "") {
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->code->CharacterString;
        } else {
            $refSysSelected = [];
        }
        if ($refSysId != "" && is_numeric($refSysId)) {
            $refSysSelected = ReferenceSystemIdentifier::where('id', $refSysId)->get()->first();
        } elseif ($refSysId != "" && !is_numeric($refSysId)) {
            $refSysSelected = ReferenceSystemIdentifier::where('name', $refSysId)->get()->first();
        }
        $customMetadataInput = CustomMetadataInput::all();
        if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
            $kategori = MCategory::where('name', $_GET['kategori'])->get()->first();
            $elemenMetadata = ElemenMetadata::where('kategori', $kategori->id)->get()->keyBy('input_name');
        } else {
            if (isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != "") {
                $catSelected = trim($metadataxml->hierarchyLevel->MD_ScopeCode);
                $kategori = MCategory::where('name', $catSelected)->get()->first();
                if ($kategori) {
                    $elemenMetadata = ElemenMetadata::where('kategori', $kategori->id)->get()->keyBy('input_name');
                    $customMetadataInput = CustomMetadataInput::where('kategori', $kategori->id)->get()->all();
                } else {
                    $elemenMetadata = ElemenMetadata::where('kategori', '4')->get()->keyBy('input_name');
                    $customMetadataInput = CustomMetadataInput::get()->all();
                }
            } else {
                $elemenMetadata = ElemenMetadata::where('kategori', '4')->get()->keyBy('input_name');
                $customMetadataInput = CustomMetadataInput::get()->all();
            }
        }

        return view('mygeo.metadata.kemaskini_metadata', compact('categories', 'contacts', 'countries', 'countrySelected', 'states', 'refSys', 'refSysSelected', 'metadataxml', 'metadataSearched', 'pengesahs', 'customMetadataInput', 'elemenMetadata'));
    }

    public function show_nologin(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();

        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
        $ftestxml2 = str_replace("\r", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

        $metadataxml = simplexml_load_string($ftestxml2);
        if (false === $metadataxml) {
//            continue;
        }

        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != "") {
            App::setLocale(trim($metadataxml->language->CharacterString));
        }

        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countryId = "";
        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != "") {
            $countryId = trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if ($countryId != "") {
            $countries = Countries::where(['id' => $countryId])->get()->first();
        } else {
            $countries = Countries::where(['id' => 1])->get()->first();
        }

        if (isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) != "" && is_numeric(trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString))) {
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            $refSys = ReferenceSystemIdentifier::where('id', $refSysId)->get()->first();
        } else {
            $refSys = [];
        }

        $portal = PortalTetapan::get()->first();
        $customMetadataInput = CustomMetadataInput::all();

        return view('lihat_metadata_nologin', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched', 'portal', 'customMetadataInput'));
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
        $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
        $ftestxml2 = str_replace("\r", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

        $metadataxml = simplexml_load_string($ftestxml2);
        if (false === $metadataxml) {
//            continue;
        }

        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != "") {
            App::setLocale(trim($metadataxml->language->CharacterString));
        }

        $categories = MCategory::all();
        $contacts = User::all();
        $states = States::where(['country' => 1])->get()->all();
        $countryId = "";
        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != "") {
            $countryId = trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
        }
        if ($countryId != "") {
            $countries = Countries::where(['id' => $countryId])->get()->first();
        } else {
            $countries = Countries::where(['id' => 1])->get()->first();
        }

        if (isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && trim($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) != "") {
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            $refSys = ReferenceSystemIdentifier::where('id', $refSysId)->get()->first();
        } else {
            $refSys = [];
        }

//        $html = view('pdfs.pdf1', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'))->render();
//        $pdf = \App::make('dompdf.wrapper')->setOptions(['defaultFont' => 'sans-serif']);
//        $pdf->loadHTML($html);
////        return $pdf->stream();
//        
        $pdf = PDF::loadView('pdfs.pdf1', compact('categories', 'contacts', 'countries', 'states', 'refSys', 'metadataxml', 'metadataSearched'))->setOptions(['defaultFont' => 'sans-serif']);
//        
        return $pdf->download('disney.pdf');
    }

    public function show_xml_nologin(Request $request) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;

        return response($ftestxml2)->withHeaders(['Content-Type' => 'text/xml']);
    }

    public function downloadMetadataXml($id, $name) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $id)->get()->first();
        $ftestxml2 = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . PHP_EOL . <<<XML
                $metadataSearched->data
                XML;

        $response = response($ftestxml2);
        $response->header('Content-Type', 'text/xml');
        $response->header('Cache-Control', 'public');
        $response->header('Content-Description', 'File Transfer');
        $response->header('Content-Disposition', 'attachment; filename=' . $name . '.xml');
        $response->header('Content-Transfer-Encoding', 'binary');
        return $response;
    }

    public function downloadMetadataExcel($id) {
        $metadataSearched = MetadataGeo::on('pgsql2')->where('id', $id)->get()->first();
        $ftestxml2 = <<<XML
                $metadataSearched->data
                XML;
        $ftestxml2 = str_replace("gco:", "", $ftestxml2);
        $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
        $ftestxml2 = str_replace("srv:", "", $ftestxml2);
        $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
        $ftestxml2 = str_replace("\r", "", $ftestxml2);
        $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

        $metadataxml = simplexml_load_string($ftestxml2);
        if (false === $metadataxml) {
//            continue;
        }


        // (B) CREATE A NEW SPREADSHEET
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(80);

        // (C) GET WORKSHEET
        $sheet = $spreadsheet->getActiveSheet();

        $row = 1;

        $category = '';
        if (isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != '') {
            $category = $metadataxml->hierarchyLevel->MD_ScopeCode;
        }
        $sheet->setCellValue('A' . $row, 'Kategori');
        $sheet->setCellValue('B' . $row, $category);

        //General Information===================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'General Information');

        $content_info = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString != "") {
            $content_info = trim($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Content Information');
        $sheet->setCellValue('B' . $row, $content_info);

        $pub_name = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
            $pub_name = $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Publisher Name');
        $sheet->setCellValue('B' . $row, $pub_name);
        $pub_agencyOrg = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString != "") {
            $pub_agencyOrg = $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Publisher Agency/Organisation');
        $sheet->setCellValue('B' . $row, $pub_agencyOrg);

        $bahagian = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->departmentName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->departmentName->CharacterString != "") {
            $bahagian = $metadataxml->contact->CI_ResponsibleParty->departmentName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Publisher Bahagian');
        $sheet->setCellValue('B' . $row, $bahagian);

        $pub_email = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
            $pub_email = $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Publisher Bahagian');
        $sheet->setCellValue('B' . $row, $pub_email);

        $pub_phone = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != "") {
            $pub_phone = $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Publisher Phone');
        $sheet->setCellValue('B' . $row, $pub_phone);

        $pub_role = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode != "") {
            $pub_role = $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Publisher Role');
        $sheet->setCellValue('B' . $row, $pub_role);

        //Identification Information============================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Identification Information');

        $row++;
        $sheet->setCellValue('A' . $row, 'Metadata Name');
        $sheet->setCellValue('B' . $row, $metadataSearched->title);

        $typeofProd = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString != '') {
            $typeofProd = trim($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Type Of Product');
        $sheet->setCellValue('B' . $row, $typeofProd);

        $abstract = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != "") {
            $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != "") {
            $abstract = $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Abstract');
        $sheet->setCellValue('B' . $row, $abstract);

        $fileUrl = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString != '') {
            $fileUrl = $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'File URL');
        $sheet->setCellValue('B' . $row, $fileUrl);

        $metDate = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
            $metDate = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
            $metDate = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $metDate);

        $metDateType = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != '') {
            $metDateType = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != '') {
            $metDateType = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date Type');
        $sheet->setCellValue('B' . $row, $metDateType);

        $metStatus = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->metadataStatus->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->metadataStatus->CharacterString != '') {
            $metStatus = $metadataxml->identificationInfo->MD_DataIdentification->metadataStatus->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode != '') {
            $metStatus = $metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Status');
        $sheet->setCellValue('B' . $row, $metStatus);

        $typeOfServices = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString != '') {
            $typeOfServices = $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName) && $metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName != '') {
            $typeOfServices = $metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Type Of Services');
        $sheet->setCellValue('B' . $row, $typeOfServices);

        $operationName = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != '') {
            $operationName = $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != '') {
            $operationName = $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Operation Name');
        $sheet->setCellValue('B' . $row, $operationName);

        $serviceUrl = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString != '') {
            $serviceUrl = $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Service URL');
        $sheet->setCellValue('B' . $row, $serviceUrl);

        $typeCouplingDataset = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) && trim($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) != '') {
            $typeCouplingDataset = $metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Type of Coupling with Dataset');
        $sheet->setCellValue('B' . $row, $typeCouplingDataset);

        $respName = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != '') {
            $respName = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != '') {
            $respName = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Name');
        $sheet->setCellValue('B' . $row, $respName);

        $respAgencyOrg = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != '') {
            $respAgencyOrg = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != '') {
            $respAgencyOrg = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Agency');
        $sheet->setCellValue('B' . $row, $respAgencyOrg);

        $positionName = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->positionName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->positionName->CharacterString != '') {
            $positionName = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->positionName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Position Name');
        $sheet->setCellValue('B' . $row, $positionName);

        $respAddress = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != '') {
            $respAddress = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != '') {
            $respAddress = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Address');
        $sheet->setCellValue('B' . $row, $respAddress);

        $postalCode = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != '') {
            $postalCode = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != '') {
            $postalCode = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Postal Code');
        $sheet->setCellValue('B' . $row, $postalCode);

        $city = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != '') {
            $city = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != '') {
            $city = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party City');
        $sheet->setCellValue('B' . $row, $city);

        $respState = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != '') {
            $respState = strtolower(trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != '') {
            $respState = strtolower(trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party State');
        $sheet->setCellValue('B' . $row, $respState);

        $countries = [];
        $countryId = 1;
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString != "") {
            $countryId = trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString);
//            $countrySelected = Countries::where(['id'=>$countryName])->get()->first();
        }
        $countries = Countries::where(['id' => 1])->get();
        $countryExcel = "Malaysia";
        if ($countries) {
            foreach ($countries as $country) {
                if ($country->id == $countryId) {
                    $countryExcel = $country->name;
                }
            }
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Country');
        $sheet->setCellValue('B' . $row, $countryExcel);

        $respEmail = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != '') {
            $respEmail = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != '') {
            $respEmail = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Email');
        $sheet->setCellValue('B' . $row, $respEmail);

        $fax = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != '') {
            $fax = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != '') {
            $fax = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Fax');
        $sheet->setCellValue('B' . $row, $fax);

        $respPhone = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != '') {
            $respPhone = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != '') {
            $respPhone = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Telephone (Office)');
        $sheet->setCellValue('B' . $row, $respPhone);

        $respWebsite = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != '') {
            $respWebsite = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != '') {
            $respWebsite = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Website');
        $sheet->setCellValue('B' . $row, $respWebsite);

        $role = '';
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != '') {
            $role = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != '') {
            $role = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Responsible Party Role');
        $sheet->setCellValue('B' . $row, $role);

        //Topic Category========================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Topic Category');

        $tc = [];
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->topicCategory)) {
            if (count($metadataxml->identificationInfo->MD_DataIdentification->topicCategory) > 0) {
                foreach ($metadataxml->identificationInfo->MD_DataIdentification->topicCategory as $tcd) {
                    if (trim($tcd->MD_TopicCategoryCode) != "") {
                        $tc[] = trim($tcd->MD_TopicCategoryCode);
                    }
                }
            }
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory)) {
            if (count($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory) > 0) {
                foreach ($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory as $tcd) {
                    if (trim($tcd->MD_TopicCategoryCode) != "") {
                        $tc[] = trim($tcd->MD_TopicCategoryCode);
                    }
                }
            }
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Topic Category');
        if (count($tc) > 0) {
            foreach ($tc as $t) {
                $sheet->setCellValue('B' . $row, $t);
                $row++;
            }
        }

        //Nominal Resolution====================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Nominal Resolution');

        $scanRes = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString != "") {
            $scanRes = $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scanning Resolution');
        $sheet->setCellValue('B' . $row, $scanRes);

        $groundScan = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal != "") {
            $groundScan = $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Ground Scanning');
        $sheet->setCellValue('B' . $row, $groundScan);

        //Process Step Information====================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Process Step Information');

        $processLevel = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString != "") {
            $processLevel = $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Process Level');
        $sheet->setCellValue('B' . $row, $processLevel);

        $res = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal != "") {
            $res = $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Resolution');
        $sheet->setCellValue('B' . $row, $res);

        //Spatial Representation Information====================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Spatial Representation Information');

        $colName = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString != "") {
            $colName = $metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Collection Name');
        $sheet->setCellValue('B' . $row, $colName);

        $collId = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString != "") {
            $collId = $metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Collection Identification');
        $sheet->setCellValue('B' . $row, $collId);

        //Content Information====================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Content Information');

        $bandBound = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString != "") {
            $bandBound = $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Band Boundry');
        $sheet->setCellValue('B' . $row, $bandBound);

        $transFnType = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString != "") {
            $transFnType = $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Transfer Function Type');
        $sheet->setCellValue('B' . $row, $transFnType);

        $transmitPolar = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString != "") {
            $transmitPolar = $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Transmitted Polarization');
        $sheet->setCellValue('B' . $row, $transmitPolar);

        $nomSpatRes = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString != "") {
            $nomSpatRes = $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Nominal Spatial Resolution');
        $sheet->setCellValue('B' . $row, $nomSpatRes);

        $detectPolar = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString != "") {
            $detectPolar = $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Detected Polarization');
        $sheet->setCellValue('B' . $row, $detectPolar);

        //ACQUISITION INFORMATION====================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'ACQUISITION INFORMATION');

        $avgAirTemp = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString != "") {
            $avgAirTemp = $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Average Air Temperature');
        $sheet->setCellValue('B' . $row, $avgAirTemp);

        $alt = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString != "") {
            $alt = $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Altitude');
        $sheet->setCellValue('B' . $row, $alt);

        $relHumid = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString != "") {
            $relHumid = $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Relative Humidity');
        $sheet->setCellValue('B' . $row, $relHumid);

        $metCond = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString != "") {
            $metCond = $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Meteorological Condition');
        $sheet->setCellValue('B' . $row, $metCond);

        $eventId = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString != "") {
            $eventId = $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Identifier');
        $sheet->setCellValue('B' . $row, $eventId);

        $trigger = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString != "") {
            $trigger = $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Trigger');
        $sheet->setCellValue('B' . $row, $trigger);

        $context = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString != "") {
            $context = $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Context');
        $sheet->setCellValue('B' . $row, $context);

        $sequence = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString != "") {
            $sequence = $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Sequence');
        $sheet->setCellValue('B' . $row, $sequence);

        $time = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString != "") {
            $time = $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Time');
        $sheet->setCellValue('B' . $row, $time);

        $instruIdType = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString != "") {
            $instruIdType = $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Type');
        $sheet->setCellValue('B' . $row, $instruIdType);

        $opId = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString != "") {
            $opId = $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Identifier');
        $sheet->setCellValue('B' . $row, $opId);

        $opStatus = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString != "") {
            $opStatus = $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Status');
        $sheet->setCellValue('B' . $row, $opStatus);

        $opType = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString != "") {
            $opType = $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Type');
        $sheet->setCellValue('B' . $row, $opType);

        $rdrDate = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date != "") {
            $rdrDate = $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $rdrDate);

        $lad = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date != "") {
            $lad = $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Last Acceptable Date');
        $sheet->setCellValue('B' . $row, $lad);

        //Spatial Domain========================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Spatial Domain');

        $westBoundLongitude = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)) {
            $westBoundLongitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)) {
            $westBoundLongitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'West');
        $sheet->setCellValue('B' . $row, $westBoundLongitude);

        $eastBoundLongitude = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)) {
            $eastBoundLongitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)) {
            $eastBoundLongitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'East');
        $sheet->setCellValue('B' . $row, $eastBoundLongitude);

        $southBoundLatitude = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)) {
            $southBoundLatitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)) {
            $southBoundLatitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'South');
        $sheet->setCellValue('B' . $row, $southBoundLatitude);

        $northBoundLatitude = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)) {
            $northBoundLatitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)) {
            $northBoundLatitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'North');
        $sheet->setCellValue('B' . $row, $northBoundLatitude);

        //Browsing Information==================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Browsing Information');

        $fileName = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString != "") {
            $fileName = $metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'File Name');
        $sheet->setCellValue('B' . $row, $fileName);

        $fileType = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString != "") {
            $fileType = $metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'File Type');
        $sheet->setCellValue('B' . $row, $fileType);

        $url = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString != "") {
            $url = $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'File URL');
        $sheet->setCellValue('B' . $row, $url);

        $keywords = "";
        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)) {
            foreach ($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword) {
                if (trim($keyword->CharacterString) != "") {
                    $keywords .= $keyword->CharacterString . ', ';
                }
            }
        } elseif (isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords)) {
            foreach ($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword) {
                if (trim($keyword->CharacterString) != "") {
                    $keywords .= $keyword->CharacterString . ', ';
                }
            }
        }
        $keywords = rtrim($keywords, ',');
        $row++;
        $sheet->setCellValue('A' . $row, 'Keywords');
        $sheet->setCellValue('B' . $row, $keywords);

        //Distribution Information==============================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Distribution Information');

        $distFormat = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString != "") {
            $distFormat = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Format Name');
        $sheet->setCellValue('B' . $row, $distFormat);

        $version = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString != "") {
            $version = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Format Version');
        $sheet->setCellValue('B' . $row, $version);

        $dist = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
            $dist = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Organisation Name');
        $sheet->setCellValue('B' . $row, $dist);

        $dist = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
            $dist = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Units of Distribution');
        $sheet->setCellValue('B' . $row, $dist);

        $size = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real != "") {
            $size = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Size (Megabytes)');
        $sheet->setCellValue('B' . $row, $size);

        $link = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL != "") {
            $link = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->connectPoint->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->connectPoint->CI_OnlineResource->linkage->URL != "") {
            $link = $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->connectPoint->CI_OnlineResource->linkage->URL;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Link');
        $sheet->setCellValue('B' . $row, $link);

        $medium = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name->MD_MediumNameCode) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name->MD_MediumNameCode != "") {
            $medium = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name->MD_MediumNameCode;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Medium Name');
        $sheet->setCellValue('B' . $row, $medium);

        $fees = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees->CharacterString != "") {
            $fees = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Fees');
        $sheet->setCellValue('B' . $row, $fees);

        $orderInstruct = "";
        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) && trim($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) != "") {
            $orderInstruct = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Ordering Instructions');
        $sheet->setCellValue('B' . $row, $orderInstruct);

        //Data Set Identification===============================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Data Set Identification');

        $dataSetType = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode) && $metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode != "") {
            $dataSetType = trim($metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode);
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode != "") {
            $dataSetType = trim($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Spatial Data Set Type');
        $sheet->setCellValue('B' . $row, $dataSetType);

        $scale = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer) && $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer != "") {
            $scale = $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scale in Hardcopy/Softcopy');
        $sheet->setCellValue('B' . $row, $scale);

        $imgRes = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance) && $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance != "") {
            $imgRes = $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Image Resolution (GSD)');
        $sheet->setCellValue('B' . $row, $imgRes);

        $lang = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString != "") {
            $lang = trim($metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString);
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->language->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->language->CharacterString != "") {
            $lang = trim($metadataxml->identificationInfo->SV_ServiceIdentification->language->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Language');
        $sheet->setCellValue('B' . $row, $lang);

        $maintenanceUpdate = "";
        if (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode != "") {
            $maintenanceUpdate = trim($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode);
        } elseif (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode != "") {
            $maintenanceUpdate = trim($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Maintenance and Update');
        $sheet->setCellValue('B' . $row, $maintenanceUpdate);

        //Reference System Information==========================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Reference System Information');

        if (isset($metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString != "") {
            $refSysId = $metadataxml->referenceSystemInfo->MD_ReferenceSystem->referenceSystemIdentifier->RS_Identifier->codeSpace->CharacterString;
            if (is_numeric($refSysId)) {
                $refSysSelected = ReferenceSystemIdentifier::where('id', $refSysId)->get()->first();
            } else {
                $refSysSelected = ReferenceSystemIdentifier::where('name', $refSysId)->get()->first();
            }
        } else {
            $refSysSelected = [];
        }
        if ($refSysSelected) {
            $row++;
            $sheet->setCellValue('A' . $row, 'Reference System Identifier');
            $sheet->setCellValue('B' . $row, $refSysSelected->name);
            $row++;
            $sheet->setCellValue('A' . $row, 'Projection');
            $sheet->setCellValue('B' . $row, $refSysSelected->projection);
            $row++;
            $sheet->setCellValue('A' . $row, 'Semi Major Axis');
            $sheet->setCellValue('B' . $row, $refSysSelected->semi_major_axis);
            $row++;
            $sheet->setCellValue('A' . $row, 'Ellipsoid');
            $sheet->setCellValue('B' . $row, $refSysSelected->ellipsoid);
            $row++;
            $sheet->setCellValue('A' . $row, 'Axis Units');
            $sheet->setCellValue('B' . $row, $refSysSelected->axis_units);
            $row++;
            $sheet->setCellValue('A' . $row, 'Datum');
            $sheet->setCellValue('B' . $row, $refSysSelected->datum);
            $row++;
            $sheet->setCellValue('A' . $row, 'Denominator of Flattening Ratio');
            $sheet->setCellValue('B' . $row, $refSysSelected->denominator_flattening_ratio);
        }

        //Constraints==========================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Constraints');

        $useLimitation = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
            $useLimitation = trim($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString);
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
            $useLimitation = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Use Limitation');
        $sheet->setCellValue('B' . $row, $useLimitation);

        $accessConst = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode != "") {
            $accessConst = trim($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode);
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode != "") {
            $accessConst = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Access Constraints');
        $sheet->setCellValue('B' . $row, $accessConst);

        $useConst = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode != "") {
            $useConst = trim($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode);
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode != "") {
            $useConst = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Use Constraints');
        $sheet->setCellValue('B' . $row, $useConst);

        $classSys = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode != "") {
            $classSys = trim($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode);
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode != "") {
            $classSys = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Classification');
        $sheet->setCellValue('B' . $row, $classSys);

        $ref = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
            $ref = $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
        } elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
            $ref = $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Reference');
        $sheet->setCellValue('B' . $row, $ref);

        //Data Quality==========================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Data Quality');

        $dqScope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode) && $metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode != "") {
            $dqScope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'DQ Scope');
        $sheet->setCellValue('B' . $row, $dqScope);

        $dataHist = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString != "") {
            $dataHist = $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Data History');
        $sheet->setCellValue('B' . $row, $dataHist);

        $dqDate = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date != "") {
            $dqDate = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $dqDate);

        $row++;
        $sheet->setCellValue('A' . $row, 'Completeness Commission'); //===========

        $t1Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString != "") {
            $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t1Scope);

        $compLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString != "") {
            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $compLvl);

        $t1Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
            $t1Date = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t1Date);

        $t1Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t1Res);

        $conformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $conformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Completeness Omission'); //=============

        $t1Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString != "") {
            $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t1Scope);

        $compLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString != "") {
            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $compLvl);

        $t1Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
            $t1Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t1Date);

        $t1Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t1Res);

        $conformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $conformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Conceptual Consistency'); //============

        $t2Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString != "") {
            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t2Scope);

        $compLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString != "") {
            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $compLvl);

        $t2Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t2Date);

        $t2Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t2Res);

        $t2ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t2ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Domain Consistency'); //================

        $t2Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString != "") {
            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t2Scope);

        $compLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString != "") {
            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $compLvl);

        $t2Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t2Date);

        $t2Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t2Res);

        $t2ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t2ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Format Consistency'); //================

        $t2Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString != "") {
            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t2Scope);

        $compLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $compLvl);

        $t2Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t2Date);

        $t2Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t2Res);

        $t2ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t2ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Topological Consistency'); //===========

        $t2Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString != "") {
            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t2Scope);

        $compLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $compLvl);

        $t2Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t2Date);

        $t2Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t2Res);

        $t2ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t2ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Absolute or External Accuracy'); //=====

        $t3Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString != "") {
            $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t3Scope);

        $t3CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString != "") {
            $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t3CompLvl);

        $t3Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
            $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t3Date);

        $t3Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t3Res);

        $t3ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t3ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Relative or Internal Accuracy'); //=====

        $t3Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString != "") {
            $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t3Scope);

        $t3CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString != "") {
            $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t3CompLvl);

        $t3Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
            $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t3Date);

        $t3Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t3Res);

        $t3ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t3ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Gridded Data Positional Accuracy'); //==

        $t3Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString != "") {
            $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t3Scope);

        $t3CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
            $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t3CompLvl);

        $t3Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
            $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t3Date);

        $t3Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t3Res);

        $t3ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t3ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Accuracy of A Time Measurement'); //====

        $t4Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString != "") {
            $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t4Scope);

        $t4CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString != "") {
            $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t4CompLvl);

        $t4Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
            $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t4Date);

        $t4Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t4Res);

        $t4ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t4ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Temporal Consistency'); //==============

        $t4Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString != "") {
            $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t4Scope);

        $t4CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
            $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t4CompLvl);

        $t4Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
            $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t4Date);

        $t4Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t4Res);

        $t4ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t4ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Temporal Validity'); //=================

        $t4Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString != "") {
            $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t4Scope);

        $t4CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString != "") {
            $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t4CompLvl);

        $t4Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date != "") {
            $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t4Date);

        $t4Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t4Res);

        $t4ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t4ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Classification Correctness'); //========

        $t5Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString != "") {
            $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t5Scope);

        $t5CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString != "") {
            $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t5CompLvl);

        $t5Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date != "") {
            $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t5Date);

        $t5Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t5Res);

        $t5ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t5ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Non-Quantitative Attribute Correctness'); //========

        $t5Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString != "") {
            $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t5Scope);

        $t5CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString != "") {
            $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Compliance Level');
        $sheet->setCellValue('B' . $row, $t5CompLvl);

        $t5Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date != "") {
            $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t5Date);

        $t5Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t5Res);

        $t5ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t5ConformRes);

        $row++;
        $sheet->setCellValue('A' . $row, 'Quantitative Attribute Correctness'); //========

        $t5Scope = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString != "") {
            $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Scope');
        $sheet->setCellValue('B' . $row, $t5Scope);

        $t5CompLvl = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString != "") {
            $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conpliance Level');
        $sheet->setCellValue('B' . $row, $t5CompLvl);

        $t5Date = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date != "") {
            $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Date');
        $sheet->setCellValue('B' . $row, $t5Date);

        $t5Res = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
            $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Result');
        $sheet->setCellValue('B' . $row, $t5Res);

        $t5ConformRes = "";
        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
            $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
        }
        $row++;
        $sheet->setCellValue('A' . $row, 'Conformance Result');
        $sheet->setCellValue('B' . $row, $t5ConformRes);

        //Additional Elements===================================================
        $row += 2;
        $sheet->setCellValue('A' . $row, 'Additional Elements');

        $category = MCategory::where('name', $category)->get()->first();
        $customMetadataInput = CustomMetadataInput::where('kategori', $category->id)->get();
        $custom_inputs = "";
        foreach ($customMetadataInput as $cmi) {
            $row++;
            $sheet->setCellValue('A' . $row, $cmi->name);
            if (count($metadataxml->customInput) > 0) {
                foreach ($metadataxml->customInput as $ci) {
                    if (!empty($ci->{$cmi->input_name})) {
                        $val = $ci->{$cmi->input_name}->CharacterString;
                        $sheet->setCellValue('B' . $row, $val);
                        break;
                    }
                }
            }
        }

        // (E) OUTPUT
        $writer = new Xlsx($spreadsheet);

        // (E2) OR FORCE DOWNLOAD
        $name = ($metadataSearched->title != "" ? $metadataSearched->title : "Metadata");
        $metadataName = preg_replace("/\s+/", "", trim(ucwords($name)));

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $metadataName . '.xlsx"');
        header('Cache-Control: max-age=0');
        header('Expires: Fri, 11 Nov 2011 11:11:11 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        $writer->save('php://output');
    }

    public function messages() {
        return [
            'c2_metadataName.required' => 'ftest1test1',
            'c2_metadataName.required' => 'ftest2test2',
        ];
    }

    public function validateMetadataName(Request $request) {
        $lowered = strtolower($request->metadataName);
        $lowered = $request->metadataName;
        $metadatas = MetadataGeo::on('pgsql2')->where('data', 'LIKE', '%>' . $lowered . '<%')->get()->first();
        if (empty($metadatas)) {
            return "not found";
        } else {
            return "found";
        }
        exit();
    }

    public function muat_naik_contohJenisMetadata($request) {
        $file_contohJenisMetadata = "";
        if (file_exists($_FILES['file_contohJenisMetadata']['tmp_name'])) {
            //store uploaded contoh jenis metadata file
            $fileName = time() . '_' . $request->file_contohJenisMetadata->getClientOriginalName();
            Storage::putFileAs('public', $request->file('file_contohJenisMetadata'), $fileName);

            $file_contohJenisMetadata = $fileName;

            //read stored contoh jenis metadata file
//            $uploaded_xml = Storage::disk('public')->get($fileName);
            //delete uploaded contoh jenis metadata file
//            Storage::disk('public')->delete($fileName);
        }

        return $file_contohJenisMetadata;
    }

    public function download_file_contohjenismetadata($id) {
        $metadata = MetadataGeo::where('id', $id)->get()->first();
        if ($metadata->file_contohjenismetadata != "") {
            return Storage::download('public/' . $metadata->file_contohjenismetadata);
        }
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

        if (strtolower($request->kategori) == 'dataset' && strtolower($request->c1_content_info) == 'application') {
            $fields["c10_file_url"] = 'required';
        }
        if (trim($request->c10_file_url) != '') {
            $fields["c10_file_name"] = 'required';
            $fields["c10_file_type"] = 'required';
        }
        if (trim($request->c10_file_name) != '') {
            $fields["c10_file_url"] = 'required';
            $fields["c10_file_type"] = 'required';
        }
        if (trim($request->c10_file_type) != '') {
            $fields["c10_file_url"] = 'required';
            $fields["c10_file_name"] = 'required';
        }
        if (strtolower($request->kategori) == 'services') {
            $fields["c2_serviceUrl"] = 'required';
        }
        if (strtolower($request->kategori) == 'dataset') {
            $fields["topic_category"] = 'required';
        }
        if (strtolower($request->kategori) == 'imagery' || strtolower($request->kategori) == 'gridded') {
            $fields["c4_scan_res"] = 'required';
            $fields["c4_ground_scan"] = 'required';
            $fields["c6_collection_name"] = 'required';
            $fields["c6_collection_id"] = 'required';
            $fields["c8_identifier"] = 'required';
            $fields["c8_type"] = 'required';
            $fields["c8_op_identifier"] = 'required';
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
            "topic_category.required" => 'Topic Category required',
            "c10_file_url.required" => 'URL required',
            "c10_file_name.required" => 'File Name required',
            "c10_file_type.required" => 'File Type required',
            "c2_serviceUrl.required" => 'Service URL required',
        ];

        $elemenMetadatacol = [];
        $elemenMetadata = ElemenMetadata::where('status', '0')->get(); //get disabled inputs and remove their validation
        if (count($elemenMetadata) > 0) {
            foreach ($elemenMetadata as $em) {
                $elemenMetadatacol[] = $em->input_name;
            }
            foreach ($fields as $key => $val) {
                if (in_array($key, $elemenMetadatacol)) {
                    unset($fields[$key]); //remove them validations
                }
            }
        }
        $cat = MCategory::where('name', $request->kategori)->get()->first();
        $customMetadataInput = CustomMetadataInput::where('kategori', $cat->id)->get();
        $custom_inputs = "";
        if (count($customMetadataInput) > 0) {
            foreach ($customMetadataInput as $cmi) {
                if ($cmi->mandatory == "Yes") {
                    $fields[$cmi->input_name] = 'required';
                    $customMsg[$cmi->input_name . '.required'] = $cmi->name . " required";
                }
                if (isset($request->{$cmi->input_name})) { //dont remove white space below
                    $custom_inputs .= '
            <customInput>        
                <' . $cmi->input_name . '>

                    <CharacterString>' . $request->{$cmi->input_name} . '</CharacterString>
                </' . $cmi->input_name . '>
            </customInput>';
                }
            }
        }

        $this->validate($request, $fields, $customMsg);

        $keywords = "";
        if (count($request->c10_additional_keyword) > 0) {
            foreach ($request->c10_additional_keyword as $var) {
                $keywords .= '
                    <keyword>
                        <gco:CharacterString>' . $var . '</gco:CharacterString>
                    </keyword>
                ';
            }
        } else {
            $keywords .= '
                <keyword>
                    <gco:CharacterString></gco:CharacterString>
                </keyword>
            ';
        }
        $topicCategories = "";
        if (isset($request->topic_category) && count($request->topic_category) > 0) {
            foreach ($request->topic_category as $var) {
                $topicCategories .= '
                    <topicCategory>
                        <MD_TopicCategoryCode>' . $var . '</MD_TopicCategoryCode>
                    </topicCategory>
                ';
            }
        } else {
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
        $xml = $xmlcon->createXml($request, $fileUrl, $keywords, $topicCategories, trim($custom_inputs));

        $msg = "";

        DB::connection('pgsql2')->transaction(function () use ($request, $xml, &$msg) {
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
            $mg->title = $request->c2_metadataName;

            if (strtolower($request->kategori) != 'services') {
                $mg->file_contohjenismetadata = $this->muat_naik_contohJenisMetadata($request);
            }

            $msg = "";
            if (isset($request->btn_save) || (isset($request->submitAction) && $request->submitAction == "save")) {
                $mg->is_draf = "no";

                if ($request->c2_contact_email != "") {
                    //send email to pengesah metadata
                    $user = User::where('email', $request->c2_contact_email)->get()->first();
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title' => $request->c2_metadataName, 'namaPenerbit' => Auth::user()->name);
                    Mail::send('mails.exmpl10', $data, function ($message) use ($to_name, $to_email, $request) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pengesahan Metadata: ' . $request->c2_metadataName);
                        $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
                    });
                }

                $msg = "Metadata berjaya dihantar.";
            } elseif (isset($request->btn_draf) || (isset($request->submitAction) && $request->submitAction == "draf")) {
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

        return redirect('mygeo_senarai_metadata')->with('message', $msg);
    }

    public function store_xml(Request $request) {
        $newMetadataId = '';
        if (file_exists($_FILES['file_xml']['tmp_name'])) {
            //store uploaded xml
            $fileName = time() . '_' . $request->file_xml->getClientOriginalName();
            Storage::putFileAs('public', $request->file('file_xml'), $fileName); //don't forget to set permissions at the public folder
            //read stored xml
            $uploaded_xml = Storage::disk('public')->get($fileName);
            $uploaded_xml = str_replace("gco:", "", $uploaded_xml);
            $uploaded_xml = str_replace("gmd:", "", $uploaded_xml);
            $uploaded_xml = str_replace("srv:", "", $uploaded_xml);
            $uploaded_xml = str_replace("&#13;", "", $uploaded_xml);
            $uploaded_xml = str_replace("\r", "", $uploaded_xml);
            $uploaded_xml = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $uploaded_xml);

            $uploaded_xml = simplexml_load_string($uploaded_xml);
            if (false === $uploaded_xml) {
                //            continue;
            }

//            $xmlObject = simplexml_load_string($uploaded_xml);
//            $json = json_encode($xmlObject);
//            $xml_array = json_decode($json, true);
            //save in geonetwork
            DB::connection('pgsql2')->transaction(function () use ($request, $uploaded_xml, &$newMetadataId) {
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
                $mg->is_draf = "yes";
                $mg->portal_user_id = Auth::user()->id;
                $mg->save();

                $newMetadataId = $mg->id;
            });

            //delete uploaded xml
            Storage::disk('public')->delete($fileName);
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('kemaskini_metadata/' . $newMetadataId)->with('success', 'Metadata Saved');
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
        if ($request->c2_saveAsNew == 'yes') {
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

        if (strtolower($request->kategori) == 'dataset' && strtolower($request->c1_content_info) == 'application') {
            $fields["c10_file_url"] = 'required';
        }
        if (trim($request->c10_file_url) != '') {
            $fields["c10_file_name"] = 'required';
            $fields["c10_file_type"] = 'required';
        }
        if (trim($request->c10_file_name) != '') {
            $fields["c10_file_url"] = 'required';
            $fields["c10_file_type"] = 'required';
        }
        if (trim($request->c10_file_type) != '') {
            $fields["c10_file_url"] = 'required';
            $fields["c10_file_name"] = 'required';
        }
        if (strtolower($request->kategori) == 'services') {
            $fields["c2_serviceUrl"] = 'required';
        }
        if (strtolower($request->kategori) == 'dataset') {
            $fields["topic_category"] = 'required';
        }
        if (strtolower($request->kategori) == 'imagery' || strtolower($request->kategori) == 'gridded') {
            $fields["c4_scan_res"] = 'required';
            $fields["c4_ground_scan"] = 'required';
            $fields["c6_collection_name"] = 'required';
            $fields["c6_collection_id"] = 'required';
            $fields["c8_identifier"] = 'required';
            $fields["c8_type"] = 'required';
            $fields["c8_op_identifier"] = 'required';
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
            "topic_category.required" => 'Topic Category required',
            "c10_file_url.required" => 'URL required',
            "c10_file_name.required" => 'File Name required',
            "c10_file_type.required" => 'File Type required',
            "c2_serviceUrl.required" => 'Service URL required',
        ];

        $elemenMetadatacol = [];
        $elemenMetadata = ElemenMetadata::where('status', '0')->get(); //get disabled inputs and remove their validation
        if (count($elemenMetadata) > 0) {
            foreach ($elemenMetadata as $em) {
                $elemenMetadatacol[] = $em->input_name;
            }
            foreach ($fields as $key => $val) {
                if (in_array($key, $elemenMetadatacol)) {
                    unset($fields[$key]); //remove them validations
                }
            }
        }

        $cat = MCategory::where('name', $request->kategori)->get()->first();
        $customMetadataInput = CustomMetadataInput::where('kategori', $cat->id)->get();
        $custom_inputs = "";
        if (count($customMetadataInput) > 0) {
            foreach ($customMetadataInput as $cmi) {
                if ($cmi->mandatory == "Yes") {
                    $fields[$cmi->input_name] = 'required';
                    $customMsg[$cmi->input_name . '.required'] = $cmi->name . " required";
                }
                if (isset($request->{$cmi->input_name})) { //dont remove white space below
                    $custom_inputs .= '
            <customInput>        
                <' . $cmi->input_name . '>

                    <CharacterString>' . $request->{$cmi->input_name} . '</CharacterString>
                </' . $cmi->input_name . '>
            </customInput>';
                }
            }
        }

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
        if (count($request->c10_additional_keyword) > 0) {
            foreach ($request->c10_additional_keyword as $var) {
                $keywords .= '
                    <keyword>
                        <gco:CharacterString>' . $var . '</gco:CharacterString>
                    </keyword>
                ';
            }
        } else {
            $keywords .= '
                <keyword>
                    <gco:CharacterString></gco:CharacterString>
                </keyword>
            ';
        }
        $topicCategories = "";
        if (isset($request->topic_category) && count($request->topic_category) > 0) {
            foreach ($request->topic_category as $var) {
                $topicCategories .= '
                    <topicCategory>
                        <MD_TopicCategoryCode>' . $var . '</MD_TopicCategoryCode>
                    </topicCategory>
                ';
            }
        } else {
            $topicCategories .= '
                <topicCategory>
                    <MD_TopicCategoryCode></MD_TopicCategoryCode>
                </topicCategory>
            ';
        }

        $xmlcon = new XmlController;
        $xml = $xmlcon->createXml($request, $fileUrl, $keywords, $topicCategories, trim($custom_inputs));

        $msg = $redirect = "";

        DB::connection('pgsql2')->transaction(function () use ($request, $xml, &$msg) {
            $mg = MetadataGeo::on('pgsql2')->where('id', $request->metadata_id)->get()->first();
            $mg->timestamps = false;
            $mg->data = $xml;
            $mg->changedate = date("Y-m-d H:i:s");
            $mg->title = $request->c2_metadataName;

            if (strtolower($request->kategori) != 'services') {
                if (file_exists($_FILES['file_contohJenisMetadata']['tmp_name'])) {
                    Storage::disk('public')->delete($mg->file_contohjenismetadata);
                    $mg->file_contohjenismetadata = $this->muat_naik_contohJenisMetadata($request);
                }
            }

            if (auth::user()->hasRole(['Pengesah Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
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
            } elseif (auth::user()->hasRole(['Penerbit Metadata', 'Super Admin'])) {
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

            if (isset($request->newStatus)) {
                $mg->disahkan = $request->newStatus;
            }



            if (isset($request->btn_save) || (isset($request->submitAction) && $request->submitAction == "save")) {
                $mg->is_draf = "no";

                if ($request->c2_contact_email != "") {
                    //send email to pengesah metadata
                    $user = User::where('email', $request->c2_contact_email)->get()->first();
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title' => $request->c2_metadataName, 'namaPenerbit' => Auth::user()->name);
                    Mail::send('mails.exmpl10', $data, function ($message) use ($to_name, $to_email, $request) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pengesahan Metadata: ' . $request->c2_metadataName);
                        $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
                    });
                }

                $msg = "Metadata berjaya dihantar.";
            }



            $msg = "";
            if ($request->submitAction == "save") {
                $mg->is_draf = "no";
                if (auth::user()->hasRole(['Pengesah Metadata'])) {
                    $mg->disahkan = "no";
                    $msg = "Catatan berjaya disimpan.";
                } elseif (auth::user()->hasRole(['Penerbit Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
                    $mg->disahkan = '0';
                    $msg = "Metadata berjaya dihantar.";

                    if ($request->c2_contact_email != "") {
                        //send email to pengesah metadata
                        $user = User::where('email', $request->c2_contact_email)->get()->first();
                        $to_name = $user->name;
                        $to_email = $user->email;
                        $data = array('title' => $request->c2_metadataName, 'namaPenerbit' => Auth::user()->name);
                        Mail::send('mails.exmpl10', $data, function ($message) use ($to_name, $to_email, $request) {
                            $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pengesahan Metadata: ' . $request->c2_metadataName);
                            $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
                        });
                    }
                }
            } elseif ($request->submitAction == "draf") {
                $mg->is_draf = "yes";
                $msg = "Metadata disimpan sebagai draf.";
            }
            $mg->update();

            if ($request->submitAction == "terbit" && auth::user()->hasRole(['Pengesah Metadata'])) {
                //sahkan
                $metadata = MetadataGeo::on('pgsql2')->find($mg->id);
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
                $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
                $ftestxml2 = str_replace("\r", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

                $metadataxml = simplexml_load_string($ftestxml2);
                if (false === $metadataxml) {
                    //            continue;
                }

                $metadataName = $metadata->title;

                $abstract = "";
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != "") {
                    $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
                }

                $user = User::where("id", $metadata->portal_user_id)->get()->first();
                if (!empty($user)) {
                    //send email to penerbit
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title' => $metadataName);
                    Mail::send('mails.exmpl8', $data, function ($message) use ($to_name, $to_email, $metadataName) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : ' . $metadataName);
                        $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
                    });
                }

                //create new pengumuman about the new metadata
                $pengumuman = new Pengumuman();
                $pengumuman->title = $metadataName;
                $pengumuman->date = date('Y-m-d H:i:s', time());
                $pengumuman->kategori = 'Metadata Baharu';
                $pengumuman->content = 'Abstract: ' . $abstract;
                $pengumuman->gambar = "banner2.jpeg";
                $pengumuman->save();

                $msg = "Metadata berjaya diterbitkan.";
            }
        });

        if (auth::user()->hasRole(['Pengesah Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
            $redirect = "mygeo_pengesahan_metadata";
        } elseif (auth::user()->hasRole(['Penerbit Metadata', 'Super Admin'])) {
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
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
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
                $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
                $ftestxml2 = str_replace("\r", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

                $metadataxml = simplexml_load_string($ftestxml2);
                if (false === $metadataxml) {
                    continue;
                }

                $metadataName = $metadata->title;

                $abstract = "";
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != "") {
                    $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
                }

                //create new pengumuman about the new metadata
                $pengumuman = new Pengumuman();
                $pengumuman->title = $metadataName;
                $pengumuman->date = date('Y-m-d H:i:s', time());
                $pengumuman->kategori = 'Metadata Baharu';
                $pengumuman->content = 'Abstract: ' . $abstract;
                $pengumuman->gambar = "banner2.jpeg";
                $pengumuman->save();

                $user = User::where("id", $metadata->portal_user_id)->get()->first();
                if (!empty($user)) {
                    //send email to penerbit
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title' => $metadataName);
                    Mail::send('mails.exmpl8', $data, function ($message) use ($to_name, $to_email, $metadataName) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : ' . $metadataName);
                        $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
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
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $metadataxml = simplexml_load_string($ftestxml2);
            if (false === $metadataxml) {
                //            continue;
            }

            $metadataName = $metadata->title;
            $abstract = "";
            if (isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != "") {
                $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
            }

            $user = User::where("id", $metadata->portal_user_id)->get()->first();
            if (!empty($user)) {
                //send email to penerbit
                $to_name = $user->name;
                $to_email = $user->email;
                $data = array('title' => $metadataName);
                Mail::send('mails.exmpl8', $data, function ($message) use ($to_name, $to_email, $metadataName) {
                    $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : ' . $metadataName);
                    $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
                });
            }

            //create new pengumuman about the new metadata
            $pengumuman = new Pengumuman();
            $pengumuman->title = $metadataName;
            $pengumuman->date = date('Y-m-d H:i:s', time());
            $pengumuman->kategori = 'Metadata Baharu';
            $pengumuman->content = 'Abstract: ' . $abstract;
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
        if (!auth::user()->hasRole(['Pengesah Metadata', 'Super Admin', 'Pentadbir Aplikasi'])) {
            exit();
        }

        if (is_array($_POST['metadata_id'])) {
            foreach ($_POST['metadata_id'] as $mid) {
                $metadata = MetadataGeo::on('pgsql2')->find($mid);
                $metadata->timestamps = false;
                $metadata->disahkan = 'no';
                $metadata->changedate = date("Y-m-d H:i:s");
                $metadata->update();

                $metadataName = $metadata->title;

                $user = User::where("id", $metadata->portal_user_id)->get()->first();
                if (!empty($user)) {
                    //send email to penerbit
                    $to_name = $user->name;
                    $to_email = $user->email;
                    $data = array('title' => $metadataName);
                    Mail::send('mails.exmpl8', $data, function ($message) use ($to_name, $to_email, $metadataName) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Penerbitan Metadata : ' . $metadataName);
                        $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
                    });
                }
            }
        } else {
            $metadata = MetadataGeo::on('pgsql2')->find($_POST['metadata_id']);
            $metadata->timestamps = false;
            $metadata->disahkan = 'no';
            $metadata->changedate = date("Y-m-d H:i:s");
            $metadata->update();

            $metadataName = $metadata->title;

            $user = User::where("id", $metadata->portal_user_id)->get()->first();
            if (!empty($user)) {
                //send email to penerbit
                $to_name = $user->name;
                $to_email = $user->email;
                $data = array('title' => $metadataName);
                Mail::send('mails.exmpl9', $data, function ($message) use ($to_name, $to_email, $metadataName) {
                    $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pindaan Metadata : ' . $metadataName);
                    $message->from('mail@mygeo-explorer.gov.my', 'mail@mygeo-explorer.gov.my');
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
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }
        $input = [
            "dataset" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "inactive",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "inactive",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "inactive",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "inactive",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "inactive",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "inactive",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "inactive",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "inactive",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "inactive",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "inactive",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "inactive",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "inactive",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "inactive",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "inactive",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "inactive",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
            "services" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "inactive",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "inactive",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "inactive",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "inactive",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "inactive",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "inactive",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "inactive",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "inactive",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "inactive",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "inactive",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "inactive",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "inactive",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "inactive",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "inactive",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "inactive",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
            "imagery" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "active",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "active",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "active",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "active",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "active",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "active",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "active",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "active",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "active",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "active",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "active",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "active",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "active",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
            "gridded" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "active",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "active",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "active",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "active",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "active",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "active",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "active",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "active",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "active",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "active",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "active",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "active",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "active",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
        ];
        $position = [ //SMBG SINI - try to combine $position and $input above to be used for both input detail and input position at the same time
            "dataset" => [
                "collapse1" => [
                    "c1_content_info",
                    "publisher_name",
                    "publisher_agensi_organisasi",
                    "publisher_email",
                    "publisher_phone",
                    "publisher_role",
                ],
                "collapse2" => [
                    "c2_metadataName",
                    "c2_product_type",
                    "abstractApplication_namaAplikasi",
                    "abstractApplication_tujuan",
                    "abstractApplication_tahunPembangunan",
                    "abstractApplication_kemaskini",
                    "abstractApplication_dataTerlibat",
                    "abstractApplication_sasaranPengguna",
                    "abstractApplication_versi",
                    "abstractApplication_perisianDigunaPembangunan",
                    "abstractDocument_namaDokumen",
                    "abstractDocument_tujuan",
                    "abstractDocument_tahunTerbitan",
                    "abstractDocument_edisi",
                    "abstractGISActivityProject_namaAktiviti",
                    "abstractGISActivityProject_tujuan",
                    "abstractGISActivityProject_lokasi",
                    "abstractGISActivityProject_tahun",
                    "abstractMap_namaPeta",
                    "abstractMap_kawasan",
                    "abstractMap_tujuan",
                    "abstractMap_tahunTerbitan",
                    "abstractMap_edisi",
                    "abstractMap_noSiri",
                    "abstractMap_skala",
                    "abstractMap_unit",
                    "abstractRasterData_namaData",
                    "abstractRasterData_lokasi",
                    "abstractRasterData_rumusanData",
                    "abstractRasterData_tujuanData",
                    "abstractRasterData_kaedahPenyediaanData",
                    "abstractRasterData_format",
                    "abstractRasterData_unit",
                    "abstractRasterData_skala",
                    "abstractRasterData_statusData",
                    "abstractRasterData_tahunPerolehan",
                    "abstractRasterData_jenisSatelit",
                    "abstractRasterData_format",
                    "abstractRasterData_resolusi",
                    "abstractRasterData_kawasanLitupan",
                    "abstractServices_namaServis",
                    "abstractServices_lokasi",
                    "abstractServices_tujuan",
                    "abstractServices_dataTerlibat",
                    "abstractServices_polisi",
                    "abstractServices_peringkatCapaian",
                    "abstractServices_format",
                    "abstractSoftware_namaPerisian",
                    "abstractSoftware_versi",
                    "abstractSoftware_tujuan",
                    "abstractSoftware_tahunPengunaanPerisian",
                    "abstractSoftware_kaedahPerolehan",
                    "abstractSoftware_format",
                    "abstractSoftware_pengeluar",
                    "abstractSoftware_keupayaan",
                    "abstractSoftware_dataTerlibat",
                    "abstractSoftware_keperluanPerkakas",
                    "abstractVectorData_namaData",
                    "abstractVectorData_lokasi",
                    "abstractVectorData_rumusanData",
                    "abstractVectorData_tujuanData",
                    "abstractVectorData_kaedahPenyediaanData",
                    "abstractVectorData_format",
                    "abstractVectorData_unit",
                    "abstractVectorData_skala",
                    "abstractVectorData_statusData",
                    "c2_abstract",
                    "c10_file_url",
                    "c2_metadataDate",
                    "c2_metadataDateType",
                    "c2_metadataStatus",
                    "c2_typeOfServices",
                    "c2_operationName",
                    "c2_serviceUrl",
                    "c2_typeOfCouplingDataset",
                    "c2_contact_name",
                    "c2_contact_agensiorganisasi",
                    "c2_contact_bahagian",
                    "c2_position_name",
                    "c2_contact_address1",
                    "c2_contact_address2",
                    "c2_contact_address3",
                    "c2_contact_address4",
                    "c2_postal_code",
                    "c2_contact_city",
                    "c2_contact_state",
                    "c2_contact_country",
                    "c2_contact_email",
                    "c2_contact_fax",
                    "c2_contact_phone_office",
                    "c2_contact_website",
                    "c2_contact_role",
                ],
                "collapse3" => [],
                "collapse4" => [
                    "c4_scan_res",
                    "c4_ground_scan",
                ],
                "collapse5" => [
                    "c5_process_lvl",
                    "c5_resolution",
                ],
                "collapse6" => [
                    "c6_collection_name",
                    "c6_collection_id",
                ],
                "collapse6" => [
                    "c7_band_boundary",
                    "c7_trans_fn_type",
                    "c7_trans_polar",
                    "c7_nominal_spatial_res",
                    "c7_detected_polar",
                ],
                "collapse7" => [
                    "c7_band_boundary",
                    "c7_trans_fn_type",
                    "c7_trans_polar",
                    "c7_nominal_spatial_res",
                    "c7_detected_polar",
                ],
                "collapse8" => [
                    "c8_avg_air_temp",
                    "c8_altitude",
                    "c8_relative_humid",
                    "c8_meteor_cond",
                    "c8_identifier",
                    "c8_trigger",
                    "c8_context",
                    "c8_sequence",
                    "c8_time",
                    "c8_type",
                    "c8_op_identifier",
                    "c8_op_status",
                    "c8_op_type",
                    "c8_rdr_date",
                    "c8_last_accept_date",
                ],
                "collapse9" => [
                    "c9_west_bound_longitude",
                    "c9_east_bound_longitude",
                    "c9_south_bound_latitude",
                    "c9_north_bound_latitude",
                ],
                "collapse10" => [
                    "file_contohJenisMetadata",
                    "c10_file_name",
                    "c10_file_type",
                    "c10_file_url",
                    "c10_keyword",
                    "c10_additional_keyword[]",
                ],
                "collapse11" => [
                    "c11_dist_format",
                    "c11_version",
                    "c11_distributor",
                    "c11_units_of_dist",
                    "c11_size",
                    "c11_link",
                    "c11_fees",
                    "c11_order_instructions",
                    "c11_medium",
                ],
                "collapse12" => [
                    "c12_dataset_type",
                    "c12_feature_scale",
                    "c12_image_res",
                    "c12_language",
                    "c12_maintenanceUpdate",
                ],
                "collapse13" => [
                    "c13_ref_sys_identify",
                    "refsys_projection",
                    "refsys_axis_units",
                    "refsys_semiMajorAxis",
                    "refsys_datum",
                    "refsys_ellipsoid",
                    "refsys_denomFlatRatio",
                ],
                "collapse14" => [
                    "c14_useLimitation",
                    "c14_access_constraint",
                    "c14_use_constraint",
                    "c14_classification_sys",
                    "c14_reference",
                ],
                "collapse15" => [
                    "c15_data_quality_info",
                    "c15_data_history",
                    "c15_date",
                    "tab_completeness",
                    "tab_consistency",
                    "tab_position_accuracy",
                    "tab_temp_accuracy",
                    "tab_thematic_accuracy",
                    "c15_t1_complete_comm_or_omit",
                    "c15_t1_complete_comm_or_omit",
                    "c15_t1_scope",
                    "c15_t1_comply_level",
                    "c15_t1_date",
                    "c15_t1_result",
                    "c15_t1_conform_result",
                    "c15_t1_scope_2",
                    "c15_t1_comply_level_2",
                    "c15_t1_date_2",
                    "c15_t1_result_2",
                    "c15_t1_conform_result_2",
                    "c15_t2_type",
                    "c15_t2_type",
                    "c15_t2_type",
                    "c15_t2_type",
                    "c15_t2_scope",
                    "c15_t2_comply_level",
                    "c15_t2_date",
                    "c15_t2_result",
                    "c15_t2_conform_result",
                    "c15_t2_scope_2",
                    "c15_t2_comply_level_2",
                    "c15_t2_date_2",
                    "c15_t2_result_2",
                    "c15_t2_conform_result_2",
                    "c15_t2_scope_3",
                    "c15_t2_comply_level_3",
                    "c15_t2_date_3",
                    "c15_t2_result_3",
                    "c15_t2_conform_result_3",
                    "c15_t2_scope_4",
                    "c15_t2_comply_level_4",
                    "c15_t2_date_4",
                    "c15_t2_result_4",
                    "c15_t2_conform_result_4",
                    "c15_t3_type",
                    "c15_t3_type",
                    "c15_t3_type",
                    "c15_t3_scope",
                    "c15_t3_comply_level",
                    "c15_t3_date",
                    "c15_t3_result",
                    "c15_t3_conform_result",
                    "c15_t3_scope_2",
                    "c15_t3_comply_level_2",
                    "c15_t3_date_2",
                    "c15_t3_result_2",
                    "c15_t3_conform_result_2",
                    "c15_t3_scope_3",
                    "c15_t3_comply_level_3",
                    "c15_t3_date_3",
                    "c15_t3_result_3",
                    "c15_t3_conform_result_3",
                    "c15_t4_type",
                    "c15_t4_type",
                    "c15_t4_type",
                    "c15_t4_scope",
                    "c15_t4_comply_level",
                    "c15_t4_date",
                    "c15_t4_result",
                    "c15_t4_conform_result",
                    "c15_t4_scope_2",
                    "c15_t4_comply_level_2",
                    "c15_t4_date_2",
                    "c15_t4_result_2",
                    "c15_t4_conform_result_2",
                    "c15_t4_scope_3",
                    "c15_t4_comply_level_3",
                    "c15_t4_result_3",
                    "c15_t4_conform_result_3",
                    "c15_t5_type",
                    "c15_t5_type",
                    "c15_t5_type",
                    "c15_t5_scope",
                    "c15_t5_comply_level",
                    "c15_t5_date",
                    "c15_t5_result",
                    "c15_t5_conform_result",
                    "c15_t5_scope_2",
                    "c15_t5_comply_level_2",
                    "c15_t5_date_2",
                    "c15_t5_result_2",
                    "c15_t5_conform_result_2",
                    "c15_t5_scope_3",
                    "c15_t5_comply_level_3",
                    "c15_t5_date_3",
                    "c15_t5_result_3",
                    "c15_t5_conform_result_3",
                ],
            ],
        ];

//        echo json_encode($input);exit();
//        $elemens = ElemenMetadata::with('getKategori','getTajuk')->orderBy('id', 'ASC')->get();
        $categories = MCategory::get();
//        $customMetadataInput = CustomMetadataInput::get();
        $template = MetadataTemplate::get()->first();
        $refSys = ReferenceSystemIdentifier::all();
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();

        return view('mygeo.kemaskini_elemen_metadata.senarai_elemen', compact('categories', 'template','refSys','states','countries'));
    }
    
    public function simpan_metadata_template(Request $request){
        $input = [
            "dataset" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "inactive",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "inactive",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "inactive",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "inactive",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "inactive",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "inactive",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "inactive",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "inactive",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "inactive",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "inactive",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "inactive",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "inactive",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "inactive",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "inactive",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "inactive",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
            "services" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "inactive",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "inactive",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "inactive",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "inactive",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "inactive",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "inactive",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "inactive",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "inactive",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "inactive",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "inactive",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "inactive",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "inactive",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "inactive",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "inactive",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "inactive",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "inactive",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "inactive",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "inactive",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "inactive",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "inactive",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
            "imagery" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "active",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "active",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "active",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "active",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "active",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "active",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "active",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "active",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "active",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "active",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "active",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "active",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "active",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
            "gridded" => [
                "accordion1" => [
                    "c1_content_info" => [
                        "status" => "active",
                        "label_bm" => "Maklumat Kandungan",
                        "label_en" => "Maklumat Kandungan",
                    ],
                    "publisher_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "publisher_agensi_organisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "publisher_email" => [
                        "status" => "active",
                        "label_bm" => "E-mel",
                        "label_en" => "Name",
                    ],
                    "publisher_phone" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "publisher_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion2" => [
                    "c2_metadataName" => [
                        "status" => "active",
                        "label_bm" => "TAJUK",
                        "label_en" => "Name",
                    ],
                    "c2_product_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Produk/Data/Maklumat Geospatial",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_namaAplikasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Aplikasi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_tahunPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_kemaskini" => [
                        "status" => "active",
                        "label_bm" => "Kemaskini",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_sasaranPengguna" => [
                        "status" => "active",
                        "label_bm" => "Sasaran Pengguna",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractApplication_perisianDigunaPembangunan" => [
                        "status" => "active",
                        "label_bm" => "Perisian Yang Digunakan Dalam Pembangunan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_namaDokumen" => [
                        "status" => "active",
                        "label_bm" => "Nama Dokumen",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractDocument_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_namaAktiviti" => [
                        "status" => "active",
                        "label_bm" => "Nama Aktiviti",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractGISActivityProject_tahun" => [
                        "status" => "active",
                        "label_bm" => "Tahun",
                        "label_en" => "Name",
                    ],
                    "abstractMap_namaPeta" => [
                        "status" => "active",
                        "label_bm" => "Nama Peta",
                        "label_en" => "Name",
                    ],
                    "abstractMap_kawasan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_tahunTerbitan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Terbitan",
                        "label_en" => "Name",
                    ],
                    "abstractMap_edisi" => [
                        "status" => "active",
                        "label_bm" => "Edisi",
                        "label_en" => "Name",
                    ],
                    "abstractMap_noSiri" => [
                        "status" => "active",
                        "label_bm" => "No. Siri",
                        "label_en" => "Name",
                    ],
                    "abstractMap_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractMap_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tahunPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Tahun Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_jenisSatelit" => [
                        "status" => "active",
                        "label_bm" => "Jenis Satelit",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_resolusi" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "Name",
                    ],
                    "abstractRasterData_kawasanLitupan" => [
                        "status" => "active",
                        "label_bm" => "Kawasan Litupan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_namaServis" => [
                        "status" => "active",
                        "label_bm" => "Nama Servis",
                        "label_en" => "Name",
                    ],
                    "abstractServices_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractServices_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlihat",
                        "label_en" => "Name",
                    ],
                    "abstractServices_polisi" => [
                        "status" => "active",
                        "label_bm" => "Polisi",
                        "label_en" => "Name",
                    ],
                    "abstractServices_peringkatCapaian" => [
                        "status" => "active",
                        "label_bm" => "Peringkat Capaian",
                        "label_en" => "Name",
                    ],
                    "abstractServices_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_namaPerisian" => [
                        "status" => "active",
                        "label_bm" => "Nama Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_versi" => [
                        "status" => "active",
                        "label_bm" => "Versi",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tujuan" => [
                        "status" => "active",
                        "label_bm" => "Tujuan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_tahunPengunaanPerisian" => [
                        "status" => "active",
                        "label_bm" => "Tahun Penggunaan Perisian",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_kaedahPerolehan" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Perolehan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_pengeluar" => [
                        "status" => "active",
                        "label_bm" => "Pengeluar",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keupayaan" => [
                        "status" => "active",
                        "label_bm" => "Keupayaan",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_dataTerlibat" => [
                        "status" => "active",
                        "label_bm" => "Data Yang Terlibat",
                        "label_en" => "Name",
                    ],
                    "abstractSoftware_keperluanPerkakas" => [
                        "status" => "active",
                        "label_bm" => "Keperluan Perkakasan",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_namaData" => [
                        "status" => "active",
                        "label_bm" => "Nama Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_lokasi" => [
                        "status" => "active",
                        "label_bm" => "Lokasi",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_rumusanData" => [
                        "status" => "active",
                        "label_bm" => "Rumusan Tentang Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_tujuanData" => [
                        "status" => "active",
                        "label_bm" => "Tujuan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_kaedahPenyediaanData" => [
                        "status" => "active",
                        "label_bm" => "Kaedah Penyediaan Data",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_format" => [
                        "status" => "active",
                        "label_bm" => "Format",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_unit" => [
                        "status" => "active",
                        "label_bm" => "Unit",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_skala" => [
                        "status" => "active",
                        "label_bm" => "Skala",
                        "label_en" => "Name",
                    ],
                    "abstractVectorData_statusData" => [
                        "status" => "active",
                        "label_bm" => "Status Data",
                        "label_en" => "Name",
                    ],
                    "c2_abstract" => [
                        "status" => "active",
                        "label_bm" => "Abstract",
                        "label_en" => "Name",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDate" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "Name",
                    ],
                    "c2_metadataDateType" => [
                        "status" => "active",
                        "label_bm" => "Jenis Tarikh",
                        "label_en" => "Name",
                    ],
                    "c2_metadataStatus" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfServices" => [
                        "status" => "active",
                        "label_bm" => "Jenis Servis",
                        "label_en" => "Name",
                    ],
                    "c2_operationName" => [
                        "status" => "active",
                        "label_bm" => "Nama Operasi",
                        "label_en" => "Name",
                    ],
                    "c2_serviceUrl" => [
                        "status" => "active",
                        "label_bm" => "Servis URL",
                        "label_en" => "Name",
                    ],
                    "c2_typeOfCouplingDataset" => [
                        "status" => "active",
                        "label_bm" => "Jenis Gandingan dengan Dataset",
                        "label_en" => "Name",
                    ],
                    "c2_contact_name" => [
                        "status" => "active",
                        "label_bm" => "Nama",
                        "label_en" => "Name",
                    ],
                    "c2_contact_agensiorganisasi" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "Name",
                    ],
                    "c2_contact_bahagian" => [
                        "status" => "active",
                        "label_bm" => "Nama Bahagian",
                        "label_en" => "Name",
                    ],
                    "c2_position_name" => [
                        "status" => "active",
                        "label_bm" => "Jawatan",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address1" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address2" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address3" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_contact_address4" => [
                        "status" => "active",
                        "label_bm" => "Address",
                        "label_en" => "Name",
                    ],
                    "c2_postal_code" => [
                        "status" => "active",
                        "label_bm" => "Poskod",
                        "label_en" => "Name",
                    ],
                    "c2_contact_city" => [
                        "status" => "active",
                        "label_bm" => "Bandar",
                        "label_en" => "Name",
                    ],
                    "c2_contact_state" => [
                        "status" => "active",
                        "label_bm" => "Negeri",
                        "label_en" => "Name",
                    ],
                    "c2_contact_country" => [
                        "status" => "active",
                        "label_bm" => "Negara",
                        "label_en" => "Name",
                    ],
                    "c2_contact_email" => [
                        "status" => "active",
                        "label_bm" => "E-Mel",
                        "label_en" => "Name",
                    ],
                    "c2_contact_fax" => [
                        "status" => "active",
                        "label_bm" => "Nom bor Faks",
                        "label_en" => "Name",
                    ],
                    "c2_contact_phone_office" => [
                        "status" => "active",
                        "label_bm" => "Telefon (Pejabat)",
                        "label_en" => "Name",
                    ],
                    "c2_contact_website" => [
                        "status" => "active",
                        "label_bm" => "Laman Web",
                        "label_en" => "Name",
                    ],
                    "c2_contact_role" => [
                        "status" => "active",
                        "label_bm" => "Peranan",
                        "label_en" => "Name",
                    ],
                ],
                "accordion3" => [
                    [
                        "status" => "active",
                        "label_bm" => "Administrative and Political Boundaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Agriculture and Farming",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Atmosphere and Climatic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Biology and Ecology",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Business and Economic",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cadastral",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Cultural, Society and Demography",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Elevation and Derived Products",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Environment and Conservation",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Facilities and Structures",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Geological and Geophysical",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Human Health and Disease",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Imagery and Base Maps",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Inland Water Resources",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Locations and Geodetic Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Military",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Oceans and Estuaries",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Transportation Networks",
                        "label_en" => "ftest",
                    ],
                    [
                        "status" => "active",
                        "label_bm" => "Utilities and Communication",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion4" => [
                    "c4_scan_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Imbasan",
                        "label_en" => "ftest",
                    ],
                    "c4_ground_scan" => [
                        "status" => "active",
                        "label_bm" => "Imbasan Tanah",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion5" => [
                    "c5_process_lvl" => [
                        "status" => "active",
                        "label_bm" => "Tahap Proses",
                        "label_en" => "ftest",
                    ],
                    "c5_resolution" => [
                        "status" => "active",
                        "label_bm" => "Resolusi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion6" => [
                    "c6_collection_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Kumpulan",
                        "label_en" => "ftest",
                    ],
                    "c6_collection_id" => [
                        "status" => "active",
                        "label_bm" => "Identifikasi Kumpulan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion7" => [
                    "c7_band_boundary" => [
                        "status" => "active",
                        "label_bm" => "Sempadan Jalur",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_fn_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fungsi Pemindahan",
                        "label_en" => "ftest",
                    ],
                    "c7_trans_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Tersebar",
                        "label_en" => "ftest",
                    ],
                    "c7_nominal_spatial_res" => [
                        "status" => "active",
                        "label_bm" => "Spatial Resolusi Nominal",
                        "label_en" => "ftest",
                    ],
                    "c7_detected_polar" => [
                        "status" => "active",
                        "label_bm" => "Polarisasi Dikesan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion8" => [
                    "c8_avg_air_temp" => [
                        "status" => "active",
                        "label_bm" => "Purata Suhu Udara",
                        "label_en" => "ftest",
                    ],
                    "c8_altitude" => [
                        "status" => "active",
                        "label_bm" => "Ketinggian",
                        "label_en" => "ftest",
                    ],
                    "c8_relative_humid" => [
                        "status" => "active",
                        "label_bm" => "Kelembapan Relatif",
                        "label_en" => "ftest",
                    ],
                    "c8_meteor_cond" => [
                        "status" => "active",
                        "label_bm" => "Keadaaan Meteorologi",
                        "label_en" => "ftest",
                    ],
                    "c8_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_trigger" => [
                        "status" => "active",
                        "label_bm" => "Pencetus",
                        "label_en" => "ftest",
                    ],
                    "c8_context" => [
                        "status" => "active",
                        "label_bm" => "Konteks",
                        "label_en" => "ftest",
                    ],
                    "c8_sequence" => [
                        "status" => "active",
                        "label_bm" => "Urutan",
                        "label_en" => "ftest",
                    ],
                    "c8_time" => [
                        "status" => "active",
                        "label_bm" => "Masa",
                        "label_en" => "ftest",
                    ],
                    "c8_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_op_identifier" => [
                        "status" => "active",
                        "label_bm" => "Pengenalpasti",
                        "label_en" => "ftest",
                    ],
                    "c8_op_status" => [
                        "status" => "active",
                        "label_bm" => "Status",
                        "label_en" => "ftest",
                    ],
                    "c8_op_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis",
                        "label_en" => "ftest",
                    ],
                    "c8_rdr_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c8_last_accept_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penerimaan Terkini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion9" => [
                    "c9_west_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "W",
                        "label_en" => "W",
                    ],
                    "c9_east_bound_longitude" => [
                        "status" => "active",
                        "label_bm" => "E",
                        "label_en" => "E",
                    ],
                    "c9_south_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "S",
                        "label_en" => "S",
                    ],
                    "c9_north_bound_latitude" => [
                        "status" => "active",
                        "label_bm" => "N",
                        "label_en" => "N",
                    ],
                ],
                "accordion10" => [
                    "file_contohJenisMetadata" => [
                        "status" => "active",
                        "label_bm" => "Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan",
                        "label_en" => "ftest",
                    ],
                    "c10_file_name" => [
                        "status" => "active",
                        "label_bm" => "Nama Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Fail",
                        "label_en" => "ftest",
                    ],
                    "c10_file_url" => [
                        "status" => "active",
                        "label_bm" => "URL",
                        "label_en" => "URL",
                    ],
                    "c10_keyword" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci",
                        "label_en" => "ftest",
                    ],
                    "c10_additional_keyword[]" => [
                        "status" => "active",
                        "label_bm" => "Kata Kunci Tambahan",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion11" => [
                    "c11_dist_format" => [
                        "status" => "active",
                        "label_bm" => "Nama Format",
                        "label_en" => "ftest",
                    ],
                    "c11_version" => [
                        "status" => "active",
                        "label_bm" => "Versi Format",
                        "label_en" => "ftest",
                    ],
                    "c11_distributor" => [
                        "status" => "active",
                        "label_bm" => "Nama Organisasi",
                        "label_en" => "ftest",
                    ],
                    "c11_units_of_dist" => [
                        "status" => "active",
                        "label_bm" => "Unit Pengedaran",
                        "label_en" => "ftest",
                    ],
                    "c11_size" => [
                        "status" => "active",
                        "label_bm" => "Saiz (Megabytes)",
                        "label_en" => "ftest",
                    ],
                    "c11_link" => [
                        "status" => "active",
                        "label_bm" => "Pautan (Atas Talian)",
                        "label_en" => "ftest",
                    ],
                    "c11_fees" => [
                        "status" => "active",
                        "label_bm" => "Bayaran",
                        "label_en" => "ftest",
                    ],
                    "c11_order_instructions" => [
                        "status" => "active",
                        "label_bm" => "Langkah Pesanan",
                        "label_en" => "ftest",
                    ],
                    "c11_medium" => [
                        "status" => "active",
                        "label_bm" => "Nama Medium",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion12" => [
                    "c12_dataset_type" => [
                        "status" => "active",
                        "label_bm" => "Jenis Set Data Spatial",
                        "label_en" => "ftest",
                    ],
                    "c12_feature_scale" => [
                        "status" => "active",
                        "label_bm" => "Skala dalam Hardcopy/ Softcopy (skala ciri)",
                        "label_en" => "ftest",
                    ],
                    "c12_image_res" => [
                        "status" => "active",
                        "label_bm" => "Resolusi Gambar (GSD)",
                        "label_en" => "ftest",
                    ],
                    "c12_language" => [
                        "status" => "active",
                        "label_bm" => "Bahasa Data Set",
                        "label_en" => "ftest",
                    ],
                    "c12_maintenanceUpdate" => [
                        "status" => "active",
                        "label_bm" => "Penyelenggaraan dan Kemas Kini",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion13" => [
                    "c13_ref_sys_identify" => [
                        "status" => "active",
                        "label_bm" => "Pengecam Sistem Rujukan",
                        "label_en" => "ftest",
                    ],
                    "refsys_projection" => [
                        "status" => "active",
                        "label_bm" => "Unjuran",
                        "label_en" => "ftest",
                    ],
                    "refsys_axis_units" => [
                        "status" => "active",
                        "label_bm" => "Paksi Unit",
                        "label_en" => "ftest",
                    ],
                    "refsys_semiMajorAxis" => [
                        "status" => "active",
                        "label_bm" => "Paksi Separa Utama",
                        "label_en" => "ftest",
                    ],
                    "refsys_datum" => [
                        "status" => "active",
                        "label_bm" => "Datum",
                        "label_en" => "ftest",
                    ],
                    "refsys_ellipsoid" => [
                        "status" => "active",
                        "label_bm" => "Ellipsoid",
                        "label_en" => "ftest",
                    ],
                    "refsys_denomFlatRatio" => [
                        "status" => "active",
                        "label_bm" => "Penyebut Nisbah Rata",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion14" => [
                    "c14_useLimitation" => [
                        "status" => "active",
                        "label_bm" => "Penggunaan Had",
                        "label_en" => "ftest",
                    ],
                    "c14_access_constraint" => [
                        "status" => "active",
                        "label_bm" => "Akses Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_use_constraint" => [
                        "status" => "active",
                        "label_bm" => "Guna Kekangan",
                        "label_en" => "ftest",
                    ],
                    "c14_classification_sys" => [
                        "status" => "active",
                        "label_bm" => "Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c14_reference" => [
                        "status" => "active",
                        "label_bm" => "Sistem Klasifikasi",
                        "label_en" => "ftest",
                    ],
                ],
                "accordion15" => [
                    "c15_data_quality_info" => [
                        "status" => "active",
                        "label_bm" => "Skop Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_data_history" => [
                        "status" => "active",
                        "label_bm" => "Sejarah Data",
                        "label_en" => "ftest",
                    ],
                    "c15_date" => [
                        "status" => "active",
                        "label_bm" => "Masa Data",
                        "label_en" => "ftest",
                    ],
                    "tab_completeness" => [
                        "status" => "active",
                        "label_bm" => "KELENGKAPAN",
                        "label_en" => "ftest",
                    ],
                    "tab_consistency" => [
                        "status" => "active",
                        "label_bm" => "KETEKALAN KONSEP",
                        "label_en" => "ftest",
                    ],
                    "tab_position_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN POSISI",
                        "label_en" => "ftest",
                    ],
                    "tab_temp_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN MASA",
                        "label_en" => "ftest",
                    ],
                    "tab_thematic_accuracy" => [
                        "status" => "active",
                        "label_bm" => "KETEPATAN TEMATIK",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Kewujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_complete_comm_or_omit" => [
                        "status" => "active",
                        "label_bm" => "Ketidakwujudan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t1_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Konsep",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Domain",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Format",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Logikal",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_scope_4" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_comply_level_4" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_date_4" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_result_4" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t2_conform_result_4" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Posisi",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Ketekalan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_type" => [
                        "status" => "active",
                        "label_bm" => "Kesahihan Temporal",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t3_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Ketepatan Pengukuran Masa",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Consistency",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_type" => [
                        "status" => "active",
                        "label_bm" => "Temporal Validity",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t4_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Klasifikasi",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Bukan Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_type" => [
                        "status" => "active",
                        "label_bm" => "Kebenaran Attribut Kuantitatif",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_2" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_2" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_2" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_2" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_2" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_scope_3" => [
                        "status" => "active",
                        "label_bm" => "Skop",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_comply_level_3" => [
                        "status" => "active",
                        "label_bm" => "Tahap Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_date_3" => [
                        "status" => "active",
                        "label_bm" => "Tarikh Penilaian",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_result_3" => [
                        "status" => "active",
                        "label_bm" => "Keputusan Pematuhan",
                        "label_en" => "ftest",
                    ],
                    "c15_t5_conform_result_3" => [
                        "status" => "active",
                        "label_bm" => "Pematuhan Kualiti Data",
                        "label_en" => "ftest",
                    ],
                ],
            ],
        ];
        
        $template[] = $input;
        
        MetadataTemplate::query()->update(['status' => 'inactive']);
        
        $mt = new MetadataTemplate();
        $mt->template = $input;
        $mt->version = $request->version;
        $mt->status = "active";
        $mt->save();
        
//        dd($mt);
        
        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', 'Metadata Template Saved');
    }

    public function change_elemen_status(Request $request) {
        $em = ElemenMetadata::where(["id" => $request->elemen_id])->get()->first();
        $em->status = $request->status_id;
        $em->update();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function simpan_kategori(Request $request) {
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $mcat = new MCategory();
        $mcat->name = $request->kategori;
        $query = $mcat->save();

        if ($query) {
            $msg = "Kategori berjaya ditambah.";
        } else {
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
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $word = "Tajuk";

        $tajuk = new Tajuk();
        $tajuk->kategori = $request->kategori;
        $tajuk->name = $request->tajuk;
        if (isset($request->sub_tajuk)) {
            $tajuk->sub_tajuk = $request->sub_tajuk;
            $word = "Sub-Tajuk";
        }
        $query = $tajuk->save();

        if ($query) {
            $msg = $word . " berjaya ditambah.";
        } else {
            $msg = $word . " tidak berjaya ditambah.";
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function simpan_sub_tajuk(Request $request) {
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }
        $elemens = ElemenMetadata::get();
    }

    public function simpan_elemen(Request $request) {
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
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

        if ($query) {
            $msg = "Elemen berjaya ditambah.";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Create';
            $at->save();
        } else {
            $msg = "Elemen tidak berjaya ditambah.";
        }

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function simpan_custom_input(Request $request) {
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $cmi = new CustomMetadataInput();
        $cmi->name = $request->name;
        $cmi->name_bm = $request->name_bm;
        $cmi->input_name = preg_replace("/\s+/", "", trim(ucwords($request->name)));
        $cmi->input_type = "Text";
        $cmi->data = "";
        if ($request->mandatory == "") {
            $mand = "No";
        } else {
            $mand = $request->mandatory;
        }
        $cmi->mandatory = $mand;
        $cmi->status = "Active";
        $cmi->kategori = $request->kategori;
        $query = $cmi->save();

        if ($query) {
            $msg = "Custom Input berjaya ditambah.";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Create';
            $at->save();
        } else {
            $msg = "Custom Input tidak berjaya ditambah.";
        }

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function simpan_kemaskini_custom_input(Request $request) {
        if (!auth::user()->hasRole(['Pentadbir Metadata'])) {
            abort(403, 'Access denied'); //USE THIS TO DOUBLE CHECK USER ACCESS
        }

        $cmi = CustomMetadataInput::where('id', $request->customInputId)->get()->first();
        $cmi->name = $request->name;
        $cmi->name_bm = $request->name_bm;
        $cmi->input_name = preg_replace("/\s+/", "", trim(ucwords($request->name)));
        $cmi->input_type = "Text";
        $cmi->data = "";
        if ($request->mandatory == "") {
            $mand = "No";
        } else {
            $mand = $request->mandatory;
        }
        $cmi->mandatory = $mand;
        $cmi->status = "Active";
        $cmi->kategori = $request->kategori;
        $query = $cmi->save();

        if ($query) {
            $msg = "Custom Input berjaya dikemaskini.";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Update';
            $at->save();
        } else {
            $msg = "Custom Input tidak berjaya dikemaskini.";
        }

        return redirect('mygeo_kemaskini_elemen_metadata')->with('message', $msg);
    }

    public function get_custom_input_details() {
        $custom_input_id = $_POST['custom_input_id'];
        $cmi = CustomMetadataInput::where(["id" => $custom_input_id])->get()->first();
        $categories = MCategory::get();
        $html_details = '
            <input type="hidden" name="customInputId" id="kemaskiniCustomInputId" value="' . $cmi->id . '">
            <div class="form-group">
                <label for="name">Nama EN:</label>
                <input type="text" name="name" class="form-control name" id="kemaskiniCustomInputName" value="' . $cmi->name . '">
            </div>
            <div class="form-group">
                <label for="name">Nama BM:</label>
                <input type="text" name="name_bm" class="form-control name_bm" id="kemaskiniCustomInputNameBm" value="' . $cmi->name_bm . '">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select name="kategori" class="form-control thekategori">
                    <option value="">Pilih...</option>';
        foreach ($categories as $cat) {
            $html_details .= '
                <option value="' . $cat->id . '" ' . ($cat->id == $cmi->kategori ? "selected" : "") . '>' . $cat->name . '</option>
            ';
        }
        $html_details .= '
                </select>
            </div>
            <div class="form-group">
                <label for="mandatory">Mandatory:</label>
                <select name="mandatory" class="form-control mandatory" id="kemaskiniCustomInputMandatory">
                    <option value="">Pilih...</option>
                    <option value="Yes" ' . ($cmi->mandatory == "Yes" ? "selected" : "") . '>Yes</option>
                    <option value="No" ' . ($cmi->mandatory == "No" ? "selected" : "") . '>No</option>
                </select>
            </div>
        ';
        echo $html_details;
        exit;
    }

    public function getTajukByCategory(Request $request) {
        $tajuks = Tajuk::where('kategori', $request->kategori)->whereNull('sub_tajuk')->get();
        echo json_encode($tajuks);
        exit();
    }

    public function getSubTajuk(Request $request) {
        $sub_tajuks = Tajuk::where('name', $request->tajuk)->whereNotNull('sub_tajuk')->get();
        echo json_encode(['sub_tajuks' => $sub_tajuks]);
        exit();
    }

    public function deleteElemenMetadata(Request $request) {
        $msg = "";
        $error = 0;
        $delete = ElemenMetadata::where('id', $request->rowid)->delete();
        if ($delete) {
            $error = 0;
            $msg = "Elemen Metadata telah dipadam";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Delete';
            $at->save();
        } else {
            $error = 1;
            $msg = "Elemen Metadata tidak berjaya dipadam";
        }
        echo json_encode(['error' => $error, 'msg' => $msg]);
        exit();
    }

    public function deleteCustomMetadataInput(Request $request) {
        $msg = "";
        $error = 0;
        $delete = CustomMetadataInput::where('id', $request->rowid)->delete();
        if ($delete) {
            $error = 0;
            $msg = "Custom Metadata Input telah dipadam";

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Delete';
            $at->save();
        } else {
            $error = 1;
            $msg = "Custom Metadata Input tidak berjaya dipadam";
        }
        echo json_encode(['error' => $error, 'msg' => $msg]);
        exit();
    }

}
