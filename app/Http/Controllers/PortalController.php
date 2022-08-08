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
use App\MaklumBalas;
use App\HubungiKami;
use App\PanduanPengguna;
use App\Penafian;
use App\PenyataanPrivasi;
use App\Faq;
use App\Pengumuman;
use App\TatacaraMohon;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\AgensiOrganisasi;
use App\Bahagian;
use App\AuditTrail;
use App\PortalTetapan;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    { }

    //=== Portal Settings Functions ==========================================================
    public function index_portal_settings()
    {
        $hubungi_kami = HubungiKami::get()->first();
        $panduan_pengguna = PanduanPengguna::get()->first();
        $penafian = Penafian::get()->first();
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        $faq = Faq::get()->first();
        $pengumuman = Pengumuman::get();
        $portal = PortalTetapan::get()->first();
        return view('portal_settings', compact('hubungi_kami', 'panduan_pengguna', 'penafian', 'penyataan_privasi', 'faq', 'pengumuman','portal'));
    }
    public function edit_faq()
    {
        $faqs = Faq::orderBy('id', 'ASC')->get();
        return view('mygeo.faq', compact('faqs'));
    }

    public function update_faq(Request $request)
    {
        DB::transaction(function () use ($request) {
            Faq::where(["id" => $request->id_faq])->update([
                "title" => $request->title_faq,
                "content" => $request->content_faq,
                "category" => $request->category_faq
            ]);
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('/kemaskini_faq')->with('success', 'FAQ Disimpan');
    }

    public function edit_maklum_balas()
    {
        $hubungi_kami = HubungiKami::get()->first();
        $panduan_pengguna = PanduanPengguna::get()->first();
        $penafian = Penafian::get()->first();
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        $faq = Faq::get()->first();
        $pengumuman = Pengumuman::get();
        return view('mygeo.maklum_balas', compact('hubungi_kami', 'panduan_pengguna', 'penafian', 'penyataan_privasi', 'faq', 'pengumuman'));
    }


    public function edit_pengumuman2()
    {
        $pengumuman = Pengumuman::orderBy('created_at','DESC')->get();
        return view('mygeo.pengumuman', compact('pengumuman'));
    }

    public function store_portal_settings(Request $request)
    {
        DB::transaction(function () use ($request) {

            PanduanPengguna::where(["id" => $request->id_panduan_pengguna])->update([
                "title" => $request->title_panduan_pengguna,
                "content" => $request->content_panduan_pengguna
            ]);

            Faq::where(["id" => $request->id_faq])->update([
                "title" => $request->title_faq,
                "content" => $request->content_faq,
                "category" => $request->category_faq
            ]);
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('/landing_mygeo')->with('success', 'Maklum Balas Disimpan');
    }


    //=== Maklum Balas Functions ==============================================================
    public function index_maklum_balas()
    {
        $maklum_balas = MaklumBalas::get();
        return view('mygeo.maklumbalas', compact('maklum_balas'));
    }

    public function store_maklum_balas(Request $request)
    {
        DB::transaction(function () use ($request) {
            $maklum_balas = new MaklumBalas();
            $maklum_balas->category = $request->kategori;
            $maklum_balas->pertanyaan = $request->pertanyaan;
            $maklum_balas->email = $request->email;
            $maklum_balas->status = 0;
            $maklum_balas->save();
        });

//        $at = new AuditTrail();
//        $at->path = url()->full();
//        $at->user_id = Auth::user()->id;
//        $at->data = 'Create';
//        $at->save();

        return redirect('')->with('success', 'Maklum Balas Dihantar');
    }

    public function delete_maklum_balas(Request $request)
    {
        MaklumBalas::where(["id" => $request->id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('maklum_balas')->with('success', 'Maklum Balas Dibuang');
    }

    public function reply_maklum_balas(Request $request)
    {
        $maklum_balas = MaklumBalas::where('id',$request->mbid)->get()->first();
        $maklum_balas->status = 1;
        $maklum_balas->save();

        //send email to the person created
        $to_name = $request->email;
        $to_email = $request->email;
        $data = array('email'=>$request->email,'pertanyaan'=>$request->pertanyaan,'balas'=>$request->balas);
        Mail::send('mails.exmpl11', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('MyGeo Explorer : Jawapan Maklum Balas MyGeo Explorer');
            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('maklum_balas')->with('success', 'Maklum balas telah dihantar');
    }

    //=== Hubungi Kami Functions ==============================================================
    public function index_hubungi_kami()
    {
        $portal = PortalTetapan::get()->first();
        $hubungi_kami = HubungiKami::get()->first();
        return view('hubungi_kami', compact('hubungi_kami','portal'));
    }


    //=== Panduan Penggun Functions ===========================================================
    public function edit_panduan_pengguna()
    {
        $panduan_pengguna = PanduanPengguna::get();
        return view('mygeo.panduan_pengguna', compact('panduan_pengguna'));
    }

    public function store_kategori_panduan(Request $request)
    {
        $panduan = new PanduanPengguna();
        $panduan->title = $request->kategori_panduan;
        $panduan->save();

        return redirect('/panduan_pengguna_edit')->with('success', 'Panduan Pengguna Disimpan');
    }

    public function index_panduan_pengguna()
    {
        $portal = PortalTetapan::get()->first();
        $panduan_pengguna = PanduanPengguna::get();
        return view('panduan_pengguna', compact('panduan_pengguna','portal'));
    }

    public function update_panduan_pengguna(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save panduan pengguna
            PanduanPengguna::where(["id" => $request->id_panduan_pengguna])->update([
                "title" => $request->title_panduan,
                "content" => $request->content_panduan,
                "video_link" => $request->video_link,
            ]);
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('/panduan_pengguna_edit')->with('success', 'Panduan Pengguna Disimpan');
    }

    //=== Penafian Functions ===========================================================
    public function index_penafian()
    {
        $portal = PortalTetapan::get()->first();
        $penafian = Penafian::get()->first();
        return view('penafian', compact('penafian','portal'));
    }

    public function index_penafian_mygeo()
    {
        $penafian = Penafian::get()->first();
        return view('mygeo.penafian', compact('penafian'));
    }

    public function store_penafian(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save penafian
            Penafian::where(["id" => $request->id_penafian])->update([
                "title" => $request->title_penafian,
                "content" => $request->content_penafian
            ]);
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_penafian')->with('success', 'Tetapan Penafian Disimpan');
    }

    //=== Penyataan Privasi Functions ===========================================================
    public function index_penyataan_privasi()
    {
        $portal = PortalTetapan::get()->first();
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        return view('penyataan_privasi', compact('penyataan_privasi','portal'));
    }

    public function index_penyataan_privasi_mygeo()
    {
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        return view('mygeo.penyataan_privasi', compact('penyataan_privasi'));
    }

    public function store_penyataan_privasi(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save penafian
            PenyataanPrivasi::where(["id" => $request->id_penyataan_privasi])->update([
                "title" => $request->title_penyataan_privasi,
                "content" => $request->content_penyataan_privasi
            ]);
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_penyataan_privasi')->with('success', 'Tetapan Penyataan Privasi Berjaya Disimpan');
    }


    //=== Soalan Lazim Functions ===========================================================
    public function index_faq()
    {
        $portal = PortalTetapan::get()->first();
        $faqs = Faq::orderBy('id', 'ASC')->get();
        return view('faq', compact('faqs','portal'));
    }


    //=== Pengumuman Functions ===========================================================
    public function index_pengumuman()
    {
        $portal = PortalTetapan::get()->first();
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->get();
        return view('pengumuman_index', compact('pengumuman','portal'));
    }

    public function show_pengumuman(Request $request)
    {
        $portal = PortalTetapan::get()->first();
        $pengumuman = Pengumuman::where(["id" => $request->umum_id])->get()->first();
        return view('pengumuman_show', compact('pengumuman','portal'));
    }

    public function show_pengumuman2(Request $request)
    {
        $pengumuman = Pengumuman::where(["id" => $request->umum_id])->get()->first();
        return view('mygeo.pengumuman_show', compact('pengumuman'));
    }

    public function edit_pengumuman(Request $request)
    {
        $pengumuman = Pengumuman::where(["id" => $request->umum_id])->get()->first();
        return view('mygeo.pengumuman_edit', compact('pengumuman'));
    }

    public function store_pengumuman(Request $request)
    {
        //save gambar profil
        if(isset($_FILES['gambar']) && (file_exists($_FILES['gambar']['tmp_name']))){
            $this->validate($request,['gambar' => 'required|image|mimes:jpeg,png,jpg']);
            $exists = Storage::exists($request->gambar->getClientOriginalName());
            $time = date('Y-m-d'.'_'.'H_i_s');
            $fileName = $time.'_'.$request->gambar->getClientOriginalName();
            $imageUrl = Storage::putFileAs('/public/', $request->file('gambar'), $fileName);
        }else{
            $fileName = "banner2.jpeg";
        }

        DB::transaction(function () use ($request,$fileName) {
            $pengumuman = new Pengumuman();
            $pengumuman->kategori = $request->category_pengumuman;
            $pengumuman->title = $request->title_pengumuman;
            $pengumuman->date = $request->date_pengumuman;
            $pengumuman->content = $request->content_pengumuman;
            $pengumuman->gambar = $fileName;
            $pengumuman->save();
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('pengumuman_edit')->with('success', 'Pengumuman Ditambah');
    }

    public function update_pengumuman(Request $request)
    {
        //save gambar
        if(isset($_FILES['gambar']) && (file_exists($_FILES['gambar']['tmp_name']))){
            $this->validate($request,['gambar' => 'required|image|mimes:jpeg,png,jpg']);
            $exists = Storage::exists($request->gambar->getClientOriginalName());
            $time = date('Y-m-d'.'_'.'H_i_s');
            $fileName = $time.'_'.$request->gambar->getClientOriginalName();
            $imageUrl = Storage::putFileAs('/public/', $request->file('gambar'), $fileName);
        }

        $pengumuman = Pengumuman::find($request->id_pengumuman);
        $pengumuman->title = $request->title_pengumuman;
        $pengumuman->date = $request->date_pengumuman;
        $pengumuman->content = $request->content_pengumuman;
        if(isset($imageUrl)){
            $pengumuman->gambar = $fileName;
        }
        $pengumuman->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('pengumuman_edit')->with('success', 'Pengumuman Dikemaskini');
    }

    public function delete_pengumuman(Request $request)
    {
        Pengumuman::where(["id" => $request->umum_id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('pengumuman_edit')->with('success', 'Pengumuman Dibuang');
    }

    public function senarai_agensi_organisasi(){
        $aos2 = AgensiOrganisasi::orderBy('created_at','desc')->get();
        $aos = [];
        $agensiOrganisasi = [];
        foreach($aos2 as $ao){
            if($ao->bahagian == null || $ao->bahagian == ""){
                //get all agensi / organisasi / institusi that have bahagians only
                $taos = AgensiOrganisasi::where('name',$ao->name)->whereNotNull('bahagian')->get();
                if(!empty($taos) && count($taos) > 0){
                    continue;
                }
            }
            $aos[] = $ao;
            $agensiOrganisasi[] = $ao->name; //for autocomplete
        }
        return view('mygeo.pengurusan_portal.senarai_agensi_organisasi', compact('aos','agensiOrganisasi'));
    }

    public function simpan_agensi_organisasi(Request $request){
        if($request->namaAgensiOrganisasi != "" && !isset($request->namaBahagian)){ 
            $aoi = AgensiOrganisasi::where('name','ILIKE',$request->namaAgensiOrganisasi)->whereNull('bahagian')->get()->first();
            if(!empty($aoi)){
                echo json_encode(["error"=>"1","msg"=>"Nama Agensi / Organisasi / Institusi telah wujud. Sila pilih nama lain."]);
                exit();
            }
        }elseif($request->namaAgensiOrganisasi != "" && isset($request->namaBahagian) && $request->namaBahagian != ""){
            $aoi = AgensiOrganisasi::where('name','ILIKE',$request->namaAgensiOrganisasi)->where('bahagian','ILIKE',$request->namaBahagian)->get()->first();
            if(!empty($aoi)){
                echo json_encode(["error"=>"1","msg"=>"Nama Bahagian telah wujud. Sila pilih nama lain."]);
                exit();
            }
        }

        $msg = "Penambahan Agensi / Organisasi / Institusi berjaya.";
        $ao = new AgensiOrganisasi();
        $ao->sektor = $request->sektor;
        $ao->name = $request->namaAgensiOrganisasi;
        if(isset($request->namaBahagian)){
            $ao->bahagian = $request->namaBahagian;
            $msg = "Penambahan Bahagian berjaya.";
        }
        $ao->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        echo json_encode(["error"=>"0","msg"=>$msg]);
        exit();
    }

    public function simpan_kemaskini_agensi_organisasi(Request $request){
        $msg = "Agensi / Organisasi berjaya dikemaskini.";
        $ao = AgensiOrganisasi::where('id',$request->rowid)->get()->first();
        $ao->sektor = $request->sektor;
        $ao->name = $request->namaAgensiOrganisasi;
        if(isset($request->bahagian)){
            $ao->bahagian = $request->bahagian;
            $msg = "Bahagian berjaya dikemaskini.";
        }
        $ao->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        echo json_encode(["msg"=>$msg]);
        exit();
    }

    public function get_agensi_organisasi_by_sektor(Request $request){
        $aos = AgensiOrganisasi::where('sektor',$request->sektor)->whereNull('bahagian')->distinct('name')->get();
        echo json_encode(["aos"=>$aos]);//test
        exit();
    }
    public function get_agensi_organisasi(Request $request){
        $aos = "";
        $ao = AgensiOrganisasi::where('id',$request->rowid)->get()->first();
        if($ao->bahagian != ""){
            //get all agensi_organisasi
            $aos = AgensiOrganisasi::where('sektor',$ao->sektor)->distinct('name')->get();
        }
        echo json_encode(["ao"=>$ao,"aos"=>$aos]);
        exit();
    }

    public function get_bahagian(Request $request){
        $bhgns = AgensiOrganisasi::where('name',$request->agensi_organisasi_name)->whereNotNull('bahagian')->get();
        $error = '0';
        $msg = "";
        if(count($bhgns) == 0){
            $error = '1';
            $msg = "Tiada Bahagian dijumpai";
        }
        echo json_encode(["bhgns"=>$bhgns,"msg"=>$msg,"error"=>$error]);
        exit();
    }

    public function delete_agensi_organisasi(Request $request){
        $type = ($request->type == "bahagian" ? "Bahagian":"Agensi/Organisasi");
        $msg = "";
        $deleted = AgensiOrganisasi::where('id',$request->id)->delete();
        if($deleted){
            $error = 0;
            $msg = $type." berjaya dipadam.";
        }else{
            $error = 1;
            $msg = $type + " tidak berjaya dipadam.";
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        echo json_encode(["msg"=>$msg,"error"=>$error]);
        exit();
    }

    public function audit_trail(Request $request){
        $var = "";
        if(isset($request->dateRange)){
            $var = $request->dateRange;
            $dateRange = explode(' - ',$request->dateRange);
            $dateStart = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $dateRange[0]." 00:00:00")));
            $dateEnd = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $dateRange[1]." 23:59:59")));
            $audit_trails = AuditTrail::with('getUser')->whereBetween('created_at',[$dateStart,$dateEnd])->orderBy('created_at','DESC')->get();
        }else{
            $audit_trails = AuditTrail::with('getUser')->orderBy('created_at','DESC')->get();
        }
        return view('mygeo.pengurusan_portal.audit_trail', compact('audit_trails','var'));
    }

    // ==================================== Tetapan Portal (Hubungi Kami, Emel Pentadbir, Masa Operasi)========================================

    public function show_portal_tetapan(){
        $portal = PortalTetapan::get()->first();
        return view('mygeo.pengurusan_portal.portal_tetapan', compact('portal'));
    }

    public function update_portal_tetapan(Request $request){
        PortalTetapan::where(["id" => $request->id_portal])->update([
            "name" => $request->nama_lokasi,
            "address" => $request->alamat,
            "email_admin" => $request->emel_pentadbir,
            "contact" => $request->contact,
            "operation_time" => $request->masa_operasi,
        ]);
        return redirect('portal_tetapan')->with('success','Maklumat Portal Telah Disimpan');
    }

    //=== Tatacara Permohonan Functions ===========================================================
    public function edit_tatacara()
    {
        $tatacara_mohon = TatacaraMohon::orderBy('id','ASC')->get();
        return view('mygeo.tatacara_mohon', compact('tatacara_mohon'));
    }

    public function store_tajuk_tatacara(Request $request){

        $tatacara = new TatacaraMohon();
        $tatacara->title = $request->tajuk_tatacara;
        $tatacara->save();

        return redirect('/tatacara_edit')->with('success', 'Tatacara Permohonan Disimpan');
    }

    public function index_tatacara()
    {
        $portal = PortalTetapan::get()->first();
        $tatacara_mohon = TatacaraMohon::orderBy('id','ASC')->get();
        return view('/data_asas_tatacara_mohon',compact('portal','tatacara_mohon'));
    }

    public function update_tatacara(Request $request)
    {
        $request->validate([
            'file' => 'mimes:png,jpeg,jpg|max:2048'
        ]);

        if ($request->file) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('tatacara_icon', $fileName, 'public');
            $iconPath = '/storage/' . $filePath;

            // dd($iconPath);
                TatacaraMohon::where(["id" => $request->id_tatacara])->update([
                    "title" => $request->title_tatacara,
                    "content" => $request->content_tatacara,
                    "icon_path" => $iconPath,
                ]);

        } else {
            //save tatacara permohonan
            TatacaraMohon::where(["id" => $request->id_tatacara])->update([
                "title" => $request->title_tatacara,
                "content" => $request->content_tatacara,
            ]);
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('/tatacara_edit')->with('success', 'Tatacara Permohonan Dikemaskini');
    }

    public function delete_tatacara(Request $request)
    {
        TatacaraMohon::where(["id" => $request->tatacara_id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('/tatacara_edit')->with('success', 'Pengumuman Dibuang');
    }
}
