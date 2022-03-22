<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $guard_name = 'web';
    public $table = 'visitors';

    protected $fillable = ['address'];
}