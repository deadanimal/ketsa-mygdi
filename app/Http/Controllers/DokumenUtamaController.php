<?php

namespace App\Http\Controllers;

use Auth;
use App\DokumenUtama;
use App\AuditTrail;
use Illuminate\Http\Request;

class DokumenUtamaController extends Controller
{
    public function index()
    {
        $dokumen_utama = DokumenUtama::where('id','!=','1')->get();
        $dokumen_desc = DokumenUtama::where('id',1)->first();
        return view('data_asas_dokumen_berkaitan',compact('dokumen_utama','dokumen_desc'));
    }

    public function edit_dokumen()
    {
        $dokumen_utama = DokumenUtama::where('id','!=','1')->get();
        $dokumen_desc = DokumenUtama::where('id',1)->first();
        if($dokumen_desc == null){
            $dokumen = new DokumenUtama();
            $dokumen->doc_name = 'content';
            $dokumen->save();
        }
        return view('mygeo.dokumen_utama',compact('dokumen_utama','dokumen_desc'));
    }

    public function store_tajuk_dokumen(Request $request){

        if($request->tajuk_dokumen != null){
            // dd($request->tajuk_dokumen);
            $dokumen = new DokumenUtama();
            $dokumen->doc_name = $request->tajuk_dokumen;
            $dokumen->save();

            return redirect('/dokumen_utama_edit')->with('success', 'Dokumen Utama Disimpan');
        } else {
            return redirect('/dokumen_utama_edit')->with('info', 'Tiada Dokumen Utama Disimpan');
        }

    }

    public function update_dokumen(Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf|max:2048'
        ]);

        if ($request->file) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('dokumen_utama', $fileName, 'public');
            $docPath = '/storage/' . $filePath;

            // dd($iconPath);
                DokumenUtama::where(["id" => $request->id_dokumen])->update([
                    "doc_name" => $request->title_dokumen,
                    "doc_type" => $request->type_dokumen,
                    "doc_path" => $docPath,
                ]);

        } else {
            DokumenUtama::where(["id" => $request->id_dokumen])->update([
                "doc_name" => $request->title_dokumen,
                "doc_type" => $request->type_dokumen,
            ]);
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('/dokumen_utama_edit')->with('success', 'Dokumen Utama Dikemaskini');

    }

    public function update_dokumen_desc(Request $request)
    {

        // dd($request->content_dokumen);
        DokumenUtama::where(["id" => 1])->update([
            "content" => $request->content_dokumen
        ]);

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('/dokumen_utama_edit')->with('success', 'Arahan Dokumen Berkaitan Dikemaskini');
    }

    public function delete_dokumen(Request $request)
    {
        DokumenUtama::where(["id" => $request->dokumen_id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('/dokumen_utama_edit')->with('success', 'Dokumen Utama Dibuang');
    }
}
