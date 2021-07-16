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
        $valid = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
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
        //save attachment. currently unused. to be used as reference.
        if(isset($_FILES['surat_sokongan']) && (file_exists($_FILES['surat_sokongan']['tmp_name']))){ die('ftester');
            // $exists = Storage::exists($request->c6_order_instructions->getClientOriginalName());
            // $time = date('Y-m-d'.'_'.'H_i_s');
            // $fileName = $time.'_'.$request->c6_order_instructions->getClientOriginalName();
            // Storage::putFileAs('public', $request->file('c6_order_instructions'), $fileName);

            // $fileUpload = new MFileUpload();
            // $fileUpload->file_name = pathinfo($fileName,PATHINFO_FILENAME);
            // $fileUpload->extension_format = $request->c6_order_instructions->getClientOriginalExtension();
            // $fileUpload->metadata_id = $metadata->id;
            // $fileUpload->save();
        }
//        dd($data);exit();
        
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
        ]);
        
        $userRole = $user->assignRole($data['peranan']);

        return $user;
    }
    
    public function register(Request $request)
    {
//        dd($request);
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        return $this->registered($request, $user)?: redirect($this->redirectPath());
     }
}
