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
    
    public function ftestdb(Request $request){
        $hero = [];
        if($request['heroid'] == "10"){
            $hero = ['id'=>$request['heroid'],'name'=>"alonso"];
        }elseif($request['heroid'] == "11"){
            $hero = ['id'=>$request['heroid'],'name'=>"massa"];
        }elseif($request['heroid'] == "12"){
            $hero = ['id'=>$request['heroid'],'name'=>"kimi"];
        }elseif($request['heroid'] == "13"){
            $hero = ['id'=>$request['heroid'],'name'=>"glock"];
        }elseif($request['heroid'] == "14"){
            $hero = ['id'=>$request['heroid'],'name'=>"sirotkin"];
        }elseif($request['heroid'] == "15"){
            $hero = ['id'=>$request['heroid'],'name'=>"verstappen"];
        }
        
        echo json_encode($hero);
        exit();
//        return view('people.ftestdb', compact('people'));
    }
    
    public function ftestdb2(){
        $metadatasdb = MetadataGeo::on('pgsql2')->skip(0)->take(500)->get()->all();
        $metadatasjson = [];
        foreach($metadatasdb as $met){
            $ftestxml2 = <<<XML
                    $met->data
                    XML;
            $ftestxml2 = str_replace("gco:","",$ftestxml2);
            $ftestxml2 = str_replace("gmd:","",$ftestxml2);
            $xml2 = simplexml_load_string($ftestxml2);
//            echo $xml2->contact->CI_ResponsibleParty->individualName->CharacterString."_ftest<br>";
            $metadatasjson[]=$xml2;
        }
        
        echo json_encode($metadatasjson);
        exit();
    }
    
    public function ftestdb3(){
        $cars = [
            ["id"=>"1","name"=>"Proton","country"],
            ["id"=>"2","name"=>"Pagani","Italy"],
            ["id"=>"3","name"=>"Honda","Japan"],
            ["id"=>"4","name"=>"Kia","Korea"],
            ["id"=>"5","name"=>"Volvo","Sweden"],
            ["id"=>"6","name"=>"Chevrolet","USA"],
            ["id"=>"7","name"=>"Volkswagen","Germany"],            
            ["id"=>"8","name"=>"Renault","France"],
            ["id"=>"9","name"=>"Lada","Russia"]
        ];
        
        echo json_encode($cars);
        exit();
    }
}
