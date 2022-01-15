<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registeration;
class RegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $StudentCourses=Registeration::where('users_id',$id)->get();
        return view('Admin.Opearations.index',['StudentCourses'=>$StudentCourses]);
    }
    public function showCourses($id)
    {
        $StudentCourses=Registeration::where('users_id',$id)->get();
        $student=User::find($id);
        return view('Admin.Opearations.index',['StudentCourses'=>$StudentCourses,'student'=>$student]);
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
        
        $isDeleted=Registeration::destroy($id);
        if($isDeleted){
            return redirect()->back();
        }
        else{
            return 123;
        }
    }
}
