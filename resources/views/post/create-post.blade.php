@extends('layouts.auth')
@section('title') {{'Create Post'}} @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-2">
            <div class="card card-default p-3">
                <h2>Create Post</h2>
                <div class="card-body" data-select2-id="9">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ url('admin/add-post') }}" method="post">
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
                            <label for="description">Post Title</label>
                            <textarea class="form-control rounded-0 bg-light @error('title') is in-valid @enderror"
                                name="description" id="description">{{ old('description') }}</textarea>
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
                            <select class="form-control @error('tags') is in-valid
                                
                            @enderror"  name="tags[]" multiple="multiple" id="tag">
                                <option value="" selected disabled>Select Tag</option>
                                @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                              @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-secondary btn-pill">Create Post</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
