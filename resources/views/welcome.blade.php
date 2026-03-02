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
        <link href="{{asset('/css/app.css')}}" rel="stylesheet"/>
    @else
        @vite('resources/css/app.css')
    @endif

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


        *, :after, :before {
            box-sizing: border-box;
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }
    </style>
    {{--    @vite('resources/css/app.css')--}}
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
