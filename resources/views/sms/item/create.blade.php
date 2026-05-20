@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Item</h1>
    <form action="{{ url('item/save') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ url('item/list') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
