<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Idcard;
use App\Models\Student;

class StudentController extends Controller
{

    public function index(){
        
        return view('idcard.studentCreate');
    }

    public function store(Request $request)
    {
       

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/photos'), $filename);
            $data['photo'] = 'uploads/photos/' . $filename;
        }

        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('students', $filename, 'public');
        //     $data['photo'] = $path;
        // }

        Student::create($data);

        return back()->with('success', 'Student added successfully!');
    }


    public function print($id)
    {
       // dd('hi');
        $template = Idcard::findOrFail($id);
        $students = Student::all(); 

        return view('idcard.print', compact('template','students'));
    }
}
