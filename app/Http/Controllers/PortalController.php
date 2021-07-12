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
use App\MaklumBalas;
use App\HubungiKami;
use App\PanduanPengguna;
use App\Penafian;
use App\PenyataanPrivasi;
use App\Faq;
use App\Pengumuman;
use Session;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){

    }




    //=== Portal Settings Functions ==========================================================
    public function index_portal_settings() {
        $hubungi_kami = HubungiKami::get()->first();
        $panduan_pengguna = PanduanPengguna::get()->first();
        $penafian = Penafian::get()->first();
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        $faq = Faq::get()->first();
        $pengumuman = Pengumuman::get();
        return view('portal_settings',compact('hubungi_kami','panduan_pengguna','penafian','penyataan_privasi','faq','pengumuman'));
    }
    public function edit_faq() {
        $faq = Faq::get()->first();
        return view('mygeo.faq',compact('faq'));
    }
    public function update_faq(Request $request){
        DB::transaction(function() use ($request) {
            Faq::where(["id"=>$request->id_faq])->update([
                'title'=>$request->title_faq,
                "content"=>$request->content_faq
            ]);
        });

        return redirect('/faq_edit')->with('success', 'FAQ Disimpan');
    }
    public function edit_maklum_balas() {
        $hubungi_kami = HubungiKami::get()->first();
        $panduan_pengguna = PanduanPengguna::get()->first();
        $penafian = Penafian::get()->first();
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        $faq = Faq::get()->first();
        $pengumuman = Pengumuman::get();
        return view('mygeo.maklum_balas',compact('hubungi_kami','panduan_pengguna','penafian','penyataan_privasi','faq','pengumuman'));
    }
    public function edit_panduan_pengguna() {
        $panduan_pengguna = PanduanPengguna::get()->first();
        return view('mygeo.panduan_pengguna',compact('panduan_pengguna'));
    }
    public function edit_pengumuman2() {
        $pengumuman = Pengumuman::get();
        return view('mygeo.pengumuman',compact('pengumuman'));
    }

    public function store_portal_settings(Request $request){
        DB::transaction(function() use ($request) {
            /*
            //save hubungi kami
            HubungiKami::where(["id"=>$request->id_hubungi_kami])->update([
                'title'=>$request->title_hubungi_kami,
                "content"=>$request->content_hubungi_kami
            ]);
            */
            //save panduan pengguna
            PanduanPengguna::where(["id"=>$request->id_panduan_pengguna])->update([
                'title'=>$request->title_panduan_pengguna,
                "content"=>$request->content_panduan_pengguna
            ]);
            /*
            //save penafian
            Penafian::where(["id"=>$request->id_penafian])->update([
                'title'=>$request->title_penafian,
                "content"=>$request->content_penafian
            ]);

            //save penyataan privasi
            PenyataanPrivasi::where(["id"=>$request->id_penyataan_privasi])->update([
                'title'=>$request->title_penyataan_privasi,
                "content"=>$request->content_penyataan_privasi
            ]);
            */
            //save faq
            Faq::where(["id"=>$request->id_faq])->update([
                'title'=>$request->title_faq,
                "content"=>$request->content_faq
            ]);
        });

        return redirect('/landing_mygeo')->with('success', 'Maklum Balas Disimpan');
    }

    public function store_panduan_pengguna(Request $request){
        DB::transaction(function() use ($request) {
            //save panduan pengguna
            PanduanPengguna::where(["id"=>$request->id_panduan_pengguna])->update([
                'title'=>$request->title_panduan_pengguna,
                "content"=>$request->content_panduan_pengguna
            ]);
        });

        return redirect('/panduan_pengguna_edit')->with('success', 'Panduan Pengguna Disimpan');
    }



    //=== Maklum Balas Functions ==============================================================
    public function index_maklum_balas() {
        return view('maklum_balas');
    }

    public function store_maklum_balas(Request $request){
        DB::transaction(function() use ($request) {
            $maklum_balas = new MaklumBalas();
            $maklum_balas->category = $request->kategori;
            $maklum_balas->pertanyaan = $request->pertanyaan;
            $maklum_balas->email = $request->email;
            $maklum_balas->status = 0;
            $maklum_balas->save();
        });

        return redirect('maklum_balas')->with('success', 'Maklum Balas Disimpan');
    }



    //=== Hubungi Kami Functions ==============================================================
    public function index_hubungi_kami() {
        $hubungi_kami = HubungiKami::get()->first();
        return view('hubungi_kami',compact('hubungi_kami'));
    }



    //=== Panduan Penggun Functions ===========================================================
    public function index_panduan_pengguna() {
        $panduan_pengguna = PanduanPengguna::get()->first();
        return view('panduan_pengguna',compact('panduan_pengguna'));
    }




    //=== Penafian Functions ===========================================================
    public function index_penafian() {
        $penafian = Penafian::get()->first();
        return view('penafian',compact('penafian'));
    }


    //=== Penyataan Privasi Functions ===========================================================
    public function index_penyataan_privasi() {
        $penyataan_privasi = PenyataanPrivasi::get()->first();
        return view('penyataan_privasi',compact('penyataan_privasi'));
    }


    //=== Soalan Lazim Functions ===========================================================
    public function index_faq() {
        $faq = Faq::get()->first();
        return view('faq',compact('faq'));
    }


    //=== Pengumuman Functions ===========================================================
    public function index_pengumuman() {
        $pengumuman = Pengumuman::orderBy('created_at','DESC')->get();
        return view('pengumuman_index',compact('pengumuman'));
    }

    public function show_pengumuman(Request $request) {
        $pengumuman = Pengumuman::where(["id"=>$request->umum_id])->get()->first();
        return view('pengumuman_show',compact('pengumuman'));
    }

    public function edit_pengumuman(Request $request) {
        $pengumuman = Pengumuman::where(["id"=>$request->umum_id])->get()->first();
        return view('mygeo.pengumuman_edit',compact('pengumuman'));
    }

    public function update_pengumuman(Request $request) {
        $pengumuman = Pengumuman::find($request->id_pengumuman);
        $pengumuman->title = $request->title_pengumuman;
        $pengumuman->date = $request->date_pengumuman;
        $pengumuman->content = $request->content_pengumuman;
        $pengumuman->save();
        return redirect('pengumuman_edit')->with('success', 'Pengumuman Dikemaskini');
    }

    public function delete_pengumuman(Request $request) {
        Pengumuman::where(["id"=>$request->umum_id])->delete();
        return redirect('pengumuman_edit')->with('success', 'Pengumuman Dibuang');
    }
}
