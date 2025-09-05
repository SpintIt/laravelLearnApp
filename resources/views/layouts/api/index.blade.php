<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Vue Notus by Creative Tim | Free and Open Source UI Kit
    </title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="text-blueGray-700 antialiased">
<noscript>
    <strong
    >We're sorry but vue-notus doesn't work properly without JavaScript
        enabled. Please enable it to continue.</strong
    >
</noscript>
<div id="app"></div>
</body>
</html>
