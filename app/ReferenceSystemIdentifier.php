<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenceSystemIdentifier extends Model
{
    protected $guard_name = 'web';
    public $table = 'reference_system_identifier';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}