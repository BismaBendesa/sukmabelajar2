<div class="flex gap-10 px-4 justify-between border-t border-neutral-300 py-2 bg-white fixed bottom-0 left-0 right-0 shadow-up lg:hidden">
    {{-- Dashboard Link --}}
    <a href="/dashboard" class="flex flex-col justify-center items-center w-[72px]">
        @if(request()->is('dashboard'))
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.2929 5.12132C15.6834 4.7308 16.3166 4.7308 16.7071 5.12132L28.2929 16.7071C28.6834 17.0976 29.3166 17.0976 29.7071 16.7071C30.0976 16.3166 30.0976 15.6834 29.7071 15.2929L18.1213 3.70711C16.9497 2.53554 15.0503 2.53554 13.8787 3.70711L2.29289 15.2929C1.90237 15.6834 1.90237 16.3166 2.29289 16.7071C2.68342 17.0976 3.31658 17.0976 3.70711 16.7071L15.2929 5.12132Z" fill="#002758"/>
                <path d="M16 7.24265L26.8787 18.1213C26.9183 18.1609 26.9588 18.1992 27 18.2362V26.5C27 27.8807 25.8807 29 24.5 29H20C19.4477 29 19 28.5523 19 28V22C19 21.4477 18.5523 21 18 21H14C13.4477 21 13 21.4477 13 22V28C13 28.5523 12.5523 29 12 29H7.5C6.11929 29 5 27.8807 5 26.5V18.2362C5.04124 18.1992 5.08169 18.1609 5.12132 18.1213L16 7.24265Z" fill="#002758"/>
            </svg>
            <span class="font-display text-primary-400">Dashboard</span>
        @else
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 16L14.9393 4.06066C15.5251 3.47488 16.4749 3.47488 17.0607 4.06066L29 16M6 13V26.5C6 27.3284 6.67157 28 7.5 28H13V21.5C13 20.6716 13.6716 20 14.5 20H17.5C18.3284 20 19 20.6716 19 21.5V28H24.5C25.3284 28 26 27.3284 26 26.5V13M11 28H22" stroke="#002758" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-display text-transparent [-webkit-text-stroke:.5px_var(--color-primary-400)] text-lg">Dashboard</span>
        @endif

        
    </a>
    {{-- Course Link --}}
    <a href="/kelas" class="flex flex-col justify-center items-center w-[72px]">
        @if(request()->is('kelas'))
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 6.04382C12.9794 4.75039 10.5766 4 8 4C6.48237 4 5.02341 4.26047 3.66675 4.73998C3.26716 4.88122 3 5.25901 3 5.68282V24.6828C3 25.0074 3.15757 25.3119 3.42261 25.4993C3.68765 25.6867 4.02718 25.7338 4.33325 25.6257C5.47882 25.2208 6.71255 25 8 25C10.66 25 13.0977 25.943 15 27.5143V6.04382Z" fill="#002758"/>
                <path d="M17 27.5143C18.9023 25.943 21.34 25 24 25C25.2875 25 26.5212 25.2208 27.6668 25.6257C27.9728 25.7338 28.3123 25.6867 28.5774 25.4993C28.8424 25.3119 29 25.0074 29 24.6828V5.68282C29 5.25901 28.7328 4.88122 28.3332 4.73998C26.9766 4.26047 25.5176 4 24 4C21.4234 4 19.0206 4.75039 17 6.04382V27.5143Z" fill="#002758"/>
            </svg>
            <span class="font-display text-primary-400">Kelas</span>
        @else
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 8.05557C13.877 6.15541 11.0734 5 8 5C6.59746 5 5.25112 5.24062 4 5.68282V24.6828C5.25112 24.2406 6.59746 24 8 24C11.0734 24 13.877 25.1554 16 27.0556M16 8.05557C18.123 6.15541 20.9266 5 24 5C25.4025 5 26.7489 5.24062 28 5.68282V24.6828C26.7489 24.2406 25.4025 24 24 24C20.9266 24 18.123 25.1554 16 27.0556M16 8.05557V27.0556" stroke="#002758" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-display text-transparent [-webkit-text-stroke:.5px_var(--color-primary-400)] text-lg">Kelas</span>
        @endif
    </a>
    {{-- Leaderboard Link --}}
    <a href="" class="flex flex-col justify-center items-center w-[72px]">
        @if(request()->is('klasemen'))
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.5 3C23.1193 3 22 4.11929 22 5.5V26.5C22 27.8807 23.1193 29 24.5 29H25.5C26.8807 29 28 27.8807 28 26.5V5.5C28 4.11929 26.8807 3 25.5 3H24.5Z" fill="#002758"/>
                <path d="M13 11.5C13 10.1193 14.1193 9 15.5 9H16.5C17.8807 9 19 10.1193 19 11.5V26.5C19 27.8807 17.8807 29 16.5 29H15.5C14.1193 29 13 27.8807 13 26.5V11.5Z" fill="#002758"/>
                <path d="M4 17.5C4 16.1193 5.11929 15 6.5 15H7.5C8.88071 15 10 16.1193 10 17.5V26.5C10 27.8807 8.88071 29 7.5 29H6.5C5.11929 29 4 27.8807 4 26.5V17.5Z" fill="#002758"/>
            </svg>
            <span class="font-display text-primary-400">Klasemen</span>
        @else   
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 17.5C4 16.6716 4.67157 16 5.5 16H8.5C9.32843 16 10 16.6716 10 17.5V26.5C10 27.3284 9.32843 28 8.5 28H5.5C4.67157 28 4 27.3284 4 26.5V17.5Z" stroke="#002758" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 11.5C13 10.6716 13.6716 10 14.5 10H17.5C18.3284 10 19 10.6716 19 11.5V26.5C19 27.3284 18.3284 28 17.5 28H14.5C13.6716 28 13 27.3284 13 26.5V11.5Z" stroke="#002758" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M22 5.5C22 4.67157 22.6716 4 23.5 4H26.5C27.3284 4 28 4.67157 28 5.5V26.5C28 27.3284 27.3284 28 26.5 28H23.5C22.6716 28 22 27.3284 22 26.5V5.5Z" stroke="#002758" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-display text-transparent [-webkit-text-stroke:.5px_var(--color-primary-400)] text-lg">Klasemen</span>
        @endif
    </a>
    {{-- Badge Link --}}
    <a href="" class="flex flex-col justify-center items-center w-[72px]">
        @if(request()->is('badge'))
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.3842 4.28092C14.982 2.84366 17.018 2.84366 17.6158 4.28092L20.3918 10.9552L27.5972 11.5329C29.1489 11.6573 29.7781 13.5936 28.5959 14.6063L23.1061 19.3089L24.7833 26.3402C25.1445 27.8543 23.4973 29.0511 22.1689 28.2397L16 24.4718L9.83111 28.2397C8.50269 29.0511 6.8555 27.8543 7.21668 26.3402L8.8939 19.3089L3.4041 14.6063C2.22192 13.5936 2.85108 11.6573 4.40273 11.5329L11.6082 10.9552L14.3842 4.28092Z" fill="#002758"/>
            </svg>
            <span class="font-display text-primary-400">Badge</span>
        @else
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.3075 4.66495C15.5637 4.04898 16.4363 4.04898 16.6925 4.66495L19.5271 11.4802C19.6351 11.7399 19.8793 11.9173 20.1597 11.9398L27.5173 12.5297C28.1823 12.583 28.452 13.4129 27.9453 13.8469L22.3395 18.6488C22.1259 18.8318 22.0327 19.1188 22.0979 19.3924L23.8106 26.5722C23.9654 27.2212 23.2594 27.734 22.6901 27.3863L16.3909 23.5388C16.1509 23.3922 15.849 23.3922 15.609 23.5388L9.30985 27.3863C8.74052 27.734 8.03458 27.2212 8.18937 26.5722L9.90203 19.3924C9.96728 19.1188 9.874 18.8318 9.66041 18.6488L4.05465 13.8469C3.548 13.4129 3.81764 12.583 4.48263 12.5297L11.8403 11.9398C12.1206 11.9173 12.3648 11.7399 12.4728 11.4802L15.3075 4.66495Z" stroke="#002758" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-display text-transparent [-webkit-text-stroke:.5px_var(--color-primary-400)] text-lg">Badge</span>
        @endif
    </a>
</div>