@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-2">
                <div class="card card-default p-3">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ url('/add-post') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title"
                                    class="form-control rounded-0 bg-light @error('title') is in-valid
                                    
                                @enderror"
                                    id="title" placeholder="Enter Title">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control rounded-0 bg-light" name="category_id" id="category">
                                    @foreach ($categories as $category)
                                        <option>{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="tag">Tags</label>
                                <select class="form-control rounded-0 bg-light" name="category_id" id="tag">
                                    @foreach ($tags as $tag)
                                        <option>{{ $tag->name }}</option>
                                    @endforeach

                                </select>
                            </div> --}}
                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-secondary btn-pill">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
