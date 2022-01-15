<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
class LecturerLoginController extends Controller
{
    public function __construct(){
       
    }
    public function showLecturerLoginPage(){
        return view('Lecturer.LecturerLogin');
    }
    public function Lecturerlogin(Request $request){
       
        $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
        $credentials = [
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ];
        
    if (Auth::guard('lecturer')->attempt($credentials)) {
        return redirect()->route('LecturerDashboard');
        
    }
    
    return back()->withInput($request->only('email', 'remember'));

}

    public function Lecturerlogout(Request $request){
        Auth::guard('lecturer')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('ShowLecturerLogin'));
    }
}
