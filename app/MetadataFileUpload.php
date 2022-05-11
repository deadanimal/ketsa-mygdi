<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MFileUpload extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_file_upload';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}