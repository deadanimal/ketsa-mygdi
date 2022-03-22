<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MReferenceSystemInformation extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_reference_system_information';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}