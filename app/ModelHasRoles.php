<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRoles extends Model
{
    protected $guard_name = 'web';
    public $table = 'model_has_roles';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}