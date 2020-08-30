@extends('layout.app')

@section('title', $post->title)
@section('maincontent')
    @include('partials.jumbotron-2')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <p class="mb-5">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
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
                                <img src="{{ asset('storage/' . $post->author->avatar) }}" alt="Image placeholder"
                                    class="img-fluid mb-4 author-img">
                            @endif
                        </div>
                        <div class="desc">
                            <p>Written by:
                                @if ($post->author != null)
                                    {{ $post->author->name }}
                                @endif
                            </p>
                            <p>Published {{ $post->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            @forelse($categories as $category)
                                <li><a href="{{ url('/post/category/' . $category->id) }}">{{ $category->name }} <span
                                            class="ion-ios-arrow-forward"></span></a></li>
                            @empty
                                <li><a href="#">Not Found <span class="ion-ios-arrow-forward"></span></a></li>
                            @endforelse
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('images/image_1.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Nov. 14, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('images/image_2.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Nov. 14, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('images/image_3.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Nov. 14, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
