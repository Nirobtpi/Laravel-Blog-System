@extends('layouts.site')
@section('title')
{{ $post->title }}
@endsection
@section('content')
<section class="page-title bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">News details</span>
                    <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                        <li class="list-inline-item"><span class="text-white">/</span></li>
                        <li class="list-inline-item text-white-50">News details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="single-blog-item">
                            <img loading="lazy" src="{{ asset('storage/' . $post->photo) }}" alt="blog"
                                class="img-fluid rounded">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                    <span class="text-muted text-capitalize mr-3"><i
                                            class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span>
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5
                                        Comments</span>
                                    <span class="text-black text-capitalize mr-3"><i
                                            class="ti-time mr-1"></i>{{ date('d M', strtotime($post->created_at)) }}</span>
                                </div>


                                <h2 class="mt-3 mb-4">{{ $post->title }}</h2>
                                {!! $post->description !!}

                                <div
                                    class="tag-option mt-5 d-block d-md-flex justify-content-between align-items-center">
                                    <ul class="list-inline">
                                        <li>Tags:</li>
                                        @foreach ($post->tags as $tag)
                                        <li class="list-inline-item"><a href="{{ url('/tag') }}/{{ $tag->id }}"
                                                rel="tag">{{ $tag->name }}</a></li>
                                        @endforeach

                                    </ul>

                                    <ul class="list-inline">
                                        <li class="list-inline-item"> Share: </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest-p"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-google-plus"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <form class="contact-form bg-white rounded p-5" method="post" action="{{ url('/post/comment',$post->id) }}" id="comment-form">
                            @csrf
                            <h4 class="mb-4">Write a comment</h4>
                            <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5"
                                placeholder="Comment"></textarea>

                            <input class="btn btn-main btn-round-full" type="submit" name="submit-contact"
                                id="submit_contact" value="Submit Message">
                        </form>
                    </div>

                    <div class="col-lg-12 mb-5">
                        <div class="comment-area card border-0 p-5">
                            <h4 class="mb-4">2 Comments</h4>
                            <ul class="comment-tree list-unstyled">
                                <li class="mb-5">
                                    <div class="comment-area-box">
                                        <img loading="lazy" alt="comment-author" src="images/blog/test1.jpg"
                                            class="img-fluid float-left mr-3 mt-2">

                                        <h5 class="mb-1">Philip W</h5>
                                        <span>United Kingdom</span>

                                        <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                            <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
                                            <span class="date-comm">Posted October 7, 2018 </span>
                                        </div>

                                        <div class="comment-content mt-3">
                                            <p>Some consultants are employed indirectly by the client via a consultancy
                                                staffing company, a
                                                company that provides consultants on an agency basis. </p>
                                        </div>
                                        <form class="contact-form bg-white rounded p-5" id="comment-form">
                                            <h4 class="mb-4">Riply</h4>
                                            <textarea class="form-control mb-3" name="comment_reply" id="comment"
                                                cols="30" rows="5" placeholder="Comment"></textarea>

                                            <input class="btn btn-main btn-round-full" type="submit"
                                                name="submit-contact" id="submit_contact" value="Submit Message">
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="sidebar-wrap">
                    <div class="sidebar-widget search card p-4 mb-3 border-0">
                        <input type="text" class="form-control" placeholder="search">
                        <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                    </div>

                    <div class="sidebar-widget card border-0 mb-3">
                        <img loading="lazy" src="images/blog/blog-author.jpg" alt="blog-author" class="img-fluid">
                        <div class="card-body p-4 text-center">
                            <h5 class="mb-0 mt-4">{{ $post->user->name }}</h5>
                            <p>Digital Marketer</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>

                            <ul class="list-inline author-socials">
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-behance text-muted"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                        <h5>Latest Posts</h5>
                        @foreach ($posts as $allPost)
                        <div class="media border-bottom py-3">
                            <a href="{{ url('/blog') }}/{{ $allPost->id }}"><img loading="lazy" style="width: 50px"
                                    class="mr-4" src="{{ asset('storage/' . $allPost->photo) }}" alt="blog"></a>
                            <div class="media-body">
                                <h6 class="my-2"><a
                                        href="{{ url('/blog') }}/{{ $allPost->id }}">{{ $allPost->title }}</a>
                                </h6>
                                <span
                                    class="text-sm text-muted">{{ date('d M Y', strtotime($allPost->created_at)) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                        <h5 class="mb-4">Tags</h5>
                        @foreach ($tags as $tag)
                        <a href="{{ url('/tag') }}/{{ $tag->id }}">{{ $tag->name }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection