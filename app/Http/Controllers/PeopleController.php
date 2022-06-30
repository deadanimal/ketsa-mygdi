<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\People;
use App\MetadataGeo;
use Illuminate\Support\Facades\Log;
use Auth;


class PeopleController extends Controller {

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
    
}
