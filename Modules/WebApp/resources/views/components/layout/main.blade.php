<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <title>Huy Tran - Viết về Laravel, PHP và Javascript</title>
    <meta charset="utf-8">
    <meta
        name="description"
        content="Khám phá các hướng dẫn, mẹo và thông tin chuyên sâu về Laravel, PHP và Javascript. Luôn cập nhật các xu hướng mới nhất, các phương pháp hay nhất và kỹ thuật mã hóa để xây dựng các ứng dụng web hiện đại."
    >
    <meta name="keywords" content="Laravel,PHP,Javascript,Blog">
    <meta name="author" content="hygo.tran@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta
        http-equiv="Content-Security-Policy"
        content="default-src 'self' 'unsafe-eval' ws:; img-src http: https: data: 'self'; child-src 'self' https:; style-src 'self' 'unsafe-inline' fonts.googleapis.com http:; script-src 'self' 'unsafe-inline' 'unsafe-eval' player.vimeo.com http:; font-src fonts.gstatic.com data:; form-action 'none'"
    />

    @yield('head')

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <tallstackui:script/>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-gray-800 dark:bg-black dark:text-gray-400">
<x-ts-toast/>

<div>
    <x-bg:ui::layout.header/>

    <div class="container mx-auto max-w-screen-lg p-4">
        @yield('pageContent')
    </div>

    <x-bg:ui::layout.footer/>
</div>
@livewireScripts
</body>
</html>
