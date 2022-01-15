<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\offeredCourse;
use App\Course;
use App\Lecturer;
use App\College;
use App\Section;
use App\User;
class offeredCourseController extends Controller
{
    public function index()
    {
        $offeredCourse=offeredCourse::all();
      
            
        return view('Admin.offeredCourse.index' ,['offeredCourse'=>$offeredCourse]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        $lecturers=Lecturer::all();
        $colleges=College::all();
        $sections=Section::all();
        return view('Admin.offeredCourse.create' ,['colleges'=>$colleges ,'courses'=>$courses ,'sections'=>$sections ,'lecturers'=>$lecturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offeredCourse=new offeredCourse();
        $offeredCourse->colleges_id=$request->colleges_id;
        $offeredCourse->sections_id=$request->sections_id;
        $offeredCourse->courses_id=$request->courses_id;
        $offeredCourse->lecturers_id=$request->lecturers_id;
        $offeredCourse->status='Active';
        $offeredCourse->save();
        return redirect()->route('Admin.offeredCourse.index');
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
