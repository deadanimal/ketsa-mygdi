<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ftesttodel2 extends Model
{
    protected $connection = 'pgsql2';
    protected $guard_name = 'web';
    public $table = 'ftesttodel2';
    public $timestamps = false;
}
