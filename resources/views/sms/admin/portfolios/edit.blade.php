@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Portfolio</h1>
    <form action="{{ route('admin.sms.portfolios.update', $portfolio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $portfolio->id }}">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $portfolio->name }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $portfolio->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $portfolio->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.sms.portfolios.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
