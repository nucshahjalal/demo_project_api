@extends('backend.app')
@section('page_title','Speeches Management')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Speeches Management</h3>
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Speeches</h5>
                            <a href="{{ route('admin.speech.create') }}" class="btn btn-sm btn-primary">Add New Speech</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($speeches as $key => $speech)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><span class="badge bg-{{ $speech->type == 'president' ? 'info' : 'warning' }}">{{ ucfirst($speech->type) }}</span></td>
                                            <td>{{ $speech->name }}</td>
                                            <td>{{ $speech->title }}</td>
                                            <td><span class="badge bg-{{ $speech->status ? 'success' : 'danger' }}">{{ $speech->status ? 'Active' : 'Inactive' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.speech.edit', $speech->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('admin.speech.destroy', $speech->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this speech?')">Delete</a>
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
