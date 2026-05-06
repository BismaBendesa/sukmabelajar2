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
        
        @if($showProgressBar ?? false)
            {{-- Progress Bar --}}
            <div class="max-w-[1024px] h-2 bg-gray-200 rounded-full mx-4 md:mx-auto mt-4">
                <div 
                    class="h-2 bg-blue-500 rounded-full transition-all"
                    style="width: {{ $progress ?? 3 }}%">
                </div>
            </div>
        @endif
        <livewire:header :data="$header ?? []" />
        {{ $slot }}

        {{-- tab-bar --}}
        @if($showNavbar ?? true)
            <x-tab-bar></x-tab-bar>
        @endif
        @livewireScripts
    </body>
</html>
