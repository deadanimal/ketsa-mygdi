<?php

namespace App\Http\Controllers;

use App\KategoriSenaraiData;
use App\SenaraiData;
use App\SubKategoriSenaraiData;
use Illuminate\Http\Request;

class SenaraiDataController extends Controller
{
    public function get_kategori(Request $request){
        $kat = KategoriSenaraiData::get();
        $error = '0';
        $msg = "";
        if(count($kat) == 0){
            $error = '1';
            $msg = "Tiada Kategori dijumpai";
        }
        echo json_encode(["kategori"=>$kat,"msg"=>$msg,"error"=>$error]);
        exit();
    }

    public function get_subkategori(Request $request){
        $sub = SubKategoriSenaraiData::where('kategori_id', $request->kategori_id)->get();
        $error = '0';
        $msg = "";
        if(count($sub) == 0){
            $error = '1';
            $msg = "Tiada Subkategori dijumpai";
        }
        echo json_encode(["subkategori"=>$sub,"msg"=>$msg,"error"=>$error]);
        exit();
    }

    public function get_lapisan_data(Request $request){
        $kategori= KategoriSenaraiData::where(['id' => $request->kategori_id])->first();
        $lapisan = SenaraiData::where(['kategori' => $kategori->name,
        'subkategori' => $request->subkategori])->get();
        $error = '0';
        $msg = "";
        if(count($lapisan) == 0){
            $error = '1';
            $msg = "Tiada Lapisan Data dijumpai";
        }
        echo json_encode(["lapisan"=>$lapisan,"msg"=>$msg,"error"=>$error]);
        exit();
    }
}
