<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\AkuanPelajar;
use App\DokumenBerkaitan;
use App\SenaraiKawasanData;
use App\MohonData;
use App\ProsesData;
use App\PortalTetapan;
use App\Penilaian;
use App\SenaraiData;
use App\KelasKongsi;
use App\SuratBalasan;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\AuditTrail;
use phpDocumentor\Reflection\Types\Null_;

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
        $users_all = User::where(['disahkan' => 1])->orderBy('name')->get();
        $pentadbirdata = [];
        foreach($users_all as $user){
            if($user->hasRole('Pentadbir Data')){
                $pentadbirdata[]= $user;
            }else{

            }
        }
        $skdatas = SenaraiKawasanData::where('permohonan_id', $id)->get();
        $senarai_data = SenaraiData::orderBy('kategori','ASC')->get();
        $pemohon = MohonData::where('id', $id)->first();
        $dokumens = DokumenBerkaitan::where('permohonan_id', $id)->get();
        //  return $dokumens;

        return view('mygeo.mohon_data_asas_baru', compact('user', 'skdatas', 'pemohon','senarai_data','dokumens','pentadbirdata'));
    }

    public function data_asas_landing()
    {
        $portal = PortalTetapan::get()->first();
        return view('/data_asas_landing', compact('portal'));
    }

    public function data_asas_senarai()
    {
        $subs = SenaraiData::where([
            ['kategori','=','LOL']
        ])->get();
        $lapisan = SenaraiData::where([
            ['subkategori','=','LOL'],
        ])->get();
        $senarai_data = SenaraiData::orderBy('kategori')->get();

        $portal = PortalTetapan::get()->first();
        return view('/data_asas_senarai',[
            'senarai_data' => $senarai_data,
            'subs'=> $subs,
            'lapisan'=> $lapisan,
            'portal'=> $portal
        ]);
    }

    public function data_asas_senarai_show($senarai_data)
    {
        $kategori = SenaraiData::find($senarai_data);
        $subs = SenaraiData::where([
            ['kategori','=',$kategori->kategori]
        ])->get();
        $lapisan = SenaraiData::where([
            ['subkategori','=','LOL'],
        ])->get();
        $senarai_dataa = SenaraiData::all();
        $portal = PortalTetapan::get()->first();

        return view('/data_asas_senarai',[
            'senarai_data' => $senarai_dataa,
            'subs'=> $subs,
            'lapisan'=> $lapisan,
            'portal'=> $portal
        ]);
    }


    public function data_asas_senarai_show_show($senarai_data, $senarai_dataa)
    {
        $subkategori = SenaraiData::find($senarai_dataa);
        $kategori = SenaraiData::find($senarai_data);
        $subs = SenaraiData::where([
            ['kategori','=',$kategori->kategori],
        ])->get();
        $lapisan = SenaraiData::where([
            ['subkategori','=',$subkategori->subkategori],
        ])->get();
        $senarai_dataa = SenaraiData::all();
        $portal = PortalTetapan::get()->first();
        return view('/data_asas_senarai',[
            'senarai_data' => $senarai_dataa,
            'subs'=> $subs,
            'lapisan'=> $lapisan,
            'portal'=> $portal
        ]);
    }

    public function data_asas_tatacara_mohon()
    {
        $portal = PortalTetapan::get()->first();
        return view('/data_asas_tatacara_mohon',compact('portal'));
    }

    public function data_asas_dokumen_berkaitan()
    {
        $portal = PortalTetapan::get()->first();
        return view('/data_asas_dokumen_berkaitan',compact('portal'));
    }

    public function penilaian()
    {
        if (Auth::user()->hasRole(['Pentadbir Data','Super Admin'])) {
            $pemohons = MohonData::where(['dihantar' => 1])->orderBy('created_at', 'DESC')->get();
        } else {
            $pemohons = MohonData::with('users')
            ->where(['dihantar' => 1, 'status' => 3])
            ->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        }
        return view('mygeo.penilaian', compact('pemohons'));
    }

    public function penilaian_pemohon($id)
    {
        $penilaian = Penilaian::where('permohonan_id', $id)->first();
        $pemohon = MohonData::where('id', $id)->first();
        return view('mygeo.penilaian_pemohon',compact('pemohon','penilaian'));
    }

    public function store_penilaian(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:,png,jpeg,jpg|max:2048'
            // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpeg,jpg|max:2048'
        ]);

            if ($request->file()) {
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

                //save senarai data
                Penilaian::where(["permohonan_id" => $request->permohonan_id])->update([
                    "kategori" => $request->kategori,
                    "info_data" => $request->info_data,

                    "bhg_b_a" => $request->bhg_b_a,
                    "bhg_b_b" => $request->bhg_b_b,
                    "bhg_b_c" => $request->bhg_b_c,
                    "bhg_b_d" => $request->bhg_b_d,
                    "bhg_b_e" => $request->bhg_b_e,
                    "bhg_b_f" => $request->bhg_b_f,
                    "bhg_b_g" => $request->bhg_b_g,

                    "bhg_c_1" => $request->bhg_c_1,
                    "bhg_c_2" => $request->bhg_c_2,
                    "bhg_c_3" => $request->bhg_c_3,

                    "bhg_c_4_file_path" => $request->bhg_c_4_file_path = '/storage/' . $filePath,
                    "komen_cadangan" => $request->komen_cadangan,

                ]);
            } else {
                //save senarai data
                Penilaian::where(["permohonan_id" => $request->permohonan_id])->update([
                    "kategori" => $request->kategori,
                    "info_data" => $request->info_data,

                    "bhg_b_a" => $request->bhg_b_a,
                    "bhg_b_b" => $request->bhg_b_b,
                    "bhg_b_c" => $request->bhg_b_c,
                    "bhg_b_d" => $request->bhg_b_d,
                    "bhg_b_e" => $request->bhg_b_e,
                    "bhg_b_f" => $request->bhg_b_f,
                    "bhg_b_g" => $request->bhg_b_g,

                    "bhg_c_1" => $request->bhg_c_1,
                    "bhg_c_2" => $request->bhg_c_2,
                    "bhg_c_3" => $request->bhg_c_3,

                    "komen_cadangan" => $request->komen_cadangan,

                ]);
            }
            MohonData::where(["id" => $request->permohonan_id])->update([
                "penilaian" => $request->penilaian = 1,
            ]);

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Update';
            $at->save();



        return redirect('penilaian')->with('success', 'Penilaian disimpan!');
    }

    public function akuan_terima($id)
    {
        $pemohon = MohonData::where('id', $id)->first();
        return view('mygeo.akuan_terima',compact('pemohon'));
    }

    public function change_akuan_terima(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save acceptance data
            Mohondata::where(["id" => $request->permohonan_id])->update([
                "acceptance" => $request->acceptance,
            ]);

        });

        exit();
    }

    public function proses_data()
    {
        $pemohons = MohonData::where(['status' => 1,'dihantar' => 1])->get();
        $skdatas = SenaraiKawasanData::get();
        $proses = ProsesData::get();
        return view('mygeo.proses_data', compact('pemohons','skdatas','proses'));
    }

    public function update_proses_data(Request $request)
    {
        $valid_surat = SuratBalasan::where([
            ["permohonan_id","=", $request->permohonan_id],])
            ->whereNotNull('tajuk_surat')
            ->whereNotNull('no_rujukan')
            ->whereNotNull('no_rujukan_mohon')
            ->whereNotNull('date_mohon')
            ->get();

        // dd($valid_surat);
        if($valid_surat->isEmpty()){
            return redirect('/proses_data')->with('warning', 'Sila Kemaskini Surat Balasan');
        } else {

        ProsesData::where(["permohonan_id" => $request->permohonan_id])->update([
            "pautan_data" => $request->pautan_data,
            "tempoh" => $request->tempoh,
            "total_harga" => $request->total_harga,
        ]);

        Mohondata::where(["id" => $request->permohonan_id])->update([
            "status" => $request->status = 3,
        ]);

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();


        return redirect('/proses_data')->with('success', 'Data telah diproses');
        }
    }

    public function mohon_data()
    {
        $user = User::where(["id" => Auth::user()->id])->get()->first();
        if (Auth::user()->hasRole(['Pentadbir Data','Super Admin'])) {
            $pemohons = MohonData::orderBy('created_at', 'DESC')->get();
        } else {
            $pemohons = MohonData::with('users')
                ->where(['dihantar' => 0])
                ->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')
                ->get();
        }
        return view('mygeo.mohon_data', compact('pemohons', 'user'));
    }

    public function mohon_data_asas()
    {
        return view('mygeo.mohon_data_asas');
    }

    public function muat_turun_data()
    {
        $pemohons = MohonData::where(['dihantar' => 1])->get();
        return view('mygeo.muat_turun_data', compact('pemohons'));
    }

    public function status_permohonan()
    {
        $pemohons = MohonData::where(['dihantar' => 1])->get();
        return view('mygeo.status_permohonan', compact('pemohons'));
    }

    public function senarai_data()
    {
        $senarai_data = SenaraiData::orderBy('kategori','ASC')->get();
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
        $at->data = 'Create';
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
        $at->data = 'Update';
        $at->save();

        return redirect('/senarai_data')->with('success', 'Senarai Data Berjaya Dikemaskini');
    }

    public function delete_senarai_data(Request $request)
    {
        SenaraiData::where(["id" => $request->id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('senarai_data')->with('success', 'Data tersebut telah dibuang');
    }

    public function semakan_status()
    {
        $pemohons = MohonData::with('users')->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('mygeo.semakan_status', compact('pemohons'));
    }

    public function kategori_kelas_kongsi_data()
    {
        $kategori = KelasKongsi::orderby('subcategory')->get();
        return view('mygeo.kategori_kelas_kongsi_data',compact('kategori'));
    }

    public function update_kelas_kongsi(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save senarai data
            KelasKongsi::where(["id" => $request->id_kelas_kongsi])->update([
                "category" => $request->kategori,
                "subcategory" => $request->subkategori,
                "status" => $request->status,
            ]);
        });

        return redirect('/kategori_kelas_kongsi_data')->with('success', 'Data Berjaya Dikemaskini');
    }

    public function surat_balasan($id)
    {
        $surat = SuratBalasan::where('permohonan_id', $id)->first();
        $pemohon = MohonData::where('id', $id)->first();
        return view('mygeo.surat_balasan', compact('pemohon','surat'));
    }

    public function update_surat_balasan(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save senarai data
            SuratBalasan::where(["permohonan_id" => $request->permohonan_id])->update([
                "no_rujukan" => $request->no_rujukan,
                "tajuk_surat" => $request->tajuk_surat,
                "no_rujukan_mohon" => $request->no_rujukan_mohon,
                "date_mohon" => $request->date_mohon,
            ]);

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Update';
            $at->save();
        });
        return redirect('proses_data')->with('success', 'Surat Balasan Disimpan');
    }

    public function akuan_pelajar($id)
    {
        $akuan = AkuanPelajar::where('permohonan_id', $id)->first();
        $pemohon = MohonData::where('id', $id)->first();
        return view('mygeo.akuan_pelajar', compact('pemohon','akuan'));
    }

    public function update_akuan_pelajar(Request $request)
    {

        $valid_file = AkuanPelajar::where([
            ["permohonan_id","=", $request->permohonan_id],])
            ->whereNull('digital_sign')
            ->get();

// dd($valid_file);
         if($valid_file->isEmpty()){
            $request->validate([
                'file' => 'mimes:png,jpeg,jpg|max:2048'
                // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpeg,jpg|max:2048'
            ]);
        }

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('signatures', $fileName, 'public');
            //save senarai data
            AkuanPelajar::where(["permohonan_id" => $request->permohonan_id])->update([
                "title" => $request->title,
                "peta_topo_a" => $request->peta_topo_a,
                "peta_topo_b" => $request->peta_topo_b,
                "peta_topo_c" => $request->peta_topo_c,
                "foto_udara_a" => $request->foto_udara_a,
                "foto_udara_b" => $request->foto_udara_b,
                "foto_udara_c" => $request->foto_udara_c,
                "lain_a" => $request->lain_a,
                "lain_b" => $request->lain_b,
                "lain_c" => $request->lain_c,
                "digital_sign" => $request->digital_sign = '/storage/' . $filePath,

            ]);

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Update';
            $at->save();

            $id = $request->permohonan_id;
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Akuan Pelajar Disimpan');

        } elseif($valid_file->isEmpty()) {

            //save senarai data
            AkuanPelajar::where(["permohonan_id" => $request->permohonan_id])->update([
                "title" => $request->title,
                "peta_topo_a" => $request->peta_topo_a,
                "peta_topo_b" => $request->peta_topo_b,
                "peta_topo_c" => $request->peta_topo_c,
                "foto_udara_a" => $request->foto_udara_a,
                "foto_udara_b" => $request->foto_udara_b,
                "foto_udara_c" => $request->foto_udara_c,
                "lain_a" => $request->lain_a,
                "lain_b" => $request->lain_b,
                "lain_c" => $request->lain_c,

            ]);

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Update';
            $at->save();

            $id = $request->permohonan_id;
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Akuan Pelajar Disimpan');

        } else {

            $id = $request->permohonan_id;
            return redirect()->action('DataAsasController@akuan_pelajar', ['id' => $id])->with('warning', 'Sila Lengkapkan Borang ini Berserta Tandatangan');
        }



    }

    public function permohonan_baru()
    {
        $pemohons = MohonData::where(['dihantar' => 1,'status' => 0])->get();
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
        $id = $request->permohonan_id;

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        $valid = SenaraiData::where([
            ["kategori","=", $request->kategori],
            ["subkategori","=", $request->subkategori],
            ["lapisan_data","=", $request->lapisan_data],
        ])->first();
        if(empty($valid)){
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('warning', 'Padanan Data Senarai dan Kawasan Salah!');
        } else {
            $skdata->harga_data = $valid->harga_data;
            $skdata->save();
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Data Senarai dan Kawasan ditambah!');
        }

    }

    public function update_senarai_kawasan(Request $request)
    {
        $valid = SenaraiData::where([
            ["kategori","=", $request->kategori],
            ["subkategori","=", $request->subkategori],
            ["lapisan_data","=", $request->lapisan_data],
        ])->first();

        if(empty($valid))
            {
                return redirect()->back()->with('warning', 'Sila pilih padanan lapisan data yang betul');
            }
            else
            {
                DB::transaction(function () use ($request, $valid) {
                    //update senarai kawasan data
                    SenaraiKawasanData::where(["id" => $request->sk_id])->update([
                        "kategori" => $request->kategori,
                        "subkategori" => $request->subkategori,
                        "lapisan_data" => $request->lapisan_data,
                        "kawasan_data" => $request->kawasan_data,
                        "harga_data" => $valid->harga_data,
                    ]);

                });

                $at = new AuditTrail();
                $at->path = url()->full();
                $at->user_id = Auth::user()->id;
                $at->data = 'Update';
                $at->save();

                $id = $request->permohonan_id;
                return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Data Senarai dan Kawasan Telah Dikemaskini.');

            }


    }

    public function delete_senarai_kawasan(Request $request)
    {
        SenaraiKawasanData::where(["id" => $request->sk_id])->delete();
        return redirect()->back()->with('success', 'Data Senarai dan Kawasan dibuang!');
    }

    public function kemaskini_permohonan(Request $request)
    {
        if(Auth::user()->hasRole(['Pentadbir Data','Super Admin']))
        {
            DB::transaction(function () use ($request) {
                //simpan status permohonan ini
                MohonData::where(["id" => $request->permohonan_id])->update([
                    "status" => $request->status,
                    "catatan" => $request->catatan,
                    "assign_admin" => $request->assign_admin,
                ]);

                $at = new AuditTrail();
                $at->path = url()->full();
                $at->user_id = Auth::user()->id;
                $at->data = 'Update';
                $at->save();
            });
            return redirect('permohonan_baru')->with('success', 'Permohonan Berjaya Dihantar');
        }
        elseif(Auth::user()->hasRole(['Pemohon Data']))
        {
            DB::transaction(function () use ($request) {
                //simpan status permohonan ini
                MohonData::where(["id" => $request->permohonan_id])->update([
                    "name" => $request->name,
                    "tujuan" => $request->tujuan,
                ]);

                $at = new AuditTrail();
                $at->path = url()->full();
                $at->user_id = Auth::user()->id;
                $at->data = 'Update';
                $at->save();
            });
            return redirect('mohon_data')->with('success', 'Draf Permohonan Berjaya Disimpan');
        }

    }

    public function hantar_permohonan(Request $request)
    {

        $valid_akuan_pelajar = AkuanPelajar::where([
            ["permohonan_id","=", $request->permohonan_id],])
            ->whereNotNull('title')
            ->whereNotNull('digital_sign')
            ->get();

        $valid = SenaraiKawasanData::where([
            ["permohonan_id","=", $request->permohonan_id],
        ])->get();
        $validfile = DokumenBerkaitan::where([
            ["permohonan_id","=", $request->permohonan_id],
        ])->get();


        $id = $request->permohonan_id;
        // dd($valid,$validfile);

        if($valid->isNotEmpty() && $validfile->isNotEmpty())
        {
            MohonData::where(["id" => $request->permohonan_id])->update([
                "dihantar" => $request->dihantar = 1,
            ]);
            return redirect('mohon_data')->with('success', 'Permohonan anda berjaya dihantar');

        }
        else {
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('warning', 'Sila Lengkapkan Permohonan Anda');
        }

        if($valid_akuan_pelajar->isEmpty()){
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('warning', 'Sila Lengkapkan Borang Akuan Pelajar');
        }



    }

    public function store_permohonan_baru(Request $request)
    {
        //return $request;
        $user = User::where(["id" => Auth::user()->id])->get()->first();

        $mdata = new MohonData();
        $mdata->name = $request->name;
        $mdata->date = $request->date;
        $mdata->tujuan = $request->tujuan;
        $mdata->dihantar = $request->dihantar = 0;
        $mdata->status = $request->status = 0;
        $mdata->acceptance = $request->acceptance = 0;
        $mdata->penilaian = $request->penilaian = 0;
        $mdata->user_id = $request->user_id = $user->id;
        $mdata->save();

        $valuation = new Penilaian();
        $valuation->permohonan_id = $request->permohonan_id = $mdata->id;
        $valuation->save();

        $proses = new ProsesData();
        $proses->permohonan_id = $request->permohonan_id = $mdata->id;
        $proses->save();

        $surat = new SuratBalasan();
        $surat->permohonan_id = $request->permohonan_id = $mdata->id;
        $surat->save();

        if($user->kategori == '2_g2e_iptsPelajar' || $user->kategori == '2_g2e_iptaPelajar'){
            $akuan_pelajar = new AkuanPelajar();
            $akuan_pelajar->permohonan_id = $request->permohonan_id = $mdata->id;
            $akuan_pelajar->save();
        }

        $id = $request->permohonan_id;

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Permohonan baru telah ditambah. Sila lengkapkan maklumat permohonan.');
    }


    public function store_dokumen_berkaitan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
            // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpeg,jpg|max:2048'
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
            $at->data = 'Create';
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

        $user = User::where(["id" => Auth::user()->id])->get()->first();

        MohonData::where(["id" => $request->user_id])->delete();
        SenaraiKawasanData::where(["id" => $request->permohonan_id])->delete();
        DokumenBerkaitan::where(["id" => $request->permohonan_id])->delete();
        Penilaian::where(["id" => $request->permohonan_id])->delete();
        SuratBalasan::where(["id" => $request->permohonan_id])->delete();
        ProsesData::where(["id" => $request->permohonan_id])->delete();

        if($user->kategori == '2_g2e_iptsPelajar' || $user->kategori == '2_g2e_iptaPelajar'){
            AkuanPelajar::where(["id" => $request->permohonan_id])->delete();
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('mohon_data')->with('success', 'Permohonan Data dibuang!');
    }
}
