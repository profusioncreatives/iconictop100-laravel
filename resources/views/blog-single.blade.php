@extends('layouts.master')

@section('title')
{{ Str::title($post->title) }}
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(../images/breadcrumb.svg);opacity: 0.8" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blogs</li>
        </ol>
    </nav>

    <div class="row py-5">
        <div class="col-12 mb-3">
            <img src="{{ Voyager::image( $post->image ) }}" alt="{{ $post->title }}" class="w-100 rounded-3">
        </div>
        <div class="col-12 mb-3">
            <p class="text-subheading">{{ $post->title }}</p>
            <p class="text-overline">Created on: {{ $post->created_at->format('j F, Y') }} | Updated on:
                {{ $post->updated_at->format('j F, Y') }}</p>
        </div>
        <hr class="bg-light mb-3">
        <div class="col-12 mb-5 text-base" style="opacity: 0.9;">
            {!! $post->body !!}
        </div>
    </div>
    @if($others)
    <div class="row row-cols-1 row-cols-md-2">
        @foreach($others as $post)
        <div class="col mb-3">
            <div class="card p-3 bg-surface-3">

                <img src="{{ Voyager::image( $post->image ) }}" class="card-img-top" alt="{{ $post->title }}">

                <div class="card-body">
                    <h4 class="text-white text-subheading mb-3">{{ $post->title }}</h4>
                    <hr class="bg-light">
                    <div class="text-base text-start text-truncate-blog">
                        <p>{!! $post->excerpt !!}</p>
                    </div>
                </div>
                <a href="/blog/{{ $post->slug }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

@section('meta')
<meta name="title" content="{{ $post->seo_title }}">
<meta name="description" content="{{ $post->meta_description }}">
<meta name="keywords" content="{{ $post->meta_keywords }}">
@endsection
