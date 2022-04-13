<?php

namespace App\Http\Controllers\Auth;

use App\AuditTrail;
use App\Countries;
use App\Http\Controllers\Controller;
use App\KelasKongsi;
use App\PortalTetapan;
use App\Providers\RouteServiceProvider;
use App\States;
use Auth;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $kelas_g2g = KelasKongsi::where('category', 'G2G')
            ->where('status', '1')->get();
        $kelas_g2c = KelasKongsi::where('category', 'G2C')
            ->where('status', '1')->get();

        $g2g_div = 1;
        if ($kelas_g2g->isEmpty()) {
            $g2g_div = 0;
        }
        $g2c_div = 1;
        if ($kelas_g2c->isEmpty()) {
            $g2c_div = 0;
        }

        return view('auth.login', compact('portal', 'states', 'countries', 'g2g_div', 'g2c_div'));
    }

    public function logout()
    {
        $at = new AuditTrail();
        $at->path = url()->full();
        $at->user_id = Auth::user()->id;
        $at->data = 'Logout';
        $at->save();

        Auth::logout();
        return redirect('/login');
    }
}
