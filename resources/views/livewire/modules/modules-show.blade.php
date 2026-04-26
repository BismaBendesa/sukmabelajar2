<?php
$gagal = false;
$lulus = false;

$historyRecord = false;

?>
<div>
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
                <td class="py-4">Jumlah Halaman </td>
                <td>{{ $module->pages->count() }} halaman</td>
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
            <img src="{{asset('images/stempel-belum-lulus.png')}}" alt="lulus" class="absolute top-[-100px] right-[-20px]">
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
    {{-- History Record --}}
    @if($historyRecord)
        <div class="mt-6">
            <h2 class="font-display text-2xl text-primary-400">Riwayat</h2>
            <div class="text-neutral-900 bg-neutral-100 rounded-md mt-4">
                {{-- Nilai under kkm = text-red else text-green --}}
                <table class="w-full bg-neutral-100">
                    <tr class="font-display font-black text-base text-left bg-neutral-200 text-primary-400">
                        <th class="p-2 mb-2 tracking-wider ">No</th>
                        <th class="p-2 mb-2 tracking-wider">Tanggal</th>
                        <th class="p-2 mb-2 tracking-wider">Jam</th>
                        <th class="p-2 mb-2 tracking-wider">Nilai</th>
                    </tr>
                    <tr class="font-merriweather text-xs font-light border-b border-neutral-400">
                        <td class="mr-4 p-3">1</td>
                        <td class="p-3">10 April 2026</td>
                        <td class="p-3">10:00 - 10.30 (30 menit)</td>
                        <td class="p-3">85 (A)</td>
                    </tr>
                    <tr class="font-merriweather text-xs font-light border-b border-neutral-400">
                        <td class="mr-4 p-3">1</td>
                        <td class="p-3">10 April 2026</td>
                        <td class="p-3">10:00 - 10.30 (30 menit)</td>
                        <td class="p-3">85 (A)</td>
                    </tr>
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
            <a href="{{ url('/classrooms/'.$module->classroom->slug.'/modules/'.$module->slug.'/content') }}" class="bg-primary-300 text-white py-2 px-4 rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-button block text-center">
                Mulai {{ $module->type === 'materi' ? 'Materi' : $module->type }}
            </a>
        </div>
    </div>
</div>
