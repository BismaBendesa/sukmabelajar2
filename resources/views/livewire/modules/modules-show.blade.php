<?php
$gagal = false;
$lulus = false;

$historyRecord = true;

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
                <td class="py-4">Durasi </td>
                <td>30 menit</td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Jumlah Halaman </td>
                <td>10 halaman</td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Level </td>
                <td>Mudah</td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Tipe </td>
                <td class="uppercase font-bold">{{$module->type}}</td>
            </tr>
            <tr class="border-b border-neutral-400">
                <td class="py-4">Status </td>
                <td>Belum Selesai</td>
            </tr>
        </table>
        @if ($gagal)
            <img src="{{asset('images/stempel-belum-lulus.png')}}" alt="lulus" class="absolute top-[-100px] right-[-20px]">
        @elseif ($lulus)
            <img src="{{asset('images/stempel-lulus.png')}}" alt="lulus" class="absolute top-[-100px] right-[-20px]">
        @else
            <img src="{{asset('images/stempel-belum-buat.png')}}" alt="belum buat" class="absolute top-[-100px] right-[-20px]">
        @endif
    </div>

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
        <div class="mt-6">
            <h2 class="font-display text-2xl text-primary-400">Riwayat</h2>
            <div class="text-xl text-neutral-800 font-display p-4 pl-38 bg-neutral-200 rounded-md relative mt-12">
                <span>Kamu belum pernah mengerjakan materi ini.</span>
                <img src="{{asset('images/Sugma-hehehe.png')}}" alt="" class="absolute left-0 w-[125px] top-[-40px]">
            </div>
        </div>
    @endif

    {{-- Tombol Navigasi --}}
    <div class="absolute bottom-0 right-0 left-0 w-full p-4 shadow-up">
        <button class="bg-primary-300 text-white py-2 px-4 rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-button">
            Mulai Materi
        </button>
    </div>
    </div>
</div>
