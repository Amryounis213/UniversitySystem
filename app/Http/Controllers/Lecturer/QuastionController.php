<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quastion;
use App\Quiz;
use App\Answer;
use App\Course;
class QuastionController extends Controller
{
    public function index(){
       $courses=Course::with('Quizzes.Quastions')->get();
        
        return view('Lecturer.Quastion.index',['courses'=>$courses]);
    }
    public function create($id){
        $Quizzes=Quiz::find($id);
        return view('Lecturer.Quastion.create',['Quizzes'=>$Quizzes]);
    }

    public function AddQuastions(Request $request ,$id){
        
        $data=$this->FormValidate($request);
        $Quastion=(new Quastion)->StoreQuastion($data);
        $Answer=(new Answer)->StoreAnswer($data , $Quastion);
        return redirect()->back();

    }
    
    public function FormValidate($request){
        return $this->validate($request,[
            'quizzes_id'=>'required',
            'quastion'=>'required|string',
            'mark'=>'required',
            'options'=>'bail|required|array|min:2',
            'options.*'=>'bail|required',
            'correct_answer'=>'required'
        ]);
    }
    public function edit($quiz,$id){
     $quastions=Quastion::find($id);
     $Quizzes=Quiz::find($quiz);
     return view('Lecturer.Quastion.edit',['quastions'=>$quastions ,'Quizzes'=>$Quizzes]);
    }

    public function UpdateQuastions(Request $request ,$quiz_id ,$quastion_id){
        $data=$this->FormValidate($request);
        $quastions=(new Quastion)->UpdateQuastion($request ,$quiz_id ,$quastion_id);
        $answers=(new Answer)->UpdateAnswer($request,$quastions ,$quastion_id);
        return redirect()->back();
    }

   

}
