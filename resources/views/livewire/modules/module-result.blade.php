<div class="max-w-xl mx-auto mt-10 text-center">

    <h1 class="font-display text-3xl">{{$module->type}}: {{ $module->title }}</h1>
    <h1 class="text-xl font-bold">Hasil Kamu</h1>

    <p class="text-6xl mt-4 font-bold text-primary-400">
        {{ $score }}
    </p>

    <p class="mt-2 text-gray-600">
        {{ $correct }} / {{ $total }} benar
    </p>

    @if($score >= 70)
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