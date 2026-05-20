@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form action="{{ url('item/update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('item/list') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
