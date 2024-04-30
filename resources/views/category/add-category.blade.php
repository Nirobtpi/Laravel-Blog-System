@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-2">
                <div class="card card-default p-3">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                 {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ url('/add-category') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category">Category Name</label>
                                <input type="text" name="category" class="form-control rounded-0 bg-light @error('category') is in-valid
                                    
                                @enderror"
                                    id="category" placeholder="Enter Category Name">
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-secondary btn-pill">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
