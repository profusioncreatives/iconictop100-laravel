@extends('layouts.master')

@section('title')
About Iconic
@endsection

@section('content')
<section id="about" class="bg-surface-n1">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'about-iconic')->first(), 'isbody' => true])
</section>
<section id="howitworks" class="bg-surface-2">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'how-it-works')->first(), 'isbody' => true])
</section>
<section id="whocanapply" class="bg-surface-n1">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'who-can-apply')->first(), 'isbody' => true])
</section>
<section id="whatyouget" class="bg-surface-0">
    @include('snippets.award')
</section>
<section id="celebrities" class="bg-gold-gradient">
    @include('snippets.homeceleb')
</section>
<section id="whatyouget" class="bg-surface-n1">
    @include('snippets.follow')
</section>
<section id="enroll" class="bg-gold-gradient">
    @include('snippets.enroll')
</section>
@endsection


@section('customcss')
<style>
    .celebSwiper img,
    .celebSwiper video {
            width: 100%;
    height: 250px;
        object-fit: cover;
    }
</style>
@endsection

@section('customjs')
<script>
    function isVisible($el) {
      var winTop = $(window).scrollTop();
      var winBottom = winTop + $(window).height();
      var elTop = $el.offset().top;
      var elBottom = elTop + $el.height();
      return ((elBottom<= winBottom) && (elTop >= winTop));
    }
    
     var swiperCeleb = new Swiper(".celebSwiper", {
        slidesPerView: 'auto',
        centeredSlides: true,
        autoHeight: true,
        loop: true,
        spaceBetween: 30,
    });
    
    swiperCeleb.on('slideChangeTransitionEnd', function() {
        $('.swiper-slide video').each(function () {
            if ($(this).parents('.swiper-slide').hasClass('swiper-slide-active')) {
                this.play();
            } else {
                this.pause();
            }
        });
    });

    $(window).scroll(function() {
            $('.swiper-slide video').each(function () {
                if ($(this).parents('.swiper-slide').hasClass('swiper-slide-active')) {
                    if (isVisible($(this))) {
                        this.play();
                    } else {
                        this.pause();
                    }
                } else {
                    this.pause();
                }
            });
    });
    
    $('.swiper-slide').find('video').on('ended',function(){
        swiperCeleb.slideNext();
    });
</script>
@endsection

@section('meta')
<meta name="title" content="{{ $details->where('slug', '=', 'about-iconic')->first()->seo_title }}">
<meta name="description" content="{{ $details->where('slug', '=', 'about-iconic')->first()->meta_description }}">
<meta name="keywords" content="{{ $details->where('slug', '=', 'about-iconic')->first()->meta_keywords }}">
@endsection
