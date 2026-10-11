@extends('layouts.site')
@section('title')
    {{ 'Blog Page' }}
@endsection

@section('content')
    <section class="page-title bg-1 tag-page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white-50">Browsing posts tagged with</span>
                        <h1 class="text-capitalize mb-4 text-lg">{{ $mytag->name }}</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Tag</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray tag-posts-section">
        <div class="container">
            <div class="tag-results-heading d-flex flex-wrap align-items-center justify-content-between mb-5">
                <div>
                    <span class="tag-label"><i class="fas fa-tag mr-2"></i>{{ $mytag->name }}</span>
                    <h2 class="mt-3 mb-1">Latest articles</h2>
                    <p class="text-muted mb-0">{{ count($postsWithTag) }} {{ count($postsWithTag) === 1 ? 'post' : 'posts' }} found</p>
                </div>
                <a href="{{ url('/') }}" class="btn btn-main btn-small btn-round-full mt-3 mt-md-0">
                    <i class="fas fa-arrow-left mr-2"></i>Back to all posts
                </a>
            </div>
            <div class="row">
                @if (count($postsWithTag) > 0)
                    @foreach ($postsWithTag as $post)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <article class="tag-post-card bg-white h-100">
                                <a href="{{ url('/blog', $post->id) }}" class="tag-post-image-link">
                                    @if ($post->photo)
                                        <img loading="lazy" src="{{ asset($post->photo) }}" alt="{{ $post->title }}"
                                            class="tag-post-image">
                                    @else
                                        <div class="tag-post-image tag-post-image-placeholder">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </a>

                                <div class="tag-post-content">
                                    <div class="tag-post-meta">
                                        <span><i class="ti-pencil-alt mr-1"></i>{{ $post->category->name }}</span>
                                        <span><i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
                                    </div>

                                    <h3><a href="{{ url('/blog', $post->id) }}">{{ Str::limit($post->title, 55, '...') }}</a></h3>
                                    <p>{{ Str::limit(strip_tags($post->description), 110, '...') }}</p>

                                    <a href="{{ url('/blog', $post->id) }}" class="tag-read-more">
                                        Read article <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="tag-empty-state text-center">
                            <i class="fas fa-search mb-3"></i>
                            <h3>No posts found</h3>
                            <p class="text-muted mb-4">There are no published posts with this tag yet.</p>
                            <a href="{{ url('/') }}" class="btn btn-main btn-round-full">Explore all posts</a>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection

@push('style')
    <style>
        .tag-page-title { padding: 90px 0 80px; }
        .tag-results-heading h2 { font-size: 30px; font-weight: 700; }
        .tag-label { display: inline-block; padding: 8px 16px; border-radius: 30px; background: #f0f2f5; color: #f75757; font-size: 14px; font-weight: 700; }
        .tag-post-card { border-radius: 8px; overflow: hidden; box-shadow: 0 5px 25px rgba(0, 0, 0, .06); }
        .tag-post-image-link { display: block; }
        .tag-post-image { display: block; width: 100%; height: 220px; object-fit: cover; }
        .tag-post-image-placeholder { display: flex; align-items: center; justify-content: center; background: #eef1f4; color: #adb5bd; font-size: 42px; }
        .tag-post-content { padding: 24px; }
        .tag-post-meta { display: flex; flex-wrap: wrap; gap: 12px; color: #7b8088; font-size: 12px; margin-bottom: 15px; }
        .tag-post-content h3 { font-size: 21px; line-height: 1.35; margin-bottom: 12px; }
        .tag-post-content h3 a { color: #222; }
        .tag-post-content h3 a:hover { color: #f75757; }
        .tag-post-content p { color: #777; line-height: 1.7; min-height: 54px; margin-bottom: 18px; }
        .tag-read-more { color: #f75757; font-size: 14px; font-weight: 700; }
        .tag-empty-state { background: #fff; border-radius: 8px; padding: 70px 20px; box-shadow: 0 5px 25px rgba(0, 0, 0, .05); }
        .tag-empty-state > i { color: #f75757; font-size: 42px; }
        @media (max-width: 575px) {
            .tag-page-title { padding: 65px 0 55px; }
            .tag-post-image { height: 190px; }
        }
    </style>
@endpush
