<div class="container-xl py-5">
        <div class="row justify-content-center">
            <div class="col-12 mb-5">
                <div class="text-effect">
                    <h2 class="h2 text-gold-gradient">WHAT YOU WILL GET?</h2>
                    <span class="text-big">WHAT YOU WILL GET?</span>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div id="awardcard" class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    @foreach($groups->where('category', '=', 'gift-card')->where('featured', '=', '1') as $group)
                    @foreach($elements->where('group', '=', $group->slug) as $item)
                    <div class="col">
                        <div class="card bg-card-gradient p-3">
                            <div class="text-effect">
                                <span class="text-big">{{ $item->description }}</span>
                            </div>
                            <div class="card-body text-center py-0">
                                @if(!empty($item->image))
                                <img src="{{ Voyager::image($item->image) }}" class="img-fluid mb-3" alt="...">
                                @else
                                <img src="{{ asset('images/award/' . $item->description . '.svg') }}" class="img-fluid mb-3" alt="...">
                                @endif
                                <p class="text-base text-gold-gradient">
                                    {{ $item->title }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
                <div class="text-center mt-5">
                <a href="/about" class="btn btn-iconic-secondary text-white d-inline-flex py-2">KNOW MORE</a>
                </div>
            </div>
        </div>
    </div>