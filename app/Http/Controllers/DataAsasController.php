<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAsasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    public function data_asas_landing()
    {
        return view('/data_asas_landing');
    }

    public function data_asas_senarai()
    {
        return view('/data_asas_senarai');
    }

    public function data_asas_tatacara_mohon()
    {
        return view('/data_asas_tatacara_mohon');
    }

    public function data_asas_dokumen_berkaitan()
    {
        return view('/data_asas_dokumen_berkaitan');
    }

    public function penilaian()
    {
        return view('mygeo.penilaian');
    }

    public function penilaian_pemohon()
    {
        return view('mygeo.penilaian_pemohon');
    }

    public function proses_data()
    {
        return view('mygeo.proses_data');
    }

    public function mohon_data()
    {
        return view('mygeo.mohon_data');
    }

    public function mohon_data_asas()
    {
        return view('mygeo.mohon_data_asas');
    }

    public function muat_turun_data()
    {
        return view('mygeo.muat_turun_data');
    }

    public function status_permohonan()
    {
        return view('mygeo.status_permohonan');
    }

    public function senarai_data()
    {
        return view('mygeo.senarai_data');
    }

    public function kategori_kelas_data()
    {
        return view('mygeo.kategori_kelas_data');
    }

    public function kategori_kelas_kongsi_data()
    {
        return view('mygeo.kategori_kelas_kongsi_data');
    }

    public function harga_data()
    {
        return view('mygeo.harga_data');
    }

    public function permohonan_baru()
    {
        return view('mygeo.permohonan_baru');
    }

    public function mohon_data_asas_baru()
    {
        return view('mygeo.mohon_data_asas_baru');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
