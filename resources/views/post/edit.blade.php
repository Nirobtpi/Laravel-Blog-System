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
                    <form action="{{ url('admin/post-update') }}/{{ $post->id }}" method="post">
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
                            <label for="description">Post Title</label>
                            <textarea class="form-control rounded-0 bg-light @error('title') is in-valid @enderror"
                                name="description" id="description">{{ $post->description }}</textarea>
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
                            {{-- <select class="form-control @error('tags') is in-valid
                                
                            @enderror" name="tags[]" multiple="multiple" id="tag">
                            
                                @foreach ($tags as $tag)
                                @foreach ($post->tags as $postTag)
                                <option @selected($postTag->id == $tag->id) value="{{ $tag->id }}">
                            {{ $tag->name }}</option>
                            @endforeach
                            @php
                            continue;
                            @endphp
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                            </select> --}}
                            <select class="form-control @error('tags') is-invalid @enderror" name="tags[]"
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

@endsection
