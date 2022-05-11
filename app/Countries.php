<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $guard_name = 'web';
    public $table = 'countries';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}