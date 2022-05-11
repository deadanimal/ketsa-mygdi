<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    protected $guard_name = 'web';
    public $table = 'hubungi_kami';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}