@extends('layouts.auth')

@section('title', 'Posts')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Posts</h2>
                <p class="text-muted mb-0">Create, edit and manage everything you publish.</p>
            </div>
            <a href="{{ url('admin/add-post') }}" class="btn btn-primary mt-3 mt-md-0">
                <i class="fas fa-plus mr-1"></i> Add post
            </a>
        </div>

        @if (session('success') || Session::has('success_alert'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle mr-1"></i>
                {{ session('success') ?? Session::get('success_alert') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle mr-1"></i>{{ session('error') }}
            </div>
        @endif

        <div class="card card-default">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All posts</h4>
                <span class="badge badge-light">{{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4">#</th>
                                <th>Post</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th class="text-right px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $key => $post)
                                <tr>
                                    <td class="px-4 text-muted">{{ $posts->firstItem() + $key }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($post->photo)
                                                <img src="{{ asset($post->photo) }}" alt="{{ $post->title }}"
                                                    class="rounded mr-3 post-thumb">
                                            @else
                                                <div class="rounded mr-3 post-thumb post-thumb-empty">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <strong class="d-block">{{ Str::limit($post->title, 40, '...') }}</strong>
                                                <small class="text-muted">{{ Str::limit(strip_tags($post->description), 55, '...') }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($post->status == 1)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td class="text-right px-4 text-nowrap">
                                        <a href="{{ url('/blog', $post->id) }}" target="_blank"
                                            class="btn btn-sm btn-outline-secondary mr-1" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/post-edit', $post->id) }}"
                                            class="btn btn-sm btn-outline-info mr-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('admin/post-delete', $post->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this post?')"
                                            class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="fas fa-newspaper d-block mb-2" style="font-size: 32px; color: #adb5bd;"></i>
                                        No posts found yet.
                                        <div class="mt-3">
                                            <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus mr-1"></i> Create your first post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($posts->hasPages())
                <div class="card-footer bg-white">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('style')
    <style>
        .post-thumb { width: 64px; height: 48px; object-fit: cover; flex-shrink: 0; }
        .post-thumb-empty { display: flex; align-items: center; justify-content: center; background: #eef1f4; color: #adb5bd; }
        .table td { vertical-align: middle; }
    </style>
@endpush
