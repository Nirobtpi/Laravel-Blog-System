@extends('layouts.site')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <section class="page-title bg-1 single-page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white-50">{{ $post->category->name }}</span>
                        <h1 class="text-capitalize mb-4 text-lg">{{ Str::limit($post->title, 70, '...') }}</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Article</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray single-blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <article class="single-blog-item">
                                @if ($post->photo)
                                    <img loading="lazy" src="{{ asset($post->photo) }}" alt="{{ $post->title }}"
                                        class="img-fluid rounded single-featured-image">
                                @else
                                    <div class="single-featured-image single-featured-empty">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif

                                <div class="blog-item-content bg-white p-4 p-md-5">
                                    <div class="blog-item-meta bg-gray pt-2 pb-1 px-3 mb-3">
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}
                                        </span>
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-user mr-2"></i>{{ $post->user->name }}
                                        </span>
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-comment mr-2"></i>{{ $count }}
                                            {{ $count === 1 ? 'Comment' : 'Comments' }}
                                        </span>
                                        <span class="text-black text-capitalize">
                                            <i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}
                                        </span>
                                    </div>

                                    <h2 class="mt-3 mb-4">{{ $post->title }}</h2>
                                    <div class="single-post-body">
                                        {!! $post->description !!}
                                    </div>

                                    @if ($post->tags->count())
                                        <div class="tag-option mt-5 d-block d-md-flex justify-content-between align-items-center">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item font-weight-bold">Tags:</li>
                                                @foreach ($post->tags as $tag)
                                                    <li class="list-inline-item">
                                                        <a href="{{ url('/tag', $tag->id) }}" rel="tag"
                                                            class="single-tag-chip">{{ $tag->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </article>
                        </div>

                        <div class="col-lg-12 mb-4">
                            @if (Session::has('alert_success'))
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle mr-1"></i>{{ Session::get('alert_success') }}
                                </div>
                            @endif

                            @auth
                                <form class="contact-form bg-white rounded p-4 p-md-5" method="post"
                                    action="{{ url('/post/comment', $post->id) }}" id="comment-form">
                                    @csrf
                                    <h4 class="mb-2">Write a comment</h4>
                                    <p class="text-muted mb-4">Share your thoughts about this article.</p>
                                    <textarea class="form-control mb-3 @error('comment') is-invalid @enderror"
                                        name="comment" id="comment" cols="30" rows="5"
                                        placeholder="Write your comment here..." required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <button class="btn btn-main btn-round-full" type="submit">
                                        Post comment <i class="fas fa-paper-plane ml-2"></i>
                                    </button>
                                </form>
                            @else
                                <div class="bg-white rounded p-4 p-md-5 text-center">
                                    <h4 class="mb-2">Want to join the discussion?</h4>
                                    <p class="text-muted mb-4">Please log in to leave a comment.</p>
                                    <a href="{{ route('login') }}" class="btn btn-main btn-round-full">Login to comment</a>
                                </div>
                            @endauth
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div class="comment-area card border-0 p-4 p-md-5">
                                <h4 class="mb-4">{{ $count }} {{ $count === 1 ? 'Comment' : 'Comments' }}</h4>
                                <ul class="comment-tree list-unstyled mb-0">
                                    @forelse ($comments as $comment)
                                        <li class="mb-4 pb-4 {{ !$loop->last ? 'border-bottom' : '' }}">
                                            <div class="comment-area-box">
                                                <div class="d-flex align-items-start">
                                                    <div class="comment-avatar mr-3">
                                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                            <h5 class="mb-1">{{ $comment->user->name }}</h5>
                                                            <span class="date-comm text-muted small">
                                                                {{ $comment->created_at->format('M d, Y') }}
                                                            </span>
                                                        </div>
                                                        <div class="comment-content mt-2">
                                                            <p class="mb-2">{{ $comment->comment }}</p>
                                                        </div>
                                                        @auth
                                                            @if (auth()->id() === $comment->user_id || auth()->id() === $post->user_id)
                                                                <a href="{{ url('/comment/delete', $comment->id) }}"
                                                                    class="text-danger small"
                                                                    onclick="return confirm('Delete this comment?')">
                                                                    <i class="fas fa-trash-alt mr-1"></i>Delete
                                                                </a>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="text-center text-muted py-4">
                                            <i class="far fa-comments d-block mb-2" style="font-size: 36px;"></i>
                                            No comments yet. Be the first to share your thoughts.
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget card border-0 mb-3">
                            <div class="card-body p-4 text-center">
                                <div class="author-avatar mx-auto mb-3">
                                    {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                </div>
                                <h5 class="mb-1 mt-2">{{ $post->user->name }}</h5>
                                <p class="text-muted mb-0">Author</p>
                            </div>
                        </div>

                        <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                            <h5 class="mb-3">Latest Posts</h5>
                            @forelse ($posts as $allPost)
                                <div class="media border-bottom py-3">
                                    <a href="{{ url('/blog', $allPost->id) }}" class="mr-3">
                                        @if ($allPost->photo)
                                            <img loading="lazy" class="sidebar-thumb"
                                                src="{{ asset($allPost->photo) }}" alt="{{ $allPost->title }}">
                                        @else
                                            <div class="sidebar-thumb sidebar-thumb-empty">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <h6 class="my-1">
                                            <a href="{{ url('/blog', $allPost->id) }}">
                                                {{ Str::limit($allPost->title, 45, '...') }}
                                            </a>
                                        </h6>
                                        <span class="text-sm text-muted">
                                            {{ $allPost->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">No other posts yet.</p>
                            @endforelse
                        </div>

                        @if ($tags->count())
                            <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                                <h5 class="mb-4">Tags</h5>
                                @foreach ($tags as $tag)
                                    <a href="{{ url('/tag', $tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .single-page-title { padding: 90px 0 80px; }
        .single-featured-image { width: 100%; max-height: 420px; object-fit: cover; }
        .single-featured-empty { display: flex; align-items: center; justify-content: center; height: 280px; background: #eef1f4; color: #adb5bd; font-size: 48px; border-radius: 6px; }
        .single-post-body { color: #555; line-height: 1.8; font-size: 16px; }
        .single-post-body img { max-width: 100%; height: auto; }
        .single-tag-chip { display: inline-block; padding: 4px 12px; border-radius: 20px; background: #f0f2f5; color: #f75757; font-size: 13px; }
        .comment-avatar, .author-avatar { width: 48px; height: 48px; border-radius: 50%; background: #f75757; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .author-avatar { width: 72px; height: 72px; font-size: 28px; }
        .sidebar-thumb { width: 56px; height: 56px; object-fit: cover; border-radius: 4px; display: block; }
        .sidebar-thumb-empty { display: flex; align-items: center; justify-content: center; background: #eef1f4; color: #adb5bd; }
        @media (max-width: 575px) {
            .single-page-title { padding: 65px 0 55px; }
            .single-featured-image { max-height: 240px; }
        }
    </style>
@endpush
