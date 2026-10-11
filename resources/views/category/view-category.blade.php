@extends('layouts.auth')

@section('title', 'Categories')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Categories</h2>
                <p class="text-muted mb-0">Manage the topics used across your posts.</p>
            </div>
            <a href="{{ url('add-category') }}" class="btn btn-primary mt-3 mt-md-0">
                <i class="fas fa-plus mr-1"></i> Add category
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle mr-1"></i>{{ session('success') }}</div>
        @endif

        <div class="card card-default">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All categories</h4>
                <span class="badge badge-light">{{ $categories->count() }} total</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4">#</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th class="text-right px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="px-4 text-muted">{{ $loop->iteration }}</td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>{{ $category->created_at->format('M d, Y') }}</td>
                                    <td class="text-right px-4">
                                        <a href="{{ url('edit-category', $category->id) }}" class="btn btn-sm btn-outline-info mr-1">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <a href="{{ url('delete-category', $category->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash mr-1"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-5">No categories found yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
