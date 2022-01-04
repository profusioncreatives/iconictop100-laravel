<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    @yield('meta')
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title') | {{ setting('site.title') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @yield('customcss')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        {!! menu('header', 'snippets.navbar') !!}
        {!! menu('header', 'mobile.navbar') !!}
        @yield('header')
    </div>
    @yield('content')
    <div id="footer" class="bg-black">
        {!! menu('header', 'snippets.footer') !!}
        @yield('footer')
    </div>
    
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.4.0/dist/lazyload.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    $(function() {
        $('body').append('<svg style="position: fixed;"><defs><linearGradient id="lineargradient" x1="6.29431e-08" y1="7.33653" x2="24.7998" y2="7.7668" gradientUnits="userSpaceOnUse"><stop stop-color="#FFD873" /><stop offset="0.334389" stop-color="#FCC260" /><stop offset="0.65303" stop-color="#FEF4A4" /><stop offset="1" stop-color="#DFB65C" /></linearGradient></defs></svg>');
        $('.icon-gold-gradient .iconify path').attr('fill', 'url(#lineargradient)');
        $('footer a').hover(
            function () {
                $('.iconify path', this).attr('fill', 'url(#lineargradient)');
            }, 
            function () {
                $('.iconify path', this).attr('fill', 'currentColor');
            }
        );
        $('#contactform select option:first').attr({
            'disabled': true,
            'hidden': true
        });
    });
    </script>
    @yield('customjs')
</body>

</html>
