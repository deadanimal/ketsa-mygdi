<?php

namespace App\Http\Controllers;

use App\AgensiOrganisasi;
use App\PanduanPengguna;
use App\Pengumuman;
use App\PortalTetapan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $portal = PortalTetapan::get()->first();
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->limit(5)->get();
        $panduan_pengguna = PanduanPengguna::get()->first();
        return view('landing', compact('pengumuman', 'panduan_pengguna', 'portal'));
    }

    public function adminpentadbir()
    {
        $agensi = AgensiOrganisasi::all();

        $user = User::where('email', 'pentadbirdata1@pipeline.com')->where('assigned_roles', 'Pentadbir Data')->first();
        return view('adminpentadbirsetup', compact('agensi', 'user'));
    }

    public function simpanadminpentadbir(Request $request)
    {
        $haveuser = User::where('email', 'pentadbirdata1@gmail.com')->where('assigned_roles', 'Pentadbir Data')->count();

        if ($haveuser == "0") {
            $request['password'] = Hash::make($request->password1);
            $request['email'] = 'pentadbirdata1@gmail.com';
            $user = User::create($request->all());
            $user->assignRole($request->assigned_roles);
        } else {
            // dd('belum buat update');
            User::where(['email', 'pentadbirdata1@gmail.com'])->first()->update($request->all());
        }

        return back();
    }

}
