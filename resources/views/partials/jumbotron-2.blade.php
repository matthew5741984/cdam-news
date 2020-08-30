@foreach ($navigations as $navigation)
    @if (str_contains(URL::current(), $navigation->path))
        <section class="hero-wrap-custom hero-wrap-2 js-fullheight"
            style="background-image: url('{{ asset('storage/' . $navigation->image) }}');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate pb-5 text-center">
                        <h1 class="mb-3 bread">{{ $navigation->title }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                        class="ion-ios-arrow-forward"></i></a></span>
                            <span>{{ $navigation->breadcrumb }} <i class="ion-ios-arrow-forward"></i></span></p>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach
