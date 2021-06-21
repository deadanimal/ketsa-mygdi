<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ModelHasRoles;
use Illuminate\Support\Facades\Log;
use Auth;
use Hash;
 
class AuthController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
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
        // $this->testLogin();
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'disahkan'=>'1'])) {
            // Authentication passed...
            return redirect()->intended('/landing_mygeo');
        }else{
            return redirect('/login')->with( ['msg' => 'Akaun anda belum disahkan.'] );
        } 
    } 

    public function testLogin(){
        $user = new User;
        $user->name = 'joe';
        $user->email = 'joe@gmail.com';
        $user->password = Hash::make('123456');

        if(!($user->save())){
            dd('user is not being saved to database properly - this is the problem');          
        }

        if(!(Hash::check('123456', Hash::make('123456')))){
            dd('hashing of password is not working correctly - this is the problem');          
        }

        if(!(Auth::attempt(array('email' => 'joe@gmail.com', 'password' => '123456')))){
            dd('storage of user password is not working correctly - this is the problem');          
        }else{
         dd('everything is working when the correct data is supplied - so the problem is related to your forms and the data being passed to the function');
        }
    }
}
