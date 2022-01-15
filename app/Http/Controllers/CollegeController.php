<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\Section;
class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges=College::withcount(['Sections','Students','Courses'])->get(); 
        
        return view('Admin.Colleges.index' ,['colleges'=>$colleges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Admin.Colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colleges=new College();
        $colleges->name=$request->name;
        $colleges->cost=$request->cost;
        $colleges->years=$request->years;
        $isSaved=$colleges->save();
        if($isSaved){
            return redirect()->route('Admin.colleges.index')->with('message','College Add Successfully');
        }
        else{
            return redirect()->back();
        }
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
        $colleges=College::find($id);
        return view('Admin.Colleges.edit',['colleges'=>$colleges]);
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
        $Colleges=College::find($id);
        $Colleges->name=$request->name;
        $Colleges->cost=$request->cost;
        $Colleges->years=$request->years;
        $isUpdated=$Colleges->save();
        if($isUpdated){
            return redirect()->route('Admin.colleges.index')->with('message','College Updated Succesfully');
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
        $Colleges=College::destroy($id);
    }

    public function ViewSections($id){
        $sections=College::find($id)->Sections;
        return view('Admin.Sections.index',['sections'=>$sections]);
    }

    public function ViewStudents($id){
        $students=College::find($id)->Students;
        return view('Admin.Students.index',['students'=>$students]);
    }
    public function ViewCourses($id){
        $courses=College::find($id)->Courses;
        
        return view('Admin.Courses.index',['courses'=>$courses]);
    }
}
