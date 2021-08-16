<?php

namespace App\Http\Controllers;

use App\DokumenBerkaitan;
use App\SenaraiKawasanData;
use App\MohonData;
use App\SenaraiData;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\AuditTrail;

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
        $pemohons = MohonData::all();
        return view('mygeo.proses_data', compact('pemohons'));
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
        $pemohons = MohonData::all();
        return view('mygeo.status_permohonan', compact('pemohons'));
    }

    public function senarai_data()
    {
        $senarai_data = SenaraiData::all();
        return view('mygeo.senarai_data', compact('senarai_data'));
    }

    public function store_senarai_data(Request $request)
    {
        $senarai_data = new SenaraiData();

        $senarai_data->kategori = $request->kategori;
        $senarai_data->subkategori = $request->subkategori;
        $senarai_data->lapisan_data = $request->lapisan_data;

        $senarai_data->data_id = $request->data_id;

        $senarai_data->save();
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();

        return redirect('senarai_data')->with('success', 'Permohonan ditambah. Sila klik pautan berkenaan');
    }

    public function update_senarai_data(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save senarai data
            SenaraiData::where(["id" => $request->id_senarai_data])->update([
                "kategori" => $request->kategori,
                "subkategori" => $request->subkategori,
                "lapisan_data" => $request->lapisan_data,
                "kategori_pemohon" => $request->kategori_pemohon,
                "kelas" => $request->kelas,
                "status" => $request->status,
                "harga_data" => $request->harga_data,
            ]);
        });
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();

        return redirect('/senarai_data')->with('success', 'Senarai Data Berjaya Dikemaskini');
    }

    public function delete_senarai_data(Request $request)
    {
        SenaraiData::where(["id" => $request->id])->delete();
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();
        
        return redirect('senarai_data')->with('success', 'Data tersebut telah dibuang');
    }

    public function kategori_kelas_data()
    {
        $senarai_data = SenaraiData::all();
        return view('mygeo.kategori_kelas_data', compact('senarai_data'));
    }

    public function kategori_kelas_kongsi_data()
    {
        $senarai_data = SenaraiData::all();
        return view('mygeo.kategori_kelas_kongsi_data',compact('senarai_data'));
    }

    public function harga_data()
    {
        $senarai_data = SenaraiData::all();
        return view('mygeo.harga_data',compact('senarai_data'));
    }

    public function permohonan_baru()
    {
        $pemohons = MohonData::all();
        return view('mygeo.permohonan_baru', compact('pemohons'));
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
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();

        // return redirect('mohon_data');
        return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Data Senarai dan Kawasan ditambah!');
    }

    public function delete_senarai_kawasan(Request $request)
    {
        SenaraiKawasanData::where(["id" => $request->permohonan_id])->delete();
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();

        return redirect('mohon_data')->with('success', 'Data Senarai dan Kawasan dibuang!');
    }

    public function hantar_permohonan(Request $request)
    {
        DB::transaction(function () use ($request) {
            //hantar permohonan to admin
            MohonData::where(["id" => $request->permohonan_id])->update([
                "status" => $request->kategori,
                "assign_admin" => $request->subkategori,
                "lapisan_data" => $request->lapisan_data,
                "kategori_pemohon" => $request->kategori_pemohon,
                "kelas" => $request->kelas,
                "status" => $request->status,
                "harga_data" => $request->harga_data,
            ]);
        });
    }

    public function store_permohonan_baru(Request $request)
    {
        //return $request;

        $mdata = new MohonData();

        $mdata->name = $request->name;
        $mdata->date = $request->date;
        $mdata->tujuan = $request->tujuan;

        $mdata->user_id = $request->user_id;

        $mdata->save();

        $id = $request->permohonan_id;
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();

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
            
            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->save();

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
        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->save();

        return redirect('mohon_data')->with('success', 'Permohonan Data dibuang!');
    }
}
