@extends('layouts.master')

@section('title')
{{ Str::title($post->title) }}
@endsection

@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">{{ $post->title }}</h2>
                <span class="text-big">{{ $post->title }}</span>
            </div>
        </div>
        <div class="col-12 mb-3">
            {!! $post->body !!}
        </div>
    </div>
</div>
@endsection

@section('meta')
<meta name="title" content="{{ $post->seo_title }}">
<meta name="description" content="{{ $post->meta_description }}">
<meta name="keywords" content="{{ $post->meta_keywords }}">
@endsection
