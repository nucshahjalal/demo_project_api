@extends('backend.app')
@section('page_title','Institute History')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Institute History</h3>
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
                        <a href="{{ route('admin.history.index') }}" class="btn btn-sm btn-primary w-100 text-white fw-bold">
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
                            <h5 class="card-title">Institute History</h5>
                        </div>
                        <div class="card-body">
                            @if($history)
                            <div class="card mb-3">
                                @if($history->image)
                                <img src="{{ $history->image }}" alt="History" class="img-fluid mb-3" style="max-height: 300px;">
                                @endif
                                <p>{{ $history->content }}</p>
                            </div>
                            <a href="{{ route('admin.history.edit', $history->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.history.destroy', $history->id) }}" class="btn btn-danger" onclick="return confirm('Delete history?')">Delete</a>
                            @else
                            <p class="text-muted">No history added yet.</p>
                            <a href="{{ route('admin.history.create') }}" class="btn btn-primary">Add History</a>
                            @endif
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
