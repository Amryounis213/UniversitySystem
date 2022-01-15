<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\College;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=Section::with(['Colleges'])->get();
        return view('Admin.sections.index' ,['sections'=>$sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges=College::all();
        return view('Admin.sections.create',['colleges'=>$colleges]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sections=new Section();
        $sections->name=$request->name;
        $sections->colleges_id=$request->get('colleges_id');
        $sections->save();
        return redirect()->route('Admin.sections.index');
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
        $sections=Section::find($id);
        $colleges=College::all();
        return view('Admin.Sections.edit',['sections'=>$sections ,'colleges'=>$colleges ]);
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
        $sections=Section::find($id);
        $sections->name=$request->name;
        $sections->colleges_id=$request->get('colleges_id');
        $isUpdated=$sections->save();

        if($isUpdated){
            return redirect()->route('Admin.sections.index')->with('message','Section Updated Succesfully');
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
        $isDeleted=Section::destroy($id);

    }
}
