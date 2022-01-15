<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\College;
use App\Course;
use App\Role;
use App\Homework;
use App\offeredCourse;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Lecturer extends Authenticatable
{
    public function Colleges(){
        return $this->belongsTo(College::class ,'colleges_id','id');
    }
    public function Roles(){
        return $this->belongsTo(Role::class ,'roles_id','id');
    }
    public function Courses(){
        return $this->belongsToMany(Course::class ,'lecturers_courses','lecturers_id','courses_id');
    }
    public function offeredCourse(){
        return $this->hasMany(offeredCourse::class ,'lecturers_id','id');
    }
   
    public function Sections(){
        return $this->belongsTo(Section::class ,'sections_id','id');
    }
    public function Quizzes(){
        return $this->hasMany(Quiz::class ,'lecturers_id','id');
    }
}
