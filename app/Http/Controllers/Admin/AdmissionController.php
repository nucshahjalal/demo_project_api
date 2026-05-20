<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;

class AdmissionController extends Controller
{
    public $data = [];

    public function index(Request $request)
    {
        $filter = $request->filter;
        $this->data['admissions'] = $filter
            ? Admission::where('student_name_bn', 'like', '%' . $filter . '%')
                ->orWhere('student_name_en', 'like', '%' . $filter . '%')
                ->orderBy('created_at', 'desc')->get()
            : Admission::orderBy('created_at', 'desc')->get();
        return view('admin.admission.index', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'admission_class' => 'required',
            'previous_class' => 'required',
            'student_name_bn' => 'required',
            'student_name_en' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone_number' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'current_address' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('student_photo')) {
            $data['student_photo'] = $request->file('student_photo')->store('admissions', 'public');
        }
        if ($request->hasFile('student_document')) {
            $data['student_document'] = $request->file('student_document')->store('admissions', 'public');
        }

        Admission::create($data);
        return redirect()->back()->with('success', 'আবেদন সফলভাবে জমা দেওয়া হয়েছে');
    }

    public function show($id)
    {
        $this->data['admission'] = Admission::findOrFail($id);
        return view('admin.admission.show', $this->data);
    }

    public function destroy($id)
    {
        Admission::findOrFail($id)->delete();
        return redirect()->route('admin.admission.index')->with('success', 'Admission deleted successfully');
    }
}
