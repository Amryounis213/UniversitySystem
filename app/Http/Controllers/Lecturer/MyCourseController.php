<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Lecturer;
use App\Registeration;
use App\User;
use App\College;
use App\offeredCourse;
use Illuminate\Support\Facades\Auth;
use PDF;
class MyCourseController extends Controller
{
    public function index(){
       
        $myCourses=Lecturer::with(['Colleges'])->find(Auth::guard('lecturer')->user()->id)->Courses;
       
        return view('Lecturer.MyCourses',['myCourses'=>$myCourses]);
    }

    public function showstudent($id){
            
             $students=User::whereHas('RegisterationCourse',function($query) use($id){
                 return $query->where('lecturers_id',Auth::guard('lecturer')->user()->id)
                 ->where('courses_id',$id);
                })->get();
                $course=Course::find($id);
                return view('Lecturer.Mystudent',['students'=>$students ,'course'=>$course]);
            
      
    }

    public function tester(){
    /*    Registeration::whereHas('Homeworks',function($query){
            $query->where('courses_id',)
        })->get();
      /*  Homework::whereHas('RegisterationCourse',function($query){
            $query->where
        });
        Registeration::find($id)->Homeworks*/
    }
    public function PrintStudent($id){
        
        $students=User::whereHas('RegisterationCourse',function($query) use($id){
            return $query->where('lecturers_id',Auth::guard('lecturer')->user()->id)
            ->where('courses_id',$id);
           })->get();

            $pdf = PDF::loadView('Lecturer.printStudent',['students'=>$students]);
             return $pdf->download('22.pdf');
    }
}
