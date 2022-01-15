<?php

namespace App;
use App\Section;
use App\User;
use App\Lecturer;
use App\offeredCourse;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public function Sections(){
        return $this->hasMany(Section::class ,'colleges_id','id');
    }
    public function Students(){
        return $this->hasMany(User::class ,'colleges_id','id');
    }
    public function Lecturers(){
        return $this->hasMany(Lecturer::class ,'colleges_id','id');
    }
    public function offeredCourse(){
        return $this->hasMany(offeredCourse::class ,'colleges_id','id');
    }
    public function Courses(){
        return $this->hasManyThrough(Course::class,Section::class ,'colleges_id','sections_id','id','id');
   }
}
