@extends('layouts.master')

@php($page = $pages->where('status', '=', 'ACTIVE')->where('category', '=', 'media')->first())

@section('title')
{{ Str::title($page->title) }}
@endsection

@section('meta')
<meta name="title" content="{{ $page->seo_title }}">
<meta name="description" content="{{ $page->meta_description }}">
<meta name="keywords" content="{{ $page->meta_keywords }}">
@endsection

@section('content')
<section id="about" class="bg-surface-n1">
    @include('snippets.homelogo')
</section>

@foreach($blogs as $post)
@if($loop->iteration % 2 == 0)
    <section id="blogs" class="bg-surface-2">
@else
    <section id="blogs" class="bg-surface-1">
@endif

    <div class="container-xl py-5">
        <div class="row justify-content-center">
            <div class="col-8 mb-5 text-center">
                    <img src="{{ Voyager::image( $post->image ) }}" class="img-fluid mb-3"
                        alt="{{ $post->title }}">
                    <div class="card mb-3 bg-surface-3">
                        <div class="card-body">
                            <h4 class="text-white text-subheading mb-3">{{ $post->title }}</h4>
                            <div class="text-base text-start text-truncate-blog">
                                <p>{!! $post->excerpt !!}</p>
                            </div>
                            <div class="collapse text-base text-start mt-3" id="collapse{{ $post->id }}">
                                <p>{!! $post->body !!}</p>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-iconic-secondary text-white d-inline-flex py-2" data-bs-toggle="collapse" href="#collapse{{ $post->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $post->id }}">READ FULL ARTICLE</a>
                </div>
            </div>
        </div>
    </section>
@endforeach

<section id="contact" class="bg-gold-gradient">
    @include('snippets.contact')
</section>
@endsection

@section('customjs')
<script>
    $('.btn').click(function() {
      $(this).siblings().find('.text-truncate-blog').toggleClass('d-none');
    });
    var swiperPartner = new Swiper(".partnerSwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
        },
        breakpoints: {
            640: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 6,
            },
            1024: {
                slidesPerView: 7,
            },
        },
    });

</script>
@endsection