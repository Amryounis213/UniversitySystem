<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class Admin extends Authenticatable
{
    public function Roles(){
        return $this->belongsTo(Role::class ,'roles_id','id');
    }
    
}
