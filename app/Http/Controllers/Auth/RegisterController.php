<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\AuditTrail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $criterias = [
            'name' => ['required', 'string'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        
//        $user = User::where('email',$data['email'])->get()->first();
//        if($user){
//            $criterias = [
//                'name' => ['required', 'string'],
//                'password' => ['required', 'string', 'min:8', 'confirmed'],
//            ];
//        }
        
        $valid = Validator::make($data,$criterias);

        return $valid;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $userdaftaremail = $data['email'];
        $user = User::where('email',$data['email'])->get()->first();
        if(!$user){
            $user = User::create([
                'name' => $data['name'],
                'nric' => $data['nric'],
                'email' => $data['email'],
                'agensi_organisasi' => $data['agensi_organisasi'],
                'bahagian' => $data['bahagian'],
                'sektor' => $data['sektor'],
                'phone_pejabat' => $data['phone_pejabat'],
                'phone_bimbit' => $data['phone_bimbit'],
                'password' => Hash::make($data['password']),
                'alamat' => $data['alamat'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'state' => $data['state'],
                'country' => $data['country'],
                'kategori' => $data['kategori'],
                'status' => ($data['peranan'] == "Pemohon Data" ? "1":"0"),
                'disahkan' => ($data['peranan'] == "Pemohon Data" ? "1":"0"),
                'assigned_roles' => $data['peranan'],
            ]);
        }else{
            $var = $user->assigned_roles;
            if($var == ""){
                $var = $data['peranan'];
            }else{
                $var = $var.",".$data['peranan'];
            }
            $user->assigned_roles = $var;
            $user->save();
            
            $user->syncRoles([]);
        }

        $requestPeranans = explode(',',$data['peranan']);
        foreach($requestPeranans as $rp){
            //assign roles to user
            $user->assignRole($rp);
            
            //email user based on role
            if($rp == "Pemohon Data"){
                //send email to the pemohon data
                $to_name = $data['name'];
                $to_email = $userdaftaremail;
                $data = array('name'=>$data['name']);
                Mail::send('mails.exmpl7', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)->subject('MyGeo Explorer - Pendaftaran Berjaya');
                    $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                });
            }else{
                //send email to the pentadbiraplikasi
                $to_name = 'pentadbiraplikasi@gmail.com';
                $to_email = 'pentadbiraplikasi@gmail.com';
                $data = array('name'=>$data['name']);
                Mail::send('mails.exmpl2', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)->subject('Pengesahan Pendaftaran Penerbit/Pengesah Metadata MyGeo Explorer');
                    $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                });
            }
            break; //just assign one role at a time
        }

        
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = $user->id;
        $at->data = 'Create';
        $at->save();

        return $user;
    }

    public function register(Request $request)
    {
        $theUser = User::where('email',$request->email)->get()->first();
        if($theUser){
            //check if user already has 2 roles. max 2 roles per user
//            if(count($theUser->getRoleNames()) == 2){
//                return redirect($this->redirectPath())->with(['error'=>'1','message'=>'Anda dah ade 2 role dah']);
//            }
            
            //check if user already registered with the role selected
            $roles = $theUser->getRoleNames();
            $r2 = [];
            foreach($roles as $role){
                $r2[] = $role;
            }
            $requestPeranans = explode(',',$request->peranan);
            foreach($requestPeranans as $rp){
                if(in_array($rp,$r2)){
                    return redirect($this->redirectPath())->with(['error'=>'1','message'=>'Anda telah didaftar dengan peranan dipilih.']);
                }
            }
        }
        
        //if role selected is pengesah, check if there is already a pengesah in the bahagian selected
        $requestPeranans = explode(',',$request->peranan);
        foreach($requestPeranans as $rp){
            if($rp == 'Pengesah Metadata' && $request->bahagian != ""){
                $pengesahs = User::whereHas("roles", function ($q) {
                    $q->where("name", "Pengesah Metadata");
                })->where('agensi_organisasi', $request->agensi_organisasi)->where('bahagian', $request->bahagian)->get();
                if(!empty($pengesahs) && count($pengesahs) > 0){
                    return redirect($this->redirectPath())->with(['error'=>'1','message'=>'Anda telah memilih Bahagian yang telah mempunyai Pengesah Metadata yang berdaftar. Hanya satu Pengesah Metadata yang akan didaftarkan dalam satu Agensi dan Bahagian yang sama. Sila hubungi Pentadbir Aplikasi untuk maklumat lanjut.']);
                }
            }
        }
        
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        if($request['peranan'] == "Pemohon Data"){
            $msg = 'Akaun anda telah berjaya didaftarkan. Sila log masuk menggunakan e-mel sebagai ID pengguna dan kata laluan yang telah ditetapkan semasa mengisi borang pendaftaran.';
        }else{
            if($user->disahkan == '0'){
                $msg = 'Pendaftaran anda dalam proses pengesahan. Anda akan menerima e-mel daripada pentadbir sekiranya pendaftaran berjaya';
            }else{
                $msg = 'Pendaftaran berjaya';
            }
        }
        return $this->registered($request, $user)?: redirect($this->redirectPath())->with('success',$msg);
     }
}
