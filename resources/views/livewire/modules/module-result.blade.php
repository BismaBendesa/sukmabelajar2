@php
    $isPass = $score >= $minimumPassScore;
    // NEED FIX : Need to add minimum_pass_score to module type materi!
@endphp

<div class="max-w-xl mx-auto mt-10 text-center py-6"  style="background-image: url('{{ asset('images/background-icons.png') }}');">
    <div>
        @if ($isPass)
            <img src="{{asset('images/sugma-test-pass.png')}}" alt="Lulus test" class="mx-auto w-[200px] relative">
            <div class="mt-4 font-display text-neutral-100 bg-primary-300 inline-block p-2 rounded-full w-[100px] h-[100px] flex items-center absolute left-[60px] top-[80px]">
                <span class="text-sm block mb-[-6px]">1st</span>
                <span class="text-6xl block leading-[70px]">{{ $score }}</span> 
            </div>
            <img src="{{asset('images/stempel-lulus.png')}}" alt="Stempel Tidak Lulus" class="mx-auto w-[120px] absolute right-[60px] top-[240px]">
            @else
            <img src="{{asset('images/sugma-test-fail.png')}}" alt="Gagal test" class="mx-auto w-[200px] relative">
            <div class="mt-4 font-display text-neutral-100 bg-primary-300 inline-block p-2 rounded-full w-[100px] h-[100px] flex items-center absolute left-[60px] top-[80px]">
                <span class="text-sm block mb-[-6px]">1st</span>
                <span class="text-6xl block leading-[70px]">{{ $score }}</span> 
            </div>
            <img src="{{asset('images/stempel-tidak-lulus.png')}}" alt="Stempel Tidak Lulus" class="mx-auto w-[120px] absolute right-[60px] top-[240px]">
        @endif
    </div>

    
    <div class="mt-5">
        <h1 class="font-display text-3xl">{{$module->type}}: {{ $module->title }}</h1>
        <h1 class="text-xl capitalize font-display">{{ $module->type }} selesai !</h1>
    </div>



    <p class="mt-2 text-gray-600">
        {{ $correct }} / {{ $total }} benar
    </p>
    @if($isPass)
        <p class="text-green-500 mt-4 text-lg font-semibold">
            Lulus 🎉
        </p>
    @else
        <p class="text-red-500 mt-4 text-lg font-semibold">
            Belum Lulus 😢
        </p>
    @endif

    <div class="mt-6 flex justify-center gap-3">
        <button wire:click="retry"
            class="bg-gray-300 px-4 py-2 rounded">
            Ulangi
        </button>

        <a href="{{route('modules.show', ['slug' => $module->classroom->slug, 'moduleSlug' => $module->slug])}}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </div>
</div>