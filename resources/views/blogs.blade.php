@extends('layouts.master')

@section('title')
Blogs
@endsection

@section('content')
<div class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">BLOGS</h2>
                <span class="text-big">BLOGS</span>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="row row-cols-1 row-cols-md-2 g-3">
                @forelse($blogs as $post)
                <div class="col mb-3">
                    <div class="card p-3 bg-surface-1">

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
                @empty
                <div class="col-md-12 text-center text-white">
                    <img src="{{ asset('images/empty-animate.svg') }}" class="img-fluid w-25 mb-3" alt="Queue">
                    <h5 class="h5" style="opacity: 0.8;">Oops! we haven't published any blogs yet </h5>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<section id="enroll" class="bg-gold-gradient">
    @include('snippets.enroll')
</section>
@endsection
