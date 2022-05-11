<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $guard_name = 'web';
    public $table = 'states';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}