<div>
    <h2>Verify Your Email</h2>

    <p>Please enter the 6-digit code sent to your email.</p>

    <form wire:submit.prevent="verify">
        <input type="text" wire:model="code" placeholder="Enter code" maxlength="6">

        @error('code')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit" wire:loading.attr="disabled">
            Verify
        </button>
    </form>

    @if (session()->has('error'))
        <div class="error">{{ session('error') }}</div>
    @endif
</div>