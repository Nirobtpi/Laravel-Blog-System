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
                    <h2 class="my-3">View All tag</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ date('Y-m-d',strtoTime($tag->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('/edit-tag') }}/{{ $tag->id }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('delete-tag') }}/{{ $tag->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <h2>No Data Found</h2>
                            @endforelse
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @endsection
