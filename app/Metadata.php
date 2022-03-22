<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $guard_name = 'web';
    public $table = 'metadata';

    //relationships
    public function identification_information(){
        return $this->belongsTo(MIdentificationInformation::class,'m_identification_information');
    }
    public function topic_category(){
        return $this->hasMany(MTopicCategory::class);
    }
}