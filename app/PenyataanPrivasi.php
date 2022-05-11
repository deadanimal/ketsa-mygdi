<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyataanPrivasi extends Model
{
    protected $guard_name = 'web';
    public $table = 'penyataan_privasi';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}