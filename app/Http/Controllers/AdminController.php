<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::all();

        return view('Admin.Admins.index',['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('Admin.Admins.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admins=new Admin();
        $admins->first_name=$request->first_name;
        $admins->last_name=$request->last_name;
        $admins->email=$request->email;
        $admins->password=Hash::make($request->password);
        $admins->roles_id=$request->get('roles_id');
        if($request->hasfile('image')){
           
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/admins/',$filename);
            $admins->image=$filename;
        }

        else{
            return $request;
            $admins->image='';
        }
        $isSaved=$admins->save();

        if($isSaved){
            return redirect()->route('Admin.admins.index');
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
        $admins=Admin::find($id);
        return view('Admin.Admins.edit',['admins'=>$admins]);
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
        $Admins=Admin::find($id);
        $Admins->first_name=$request->first_name;
        $Admins->last_name=$request->last_name;
        $Admins->email=$request->email;
        $isUpdated=$Admins->save();

        if($isUpdated){
            return redirect()->route('Admin.admins.index')->with('message','Admin Updated Succesfully');
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
        $isDeleted=Admin::destroy($id);

    }
}
