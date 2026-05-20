@extends('backend.app')
@section('page_title','Edit Speech')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Manage Speech</h3>
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
                        <a href="{{ route('admin.speech.index') }}" class="btn btn-sm btn-primary w-100 text-white fw-bold">
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
                            <form action="{{ route('admin.speech.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $speech->id }}">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Type <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control" required>
                                            <option value="">--Select--</option>
                                            <option value="president" {{ $speech->type == 'president' ? 'selected' : '' }}>President</option>
                                            <option value="principal" {{ $speech->type == 'principal' ? 'selected' : '' }}>Principal</option>
                                        </select>
                                        @error('type')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $speech->name }}" required>
                                        @error('name')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Title/Designation</label>
                                        <input type="text" name="title" class="form-control" value="{{ $speech->title }}">
                                        @error('title')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Image URL</label>
                                        <input type="text" name="image" class="form-control" value="{{ $speech->image }}">
                                        @error('image')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Content <span class="text-danger">*</span></label>
                                        <textarea name="content" class="form-control" rows="8" required>{{ $speech->content }}</textarea>
                                        @error('content')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="1" {{ $speech->status ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ !$speech->status ? 'selected' : '' }}>Inactive</option>
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
