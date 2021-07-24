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
        if($_SERVER['HTTP_HOST'] == "localhost:8888"){
            $valid = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }else{
            $valid = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);    
        }
        
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
        $user = User::create([
            'name' => $data['name'],
            'nric' => $data['nric'],
            'email' => $data['email'],
            'agensi_organisasi' => $data['agensi_organisasi'],
            'bahagian' => $data['bahagian'],
            'sektor' => $data['sektor'],
            'email' => $data['email'],
            'phone_pejabat' => $data['phone_pejabat'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['alamat'],
            'kategori' => $data['kategori'],
            'status' => "0",
        ]);

        $userRole = $user->assignRole($data['peranan']);
        
        //send email to the pentadbiraplikasi
        $to_name = 'pentadbiraplikasi@gmail.com';
        $to_email = 'pentadbiraplikasi@gmail.com';
        $data = array('name'=>$data['name']);
        Mail::send('mails.exmpl2', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Pengesahan Pendaftaran Penerbit/Pengesah Metadata MyGeo Explorer');
            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
        });

        return $user;
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        return $this->registered($request, $user)?: redirect($this->redirectPath())->with('message','Pendaftaran anda dalam proses pengesahan. Anda akan menerima e-mel daripada pentadbir sekiranya pendaftaran berjaya');
     }
}
