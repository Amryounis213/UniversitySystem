<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Course;
use App\College;
use App\offeredCourse;
class Section extends Model
{
    //1---HasMany Relationships --- 
    public function Students(){
        return $this->hasMany(User::class ,'sections_id','id');
    }
    public function Courses(){
        return $this->hasMany(Course::class ,'sections_id','id');
    }
    //2--BelongsTo Relationships
    public function Colleges(){
        return $this->belongsTo(College::class ,'colleges_id','id');
    }
    public function offeredCourse(){
        return $this->hasMany(offeredCourse::class ,'sections_id','id');
    }
    public function Lecturers(){
        return $this->hasMany(Lecturer::class ,'sections_id','id');
    }
    
}
