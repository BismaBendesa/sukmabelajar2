<div>
        {{-- TAMPILAN JIKA KELAS ADA --}}
        <div class="p-4 rounded-md mt-2 border border-neutral-300 shadow-card bg-neutral-100 {{ $class ? '' : 'mt-6' }}">
            <div class="flex gap-4 items-start mb-2 justify-between">
                <div>
                    <h2 class="font-display text-xl">{{ $class['name'] ?? 'Nama Kelas' }}</h2>
                    <p class="font-merriweather text-xs/5 font-light">{{ Str::limit($class['description'] ?? 'Deskripsi Kelas Tidak Ditemukan', 100) }}</p>
                </div>
                <span class="font-merriweather font-light text-xs">{{ $class['progress'] ?? 10 }}%</span>
            </div>

            {{-- Progress Bar --}}
            <div class="w-full bg-gray-200 rounded-full h-3 min-w-[70px] mb-4">
                <div class="h-3 rounded-full transition-all bg-primary-300" style="width: {{ $class['progress'] ?? 10 }}%"></div>
            </div>
            
            <div class="flex items-center justify-between font-merriwather">
                <div class="text-sm">
                    <span class="font-display text-primary-300 tracking-wider text-base">+{{ $class['total_xp'] ?? 0 }}XP</span> | Level {{ $class['level'] ?? 'Mudah' }} | Kode: {{ $class['class_code'] ?? 'KODE' }}
                </div>
                <div class="p-[2px] {{ ($class['status'] ?? 'active') === 'active' ? 'bg-success-300' : 'bg-danger-300' }} rounded-md text-xs font-merriweather px-2 text-neutral-100 font-bold">
                    {{ $class['status'] ?? 'active' }}
                </div>
            </div>
        </div>

    
</div>
