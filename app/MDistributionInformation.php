<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDistributionInformation extends Model
{
    protected $guard_name = 'web';
    public $table = 'm_distribution_information';

    //relationships
    public function regions(){
        // return $this->belongsTo(Region::class,'region');
    }
}