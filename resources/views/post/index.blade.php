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
        @if(Session::has('success_alert'))
        <div class="alert alert-success text-center" style="width: 100%">
            {{ Session::get('success_alert') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger text-center" style="width:100%">
            {{ session('error') }}
        </div>
        @endif

    </div>
    <div class="card-body">
        <table class="table table-bordered" style="margin-bottom: 50px">
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
                @forelse ($posts as $key=>$post)
                <tr>
                    <td scope="row">{{ $posts->firstItem() + $key }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->description, 30) }}</td>
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
                            <i class="fas fa-eye text-info"></i>
                        </a>
                        <a href="{{ url('/admin/post-edit') }}/{{ $post->id }}">
                            <i class="mdi mdi-open-in-new"></i>
                        </a>
                        <a href="{{ url('admin/post-delete') }}/{{ $post->id }}">
                            <i class="mdi mdi-close text-danger"></i>
                        </a>

                    </th>
                </tr>
                @empty
                <h2>No Post Found</h2>
                @endforelse

            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
@endsection
