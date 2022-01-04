@if(!isset($innerLoop))
<footer>
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 mb-md-3 mb-5">
                <ul class="menu list-unstyled">
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
                    $linkItemClass = 'h5 text-gold-gradient';
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
            </div>
            <div class="col-md-4 text-center">
                <div class="mb-3 pb-5">
                <p class="btn-14 text-white">FOLLOW US ON</p>
                {!! menu('social', 'snippets.social') !!}
                </div>
                <p class="btn-14">LEGAL STUFF</p>
                <ul class="list-unstyled">
                    <li><a href="/legal/privacy-policy">Privacy Policy</a></li>
                    <li><a href="/legal/terms-and-conditions">Terms of services</a></li>
                </ul>
            </div>
        </div>
        <div class="row text-oveline text-center">
            <p>Developed by Digitaxperts • Powered by Taxperts System Pvt. Ltd.<br>
            &copy; 2021 Digitaxperts – All rights reserved</p>
        </div>
    </div>
</footer>
@endif
