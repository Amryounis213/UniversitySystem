<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quiz;
use App\Answer;
use App\Quastion;
class Quastion extends Model
{
    protected $fillable = [
        'quastion','mark','quizzes_id'
      ];
    
    public function Quiz(){
        return $this->belongsTo(Quiz::class,'quizzes_id','id');
    }
    public function Answer(){
        return $this->hasMany(Answer::class,'quastions_id','id');
    }

    public function StoreQuastion($data){
       return Quastion::create($data);
    }
    public function UpdateQuastion($request ,$quiz_id ,$quastion_id){
        
        $Quastion=Quastion::find($quastion_id);
        $Quastion->quastion=$request->quastion;
        $Quastion->quizzes_id=$quiz_id;
        $Quastion->save();
        
    }
}
