<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\College;
use App\Section;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::with(['Colleges','Sections'])->get();
        return view('Admin.Courses.index',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges=College::all();
        $sections=Section::all();
        return view('Admin.Courses.create',['colleges'=>$colleges ,'sections'=>$sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses=new Course();
        $courses->name=$request->name;
        $courses->hours=$request->hours;
        $courses->colleges_id=$request->get('colleges_id');
        $courses->sections_id=$request->get('sections_id');
        $courses->save();
        return redirect()->route('Admin.courses.index');
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
        $courses=Course::find($id);
        $colleges=College::all();
        $sections=Section::all();
        return view('Admin.Courses.edit',['courses'=>$courses ,'colleges'=>$colleges ,'sections'=>$sections]);

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
        $request->request->add(['id'=>$id]);
        $courses=Course::find($id);
        $courses->name=$request->name;
        $courses->hours=$request->hours;
        $courses->colleges_id=$request->colleges_id;
        $courses->sections_id=$request->sections_id;
        $isUpdated=$courses->save();

        if($isUpdated){
            return redirect()->route('Admin.courses.index')->with('message','Course Updated Succesfully');
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $isDeleted=Course::destroy($id);
    }
}
