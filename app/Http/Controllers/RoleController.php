<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Log;
use Auth;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        // $this->middleware('auth');
    }

    public function index() {
    }
    
    public function get_roles(){
        echo json_encode(Role::get()); 
        exit;
    }
}
