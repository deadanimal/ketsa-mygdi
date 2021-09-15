<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomMetadataInput extends Model
{
    protected $guard_name = 'web';
    public $table = 'custom_metadata_input';

    protected $fillable = [
        'name',
        'data_type',
        'data',
        'mandatory',
        'kategori',
        'status',
    ];
    
    //relationships
    public function getKategori(){
        return $this->belongsTo(MCategory::class,'kategori','id');
}
}