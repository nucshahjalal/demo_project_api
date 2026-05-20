@extends('backend.app')
@section('page_title','Edit Notice')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Manage Notice</h3>
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
                        <a href="{{ route('admin.notice.index') }}" class="btn btn-sm btn-primary w-100 text-white fw-bold">
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
                            <form action="{{ route('admin.notice.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $notice->id }}">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" value="{{ $notice->title }}" required>
                                        @error('title')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="category" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="General" {{ $notice->category == 'General' ? 'selected' : '' }}>General</option>
                                            <option value="সাধারণ" {{ $notice->category == 'সাধারণ' ? 'selected' : '' }}>সাধারণ</option>
                                            <option value="দাখিল" {{ $notice->category == 'দাখিল' ? 'selected' : '' }}>দাখিল</option>
                                            <option value="পরীক্ষা" {{ $notice->category == 'পরীক্ষা' ? 'selected' : '' }}>পরীক্ষা</option>
                                        </select>
                                        @error('category')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ $notice->description }}</textarea>
                                        @error('description')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Notice Date</label>
                                        <input type="text" name="notice_date" class="form-control" id="notice_date" value="{{ $notice->notice_date }}" placeholder="Notice Date">
                                        @error('notice_date')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="1" {{ $notice->status ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ !$notice->status ? 'selected' : '' }}>Inactive</option>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script type="text/javascript">
   document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#notice_date", {
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "F j, Y",
            maxDate: "today",
            defaultDate: "today"
        });
    });
</script>

@endsection
