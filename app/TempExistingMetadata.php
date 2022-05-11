<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 


class People extends Model
{
    protected $guard_name = 'web';
    protected $table = 'temp_existing_metadata';
}