<div class="">

    <div class="bg-primary-400 px-4 text-neutral-100 pt-6 py-12">
        {{-- Nama Kelas --}}
        <h1 class="text-4xl mb-2 font-display tracking-wider">{{ $this->data['nama_kelas'] ?? 'Nama Kelas Tidak Ditemukan' }}</h1>
        {{-- Deskripsi Kelas --}}
        <p class="mb-4 font-merriweather font-light text-sm/7 ">{{ $this->data['deskripsi'] ?? 'Deskripsi Kelas Tidak Ditemukan' }}</p>
        {{-- Kode Kelas --}}
        <div
            class="text-sm flex items-center font-merriweather cursor-pointer select-none"
            x-data="{ copied: false }"
            @click="
                navigator.clipboard.writeText('{{ $this->data['kode_kelas'] ?? '' }}');
                copied = true;
                setTimeout(() => copied = false, 1500);
            "
        >
            Kode Kelas :
            <div class="underline flex items-center font-bold ml-1 gap-1">
                {{ $this->data['kode_kelas'] ?? 'Kode Kelas Tidak Ditemukan' }}

                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.86465 3.69971C6.27573 3.69971 6.67065 3.86313 6.96133 4.15381L9.1459 6.33838C9.43658 6.62906 9.6 7.02397 9.6 7.43506V11.5503C9.59979 12.4061 8.90602 13.1 8.05019 13.1001H3.1498C2.29398 13.1 1.60021 12.4061 1.6 11.5503V5.24951C1.60021 4.39371 2.29398 3.69981 3.1498 3.69971H5.86465ZM8.66543 0.899902L8.81875 0.907715C9.1734 0.943043 9.5069 1.09978 9.76113 1.354L11.9457 3.53857C12.2364 3.82925 12.3998 4.22417 12.3998 4.63525V8.74951C12.3998 9.60555 11.706 10.3003 10.85 10.3003H9.6498V7.43506C9.6498 7.01071 9.48111 6.60328 9.18105 6.30322L6.99648 4.11865C6.69643 3.81859 6.28899 3.6499 5.86465 3.6499H4.3998V2.44971C4.39991 1.59389 5.09381 0.900113 5.94961 0.899902H8.66543Z" stroke="white"/>
                </svg>


                {{-- feedback --}}
                <span
                    x-show="copied"
                    x-transition
                    class="ml-2 text-xs text-neutral-100"
                >
                    Berhasil disalin!
                </span>
            </div>
        </div>

    </div>

    {{-- course list --}}
</div>
