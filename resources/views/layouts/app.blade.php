<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        @livewireStyles
    </head>
    <body>
        {{-- Flash Message --}}
        <x-flash type="success" timeout="2000"/>
        {{-- navbar --}}

        {{-- ganti navbar nya biar ga keliatan di module --}}
        @if($showNavbar ?? true)
            <x-navbar></x-navbar>
        @endif
        
        <livewire:header :data="$header ?? []" />
        {{ $slot }}

        {{-- tab-bar --}}
        @if($showNavbar ?? true)
            <x-tab-bar class="fixed bottom-0 right-0 left-0"></x-tab-bar>
        @endif
        @livewireScripts
    </body>
</html>
