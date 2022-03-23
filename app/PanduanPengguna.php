<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PanduanPengguna extends Model
{
    protected $guard_name = 'web';
    public $table = 'panduan_pengguna';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}