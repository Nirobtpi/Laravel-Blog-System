@extends('layouts.site')

@section('title')
    {{ 'Blog Page' }}
@endsection

@section('content')
    <section class="page-title bg-1 home-page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white-50">Our blog</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Our blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray home-blog-section">
        <div class="container">
            <div class="home-section-heading text-center mb-5">
                <span>Fresh from the blog</span>
                <h2>Latest articles</h2>
                <p>Explore our newest stories, ideas and useful insights.</p>
            </div>

            <div class="row">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <article class="home-blog-card h-100">
                                <a href="{{ url('/blog', $post->id) }}" class="home-blog-image-link">
                                    @if ($post->photo)
                                        <img loading="lazy" src="{{ asset($post->photo) }}"
                                            alt="{{ $post->title }}" class="home-blog-image">
                                    @else
                                        <div class="home-blog-image home-blog-image-empty">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </a>

                                <div class="home-blog-content">
                                    <div class="home-blog-meta">
                                        <span><i class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span>
                                        <span><i class="ti-time mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{ url('/blog', $post->id) }}">
                                            {{ Str::limit($post->title, 45, '...') }}
                                        </a>
                                    </h3>
                                    <p>{{ Str::limit(strip_tags($post->description), 120, '...') }}</p>
                                    <a href="{{ url('/blog', $post->id) }}"
                                        class="btn btn-small btn-main btn-round-full">
                                        Read article <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="home-empty-state text-center">
                            <i class="fas fa-newspaper mb-3"></i>
                            <h3>No post found</h3>
                            <p class="text-muted mb-0">New articles will appear here soon.</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 text-center home-pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .home-page-title { padding: 90px 0 80px; }
        .home-blog-section { padding-top: 85px; }
        .home-section-heading > span { color: #f75757; font-size: 13px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }
        .home-section-heading h2 { color: #222; font-size: 34px; font-weight: 700; margin: 12px 0 8px; }
        .home-section-heading p { color: #777; margin-bottom: 0; }
        .home-blog-card { overflow: hidden; border-radius: 8px; background: #fff; box-shadow: 0 5px 25px rgba(0, 0, 0, .07); transition: transform .25s ease, box-shadow .25s ease; }
        .home-blog-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0, 0, 0, .1); }
        .home-blog-image-link { display: block; overflow: hidden; }
        .home-blog-image { display: block; width: 100%; height: 240px; object-fit: cover; transition: transform .35s ease; }
        .home-blog-card:hover .home-blog-image { transform: scale(1.04); }
        .home-blog-image-empty { display: flex; align-items: center; justify-content: center; background: #eef1f4; color: #adb5bd; font-size: 42px; }
        .home-blog-content { padding: 30px; }
        .home-blog-meta { display: flex; flex-wrap: wrap; gap: 15px; padding: 9px 12px; color: #777; background: #f7f8f9; font-size: 12px; }
        .home-blog-content h3 { min-height: 58px; color: #222; font-size: 25px; line-height: 1.35; margin: 22px 0 13px; }
        .home-blog-content h3 a { color: inherit; }
        .home-blog-content h3 a:hover { color: #f75757; }
        .home-blog-content p { min-height: 55px; color: #777; line-height: 1.7; margin-bottom: 22px; }
        .home-empty-state { padding: 65px 20px; border-radius: 8px; background: #fff; box-shadow: 0 5px 25px rgba(0, 0, 0, .05); }
        .home-empty-state > i { color: #f75757; font-size: 42px; }
        .home-pagination .pagination { justify-content: center; }
        @media (max-width: 767px) {
            .home-page-title { padding: 65px 0 55px; }
            .home-blog-image { height: 190px; }
            .home-blog-content { padding: 24px; }
        }
    </style>
@endpush
