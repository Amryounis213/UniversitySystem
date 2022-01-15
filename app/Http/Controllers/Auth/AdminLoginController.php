<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
class AdminLoginController extends Controller
{
    public function __construct(){
       
    }
    public function showAdminLoginPage(){
        return view('auth.login');
    }
    public function Adminlogin(Request $request){
       
        $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
        $credentials = [
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ];
        
    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('dashboard');
        
    }
    
    return back()->withInput($request->only('email', 'remember'));

}

    public function Adminlogout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('ShowAdminLogin'));
    }
}
