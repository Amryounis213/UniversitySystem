<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
class UserLoginController extends Controller
{
    public function __construct(){
       
    }
    public function showUserLoginPage(){
        return view('User.UserLogin');
    }
    public function Userlogin(Request $request){
       
        $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
        $credentials = [
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ];
        
    if (Auth::guard('web')->attempt($credentials)) {
        return redirect()->route('Student.UserDashboard');
        
    }
    
    return back()->withInput($request->only('email', 'remember'));

}

    public function Userlogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('ShowUserLogin'));
    }
}
