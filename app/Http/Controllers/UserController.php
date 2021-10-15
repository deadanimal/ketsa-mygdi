<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ModelHasRoles;
use App\MohonData;
use Illuminate\Support\Facades\Log;
use Auth;
use Hash;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
use Storage;
use App\AgensiOrganisasi;
use App\MetadataGeo;
use DB;
use App\Mail\MailNotify;
use App\AuditTrail;
use App\Kategori;
use App\Ftesttodel2;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        // $this->middleware('auth');
    }

    public function index() {
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }

        $users_all = User::where(['disahkan'=>0])->get();
        $users = [];
        foreach($users_all as $user){
            if($user->hasRole('Penerbit Metadata') || $user->hasRole('Pengesah Metadata')){
                $users[]= $user;
            }
        }
        return view('mygeo.user.pengesahan', compact('users'));
    }

    public function index_berdaftar() {
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }

        $users_all = User::where(['disahkan' => 1])->orderBy('name')->get();
        $users = [];
        foreach($users_all as $user){
            if($user->hasRole('Super Admin')){

            }else{
                $users[]= $user;
            }
        }
        $peranans = Role::get();
        $ids = [ 5, 6, 3, 4, 2];
        $peranans = $peranans->sortBy(function($model) use ($ids) {
            return array_search($model->getKey(), $ids);
        }); 

        $aos = AgensiOrganisasi::distinct('name')->whereNull('bahagian')->get();

        return view('mygeo.user.senarai_pengguna_berdaftar', compact('users','peranans','aos'));
    }

    public function index_penerbit_pengesah() {
        if(!auth::user()->hasRole(['Pentadbir Metadata','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }

        $users_all = User::whereHas("roles", function ($q) {
                    $q->where("name", "Pengesah Metadata")->orWhere("name", "Penerbit Metadata");
                })->orderBy('name')->get();
        $users = [];
        foreach($users_all as $user){
            $users[]= $user;
        }

        $peranans = Role::get();
        $ids = [ 5, 6, 3, 4, 2];
        $peranans = $peranans->sortBy(function($model) use ($ids) {
            return array_search($model->getKey(), $ids);
        });

        $aos = AgensiOrganisasi::distinct('name')->get();

        return view('mygeo.user.senarai_penerbit_pengesah', compact('users','peranans','aos'));
    }

    public function get_user_details(){
        $user_id = $_POST['user_id'];
        $user_details = User::where(["id"=>$user_id])->get()->first();
//        $html_details = '
//            <div class="form-group row">
//                <label for="inputEmail3" class="col-sm-2">Nama Penuh</label>
//                <div class="col-sm-10">
//                    :'.$user_details->name.'
//                </div>
//            </div>
//            <div class="form-group row">
//                <label for="inputEmail3" class="col-sm-2">Agensi</label>
//                <div class="col-sm-10">
//                    :'.($user_details->hasRole('Pemohon Data') ? $user_details->agensi_organisasi:$user_details->agensiOrganisasi->name).'
//                </div>
//            </div>
//            <div class="form-group row">
//                <label for="inputEmail3" class="col-sm-2">Bahagian</label>
//                <div class="col-sm-10">
//                    :'.$user_details->bahagian.'
//                </div>
//            </div>
//            <div class="form-group row">
//                <label for="inputEmail3" class="col-sm-2">Telefon Pejabat</label>
//                <div class="col-sm-10">
//                    :'.$user_details->phone_pejabat.'
//                </div>
//            </div>
//            <div class="form-group row">
//                <label for="inputEmail3" class="col-sm-2">Emel</label>
//                <div class="col-sm-10">
//                    :'.$user_details->email.'
//                </div>
//            </div>
//            <div class="form-group row">
//                <label for="inputEmail3" class="col-sm-2">Peranan</label>
//                <div class="col-sm-10">
//                    :
//        ';
        $html_details = '
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="uname">
                        Nama Penuh
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm ml-3" id="uname" type="text"
                           value="'.$user_details->name.'" disabled />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="nric">
                        No Kad Pengenalan
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm ml-3" id="input-nric" type="text"
                           value="'.$user_details->nric.'" disabled />
                </div>
            </div>
            <div class="row mb-2 divSektor">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="sektor">
                        Sektor
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm ml-3" id="sektor" type="text"
                           value="'.($user_details->sektor == '1' ? 'Kerajaan' : 'Swasta').'" disabled />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="agensi_organisasi">
                        Agensi / Organisasi
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">';
        if (Auth::user()->hasRole("Pemohon Data")) {
            $html_details .= '
                        <input class="form-control form-control-sm ml-3" id="agensi_organisasi"
                               type="text" value="'.$user_details->agensi_organisasi.'" disabled />
                    ';
        } else {
            $html_details .= '
                        <input class="form-control form-control-sm ml-3" id="agensi_organisasi"
                               type="text"
                               value="'.(is_numeric($user_details->agensi_organisasi) && isset($user_details->agensiOrganisasi) ? $user_details->agensiOrganisasi->name : $user_details->agensi_organisasi).'"
                               disabled />
                    ';
        }
        $html_details .= '
                </div>
            </div>';

            if(!$user_details->hasRole("Pemohon Data")){
                $html_details .= '<div class="row mb-2 divBahagian">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="bahagian">
                        Bahagian
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm ml-3" id="bahagian" type="text"
                           value="'.$user_details->bahagian.'" disabled />
                </div>
            </div>';

            }

            $html_details .= '<div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="email">
                        Emel
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm ml-3" id="email" type="text"
                           value="'.$user_details->email.'" disabled />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="phone_pejabat">
                        Telefon Pejabat
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-3">
                    <input class="form-control form-control-sm ml-3" id="phone_pejabat" type="text"
                           value="'.$user_details->phone_pejabat.'" disabled />
                </div>';
        if(!$user_details->hasRole(["Penerbit Metadata","Pengesah Metadata"])){
            $html_details .= '
                <div class="col-2">
                    <label class="form-control-label mr-4" for="phone_bimbit">
                        Telefon Bimbit
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-3">
                    <input class="form-control form-control-sm ml-3" id="phone_bimbit"
                           type="text" value="'.$user_details->phone_bimbit.'" disabled />
                </div>';
        }
        $html_details .= '
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="peranan">
                        Peranan
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">';
        if(count($user_details->getRoleNames()) > 0){
            $var = "";
            foreach($user_details->getRoleNames() as $role){
                $var .= $role.',';
            }
            $var = rtrim($var, ",");
            $html_details .= '<input class="form-control form-control-sm ml-3" id="peranan" type="text" value="'.$var.'" disabled />';
        }
        $html_details .= '
                </div>
            </div>';
        if($user_details->hasRole("Pemohon Data")){
            $html_details .= '
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="email">
                            Kategori
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control form-control-sm ml-3" type="text" value="'.$user_details->kategori.'" disabled />
                    </div>
                </div>
            ';
        }
        $html_details .= '
                </div>
            </div>
        ';

        echo $html_details;
        exit;
    }
    
    public function get_user_details_kemaskini(){
        $user_id = $_POST['user_id'];
        $user_details = User::where(["id"=>$user_id])->get()->first();
        $html_details = '
            <input type="hidden" name="user_id" value="'.$user_id.'">
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="uname">
                        Nama Penuh
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm" id="uname" name="uname" type="text"
                           value="'.$user_details->name.'" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="nric">
                        No Kad Pengenalan
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm" id="input-nric" type="text" name="nric"
                           value="'.$user_details->nric.'" />
                </div>
            </div>
            <div class="row mb-2 divSektor">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="sektor">
                        Sektor
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <select class="form-control form-control-sm" name="sektor" id="sektor">
                        <option value="">Pilih...</option>
                        <option value="1" '.($user_details->sektor == '1' ? 'selected':'').'>Kerajaan</option>
                        <option value="2" '.($user_details->sektor == '2' ? 'selected':'').'>Swasta</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="agensi_organisasi">
                        Agensi / Organisasi
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                <select id="agensi_organisasi" name="agensi_organisasi" class="form-control form-control-sm ml-3">
                    <option value="">Pilih...</option>
                </select>
';
        
        if (Auth::user()->hasRole("Pemohon Data")) {
            $html_details .= '
                        <input class="form-control form-control-sm" id="agensi_organisasi" name="agensi_organisasi"
                               type="text" value="'.$user_details->agensi_organisasi.'" />
                    ';
        } else {
            $html_details .= '
                        <input class="form-control form-control-sm" id="agensi_organisasi" name="agensi_organisasi"
                               type="text"
                               value="'.(is_numeric($user_details->agensi_organisasi) && isset($user_details->agensiOrganisasi) ? $user_details->agensiOrganisasi->name : $user_details->agensi_organisasi).'"
                               />
                    ';
        }
        $html_details .= '
                </div>
            </div>';

            if(!$user_details->hasRole("Pemohon Data")){
                $html_details .= '<div class="row mb-2 divBahagian">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="bahagian">
                        Bahagian
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm" id="bahagian" type="text" name="bahagian"
                           value="'.$user_details->bahagian.'" />
                </div>
            </div>';

            }

            $html_details .= '<div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="email">
                        Emel
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
                    <input class="form-control form-control-sm" id="email" type="text" name="email"
                           value="'.$user_details->email.'" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="phone_pejabat">
                        Telefon Pejabat
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-3">
                    <input class="form-control form-control-sm" id="phone_pejabat" type="text" name="phone_pejabat"
                           value="'.$user_details->phone_pejabat.'" />
                </div>';
        if(!$user_details->hasRole(["Penerbit Metadata","Pengesah Metadata"])){
            $html_details .= '
                <div class="col-2">
                    <label class="form-control-label mr-4" for="phone_bimbit">
                        Telefon Bimbit
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-3">
                    <input class="form-control form-control-sm" id="phone_bimbit" name="phone_bimbit"
                           type="text" value="'.$user_details->phone_bimbit.'" />
                </div>
            </div>
            ';
        }
        $html_details .= '
            <div class="row mb-2">
                <div class="col-3">
                    <label class="form-control-label mr-4" for="peranan">
                        Peranan
                    </label><label class="float-right">:</label>
                </div>
                <div class="col-8">
        ';
        $peranans = Role::get();
        $ids = [ 5, 6, 3, 4, 2];
        $peranans = $peranans->sortBy(function($model) use ($ids) {
            return array_search($model->getKey(), $ids);
        });
        $ur = $user_details->getRoleNames();
        $urs = [];
        foreach($ur as $r){
            $urs[] = $r;
        }
        foreach($peranans as $p){
            if(in_array($p->name,$urs)){
                $html_details .= '<div class="col-10"><input type="checkbox" class="form-check-input mr-4" name="peranan[]" value="'.$p->name.'" checked>'.$p->name.'</div>';
            }else{
                $html_details .= '<div class="col-10"><input type="checkbox" class="form-check-input mr-4" name="peranan[]" value="'.$p->name.'">'.$p->name.'</div>';
            }
        }
        $html_details .= '
                </div>
            </div>
        ';
//        if(count($user_details->getRoleNames()) > 0){
//            $var = "";
//            foreach($user_details->getRoleNames() as $role){
//                $var .= $role.',';
//            }
//            $var = rtrim($var, ",");
//            $html_details .= '<input class="form-control form-control-sm" id="peranan" type="text" value="'.$var.'" />';
//        }
        if($user_details->hasRole("Pemohon Data")){
            $html_details .= '
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="email">
                            Kategori
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control form-control-sm" type="text" value="'.$user_details->kategori.'" name="kategori"/>
                    </div>
                </div>
            ';
        }
        $html_details .= '
                </div>
            </div>
        ';

        echo json_encode(['html'=>$html_details,$peranans]);
        exit;
    }

    public function user_sahkan(){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }

        $user_id = $_POST['user_id'];
        $user = User::where(['id'=>$user_id])->get()->first();
        $user->disahkan = 1;
        $user->status = 1;
        $user->update();

        //send email to the person who was approved
        $to_name = $user->name;
        $to_email = $user->email;
        $data = array('name'=>$user->name);
        Mail::send('mails.exmpl5', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pendaftaran Diluluskan');
            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function user_pengesahan_ditolak(){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }

        $user_id = $_POST['user_id'];
        $user = User::where(['id'=>$user_id])->get()->first();

        //send email to the person who was disapproved
        $to_name = $user->namaPenuh;
        $to_email = $user->email;
        $data = array('name'=>$user->name);
        Mail::send('mails.exmpl6', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pendaftaran Tidak Diluluskan');
            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
        });

        User::where(['id'=>$user_id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function show(){
//        dd(Auth::user());
//        Auth::user()->assignRole('Pemohon Data');
//        if (!empty(Auth::user()->getRoleNames())) {
//            foreach (Auth::user()->getRoleNames() as $role) {
//                echo "<br>".$role;
//            }
//        }
//        exit();
        
//        $usersToMigrate = Ftesttodel2::get();
//        foreach($usersToMigrate as $u){
//            $theUser = User::create([
//                'name' => $u->fname.' '.$u->lname,
//                'email' => $u->mail,
//                'phone_bimbit' => $u->phone,
//                'password' => Hash::make($u->pwd),
//                'alamat' => $u->addr.' '.$u->addr2.' '.$u->pcode.' '.$u->addr2.' '.$u->city.' '.$u->neg,
//                'postcode' => $u->pcode,
//                'city' => $u->city,
//                'state' => $u->neg,
//                'status' => ($u->status == "Yes" ? "1":"0"),
//                'disahkan' => '1',
//                'assigned_roles' => "Penerbit Metadata",
//                'mygdix_user_id' => $u->id_user 
//            ]);
//            $theUser->assignRole('Penerbit Metadata');
//        }
//        exit();

        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $pemohonan_yang_tidak_dinilais = MohonData::where(['penilaian' => 0])->get();

        // dd($pemohonan_yang_tidak_dinilais);
        if($pemohonan_yang_tidak_dinilais) {
            return view('mygeo.profile.profil', compact('user'));
        } else {
            if(Auth::user()->hasRole(['Pemohon Data'])){
                \Session::flash('warning','Anda perlu membuat penilaian kepada permohonan terbaru');
                return view('mygeo.profile.profil', compact('user'));
            }
        }
    }

    function checkUnattendedMetadata(){
        $query = MetadataGeo::on('pgsql2')->where('disahkan','0');
        $lastTwoWeeks = date('Y-m-d', strtotime("-2 weeks"));
        $result = $query->whereDate('createdate','<',$lastTwoWeeks)->get();
        return count($result);
    }

    public function edit(){
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        if(strpos($user->kategori,"IPTA") !== false){
            $kategori = Kategori::where('name','ilike','%IPTA%')->get();
        }elseif(strpos($user->kategori,"IPTS") !== false){
            $kategori = Kategori::where('name','ilike','%IPTS%')->get();
        }else{
            $kategori = Kategori::get();
        }

        $roles = Role::get();
        return view('mygeo.profile.profil_edit', compact('user','roles','kategori'));
    }
    
    public function edit_admin($id){
        $user = User::where(["id"=>$id])->get()->first();
        if(strpos($user->kategori,"IPTA") !== false){
            $kategori = Kategori::where('name','ilike','%IPTA%')->get();
        }elseif(strpos($user->kategori,"IPTS") !== false){
            $kategori = Kategori::where('name','ilike','%IPTS%')->get();
        }else{
            $kategori = Kategori::get();
        }

        $roles = Role::get();
//        dd('ftester');
        return view('mygeo.profile.profil_edit_admin', compact('user','roles','kategori'));
    }

    public function update_profile(Request $request){
        $fields = [
            "uname" => 'required',
            "nric" => 'required',
            "agensi_organisasi" => 'required',
            "phone_pejabat" => 'required',          
        ];
        if(Auth::user()->email != $request->email){
            $fields["email"]= 'required|unique:App\User,email';
        }
        if(Auth::user()->hasRole('Pemohon Data')){
            $fields["phone_bimbit"]= 'required';
        }else{
            $fields["bahagian"] = 'required';
            $fields["sektor"] = 'required';
        }
        $customMsg = [
            "uname.required" => 'Name required',
            "nric.required" => 'NRIC required',
            "sektor.required" => 'Sektor required',
            "agensi_organisasi.required" => 'Agensi/Organisasi required',
            "bahagian.required" => 'Bahagian required',
            "email.required" => 'Email required',
            "phone_pejabat.required" => 'Phone Pejabat required',
            "phone_bimbit.required" => 'Phone Bimbit required',
        ];
        
        $this->validate($request, $fields, $customMsg);
        
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $user->name = $request->uname;
        $user->nric = $request->nric;
        $user->email = $request->email;
        $user->agensi_organisasi = $request->agensi_organisasi;
        $user->bahagian = $request->bahagian;
        $user->sektor = $request->sektor;
        $user->phone_pejabat = $request->phone_pejabat;
        $user->phone_bimbit = $request->phone_bimbit;
        $user->kategori = $request->kategori;
        if($user->editable == "1"){
            $user->editable = "0";
        }
        $user->save();

        //save user's role
//        if(!is_null($request->peranan)){
//            ModelHasRoles::where(["model_id"=>$user->id,"model_type"=>"App\User"])->delete();
//            foreach($request->peranan as $role){
//                $user->assignRole($role);
//            }
//        }

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('mygeo_profil')->with('message','Maklumat pengguna berjaya dikemas kini.');
    }
    
    public function update_profile_admin(Request $request){
        //save user's role
        if(!is_null($request->peranan)){
            ModelHasRoles::where(["model_id"=>$request->userid,"model_type"=>"App\User"])->delete();
            $assigned_roles = "";
            foreach($request->peranan as $role){
                //if role selected is pengesah, check if there is already a pengesah in the bahagian selected
                if($role == 'Pengesah Metadata' && $request->bahagian != ""){
                    $pengesahs = User::whereHas("roles", function ($q) {
                        $q->where("name", "Pengesah Metadata");
                    })->where('agensi_organisasi', $request->agensi_organisasi)->where('bahagian', $request->bahagian)->get();
                    if(!empty($pengesahs) && count($pengesahs) > 0){
                        return redirect('kemaskini_profil_admin/'.$request->userid)->with(['error'=>'1','message'=>'Bahagian dipilih sudah ada Pengesah.']);
                    }
                }
                $user = User::where("id",$request->userid)->get()->first();
                $user->assignRole($role);
                $assigned_roles .= $role.",";
            }
            $assigned_roles = rtrim($assigned_roles, ",");
            User::where(["id"=>$request->userid])->update(["assigned_roles" => $assigned_roles]);
        }

        $user = User::where("id",$request->userid)->get()->first();
        $user->name = $request->uname;
        $user->nric = $request->nric;
        $user->email = $request->email;
        $user->agensi_organisasi = $request->agensi_organisasi;
        $user->bahagian = $request->bahagian;
        $user->sektor = $request->sektor;
        $user->phone_pejabat = $request->phone_pejabat;
        $user->phone_bimbit = $request->phone_bimbit;
        $user->kategori = $request->kategori;
        $user->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('mygeo_senarai_pengguna_berdaftar')->with('message','Maklumat pengguna berjaya dikemas kini.');
    }

    public function update_gambarprofile(Request $request){
        //save gambar profil
        if(isset($_FILES['gambar_profil']) && (file_exists($_FILES['gambar_profil']['tmp_name']))){
            $this->validate($request,['gambar_profil' => 'required|image|mimes:jpeg,png,jpg']);
            $exists = Storage::exists($request->gambar_profil->getClientOriginalName());
            $time = date('Y-m-d'.'_'.'H_i_s');
            $fileName = $time.'_'.$request->gambar_profil->getClientOriginalName();
            $imageUrl = Storage::putFileAs('/public/', $request->file('gambar_profil'), $fileName);
        }

        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        if(isset($imageUrl)){
            $user->gambar_profil = $fileName;
        }
        $user->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('mygeo_profil')->with('message','Gambar profil berjaya dikemas kini.');
    }
    
    public function update_gambarprofile_admin(Request $request){
        //save gambar profil
        if(isset($_FILES['gambar_profil']) && (file_exists($_FILES['gambar_profil']['tmp_name']))){
            $this->validate($request,['gambar_profil' => 'required|image|mimes:jpeg,png,jpg']);
            $exists = Storage::exists($request->gambar_profil->getClientOriginalName());
            $time = date('Y-m-d'.'_'.'H_i_s');
            $fileName = $time.'_'.$request->gambar_profil->getClientOriginalName();
            $imageUrl = Storage::putFileAs('/public/', $request->file('gambar_profil'), $fileName);
        }

        $user = User::where(["id"=>$request->userid])->get()->first();
        if(isset($imageUrl)){
            $user->gambar_profil = $fileName;
        }
        $user->save();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        return redirect('kemaskini_profil_admin/'.$request->userid)->with('message','Gambar profil berjaya dikemas kini.');
    }

    public function update_password(Request $request){
        $user = User::where(["id"=>Auth::user()->id])->get()->first();

        if (Hash::check($request->password_old, $user->password)) {
            $user->fill(['password' => Hash::make($request->password_new)])->save();

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Update';
            $at->save();

            return redirect('mygeo_profil')->with('message','Kata laluan berjaya ditukar');
        } else {
            return redirect('mygeo_profil')->with('message','Kata laluan lama tidak betul');
        }
    }

    public function change_user_status(Request $request){
        $user = User::where(["id"=>$request->user_id])->get()->first();
        $user->status = $request->status_id;
        $user->update();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function delete_user(Request $request){
        User::where(["id"=>$request->user_id])->delete();

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Delete';
        $at->save();

        exit();
    }

    public function pemindahan_akaun(){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }
        $agensi = AgensiOrganisasi::distinct('name')->get()->all();
        return view('mygeo.user.pemindahan_akaun', compact('agensi'));
    }

    public function getUsersByAgensi(Request $request){
        $agensiOrg = AgensiOrganisasi::where('name',$request->agensi)->get();
        $agensiOrgFixed = [];
        foreach($agensiOrg as $ao){
            $agensiOrgFixed[] = $ao->id;
        }
        $usersByAgensi = User::whereIn('agensi_organisasi',$agensiOrgFixed)->get();
        $usersByPenerbit = '<option selected disabled>Pilih</option>';
        foreach($usersByAgensi as $uba){
            if($uba->hasRole('Penerbit Metadata')){
                $usersByPenerbit .= '<option value="'.$uba->id.'">'.$uba->name.'</option>';
            }
        }
        echo $usersByPenerbit;
        exit();
    }

    public function getMetadataByUser(Request $request){
        $metadatasdb = MetadataGeo::on('pgsql2')->where('portal_user_id','=',$request->user_id)->orderBy('id', 'DESC')->get()->all();
        $metadatas = [];
        $metadataRows = '';
        $bil = 1;
        foreach ($metadatasdb as $met) {
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
            $metadatas[$met->id] = [$xml2, $met];

            //category
            $cat = "";
            if(isset($xml2->categoryTitle) && $xml2->categoryTitle != ""){
                $cat = trim($xml2->categoryTitle);
            }
            //metadata name
            $name = "";
            if(isset($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
                $name = trim($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString);
            }
            
            //status
            $status = "";
            if($met->disahkan == '0'){
                $status = "Perlu Pengesahan";
            }elseif($met->disahkan == 'yes'){
                $status = "Diterbitkan";
            }elseif($met->disahkan == 'no'){
                $status = "Perlu Pembetulan";
            }elseif($met->disahkan == 'delete'){
                $status = "Dipadam";
            }

            $metadataRows .= '
                <tr>
                    <td>'.$bil.'</td>
                    <td>'.$name.'</td>
                    <td>'.$cat.'</td>
                    <td>'.$status.'</td>
                </tr>
            ';
            $bil++;
        }
        echo $metadataRows;
        exit();
    }

    public function simpan_pemindahan_akaun(Request $request){
        DB::connection('pgsql2')->transaction(function () use ($request) {
            $pengguna_lama = $request->pengguna_lama;
            $pengguna_baru = $request->pengguna_baru;

            MetadataGeo::where(['portal_user_id'=>$pengguna_lama])->update([
                'portal_user_id' => $pengguna_baru,
                'changedate' => date("Y-m-d H:i:s"),
            ]);
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Update';
        $at->save();

        exit();
    }

    public function get_agensiOrganisasi(){
        echo json_encode(AgensiOrganisasi::get());
        exit;
    }

    public function tambahPenggunaBaru(Request $request){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin','Pentadbir Aplikasi'])){
            exit();
        }
        $fields = [
            "namaPenuh" => 'required',
            "email" => 'required|unique:App\User,email',
            "peranan" => 'required',
            "agensi_organisasi" => 'required',
        ];
        $customMsg = [
            "namaPenuh.required" => 'Nama Penuh diperlukan',
            "email.required" => 'Email diperlukan',
            "peranan.required" => 'Peranan diperlukan',
            "agensi_organisasi.required" => 'Agensi/Organisasi diperlukan',
        ];
        $this->validate($request, $fields, $customMsg);

        $password = "";

        $sektor = "";
        if($request->agensi_organisasi != "" && $request->peranan != "Pemohon Data"){
            $ao = AgensiOrganisasi::where('id',$request->agensi_organisasi)->get()->first();
            $sektor = $ao->sektor;
        }
        
        //if role selected is pengesah, check if there is already a pengesah in the bahagian selected
        if($request->peranan == 'Pengesah Metadata' && $request->bahagian != ""){
            $pengesahs = User::whereHas("roles", function ($q) {
                $q->where("name", "Pengesah Metadata");
            })->where('agensi_organisasi', $request->agensi_organisasi)->where('bahagian', $request->bahagian)->get();
            if(!empty($pengesahs) && count($pengesahs) > 0){
                return redirect('mygeo_senarai_pengguna_berdaftar')->with(['error'=>'1','message'=>'Bahagian dipilih sudah ada Pengesah.']);
            }
        }
        
        try{
            $nu = new User;
            $nu->name = $request->namaPenuh;
            $nu->email = $request->email;
            $nu->sektor = $sektor;
            $nu->agensi_organisasi = $request->agensi_organisasi;
            $nu->bahagian = $request->bahagian;
            $pass = $this->generate_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',20);
            $password = $pass;
            $nu->password = Hash::make($pass);
            $nu->status = '1';
            $nu->disahkan = '1';
            $nu->assigned_roles = $request->peranan;
            $nu->save();

            $nu->assignRole($request->peranan);
        }catch (Illuminate\Database\QueryException $e){
            dd($e);
        }

        //send email to the person created
        $to_name = $request->namaPenuh;
        $to_email = $request->email;
        $data = array(
            'name'=>$request->namaPenuh,
            'email'=>$request->email,
            'password'=>$password,
        );
        Mail::send('mails.exmpl', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pendaftaran Akaun');
            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
        });

        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Create';
        $at->save();

        return redirect('mygeo_senarai_pengguna_berdaftar')->with('message','Pengguna berjaya didaftarkan.');
    }


    public function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    public function tukar_peranan(Request $request) {
        $user = User::where('id',Auth::user()->id)->get()->first();
        $user->syncRoles([$request->perananSelect]);
        return redirect()->back();
    }
}
