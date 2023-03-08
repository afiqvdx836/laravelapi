<?php

namespace App\Http\Controllers\Api;

use App\Models\Sclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SclassController extends Controller
{
    public function index(){
        $sclasses = DB::table('sclasses')->get();
        return response()->json($sclasses);
    }

    public function store(Request $request, $id){
       $validateData = $request->validate([
        'class_name' => 'required|unique:sclasses|max:25'
       ]);

       $data = array();
       $data['class_name'] = $request->class_name;
       $insert = DB::table('sclasses')->where('id',$id)->insert($data);
       return response('Updated Successfully');
    }

    public function show($id){
        $show = DB::table('sclasses')->where('id', $id)->first();
        return response()->json($show);
    }

    public function destroy($id){
        DB::table('sclasses')->where('id',$id)->delete();
    return response('deleted');
    }

    public function update(Request $request, $id){

    }

    
}
