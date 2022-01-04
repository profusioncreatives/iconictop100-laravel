@extends('layouts.master')

@section('title')
FAQs
@endsection

@section('content')
<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">FAQs</h2>
                <span class="text-big">FAQs</span>
            </div>
        </div>
        @foreach($groups as $group)
        <div class="col-12 mb-5">
            @if($group->show_title)
            <div class="text-subheading text-white my-3" style="opacity: 0.4;">{{ $group->name }}</div>
            @endif
            <div class="accordion" id="accordion{{ $group->id }}">
                @foreach($elements->where('group', '=', $group->slug) as $item)
                <div class="accordion-item">
                    @if ($loop->first)
                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                            {{ $item->title }}
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $item->id }}"
                        data-bs-parent="#accordion{{ $group->id }}">
                        <div class="accordion-body">
                            {!! $item->description !!}
                        </div>
                    </div>
                    @else
                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $item->id }}" aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                            {{ $item->title }}
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $item->id }}"
                        data-bs-parent="#accordion{{ $group->id }}">
                        <div class="accordion-body">
                            {!! $item->description !!}
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
<section id="enroll" class="bg-gold-gradient">
    @include('snippets.enroll')
</section>
@endsection