<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="msapplication-TileImage" content="{{ asset('images/icon.png') }}">
    <title>Effie College 2024</title>
    <!-- -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-new4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-effie6.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('images/icon.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/icon.png') }}">
</head>
<body>
<header class="header-propuesta">
    <div>
    </div>
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                   class="header-propuesta__button">{{ __('Cerrar sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                    @csrf
                </form>
            @endauth
        </div>
    @endif
</header>
<div id="container">
    <main>
        <div class="cuerpo-gracias">
            <header class="cuerpo-gracias__header">
                <hr class="cuerpo-gracias__line">
                <img src="{{ asset('images/effie-college-2024.png') }}" alt=""
                     width="230" style="padding: 15px">
                <hr class="cuerpo-gracias__line">
            </header>
            <div class="cuerpo-gracias__content">
                @yield('content')
            </div>
        </div>
    </main>
    {{--    <div class="pre-footer">--}}
    {{--        <div class="container">--}}
    {{--            <div class="columna columna-1">--}}
    {{--                <img src="{{ asset('images/effie1.png') }}" alt="{{ config('app.name', 'Laravel') }}"--}}
    {{--                     class="header-logo__image">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <footer>
        <!-- {{ config('app.name', 'Laravel') }} -->
        <p>{{ __('© ') . now()->year . ' ' }} Effie College 2024 {{ __(' todos los derechos reservados | Desarrollado por ') }}
            <a href="http://preciso.pe/">{{ __('Preciso Agencia de contenidos') }}</a></p>
    </footer>
</div>
</body>
</html>
