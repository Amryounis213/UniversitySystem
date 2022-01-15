<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    public function Courses(){
        return $this->belongsTo(Course::class ,'courses_id','id');
    }
}
