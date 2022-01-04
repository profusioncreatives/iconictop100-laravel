@extends('layouts.master')

@section('title')
{{ Str::title($data->title) }}
@endsection

@section('content')
<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">{{ $data->title }}</h2>
                <span class="text-big">{{ $data->title }}</span>
            </div>
        </div>
        <div class="col-12 mb-3">
            {!! $data->body !!}
            @include('snippets.contact-details')
        </div>
        <div class="col-12 col-lg-4 text-center mb-3">
            <h6 class="h6 text-white">FOLLOW US ON</p>
            <div class="icon-gold-gradient border-gold-gradient">
                {!! menu('social', 'snippets.social') !!}
            </div>
        </div>
    </div>
</div>
<section id="contact" class="bg-gold-gradient">
    @include('snippets.contact')
</section>
@endsection


@section('meta')
<meta name="title" content="{{ $data->seo_title }}">
<meta name="description" content="{{ $data->meta_description }}">
<meta name="keywords" content="{{ $data->meta_keywords }}">
@endsection
