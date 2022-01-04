@extends('layouts.master')

@section('title', 'Home')

@section('header')
<div class="container header-content">
    <div class="row h-100 justify-content-md-center align-items-center">
        <div class="col-md-6 col-4 text-md-end text-center order-md-2 mb-5">
            @if(!empty(setting('site.logo')))
            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ config('app.name') }}" class="img-fluid w-75">
            @else
            <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="img-fluid w-75">
            @endif
        </div>
        <div class="col-md-6 mb-5">
            <div class="mb-5">
                <p class="text-subheading">
                    INDIA’S ICONIC TOP 100
                </p>
                <p class="h2 text-gold-gradient">
                    A PLATFORM FOR ALL MAKEUP ARTISTS IN INDIA
                </p>
                <p class="text-subheading">
                    For the First time in the History of India- If you think you deserve to be in TOP 100.
                </p>
            </div>
            <div class="d-md-flex">
                @if(setting('site.registration'))
                <a href="#enroll" class="btn btn-iconic-primary text-black px-5 me-md-3 mb-3 mb-md-0">ENROLL NOW</a>
                @else
                <a href="enroll" class="btn btn-iconic-primary text-black px-5 me-md-3 mb-3 mb-md-0">ENROLL NOW</a>
                @endif
                <a href="about" class="btn btn-iconic-secondary text-white">KNOW MORE ABOUT ICONIC</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section id="about" class="bg-surface-1">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'about-iconic')->first()])
</section>
<section id="mua" class="bg-gold-gradient">
    @include('snippets.mua')
</section>
<section id="whatyouget" class="bg-surface-0">
    @include('snippets.homeaward')
</section>
<section id="celebrities" class="bg-gold-gradient">
    @include('snippets.homeceleb')
</section>
<section id="howitworks" class="bg-surface-2">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'how-it-works')->first()])
</section>
<section id="whocanapply" class="bg-surface-0">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'who-can-apply')->first()])
</section>
<section id="clients" class="bg-surface-1">
    @include('snippets.homelogo', ['isbodyHide' => true])
</section>
@if($blogs->count() > 0)
<section id="blogs" class="bg-surface-2">
    @include('snippets.homenews')
</section>
@endif
<section id="faq" class="bg-surface-0">
    @include('snippets.accordion')
</section>
<section id="enroll" class="bg-gold-gradient">
    @include('snippets.enroll')
</section>
@endsection

@section('customcss')
<style>
    #header {
        background-color: #080808;
        min-height: 100vh;
    }
    
    @media (min-width: 768px) {
        .header-content {
            height: 85vh;
        }   
    }
    
    .mobile-logo {
        display: none;
    }
    
    .exclusiveSwiper img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }
    .celebSwiper img,
    .celebSwiper video {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }
    
    #play-animation {
        cursor: pointer;
    }
    
    #play-animation svg {
        height: 72px;
        width: 72px;
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
    
    $(function() {
        var swiperArticle = new Swiper(".articleSwiper", {
            slidesPerView: 'auto',
            spaceBetween: 20,
        });
        var swiperExclusive = new Swiper(".exclusiveSwiper", {
            slidesPerView: 'auto',
            spaceBetween: 30,
        });
        var swiperCeleb = new Swiper(".celebSwiper", {
            slidesPerView: 'auto',
            centeredSlides: true,
            autoHeight: true,
            loop: true,
            lazy: true,
            spaceBetween: 30,
        });
        
        var lazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy",
        });
        
        if (lazyLoadInstance) {
            console.log("our lazy content is ready");
            lazyLoadInstance.update();
        }
        
        swiperCeleb.on('slideChangeTransitionEnd', function() {
            $('.swiper-slide video').each(function () {
                if ($(this).parents('.swiper-slide').hasClass('swiper-slide-active')) {
                    this.play();
                    $(this).siblings('#play-animation').find('svg#play').hide();
                    $(this).siblings('#play-animation').find('svg#pause').show();
                } else {
                    this.pause();
                    $(this).siblings('#play-animation').find('svg#play').show();
                    $(this).siblings('#play-animation').find('svg#pause').hide();
                }
            });
        });
    
        $(window).scroll(function() {
            $('.swiper-slide video').each(function () {
                if (!isVisible($(this))) {
                    this.pause();
                    $(this).siblings('#play-animation').find('svg#play').show();
                    $(this).siblings('#play-animation').find('svg#pause').hide();
                }
            });
        });
        
        $('.swiper-slide').find('video').on('ended',function(){
            swiperCeleb.slideNext();
        });
        
        $('.swiper-slide').find('video').on('play',function(){
            $(this).siblings('#play-animation').find('svg#pause').fadeOut();
        });
        
        $('button#play-animation').click(function(){
            var video = $(this).siblings('video').get(0);
            if ( video.paused ) {
                video.play();
                swiperCeleb.slideTo(swiperCeleb.clickedIndex);
                swiperCeleb.update();
                $(this).find('svg#play').hide();
                $(this).find('svg#pause').show();
            } else {
                video.pause();
                $(this).find('svg#play').show();
                $(this).find('svg#pause').hide();
            }
        });
    });
</script>
@endsection
