<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\student;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class studentController extends Controller
{
    public function add(Request $req)
    {
        try {
            //code...
      
        $student = new student();

        $address = new address();

        $address->latitude = $req->latitude;

        $address->longitude = $req->longitude;
        $address->save();

        $student->firstname = $req->firstname;

        $student->surname = $req->surname;

        $student->class = $req->class;

        $student->classname = $req->classname;

        $student->parent_id = $req->parent_id;

        $student->address_id=$address->id;


        $student->save();

        return response($student,201);
    } catch (\Throwable $th) {
        return response($student,404);
    }
    }
   public function delete($id){
    try {
        student::find($id)->delete();
        return response("ok",200);
        //code...
    } catch (\Throwable $th) {
        return response("not found",404);
    }


   }

    public function update(Request $request,$id){
        $student =student::find($id);

        if ($student) {

            try {

              $student->firstname = $request->firstname;
              $student->surname = $request->surname;
              $student->class = $request->class;
              $student->classname = $request->classname;
              $student->parent_id = $request->parent_id;
              $student->address_id = $request->address_id;
              $student->ride_id = $request->ride_id;
              $student->update();
                return response()->json(['msg' => 'Student was changed'], 200);
            } catch (\Throwable $th) {
                return response()->json(['msg' => 'Has a problem'], 404);
            }
        } else {
            return response()->json(['msg' => 'Student was not found'], 404);
        }

    }

public function getStudent(){

$student=student::all();
return response($student,200);




}



}
