<?php

namespace App\Http\Controllers;

use App\LaporanDashboard;
use App\MohonData;
use App\SenaraiKawasanData;
use Illuminate\Http\Request;
use DB;
use PDF;

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
                                ->join('senarai_kawasan_data','mohon_data.id','=','senarai_kawasan_data.permohonan_id')
                                ->select('agensi_organisasi.name','senarai_kawasan_data.kategori',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                                ->groupBy('users.name','agensi_organisasi.name','senarai_kawasan_data.kategori')
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
        $total_permohonan = MohonData::get()->count();
        $total_permohonan_lulus = MohonData::where('status','=',3)->get()->count();
        $total_permohonan_tolak = MohonData::where('status','=',2)->get()->count();
        $permohonans = DB::table('mohon_data')
                                ->select(DB::raw('EXTRACT( year from date) as tahun'),DB::raw('count(*) as total_permohonan'))
                                ->groupBy('tahun')
                                ->get();
        $permohonan_kategori = DB::table('mohon_data')
                                ->join('senarai_kawasan_data','mohon_data.id','=','senarai_kawasan_data.permohonan_id')
                                ->select('senarai_kawasan_data.kategori',DB::raw('count(*) as total'))
                                ->groupBy('senarai_kawasan_data.kategori')
                                ->get();
        // dd($permohonan_kategori);


        return view('mygeo.dashboard', compact('permohonan_kategori','total_permohonan','total_permohonan_lulus','total_permohonan_tolak','permohonans'));
    }

    public function laporan_data_detail($id){

        $permohonan = MohonData::where('id', $id)->first();
        $senarai_kawasan = SenaraiKawasanData::where('permohonan_id', $id)->get();

        return view('mygeo.laporan_data_perincian', compact('permohonan','senarai_kawasan'));
    }

    public function generate_pdf_laporan_perincian_data(Request $request){

        $permohonan = MohonData::where('id', $request->permohonan_id)->first();
        $senarai_kawasan = SenaraiKawasanData::where('permohonan_id', $request->permohonan_id)->get();
        $pdf = PDF::loadView('pdfs.laporan_data', compact('senarai_kawasan','permohonan'));

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        return $pdf->stream();
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
