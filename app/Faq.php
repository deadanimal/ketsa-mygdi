<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guard_name = 'web';
    public $table = 'faq';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}