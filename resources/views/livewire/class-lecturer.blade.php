<div>
    {{-- search bar --}}
    <div class="border border-neutral-400 rounded-md flex items-center gap-2 shadow-button py-3 px-4 mx-4">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 2.5C4.51472 2.5 2.5 4.51472 2.5 7C2.5 9.48528 4.51472 11.5 7 11.5C8.24278 11.5 9.36709 10.9969 10.182 10.182C10.9969 9.36709 11.5 8.24278 11.5 7C11.5 4.51472 9.48528 2.5 7 2.5ZM1.5 7C1.5 3.96243 3.96243 1.5 7 1.5C10.0376 1.5 12.5 3.96243 12.5 7C12.5 8.33855 12.0213 9.56604 11.2266 10.5195L14.3536 13.6464C14.5488 13.8417 14.5488 14.1583 14.3536 14.3536C14.1583 14.5488 13.8417 14.5488 13.6464 14.3536L10.5195 11.2266C9.56604 12.0213 8.33855 12.5 7 12.5C3.96243 12.5 1.5 10.0376 1.5 7Z" fill="#9E9C9A"/>
        </svg>
        <input 
            type="text"
            placeholder="Cari Kelas..."
            class="font-display w-full h-full focus:outline-none focus:ring-0">
    </div>

    {{-- Sorting Tahun Ajaran --}}
    <div class="flex gap-2 items-center px-4 font-merriweather overflow-scroll py-4">
        <div class="border border-primary-400 rounded-sm p-2 text-primary-400 bg-neutral-100 w-fit text-sm shadow">
            2026/2027
        </div>
        <div class="border border-primary-400 rounded-sm p-2 bg-primary-400 text-neutral-100 w-fit text-sm shadow">
            2025/2026
        </div>
        <div class="border border-primary-400 rounded-sm p-2 text-primary-400 bg-neutral-100 w-fit text-sm shadow">
            2024/2025
        </div>
        <div class="border border-primary-400 rounded-sm p-2 text-primary-400 bg-neutral-100 w-fit text-sm shadow">
            2023/2024
        </div>
    </div>
</div>
