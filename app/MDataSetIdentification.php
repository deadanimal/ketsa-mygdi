<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDataSetIdentification extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_data_set_identification';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}