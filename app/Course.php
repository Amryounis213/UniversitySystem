<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Section;
use App\College;
use App\Lecturer;
use App\offeredCourse;
use App\Homework;
class Course extends Model
{
    public function Sections(){
        return $this->belongsTo(Section::class ,'sections_id','id');
    }
    public function Colleges(){
        return $this->belongsTo(College::class ,'colleges_id','id');
    }
    public function Lecturers(){
        return $this->belongsToMany(Lecturer::class ,'lecturers_courses','courses_id','lecturers_id');
    }
    public function offeredCourse(){
        return $this->hasMany(offeredCourse::class ,'courses_id','id');
    }
    public function Homeworks(){
        return $this->hasMany(Homework::class ,'courses_id','id');
    }
    public function Quizzes(){
        return $this->hasMany(Quiz::class,'courses_id' ,'id');
    }

    
}
