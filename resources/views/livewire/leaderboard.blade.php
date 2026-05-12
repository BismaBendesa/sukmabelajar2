<div class="max-w-[1024px] mx-auto px-4 py-6">

    {{-- Title --}}
    <div class="mb-6">
        <h1 class="font-display text-4xl">
            Leaderboard Kelas
        </h1>

        <p class="font-merriweather text-neutral-600 mt-2">
            Ranking berdasarkan jumlah modul selesai,
            rata-rata nilai, dan waktu penyelesaian tercepat.
        </p>
    </div>

    {{-- Leaderboard Table --}}
    <div class="bg-neutral-100 rounded-xl overflow-hidden shadow-md hidden sm:block">

        {{-- Table Header --}}
        <div class="grid grid-cols-5 bg-primary-300 text-white font-display text-lg px-4 py-3">
            <div>Rank</div>
            <div>Nama</div>
            <div>Selesai</div>
            <div>Rata-rata</div>
            <div>Waktu</div>
        </div>

        {{-- Table Body --}}
        @forelse($leaderboard as $player)

            @php
                $isCurrentUser = auth()->id() === $player->user->id;

                $rankColor = match($player->rank) {
                    1 => 'text-additional-gold',
                    2 => 'text-additional-silver',
                    3 => 'text-additional-bronze',
                    default => 'text-neutral-800'
                };

                $rankIcon = match($player->rank) {
                    1 => '🥇 #1',
                    2 => '🥈 #2',
                    3 => '🥉 #3',
                    default => '#' . $player->rank
                };
            @endphp

            <div
                class="
                    grid grid-cols-5 items-center
                    px-4 py-4 border-b border-neutral-300
                    font-merriweather
                    {{ $isCurrentUser ? 'bg-primary-50' : 'bg-neutral-100' }}
                "
            >

                {{-- Rank --}}
                <div class="font-display text-2xl {{ $rankColor }}">
                    {{ $rankIcon }}
                </div>

                {{-- Username --}}
                <div class="flex flex-col">
                    <span class="
                        font-display text-lg
                        {{ $isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}
                    ">
                        {{ $player->user->username }}
                    </span>

                    @if($isCurrentUser)
                        <span class="text-xs text-primary-300">
                            Kamu
                        </span>
                    @endif
                </div>
                
                {{-- Completion Count --}}
                <div class="{{ $isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}">
                    {{ $player->completion_count .'/' . $moduleCount }}
                    modul
                </div>

                {{-- Average Score --}}
                <div class="font-display text-xl {{ $isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}">
                    {{ round($player->average_score) }}
                </div>

                {{-- Time --}}
                <div class="text-sm {{ $isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}">
                    {{ $player->submitted_at?->translatedFormat('d M Y H:i') }}
                </div>

            </div>

        @empty

            <div class="p-8 text-center">
                <p class="font-display text-xl text-neutral-500">
                    Belum ada data leaderboard.
                </p>
            </div>

        @endforelse

    </div>


    {{-- Leaderboard Table Mobile Ver --}}
    <!-- Mobile: Card, Desktop: Table Row -->
    <div class="block sm:hidden pb-24">
        @foreach ($leaderboard as $player)
            @php
                    $isCurrentUser = auth()->id() === $player->user->id;

                    $rankColor = match($player->rank) {
                        1 => 'text-additional-gold',
                        2 => 'text-additional-silver',
                        3 => 'text-additional-bronze',
                        default => 'text-neutral-800'
                    };

                    $rankIcon = match($player->rank) {
                        1 => '🥇 #1',
                        2 => '🥈 #2',
                        3 => '🥉 #3',
                        default => '#' . $player->rank
                    };
                @endphp
        <div class="flex items-center justify-between p-4 mb-2 rounded-xl border
                    {{ $player->isCurrentUser ? 'bg-primary-50 border-primary-300 shadow-lg ' : 'bg-white border-gray-200' }}">
            
            <!-- Left: Rank + Name -->
            <div class="flex items-center gap-3">
                <span class="w-12 font-display text-xl {{$rankColor}}">{{$rankIcon}}</span>
                <div>
                    <p class="font-display text-xl {{ $player->isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}">{{ $player->user->username  }}</p>
                    @if ($player->isCurrentUser)
                        <span class="text-xs text-blue-500 font-merriweather">Kamu</span>
                    @endif
                </div>
            </div>

            <!-- Right: Stats -->
            <div class="text-right text-sm font-merriweather text-gray-600 space-y-1">
                <div class="font-display text-lg text-neutral-900 {{ $player->isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}">📘 {{ $player->completion_count ."/" . $moduleCount}} modul</div>
                <div class="font-display text-xl text-neutral-900 {{ $player->isCurrentUser ? 'text-primary-300' : 'text-neutral-900' }}">⭐ {{ round($player->average_score) }}</div>
                <div class=" text-xs text-neutral-600">🕐 {{ \Carbon\Carbon::parse($player->submitted_at)->format('d M Y H:i') }}</div>
            </div>

        </div>
        @endforeach
    </div>

</div>