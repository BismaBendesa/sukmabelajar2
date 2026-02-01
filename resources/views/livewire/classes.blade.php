<div class="max-w-[560px] md:m-auto px-4">
    <div class="flex rounded-lg tracking-wider items-start justify-start gap-6 px-4 bg-primary-200 text-neutral-100 relative py-5 mb-10">
        <h1 class="capitalize font-display text-4xl w-[250px]">daftar list kelas</h1>
        <img src="{{asset('images/3d-daftar-kelas.png')}}" alt="Placeholder Image" class="absolute right-[-20px] top-[-10px]">
    </div>
    {{-- Navigasi tambah kelas --}}
    <a href="">
        <button class="bg-primary-50 border-neutral-300 py-2 rounded-md font-display text-primary-300 px-4 w-full text-lg flex items-center justify-center gap-2">
            Tambah Kelas
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 9V15M15 12H9M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#0064D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </a>
    {{-- Class List --}}
    <livewire:class-card :classes="$classData" />
</div>
