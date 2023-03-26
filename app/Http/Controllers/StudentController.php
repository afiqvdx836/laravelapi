<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = DB::table('students')->first();
         $students = Student::all(); //eloquent
        return response()->json($students);
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
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $request->photo;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        
        DB::table('students')->insert($data);
        return response('Data inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $student = DB::table('students')->where('id', $id)->first();
        $student = Student::findOrFail($id);
        return response()->json($student);
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
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $request->photo;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        
        DB::table('students')->where('id',$id)->insert($data);
        return response('Data inserted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = DB::table('students')->where('id', $id)->first(); // Get the first Data
        $image_path = $img->photo; // get only image data

        unlink($image_path);// delete image from folder
        DB::table('students')->where('id', $id)->delete();
        return response('Student Deleted');
    }
}
