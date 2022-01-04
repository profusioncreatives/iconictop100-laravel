<ul class="social list-inline">

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

    @endphp
    <li class="list-inline-item">
        <a href="{{ url($item->link()) }}" title="{{ $item->title }}" target="{{ $item->target }}">
            <span class="iconify fs-3" data-icon="{{ $item->icon_class }}" data-inline="false"></span>
        </a>
    </li>
    @endforeach

</ul>
