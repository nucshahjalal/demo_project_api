@extends('backend.app')
@section('page_title','Create Student')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3> Manage Student Information</h3>
                </ul>
            </div>

            <div class="page-header-right ms-auto">
                <a href="{{ url('student/list') }}" class="btn btn-sm btn-primary text-white fw-bold">
                    ← Back
                </a>
            </div>
        </div>

        <div class="main-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body">

                            <form action="{{ route('student.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Row 1 -->
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Student Name *</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        @error('name')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Roll</label>
                                        <input type="text" name="roll" class="form-control" value="{{ old('roll') }}">
                                    </div>
                                </div>

                                <!-- Row 2 -->
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Father Name</label>
                                        <input type="text" name="f_name" class="form-control" value="{{ old('f_name') }}">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Mother Name</label>
                                        <input type="text" name="m_name" class="form-control" value="{{ old('m_name') }}">
                                    </div>
                                </div>

                                <!-- Row 3 -->
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Registration ID</label>
                                        <input type="text" name="reg_id" class="form-control" value="{{ old('reg_id') }}">
                                    </div>
                                </div>

                                <!-- Row 4 -->
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
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