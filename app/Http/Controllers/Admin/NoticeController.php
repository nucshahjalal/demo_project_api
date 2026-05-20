<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public $data = [];

    public function index(Request $request)
    {
        $filter = $request->filter;
        $this->data['notices'] = $filter
            ? Notice::where('title', 'like', '%' . $filter . '%')->orderBy('notice_date', 'desc')->get()
            : Notice::orderBy('notice_date', 'desc')->get();
        return view('admin.notice.index', $this->data);
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Notice::create($request->all());
        return redirect()->route('admin.notice.index')->with('success', 'Notice created successfully');
    }

    public function edit($id)
    {
        $this->data['notice'] = Notice::findOrFail($id);
        return view('admin.notice.edit', $this->data);
    }

    public function update(Request $request)
    {
        $notice = Notice::findOrFail($request->id);
        $notice->update($request->all());
        return redirect()->route('admin.notice.index')->with('success', 'Notice updated successfully');
    }

    public function destroy($id)
    {
        Notice::findOrFail($id)->delete();
        return redirect()->route('admin.notice.index')->with('success', 'Notice deleted successfully');
    }
}
