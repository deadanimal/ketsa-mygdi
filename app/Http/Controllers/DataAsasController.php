<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use Carbon\Carbon;
use App\AkuanPelajar;
use App\DokumenBerkaitan;
use App\SenaraiKawasanData;
use App\MohonData;
use App\ProsesData;
use App\PortalTetapan;
use App\Penilaian;
use App\SenaraiData;
use App\KategoriSenaraiData;
use App\SubKategoriSenaraiData;
use App\KelasKongsi;
use App\SuratBalasan;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\AuditTrail;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use PDF;
use \setasign\Fpdi\Fpdi;

use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

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

        $permohonan = MohonData::all();

        return view('mygeo.mohon_data_asas_baru', compact('user', 'skdatas', 'permohonan'));
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
        $senarai_data = SenaraiData::where('status','Tersedia')->distinct('subkategori')->get();
        $lapisandata = DB::table('senarai_data')
                                ->where('status','Tersedia')
                                ->select('subkategori','lapisan_data')
                                ->groupBy('subkategori','lapisan_data')
                                ->get();
        $kategori_senarai_data  = SenaraiData::where('status','Tersedia')->distinct('kategori')->get();
        $permohonan = MohonData::where('id', $id)->first();
        $dokumens = DokumenBerkaitan::where('permohonan_id', $id)->get();
        //  return $dokumens;

        return view('mygeo.mohon_data_asas_baru', compact('user', 'skdatas', 'permohonan','senarai_data','dokumens','pentadbirdata','kategori_senarai_data','lapisandata'));
    }

    public function data_asas_landing()
    {
        $portal = PortalTetapan::get()->first();
        return view('/data_asas_landing', compact('portal'));
    }

    public function data_asas_senarai()
    {
        $subs = SenaraiData::where([
            ['kategori','=','LOL'],
            ['status','=','Tersedia']
        ])->distinct('subkategori')->get();
        $lapisan = SenaraiData::where([
            ['subkategori','=','LOL'],
            ['status','=','Tersedia']
        ])->get();
        $senarai_data = SenaraiData::orderBy('kategori')->distinct('kategori')->get();
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
            ['kategori','=',$kategori->kategori],
            ['status','=','Tersedia']
        ])->distinct('subkategori')->get();
        $lapisan = SenaraiData::where([
            ['subkategori','=','LOL'],
            ['status','=','Tersedia']
        ])->get();
        $senarai_dataa = SenaraiData::orderBy('kategori')->distinct('kategori')->get();
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
            ['status','=','Tersedia']
        ])->distinct('subkategori')->get();
        $lapisan = SenaraiData::where([
            ['subkategori','=',$subkategori->subkategori],
            ['status','=','Tersedia']
        ])->get();
        $senarai_dataa = SenaraiData::orderBy('kategori')->distinct('kategori')->get();
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
        if (Auth::user()->hasRole(['Pentadbir Data','Super Admin','Pentadbir Aplikasi'])) {
            $permohonan_list = MohonData::where(['dihantar' => 1])->orderBy('created_at', 'DESC')->get();
        } else {
            $permohonan_list = MohonData::with('users')
            ->where(['dihantar' => 1, 'status' => 3])
            ->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        }
        return view('mygeo.penilaian', compact('permohonan_list'));
    }

    public function penilaian_pemohon($id)
    {
        $penilaian = Penilaian::where('permohonan_id', $id)->first();
        $permohonan = MohonData::where('id', $id)->first();
        return view('mygeo.penilaian_pemohon',compact('permohonan','penilaian'));
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
        $permohonan = MohonData::where('id', $id)->first();
        return view('mygeo.akuan_terima',compact('permohonan'));
    }

    public function change_akuan_terima(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save acceptance data
            $vals = [];
            if($request->acceptance == '1'){
                $vals["threeHourNotifyStart"] = date('Y-m-d H:i:s',time());
            }
            $vals["acceptance"] = $request->acceptance;
            MohonData::where(["id" => $request->permohonan_id])->update($vals);
        });

        exit();
    }

    public function checkThreeHourNotifySelesaiMuatTurun(Request $request)
    {
        $permohonanMoreThan3Hours = [];
        //get mohon_data where threeHourNotifyStart is not null
        $mohonData_3hourNotify = MohonData::where('berjayaMuatTurunStatus','0')->where('user_id',Auth::user()->id)->get();
        if(count($mohonData_3hourNotify) > 0){
            foreach($mohonData_3hourNotify as $m){
                $interval = date_create(date('Y-m-d H:i:s',time()))->diff(date_create($m->threeHourNotifyStart));
//                if($interval->h > 3){ //ori specs
//                $permohonanMoreThan3Hours[$m->id] = $m->id.'___'.$interval->s;
                if($interval->s > 0){
                    $permohonanMoreThan3Hours[$m->id] = $m->name;
                    $vals = [];
                    $vals["threeHourNotifyStart"] = date('Y-m-d H:i:s',time());
                    MohonData::where(["id" => $m->id])->update($vals);
                }
            }
        }
        echo json_encode($permohonanMoreThan3Hours);
        exit();
    }

    public function berjayaMuatTurun(Request $request)
    {
        $mohons = explode(',',substr($request->mohons, 0, -1));
        foreach($mohons as $m){
            $vals = [];
            $vals["berjayaMuatTurunStatus"] = '1';
            $vals["download"] = '1';
            $vals["berjayaMuatTurunTarikh"] = date('Y-m-d H:i:s',time());
            $vals["emailPenilaianStart"] = date('Y-m-d H:i:s',time());
            MohonData::where(["id" => $m])->update($vals);

            //send email to pemohon data to do penilaian
            $m2 = MohonData::where('id',$m)->get()->first();
            $to_name = Auth::user()->name;
            $to_email = Auth::user()->email;
            $data = array('m'=>$m2);
            Mail::send("mails.exmpl17", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("MyGeo Explorer - Penilaian bagi data yang dimuat turun");
                $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
            });
        }
        exit();
    }

    public function proses_data()
    {
        if (!Auth::user()->hasRole(['Pentadbir Data','Super Admin','Pentadbir Aplikasi'])) {
            return redirect('/mygeo_profil');
        } 
        $permohonan_list = MohonData::where(['status' => 1,'dihantar' => 1])->get();
        $skdatas = SenaraiKawasanData::get();
        $proses = ProsesData::get();
        return view('mygeo.proses_data', compact('permohonan_list','skdatas','proses'));
    }

    public function update_proses_data(Request $request)
    {
        $append = [];
        foreach ($request->pautan_data as $key => $value) {
            if($value != null ){
                $append[] = $value;
            }
        }
        // dd($append);

        $id = $request->permohonan_id;
        $valid_surat = SuratBalasan::where([
            ["permohonan_id","=", $request->permohonan_id],])
            ->whereNotNull('tajuk_surat')
            ->whereNotNull('no_rujukan')
            ->whereNotNull('no_rujukan_mohon')
            ->whereNotNull('date_mohon')
            ->get();


        $skdatas = SenaraiKawasanData::where(["permohonan_id" => $request->permohonan_id])->get();
        // dd($valid_surat);
        if($valid_surat->isEmpty()){

            ProsesData::where(["permohonan_id" => $request->permohonan_id])->update([
                "pautan_data" => json_encode($append),
                "tempoh_url" => $request->tempoh,
                "total_harga" => $request->total_harga,
            ]);
            foreach ($skdatas as $sk ) {
                SenaraiKawasanData::where(["id" => $sk->id])->update([
                    "saiz_data" => $request->input('saiz_data_'.$sk->id),
                ]);

            }
            return redirect()->action('DataAsasController@surat_balasan', ['id' => $id])->with('warning', 'Sila Kemaskini Surat Balasan');
        } else {

            ProsesData::where(["permohonan_id" => $request->permohonan_id])->update([
                "pautan_data" => $request->pautan_data,
                "tempoh_url" => $request->tempoh,
                "total_harga" => $request->total_harga,
            ]);

            Mohondata::where(["id" => $request->permohonan_id])->update([
                "status" => $request->status = 3,
            ]);

            foreach ($skdatas as $sk ) {
                SenaraiKawasanData::where(["id" => $sk->id])->update([
                    "saiz_data" => $request->input('saiz_data_'.$sk->id),
                ]);

            }

            //====attachement for email=========================================
//            $permohonan = DB::table('users')
//                    ->join('mohon_data','users.id','=','mohon_data.user_id')
//                    ->where('mohon_data.id',$request->permohonan_id)
//                    ->select('users.nric','users.alamat','mohon_data.date','mohon_data.id',DB::raw('count(*) as total'),DB::raw('users.name as username'))
//                    ->groupBy('users.nric','users.name','users.alamat','mohon_data.date','mohon_data.id')
//                    ->first();
//            $user = User::where('nric',$permohonan->nric)->get()->first();
//            if($user->hasRole('Pemohon Data')){
//                $agensi_name = $user->agensi_organisasi;
//            }else{
//                $agensi_name = $user->agensiOrganisasi->name;
//            }
//            $surat = SuratBalasan::where('permohonan_id', $request->permohonan_id)->first();
//            $pdf = PDF::loadView('pdfs.surat_balasan', compact('surat','permohonan','agensi_name'));
//            $pdf->setPaper('A4', 'potrait');
//            $file = $pdf->download()->getOriginalContent();
//            Storage::put('public/name.pdf',$content); //this is working
//            exit();
            //==================================================================

            $pemohon = MohonData::with('users')->where('id',$request->permohonan_id)->get()->first();

            //send email to pemohon data
            $to_name = $pemohon->users->name;
            $to_email = $pemohon->users->email;
//            $to_email = 'farhan15959@gmail.com';
            $data = array('cat'=>'cat');
            Mail::send("mails.exmpl15", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("MyGeo Explorer - Data tersedia");
                $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
//                $message->attach($file);
            });

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
        if (Auth::user()->hasRole(['Pentadbir Data','Super Admin','Pentadbir Aplikasi'])) {
            $permohonan_list = MohonData::orderBy('created_at', 'DESC')->get();
        } else {
            $permohonan_list = MohonData::with('users')
                ->where(['dihantar' => 0])
                ->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')
                ->get();
        }
        return view('mygeo.mohon_data', compact('permohonan_list', 'user'));
    }

    public function mohon_data_asas()
    {
        return view('mygeo.mohon_data_asas');
    }

    public function muat_turun_data()
    {
        $permohonan_list = MohonData::with('users')->with('proses_datas')->where('user_id', '=', Auth::user()->id)->where(['dihantar' => 1])->get();
        $permohonan = ProsesData::where('id', 8)->get();
        $m = json_decode($permohonan[0]->pautan_data);
        // dd($m);
        return view('mygeo.muat_turun_data', compact('permohonan_list'));
    }

    public function status_permohonan()
    {
        $permohonan_list = MohonData::where(['dihantar' => 1])->get();
        return view('mygeo.status_permohonan', compact('permohonan_list'));
    }

    public function senarai_data()
    {
        $senarai_data = SenaraiData::orderBy('kod','ASC')->get();
        $kategori_sd = KategoriSenaraiData::orderBy('name','ASC')->get();
        $subkategori_sd = SubKategoriSenaraiData::orderBy('name','ASC')->get();
        return view('mygeo.senarai_data', compact('senarai_data','kategori_sd','subkategori_sd'));
    }

    public function store_senarai_data(Request $request)
    {
        $senarai_data = new SenaraiData();
        $kategori_sd = KategoriSenaraiData::where(['id' => $request->kategori])->first();
        $senarai_data->kategori = $kategori_sd->name;
        $senarai_data->subkategori = $request->subkategori;
        $senarai_data->lapisan_data = $request->lapisan_data;
        $senarai_data->data_id = $request->data_id;
        $senarai_data->kod = $request->kod;
        $senarai_data->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('senarai_data')->with('success', 'Senarai Data Baru telah ditambah');
    }

    public function store_kategori_senarai_data(Request $request)
    {
        $duplicate_valid_cat = KategoriSenaraiData::where(['name' => $request->kategori])->get();

        if($duplicate_valid_cat->isEmpty()){

        $kategori = new KategoriSenaraiData();
        $kategori->name = $request->kategori;
        $kategori->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();


        return redirect('senarai_data')->with('success', 'Kategori Senarai Data Ditambah !');

        } else {

            return redirect('senarai_data')->with('warning', 'Kategori Senarai Data Telah Wujud !');
        }


    }

    public function store_subkategori_senarai_data(Request $request)
    {

        $duplicate_valid_sub = SubKategoriSenaraiData::where(['name' => $request->subkategori])->get();

        if($duplicate_valid_sub->isEmpty()){

            $subkategori = new SubKategoriSenaraiData();
            $subkategori->name = $request->subkategori;
            $subkategori->kategori_id = $request->kategori_id;
            $subkategori->save();

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Create';
            $at->save();

            return redirect('senarai_data')->with('success', 'Sub-Kategori Senarai Data Ditambah !');
        }else {

            return redirect('senarai_data')->with('warning', 'Sub-Kategori Senarai Data Telah Wujud !');
        }

    }

    public function update_senarai_data(Request $request)
    {
        DB::transaction(function () use ($request) {
            //save senarai data
            SenaraiData::where(["id" => $request->id_senarai_data])->update([
                "kategori" => $request->kategori,
                "subkategori" => $request->subkategori,
                "lapisan_data" => $request->lapisan_data,
                // "kategori_permohonan" => $request->kategori_permohonan,
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
        $permohonan_list = MohonData::with('users')->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('mygeo.semakan_status', compact('permohonan_list'));
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

    public function getKelasKongsis(){
        $kategori = KelasKongsi::get();
        echo json_encode($kategori);
    }

    public function surat_balasan($id, Request $request)
    {
        $skdatas = SenaraiKawasanData::where(["permohonan_id" => $request->permohonan_id])->get();

        ProsesData::where(["permohonan_id" => $request->permohonan_id])->update([
            "pautan_data" => $request->pautan_data,
            "tempoh_url" => $request->tempoh,
            "total_harga" => $request->total_harga,
        ]);
        foreach ($skdatas as $sk ) {
            SenaraiKawasanData::where(["id" => $sk->id])->update([
                "saiz_data" => $request->input('saiz_data_'.$sk->id),
            ]);

        }

        $surat = SuratBalasan::where('permohonan_id', $id)->first();
        $permohonan = MohonData::where('id', $id)->first();
        return view('mygeo.surat_balasan', compact('permohonan','surat'));
    }

    public function update_surat_balasan(Request $request)
    {
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
        return redirect('proses_data')->with('success', 'Surat Balasan Disimpan');
    }

    public function akuan_pelajar($id)
    {
        $akuan = AkuanPelajar::where('permohonan_id', $id)->first();
        $permohonan = MohonData::where('id', $id)->first();
        $skdatas = SenaraiKawasanData::where('permohonan_id', $id)->get();
        return view('mygeo.akuan_pelajar', compact('permohonan','akuan', 'skdatas'));
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
            //save akuan pelajar data
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

            $id = $request->permohonan_id;
            return redirect()->action('DataAsasController@akuan_pelajar', ['id' => $id])->with('warning', 'Sila Lengkapkan Borang ini Berserta Tandatangan');
        }



    }

    public function permohonan_baru()
    {
        $permohonan_list = MohonData::where(['dihantar' => 1,'status' => 0])->get();
        return view('mygeo.permohonan_baru', compact('permohonan_list'));
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
            $skdata = new SenaraiKawasanData();
            $skdata->lapisan_data = $request->lapisan_data;
            $skdata->kategori = $request->kategori;
            $skdata->subkategori = $request->subkategori;
            $skdata->kawasan_data = $request->kawasan_data;
            $skdata->kelas = $valid->kelas;
            $skdata->harga_data = $valid->harga_data;
            $skdata->permohonan_id = $id;
            $skdata->save();

            $valid_surat_rasmi = DokumenBerkaitan::where(['tajuk_dokumen' => 'Surat Permohonan Rasmi','permohonan_id' => $id ])->get();
            $valid_user = User::where(["id" => Auth::user()->id])->get()->first();
            $valid_terhad = SenaraiKawasanData::where(['kelas' => 'Terhad','permohonan_id' => $id ])->get();
            $valid_lot_kadaster = SenaraiKawasanData::where(['lapisan_data' => 'Lot Kadaster','permohonan_id' => $id ])->get();

            $valid_nric = DokumenBerkaitan::where(['tajuk_dokumen' => 'Salinan Kad Pengenalan','permohonan_id' => $id ])->get();
            $valid_undertaking = DokumenBerkaitan::where(['tajuk_dokumen' => 'Borang Undertaking (optional)','permohonan_id' => $id ])->get();
            $valid_nric_pel = DokumenBerkaitan::where(['tajuk_dokumen' => 'Salinan Kad Pengenalan Pelajar','permohonan_id' => $id ])->get();
            $valid_nric_dekan = DokumenBerkaitan::where(['tajuk_dokumen' => 'Salinan Kad Pengenalan Dekan/Pustakawan','permohonan_id' => $id ])->get();
            $valid_ppnm = DokumenBerkaitan::where(['tajuk_dokumen' => 'Borang PPNM','permohonan_id' => $id ])->get();
            $valid_borang_lot = DokumenBerkaitan::where(['tajuk_dokumen' => 'Salinan Lesen Hak Cipta','permohonan_id' => $id ])->get();

            // dd($valid_surat_rasmi);
            if($valid_surat_rasmi->isEmpty()){

                $dokumen = new DokumenBerkaitan();
                $dokumen->tajuk_dokumen = 'Surat Permohonan Rasmi';
                $dokumen->permohonan_id = $request->permohonan_id;
                $dokumen->save();
            }

            if($valid_lot_kadaster->isNotEmpty()){
                if($valid_borang_lot->isEmpty()){
                    $dokumen4 = new DokumenBerkaitan();
                    $dokumen4->tajuk_dokumen = 'Salinan Lesen Hak Cipta';
                    $dokumen4->permohonan_id = $request->permohonan_id;
                    $dokumen4->save();
                }
            }

            if($valid_terhad->isNotEmpty()){

                if($valid_ppnm->isEmpty()){
                    $dokumen3 = new DokumenBerkaitan();
                    $dokumen3->tajuk_dokumen = 'Borang PPNM';
                    $dokumen3->permohonan_id = $request->permohonan_id;
                    $dokumen3->save();
                }

                if($valid_user->kategori == 'IPTA - Pelajar' || $valid_user->kategori == 'IPTS - Pelajar' ) {

                    if($valid_nric_pel->isEmpty()){
                        $dokumen1 = new DokumenBerkaitan();
                        $dokumen1->tajuk_dokumen = 'Salinan Kad Pengenalan Pelajar';
                        $dokumen1->permohonan_id = $request->permohonan_id;
                        $dokumen1->save();
                    }

                    if($valid_nric_dekan->isEmpty()){
                        $dokumen2 = new DokumenBerkaitan();
                        $dokumen2->tajuk_dokumen = 'Salinan Kad Pengenalan Dekan/Pustakawan';
                        $dokumen2->permohonan_id = $request->permohonan_id;
                        $dokumen2->save();
                    }
                } else {

                    if($valid_nric->isEmpty()){
                        $dokumen1 = new DokumenBerkaitan();
                        $dokumen1->tajuk_dokumen = 'Salinan Kad Pengenalan';
                        $dokumen1->permohonan_id = $request->permohonan_id;
                        $dokumen1->save();
                    }

                    if($valid_undertaking->isEmpty()){
                        $dokumen2 = new DokumenBerkaitan();
                        $dokumen2->tajuk_dokumen = 'Borang Undertaking (optional)';
                        $dokumen2->permohonan_id = $request->permohonan_id;
                        $dokumen2->save();
                    }

                }

            }

            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Data Senarai dan Kawasan Ditambah!');
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
        if(Auth::user()->hasRole(['Pentadbir Data','Super Admin','Pentadbir Aplikasi']))
        {
            DB::transaction(function () use ($request) {
                //simpan status permohonan ini
                MohonData::where(["id" => $request->permohonan_id])->update([
                    "status" => $request->status,
                    "catatan" => $request->catatan,
                   "catatan_lain" => $request->catatan_lain, //missing migration from afiq
                    "assign_admin" => $request->assign_admin,
                ]);

                $pemohon = MohonData::with('users')->where('id',$request->permohonan_id)->get()->first();

                if($request->status == '1'){ //lulus
                    $mail = "mails.exmpl13";
                    $subject = "MyGeo Explorer - Permohonan Diluluskan";
                }elseif($request->status == '2'){ //tolak
                    $mail = "mails.exmpl14";
                    $subject = "MyGeo Explorer - Permohonan Ditolak";
                }

                if($request->status != '0'){
                    //send email to pemohon data
                    $to_name = $pemohon->users->name;
                    $to_email = $pemohon->users->email;
                    if($request->catatan == 'others'){
                        $data = array('catatan_lain'=>$request->catatan_lain);
                    } else {
                        $data = array('catatan'=>$request->catatan);
                    }
                    Mail::send($mail, $data, function($message) use ($to_name, $to_email, $subject) {
                        $message->to($to_email, $to_name)->subject($subject);
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });
                }

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
            return redirect('mohon_data')->with('success', 'Permohonan Disimpan Sebagai Draf');
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
        if((Auth::user()->kategori == 'IPTA - Pelajar' || Auth::user()->kategori == 'IPTS - Pelajar') && $valid_akuan_pelajar->isEmpty()){
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('warning', 'Sila Lengkapkan Borang Akuan Pelajar');
        }elseif($valid->isNotEmpty() && $validfile->isNotEmpty()){
            MohonData::where(["id" => $request->permohonan_id])->update([
                "dihantar" => 1,
                "status" => 0,
            ]);

            $pemohon = MohonData::with('users')->where('id',$request->permohonan_id)->get()->first();

            //get pentadbir data
            $pentadbir = User::where('assigned_roles','LIKE','%Pentadbir Data%')->get();
            if(isset($pentadbir) && count($pentadbir) > 0){
                foreach($pentadbir as $p){
                    //send email to pentadbir data
                    $to_name = $p->name;
                    $to_email = $p->email;
                    $data = array('nama_pemohon'=>$pemohon->users->name);
                    Mail::send('mails.exmpl12', $data, function($message) use ($to_name, $to_email, $pemohon) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Permohonan Baru  ('.$pemohon->name.')');
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });
                }
            }

            return redirect('mohon_data')->with('success', 'Permohonan anda berjaya dihantar');
        } else {
            return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('warning', 'Sila Lengkapkan Permohonan Anda');
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

        if($user->kategori == 'IPTA - Pelajar' || $user->kategori == 'IPTS - Pelajar'){
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
            if($request->tajuk_dokumen == 'Salinan Kad Pengenalan' || $request->tajuk_dokumen == 'Salinan Kad Pengenalan Pelajar' || $request->tajuk_dokumen == 'Salinan Kad Pengenalan Dekan/Pustakawan' || $request->tajuk_dokumen == 'Salinan Lesen Hak Cipta'){
                $pdf = new Fpdi();
                // add a page
                $pdf->AddPage();
                // set the source file
                $pdf->setSourceFile($request->file('file')->path());
                // import page 1
                $tplId = $pdf->importPage(1);
                // use the imported page and place it at point 10,10 with a width of 100 mm
                $pdf->useTemplate($tplId, 10, 10, 200);
                //Put the watermark
                $pdf->Image( public_path('afiqadminmygeo_files/watermark_ketsa.png'), 40, 80, 0, 80, 'png');
                $pdf->Output('F', public_path('/storage/uploads/'. $failNama ));

            } else {
                $request->file->storeAs('uploads', $failNama, 'public');
            }

            $failModel->tajuk_dokumen = $request->tajuk_dokumen;
            $failModel->nama_fail = $failNama;
            $failModel->file_path = '/storage/uploads/' . $failNama;
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

    public function update_dokumen_berkaitan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
            // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpeg,jpg|max:2048'
        ]);

        $valid_tajuk_dokumen = DokumenBerkaitan::where(["id" => $request->dokumen_id])->first();

        if ($request->file()) {

            $failNama = time() . '_' . $request->file->getClientOriginalName();

            if($valid_tajuk_dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan' || $valid_tajuk_dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Pelajar' || $valid_tajuk_dokumen->tajuk_dokumen == 'Salinan Kad Pengenalan Dekan/Pustakawan' || $valid_tajuk_dokumen->tajuk_dokumen == 'Salinan Lesen Hak Cipta'){
                $pdf = new Fpdi();
                // add a page
                $pdf->AddPage();
                // set the source file
                $pdf->setSourceFile($request->file('file')->path());
                // import page 1
                $tplId = $pdf->importPage(1);
                // use the imported page and place it at point 10,10 with a width of 100 mm
                $pdf->useTemplate($tplId, 10, 10, 200);
                //Put the watermark
                $pdf->Image( public_path('afiqadminmygeo_files/watermark_ketsa.png'), 40, 80, 0, 80, 'png');
                $pdf->Output('F', public_path('/storage/uploads/'. $failNama ));

            } else {
                $request->file->storeAs('uploads', $failNama, 'public');
            }

            DokumenBerkaitan::where(["id" => $request->dokumen_id])->update([
                "nama_fail" => $failNama,
                "file_path" => '/storage/uploads/' . $failNama,
            ]);

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

    public function delete_dokumen_berkaitan(Request $request)
    {
        $dokumen = DokumenBerkaitan::where(["id" => $request->dokumen_id])->first();
        Storage::delete('public/uploads/'. $dokumen->nama_fail);
        $dokumen->delete();
        return redirect()->back()->with('success', 'Dokumen Berkaitan Telah Dibuang!');
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

        if($user->kategori == 'IPTA - Pelajar' || $user->kategori == 'IPTS - Pelajar'){
            AkuanPelajar::where(["id" => $request->permohonan_id])->delete();
        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        return redirect('mohon_data')->with('success', 'Permohonan Data dibuang!');
    }

    public function api_store_generate_nric(Request $request) {
        //instatiate and use the dompdf class
        $img_f = file_get_contents($request->ic_front);
        $base64_front = 'data:image/png;base64,' . base64_encode($img_f);
        $img_b = file_get_contents($request->ic_back);
        $base64_back = 'data:image/png;base64,' . base64_encode($img_b);

        $pdf = PDF::loadView('pdfs.nric', compact('base64_front','base64_back'));

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $pdf->stream();

        $failModel = new DokumenBerkaitan();
        $content = $pdf->output();

        $failNama = time() . '_' .'nric_copy.pdf';
        // dd($failNama);
        Storage::put('public/uploads/'. $failNama, $content);
        $failModel->tajuk_dokumen = "Salinan Kad Pengenalan";
        $failModel->nama_fail = $failNama;
        $failModel->file_path = '/storage/uploads/' . $failNama;
        $failModel->permohonan_id = $request->permohonan_id;
        $failModel->save();

        $id = $request->permohonan_id;
        return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Salinan Kad Pengenalan Berjaya Dijana dan Ditambah');
    }

    public function api_update_generate_nric(Request $request) {
        //instatiate and use the dompdf class
        // dd($request->gambar);
        $img_f = file_get_contents($request->ic_front);
        $base64_front = 'data:image/png;base64,' . base64_encode($img_f);
        $img_b = file_get_contents($request->ic_back);
        $base64_back = 'data:image/png;base64,' . base64_encode($img_b);

        $pdf = PDF::loadView('pdfs.nric', compact('base64_front','base64_back'));

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $pdf->stream();

        $content = $pdf->output();

        $failNama = time() . '_' .'nric_copy.pdf';
        // dd($failNama);
        DokumenBerkaitan::where(["id" => $request->dokumen_id])->update([
            "nama_fail" => $failNama,
            "file_path" => '/storage/uploads/' . $failNama,
        ]);
        Storage::put('public/uploads/'. $failNama, $content);

        $id = $request->permohonan_id;
        return redirect()->action('DataAsasController@tambah', ['id' => $id])->with('success', 'Salinan Kad Pengenalan Berjaya Dijana dan Ditambah');
    }

    public function generate_pdf_akuan_pelajar(Request $request){
        $permohonan = DB::table('users')
                    ->join('mohon_data','users.id','=','mohon_data.user_id')
                    ->where('mohon_data.id',$request->permohonan_id)
                    ->select('users.nric','users.alamat','mohon_data.date',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                    ->groupBy('users.nric','users.name','users.alamat','mohon_data.date')
                    ->first();
        $user = User::where('nric',$permohonan->nric)->get()->first();
        if($user->hasRole('Pemohon Data')){
            $agensi_name = $user->agensi_organisasi;
        }else{
            $agensi_name = $user->agensiOrganisasi->name;
        }
        // $permohonan = MohonData::where('id', $request->permohonan_id)->first();
        $akuan = AkuanPelajar::where('permohonan_id', $request->permohonan_id)->first();
        $pdf = PDF::loadView('pdfs.akuan_pelajar', compact('akuan','permohonan','agensi_name'));
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');
        // Render the HTML as PDF
        return $pdf->stream();
    }

    public function generate_pdf_surat_balasan(Request $request){

        $permohonan = DB::table('users')
                    ->join('mohon_data','users.id','=','mohon_data.user_id')
//                    ->join('agensi_organisasi','users.id','=','agensi_organisasi.id')
                    ->where('mohon_data.id',$request->permohonan_id)
                    ->select('users.nric','users.alamat','mohon_data.date','mohon_data.id',DB::raw('count(*) as total'),DB::raw('users.name as username'))
                    ->groupBy('users.nric','users.name','users.alamat','mohon_data.date','mohon_data.id')
                    ->first();
        $user = User::where('nric',$permohonan->nric)->get()->first();
        if($user->hasRole('Pemohon Data')){
            $agensi_name = $user->agensi_organisasi;
        }else{
            $agensi_name = $user->agensiOrganisasi->name;
        }
        $surat = SuratBalasan::where('permohonan_id', $request->permohonan_id)->first();
        $pdf = PDF::loadView('pdfs.surat_balasan', compact('surat','permohonan','agensi_name'));
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');
        // Render the HTML as PDF
        return $pdf->stream();
    }

    public function generate_pdf_akuan_terima(Request $request){

        $permohonan = MohonData::where('id', $request->permohonan_id)->first();

        $pdf = PDF::loadView('pdfs.akuan_terima', compact('permohonan'));
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'potrait');
        // Render the HTML as PDF
        return $pdf->stream();
    }
}
