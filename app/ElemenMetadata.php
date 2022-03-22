<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ElemenMetadata extends Model
{
    protected $guard_name = 'web';
    protected $table = 'elemen_metadata';
    
    public function getKategori(){
        return $this->hasOne('App\MCategory', 'id', 'kategori');
    }
    
    public function getTajuk(){
        return $this->hasOne('App\Tajuk', 'id', 'tajuk');
    }
    
//    public function getSubTajuk(){
//        return $this->hasOne('App\Tajuk', 'id', 'sub_tajuk');
//    }
}