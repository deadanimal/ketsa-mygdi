<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MTopicCategory extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_topic_category';

    //relationships
    public function metadata(){
        return $this->belongsTo(Metadata::class);
    }
}