<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function Quastions(){
        return $this->hasMany(Quastion::class,'quizzes_id','id');
    }
    public function Courses(){
        return $this->belongsTo(Course::class ,'courses_id','id');
    }
    public function Lecturers(){
        return $this->belongsTo(Lecturer::class ,'lecturers_id','id');
    }
    
}
