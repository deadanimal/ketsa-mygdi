<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ModelHasRoles;
use Illuminate\Support\Facades\Log;
use Auth;
use Hash;
use UxWeb\SweetAlert\SweetAlert;

class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('auth');
    }

    public function authenticate(Request $request)
    {
        // echo "<pre>";
        // var_dump($request->email);
        // var_dump($request->password);  $2y$10$ds5kaqrIwRymOP.Fo0s5Feocrp6LE6GSoz91KlPVCjDAVkHdireqm
        // var_dump(Hash::make($request->password));
        // echo "</pre>";
        // exit();

        if ($_SERVER['HTTP_HOST'] != "127.0.0.1:8003") {
            if (!isset($request->{'g-recaptcha-response'}) || $request->{'g-recaptcha-response'} == "") {
                return redirect('/login')->with(['msg' => 'Sila lengkapkan reCaptcha']);
            }
        }

        $user = User::where(['email' => $request->emailf])->get()->first();
        if ($user->status == '0') {
            return redirect('/login')->with(['msg' => 'Akaun anda tidak diaktifkan.']);
        }
        if ($user->disahkan == '0') {
            return redirect('/login')->with(['msg' => 'Akaun anda belum disahkan. Sila tunggu notifikasi e-mel pengesahan pendaftaran daripada Pentadbir Aplikasi untuk log masuk.']);
        }

        if (Auth::attempt(['email' => $request->emailf, 'password' => $request->password, 'disahkan' => '1', 'status' => '1'])) {
            // Authentication passed...
            alert()->success('Log masuk telah berjaya', 'Berjaya');
            return redirect()->intended('/landing_mygeo');
        } else {
            alert()->warning('ID pengguna atau kata laluan tidak sah.', 'Tidak Berjaya');
            return redirect('/login');
        }
    }

    public function testLogin()
    {
        $user = new User;
        $user->name = 'joe';
        $user->email = 'joe@gmail.com';
        $user->password = Hash::make('123456');

        //        if(!($user->save())){
        //            dd('user is not being saved to database properly - this is the problem');
        //        }

        if (!(Hash::check('123456', Hash::make('123456')))) {
            dd('hashing of password is not working correctly - this is the problem');
        }

        if (!(Auth::attempt(['email' => 'pentadbiraplikasi@pipeline.com', 'password' => 'pentadbiraplikasi@pipeline.com']))) {
            dd('storage of user password is not working correctly - this is the problem');
        } else {
            dd('everything is working when the correct data is supplied - so the problem is related to your forms and the data being passed to the function');
        }
    }
}
