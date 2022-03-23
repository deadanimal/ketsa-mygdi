<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\AuditTrail;
use App\PortalTetapan;
use Auth;
use App\Visitors;
use App\States;
use App\Countries;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $portal = PortalTetapan::get()->first();
        $states = States::where(['country' => 1])->get()->all();
        $countries = Countries::where(['id' => 1])->get()->all();
//        $address = $_SERVER['REMOTE_ADDR'];
//          Visitors::firstOrCreate(['address'=>$address]);
//          $total_visitors = Visitors::get();
        return view('auth.login', compact('portal','states','countries'));
    }

    public function logout(){
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Logout';
        $at->save();

        Auth::logout();
        return redirect('/login');
    }
}
