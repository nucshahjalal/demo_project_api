@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Items</h1>
    <a href="{{ url('item/create') }}" class="btn btn-primary mb-3">Add Item</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ url('item/edit/'.$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ url('item/delete/'.$item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
