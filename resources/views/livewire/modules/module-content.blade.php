<?php

    function getYoutubeId($url) {
        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $url, $matches);
        return $matches[1] ?? null;
    }
    $isMateri = $module['type'] === 'materi';
?>
<div>
    @php $page = $this->page; @endphp

    @if($page)

    {{-- CONTENT --}}
    <div class="max-w-[1024px] m-auto mt-4 px-4">
        @if($page['type'] === 'content')
            <div class="pb-60">
                @foreach($page['blocks'] as $block)
                    @if($block['type'] === 'heading')
                        <h2 class="text-2xl font-display tracking-wide mt-4">
                            {{ $block['content']['text'] }}
                        </h2>
                    @endif

                    @if($block['type'] === 'paragraph')
                        <p class="mt-2 text-justify">
                            {{ $block['content']['text'] }}
                        </p>
                    @endif

                    @if($block['type'] === 'image')
                        <img src="{{ $block['content']['url'] }}" class="mt-4 mx-auto">
                        <p class="text-center text-sm text-gray-500 mt-2">
                            {{ $block['content']['caption'] ?? '' }}
                        </p>
                    @endif
                    
                    {{-- @if($block['type'] === 'audio')
                    <div class="m-auto w-full">
                        <audio controls class="mt-4">
                            <source src="{{ $block['content']['url'] }}" type="audio/mpeg" class="m-auto block">
                        </audio>
                    </div>
                    @endif --}}

                    {{-- Only 1 audio per page maybe if in the future want to update, need audio material and audio explanation 
                        Audio explanation : the one that used by the lecturer to explain material.
                        Audio material : Audio that used in the material.
                    --}}
                    @if($block['type'] === 'audio')
                        <div 
                            x-data="audioPlayer('{{ asset("audio/" . $block['content']['url']) }}')" 
                            class="w-full max-w-[1024px] mx-auto bg-white rounded-t-xl shadow p-4 fixed bottom-[76px] right-0 left-0 border-t border-neutral-400 bg-neutral-100"
                        >
                            <!-- Hidden audio -->
                            <audio x-ref="audio"></audio>

                            <!-- Progress Bar -->
                            <div
                                x-ref="progressBar"
                                class="w-full h-1 bg-gray-200 rounded mb-2 cursor-pointer"
                                @click="seek($event)">
                                <div 
                                    class="h-1 bg-blue-500 rounded"
                                    :style="`width: ${progress}%`">
                                </div>
                            </div>

                            <!-- Time -->
                            <div class="flex justify-between text-xs text-gray-500 mb-2">
                                <span x-text="formatTime(currentTime)"></span>
                                <span x-text="formatTime(duration)"></span>
                            </div>

                            <!-- Controls -->
                            <div class="flex items-center justify-center gap-6">
                                <!-- Back -->
                                <button @click="rewind">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.96268 8.38229C4.85607 5.04813 8.28317 3.06949 11.6173 3.96287C12.7182 4.25784 13.6697 4.82799 14.4195 5.57928L16.0054 7.16517H13.3523C13.0072 7.16517 12.7273 7.44499 12.7273 7.79017C12.7273 8.13535 13.0072 8.41517 13.3523 8.41517H17.5128C17.6786 8.41517 17.8376 8.34931 17.9548 8.23208C18.072 8.11485 18.1379 7.95586 18.1378 7.79008V3.62967C18.1378 3.28449 17.858 3.00467 17.5128 3.00467C17.1677 3.00467 16.8878 3.28449 16.8878 3.62967V6.27981L15.3043 4.69622C14.4033 3.79365 13.2595 3.1088 11.9409 2.75546C7.93987 1.6834 3.82734 4.05777 2.75528 8.05877C2.66594 8.39218 2.8638 8.73489 3.19722 8.82423C3.53063 8.91357 3.87334 8.7157 3.96268 8.38229ZM16.8022 11.1756C16.4688 11.0862 16.1261 11.2841 16.0368 11.6175C15.1434 14.9517 11.7163 16.9303 8.3821 16.0369C7.28129 15.742 6.32979 15.1718 5.57992 14.4206L3.99501 12.8346H6.64735C6.99253 12.8346 7.27235 12.5548 7.27235 12.2096C7.27235 11.8644 6.99253 11.5846 6.64735 11.5846L2.48682 11.5846C2.14164 11.5846 1.86182 11.8644 1.86182 12.2096V16.3702C1.86182 16.7153 2.14164 16.9952 2.48682 16.9952C2.83199 16.9952 3.11182 16.7153 3.11182 16.3702V13.7192L4.69521 15.3036C5.5962 16.2063 6.73981 16.891 8.05857 17.2444C12.0596 18.3164 16.1721 15.942 17.2442 11.941C17.3335 11.6076 17.1356 11.2649 16.8022 11.1756Z" fill="#333231"/>
                                    </svg>

                                </button>

                                <!-- Play / Pause -->
                                <button @click="togglePlay" class="bg-blue-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                                    <span x-show="!isPlaying">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 5.65306C4.5 4.22693 6.029 3.32288 7.2786 4.01016L18.8192 10.3575C20.1144 11.0698 20.1144 12.9309 18.8192 13.6433L7.2786 19.9906C6.029 20.6779 4.5 19.7738 4.5 18.3477V5.65306Z" fill="white"/>
                                        </svg>
                                    </span>
                                    <span x-show="isPlaying">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 5.25C6.75 4.83579 7.08579 4.5 7.5 4.5H9C9.41421 4.5 9.75 4.83579 9.75 5.25V18.75C9.75 19.1642 9.41421 19.5 9 19.5H7.5C7.30109 19.5 7.11032 19.421 6.96967 19.2803C6.82902 19.1397 6.75 18.9489 6.75 18.75L6.75 5.25ZM14.25 5.25C14.25 4.83579 14.5858 4.5 15 4.5H16.5C16.6989 4.5 16.8897 4.57902 17.0303 4.71967C17.171 4.86032 17.25 5.05109 17.25 5.25L17.25 18.75C17.25 19.1642 16.9142 19.5 16.5 19.5H15C14.5858 19.5 14.25 19.1642 14.25 18.75V5.25Z" fill="white"/>
                                        </svg>
                                    </span>
                                </button>
                            <button @click="isMuted = !isMuted; audio.muted = isMuted">
                                <span x-show="!isMuted">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 4.0616C13.5 2.72525 11.8843 2.05599 10.9393 3.00094L6.43934 7.50094H4.50905C3.36772 7.50094 2.19106 8.16538 1.8493 9.406C1.62147 10.2331 1.5 11.1034 1.5 12.0009C1.5 12.8985 1.62147 13.7688 1.8493 14.5959C2.19106 15.8365 3.36772 16.5009 4.50905 16.5009H6.43934L10.9393 21.0009C11.8843 21.9459 13.5 21.2766 13.5 19.9403V4.0616Z" fill="#333231"/>
                                        <path d="M18.5837 5.10659C18.8766 4.81369 19.3514 4.81369 19.6443 5.10659C23.452 8.9142 23.452 15.0876 19.6443 18.8952C19.3514 19.1881 18.8766 19.1881 18.5837 18.8952C18.2908 18.6023 18.2908 18.1274 18.5837 17.8345C21.8055 14.6127 21.8055 9.38907 18.5837 6.16725C18.2908 5.87435 18.2908 5.39948 18.5837 5.10659Z" fill="#333231"/>
                                        <path d="M15.9323 7.75832C16.2252 7.46543 16.7001 7.46543 16.993 7.75832C19.3361 10.1015 19.3361 13.9005 16.993 16.2436C16.7001 16.5365 16.2252 16.5365 15.9323 16.2436C15.6394 15.9507 15.6394 15.4758 15.9323 15.1829C17.6897 13.4256 17.6897 10.5763 15.9323 8.81898C15.6394 8.52609 15.6394 8.05121 15.9323 7.75832Z" fill="#333231"/>
                                    </svg>
                                </span>
                                <span x-show="isMuted">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 4.0616C13.5 2.72525 11.8843 2.05599 10.9393 3.00094L6.43934 7.50094H4.50905C3.36772 7.50094 2.19106 8.16538 1.8493 9.406C1.62147 10.2331 1.5 11.1034 1.5 12.0009C1.5 12.8985 1.62147 13.7688 1.8493 14.5959C2.19106 15.8365 3.36772 16.5009 4.50905 16.5009H6.43934L10.9393 21.0009C11.8843 21.9459 13.5 21.2766 13.5 19.9403V4.0616Z" fill="#333231"/>
                                        <path d="M17.7803 9.2206C17.4874 8.92771 17.0126 8.92771 16.7197 9.2206C16.4268 9.51349 16.4268 9.98837 16.7197 10.2813L18.4393 12.0009L16.7197 13.7206C16.4268 14.0135 16.4268 14.4884 16.7197 14.7813C17.0126 15.0742 17.4874 15.0742 17.7803 14.7813L19.5 13.0616L21.2197 14.7813C21.5126 15.0742 21.9874 15.0742 22.2803 14.7813C22.5732 14.4884 22.5732 14.0135 22.2803 13.7206L20.5607 12.0009L22.2803 10.2813C22.5732 9.98837 22.5732 9.51349 22.2803 9.2206C21.9874 8.92771 21.5126 8.92771 21.2197 9.2206L19.5 10.9403L17.7803 9.2206Z" fill="#333231"/>
                                    </svg>
                                </span>
                            </button>
                            </div>
                        </div>
                    @endif


                    @if($block['type'] === 'video')
                    @php
                        $url = $block['content']['url'];
                        $youtubeId = getYoutubeId($url);
                    @endphp

                        @if($youtubeId)
                            <!-- YouTube -->
                            <iframe 
                                src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                                class="w-full aspect-video mt-6"
                                allowfullscreen>
                            </iframe>
                        @else
                            <!-- MP4 -->
                            <video controls class="mt-4 w-full">
                                <source src="{{ asset($url) }}" type="video/mp4">
                            </video>
                        @endif

                    @endif

                    @if($block['type'] === 'file')
                        <a href="{{ asset($block['content']['url']) }}" target="_blank" class="mt-4 inline-block text-gray-800 rounded-md" x-data="{ viewed: false }" @click="viewed = true">
                            <div
                                class="flex items-center gap-2">
                                {{-- File Icon not viewed --}}
                                <svg x-show="!viewed" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block">
                                    <path d="M19.5 14.25V11.625C19.5 9.76104 17.989 8.25 16.125 8.25H14.625C14.0037 8.25 13.5 7.74632 13.5 7.125V5.625C13.5 3.76104 11.989 2.25 10.125 2.25H8.25M10.5 2.25H5.625C5.00368 2.25 4.5 2.75368 4.5 3.375V20.625C4.5 21.2463 5.00368 21.75 5.625 21.75H18.375C18.9963 21.75 19.5 21.2463 19.5 20.625V11.25C19.5 6.27944 15.4706 2.25 10.5 2.25Z" stroke="#0F172A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                {{-- File Icon Viewed --}}
                                <svg x-show="viewed" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.5H5.625C4.58947 1.5 3.75 2.33947 3.75 3.375V20.625C3.75 21.6605 4.58947 22.5 5.625 22.5H18.375C19.4105 22.5 20.25 21.6605 20.25 20.625V12.75C20.25 10.6789 18.5711 9 16.5 9H14.625C13.5895 9 12.75 8.16053 12.75 7.125V5.25C12.75 3.17893 11.0711 1.5 9 1.5ZM15.6103 12.4359C15.8511 12.0989 15.773 11.6305 15.4359 11.3897C15.0989 11.1489 14.6305 11.227 14.3897 11.5641L11.1543 16.0936L9.53033 14.4697C9.23744 14.1768 8.76256 14.1768 8.46967 14.4697C8.17678 14.7626 8.17678 15.2374 8.46967 15.5303L10.7197 17.7803C10.8756 17.9362 11.0921 18.0156 11.3119 17.9974C11.5316 17.9793 11.7322 17.8653 11.8603 17.6859L15.6103 12.4359Z" fill="#0F172A"/>
                                    <path d="M12.9712 1.8159C13.768 2.73648 14.25 3.93695 14.25 5.25V7.125C14.25 7.33211 14.4179 7.5 14.625 7.5H16.5C17.8131 7.5 19.0135 7.98204 19.9341 8.77881C19.0462 5.37988 16.3701 2.70377 12.9712 1.8159Z" fill="#0F172A"/>
                                </svg>



                                {{$block['content']['filename'] ?? 'file 1'}}
                            </div>
                        </a>
                    @endif


                @endforeach
            </div>
        @endif
    </div>
    
    @if($page['type'] === 'question')
        <div class="px-4 max-w-[1024px] mx-auto mt-4">
            <h3 class="text-2xl my-3 font-display">
                {{ $page['question']['question_text'] }}
            </h3>

            {{-- @foreach($page['question']['options'] as $opt)
                <div class="mt-2 p-3 flex items-center gap-2 border border-neutral-400 rounded-md">
                    <input type="radio"
                        wire:model="selectedAnswer"
                        wire:click="submitAnswer"
                        value="{{ $opt['id'] }}">
                    {{ $opt['content']['text'] ?? '' }}
                </div>
            @endforeach --}}
            
            @php
                $selected = $isMateri 
                ? $selectedAnswer 
                : ($answers[$page['id']] ?? null);
                $isLocked = $isMateri && $showExplanation;
            @endphp
            @foreach($page['question']['options'] as $opt)
                <div class="mt-2 p-3 flex items-center gap-2 border border-neutral-400 rounded-md cursor-pointer"
                    {{-- @click="$wire.set(
                    '{{ $isMateri ? 'selectedAnswer' : "answers.$page[id]" }}', 
                    {{ $opt['id'] }}
                    )" --}}


                    @click="
                    @if($isMateri)
                        $wire.set('selectedAnswer', {{ $opt['id'] }});
                        $wire.submitAnswer();
                    @else
                        $wire.set('answers.{{ $page['id'] }}', {{ $opt['id'] }});
                    @endif
                "

                        :class="{
                            // ✅ TEST MODE (simple selection)
                            'bg-primary-50 border-primary-300': 
                                {{ !$isMateri ? 'true' : 'false' }} && 
                                {{ $selected ?? 'null' }} === {{ $opt['id'] }},

                            // ✅ MATERI MODE (AFTER ANSWER)
                            'bg-green-100 border-green-500': 
                                {{ $isMateri && $showExplanation ? 'true' : 'false' }} && 
                                {{ $opt['is_correct'] ? 'true' : 'false' }},

                             // ✅ MATERI WRONG (only selected wrong one)
                            'bg-red-100 border-red-500': 
                                {{ $isMateri && $showExplanation ? 'true' : 'false' }} && 
                                {{ !$opt['is_correct'] ? 'true' : 'false' }} &&
                                {{ $selected ?? 'null' }} === {{ $opt['id'] }},
                                
                            //✅ DISABLE AFTER ANSWER
                            'opacity-80 hover:cursor-not-allowed pointer-events-none ': 
                                {{ $isLocked ? 'true' : 'false' }}
                        }"

                >

                    <input type="radio"
                        name="question_{{ $page['id'] }}"
                        {{-- Shared --}}
                        value="{{ $opt['id'] }}"

                        {{-- ✅ MATERI --}}
                        @if($isMateri)
                            wire:model="selectedAnswer"
                            wire:click="submitAnswer"
                        @else
                        {{-- ✅ TEST --}}
                            wire:model="answers.{{ $page['id'] }}"
                        @endif
                    >

                    {{ $opt['content']['text'] ?? '' }}
                </div>
            @endforeach

            {{-- <button wire:click="submitAnswer"
                    class="mt-4 bg-blue-500 text-white px-4 py-2">
                Submit
            </button> --}}
            @php
                $explanationBlock = collect($page['blocks'] ?? [])
                    ->firstWhere('type', 'explanation');
            @endphp

            {{-- Explanation Materi --}}
            @if($showExplanation)
            <div class="relative mt-6">
                @if($isCorrect)
                <div class="bg-success-50 mt-4 p-2 inline-block rounded-md shadow-md ml-26 relative">
                    <h4 class="font-display text-lg tracking-wide text-success-300">Yup Benar Sekali ✅</h4>
                </div>
                @else
                    <div class="bg-danger-50  mt-4 p-2 inline-block rounded-md shadow-md ml-26 relative">
                        <h4 class="font-display text-lg tracking-wide text-danger-300">Ups, belum benar ❌</h4>
                    </div>
                @endif
                    <img src="{{asset('images/sugma-penjelasan.png')}}" alt="Penjelasan" class="absolute top-[10px] z-0">
                    <div class="mt-2 p-4 bg-primary-50 rounded-md shadow-card relative z-99 mt-6">
                        {{-- <strong>
                            {{ $isCorrect ? '✅ Benar' : '❌ Salah' }}
                        </strong> --}}
                        <h2 class="text-primary-400 font-display text-xl">Penjelasan</h2>
                        <p>
                            {{ $page['question']['explanation']['text'] ??  'Tidak ada penjelasan' }}
                        </p>
                    </div>
                </div>
            @endif
            

            {{-- Quiz navigation for non-material modules --}}
            @if($page['type'] === 'question' && $module['type'] !== 'materi')
                {{-- Loop through all pages in the current module --}}
                <div class="flex flex-wrap w-full gap-1 fixed bottom-[100px] ">
                    @foreach ($module->pages as $modulePage)
                        <button 
                        wire:key="page-{{ $modulePage->id }}"
                        wire:click="goToPage({{ $modulePage->id }})"
                        {{-- class="{{ $modulePage['id'] == $this->page['id'] ? 'border-neutral-900 border-2 shadow-xl' : 'border-neutral-400 border' }} py-2 rounded-sm bg-neutral-200 font-display text-xl inline-block text-center cursor-pointer transition-all max-w-[40px] w-full 
                        {{ in_array($modulePage['id'], $raguRagu) ? 'bg-warning-300 text-white' : 'bg-neutral-200' }}"
                        --}}
                        @class([
                            'py-2 rounded-sm font-display text-xl inline-block text-center cursor-pointer transition-all max-w-[40px] w-full',
                            
                            // border state
                            'border-neutral-900 border-2 shadow-xl' => $modulePage['id'] == $this->page['id'],
                            'border-neutral-400 border' => $modulePage['id'] != $this->page['id'],

                            // color priority
                            'bg-warning-300 text-white' => in_array($modulePage['id'], $raguRagu),
                            'bg-primary-300 text-white' => !in_array($modulePage['id'], $raguRagu) && isset($answers[$modulePage['id']]),
                            'bg-neutral-200' => !in_array($modulePage['id'], $raguRagu) && !isset($answers[$modulePage['id']]),
                        ])
                        >
                            {{ $loop->iteration }}
                        </button>
                    @endforeach 
                </div>
            @endif
        </div>
    @endif

