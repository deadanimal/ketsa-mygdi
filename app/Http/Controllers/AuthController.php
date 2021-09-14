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
use App\AuditTrail;
use App\MohonData;

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
//        dd(Hash::make('farhan.rimfiel@pipeline-network.comM2'));

        if ($_SERVER['HTTP_HOST'] != "127.0.0.1:8003") {
            if (!isset($request->{'g-recaptcha-response'}) || $request->{'g-recaptcha-response'} == "") {
                return redirect('/login')->with(['msg' => 'Sila lengkapkan reCaptcha']);
            }
        }

        $user = User::where(['email'=>$request->emailf])->get()->first();
        if(is_null($user)){
            return redirect('/login')->with( ['msg' => 'ID pengguna atau kata laluan tidak sah.'] );
        }
        if($user->status == '0'){
            return redirect('/login')->with( ['msg' => 'Akaun anda tidak diaktifkan.'] );
        }
        if($user->disahkan == '0'){
            return redirect('/login')->with( ['msg' => 'Akaun anda belum disahkan. Sila tunggu notifikasi e-mel pengesahan pendaftaran daripada Pentadbir Aplikasi untuk log masuk.'] );
        }

        if(Auth::attempt(['email'=>$request->emailf,'password'=>$request->password])) {

            $at = new AuditTrail();
            $at->path = url()->full();
            $at->user_id = Auth::user()->id;
            $at->data = 'Login';
            $at->save();

            //check for completed penilaians for pemohon datas==================
            $msgPenilaian = "";
            if(Auth::user()->hasRole(['Pemohon Data'])){
                $msgPenilaian = $this->checkAfterSixMonthsPenilaian();
            }

            return redirect()->intended('/landing_mygeo')->with(['msgPenilaian'=>$msgPenilaian]);
        }else{
            return redirect('/login')->with(['msg'=>'ID pengguna atau kata laluan tidak sah.']);
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

    public function checkAfterSixMonthsPenilaian()
    {
        $msg = "";
        $mohonsAfterSixMonthsPenilaian = [];
        //get mohon_data where berjayaMuatTurunTarikh is over 6 months and penilaian is 0 (penilaian not done)
        $afterSixMonthsPenilaian = MohonData::whereNotNull('berjayaMuatTurunTarikh')->where('penilaian','0')->where('user_id',Auth::user()->id)->get();
        if(count($afterSixMonthsPenilaian) > 0){
            $counter = '1';
            $msg = "Data-data berikut telah dimuat turun tetapi belum dibuat penilaian:<br>";
            foreach($afterSixMonthsPenilaian as $a){
                $interval = date_create('now')->diff(date_create($a->berjayaMuatTurunTarikh));
//                if($interval->m > 6){ //ori specs
                if($interval->i > 5){
                    $msg .= $counter.') '.$a->name.'<br>';
                    $counter++;
                }
            }
        }
        return $msg;
    }
}
