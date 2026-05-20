<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\{Employee, Current};
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeController extends Controller
{
    public $data = array();

    public function index(Request $request){

        $filter = $request->filter;
        $this->data['employees'] = Employee::getEmployeeList($filter);
        return view('sms.dd.index', $this->data);
        return view('sms.dd.index', $this->data);
        return view('sms.employee.index', $this->data);
        return view('sms.employee.index', $this->data);
    }

    public function apiIndex(Request $request){

        $filter = $request->filter;
        $employees = Employee::getEmployeeList($filter);
        if ($employees) {
        return response()->json([
                "employees" => $employees
            ]);
        } else {
            return response()->json([
                "message" => "Failed to show employee"
            ], 500);
        }
    }

     public function empHistory(Request $request, $emp_id){

        $this->data['employee'] = Employee::where('id', $emp_id)->first();
        $this->data['vehicles'] = Current::getEmpWiseVehicleList($emp_id);
        return view('sms.employee.employeeHistory', $this->data);
    }

    public function empHistoryDownloadPdf($emp_id)
    {
        $employee = Employee::findOrFail($emp_id);
        $vehicles = Current::getEmpWiseVehicleList($emp_id);

        $pdf = Pdf::loadView('sms.employee.employeeHistory', compact('vehicles', 'employee'))
                ->setPaper('a4', 'landscape');
        return $pdf->download('employee-history-report.pdf');
    }

    public function createForm(){
        return view('sms.employee.create');
    }

    public function apiStore(Request $request)
    {
        
        $validated = $request->validate([
            'emp_id' => 'required|string',
            'name' => 'nullable|string',
            'designation' => 'nullable|string',
            'phone' => 'nullable|string',
            'portfolio' => 'nullable|string',
            'portfolio' => 'nullable|string',

        ]);

        // if($request->isMothod('post')){
        //     $data = $request->all();

        $save = Employee::create($validated);

       if ($save) {
        return response()->json([
                "message" => "Employee created successfully"
            ]);
        } else {
            return response()->json([
                "message" => "Failed to create employee"
            ], 500);
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'emp_id' => ['required', 'unique:employees,emp_id'],
        ], [
            'emp_id.unique'   => 'Employee id is already taken.',
            'emp_id.required'   => 'Employee id is required.',
        ]);
        
        $request->merge(['status'=> 1]);
        $employee  = Employee::create($request->all());
        if($employee){
            return redirect('employee/list')->with('success','Employee create successfull');
        }else{
            return redirect('employee/create')->with('error','Employee create failed');
        }
    }

    public function editForm(string $id)
    { 
        $this->data['employee'] = Employee::find($id);
        return view('sms.employee.edit', $this->data);
    }

    public function update(Request $request)
    {
    
        $employee = Employee::findOrFail($request->id);

        $request->validate([
            'emp_id' => [
                'required',
                Rule::unique('employees', 'emp_id')->ignore($employee->id),
            ],
            ], [
            'emp_id.unique'   => 'Employee id is already taken.',
            'emp_id.required'   => 'Employee id is required.',
        ]);

        $employee->status = $request->status;
        $employee->fill($request->all());
        
        if($employee->update()){
            return redirect('employee/list')->with('success','Employee update successfull');
        }else{
            return redirect('employee/edit/',$request->id)->with('error','Employee update failed');
        }
    }

    public function view(string $id)
    { 
        $this->data['employee'] = Employee::find($id);
        return view('sms.employee.view', $this->data);
    }

    public function destroy( $id)
    {
        $employee  = Employee::find($id);
        if($employee->delete()){
            return redirect('employee/list')->with('success','Employee delete successfull');
        }else{
            return redirect('employee/list')->with('error','Employee delete failed');
        }
    } 
}
