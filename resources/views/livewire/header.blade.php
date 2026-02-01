<header class="px-4 py-4 flex justify-between m-auto max-w-[560px]">
    <div class="flex items-center font-display gap-2 text-primary-400 text-xl">
        {{-- Back Button --}}
        <button>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 12L11 16M11 16L15 20M11 16H21M28 16C28 22.6274 22.6274 28 16 28C9.37258 28 4 22.6274 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" stroke="#61605E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <h3>{{ $this->data['title'] ?? 'Default Title' }}</h3>
    </div>

    {{-- Mode default no rank --}}
    @if($this->mode === 'DEFAULT')
        <div class="flex items-center">
            <span class="font-display text-lg mr-1">LV</span>
            <div class="relative z-30">
                <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9249 2.90637C16.6998 -0.524015 21.5875 -0.524015 22.3624 2.90637C22.9662 5.57862 26.0333 6.84865 28.3497 5.38586C31.3231 3.50868 34.7787 6.96424 32.9015 9.93762C31.4387 12.2541 32.7087 15.3212 35.381 15.9249C38.8114 16.6998 38.8114 21.5876 35.381 22.3624C32.7087 22.9662 31.4387 26.0333 32.9015 28.3497C34.7787 31.3231 31.3231 34.7787 28.3497 32.9015C26.0333 31.4387 22.9662 32.7087 22.3624 35.381C21.5875 38.8114 16.6998 38.8114 15.9249 35.381C15.3211 32.7087 12.2541 31.4387 9.93761 32.9015C6.96423 34.7787 3.50866 31.3231 5.38585 28.3497C6.84863 26.0333 5.5786 22.9662 2.90636 22.3624C-0.524031 21.5876 -0.524031 16.6998 2.90636 15.9249C5.5786 15.3212 6.84863 12.2541 5.38585 9.93762C3.50866 6.96424 6.96423 3.50868 9.93761 5.38586C12.2541 6.84865 15.3211 5.57862 15.9249 2.90637Z" fill="{{$this->getLevelColorVarProperty()}}" stroke="white" stroke-width="0.666667"/>
                </svg>
                <span class="text-neutral-100 text-xl font-display absolute left-[10px] top-[5px]">{{ sprintf('%02d', $this->data['level'] ?? 20) }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3 min-w-[70px] relative left-[-7px]">
                {{-- Progress Bar --}}
                <div
                    class="h-3 rounded-full transition-all  {{$this->getLevelColorClassProperty()}}"
                    style="width: {{ $this->data['xp'] ?? 10 }}%"
                >
                </div>
            </div>
    @elseif ($this->mode === 'KELAS')
    {{-- Mode Kelas --}}
        <div class="flex gap-4">
            <div class="flex items-center gap-1">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C8.17155 1 6.37729 1.14878 4.62882 1.43504C4.26621 1.4944 4 1.80774 4 2.17518V2.56172C3.17339 2.71855 2.35799 2.90717 1.55514 3.12628C1.23821 3.21277 1.01446 3.49546 1.00306 3.82378C1.00102 3.88231 1 3.94105 1 4C1 6.59485 2.97645 8.72783 5.50636 8.97591C6.27572 9.84484 7.29439 10.4898 8.45156 10.7981C8.35539 11.5844 8.11892 12.3268 7.76796 13H7.5C6.67157 13 6 13.6716 6 14.5V17H5.25C4.55964 17 4 17.5596 4 18.25C4 18.6642 4.33579 19 4.75 19H15.25C15.6642 19 16 18.6642 16 18.25C16 17.5596 15.4404 17 14.75 17H14V14.5C14 13.6716 13.3284 13 12.5 13H12.232C11.8811 12.3268 11.6446 11.5844 11.5484 10.7981C12.7056 10.4898 13.7243 9.84484 14.4936 8.97591C17.0235 8.72783 19 6.59485 19 4C19 3.94103 18.999 3.88229 18.9969 3.82378C18.9855 3.49546 18.7618 3.21277 18.4449 3.12628C17.642 2.90717 16.8266 2.71855 16 2.56172V2.17518C16 1.80774 15.7338 1.4944 15.3712 1.43504C13.6227 1.14878 11.8285 1 10 1ZM2.52524 4.42244C3.01226 4.29976 3.50395 4.18878 4 4.08984V5C4 5.73949 4.13404 6.44825 4.37906 7.10288C3.38067 6.58021 2.66567 5.58968 2.52524 4.42244ZM17.4748 4.42244C17.3343 5.58968 16.6193 6.58021 15.6209 7.10288C15.866 6.44825 16 5.73949 16 5V4.08984C16.496 4.18878 16.9877 4.29976 17.4748 4.42244Z" fill="{{$this->formattedRankData['colorVar']}}"/>
                </svg>
                <span class="font-display text-xl {{$this->formattedRankData['color']}}">{{ $this->formattedRankData['text'] }}</span>
            </div>

            {{-- Mode default no rank --}}
            <div class="flex items-center">
                <span class="font-display text-lg mr-1">LV</span>
                <div class="relative z-30">
                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.9249 2.90637C16.6998 -0.524015 21.5875 -0.524015 22.3624 2.90637C22.9662 5.57862 26.0333 6.84865 28.3497 5.38586C31.3231 3.50868 34.7787 6.96424 32.9015 9.93762C31.4387 12.2541 32.7087 15.3212 35.381 15.9249C38.8114 16.6998 38.8114 21.5876 35.381 22.3624C32.7087 22.9662 31.4387 26.0333 32.9015 28.3497C34.7787 31.3231 31.3231 34.7787 28.3497 32.9015C26.0333 31.4387 22.9662 32.7087 22.3624 35.381C21.5875 38.8114 16.6998 38.8114 15.9249 35.381C15.3211 32.7087 12.2541 31.4387 9.93761 32.9015C6.96423 34.7787 3.50866 31.3231 5.38585 28.3497C6.84863 26.0333 5.5786 22.9662 2.90636 22.3624C-0.524031 21.5876 -0.524031 16.6998 2.90636 15.9249C5.5786 15.3212 6.84863 12.2541 5.38585 9.93762C3.50866 6.96424 6.96423 3.50868 9.93761 5.38586C12.2541 6.84865 15.3211 5.57862 15.9249 2.90637Z" fill="{{$this->getLevelColorVarProperty()}}" stroke="white" stroke-width="0.666667"/>
                    </svg>
                    <span class="text-neutral-100 text-xl font-display absolute left-[10px] top-[5px]">{{ sprintf('%02d', $this->data['level'] ?? 20) }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 min-w-[70px] relative left-[-7px]">
                {{-- Progress Bar --}}
                <div
                    class="h-3 rounded-full transition-all  {{$this->getLevelColorClassProperty()}}"
                    style="width: {{ $this->data['xp'] ?? 10 }}%"
                ></div>

            </div>

        </div>
    @elseif ($this->mode === 'MATERI')
    {{-- Mode Modul Materi --}}
        <div>
            {{-- current page --}}
            <span>01</span>
            /
            {{-- Total Page modul materi --}}
            <span>10</span>
        </div>

    @elseif ($this->mode === 'TEST')
    {{-- Mode Test (Kuis, UTS, UAS) --}}
        <div>
            timer
        </div>
    @elseif ($this->mode === 'BUTTON')
    {{-- Mode button tambahan --}}
    <button>Button tambahan </button>
    @else
        <div class="flex items-center">
            <span class="font-display text-lg mr-1">LV</span>
            <div class="relative z-30">
                <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9249 2.90637C16.6998 -0.524015 21.5875 -0.524015 22.3624 2.90637C22.9662 5.57862 26.0333 6.84865 28.3497 5.38586C31.3231 3.50868 34.7787 6.96424 32.9015 9.93762C31.4387 12.2541 32.7087 15.3212 35.381 15.9249C38.8114 16.6998 38.8114 21.5876 35.381 22.3624C32.7087 22.9662 31.4387 26.0333 32.9015 28.3497C34.7787 31.3231 31.3231 34.7787 28.3497 32.9015C26.0333 31.4387 22.9662 32.7087 22.3624 35.381C21.5875 38.8114 16.6998 38.8114 15.9249 35.381C15.3211 32.7087 12.2541 31.4387 9.93761 32.9015C6.96423 34.7787 3.50866 31.3231 5.38585 28.3497C6.84863 26.0333 5.5786 22.9662 2.90636 22.3624C-0.524031 21.5876 -0.524031 16.6998 2.90636 15.9249C5.5786 15.3212 6.84863 12.2541 5.38585 9.93762C3.50866 6.96424 6.96423 3.50868 9.93761 5.38586C12.2541 6.84865 15.3211 5.57862 15.9249 2.90637Z" fill="{{$this->getLevelColorVarProperty()}}" stroke="white" stroke-width="0.666667"/>
                </svg>
                <span class="text-neutral-100 text-xl font-display absolute left-[10px] top-[5px]">{{ sprintf('%02d', $this->data['level'] ?? 20) }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3 min-w-[70px] relative left-[-7px]">
            {{-- Progress Bar --}}
            <div
                class="h-3 rounded-full transition-all  {{$this->getLevelColorClassProperty()}}"
                style="width: {{ $this->data['xp'] ?? 10 }}%"
            ></div>

        </div>
    @endif
</header>