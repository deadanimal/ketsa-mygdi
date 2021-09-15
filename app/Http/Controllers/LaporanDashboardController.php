<?php

namespace App\Http\Controllers;

use App\LaporanDashboard;
use App\MohonData;
use App\SenaraiKawasanData;
use Illuminate\Http\Request;
use DB;

class LaporanDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_laporan_data()
    {
        $permohonans = MohonData::get();

        $permohonan_lulus = MohonData::where(['status' => 3])->get();
        $permohonan_kategori = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->select('agensi_organisasi.name','users.kategori',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                                ->groupBy('users.name','agensi_organisasi.name','users.kategori')
                                ->get();
        $permohonan_statistik = DB::table('users')
                                ->join('mohon_data','users.id','=','mohon_data.user_id')
                                ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                                ->select(DB::raw('EXTRACT( year from mohon_data.date) as tahun'),DB::raw('agensi_organisasi.name as agensi_name'),DB::raw('count(*) as total_permohonan'))
                                ->groupBy('agensi_organisasi.name','tahun')
                                ->get();
        // dd($permohonan_statistik);
        $permohonan_count = count($permohonans);
        return view('mygeo.laporan_data_asas', compact('permohonans','permohonan_kategori','permohonan_lulus','permohonan_statistik','permohonan_count'));
    }

    public function index_mygeo_dashboard(){
        $total_permohonan = MohonData::where('status','!=',0)->get()->count();
        $total_permohonan_lulus = MohonData::where('status','=',3)->get()->count();
        $total_permohonan_tolak = MohonData::where('status','=',2)->get()->count();

        return view('mygeo.dashboard', compact('total_permohonan',));
    }

    public function laporan_data_detail($id){

        $permohonan = MohonData::where('id', $id)->first();
        $senarai_kawasan = SenaraiKawasanData::where('permohonan_id', $id)->get();

        return view('mygeo.laporan_data_perincian', compact('permohonan','senarai_kawasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanDashboard $laporanDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanDashboard $laporanDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanDashboard $laporanDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanDashboard  $laporanDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanDashboard $laporanDashboard)
    {
        //
    }
}
