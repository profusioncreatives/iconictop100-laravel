<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-5">
            <h3 class="h3 text-black">OUR EXCLUSIVE MUAs LIST</h3>
        </div>
        <div class="col-12 text-center">
            <div class="swiper-container exclusiveSwiper">
                <div class="swiper-wrapper">
                @foreach($groups->where('category', '=', 'muas')->where('featured', '=', 1) as $group)
                    @foreach($elements->where('group', '=', $group->slug)->where('featured', '=', 1) as $item)
                    <div class="swiper-slide">
                        <div class="card card-transparent">
                            <a href="/mua" class="stretched-link" style="opacity: 1;">
                                <img src="{{ Voyager::image( $item->image ) }}" class="card-img-top" alt="{{ $item->title }}">
                            </a>
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
