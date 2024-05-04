@extends('layouts.auth')
@section('title')
    {{ 'View Post' }}
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
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

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">User</th>
                        <th scope="col">Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::substr($post->description, 0, 30) }}</td>
                            <td>
                                @if ($post->status == 1)
                                    {{ 'Publish' }}
                                @else
                                    {{ 'Drft' }}
                                @endif
                            </td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <th class="text-center">
                                <a href="#">
                                    <i class="mdi mdi-open-in-new"></i>
                                </a>
                                <a href="#">
                                    <i class="mdi mdi-close text-danger"></i>
                                </a>

                            </th>
                        </tr>
                    @empty
                        <h2>No Post Found</h2>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
