@props(['title' => 'Not Found'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') . " | " . $title }}</title>
        <link rel="shortcut icon" href="{{ asset('icon.webp') }}" type="image/x-icon">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <main class="m-[5rem]">
            {{ $slot }}
        </main>
    </body>
</html>
