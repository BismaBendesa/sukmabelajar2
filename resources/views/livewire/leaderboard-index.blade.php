<div class="max-w-[1024px] mx-auto px-4 py-6 pb-32">

    {{-- Title --}}
    <div class="mb-6">
        <h1 class="font-display text-4xl text-primary-300">
            Leaderboard
        </h1>

        <p class="font-merriweather text-neutral-600 mt-2">
            Pilih kelas untuk melihat ranking peserta.
        </p>
    </div>

    {{-- Class Cards --}}
    <div class="flex flex-col gap-4">

        @foreach($classes as $class)

            <a
                href="{{ route('leaderboard.class', [
                    'slug' => $class->slug
                ]) }}"
                class="block"
            >

                <div class="bg-neutral-100 rounded-xl border border-neutral-300 p-5 shadow-module-card hover:translate-y-[-2px] transition-all duration-200">

                    <div class="flex items-center justify-between">

                        <div>
                            <h2 class="font-display text-2xl text-primary-400">
                                {{ $class->name }}
                            </h2>

                            <p class="font-merriweather text-sm text-neutral-600 mt-1">
                                {{ $class->modules_count }} modul
                            </p>
                        </div>

                        {{-- Trophy Icon --}}
                        <div>
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 21H16M12 17V21M7 4H17V8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8V4ZM7 5H4V7C4 8.65685 5.34315 10 7 10M17 5H20V7C20 8.65685 18.6569 10 17 10" stroke="#5AA9B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                    </div>

                </div>

            </a>

        @endforeach

    </div>

</div>