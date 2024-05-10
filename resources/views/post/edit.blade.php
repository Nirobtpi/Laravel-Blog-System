@extends('layouts.auth')

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
                    <form action="{{ url('admin/post-update') }}/{{ $post->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PATCH') --}}
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control rounded-0 bg-light @error('title') is in-valid
                                    
                                @enderror" id="title" placeholder="Enter Title">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summernote">Post Content</label>
                            <textarea class="form-control rounded-0 bg-light @error('title') is in-valid @enderror"
                                name="description" id="summernote">{!! $post->description !!}</textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Is Publish</label>
                            <select id="status" class="form-control rounded-0 bg-light @error('status') is in-valid
                                
                            @enderror" name="status" id="publish">
                                <option value="1" @selected($post->status == 1)>Publish</option>
                                <option value="0" @selected($post->status == 0)>Draft</option>
                            </select>
                            @error('status')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control rounded-0 bg-light @error('category_id') is in-valid
                                
                            @enderror" name="category_id" id="category">
                                @foreach ($categories as $category)
                                <option @selected($post->id == $category->id) value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group" data-select2-id="8">
                            <label for="tag">Tags</label>
                            <select class="form-control nirob" name="tags[]"
                                multiple="multiple" id="tag">
                                @foreach ($tags as $tag)
                                @php
                                $selected = false;
                                foreach ($post->tags as $postTag) {
                                if ($postTag->id == $tag->id) {
                                $selected = true;
                                break;
                                }
                                }
                                @endphp
                                <option {{ $selected ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}
                                </option>
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
                            <button type="submit" name="submit" class="btn btn-secondary btn-pill">Create
                                Post</button>
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
