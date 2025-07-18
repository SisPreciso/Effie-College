<?php header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache"); header('Content-Type: text/html'); header("Clear-Site-Data: \"cache\""); ?><!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileImage" content="{{ asset('images/icon.png') }}">
    <!--title>{{ config('app.name', 'Laravel') }} {{ __(' - Inicio de sesión') }}</title-->
    <title>Effie College 2024 {{ __(' - Inicio de sesión') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,800;1,300;1,500;1,800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-new4.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('images/icon.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/icon.png') }}">
</head>
<body>
<div class="cuerpo-effie">
    <div class="card-bienvenido">
        <h2 class="card-bienvenido__title">{{ __('Bienvenido') }}
            <br>{{ __('a la Sexta Edición de') }}</h2>
        <img src="{{ asset('images/effie-college-2024.png') }}" alt=""
             width="230" style="padding: 15px">
        <p class="card-bienvenido__texto">{{ __('Si ya tienes una cuenta, ingresa tu usuario y contraseña para acceder al formulario de participación. Si aún no la tienes, te invitamos a crearla y completar el formulario de inscripción.') }}</p>
        <a href="{{ route('inscripciones') }}" class="">{{ __('Ingresa aquí a inscribirte') }}</a>
    </div>
    <div class="card-login" style="align-items:center !important;">
        <div class="card-login-container"><a href="{{ route('login') }}">
                <img src="{{ asset('images/Logo-EFFIE-PERU.png') }}"
                     class="card-login__image"></a>
            <main>
                @if(Session::has('error'))
                    <div class="span-alert">{{ Session::get('error') }}</div>
                @endif @if(session('status'))
                    <div class="span-success">{{ session('status') }}</div>
                @endif
                @yield('content')<br>
                <spam
                    style="font-size:14px">{{ __('(*) Si eres tutor o jurado, tu usuario es igual a tu correo electrónico.') }}</spam>
            </main>
        </div>
    </div>
</div>
<footer>
    <!--p>{{ __('© ') . now()->year . ' ' }} {{ config('app.name', 'Laravel') }} {{ __(' todos los derechos reservados | Desarrollado por ') }}
        <a href="http://preciso.pe/">{{ __('Preciso Agencia de contenidos') }}</a></p-->
        <p>{{ __('© ') . now()->year . ' ' }} Effie College 2024 {{ __(' todos los derechos reservados | Desarrollado por ') }}
        <a href="http://preciso.pe/">{{ __('Preciso Agencia de contenidos') }}</a></p>
</footer>
</body>
</html>
