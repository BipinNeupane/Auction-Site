<?php

namespace App\Http\Controllers;

use App\Models\Testbase;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function store(Request $request)
    {
        $student = new Testbase();
        $student->name = $request->input('name');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $student->path = $filename;
        }

        $student->save();
        return redirect()->back()->with('message','Student Image Upload Successfully');
    }
}
