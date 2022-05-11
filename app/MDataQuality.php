<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDataQuality extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_data_quality';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}