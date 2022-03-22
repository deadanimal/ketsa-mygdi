<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MetadataTemplate extends Model
{
    protected $guard_name = 'web';
    protected $table = 'metadata_template';
    
    protected $casts = ['template' => 'array'];
}