<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homework;
use App\Lecturer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $homeworks=Homework::all();
        return view('Lecturer.Homework.index',['homeworks'=>$homeworks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myCourses=Lecturer::find(Auth::guard('lecturer')->user()->id)->Courses;
        return view('Lecturer.Homework.create',['myCourses'=>$myCourses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $homeworks=new Homework();
       $homeworks->name=$request->name;
       $homeworks->content=$request->content;
       $homeworks->courses_id=$request->get('courses_id');
       $homeworks->lecturers_id=Auth::guard('lecturer')->user()->id;
       $homeworks->save();
       return redirect()->route('Lecturer.homeworks.index');

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
}
