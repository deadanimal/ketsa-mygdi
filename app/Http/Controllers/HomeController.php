<?php

namespace App\Http\Controllers;

use App\PanduanPengguna;
use Illuminate\Http\Request;
use App\Pengumuman;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->limit(5)->get();
        $panduan_pengguna = PanduanPengguna::get()->first();
        return view('landing',compact('pengumuman','panduan_pengguna'));
    }
}
