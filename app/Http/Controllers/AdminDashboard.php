<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lecturer;
use App\College;
use App\Admin;
class AdminDashboard extends Controller
{
    public function index(){
        $users=User::count();
        $lecturers=Lecturer::count();
        $admins=Admin::count();
        $colleges=College::count();
        return view('Admin.dashboard',['users'=>$users ,'lecturers'=>$lecturers ,'admins'=>$admins ,'colleges'=>$colleges]);

    }
}
