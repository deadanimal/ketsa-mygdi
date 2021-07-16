<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ModelHasRoles;
use Illuminate\Support\Facades\Log;
use Auth;
use Hash;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
use Storage;
use App\AgensiOrganisasi;
use App\MetadataGeo;
use DB;
 
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
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin'])){
            exit();
        }
        
        $users_all = User::where(['disahkan' => 0])->get();
        $users = [];
        foreach($users_all as $user){
            if($user->hasRole('Penerbit Metadata') || $user->hasRole('Pengesah Metadata')){
                $users[]= $user;
            }
        }
        return view('mygeo.user.pengesahan', compact('users'));
    }

    public function index_berdaftar() {
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin'])){
            exit();
        }
        
        $users_all = User::where(['disahkan' => 1])->orderBy('name', 'asc')->get();
        $users = [];
        foreach($users_all as $user){
            if($user->hasRole('Penerbit Metadata') || $user->hasRole('Pengesah Metadata')){
                $users[]= $user;
            }
        }
        return view('mygeo.user.senarai_pengguna_berdaftar', compact('users'));
    }
    
    public function get_user_details(){
        $user_id = $_POST['user_id'];
        $user_details = User::where(["id"=>$user_id])->get()->first();
        $html_details = '
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Nama Penuh</label>
                <div class="col-sm-10">
                    :'.$user_details->name.'
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Agensi</label>
                <div class="col-sm-10">
                    :'.$user_details->agensi_organisasi.'
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Bahagian</label>
                <div class="col-sm-10">
                    :'.$user_details->bahagian.'
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Telefon Pejabat</label>
                <div class="col-sm-10">
                    :'.$user_details->phone_pejabat.'
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Emel</label>
                <div class="col-sm-10">
                    :'.$user_details->email.'
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Peranan</label>
                <div class="col-sm-10">
                    :
        ';
        if(count($user_details->getRoleNames()) > 0){
            foreach($user_details->getRoleNames() as $role){
                $html_details .= $role.'<br>';
            }
        }
        $html_details .= '
                </div>
            </div>
        ';

        echo $html_details; 
        exit;
    }

    public function user_sahkan(){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin'])){
            exit();
        }
        
        $user_id = $_POST['user_id'];
        User::where(['id' => $user_id])->update(['disahkan'=>1]);

        //send mail
        Mail::to('farhan15959_test@gmail.com')->send(new MailtrapExample()); 
        exit();
    }

    public function user_pengesahan_ditolak(){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin'])){
            exit();
        }
        
        $user_id = $_POST['user_id'];
        User::where(['id' => $user_id])->update(['disahkan'=>2]);
        exit();
    }

    public function show(){
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        return view('mygeo.profile.profil', compact('user'));
    }

    public function edit(){
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $roles = Role::get();
        return view('mygeo.profile.profil_edit', compact('user','roles'));
    }

    public function update_profile(Request $request){
        
        //save gambar profil.ftest
        if(isset($_FILES['gambar_profil']) && (file_exists($_FILES['gambar_profil']['tmp_name']))){
            $this->validate($request,['gambar_profil' => 'required|image|mimes:jpeg,png,jpg']);
            $exists = Storage::exists($request->gambar_profil->getClientOriginalName());
            $time = date('Y-m-d'.'_'.'H_i_s');
            $fileName = $time.'_'.$request->gambar_profil->getClientOriginalName();
            $imageUrl = Storage::putFileAs('/public/', $request->file('gambar_profil'), $fileName);
        }

        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $user->name = $request->uname;
        $user->nric = $request->nric;
        $user->email = $request->email;
        $user->agensi_organisasi = $request->agensi_organisasi;
        $user->bahagian = $request->bahagian;
        $user->sektor = $request->sektor;
        $user->phone_pejabat = $request->phone_pejabat;
        if(isset($imageUrl)){
            $user->gambar_profil = $fileName;
        }
        $user->save();

        //save user's role
        if(!is_null($request->peranan)){
            ModelHasRoles::where(["model_id"=>$user->id,"model_type"=>"App\User"])->delete();
            foreach($request->peranan as $role){
                $user->assignRole($role);
            }
        }

        return redirect()->action([UserController::class,'show']);
    }

    public function update_password(Request $request){
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $user->password = Hash::make($request->password_new);
        $user->save();
        return view('mygeo.profile.profil', compact('user'));
    }
    
    public function change_user_status(Request $request){
        $user = User::where(["id"=>$request->user_id])->get()->first();
        $user->status = $request->status_id;
        $user->save();
        exit();
    }
    
    public function pemindahan_akaun(){
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin'])){
            exit();
        }
        $agensi = AgensiOrganisasi::get()->all();
        return view('mygeo.user.pemindahan_akaun', compact('agensi'));
    }
    
    public function getUsersByAgensi(Request $request){
        $usersByAgensi = User::where('agensi_organisasi',$request->agensi)->get();
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
            if(isset($xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                $name = trim($xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString);
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
        exit();
    }
    
    public function get_agensiOrganisasi(){
        echo json_encode(AgensiOrganisasi::get()); 
        exit;
    }
}
