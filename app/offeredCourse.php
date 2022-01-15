<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\Lecturer;
use App\College;
use App\Section;

class offeredCourse extends Model
{
    public function Courses(){
        return $this->belongsTo(Course::class, 'courses_id', 'id');
   }
   public function Lecturers(){
        return $this->belongsTo(Lecturer::class, 'lecturers_id', 'id');
    }
    public function colleges(){
    return $this->belongsTo(College::class, 'colleges_id', 'id');
    }
    public function Sections(){
        return $this->belongsTo(Section::class, 'sections_id', 'id');
        }
}
