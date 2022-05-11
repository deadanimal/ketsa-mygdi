<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Database\Eloquent\SoftDeletes; 


class People extends Model
{
    protected $guard_name = 'web';
    protected $table = 'people';
    // use HasRoles;
    // use SoftDeletes;
    protected $fillable = ['name','country'];
}