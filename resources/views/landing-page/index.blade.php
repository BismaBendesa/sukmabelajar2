<x-guest>
{{-- hero-section --}}
<div class="mt-6 px-4 bg-no-repeat bg-bottom md:bg-right max-w-[1440px] m-auto overflow-hidden md:flex md:justify-between md:overflow-visible" style="background-image: url('{{ asset('images/circle-bg.png') }}');">
  <div class="md:mt-50">
    <h3 class="text-neutral-700 text-xl text-center font-display max-w-[560px] m-auto md:text-left">Era baru dalam cara belajar </h3>
    {{-- logo --}}
    <img src="{{asset('images/sukmabelajar2-logo.png')}}" alt="Sukmabelajar 2.0 Logo" class="w-[120px] m-auto md:mx-0 my-6">
    <h1 class="font-display text-4xl m-auto text-center tracking-widest md:text-left">Sukmabelajar 2.0</h1>
    <p class="font-merriweather font-light text-center mt-2 text-sm leading-6 max-w-[560px] m-auto md:text-left">SukmaBelajar 2.0 menghadirkan pengalaman belajar digital yang lebih fokus, interaktif, inovatif dan berdampak.</p>
    <a href="/onboarding" class="bg-primary-300 text-neutral-100 w-full p-2 text-xl tracking-wider block font-display text-center rounded-lg mt-4 max-w-[560px] mx-auto hover:opacity-80">Ayo Belajar Sekarang!</a>
  </div>
  
  {{-- hero-image --}}
  <div class="relative">
    <img src="{{asset('images/mockup-hero.png')}}" alt="The Mockup Hero" class="relative left-[50px] top-[20px] md:left-[90px]">
    <img src="{{asset('images/sugma-point.png')}}" alt="TThe mascott" class="absolute right-[-40px] bottom-[80px] w-[200px]">
  </div>
</div>

{{-- feature section --}}
<div class="bg-neutral-100 mt-[-100px] z-99 relative px-4 flex flex-col gap-12  m-auto border-b border-neutral-300 pb-10">
  <h1 class="font-display text-3xl md:text-4xl   text-center pt-6 pb-4">Fitur Terbaru Sukmabelajar 2.0</h1>
  <div class="md:grid md:grid-cols-3 md:gap-6 max-w-[1440px] m-auto">
    <div class="md:basis-auto">
      <img src="{{asset('images/books-feature.png')}}" alt="books" class="m-auto w-[140px] h-[140px]">
      <h3 class="font-display text-2xl text-primary-400 text-center">Pengalaman Belajar Baru</h3>
      <p class="font-merriweather font-light leading-6 text-center text-sm mt-2">Nikmati cara belajar yang lebih interaktif, terstruktur, dan relevan dengan kebutuhan masa kini.</p>
    </div>
    <div class="md:basis-auto">
      <img src="{{asset('images/gamify-icon.png')}}" alt="books" class="m-auto w-[140px]">
      <h3 class="font-display text-2xl text-primary-400 text-center">Gamifikasi</h3>
      <p class="font-merriweather font-light leading-6 text-center text-sm mt-2">Belajar jadi lebih seru dengan sistem poin, tantangan, dan progres yang memotivasi kamu untuk terus berkembang.</p>
    </div>
    <div class="md:basis-auto">
      <img src="{{asset('images/star-icon.png')}}" alt="books" class="m-auto w-[140px]">
      <h3 class="font-display text-2xl text-primary-400 text-center">Antarmuka segar dan baru</h3>
      <p class="font-merriweather font-light leading-6 text-center text-sm mt-2">Belajar jadi lebih seru dengan sistem poin, tantangan, dan progres yang memotivasi kamu untuk terus berkembang.</p>
    </div>
  </div>
</div>


{{-- sugma-mockup phone --}}
<div class="flex md:flex-row flex-col gap-8 md:gap-4 md:justify-center md:items-end border-b border-neutral-300 pb-10 max-w-[1440px] mx-auto md:mt-24 mt-12">
  <div class="px-4">
    <img src="{{asset('images/mockup-sugma.png')}}" alt="mockup" class="m-auto">
    <h2 class="font-display text-primary-400 text-2xl md:text-3xl text-center mt-7">Pengalaman Baru Dalam Belajar</h2>
    <p class="font-merriweather font-light leading-6 mt-2 text-center text-sm">Sistem kuis yang baru dan lebih interaktif. Belajar jadi lebih seru dan termotivasi.</p>
  </div>
  <div class="px-4">
    <img src="{{asset('images/sugma-mockup-2.png')}}" alt="mockup-2" class="m-auto">
    <h2 class="font-display text-primary-400 text-2xl md:text-3xl text-center">Elemen Gamifikasi Baru</h2>
    <p class="font-merriweather font-light leading-6 mt-2 text-center text-sm">Leaderboard, badge, progress tracking. Elemen gamifikasi untuk menjaga semangat dan motivasi belajarmu.</p>
  </div>
</div>

  {{-- sugma explanation --}}
  <div class="flex items-center justify-between px-4 my-10 max-w-[1440px] m-auto md:justify-center md:gap-24">
    <div>
      <h1 class="font-display text-2xl md:text-4xl">Temui <span class="text-primary-300">Sugma</span> Maskot kami yang siap membantu </h1>
      <p class="font-merriweather font-light mt-3 text-sm md:text-base leading-6">Hai teman-teman aku Sugma. Salam Kenal yaa.</p>
    </div>
    <img src="{{asset('images/sugma-shy.png')}}" alt="sugma shy" class="w-[145px] md:w-auto">
  </div>

{{-- Footer --}}
  <div class="flex justify-between items-center px-4 mt-6 max-w-[1440px] m-auto border-t border-neutral-300 py-10">
    <div class="flex items-center gap-2 justify-center">
      <img src="{{ asset('images/sukmabelajar2-logo.png')}}" alt="logo" class="w-24">
      {{-- <div class="font-display text-primary-300 text-xl">Sukma<span class="text-primary-200">Belajar</span></div> --}}
    </div>
    <a href="/onboarding" class="block bg-primary-400 py-2 md:px-10 px-4 rounded-sm shadow-button font-display text-neutral-100 tracking-wider text-xl">Register</a>
  </div>

</x-guest>