<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой сайт на Tailwind</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/main.js'])
    @endif
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

@include('layouts.template.header')

@yield('content')

@include('layouts.template.footer')

</body>
</html>
