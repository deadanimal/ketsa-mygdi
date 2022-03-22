<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MConstraints extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_constraints';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}