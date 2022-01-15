<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{
    public function Students(){
        return $this->belongsTo(User::class ,'users_id' ,'id');
    }

   
}
