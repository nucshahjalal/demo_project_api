<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Item;

class ItemController extends Controller
{
    public $data = array();

    public function index(Request $request){

        $filter = $request->filter;
        $this->data['items'] = Item::getItemList($filter);
        return view('sms.item.index', $this->data);
    }

    public function createForm(){
        return view('sms.item.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required',],
        ], [
            'name.required'   => 'Name is required.',
        ]);
        
        $request->merge(['status'=> 1]); 
        $item  = Item::create($request->all());
        
        if($item){
            return redirect('item/list')->with('success','Item create successfull');
        }else{
            return redirect('item/create')->with('error','Item create failed');
        }
    }

    public function editForm(string $id)
    { 
        $this->data['item'] = Item::find($id);
        return view('sms.item.edit', $this->data);
    }

    public function update(Request $request)
    {
    
        $item = Item::findOrFail($request->id);

        $request->validate([
            'name' => ['required',],
        ], [
            'name.required'   => 'Name is required.',
        ]);

        $item->status = $request->status;
        $item->fill($request->all());
        
        if($item->update()){
            return redirect('item/list')->with('success','Item update successfull');
        }else{
            return redirect('item/edit/'.$request->id)->with('error','Item update failed');
        }
    }

    public function destroy( $id)
    {
        $item  = Item::find($id);
        if($item->delete()){
            return redirect('item/list')->with('success','Item delete successfull');
        }else{
            return redirect('item/list')->with('error','Item delete failed');
        }
    } 
}
