<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AuditTrail extends Model
{
    protected $guard_name = 'web';
    protected $table = 'audit_trail';
    
    public function getUser(){
        return $this->belongsTo('App\User','user_id','id');
    }
}