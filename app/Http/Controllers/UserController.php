<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\Role;
use App\Section;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=User::with(['Colleges','Sections'])->get();
        return view('Admin.Students.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges=College::all();
        $roles=Role::all();
        $sections=Section::all();
        return view('Admin.Students.create',['colleges'=>$colleges ,'roles'=>$roles ,'sections'=>$sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $students=new User();
        $students->first_name=$request->first_name;
        $students->last_name=$request->last_name;
        $students->number=$request->number;
        $students->email=$request->email;
        $students->password=Hash::make($request->password);
        $students->roles_id=3;
        $students->colleges_id=$request->get('colleges_id');
        $students->sections_id=$request->get('sections_id');
        $students->status=$request->has('status') ? 'Active' : 'Blocked';
        if($request->hasfile('image')){
           
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/students/',$filename);
            $students->image=$filename;
        }
        else{
            return $request;
            $students->image='';
        }
        $isSaved=$students->save();
        if($isSaved){
            return redirect()->route('Admin.users.index');
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
        $users=User::find($id);
        $colleges=College::all();
        $sections=Section::all();
        return view('Admin.Students.edit',['users'=>$users ,'colleges'=>$colleges ,'sections'=>$sections]);
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
        $users=User::find($id);
        $users->first_name=$request->first_name;
        $users->last_name=$request->last_name;
        $users->number=$request->number;
        $users->email=$request->email;
        $users->colleges_id=$request->get('colleges_id');
        $users->sections_id=$request->get('sections_id');
        $users->status=$request->has('status') ? 'Active' : 'Block';
        $isUpdated=$users->save();
        if($isUpdated){
            return redirect()->route('Admin.users.index')->with('message','Student  Updated Succesfully');
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
        //
    }

    public function showStudent($sec){
       $students=Section::find($sec)->Students;
        return view('Admin.Students.index' ,['students'=>$students]);
    }

   
}
