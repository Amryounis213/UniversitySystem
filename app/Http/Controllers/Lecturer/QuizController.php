<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lecturer;
use Illuminate\Support\Facades\Auth;
use App\Quiz;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=Quiz::with('Courses')->get();
       
        return view('Lecturer.Quiz.index',['quizzes'=>$quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myCourses=Lecturer::with(['Colleges'])->find(Auth::guard('lecturer')->user()->id)->Courses;
        return view('Lecturer.Quiz.create',['myCourses'=>$myCourses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $Quiz=new Quiz();
        $Quiz->courses_id=$request->get('courses_id');
        $Quiz->lecturers_id=Auth::guard('lecturer')->user()->id;
        $Quiz->title=$request->title;
        $Quiz->content=$request->content;
        $Quiz->day=$request->day;
        $Quiz->time_from=$request->time_from;
        $Quiz->time_to=$request->time_to;
        $Quiz->status=$request->status;
        $Quiz->save();
        
        return redirect()->route('Lecturer.quiz.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function makeQuiz($id){
        $Quiz=new Quiz();
        $Quiz->courses_id=$request->$id;
        $Quiz->lecturers_id=Auth::guard('lecturer')->user()->id;
        $Quiz->title=$request->title;
        $Quiz->content=$request->title;
        $Quiz->save();


    }
    public function ShowQuastionBelongsToQuiz($id){
        $Quiz=Quiz::with('Quastions')->where('id',$id)->get();
        $QuizId=Quiz::find($id);
       
        return view('Lecturer.Quiz.show',['Quiz'=>$Quiz ,'QuizId'=>$QuizId]);
    }

}
