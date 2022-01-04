@if(!isset($innerLoop))
<div class="d-md-none d-flex align-items-center flex-wrap justify-content-center p-3 mb-4">
<a href="{{ config('app.url') }}" class="mobile-logo">
            @if(!empty(setting('site.logo')))
            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ config('app.name') }}">
            @else
            <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}">
            @endif
        </a>
    <a class="btn ms-auto" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        <span class="navbar-menu-icon"></span>
    </a>
</div>
<div class="offcanvas w-100 h-100 bg-surface-n1" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button class="btn ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
            <span class="navbar-close-icon"></span>
        </button>
    </div>
    <div class="offcanvas-body">
                <ul class="list-unstyled">
@endif


@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp

@foreach ($items as $item)

    @php

        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $linkItemClass = null;
        $linkAttributes =  null;

                if($item->icon_class == 'btn') {
                    $linkItemClass = 'btn btn-iconic-primary-outline btn-14 py-2 w-100';
                } else if(url($item->link()) == url()->current()){
                    $linkItemClass =  'h5 active';
                } else {
                    $linkItemClass = 'h5';
                }

    @endphp
    <li>
      <a href="{{ url($item->link()) }}" class="{{ $linkItemClass }}" target="{{ $item->target }}">
        {{ $item->title }}
        </a>
        @if(!$originalItem->children->isEmpty())
            @include('mobile.navbar', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true])
        @endif
    </li>
@endforeach

@if(!isset($innerLoop))
                </ul>
                <div class="text-center icon-gold-gradient mt-5">
                <p class="btn-14 text-white">FOLLOW US ON</p>
                {!! menu('social', 'snippets.social') !!}
                </div>
            </div>
</div>
@endif