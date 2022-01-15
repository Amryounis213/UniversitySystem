<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\Quastion;
class Answer extends Model
{
    protected $fillable = ['answer','quastions_id','is_correct'];
    public function Quastions(){
        return $this->belongsTo(Quastion::class,'quastions_id','id');
    }

    public function StoreAnswer($data , $quastion){
        foreach($data['options'] as $key=> $option ){
            $is_correct=false;
            if($key == $data['correct_answer']){
                $is_correct=true;
            }
            $answer=Answer::create([
                'quastions_id'=>$quastion->id ,
                'answer' => $option ,
                'is_correct'=>$is_correct 
            ]);
        }
    }

    public function UpdateAnswer($request,$quastion ,$quastion_id){
        $quastion=Quastion::find($quastion_id);
        $this->DeleteAnswer($quastion->id);
        $this->StoreAnswer($request ,$quastion);
    }
    public function DeleteAnswer($quastion){

        Answer::where('quastions_id',$quastion)->delete();

    }
    
}
