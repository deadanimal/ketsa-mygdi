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
        return view('mygeo.pengesahan', compact('users'));
    }

    public function index_berdaftar() {
        if(!auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin'])){
            exit();
        }
        
        $users_all = User::where(['disahkan' => 1])->get();
        $users = [];
        foreach($users_all as $user){
            if($user->hasRole('Penerbit Metadata') || $user->hasRole('Pengesah Metadata')){
                $users[]= $user;
            }
        }
        return view('mygeo.senarai_pengguna_berdaftar', compact('users'));
    }
    
    public function get_user_details(){
        $user_id = $_POST['user_id'];
        $user_details = User::where(["id"=>$user_id])->get()->first();
        $html_details = '
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Nama Penuh</label>
                <div class="col-sm-10">
                    : <label>'.$user_details->name.'</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Agensi</label>
                <div class="col-sm-10">
                    : <label>'.$user_details->agensi_organisasi.'</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Bahagian</label>
                <div class="col-sm-10">
                    : <label>'.$user_details->bahagian.'</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Telefon Pejabat</label>
                <div class="col-sm-10">
                    : <label>'.$user_details->phone_pejabat.'</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Telefon Bimbit</label>
                <div class="col-sm-10">
                    : <label>'.$user_details->phone_bimbit.'</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Emel</label>
                <div class="col-sm-10">
                    : <label>'.$user_details->email.'</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2">Peranan</label>
                <div class="col-sm-10">
                    : <label>
        ';
        if(count($user_details->getRoleNames()) > 0){
            foreach($user_details->getRoleNames() as $role){
                $html_details .= $role.'<br>';
            }
        }
        $html_details .= '</label>
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
        return view('mygeo.profil', compact('user'));
    }

    public function edit(){
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $roles = Role::get();
        return view('mygeo.profil_edit', compact('user','roles'));
    }

    public function update_profile(Request $request){
        //save gambar profil.
        if(isset($_FILES['gambar_profil']) && (file_exists($_FILES['gambar_profil']['tmp_name']))){
            $exists = Storage::exists($request->gambar_profil->getClientOriginalName());
            $time = date('Y-m-d'.'_'.'H_i_s');
            $fileName = $time.'_'.$request->gambar_profil->getClientOriginalName();
            $ftest = Storage::putFileAs('public/gambar_profil', $request->file('gambar_profil'), $fileName);
            //dd($fileName,$ftest,pathinfo($fileName,PATHINFO_FILENAME));
        }
        $user = User::where(["id"=>Auth::user()->id])->get()->first();
        $user->name = $request->uname;
        $user->nric = $request->nric;
        $user->email = $request->email;
        $user->agensi_organisasi = $request->agensi_organisasi;
        $user->bahagian = $request->bahagian;
        $user->sektor = $request->sektor;
        $user->phone_pejabat = $request->phone_pejabat;
        $user->phone_bimbit = $request->phone_bimbit;
        if(isset($fileName)){
            $user->gambar_profil = $fileName;        
        }
        $user->save();

        //save user's role
        ModelHasRoles::where(["model_id"=>$user->id,"model_type"=>"App\User"])->delete();
        if(!is_null($request->peranan)){
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
        return view('mygeo.profil', compact('user'));
    }
}
