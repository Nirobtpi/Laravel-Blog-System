@extends('layouts.auth')
@section('title') {{'Create Post'}} @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-2">
            <div class="card card-default p-3">
                <h2>Create Post</h2>
                <div class="card-body" data-select2-id="9">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ url('admin/add-post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control rounded-0 bg-light @error('title') is in-valid
                                    
                                @enderror" id="title" placeholder="Enter Title">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summernote">Post COntent</label>
                            <textarea class="form-control rounded-0 bg-light @error('title') is in-valid @enderror"
                                name="description" id="summernote">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Is Publish</label>
                            <select id="status" class="form-control rounded-0 bg-light @error('status') is in-valid
                                
                            @enderror" name="status" id="publish">
                                <option selected disabled></option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                            @error('status')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control rounded-0 bg-light @error('category_id') is in-valid
                                
                            @enderror" name="category_id" id="category">
                                <option value="" disabled selected>Choose Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group" data-select2-id="8">
                            <label for="tag">Tags</label>
                            <select multiple="multiple" class="form-control nirob" name="tags[]" id="tag">
                                <option value="" selected disabled>Select Tag</option>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo">Post Thumbnail</label>
                           <input type="file" class="form-control rounded-0 bg-light" name="photo" id="photo">
                        </div>

                        <div class="form-footer">
                            <button type="submit" name="create" class="btn btn-secondary btn-pill">Create Post</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
        $(document).ready(function() {
            $('.nirob').select2();
            $('#summernote').summernote();
        });
</script>
@endpush
@endsection
