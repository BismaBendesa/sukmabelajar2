<div class="pb-20 max-w-[1024px] mx-auto">
    {{-- User Profile Section --}}
    <div class="border-b border-neutral-300 pb-4">
        <a href="">
            <img src="{{ asset('./images/user-avatar.png') }} " alt="User Avatar" class="mx-auto rounded-full w-32 h-32 object-cover border border-primary-300 mb-4 shadow-lg">
        </a>
        <h3 class="text-primary-300 font-display text-2xl text-center tracking-wide">I Komang Bisma Bendesa Jaya</h3>
        <p class="text-primary-300 text-center">Mahasiswa 22 | NIM. 2208561024</p>
    </div>
    {{-- User Level Section --}}
    <div class="mt-4 border-b border-neutral-300 pb-4">
        <h2 class="text-3xl text-primary-300 font-display text-uppercase text-center">LV 13 Jago</h2>
    </div>
    {{-- User Badge Section --}}
    <div class="mt-4 mx-auto w-full">
        <h4 class="text-primary-400 text-center font-display text-2xl">Badges & Streak</h4>
        <div class="flex justify-center items-center gap-2 mt-2">
            {{-- Badge Looping goes here --}}
            <div class="flex flex-wrap gap-2 mt-1 justify-center p-1 bg-white rounded-md shadow-card border border-additional-bronze inline-block">
                <img src="{{asset('images/badge-1.png')}}" alt="The Beginner Badge" class="w-12 h-12 object-cover">
            </div>
            <div class="flex flex-wrap gap-2 mt-1 justify-center p-1 bg-white rounded-md shadow-card border border-additional-bronze inline-block">
                <img src="{{asset('images/badge-1.png')}}" alt="The Beginner Badge" class="w-12 h-12 object-cover">
            </div>
            <div class="flex flex-wrap gap-2 mt-1 justify-center p-1 bg-white rounded-md shadow-card border border-additional-bronze inline-block">
                <img src="{{asset('images/badge-1.png')}}" alt="The Beginner Badge" class="w-12 h-12 object-cover">
            </div>
        </div>
    </div>
    {{-- Login Streak --}}
    <div class="grid grid-cols-2 gap-2 md:gap-4 px-4 pb-8 border-b border-neutral-300 ">
        <div class="flex items-center gap-3 mt-4 px-4 py-2 bg-white rounded-md shadow-card border border-neutral-400">
            <svg width="24" height="27" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2845 0.402208C13.1221 0.18448 12.8782 0.0421589 12.6087 0.00796236C12.3393 -0.0262343 12.0675 0.0506357 11.8559 0.220901C9.36234 2.22733 7.6232 5.13817 7.13763 8.45632C6.2622 7.82171 5.49333 7.04851 4.86346 6.1689C4.69019 5.92693 4.41814 5.7747 4.12127 5.75362C3.8244 5.73253 3.53356 5.84477 3.32782 6.05983C1.26729 8.21371 0 11.1369 0 14.354C0 20.9814 5.37258 26.354 12 26.354C18.6274 26.354 24 20.9814 24 14.354C24 9.47284 21.0857 5.27448 16.9064 3.3999C15.4274 2.67791 14.2062 1.63828 13.2845 0.402208ZM17 16.3546C17 19.116 14.7614 21.3546 12 21.3546C9.23858 21.3546 7 19.116 7 16.3546C7 15.8088 7.08745 15.2834 7.24909 14.7917C8.08706 15.4112 9.05026 15.871 10.0937 16.126C10.3816 14.2583 11.3154 12.6038 12.6599 11.3977C15.1094 11.7206 17 13.8168 17 16.3546Z" fill="#0064D4"/>
            </svg>
            <div>
                <span class="text-xs">Streak saat ini:</span>
                <h3 class="font-display text-xl ">5 hari</h3>
            </div>
            
        </div>
        <div class="flex items-center gap-2 mt-4 px-4 py-2 bg-white rounded-md shadow-card border border-neutral-400">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.4829 6.9505C24.3236 8.66661 27 12.52 27 16.9986C27 23.0737 22.0751 27.9986 16 27.9986C9.92487 27.9986 5 23.0737 5 16.9986C5 14.0492 6.16078 11.3709 8.05042 9.39563C9.07241 10.8228 10.4273 11.9954 12.0016 12.7999C12.0618 9.09898 13.7973 5.8054 16.4828 3.64453C17.5007 5.00953 18.8505 6.15663 20.4829 6.9505Z" stroke="#0064D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 23.9991C18.7614 23.9991 21 21.7605 21 18.9991C21 16.4613 19.1094 14.3652 16.6599 14.0422C15.3154 15.2483 14.3816 16.9029 14.0937 18.7706C13.0503 18.5155 12.0871 18.0557 11.2491 17.4363C11.0874 17.9279 11 18.4533 11 18.9991C11 21.7605 13.2386 23.9991 16 23.9991Z" stroke="#0064D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <div>
                <span class="text-xs">Terpanjang:</span>
                <h3 class="font-display text-xl ">5 hari</h3>
            </div>
            
        </div>
    </div>

    {{-- Dashboard Menus --}}
    <div class="grid grid-cols-2 px-4 gap-4 my-4 pb-4 border-b border-neutral-400">
        <a href="#" class="p-2 rounded-md border border-neutral-400 shadow-card hover:bg-neutral-200">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.9999 21.839C21.2887 21.8628 21.5808 21.875 21.8757 21.875C23.0987 21.875 24.2729 21.6659 25.3645 21.2815C25.3719 21.1886 25.3757 21.0947 25.3757 21C25.3757 19.067 23.8087 17.5 21.8757 17.5C21.1434 17.5 20.4637 17.7248 19.9018 18.1093M20.9999 21.839C21 21.851 21 21.863 21 21.875C21 22.1375 20.9856 22.3966 20.9574 22.6516C18.9078 23.8276 16.5324 24.5 14 24.5C11.4676 24.5 9.09215 23.8276 7.04259 22.6516C7.01445 22.3966 7 22.1375 7 21.875C7 21.863 7.00003 21.8511 7.00009 21.8391M20.9999 21.839C20.993 20.4664 20.591 19.1871 19.9018 18.1093M19.9018 18.1093C18.6583 16.1644 16.4797 14.875 14 14.875C11.5206 14.875 9.34226 16.1641 8.09864 18.1086M8.09864 18.1086C7.53693 17.7246 6.85762 17.5 6.12585 17.5C4.19286 17.5 2.62585 19.067 2.62585 21C2.62585 21.0947 2.62962 21.1886 2.63701 21.2815C3.72858 21.6659 4.9028 21.875 6.12585 21.875C6.42025 21.875 6.71182 21.8629 7.00009 21.8391M8.09864 18.1086C7.40916 19.1866 7.00698 20.4661 7.00009 21.8391M17.5 7.875C17.5 9.808 15.933 11.375 14 11.375C12.067 11.375 10.5 9.808 10.5 7.875C10.5 5.942 12.067 4.375 14 4.375C15.933 4.375 17.5 5.942 17.5 7.875ZM24.5 11.375C24.5 12.8247 23.3247 14 21.875 14C20.4253 14 19.25 12.8247 19.25 11.375C19.25 9.92525 20.4253 8.75 21.875 8.75C23.3247 8.75 24.5 9.92525 24.5 11.375ZM8.75 11.375C8.75 12.8247 7.57475 14 6.125 14C4.67525 14 3.5 12.8247 3.5 11.375C3.5 9.92525 4.67525 8.75 6.125 8.75C7.57475 8.75 8.75 9.92525 8.75 11.375Z" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <span class="font-display text-xl mt-1">Nilai</span>
        </a>
        <a href="#" class="p-2 rounded-md border border-neutral-400 shadow-card hover:bg-neutral-200">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.333 19.9287C19.5433 19.6665 21.6747 19.1468 23.6963 18.4005C22.0201 16.5398 20.9998 14.0766 20.9998 11.375V10.5574C20.9999 10.5383 21 10.5191 21 10.5C21 6.63401 17.866 3.5 14 3.5C10.134 3.5 7 6.63401 7 10.5L6.99977 11.375C6.99977 14.0766 5.97949 16.5399 4.30322 18.4005C6.32497 19.1469 8.45651 19.6665 10.667 19.9287M17.333 19.9287C16.24 20.0583 15.1277 20.125 13.9998 20.125C12.872 20.125 11.7599 20.0583 10.667 19.9287M17.333 19.9287C17.4414 20.2663 17.5 20.6263 17.5 21C17.5 22.933 15.933 24.5 14 24.5C12.067 24.5 10.5 22.933 10.5 21C10.5 20.6263 10.5586 20.2663 10.667 19.9287" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>


            <span class="font-display text-xl mt-1">Notifikasi</span>
        </a>
        <a href="{{route("classes")}}" class="p-2 rounded-md border border-neutral-400 shadow-card hover:bg-neutral-200 focus:bg-primary-300 focus:text-white">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 7.04863C12.1424 5.38599 9.68924 4.375 7 4.375C5.77278 4.375 4.59473 4.58554 3.5 4.97247V21.5975C4.59473 21.2105 5.77278 21 7 21C9.68924 21 12.1424 22.011 14 23.6736M14 7.04863C15.8576 5.38599 18.3108 4.375 21 4.375C22.2272 4.375 23.4053 4.58554 24.5 4.97247V21.5975C23.4053 21.2105 22.2272 21 21 21C18.3108 21 15.8576 22.011 14 23.6736M14 7.04863V23.6736" stroke="#0F172A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>



            <span class="font-display text-xl mt-1">Kelas</span>
        </a>
        <a href="#" class="p-2 rounded-md border border-neutral-400 shadow-card hover:bg-neutral-200">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.5 15.3125C3.5 14.5876 4.08763 14 4.8125 14H7.4375C8.16237 14 8.75 14.5876 8.75 15.3125V23.1875C8.75 23.9124 8.16237 24.5 7.4375 24.5H4.8125C4.08763 24.5 3.5 23.9124 3.5 23.1875V15.3125Z" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.375 10.0625C11.375 9.33763 11.9626 8.75 12.6875 8.75H15.3125C16.0374 8.75 16.625 9.33763 16.625 10.0625V23.1875C16.625 23.9124 16.0374 24.5 15.3125 24.5H12.6875C11.9626 24.5 11.375 23.9124 11.375 23.1875V10.0625Z" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.25 4.8125C19.25 4.08763 19.8376 3.5 20.5625 3.5H23.1875C23.9124 3.5 24.5 4.08763 24.5 4.8125V23.1875C24.5 23.9124 23.9124 24.5 23.1875 24.5H20.5625C19.8376 24.5 19.25 23.9124 19.25 23.1875V4.8125Z" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>



            <span class="font-display text-xl mt-1">Ranking</span>
        </a>
        <a href="#" class="p-2 rounded-md border border-neutral-400 shadow-card hover:bg-neutral-200">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.333 19.9287C19.5433 19.6665 21.6747 19.1468 23.6963 18.4005C22.0201 16.5398 20.9998 14.0766 20.9998 11.375V10.5574C20.9999 10.5383 21 10.5191 21 10.5C21 6.63401 17.866 3.5 14 3.5C10.134 3.5 7 6.63401 7 10.5L6.99977 11.375C6.99977 14.0766 5.97949 16.5399 4.30322 18.4005C6.32497 19.1469 8.45651 19.6665 10.667 19.9287M17.333 19.9287C16.24 20.0583 15.1277 20.125 13.9998 20.125C12.872 20.125 11.7599 20.0583 10.667 19.9287M17.333 19.9287C17.4414 20.2663 17.5 20.6263 17.5 21C17.5 22.933 15.933 24.5 14 24.5C12.067 24.5 10.5 22.933 10.5 21C10.5 20.6263 10.5586 20.2663 10.667 19.9287" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>


            <span class="font-display text-xl mt-1">Diskusi</span>
        </a>
        <a href="#" class="p-2 rounded-md border border-neutral-400 shadow-card hover:bg-neutral-200">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.5254 8.77199C12.8922 7.57601 15.1083 7.57601 16.4751 8.77199C17.842 9.96797 17.842 11.907 16.4751 13.103C16.2372 13.3112 15.9736 13.4831 15.6932 13.6188C14.8232 14.0398 14.0003 14.7835 14.0003 15.75V16.625M24.5 14C24.5 19.799 19.799 24.5 14 24.5C8.20101 24.5 3.5 19.799 3.5 14C3.5 8.20101 8.20101 3.5 14 3.5C19.799 3.5 24.5 8.20101 24.5 14ZM14 20.125H14.0088V20.1338H14V20.125Z" stroke="#333231" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>



            <span class="font-display text-xl mt-1">Bantuan</span>
        </a>
    </div>
</div>
