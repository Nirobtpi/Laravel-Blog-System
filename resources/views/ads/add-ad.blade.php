@extends('layouts.auth')

@section('title', 'Add Ad')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Add Ad</h2>
                <p class="text-muted mb-0">Create an advertisement to show on blog details pages.</p>
            </div>
            <a href="{{ url('view-ads') }}" class="btn btn-light border mt-3 mt-md-0">
                <i class="fas fa-list mr-1"></i> View ads
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle mr-1"></i>{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-default category-form-card">
            <div class="card-header bg-white border-bottom">
                <h4 class="mb-1">Ad details</h4>
                <small class="text-muted">Active ads appear below tags on the blog details page.</small>
            </div>
            <div class="card-body p-3 p-md-4">
                <form action="{{ url('add-ad') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Ad title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="e.g. Summer offer" maxlength="255" required autofocus>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="link">Destination URL</label>
                        <input type="url" name="link" id="link" value="{{ old('link') }}"
                            class="form-control @error('link') is-invalid @enderror"
                            placeholder="https://example.com">
                        <small class="form-text text-muted">Where users go when they click the ad.</small>
                        @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="1" @selected(old('status', '1') == '1')>Active</option>
                            <option value="0" @selected(old('status') == '0')>Inactive</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Ad image <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image"
                                class="custom-file-input @error('image') is-invalid @enderror"
                                accept="image/*" required>
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                        <small class="form-text text-muted">JPG, PNG, GIF or WebP. Maximum 5 MB. Recommended width ~728px.</small>
                        @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        <img id="image-preview" class="img-fluid rounded mt-3 d-none" style="max-height:180px;object-fit:cover;" alt="Preview">
                    </div>

                    <div class="border-top pt-3 mt-4 d-flex justify-content-end">
                        <a href="{{ url('view-ads') }}" class="btn btn-light border mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus mr-1"></i> Add ad
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
        .custom-file-label { font-weight: 400 !important; overflow: hidden; white-space: nowrap; }
    </style>
@endpush

@push('script')
    <script>
        $(function () {
            $('#image').on('change', function () {
                const file = this.files[0];
                $(this).next('.custom-file-label').text(file ? file.name : 'Choose image');
                if (file) {
                    $('#image-preview').attr('src', URL.createObjectURL(file)).removeClass('d-none');
                }
            });
        });
    </script>
@endpush
