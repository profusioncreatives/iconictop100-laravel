@if(!isset($innerLoop))
<div class="container-xl d-none d-md-block">
    <header class="d-flex align-items-center flex-wrap justify-content-center py-3 mb-4">
        <a href="{{ config('app.url') }}" class="mb-3 mb-md-0 me-md-auto">
            @if(!empty(setting('site.logo')))
            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ config('app.name') }}">
            @else
            <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}">
            @endif
        </a>
        <ul class="nav">
@else
<ul class="{{ $dropdownClass }}" aria-labelledby="{{ $dropdownId }}">
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

        $listItemClass = null;
        $linkItemClass = null;
        $linkAttributes =  null;
        $icon = null;
        $menuId = 'menu' . $originalItem->id;

        // With Children Attributes
        if(!$originalItem->children->isEmpty()) {
            $linkAttributes =  'data-bs-toggle="dropdown" aria-expanded="false"';
            if(isset($innerLoop)) {
                $linkItemClass = 'dropdown-item';
                $dropdownClass = 'submenu dropdown-menu';
            } else {
                $listItemClass = 'nav-item dropdown';
                $linkItemClass = 'nav-link text-caption dropdown-toggle';
                $dropdownClass = 'dropdown-menu';
            }
        } else {
            if(isset($innerLoop)) {
                $linkItemClass = 'dropdown-item';
            } else {
                $listItemClass = 'nav-item';
                if($item->icon_class == 'btn') {
                    $linkItemClass = 'btn text-caption btn-iconic-primary-outline m-0 ms-lg-3';
                } else if(url($item->link()) == url()->current()){
                    $linkItemClass =  'nav-link text-caption active';
                } else {
                    $linkItemClass = 'nav-link text-caption';
                }
            }
        }

    @endphp
    <li class="{{ $listItemClass }}">
            <a href="{{ url($item->link()) }}" id="{{ $menuId }}" class="{{ $linkItemClass }}" target="{{ $item->target }}" {!! $linkAttributes ?? '' !!}>
                {{ $item->title }}
            </a>
            @if(!$originalItem->children->isEmpty())
                @include('snippets.navbar', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true, 'dropdownId' => $menuId, 'dropdownClass' => $dropdownClass])
            @endif
        </li>
@endforeach

@if(!isset($innerLoop))
        </ul>
    </header>
</div>
@else
</ul>
@endif