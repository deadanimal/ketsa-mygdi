<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetadataGeo extends Model
{
    protected $connection = 'pgsql2';
    protected $guard_name = 'web';
    public $table = 'metadata';
}