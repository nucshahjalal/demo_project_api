<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employee, Product, Current, Portfolio};
use DB;
use Carbon\Carbon;

class VueVehicleController extends Controller
{
    public $data = array();

    public function index(){

        return view('vueJs.vehicle_list', [
        'datas' => Portfolio::latest()->get()
    ]);
    }

    public function vehicleList(Request $request)
    {
       //return Portfolio::latest()->get(); // single model correct this
        $filter = $request->get('filter', '');
        return Current::getVehicleList( $filter);

    }

   //correct this
    public function vehicleList2(Request $request)
        {
            $filter = $request->get('filter', '');

            $currents = Current::from('currents as C')
                ->join('employees AS E', 'E.id', '=', 'C.emp_id')
                ->join('products AS P', 'P.id', '=', 'C.product_id')
                ->join('portfolios AS Port', 'Port.id', '=', 'C.portfolio_id')
                ->where('C.status', 0)
                ->where(function($query) use ($filter) {
                    $query->where('E.name', 'like', '%'.$filter.'%')
                        ->orWhere('P.brand', 'like', '%'.$filter.'%')
                        ->orWhere('P.model', 'like', '%'.$filter.'%')
                        ->orWhere('C.portfolio_id', 'like', '%'.$filter.'%')
                        ->orWhere('C.location', 'like', '%'.$filter.'%');
                })
                ->orderBy('C.id', 'desc')
                ->paginate(10, [
                    'C.*',
                    'E.name as emp_name',
                    'P.brand as brand_name',
                    'P.model as model_name',
                    'P.eng_no as eng_no',
                    'P.chassis_no as chassis_no',
                    'P.registration_number as registration_number',
                    'Port.name as portfolio_name',
                    'P.registration_date as reg_date',
                    'C.receive_date',
                ]);

            // Add duration for each row
            $currents->getCollection()->transform(function ($current) {
                $end = now();

                if ($current->receive_date) {
                    $diff = \Carbon\Carbon::parse($current->receive_date)->diff($end);
                    $current->total_receive_duration = $diff->y . ' years, ' . $diff->m . ' months, ' . $diff->d . ' days';
                } else {
                    $current->total_receive_duration = null;
                }

                if ($current->reg_date) {
                    $diff = \Carbon\Carbon::parse($current->reg_date)->diff($end);
                    $current->total_reg_duration = $diff->y . ' years, ' . $diff->m . ' months, ' . $diff->d . ' days';
                } else {
                    $current->total_reg_duration = null;
                }

                return $current;
            });

            // ✅ Return paginator so Vue can use it
            return $currents;
        }

    public function create(){
      
        $this->data['employees'] = Current::where(['status'=>1])->get();
        $this->data['products'] = Product::where(['status'=>1])->get();
        $this->data['portfolios'] = Portfolio::where(['status'=>1])->get();
        return view('vueJs.vehicle_create',  $this->data);
    }

    function getStatus() {
        return array(  
            'Good ' => 'Good ',
            'Need to Repair' => 'Need to Repair',
            'Medium' => 'Medium',
            'Need Service' => 'Need Service',
            'New Motorcycle' => 'New Motorcycle',
            'Old' => 'Old',
        );
    }

    public function store(Request $request)
    {
       // dd($requestall());
        $validated = $request->validate([
            'emp_id'        => 'required',
            'product_id'    => 'required',
            'portfolio_id'  => 'required',
            'location'      => 'nullable',
            'receive_date'  => 'nullable',
            'mc_status'     => 'nullable',
            'is_loan'       => 'nullable',
        ]);

        Current::create($validated);

        return redirect('vue/vehicle-list')->with('success','Vehicle create successfull');
    }

    public function destroy($id)
    {
        $current = Current::find($id);

        if (!$current) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Current not found'
                ], 404);
            } else {
                return redirect('vue/vehicle-list')->with('error', 'Current not found');
            }
        }

        if ($current->delete()) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Current deleted successfully'
                ]);
            } else {
                return redirect('vue/vehicle-list')->with('success', 'Vehicle deleted successfully');
            }
        } else {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete current'
                ], 500);
            } else {
                return redirect('vue/vehicle-list')->with('error', 'Failed to delete vehicle');
            }
        }
    }

    public function updateStatus(Request $request)
    {
        $current = Current::find($request->id);

        if (!$current) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }

        $current->status = 1;
        $current->transfer_at = now();
        $current->save();

        return response()->json([
            'success' => true,
            //'message' => 'Status updated successfully',
            'data' => $current
        ]);
    }

}
