@extends('layouts.site')
@section('title')
    {{ 'Blog Page' }}
@endsection

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Our blog</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog Tag</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">{{ $mytag->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                @if (count($postsWithTag) > 0)
                    @foreach ($postsWithTag as $post)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <div class="blog-item">
                                <img loading="lazy" src="{{ asset('storage/' . $post->photo) }}" alt="blog"
                                    class="img-fluid rounded">

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                        <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                                class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span>
                                        <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                                class="ti-comment mr-2"></i>5 Comments</span>
                                        <span class="text-black text-capitalize d-inline-block mr-3"><i
                                                class="ti-time mr-1"></i>{{ date('d M', strtotime($post->created_at)) }}</span>
                                    </div>

                                    <h3 class="mt-3 mb-3"><a
                                            href="{{ url('/blog') }}/{{ $post->id }}">{{ Str::limit($post->title, 30, '...') }}</a>
                                    </h3>
                                    <p class="mb-4">{!! Str::limit($post->description, 100, '...') !!}</p>

                                    <a href="{{ url('/blog') }}/{{ $post->id }}"
                                        class="btn btn-small btn-main btn-round-full">Learn More</a>
                                </div>
                            </div>
                        </div>

                       
                    @endforeach
                @else
                    <div class="alert text-center alert-danger" style="width: 100%">
                        <h3>Data Not Found</h3>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
