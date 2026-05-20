@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Portfolios</h1>
    <a href="{{ route('admin.sms.portfolios.create') }}" class="btn btn-primary mb-3">Add Portfolio</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" class="mb-3">
        <input type="text" name="filter" class="form-control" placeholder="Filter by name" value="{{ request('filter') }}">
        <button type="submit" class="btn btn-secondary mt-2">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio->name }}</td>
                <td>{{ $portfolio->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.sms.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.sms.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this portfolio?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
