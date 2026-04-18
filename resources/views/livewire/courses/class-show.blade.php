<div class="max-w-[1024px] m-auto">
    <div class="px-4 bg-primary-400 pt-6 pb-20">
        <h1 class="text-3xl font-display tracking-wider text-white">{{ $class->name }}</h1>
        <p class="font-merriweather font-light text-white text-sm my-2 leading-7">{{ $class->description }}</p>
        <span 
            class="cursor-pointer hover:underline text-white font-merriweather text-sm "
            x-data="{ copied: false }"
            @click="
                navigator.clipboard.writeText('{{ $class['class_code'] }}');
                copied = true;
                setTimeout(() => copied = false, 1500);
            "
        >
            <span >
                Kode:
                <span class="underline inline-flex mr-1">{{ $class['class_code'] }} 
                    {{-- Icon outlined !copied --}}
                    <svg x-show="!copied" class="ml-1" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0541 6.69981C10.6641 6.69981 11.2497 6.9423 11.681 7.37363L15.4261 11.1197C15.8574 11.551 16.1 12.1358 16.1 12.7457V19.8004C16.0998 21.0704 15.0702 22.1001 13.8002 22.1002H5.39978C4.12974 22.1001 3.10019 21.0704 3.09998 19.8004V8.99961C3.10019 7.7296 4.12975 6.69991 5.39978 6.69981H10.0541ZM14.8549 1.9C15.4647 1.90013 16.0496 2.14261 16.4808 2.57383L20.226 6.31895C20.6573 6.75028 20.8998 7.3359 20.8998 7.9459V14.9996C20.8998 16.2699 19.8702 17.3004 18.6 17.3004H16.8998V12.7457C16.8998 11.9235 16.5729 11.1347 15.9916 10.5533L12.2465 6.8082C11.6651 6.22684 10.8762 5.9 10.0541 5.9H7.89978V4.19981C7.89989 2.92977 8.92957 1.90021 10.1996 1.9H14.8549Z" stroke="white"/>
                    </svg>
                    {{-- Icon filled copied --}}
                    <svg x-show="copied" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 3.5C7 2.67157 7.67157 2 8.5 2H12.3787C12.7765 2 13.158 2.15804 13.4393 2.43934L16.5607 5.56066C16.842 5.84197 17 6.2235 17 6.62132V12.5C17 13.3284 16.3284 14 15.5 14H14.5V10.6213C14.5 9.82567 14.1839 9.06261 13.6213 8.5L10.5 5.37868C9.93739 4.81607 9.17433 4.5 8.37868 4.5H7V3.5Z" fill="white"/>
                        <path d="M4.5 6C3.67157 6 3 6.67157 3 7.5V16.5C3 17.3284 3.67157 18 4.5 18H11.5C12.3284 18 13 17.3284 13 16.5V10.6213C13 10.2235 12.842 9.84197 12.5607 9.56066L9.43934 6.43934C9.15804 6.15804 8.7765 6 8.37868 6H4.5Z" fill="white"/>
                    </svg>

                </span> 
            </span>
            <span x-show="copied" class="font-merriweather text-sm text-neutral-100">
                Copied!
            </span>
        </span>
    </div>
    {{-- Module Cards (need looping here)--}}
    <div class="mt-[-40px] flex flex-col gap-2 pb-30">
        @foreach ($class->modules as $module)
            <x-module-card :module="$module" :mode="'locked'" />
        @endforeach
    </div>
</div>