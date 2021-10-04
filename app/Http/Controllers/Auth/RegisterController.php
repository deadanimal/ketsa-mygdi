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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        
        $user = User::where('email',$data['email'])->get()->first();
        if($user){
            $criterias = [
                'name' => ['required', 'string'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }
        
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
        $user = User::where('email',$data['email'])->get()->first();
        if(!$user){
            $user = User::create([
                'name' => $data['name'],
                'nric' => $data['nric'],
                'email' => $data['email'],
                'agensi_organisasi' => $data['agensi_organisasi'],
//                'institusi' => $data['institusi'],
                'bahagian' => $data['bahagian'],
                'sektor' => $data['sektor'],
                'email' => $data['email'],
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
            $var = $var.",".$data['peranan'];
            $user->assigned_roles = $var;
            $user->save();
            
            $user->syncRoles([]);
        }

        $user->assignRole($data['peranan']);

        if($data['peranan'] == "Pemohon Data"){
            //send email to the pemohon data
            $to_name = $data['name'];
            $to_email = $data['email'];
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
            if(count($theUser->getRoleNames()) == 2){
                return redirect($this->redirectPath())->with(['error'=>'1','message'=>'Anda dah ade 2 role dah']);
            }
            $roles = $theUser->getRoleNames();
            $r2 = [];
            foreach($roles as $role){
                $r2[] = $role;
            }
            //check if user already registered with the role selected
            if(in_array($request->peranan,$r2)){
                return redirect($this->redirectPath())->with(['error'=>'1','message'=>'Anda telah didaftar dengan peranan dipilih.']);
            }
        }
        
        //if role selected is pengesah, check if there is already a pengesah in the bahagian selected
        if($request->peranan == 'Pengesah Metadata' && $request->bahagian != ""){
            $pengesahs = User::whereHas("roles", function ($q) {
                $q->where("name", "Pengesah Metadata");
            })->where('bahagian', $request->bahagian)->get(); //SMBG SINI
            if($pengesahs){
                return redirect($this->redirectPath())->with(['error'=>'1','message'=>'Bahagian dipilih sudah ada Pengesah.']);
            }
        }
        
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        if($request['peranan'] == "Pemohon Data"){
            $msg = 'Akaun anda telah berjaya didaftarkan. Sila log masuk menggunakan e-mel sebagai ID pengguna dan kata laluan yang telah ditetapkan semasa mengisi borang pendaftaran.';
        }else{
            $msg = 'Pendaftaran anda dalam proses pengesahan. Anda akan menerima e-mel daripada pentadbir sekiranya pendaftaran berjaya';
        }
        return $this->registered($request, $user)?: redirect($this->redirectPath())->with('success',$msg);
     }
}
