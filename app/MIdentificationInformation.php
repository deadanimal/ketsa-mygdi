<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MIdentificationInformation extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_identification_information';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}