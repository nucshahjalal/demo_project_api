@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Employee</h1>
    <form action="{{ route('admin.sms.employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="department" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Salary</label>
            <input type="number" name="salary" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>
                <input type="checkbox" name="is_active" value="1" checked> Active
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.sms.employees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
