@extends('layouts.auth')

@section('title', 'Add Tag')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Add Tag</h2>
                <p class="text-muted mb-0">Add a label that helps readers find related posts.</p>
            </div>
            <a href="{{ url('view-tag') }}" class="btn btn-light border mt-3 mt-md-0">
                <i class="fas fa-list mr-1"></i> View tags
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle mr-1"></i>{{ session('success') }}</div>
        @endif

        <div class="card card-default category-form-card">
            <div class="card-header bg-white border-bottom">
                <h4 class="mb-1">Tag details</h4>
                <small class="text-muted">Use a simple word or phrase that describes your content.</small>
            </div>
            <div class="card-body p-3 p-md-4">
                <form action="{{ url('add-tag') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="tag">Tag name <span class="text-danger">*</span></label>
                        <input type="text" name="tag" id="tag"
                            value="{{ old('tag') }}"
                            class="form-control @error('tag') is-invalid @enderror"
                            placeholder="e.g. Laravel" maxlength="255" required autofocus>
                        <small class="form-text text-muted">Keep tags short and relevant.</small>
                        @error('tag') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="border-top pt-3 mt-4 d-flex justify-content-end">
                        <a href="{{ url('view-tag') }}" class="btn btn-light border mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus mr-1"></i> Add tag
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .category-form-card { max-width: 760px; margin: 0 auto; border-radius: 10px; }
        .category-form-card label { font-weight: 700; }
        .category-form-card .form-control { min-height: 44px; border-radius: 5px; }
    </style>
@endpush
