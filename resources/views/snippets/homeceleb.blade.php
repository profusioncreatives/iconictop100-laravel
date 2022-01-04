<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-5">
            <h3 class="h3 text-black">SEE WHAT CELEBRITIES SAYS</h3>
        </div>
        <div class="col-12 text-center">
            <div class="swiper-container celebSwiper">
                <div class="swiper-wrapper">
                    @foreach($groups->where('category', '=', 'celebrities')->where('featured', '=', 1) as $group)
                    @foreach($elements->where('group', '=', $group->slug)->where('featured', '=', 1) as $item)
                    <div class="swiper-slide">
                        <div class="card card-transparent">
                            @if(!empty($item->video))
                            <video class="lazy card-img" data-src="{{ $item->video }}" data-poster="{{ Voyager::image( $item->image ) }}">
                                <source data-src="{{ $item->video }}" type="video/mp4">
                            </video>
                            <button id="play-animation" class="btn card-img-overlay w-100 text-light">
                                <svg id="play" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                                </svg>
                                <svg id="pause" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16" style="display: none;">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z"/>
                                </svg>
                            </button>
                            @endif
                            <div class="card-body">
                                <div class="h4">{{ $item->title }}</div>
                                <div class="body-caption">{!! $item->description !!}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
