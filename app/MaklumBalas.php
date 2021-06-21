<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaklumBalas extends Model
{
    protected $guard_name = 'web';
    public $table = 'maklum_balas';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}