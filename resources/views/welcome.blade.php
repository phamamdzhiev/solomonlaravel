<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') УШНИ МАРКИ - СОЛОМОН</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    @if (app()->environment('production'))
        <link href="{{asset('/css/app.p36oo.css')}}" rel="stylesheet" />
    @else
        @vite('resources/css/app.css')
    @endif

    <!-- Meta Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return; n = f.fbq = function () {
                n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
            n.queue = []; t = b.createElement(e); t.async = !0;
            t.src = v; s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '3631529110323607');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=3631529110323607&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    @stack('head')
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }


        *,
        :after,
        :before {
            box-sizing: border-box;
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }
    </style>
    {{-- @vite('resources/css/app.css')--}}
</head>

<body class="font-body font-sans bg-[#F1F2F2] relative">
    @include('includes.header')
    @yield('body')
    @include('includes.footer')
    @stack('modal')

    @if (app()->environment('production'))
        <script src="{{asset('/js/app.js')}}" defer></script>
    @else
        @vite('resources/js/app.js')
    @endif
</body>

</html>
