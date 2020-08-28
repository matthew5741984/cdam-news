<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="logo"><a href="#">CDAM<span>news</span>.</a></h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">latest News</h2>
                    @forelse($posts as $post)
                        <div class="block-21 mb-4 d-flex">
                            <a class="img mr-4 rounded" style="background-image: url('storage/{{ $post->image }}');"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
                                <div class="meta">
                                    <div><a href="#"></span> {{ $post->created_at->format('M. d, Y') }}</a></div>
                                    <div><a href="#"></span>
                                            @if ($post->author != null)
                                                {{ $post->author->name }}
                                            @else
                                                unknown
                                            @endif
                                        </a></div>
                                    <div><a href="#"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Home</a>
                        </li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>About</a>
                        </li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Realtime
                                WL</a></li>
                        <li><a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">86 Cheriton Road,
                                    West Molesey, KT8 2EP, United Kingdom</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+44 1632
                                        960129</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">yourquestions@cdam.co.uk</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    This material may not be published, broadcast, rewritten, or redistributed. &copy;{{ date('Y') }}
                    {{ setting('site.title') }} Network, LLC. All rights reserved.
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
