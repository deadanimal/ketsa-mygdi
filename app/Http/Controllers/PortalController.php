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
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\AgensiOrganisasi;
use App\Bahagian;

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
        return view('portal_settings', compact('hubungi_kami', 'panduan_pengguna', 'penafian', 'penyataan_privasi', 'faq', 'pengumuman'));
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

    public function edit_panduan_pengguna()
    {
        $panduan_pengguna = PanduanPengguna::get()->first();
        return view('mygeo.panduan_pengguna', compact('panduan_pengguna'));
    }

    public function edit_pengumuman2()
    {
        $pengumuman = Pengumuman::get();
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

        return redirect('')->with('success', 'Maklum Balas Dihantar');
    }

    public function delete_maklum_balas(Request $request)
    {
        MaklumBalas::where(["id" => $request->id])->delete();
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

        return redirect('maklum_balas')->with('success', 'Maklum balas telah dihantar');
    }

    //=== Hubungi Kami Functions ==============================================================
    public function index_hubungi_kami()
    {
        $hubungi_kami = HubungiKami::get()->first();
        return view('hubungi_kami', compact('hubungi_kami'));
    }


    //=== Panduan Penggun Functions ===========================================================
    public function index_panduan_pengguna()
    {
        $panduan_pengguna = PanduanPengguna::get()->first();
        return view('panduan_pengguna', compact('panduan_pengguna'));
    }

    public function store_panduan_pengguna(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save panduan pengguna
            PanduanPengguna::where(["id" => $request->id_panduan_pengguna])->update([
                "title" => $request->title_panduan_pengguna,
                "content" => $request->content_panduan_pengguna
            ]);
        });

        return redirect('/panduan_pengguna_edit')->with('success', 'Panduan Pengguna Disimpan');
    }


    //=== Penafian Functions ===========================================================
    public function index_penafian()
    {
        $penafian = Penafian::get()->first();
        return view('penafian', compact('penafian'));
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

        return redirect('mygeo_penafian')->with('success', 'Tetapan Penafian Disimpan');
    }


    //=== Penyataan Privasi Functions ===========================================================
    public function index_penyataan_privasi()
    {
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        return view('penyataan_privasi', compact('penyataan_privasi'));
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

        return redirect('mygeo_penyataan_privasi')->with('success', 'Tetapan Penyataan Privasi Berjaya Disimpan');
    }


    //=== Soalan Lazim Functions ===========================================================
    public function index_faq()
    {
        $faqs = Faq::orderBy('id', 'ASC')->get();
        return view('faq', compact('faqs'));
    }


    //=== Pengumuman Functions ===========================================================
    public function index_pengumuman()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->get();
        return view('pengumuman_index', compact('pengumuman'));
    }

    public function show_pengumuman(Request $request)
    {
        $pengumuman = Pengumuman::where(["id" => $request->umum_id])->get()->first();
        return view('pengumuman_show', compact('pengumuman'));
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
        DB::transaction(function () use ($request) {
            $pengumuman = new Pengumuman();
            $pengumuman->title = $request->title_pengumuman;
            $pengumuman->date = $request->date_pengumuman;
            $pengumuman->content = $request->content_pengumuman;
            $pengumuman->save();
        });

        return redirect('pengumuman_edit')->with('success', 'Pengumuman Ditambah');
    }

    public function update_pengumuman(Request $request)
    {
        $pengumuman = Pengumuman::find($request->id_pengumuman);
        $pengumuman->title = $request->title_pengumuman;
        $pengumuman->date = $request->date_pengumuman;
        $pengumuman->content = $request->content_pengumuman;
        $pengumuman->save();
        return redirect('pengumuman_edit')->with('success', 'Pengumuman Dikemaskini');
    }

    public function delete_pengumuman(Request $request)
    {
        Pengumuman::where(["id" => $request->umum_id])->delete();
        return redirect('pengumuman_edit')->with('success', 'Pengumuman Dibuang');
    }
    
    public function senarai_agensi_organisasi(){
        $aos = AgensiOrganisasi::orderBy('created_at','desc')->get();
        return view('mygeo.pengurusan_portal.senarai_agensi_organisasi', compact('aos'));
    }
    
    public function simpan_agensi_organisasi(Request $request){
        $msg = "Penambahan Agensi / Organisasi berjaya.";
        $ao = new AgensiOrganisasi();
        $ao->sektor = $request->sektor;
        $ao->name = $request->namaAgensiOrganisasi;
        if(isset($request->namaBahagian)){
            $ao->bahagian = $request->namaBahagian;
            $msg = "Penambahan Bahagian berjaya.";
        }
        $ao->save();
        
        echo json_encode(["msg"=>$msg]);
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
        
        echo json_encode(["msg"=>$msg]);
        exit();
    }
    
    public function get_agensi_organisasi_by_sektor(Request $request){
        $aos = AgensiOrganisasi::where('sektor',$request->sektor)->distinct('name')->get();
        echo json_encode(["aos"=>$aos]);
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
}
