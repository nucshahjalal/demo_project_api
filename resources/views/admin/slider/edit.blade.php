@extends('backend.app')
@section('page_title','Edit Slide')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Manage Slide</h3>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="{{ route('admin.slider.index') }}" class="btn btn-sm btn-primary w-100 text-white fw-bold">
                            ← Back
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <form action="{{ route('admin.slider.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $slide->id }}">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" value="{{ $slide->title }}" required>
                                        @error('title')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        @if($slide->image)
                                            <div class="mt-2">
                                                <img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}" style="width: 150px; height: 80px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px; padding: 2px;">
                                            </div>
                                        @endif
                                        @error('image')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Caption</label>
                                        <textarea name="caption" class="form-control" rows="2">{{ $slide->caption }}</textarea>
                                        @error('caption')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Sort Order</label>
                                        <input type="number" name="sort_order" class="form-control" value="{{ $slide->sort_order }}">
                                        @error('sort_order')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="1" {{ $slide->status ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ !$slide->status ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div style="text-align:center;" class="row">
                                    <div class="col-lg-12 mb-7">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
   .btn {
        text-transform: capitalize;
    }
</style>

@endsection
