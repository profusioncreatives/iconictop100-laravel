@if($item)
<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">{{ $item->title }}</h2>
                <span class="text-big">{{ $item->title }}</span>
            </div>
        </div>
        <div class="col-12 mb-3">
            @if($isbody ?? false)
            {!! $item->body !!}
            @else
            <p>{!! $item->excerpt !!}</p>
            <div class="text-center mt-5">
                <a href="/about" class="btn btn-iconic-secondary text-white d-inline-flex py-2">KNOW MORE</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endif