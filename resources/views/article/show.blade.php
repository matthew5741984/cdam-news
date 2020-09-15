@extends('layout.app')

@section('title', $post->title)
@section('maincontent')
    @include('partials.jumbotron-2')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <p class="mb-5">
                        <img src="{{ asset(env('AWS_URL') . "/" . $post->image) }}" alt="" class="img-fluid">
                    </p>
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    {!! $post->body !!}
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @if ($post->category != null)
                                <a href="{{ url('/post/category/' . $post->category->id) }}"
                                    class="tag-cloud-link">{{ $post->category->name }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            @if ($post->author != null)
                                <img src="{{ asset(env('AWS_URL') . "/" . $post->author->avatar) }}" alt="Image placeholder"
                                    class="img-fluid mb-4 author-img">
                            @endif
                        </div>
                        <div class="desc">
                            <p>Written by:
                                @if ($post->author != null)
                                    {{ $post->author->name }}
                                @else
                                    Undefined
                                @endif
                            </p>
                            <p>Published {{ $post->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
                    <search-engine></search-engine>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            @forelse($categories as $category)
                                <li><a href="{{ url('/post/category/' . $category->id) }}">{{ $category->name }} <span
                                            class="ion-ios-arrow-forward"></span></a></li>
                            @empty
                                <p class="text-center">Not Found</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        @forelse($recent_posts as $recent_post)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                    style="background-image: url({{ asset(env('AWS_URL') . "/" . $recent_post->image) }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ url('post/' . $recent_post->slug) }}">{{ $recent_post->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="{{ url('post/' . $recent_post->slug) }}"><span
                                                    class="icon-calendar"></span>
                                                {{ $recent_post->created_at->format('M. d, Y') }}</a></div>
                                        <div>
                                            <a href="{{ url('post/' . $recent_post->slug) }}"><span class="icon-person"></span>
                                                @if ($post->author != null)
                                                    {{ $recent_post->author->name }}
                                                @else
                                                    Undefined
                                                @endif
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Not Found</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
