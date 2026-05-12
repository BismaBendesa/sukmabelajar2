<div class="pb-30   ">
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="px-4 max-w-[1024px] m-auto">
    <div class="bg-neutral-200 text-2xl font-display text-primary-400 p-4 rounded-md">
        <span class="uppercase">
            {{$module->type}}:
        </span> 
        <span class="capitalize">
            {{$module->title}}
        </span>
    </div>

    {{-- Module Config Data --}}
    <div class="relative">
        <table class="w-full font-merriweather mt-4 text-sm">
            <tr class="border-b border-neutral-400">
                <td class="py-4">Status </td>
                <td>Belum Selesai</td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Durasi </td>
                <td>
                    @if($module->type === 'materi')
                    {{ $module->material?->duration_minutes ?? '-' }} menit
                    @else
                    {{ $module->test?->time_limit_minutes ?? '-' }} menit
                    @endif
                </td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Jumlah {{$module->type !== 'materi' ? 'Soal' : 'Halaman'}}</td>
                <td>{{ $module->pages->count() }} {{ $module->type !== 'materi' ? 'soal' : 'halaman' }}</td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Tipe </td>
                <td class="uppercase font-bold">{{$module->type}}</td>
            </tr>
            {{-- Status must be displayed at both material and test so I need to add it on the module table. --}}
            @if($module->type !== 'materi')
                <tr class="border-b border-neutral-400">
                    <td class="py-4">KKM </td>
                    <td>{{ $module->test?->minimum_pass_score ?? '-' }}</td>
                </tr>
                <tr class="border-b border-neutral-400">
                    <td class="py-4">Maksimal Percobaan </td>
                    <td>{{ $module->test?->max_attempt ?? '-' }} kali</td>
                </tr>
            @endif
        </table>
        @if ($gagal)
            <img src="{{asset('images/stempel-tidak-lulus.png')}}" alt="lulus" class="absolute top-[-100px] right-[-20px]">
        @elseif ($lulus)
            <img src="{{asset('images/stempel-lulus.png')}}" alt="lulus" class="absolute top-[-100px] right-[-20px]">
        @else
            <img src="{{asset('images/stempel-belum-buat.png')}}" alt="belum buat" class="absolute top-[-100px] right-[-20px]">
        @endif
    </div>

    {{-- Test rules if the module is a test --}}
    @if($module->type !== 'materi')
        <div class="mt-6 p-4 bg-neutral-200 rounded-md">
            <h2 class="font-display text-2xl text-primary-400">Aturan Pengerjaan <span class="uppercase">{{$module->type}}</span></h2>
            <ul class="list-disc list-inside mt-4 font-merriweather text-neutral-800">
                <li>Kerjakan dengan jujur tanpa bantuan siapapun.</li>
                <li>Pastikan koneksi internet stabil selama mengerjakan.</li>
                <li>Waktu pengerjaan maksimal 30 menit.</li>
                <li>Nilai di bawah 70 dianggap belum lulus.</li>
            </ul>
            <h2 class="font-display text-2xl text-primary-400 mt-6">Larangan</h2>
            <ul class="list-disc list-inside mt-4 font-merriweather text-neutral-800">
                <li>Dilarang membuka tab browser lain selain tab test. Silahkan di tutup dulu sebelum menjawab test.</li>
                <li>Dilarang menggunakan AI Chatbot.</li>
                <li>Kerjakan test secara mandiri dan dilarang berkerjasama. </li>
                <li>Jika terbukti melakukan kecurangan, maka akan ada konsekuensi nilai.</li>
            </ul>
        </div>
    @endif
    {{-- Leaderboard --}}
    @if(count($leaderboard) != 0)
    <div class="mt-8">
        <h2 class="font-display text-2xl text-primary-400 my-4">Leaderboard Perankingan</h2>
        <table class="w-full bg-neutral-100">
            <tr class="font-display text-base text-left">
                <th class="py-2 mb-2 tracking-wider font-normal">Rank</th>
                <th class="py-2 mb-2 tracking-wider font-normal">Nama</th>
                <th class="py-2 mb-2 tracking-wider font-normal">Skor</th>
                <th class="py-2  mb-2 tracking-wider font-normal">Tanggal</th>
                <th class="py-2  mb-2 tracking-wider font-normal">Jam</th>
            </tr>
            <tbody class="font-merriweather text-sm">
            @foreach($leaderboard as $player)
            @php
                $isCurrentUser = $player->user_id === auth()->id();
            @endphp
            <tr 
                class="
                {{ $isCurrentUser 
                    ? 'bg-primary-50 border-l-4 border-primary-300 text-primary-300' 
                    : 'border-b border-neutral-300'
                }}
            ">
                <td class="font-display text-2xl py-2 pl-2">
                    @if($player->rank === 1)
                        <span class="text-additional-gold">🥇 #1</span>

                    @elseif($player->rank === 2)
                        <span class="text-additional-silver">🥈 #2</span>

                    @elseif($player->rank === 3)
                        <span class="text-additional-bronze">🥉 #3</span>

                    @else
                        <span class="text-neutral-400">#{{ $player->rank }}</span>
                    @endif
                </td>
                <td class="py-2 font-merriweather">{{ $player->user->username }}</td>
                <td class="py-2 font-merriweather">{{ $player->score }}</td>
                <td class="py-2 font-merriweather">{{ $player->created_at->translatedFormat('d M Y') }}</td>
                <td class="py-2 font-merriweather">{{ $player->created_at->format('H:i') }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif

    {{-- History Record --}}
    @if($historyRecord)
        <div class="mt-6">
            <h2 class="font-display text-2xl text-primary-400">Riwayat Pengerjaan Modul</h2>
            <div class="flex items-center gap-4 my-2">
                <div class="flex items-center gap-2">
                    <div class="bg-primary-400 w-2 h-2 rounded full"></div>
                    <span class="text-sm">Lulus</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="bg-danger-300 w-2 h-2 rounded full"></div>
                    <span class="text-sm">Tidak Lulus</span>
                </div>
            </div>
            <div class="text-neutral-900 bg-neutral-100 rounded-md mt-4">
                {{-- Nilai under kkm = text-red else text-green --}}
                <table class="w-full bg-neutral-100">
                    <tr class="font-display text-base text-left bg-neutral-200 text-primary-400">
                        <th class="p-2 mb-2 tracking-wider font-normal">No</th>
                        <th class="p-2 mb-2 tracking-wider font-normal">Tanggal</th>
                        <th class="p-2 mb-2 tracking-wider font-normal">Jam</th>
                        <th class="p-2 mb-2 tracking-wider font-normal">Nilai</th>
                    </tr>
                    <tbody class="font-merriweather text-sm">
                        @foreach ($history as $item)
                            @php
                                $isPass = $module->type !== 'materi'
                                    ? $item->score >= ($module->test?->minimum_pass_score ?? 70)
                                    : $item->score >= 70;
                            @endphp

                            <tr class="font-merriweather text-sm font-light border-b border-neutral-300">
                                <td class="mr-4 p-3">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="p-3">
                                    {{ $item->created_at->translatedFormat('d F Y') }}
                                </td>

                                <td class="p-3">
                                    {{ $item->created_at->format('H:i') }}
                                </td>

                                <td class="p-3 font-bold {{ $isPass ? 'text-primary-400' : 'text-danger-300' }}">
                                    {{ $item->score }}

                                    @php
                                        $grade = match(true) {
                                            $item->score >= 89 => 'A',
                                            $item->score >= 79 => 'B',
                                            default => 'C'
                                        };
                                    @endphp

                                    ({{ $grade }})
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="mt-6 min-h-[300px]">
            <h2 class="font-display text-2xl text-primary-400">Riwayat</h2>
            <div class="text-xl text-neutral-800 font-display p-4 pl-38 bg-neutral-200 rounded-md relative mt-12">
                <span>Kamu belum pernah mengerjakan materi ini.</span>
                <img src="{{asset('images/Sugma-hehehe.png')}}" alt="" class="absolute left-0 w-[125px] top-[-40px] z-10">
            </div>
        </div>
    @endif

        {{-- Tombol Navigasi --}}
        <div class="fixed bottom-0 right-0 left-0 w-full p-4 shadow-up z-90 bg-neutral-100 pb-6">
            <a href="{{ route('modules.start', ['slug' => $module->classroom->slug, 'moduleSlug' => $module->slug]) }}" class="bg-primary-300 text-white py-2 px-4 rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-button block text-center">
                Mulai {{ $module->type === 'materi' ? 'Materi' : $module->type }}
            </a>
        </div>
    </div>
</div>
