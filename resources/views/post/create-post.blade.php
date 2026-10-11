@extends('layouts.auth')

@section('title', 'Create Post')

@section('content')
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h2 class="mb-1">Create Post</h2>
                <p class="text-muted mb-0">Write your article, pick a category, then publish or save as draft.</p>
            </div>
            <a href="{{ url('admin/index') }}" class="btn btn-light border mt-3 mt-md-0">
                <i class="fas fa-arrow-left mr-1"></i> All Posts
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong><i class="fas fa-exclamation-circle mr-1"></i> Please fix the following:</strong>
                <ul class="mb-0 mt-2 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($categories->isEmpty() || $tags->isEmpty())
            <div class="alert alert-warning">
                <i class="fas fa-info-circle mr-1"></i>
                @if ($categories->isEmpty() && $tags->isEmpty())
                    You need at least one <a href="{{ url('add-category') }}">category</a> and one
                    <a href="{{ url('add-tag') }}">tag</a> before creating a post.
                @elseif ($categories->isEmpty())
                    Please <a href="{{ url('add-category') }}">add a category</a> first.
                @else
                    Please <a href="{{ url('add-tag') }}">add a tag</a> first.
                @endif
            </div>
        @endif

        <form action="{{ url('admin/add-post') }}" method="post" enctype="multipart/form-data" id="create-post-form">
            @csrf
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card card-default post-editor-card h-100">
                        <div class="card-header bg-white border-bottom">
                            <h4 class="mb-0">Content</h4>
                        </div>
                        <div class="card-body p-3 p-md-4">
                            <div class="form-group">
                                <label for="title">Post title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title') }}"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Enter a clear and engaging title" maxlength="255" required>
                                <div class="d-flex justify-content-between">
                                    <small class="form-text text-muted mb-0">Keep it short and descriptive.</small>
                                    <small class="form-text text-muted mb-0"><span id="title-count">0</span>/255</small>
                                </div>
                                @error('title') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-0">
                                <label for="summernote">Post content <span class="text-danger">*</span></label>
                                <textarea name="description" id="summernote"
                                    class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card card-default post-editor-card mb-3">
                        <div class="card-header bg-white border-bottom">
                            <h4 class="mb-0">Publish</h4>
                        </div>
                        <div class="card-body p-3 p-md-4">
                            <div class="form-group mb-0">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('status') === null ? 'selected' : '' }}>Choose status</option>
                                    <option value="1" @selected(old('status') == '1')>Publish now</option>
                                    <option value="0" @selected(old('status') == '0')>Save as draft</option>
                                </select>
                                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card card-default post-editor-card mb-3">
                        <div class="card-header bg-white border-bottom">
                            <h4 class="mb-0">Organization</h4>
                        </div>
                        <div class="card-body p-3 p-md-4">
                            <div class="form-group">
                                <label for="category">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category"
                                    class="form-control @error('category_id') is-invalid @enderror" required
                                    {{ $categories->isEmpty() ? 'disabled' : '' }}>
                                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Choose category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-0">
                                <label for="tag">Tags <span class="text-danger">*</span></label>
                                <select name="tags[]" id="tag"
                                    class="form-control post-tags @error('tags') is-invalid @enderror"
                                    multiple {{ $tags->isEmpty() ? 'disabled' : '' }}>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', [])))>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Hold Ctrl/Cmd to select multiple, or use the search box.</small>
                                @error('tags') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card card-default post-editor-card mb-3">
                        <div class="card-header bg-white border-bottom">
                            <h4 class="mb-0">Featured image</h4>
                        </div>
                        <div class="card-body p-3 p-md-4">
                            <div class="form-group mb-0">
                                <label for="photo" class="image-upload-box">
                                    <input type="file" name="photo" id="photo"
                                        class="d-none @error('photo') is-invalid @enderror"
                                        accept="image/jpeg,image/png,image/gif,image/webp">
                                    <div id="upload-placeholder" class="text-center">
                                        <i class="fas fa-cloud-upload-alt mb-2"></i>
                                        <p class="mb-1 font-weight-bold">Click to upload image</p>
                                        <small class="text-muted">JPG, PNG, GIF or WebP · Max 5 MB</small>
                                    </div>
                                    <img id="image-preview" class="img-fluid rounded d-none post-image-preview" alt="Selected image preview">
                                </label>
                                <small id="photo-name" class="form-text text-muted"></small>
                                @error('photo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap">
                        <a href="{{ url('admin/index') }}" class="btn btn-light border mr-2 mb-2 flex-fill">Cancel</a>
                        <button type="submit" class="btn btn-primary mb-2 flex-fill"
                            {{ ($categories->isEmpty() || $tags->isEmpty()) ? 'disabled' : '' }}>
                            <i class="fas fa-save mr-1"></i> Create post
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .post-editor-card { border-radius: 10px; overflow: hidden; }
        .post-editor-card .card-header h4 { font-size: 16px; font-weight: 700; }
        .post-editor-card label { font-weight: 700; }
        .post-editor-card .form-control { min-height: 44px; border-radius: 6px; }
        .post-editor-card .form-control-lg { min-height: 52px; font-size: 1.15rem; font-weight: 600; }
        .post-editor-card .select2-container--default .select2-selection--multiple {
            min-height: 44px; border-color: #d8dce1; border-radius: 6px; padding: 5px;
        }
        .post-editor-card .select2-container { width: 100% !important; }
        .image-upload-box {
            display: block; border: 2px dashed #d8dce1; border-radius: 8px; padding: 28px 16px;
            cursor: pointer; background: #fafbfc; transition: border-color .2s, background .2s; margin-bottom: 0;
        }
        .image-upload-box:hover { border-color: #4c84ff; background: #f5f8ff; }
        .image-upload-box i { font-size: 32px; color: #4c84ff; display: block; }
        .post-image-preview { max-height: 200px; width: 100%; object-fit: cover; }
        .note-editor.note-frame { border-radius: 6px; border-color: #d8dce1; }
        .flex-fill { flex: 1 1 auto; }
    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function () {
            const $title = $('#title');
            const $count = $('#title-count');
            $count.text($title.val().length);
            $title.on('input', function () {
                $count.text(this.value.length);
            });

            $('.post-tags').select2({
                placeholder: 'Select one or more tags',
                closeOnSelect: false,
                width: '100%'
            });

            $('#summernote').summernote({
                height: 320,
                placeholder: 'Write your post content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            $('#photo').on('change', function () {
                const file = this.files[0];
                if (!file) return;
                $('#photo-name').text(file.name);
                $('#upload-placeholder').addClass('d-none');
                $('#image-preview').attr('src', URL.createObjectURL(file)).removeClass('d-none');
            });

            $('#create-post-form').on('submit', function () {
                $('#summernote').val($('#summernote').summernote('code'));
            });
        });
    </script>
@endpush
