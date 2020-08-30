<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            @forelse($posts as $post)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{ url('post/' . $post->slug) }}" class="block-20"
                            style="background-image: url('{{ asset('storage/' . $post->image) }}');">
                        </a>
                        <div class="text p-4 float-right d-block">
                            <div class="topper d-flex align-items-center">
                                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                    <span class="day">{{ $post->created_at->format('j') }}</span>
                                </div>
                                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                    <span class="yr">{{ $post->created_at->format('Y') }}</span>
                                    <span class="mos">{{ $post->created_at->format('F') }}</span>
                                </div>
                            </div>
                            <h3 class="heading mb-3"><a href="#">{{ $post->title }}</a></h3>
                            <p>{{ \Illuminate\Support\Str::limit($post->excerpt, 100) }}</p>
                            <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read
                                    more</a></p>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Can't see shit captain!</h3>
            @endforelse
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
