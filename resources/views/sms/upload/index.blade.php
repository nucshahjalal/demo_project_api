@extends('backend.app')
@section('page_title','Upload List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header d-flex align-items-center justify-content-between">
        <div class="page-header-left d-flex align-items-center gap-2">
        </div>

        <div class="page-header-left d-flex align-items-center gap-2">
        <div class="page-header-right ms-auto">
            <form method="get" action="{{ url('portfolio/list') }}">
                @csrf
                <div class="d-flex align-items-center gap-2">
                    <input class="form-control" type="text" name="filter" 
                        value="{{ request('filter') }}" id="filter" placeholder="Search...">
                    <div class="col-auto">
                        <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
        <a href="{{ url('portfolio/create') }}" class="btn btn-sm  btn-success">
            <i class="feather-plus me-2"></i>
            <span>Add New</span>
        </a>
    </div>
</div>

<div class="main-content">   
    <div class="row">
        <div class="col-xl-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".xlsx" required>
                        <button  type="submit" class="btn btn-sm btn-primary">Upload Excel</button>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <!-- dashboardMainContent -->
        <!-- [ Main Content ] end -->
</div>
    <!-- [ Footer ] start -->
    <!-- @include('backend.footer') -->
    <!-- [ Footer ] end -->
    
</main>

<style>
   .btn {
        text-transform: capitalize;
    }
</style>

@endsection
