@extends('backend.app')
@section('page_title','Admission Details')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Admission Details</h3>
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
                        <div class="card-header">
                            <h5 class="card-title">Admission Application Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr><th>Student Name (BN)</th><td>{{ $admission->student_name_bn }}</td></tr>
                                <tr><th>Student Name (EN)</th><td>{{ $admission->student_name_en }}</td></tr>
                                <tr><th>Admission Class</th><td>{{ $admission->admission_class }}</td></tr>
                                <tr><th>Previous Class</th><td>{{ $admission->previous_class }}</td></tr>
                                <tr><th>Father's Name</th><td>{{ $admission->father_name }}</td></tr>
                                <tr><th>Mother's Name</th><td>{{ $admission->mother_name }}</td></tr>
                                <tr><th>Phone Number</th><td>{{ $admission->phone_number }}</td></tr>
                                <tr><th>Date of Birth</th><td>{{ $admission->dob }}</td></tr>
                                <tr><th>Gender</th><td>{{ $admission->gender }}</td></tr>
                                <tr><th>Address</th><td>{{ $admission->current_address }}</td></tr>
                                <tr><th>Status</th><td><span class="badge bg-{{ $admission->status ? 'success' : 'warning' }}">{{ $admission->status ? 'Approved' : 'Pending' }}</span></td></tr>
                                <tr><th>Submitted At</th><td>{{ $admission->created_at }}</td></tr>
                            </table>
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
