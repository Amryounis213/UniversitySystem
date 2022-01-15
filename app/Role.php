<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Lecturer;
use App\Admin;
class Role extends Model
{
    public function Students(){
        return $this->hasOne(User::class ,'roles_id','id');
    }
    public function Lecturers(){
        return $this->hasOne(Lecturer::class ,'roles_id','id');
    }
    public function Admins(){
        return $this->hasOne(Admin::class ,'roles_id','id');
    }
}
