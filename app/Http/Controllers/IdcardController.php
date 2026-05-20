<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idcard;
use App\Models\Student;

class IdcardController extends Controller
{

    public function index(){
         $student = Student::all();
        $template = Idcard::latest('id')->first(); 
        return view('idcard.templatefile', compact('student', 'template'));
    }

   public function store(Request $request)
    {
        $data = $request->all();

        // ফাইল হ্যান্ডলিং
        if ($request->hasFile('template_file')) {
            $file = $request->file('template_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/templates'), $filename);
            $data['template_file'] = 'uploads/templates/' . $filename;
        }

        \App\Models\Idcard::updateOrCreate(
            ['id' => 1], // অথবা ডায়নামিক আইডি
            $data
        );

        return back()->with('success', 'Template Saved Successfully!');
    }



    public function print($id)
    {
       // dd('hi');
        $template = Idcard::findOrFail($id);
        $students = Student::all(); 

        return view('idcard.print', compact('template','students'));
    }
}
