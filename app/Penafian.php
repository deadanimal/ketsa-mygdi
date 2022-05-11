<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penafian extends Model
{
    protected $guard_name = 'web';
    public $table = 'penafian';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}