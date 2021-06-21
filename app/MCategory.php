<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_category';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}