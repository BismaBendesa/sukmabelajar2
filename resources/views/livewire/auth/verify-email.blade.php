<div class="max-w-[560px] m-auto px-4 py-10 min-h-[800px] overflow-x-hidden relative md:overflow-x-visible " style="background-image: url('{{ asset('images/background-icons.png') }}');">
    <h2 class="font-display text-3xl tracking-wide max-w-[300px] md:max-w-auto">Verifikasi Email Pengguna</h2>

    <p class="font-merriweather font-light mt-2 max-w-[300px] md:max-w-auto">Sugma sudah mengirimkan 6-digit kode ke email kamu. Mohon di check yaa!</p>
    <img src="{{asset('./images/sugma-verify.png')}}" alt="sugma verfy" class="absolute right-[-120px] top-0 overflow-hidden">

    <form wire:submit.prevent="verify">
        <div class="flex flex-col">
            <label for="verify" class="font-merriweather m-auto mt-4">Kode Verifikasi</label>
            <input type="text" wire:model="code" maxlength="6" name="verify" placeholder="6-digit kode" class="text-center border border-neutral-400 py-2 my-2 rounded-md font-display tracking-wide text-xl bg-white">
        </div>

        @error('code')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit" wire:loading.attr="disabled" class="font-display w-full bg-primary-300 text-white py-2 tracking-wide text-xl mt-1 rounded-md active:translate-y-1 duration-300 shadow-button">
            Konfirmasi
        </button>
    </form>

    @if (session()->has('error'))
        <div class="error">{{ session('error') }}</div>
    @endif
</div>