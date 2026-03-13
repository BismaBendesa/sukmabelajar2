<x-guest>
  <div 
    x-data="{step: 1}"
    style="background-image: url('{{ asset('images/background-icons.png') }}');" 
    class="h-screen overflow-y-hidden">
    {{-- Step 1 --}}
    <div x-show="step === 1" x-transition>
      <div class="flex flex-row items-center pr-4 pt-10 max-w-[560px] m-auto">
        <img src="{{asset('images/sugma-hi-right.png')}}" alt="Sugma hi right" class="w-[200px] relative left-[-75px] basis-sm">
        <div class="basis-2xl min-w-[238px] ml-[-90px]">
          <h1 class="font-display text-2xl bg-neutral-300 px-4 py-2 rounded-md">Selamat datang di <span class="text-primary-300">Sukmabelajar 2.0</span></h1>
          <p class="text-sm text-justify mt-4">"Halo namaku Sugma, Aku akan menemani kamu di Sukmabelajar 2.0. Salam Kenal dan mohon bantuannya ya teman-teman."</p>
        </div>
      </div>
      <div class="flex items-center pl-4 pt-10 max-w-[560px] m-auto overflow-x-hidden">
        <div>
          <h1 class="font-display text-2xl bg-neutral-300 px-4 py-2 rounded-md">Sukmabelajar 2.0 kini <span class="text-primary-300">siap digunakan</span></h1>
          <p class="text-sm text-justify mt-4 min-w-[238px]">"Sukmabelajar kini hadir dengan versi yang lebih baru dan inovatif. Ayo coba sekarang juga!"</p>
        </div>
        <img src="{{asset('images/sugma-hi-left.png')}}" alt="sugma hi left" class="w-[200px] relative">
      </div>
      <div class="flex justify-center gap-2 mb-6">

        <div :class="step >= 1 ? 'bg-blue-500' : 'bg-gray-300'"
            class="w-6 h-3 rounded-full"></div>

        <div 
          :class="step >= 2 ? 'bg-blue-500' : 'bg-gray-300'"
          class="w-3 h-3 rounded-full cursor-pointer"
          @click="step = 2">
        </div>

      </div>
      <div class="bg-neutral-100 w-full p-4 fixed bottom-0 right-0 left-0 max-w-[560px] m-auto shadow-up md max-w-full">
        <button 
        @click="step = 2" class="font-display text-xl bg-primary-300 p-2 rounded-md w-full text-neutral-100 block text-center tracking-wide md:w-[560px] md:m-auto cursor-pointer">Lanjutkan</button>
      </div>
    </div>
    {{-- Step 2 --}}
    <div x-show="step === 2" x-transition>
      <div class="mt-10 p-4 max-w-[560px] mx-auto">
        <div class="flex items-center justify-center">
          <img src="{{asset('images/books.png')}}" alt="Books" class="w-[132px]">
          <img src="{{asset('images/console.png')}}" alt="Books" class="w-[132px]">
        </div>
        <h1 class="font-display text-primary-400 text-3xl text-center mt-4">Gamifikasi</h1>
        <p class="font-merriweather font-light text-sm text-center my-2 leading-7">Kini Sukmabelajar menggunakan elemen gamifikasi untuk meningkatkan minat belajar. Mari kita coba elemen gamifikasi yang baru dalam Sukmabelajar.</p>
        {{-- Indicator --}}
        <div class="flex justify-center gap-2 mb-6 mt-4">
          <div 
            :class="step <= 1 ? 'bg-blue-500' : 'bg-gray-300'"
            class="w-3 h-3 rounded-full cursor-pointer"
            @click="step = 1">
          </div>
          <div :class="step >= 2 ? 'bg-blue-500' : 'bg-gray-300'"
              class="w-6 h-3 rounded-full"></div>
        </div>
        <img src="{{asset('images/hooray-sugma.png')}}" alt="sugma mascott" class="mx-auto fixed bottom-[40px] inset-x-0">
      </div>
      <div class="bg-neutral-100 w-full p-4 fixed bottom-0 right-0 left-0 max-w-[560px] m-auto shadow-up md max-w-full flex items-start gap-4">
        <div class="m-auto w-[560px] flex gap-4">
          <a 
          href="/login"
          class="font-display text-xl bg-primary-50 p-2 rounded-md w-full text-primary-300 block text-center tracking-wide md:m-auto cursor-pointer md:max-w-[280px]">Login</a>
          <a
          href="/daftar"
          class="font-display text-xl bg-primary-300 p-2 rounded-md w-full text-neutral-100 block text-center tracking-wide md:m-auto cursor-pointer md:max-w-[280px]">Register</a>
        </div>
      </div>
    </div>
  </div>
</x-guest>