    <div class="container-xl py-5">
        <div class="row justify-content-center">
            <div class="col-12 mb-3 py-3">
                <div class="swiper-container articleSwiper">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $post)
                        <div class="swiper-slide">
                            <img src="{{ Voyager::image( $post->image ) }}" class="img-fluid mb-3"
                                alt="{{ $post->title }}">
                            <div class="card mb-3 bg-surface-3">
                                <div class="card-body">
                                    <h4 class="text-white text-subheading mb-3">{{ $post->title }}</h4>
                                    <div class="text-base text-start text-truncate-blog">
                                        <p>{!! $post->excerpt !!}</p>
                                    </div>
                                </div>
                            </div>
                            <a href="/blog/{{ $post->slug }}"
                                class="btn btn-iconic-secondary text-white d-inline-flex py-2">READ FULL ARTICLE</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
