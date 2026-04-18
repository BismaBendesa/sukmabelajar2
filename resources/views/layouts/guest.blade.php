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
      @if (request()->is('/'))
      <div class="flex justify-between items-center px-4 mt-6 max-w-[1440px] m-auto">
        <div class="flex items-center gap-2 justify-center">
          <img src="{{ asset('images/sukmabelajar2-logo.png')}}" alt="logo" class="w-24">
          {{-- <div class="font-display text-primary-300 text-xl">Sukma<span class="text-primary-200">Belajar</span></div> --}}
        </div>
        <a href="/onboarding" class="block bg-primary-400 py-2 md:px-10 px-4 rounded-sm shadow-button font-display text-neutral-100 tracking-wider text-xl">Register</a>
      </div>
      @else
        <div class="flex items-center gap-2 justify-center mt-6">
          <img src="{{ asset('images/sukmabelajar2-logo.png')}}" alt="logo" class="w-24">
          {{-- <div class="font-display text-primary-300 text-xl">Sukma<span class="text-primary-200">Belajar</span></div> --}}
        </div>
      @endif

        {{ $slot }}

        
        @livewireScripts
    </body>
</html>
