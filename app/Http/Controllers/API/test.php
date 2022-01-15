<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lecturer;
use App\Traits\GeneralTrait;
class test extends Controller
{
    use GeneralTrait;
    public function getLecturer(){

        $Lecturers=Lecturer::all();
        if(!$Lecturers){
            return $this->returnError(404,'Not Found') ;
        }
        else{
            return $this->returnData('Lecturers:',$Lecturers ,'Success Proccess');
        }
        
    }

    /* $quastions=new Quastion() ;
        $answers=new Answer($quastions->id)
    */
}
