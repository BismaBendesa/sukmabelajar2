<div
    x-data="{ open: false }"
    x-on:open-modal.window="open = true"
    x-on:close-modal.window="open = false"
>
    <template x-if="open">
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            {{-- overlay --}}
            <div 
                class="absolute inset-0 bg-black/50" 
                @click="open = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                >
            </div>
            
            {{-- floating illustration --}}
            <img 
                src="{{asset('images/sugma-hi.png')}}" 
                alt="Sugma Hi" 
                class="absolute z-10 top-[130px]"
                x-transition:enter="transition ease-out duration-300 delay-100"
                x-transition:enter-start="opacity-0 translate-y-6 scale-90"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                >
            {{-- modal --}}
            <div 
                class="bg-primary-300 rounded-lg w-full max-w-md p-6 relative z-50 bottom-0"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200"    
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                >
                <h2 class="text-2xl text-neutral-100 font-display mb-2 text-center tracking-wider">Gabung Kelas Baru</h2>
                <p class="font-merriweather font-light text-sm/6 text-neutral-100 mb-4 text-center">Untuk menambahkan kelas baru, anda harus memasukan kode kelas. Mintalah kode kelas pada dosen</p>

                <input
                    wire:model.defer="classCode"
                    class="w-full border rounded-md px-3 py-2 font-display text-center text-neutral-100 text-xl tracking-wider"
                    placeholder="Kode kelas..."
                />
                @error('classCode')
                    <p class="text-sm text-red-200 mt-1 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <div class="flex justify-center gap-2 mt-6">
                    <button wire:click="confirm" class="bg-neutral-100 text-primary-300 py-2 px-6 font-display rounded-md tracking-wide active:translate-y-1">Konfirmasi</button>
                </div>
            </div>
        </div>
    </template>
</div>
