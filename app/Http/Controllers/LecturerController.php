<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer;
use App\Role;
use App\Course;
use App\College;
use App\Section;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::withcount(['Courses'])->get();
        return view('Admin.Lecturers.index', ['lecturers' => $lecturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $colleges = College::all();
        $sections = Section::all();
        return view('Admin.Lecturers.create', ['courses' => $courses, 'colleges' => $colleges, 'sections' => $sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lecturers = new Lecturer();
        $lecturers->first_name = $request->first_name;
        $lecturers->last_name = $request->last_name;
        $lecturers->email = $request->email;
        $lecturers->password = Hash::make($request->password);
        $lecturers->roles_id = 2;
        $lecturers->degree = $request->degree;
        $lecturers->colleges_id = $request->get('colleges_id');
        $lecturers->sections_id = $request->get('sections_id');
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/lecturers/', $filename);
            $lecturers->image = $filename;
        } else {
            return $request;
            $lecturers->image = '';
        }



        $isSaved = $lecturers->save();

        $lecturers->Courses()->attach($request->courses_id);
        if ($isSaved) {
            return redirect()->route('Admin.lecturers.index')->with('message', 'Lecturers Updated Succesfully');;
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

        $lecturers = Lecturer::find($id);
        $courses = Course::all();
        $colleges = College::all();
        $sections = Section::all();
        return view('Admin.Lecturers.edit', ['lecturers' => $lecturers, 'courses' => $courses, 'colleges' => $colleges, 'sections' => $sections]);
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
        $request->request->add(['id' => $id]);
        $lecturers = Lecturer::find($id);
        $lecturers->first_name = $request->first_name;
        $lecturers->last_name = $request->last_name;
        $lecturers->email = $request->email;
        $lecturers->degree = $request->degree;
        $lecturers->colleges_id = $request->get('colleges_id');
        $lecturers->sections_id = $request->get('sections_id');
        $isUpdated = $lecturers->save();

        $lecturers->Courses()->sync($request->courses_id);
        if ($isUpdated) {
            return redirect()->route('Admin.lecturers.index');
        } else {
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
        //
    }
}
