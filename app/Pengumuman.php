<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $dates = ['date'];
    protected $guard_name = 'web';
    public $table = 'pengumuman';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}
