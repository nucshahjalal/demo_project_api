@extends('backend.app')
@section('page_title','Admission Applications')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Admission Applications</h3>
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
                        <a href="{{ route('admin.admission.index') }}" class="btn btn-sm btn-primary w-100 text-white fw-bold">
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
                            <h5 class="card-title">Admission Applications</h5>
                        </div>
                        <div class="card-body">
                            <form method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="filter" class="form-control" placeholder="Search by student name..." value="{{ request('filter') }}">
                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name (BN)</th>
                                            <th>Student Name (EN)</th>
                                            <th>Class</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admissions as $key => $admission)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $admission->student_name_bn }}</td>
                                            <td>{{ $admission->student_name_en }}</td>
                                            <td>{{ $admission->admission_class }}</td>
                                            <td>{{ $admission->phone_number }}</td>
                                            <td><span class="badge bg-{{ $admission->status ? 'success' : 'warning' }}">{{ $admission->status ? 'Approved' : 'Pending' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.admission.show', $admission->id) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('admin.admission.destroy', $admission->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this application?')">Delete</a>
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
