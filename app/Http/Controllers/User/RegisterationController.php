<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Homework;
use App\Section;
use App\offeredCourse;
use App\Registeration;
use App\Course;
use Illuminate\Support\Facades\Auth;
use App\Quastion;
use App\Quiz;
use App\Answer;
use App\User;
use App\Taker;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
use PDF;

class RegisterationController extends Controller
{
   public function index()
   {
      $courses = offeredCourse::with('Lecturers', 'Courses')->where('sections_id', Auth::guard('web')->user()->Sections->id)->get();

      return view('User.MyCourses', ['courses' => $courses]);
   }

   public function takeCourse(Request $request, $id)
   {
      $Offered = offeredCourse::find($id);
      $isReg = Registeration::where('users_id', Auth::guard('web')->user()->id)->where('courses_id', $Offered->Courses->id)->exists();
      if ($isReg) {
         return redirect()->back()->with('message', 'This Course Already Token');
      } else {
         $reg = new Registeration();
         $reg->users_id = Auth::guard('web')->user()->id;
         $reg->courses_id = $Offered->Courses->id;
         $reg->lecturers_id = $Offered->Lecturers->id;
         $reg->coursename = $Offered->Courses->name;
         $reg->hours = $Offered->Courses->hours;
         $reg->lecturer_firstname = $Offered->Lecturers->first_name;
         $reg->lecturer_lastname = $Offered->Lecturers->last_name;
         $reg->save();
         return redirect()->route('Student.myCourses');
      }
   }
   public function QuastionsForUsers($id)
   {
      $Quiz = Quiz::find($id);
      $Quiz->Quastions;
   }

   public function reg_view($id)
   {

      $homeworks = Course::find(Auth::guard('web')->user()->RegisterationCourse[$id - 1]->courses_id)->Homeworks;
      return view('User.Homeworks', ['homeworks' => $homeworks]);
   }
   public function ViewMyCourses()
   {
      $courses = Registeration::where('users_id', Auth::guard('web')->user()->id)->get();
      $total = 0;
      foreach ($courses as $course) {
         $Hours_count = $course->hours;
         $total = $Hours_count + $total;
      }
      return view('User.Registeration', ['courses' => $courses, 'total' => $total]);
   }

   public function FullCourses()
   {
      $courses = Registeration::where('users_id', Auth::guard('web')->user()->id)->get();
      return view('User.MyHomework', ['courses' => $courses]);
   }
   public function FullCourses2()
   {
      $courses = Registeration::where('users_id', Auth::guard('web')->user()->id)->get();
      return view('User.QuizzesList', ['courses' => $courses]);
   }

   public function viewHomework($course, $lecturer)
   {
      $homeworks = Homework::where('courses_id', $course)
         ->where('lecturers_id', $lecturer)
         ->get();
      $count = Homework::where('courses_id', $course)
         ->where('lecturers_id', $lecturer)
         ->count();
      return view('User.ShowMyHomework', ['homeworks' => $homeworks, 'count' => $count]);


      // $homeworks=Course::find()->Homeworks;
   }

   public function quiz($id)
   {
      $quastions = Quastion::where('quizzes_id', $id)->inRandomOrder()->limit(10)->get();
      return view('User.Quiz', ['quastions' => $quastions]);
   }

   public function viewQuizzes($course, $lecturer)
   {

      $Quizzes = Quiz::where('courses_id', $course)->where('lecturers_id', $lecturer)->get();
      $course = Course::find($course);
      return view('User.ShowQuizzes', ['Quizzes' => $Quizzes, 'course' => $course]);
   }

   public function revokeCourse($id)
   {
      $isDeleted = Registeration::destroy($id);
      return redirect()->back();
   }

   public function Submitanswer(Request $request)
   {
      //  $Answers=Course::with('Quizzes.Quastions',function($query){
      //     return $query->where()
      //  })->get();
      $Quiz = Quiz::find(2);
      $Answers = new Answer();
      $Answers->users_id = Auth::guard('web')->user()->id();
   }

   public function ConfirmAttempt($id)
   {
      $Quiz = Quiz::with(['Courses', 'Lecturers'])->find($id);
      $hasAttempt = Taker::where('users_id', Auth::guard('web')->user()->id)->where('quizzes_id', $Quiz->id)->exists();
      return view('User.BeforeQuiz', ['Quiz' => $Quiz, 'hasAttempt' => $hasAttempt]);
   }
   public function StoreTaker($id)
   {

      $isAttempted = [];

      $quiz = Quiz::find($id);
      $users = Taker::where('users_id', Auth::guard('web')->user()->id)->where('quizzes_id', $quiz->id)->exists();
      if ($users) {
         return redirect()->back()->with('message', 'You are not allowed to enter more than once');
      } else {
         $taker = new Taker();
         $taker->quizzes_id = $quiz->id;
         $taker->users_id = Auth::guard('web')->user()->id;
         $taker->save();
         return redirect()->route('Student.OpenQuiz', $taker->quizzes_id);
      }
   }


   /* public function MakePDF()
   {
      $courses = Registeration::where('users_id', Auth::guard('web')->user()->id)->get();
      $pdf = PDF::loadView('User.invoice');
      return $pdf->download('22.pdf');
   }*/
}
