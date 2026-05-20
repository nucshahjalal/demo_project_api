<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SliderController extends Controller
{
    public $data = [];

    public function index(Request $request)
    {
        $filter = $request->filter;
        $this->data['slides'] = $filter
            ? Slide::where('title', 'like', '%' . $filter . '%')->orderBy('sort_order')->get()
            : Slide::orderBy('sort_order')->get();
        return view('admin.slider.index', $this->data);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        Slide::create($data);
        return redirect()->route('admin.slider.index')->with('success', 'Slide created successfully');
    }

    public function edit($id)
    {
        $this->data['slide'] = Slide::findOrFail($id);
        return view('admin.slider.edit', $this->data);
    }

    public function update(Request $request)
    {
        $slide = Slide::findOrFail($request->id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $this->deleteImage($slide->image);
            $data['image'] = $this->uploadImage($request);
        }

        $slide->update($data);
        return redirect()->route('admin.slider.index')->with('success', 'Slide updated successfully');
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $this->deleteImage($slide->image);
        $slide->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slide deleted successfully');
    }

    private function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('slider'), $filename);
            return 'slider/' . $filename;
        }
        return null;
    }

    private function deleteImage($path)
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
}
