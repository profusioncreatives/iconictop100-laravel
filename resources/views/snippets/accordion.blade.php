<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">FAQs?</h2>
                <span class="text-big">FAQs?</span>
            </div>
        </div>
        <div class="col-12 mb-5">
            <div class="accordion" id="accordion">
                @foreach($groups->where('category', '=', 'faqs')->where('featured', '=', '1') as $group)
                @foreach($elements->where('group', '=', $group->slug) as $item)
                <div class="accordion-item">
                    @if ($loop->first)
                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $item->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $item->id }}">
                            {{ $item->title }}
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse show"
                        aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            {!! $item->description !!}
                        </div>
                    </div>
                    @else
                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $item->id }}" aria-expanded="false"
                            aria-controls="collapse{{ $item->id }}">
                            {{ $item->title }}
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            {!! $item->description !!}
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>