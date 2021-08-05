<?php

namespace App\Http\Controllers;

use App\DokumenBerkaitan;
use App\SenaraiKawasanData;
use App\MohonData;
use Illuminate\Http\Request;
use App\User;
use Auth;

class DataAsasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $id;
        $user = User::where(["id" => Auth::user()->id])->get()->first();
        $skdatas = SenaraiKawasanData::all();

        $pemohon = MohonData::all();

        return view('mygeo.mohon_data_asas_baru', compact('user', 'skdatas', 'pemohon'));
    }

    public function tambah($id)
    {
        #return $id;
        $user = User::where(["id" => Auth::user()->id])->get()->first();
        $skdatas = SenaraiKawasanData::where('permohonan_id', $id)->get();

        $pemohon = MohonData::where('id', $id)->first();
        $dokumens = DokumenBerkaitan::where('permohonan_id', $id)->get();
        //  return $dokumens;

        return view('mygeo.mohon_data_asas_baru', compact('user', 'skdatas', 'pemohon', 'dokumens'));
    }

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

        $user = User::where(["id" => Auth::user()->id])->get()->first();
        if ($user->id == 1) {
            $pemohons = MohonData::all();
        } else {
            $pemohons = MohonData::with('users')->where('user_id', '=', Auth::user()->id)->get();
        }
        return view('mygeo.mohon_data', compact('pemohons', 'user'));
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

    public function store_senarai_kawasan(Request $request)
    {

        // return $request;
        $skdata = new SenaraiKawasanData();

        $skdata->lapisan_data = $request->lapisan_data;
        $skdata->kategori = $request->kategori;
        $skdata->subkategori = $request->subkategori;
        $skdata->kawasan_data = $request->kawasan_data;

        $skdata->permohonan_id = $request->permohonan_id;

        $skdata->save();

        //$skdata;
        $id = $request->permohonan_id;

        // return redirect('mohon_data');
        return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Data Senarai dan Kawasan ditambah!');
    }

    public function delete_senarai_kawasan(Request $request)
    {
        SenaraiKawasanData::where(["id" => $request->permohonan_id])->delete();

        return redirect('mohon_data')->with('success', 'Data Senarai dan Kawasan dibuang!');
    }

    public function store_permohonan_baru(Request $request)
    {
        //return $request;

        $mdata = new MohonData();

        $mdata->nama_permohonan = $request->nama_permohonan;
        $mdata->date_permohonan = $request->date_permohonan;
        $mdata->tujuan_permohonan = $request->tujuan_permohonan;

        $mdata->user_id = $request->user_id;

        $mdata->save();

        $id = $request->permohonan_id;

        // return redirect()->action('DataAsasController@tambah', ['id' => $id]);
        return redirect('mohon_data')->with('success', 'Permohonan ditambah. Sila klik pautan berkenaan');
    }



    public function store_dokumen_berkaitan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpeg,jpg|max:2048'
        ]);

        $failModel = new DokumenBerkaitan();

        if ($request->file()) {
            $failNama = time() . '_' . $request->file->getClientOriginalName();
            $failPath = $request->file('file')->storeAs('uploads', $failNama, 'public');
            $failModel->tajuk_dokumen = $request->tajuk_dokumen;
            $failModel->nama_fail = time() . '_' . $request->file->getClientOriginalName();
            $failModel->file_path = '/storage/' . $failPath;
            $failModel->permohonan_id = $request->permohonan_id;
            $failModel->save();

            return back()
                ->with('success', 'Dokumen telah berjaya dimuat naik.')
                ->with('file', $failNama);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    { }

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

    public function delete_permohonan(Request $request)
    {
        MohonData::where(["id" => $request->user_id])->delete();
        SenaraiKawasanData::where(["id" => $request->permohonan_id])->delete();
        DokumenBerkaitan::where(["id" => $request->permohonan_id])->delete();

        return redirect('mohon_data')->with('success', 'Permohonan Data dibuang!');
    }
}
