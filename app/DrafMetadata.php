<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrafMetadata extends Model
{
    protected $guard_name = 'web';
    public $table = 'draf_metadata';

    //relationships
    // public function identification_information(){
    //     return $this->belongsTo(MIdentificationInformation::class,'m_identification_information');
    // }
}
