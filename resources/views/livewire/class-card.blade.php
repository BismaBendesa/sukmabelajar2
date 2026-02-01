<div>
    @foreach ($classes as $class)
    <div class="p-4 rounded-md mt-2 border border-neutral-300 shadow-card bg-neutral-100 {{ $this->classes ? '' : 'mt-6' }}">
        @if ($class)
                <div class="flex gap-4 items-start mb-2 justify-between">
                    <div>
                        {{-- Nama Kelas --}}
                        <h2 class="font-display text-xl">{{ $class['name'] ?? 'Nama Kelas' }}</h2>
                        {{-- Deskripsi Kelas Limited --}}
                        <p class="font-merriweather text-xs/5 font-light">{{ Str::limit($class['description'] ?? 'Deskripsi Kelas Tidak Ditemukan', 100) }}</p>
                    </div>
                    <span class="font-merriweather font-light text-xs">{{ $class['progress'] ?? 10 }}%</span>
                </div>
    
                {{-- Progress Bar --}}
                <div class="w-full bg-gray-200 rounded-full h-3 min-w-[70px] mb-4">
                    <div
                        class="h-3 rounded-full transition-all bg-primary-300"
                        style="width: {{ $class['progress'] ?? 10 }}%"
                    >
                    </div>
                </div>
                
                <div class="flex items-center justify-between font-merriwather">
                    {{-- Total EXP & Level & Kode --}}
                    <div class="text-sm">
                        <span class="font-display text-primary-300 tracking-wider text-base">+{{ $class['total_xp'] ?? 0 }}XP</span> | Level {{ $class['level'] ?? 'Mudah' }} | Kode: {{ $class['class_code'] ?? 'KODE' }}
                    </div>
    
                    {{-- Status Kelas --}}
                    <div class="p-[2px] {{ $class['status'] === 'active' ? 'bg-success-300' : 'bg-danger-300' }} rounded-md text-xs font-merriweather px-2 text-neutral-100 font-bold">
                        {{ $class['status'] ?? 'active' }}
                    </div>
                </div>
                @else
                <div class="flex items-center gap-4 relative justify-end mt-10 pl-36 align-left">
                    <img src="{{ asset('images/sugma-hi-empty.png') }}" alt="sugma empty" class="absolute left-[-100px]">
                    <div>
                        <h4 class="font-display text-2xl text-neutral-900">Kelasnya Belum Ada nih</h4>
                        <p class="text-left font-merriweather text-sm text-neutral-500 font-light">Kamu belum bergabung ke kelas manapun, Yuk sugma bantu gabung ke kelas dulu.</p>
                    </div>
                </div>
        @endif
    </div>
    @endforeach
</div>
