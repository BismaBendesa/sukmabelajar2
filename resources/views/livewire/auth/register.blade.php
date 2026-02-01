<div style="background-image: url('{{ asset('images/background-icons.png') }}');" x-data="{ selectedRole: @entangle('role') }">
    @if (session()->has('success'))
        <div class="mb-4 rounded-md bg-green-100 text-green-800 px-4 py-2">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-4xl font-display text-center my-6">Halaman Register SukmaBelajar 2.0</h1>
    <div class="font-merriweather">
        <p class="text-center mb-2 font-light">Pilih Role</p>
        <form class="px-4 mt-6" wire:submit.prevent="store">
            {{-- Role Selection --}}
            <div class="flex items-center justify-center gap-4 ">
                <div
                    @click="selectedRole = 'mhs'"
                    :class="{
                        'text-neutral-100 bg-primary-300 border-primary-500': selectedRole === 'mhs',
                        'bg-neutral-200 border-neutral-300': selectedRole !== 'mhs'
                    }"
                    class="flex flex-col items-center justify-center rounded-md pb-2 shadow-card border transition-all duration-300 cursor-pointer"
                    >
                    
                    <img src="{{ asset('images/role-murid.png') }}" alt="Mahasiswa Icon">
                    <p class="font-display tracking-wide text-xl pt-2">Mahasiswa</p>
                </div>
                <div
                    @click="selectedRole = 'dosen'"
                    :class="{
                        'text-neutral-100 bg-primary-300 border-primary-500': selectedRole === 'dosen',
                        'bg-neutral-200 border-neutral-300': selectedRole !== 'dosen'
                    }"
                    class="flex flex-col items-center justify-center rounded-md pb-2 shadow-card border transition-all duration-300 cursor-pointer"
                    >
                    <img src="{{ asset('images/role-guru.png') }}" alt="Dosen Icon">
                    <p class="font-display tracking-wide text-xl pt-2">Dosen</p>
                </div>
            </div>
            @error('role')
                <p class="text-danger-300 text-xs mt-1 text-center">{{ $message }}</p>
            @enderror

            {{-- Username --}}
            <div class="mb-2">
                <label for="username" class="text-sm">Nama Pengguna</label>
                <input type="text" class="w-full border border-neutral-400 px-2 py-1.5 text-sm rounded-md" name="username" wire:model="username">
                @error('username')
                    <p class="text-danger-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Email --}}
            <div class="mb-2">
                <label for="email" class="text-sm">Email</label>
                <input type="email" class="w-full border border-neutral-400 px-2 py-1.5 text-sm rounded-md" name="email" wire:model="email">
                @error('email')
                    <p class="text-danger-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- NIM/NIP --}}
            <div class="mb-2">
                <label for="nim" class="text-sm uppercase">nim/nip</label>
                <input type="text" class="w-full border border-neutral-400 px-2 py-1.5 text-sm rounded-md" name="nim" wire:model="nim">
                @error('nim')
                    <p class="text-danger-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Password --}}
            <div class="mb-2 relative" x-data="{ showPassword: false }">
                <label for="password" class="text-sm capitalize">password</label>
                <input 
                    :type="showPassword ? 'text' : 'password'" 
                    class="w-full border border-neutral-400 px-2 py-1.5 text-sm rounded-md" 
                    name="password" wire:model="password">
                    <!-- Tombol Toggle -->
                    <button 
                        type="button" 
                        class="absolute bottom-[6px] right-[10px] flex items-center text-neutral-500"
                        @click="showPassword = !showPassword"
                    >
                        <!-- Ikon Mata (SVG) -->
                        <svg x-show="!showPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="#0F172A"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.32341 11.4467C2.81066 6.97571 7.02791 3.75 12.0005 3.75C16.9708 3.75 21.1864 6.97271 22.6755 11.4405C22.7959 11.8015 22.796 12.1922 22.6759 12.5533C21.1886 17.0243 16.9714 20.25 11.9988 20.25C7.02847 20.25 2.81284 17.0273 1.32374 12.5595C1.2034 12.1985 1.20328 11.8078 1.32341 11.4467ZM17.25 12C17.25 14.8995 14.8995 17.25 12 17.25C9.1005 17.25 6.75 14.8995 6.75 12C6.75 9.1005 9.1005 6.75 12 6.75C14.8995 6.75 17.25 9.1005 17.25 12Z" fill="#0F172A"/>
                        </svg>

                        
                        <!-- Ikon Mata Dicoret (SVG) -->
                        <svg x-show="showPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.53033 2.46967C3.23744 2.17678 2.76256 2.17678 2.46967 2.46967C2.17678 2.76256 2.17678 3.23744 2.46967 3.53033L20.4697 21.5303C20.7626 21.8232 21.2374 21.8232 21.5303 21.5303C21.8232 21.2374 21.8232 20.7626 21.5303 20.4697L3.53033 2.46967Z" fill="#0F172A"/>
                            <path d="M22.6759 12.5533C22.1319 14.1887 21.2226 15.6575 20.0447 16.8627L16.9462 13.7642C17.1429 13.2129 17.25 12.6189 17.25 12C17.25 9.1005 14.8995 6.75 12 6.75C11.3811 6.75 10.7871 6.8571 10.2358 7.05379L7.75898 4.577C9.06783 4.04381 10.4998 3.75 12.0005 3.75C16.9708 3.75 21.1864 6.97271 22.6755 11.4405C22.7959 11.8015 22.796 12.1922 22.6759 12.5533Z" fill="#0F172A"/>
                            <path d="M15.75 12C15.75 12.1802 15.7373 12.3574 15.7127 12.5308L11.4692 8.28727C11.6426 8.2627 11.8198 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12Z" fill="#0F172A"/>
                            <path d="M12.5308 15.7127L8.28727 11.4692C8.2627 11.6426 8.25 11.8198 8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C12.1802 15.75 12.3574 15.7373 12.5308 15.7127Z" fill="#0F172A"/>
                            <path d="M6.75 12C6.75 11.3811 6.8571 10.7871 7.05379 10.2358L3.95492 7.1369C2.77687 8.34222 1.86747 9.81114 1.32341 11.4467C1.20328 11.8078 1.2034 12.1985 1.32374 12.5595C2.81284 17.0273 7.02847 20.25 11.9988 20.25C13.4997 20.25 14.9318 19.9561 16.2408 19.4228L13.7642 16.9462C13.2129 17.1429 12.6189 17.25 12 17.25C9.1005 17.25 6.75 14.8995 6.75 12Z" fill="#0F172A"/>
                        </svg>

                    </button>
                @error('password')
                    <p class="text-danger-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Confirm Password --}}
            <div class="mb-2 relative" x-data="{ showConfirmPassword: false }">
                <label for="confirm-password" class="text-sm capitalize">confirm password</label>
                <input 
                :type="showConfirmPassword ? 'text' : 'password'" 
                class="w-full border border-neutral-400 px-2 py-1.5 text-sm rounded-md" 
                name="confirm-password" 
                wire:model="password_confirmation">
                <button 
                    type="button" 
                    class="absolute bottom-[6px] right-[10px] flex items-center text-neutral-500"
                    @click="showConfirmPassword = !showConfirmPassword"
                >
                    <!-- Ikon Mata (SVG) -->
                        <svg x-show="!showConfirmPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="#0F172A"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.32341 11.4467C2.81066 6.97571 7.02791 3.75 12.0005 3.75C16.9708 3.75 21.1864 6.97271 22.6755 11.4405C22.7959 11.8015 22.796 12.1922 22.6759 12.5533C21.1886 17.0243 16.9714 20.25 11.9988 20.25C7.02847 20.25 2.81284 17.0273 1.32374 12.5595C1.2034 12.1985 1.20328 11.8078 1.32341 11.4467ZM17.25 12C17.25 14.8995 14.8995 17.25 12 17.25C9.1005 17.25 6.75 14.8995 6.75 12C6.75 9.1005 9.1005 6.75 12 6.75C14.8995 6.75 17.25 9.1005 17.25 12Z" fill="#0F172A"/>
                        </svg>
                        <!-- Ikon Mata Dicoret (SVG) -->
                        <svg x-show="showConfirmPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.53033 2.46967C3.23744 2.17678 2.76256 2.17678 2.46967 2.46967C2.17678 2.76256 2.17678 3.23744 2.46967 3.53033L20.4697 21.5303C20.7626 21.8232 21.2374 21.8232 21.5303 21.5303C21.8232 21.2374 21.8232 20.7626 21.5303 20.4697L3.53033 2.46967Z" fill="#0F172A"/>
                            <path d="M22.6759 12.5533C22.1319 14.1887 21.2226 15.6575 20.0447 16.8627L16.9462 13.7642C17.1429 13.2129 17.25 12.6189 17.25 12C17.25 9.1005 14.8995 6.75 12 6.75C11.3811 6.75 10.7871 6.8571 10.2358 7.05379L7.75898 4.577C9.06783 4.04381 10.4998 3.75 12.0005 3.75C16.9708 3.75 21.1864 6.97271 22.6755 11.4405C22.7959 11.8015 22.796 12.1922 22.6759 12.5533Z" fill="#0F172A"/>
                            <path d="M15.75 12C15.75 12.1802 15.7373 12.3574 15.7127 12.5308L11.4692 8.28727C11.6426 8.2627 11.8198 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12Z" fill="#0F172A"/>
                            <path d="M12.5308 15.7127L8.28727 11.4692C8.2627 11.6426 8.25 11.8198 8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C12.1802 15.75 12.3574 15.7373 12.5308 15.7127Z" fill="#0F172A"/>
                            <path d="M6.75 12C6.75 11.3811 6.8571 10.7871 7.05379 10.2358L3.95492 7.1369C2.77687 8.34222 1.86747 9.81114 1.32341 11.4467C1.20328 11.8078 1.2034 12.1985 1.32374 12.5595C2.81284 17.0273 7.02847 20.25 11.9988 20.25C13.4997 20.25 14.9318 19.9561 16.2408 19.4228L13.7642 16.9462C13.2129 17.1429 12.6189 17.25 12 17.25C9.1005 17.25 6.75 14.8995 6.75 12Z" fill="#0F172A"/>
                        </svg>
                        
                        
                    </button>
                @error('password_confirmation')
                    <p class="text-danger-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full bg-primary-300 text-neutral-100 py-2 rounded-md mt-4 font-display shadow-button text-xl"
                >
                <span wire:loading.remove>Register</span>
                <span wire:loading>Processing...</span>
            </button>
            <a href="/login" class="block text-center w-full bg-primary-50 text-primary-300 py-2 rounded-md mt-2 font-display shadow-card text-xl">Sudah punya akun? Login</a>
            @error('database')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror


        </form>
    </div>
</div>
