<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstituteHistory;

class InstituteHistoryController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['history'] = InstituteHistory::first();
        return view('admin.history.index', $this->data);
    }

    public function create()
    {
        return view('admin.history.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        InstituteHistory::create($request->all());
        return redirect()->route('admin.history.index')->with('success', 'History saved successfully');
    }

    public function edit($id)
    {
        $this->data['history'] = InstituteHistory::findOrFail($id);
        return view('admin.history.edit', $this->data);
    }

    public function update(Request $request)
    {
        $history = InstituteHistory::findOrFail($request->id);
        $history->update($request->all());
        return redirect()->route('admin.history.index')->with('success', 'History updated successfully');
    }

    public function destroy($id)
    {
        InstituteHistory::findOrFail($id)->delete();
        return redirect()->route('admin.history.index')->with('success', 'History deleted successfully');
    }
}
