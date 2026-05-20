<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speech;

class SpeechController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['speeches'] = Speech::orderBy('type')->get();
        return view('admin.speech.index', $this->data);
    }

    public function create()
    {
        return view('admin.speech.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'content' => 'required',
        ]);

        Speech::create($request->all());
        return redirect()->route('admin.speech.index')->with('success', 'Speech created successfully');
    }

    public function edit($id)
    {
        $this->data['speech'] = Speech::findOrFail($id);
        return view('admin.speech.edit', $this->data);
    }

    public function update(Request $request)
    {
        $speech = Speech::findOrFail($request->id);
        $speech->update($request->all());
        return redirect()->route('admin.speech.index')->with('success', 'Speech updated successfully');
    }

    public function destroy($id)
    {
        Speech::findOrFail($id)->delete();
        return redirect()->route('admin.speech.index')->with('success', 'Speech deleted successfully');
    }
}