@endif
    {{-- Navigation buttons --}}
    <div class="fixed bottom-0 right-0 left-0 w-full p-4 shadow-up flex gap-2 bg-neutral-100">
        <button wire:click="prev" class="bg-neutral-200 text-black py-2 px-2 rounded-md hover:bg-primary-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-md block text-center cursor-pointer">
            Kembali
        </button>
        @if ($module['type'] === 'materi')
            <a href="#" class="bg-primary-50 text-primary-300 py-2 px-2 rounded-md hover:bg-primary-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-md block text-center cursor-pointer">
                Pertanyaan
            </a>
        @else
            @php
                // Cek apakah ID soal saat ini ada di dalam array raguRagu
                $isRagu = in_array($page['question']['id'], $raguRagu); 
            @endphp
            <button wire:click="toggleRaguRagu({{ $page['question']['id'] }})" class="bg-warning-50 text-warning-300 py-2 px-2 rounded-md hover:bg-warning-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-warning-300 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-md block text-center cursor-pointer
                {{ $isRagu ? 'bg-warning-300 text-white' : 'bg-warning-50 text-warning-300' }}">
                Ragu-ragu
            </button>
        @endif
        <button wire:click="next" href="{{ url('/classrooms/'.$module->classroom->slug.'/modules/'.$module->slug.'/content') }}" class="bg-primary-300 text-white py-2 px-2 rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full font-display text-xl tracking-wide active:translate-y-1 duration-300 shadow-md block text-center cursor-pointer">
            Selanjutnya
        </button>
    </div>
    <script>
        function audioPlayer(src) {
            return {
                audio: null,
                isPlaying: false,
                isMuted: false,
                currentTime: 0,
                duration: 0,
                progress: 0,

                init() {
                    this.audio = this.$refs.audio;
                    this.audio.src = src;

                    this.audio.addEventListener('timeupdate', () => {
                        this.currentTime = this.audio.currentTime;
                        // this.duration = this.audio.duration;
                        // this.progress = (this.currentTime / this.duration) * 100;
                        if (this.duration > 0) {
                            this.progress = (this.currentTime / this.duration) * 100;
                        }
                    });

                    this.audio.addEventListener('ended', () => {
                        this.isPlaying = false;
                    });
                    this.audio.addEventListener('loadedmetadata', () => {
                        this.duration = this.audio.duration;
                    });
                },

                togglePlay() {
                    if (this.audio.paused) {
                        this.audio.play();
                        this.isPlaying = true;
                    } else {
                        this.audio.pause();
                        this.isPlaying = false;
                    }
                },

                rewind() {
                    this.audio.currentTime -= 10;
                },

                forward() {
                    this.audio.currentTime += 10;
                },

                // seek(e) {
                //     const width = e.target.clientWidth;
                //     const clickX = e.offsetX;
                //     this.audio.currentTime = (clickX / width) * this.duration;
                // }
                
                seek(e) {
                    if (!this.audio.duration || isNaN(this.audio.duration)) return;

                    // const rect = this.$refs.progressBar.getBoundingClientRect();
                    const rect = e.currentTarget.getBoundingClientRect();
                    const clickX = e.clientX - rect.left;

                    const percent = Math.min(Math.max(clickX / rect.width, 0), 1);

                    this.audio.currentTime = percent * this.audio.duration;
                },

                formatTime(time) {
                    if (!time) return "00:00";
                    let minutes = Math.floor(time / 60);
                    let seconds = Math.floor(time % 60);
                    return `${minutes}:${seconds.toString().padStart(2, '0')}`;
                }
            }
        }
        </script>
</div>
