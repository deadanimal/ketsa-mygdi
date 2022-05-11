<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MacgdiGptResourceData extends Model
{
    protected $guard_name = 'web';
    public $table = 'macgdi__gpt_resource_data';

    //relationships
    // public function identification_information(){
    //     return $this->belongsTo(MIdentificationInformation::class,'m_identification_information');
    // }
}
