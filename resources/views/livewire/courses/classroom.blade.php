<div class="max-w-[560px] md:m-auto px-4 pb-30">
    <div class="flex rounded-lg tracking-wider items-start justify-start gap-6 px-4 bg-primary-200 text-neutral-100 relative py-5 mb-10">
        <h1 class="capitalize font-display text-4xl w-[250px]">daftar list kelas</h1>
        <img src="{{asset('images/3d-daftar-kelas.png')}}" alt="Placeholder Image" class="absolute right-[-20px] top-[-10px]">
    </div>
    {{-- Tombol tambah kelas --}}
    <button 
        x-data @click="$dispatch('open-modal')"
        class="bg-primary-50 border-neutral-300 py-2 rounded-md font-display text-primary-300 px-4 w-full text-lg flex items-center justify-center gap-2 cursor-pointer active:translate-y-1 duration-300">
        Tambah Kelas
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 9V15M15 12H9M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#0064D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
    {{-- Modal join class --}}
    <livewire:modal />
    {{-- Class List --}}
    @forelse ($classData as $class)
        <livewire:class-card  :class="$class" :key="$class['id']" />
    @empty
        {{-- TAMPILAN JIKA KELAS KOSONG (EMPTY STATE) --}}
        <div class="flex items-center gap-4 relative justify-end mt-20 pl-36 align-left">
            <img src="{{ asset('images/sugma-hi-empty.png') }}" alt="sugma empty" class="absolute left-[-100px]">
            <div>
                <h4 class="font-display text-2xl text-neutral-900">Kelasnya Belum Ada nih</h4>
                <p class="text-left font-merriweather text-sm text-neutral-500 font-light">Kamu belum bergabung ke kelas manapun, Yuk sugma bantu gabung ke kelas dulu.</p>
            </div>
        </div>
    @endforelse
</div>
