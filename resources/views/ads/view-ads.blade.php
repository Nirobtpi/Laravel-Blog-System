@extends('layouts.auth')

@section('title', 'Ads')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Ads</h2>
                <p class="text-muted mb-0">Manage advertisements shown below tags on blog details.</p>
            </div>
            <a href="{{ url('add-ad') }}" class="btn btn-primary mt-3 mt-md-0">
                <i class="fas fa-plus mr-1"></i> Add ad
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle mr-1"></i>{{ session('success') }}</div>
        @endif

        <div class="card card-default">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All ads</h4>
                <span class="badge badge-light">{{ $ads->count() }} total</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4">#</th>
                                <th>Ad</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th class="text-right px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ads as $ad)
                                <tr>
                                    <td class="px-4 text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($ad->image)
                                                <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}"
                                                    class="rounded mr-3" style="width:90px;height:50px;object-fit:cover;">
                                            @endif
                                            <strong>{{ $ad->title }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($ad->link)
                                            <a href="{{ $ad->link }}" target="_blank" rel="noopener" class="small">
                                                {{ Str::limit($ad->link, 35) }}
                                            </a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ad->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-right px-4 text-nowrap">
                                        <a href="{{ url('edit-ad', $ad->id) }}" class="btn btn-sm btn-outline-info mr-1">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <a href="{{ url('delete-ad', $ad->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this ad?')"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash mr-1"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        No ads yet.
                                        <div class="mt-3">
                                            <a href="{{ url('add-ad') }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus mr-1"></i> Add your first ad
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
