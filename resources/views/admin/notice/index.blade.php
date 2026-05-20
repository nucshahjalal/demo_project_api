@extends('backend.app')
@section('page_title','Notice Management')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Notice Management</h3>
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Notices</h5>
                            <a href="{{ route('admin.notice.create') }}" class="btn btn-sm btn-primary">Add New Notice</a>
                        </div>
                        <div class="card-body">
                            <form method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="filter" class="form-control" placeholder="Search..." value="{{ request('filter') }}">
                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notices as $key => $notice)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $notice->title }}</td>
                                            <td><span class="badge bg-primary">{{ $notice->category ?? 'General' }}</span></td>
                                            <td>{{ $notice->notice_date ? date('d/m/Y', strtotime($notice->notice_date)) : '' }}</td>
                                            <td><span class="badge bg-{{ $notice->status ? 'success' : 'danger' }}">{{ $notice->status ? 'Active' : 'Inactive' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.notice.edit', $notice->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('admin.notice.destroy', $notice->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this notice?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
