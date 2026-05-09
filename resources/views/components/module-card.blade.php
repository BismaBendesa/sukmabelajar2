@php
    $isDefault = $mode === 'default';
    $isTryAgain = $mode === 'try-again';
    $isDone = $mode === 'done';
    $isLocked = $mode === 'locked';

    // There is a lot of state that will need to be handled in this conponent. For now it is default mode. Comeback later
    // TODO
    // User.php (model)
    // public function modules()
    // {
    //     return $this->belongsToMany(Module::class)
    //         ->withPivot(['progress', 'is_completed'])
    //         ->withTimestamps();
    // }
    // module_user_progress
    // ---------------------
    // id
    // user_id
    // module_id
    // progress (0–100)
    // is_completed (bool)

    //  ClassShow.php (livewire)
    //     $modules = $this->class->modules->map(function ($module) {
    //     $progress = auth()->user()
    //         ->modules()
    //         ->where('module_id', $module->id)
    //         ->first()?->pivot->progress ?? 0;

    //     return [
    //         'model' => $module,
    //         'progress' => $progress,
    //         'mode' => $this->determineMode($progress),
    //     ];
    // });

    // Model Logic in ModuleCard.php
    // function determineMode($progress)
    // {
    //     if ($progress == 100) return 'done';
    //     if ($progress > 0) return 'in-progress';
    //     return 'locked'; // or 'available' depending on logic
    // }
@endphp
<a href="{{ route('modules.show', ['slug' => $module->classroom->slug, 'moduleSlug' => $module->slug]) }}" class="block w-full relative">
    <div  @class([
        'px-4 py-4 mx-4 border rounded-md shadow-module-card transition-all duration-300',

        'bg-neutral-100 border-neutral-400 text-neutral-900'
            => $isDefault,

        'bg-warning-50 border-warning-300 text-warning-400'
            => $isTryAgain,

        'bg-primary-300 border-primary-300 text-neutral-100'
            => $isDone,

        'bg-neutral-300 border-neutral-400 text-neutral-500 opacity-70'
            => $isLocked,
    ])>
        <div class="flex items-center justify-between">
            {{-- {{$module}} --}}
            <h1 class="font-display text-xl ">{{$module->title}}</h1>
            <span class="font-merriweather font-light text-sm">100%</span>
        </div>
        <div>
            <span @class([
                'font-display text-xl',
                'text-neutral-300' => $isDone,
                'text-primary-300' => $isLocked,
            ])>+10XP</span>
            <span class="font-merriweather font-light text-sm text-capitalize">| Tipe : {{$module->type}}</span>
            @if ($module->type === 'materi')
                {{-- Icon Material --}}
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
                <path d="M10 5.03473C8.67311 3.84713 6.92089 3.125 5 3.125C4.12341 3.125 3.28195 3.27539 2.5 3.55176V15.4268C3.28195 15.1504 4.12341 15 5 15C6.92089 15 8.67311 15.7221 10 16.9097M10 5.03473C11.3269 3.84713 13.0791 3.125 15 3.125C15.8766 3.125 16.7181 3.27539 17.5 3.55176V15.4268C16.7181 15.1504 15.8766 15 15 15C13.0791 15 11.3269 15.7221 10 16.9097M10 5.03473V16.9097" stroke="{{ $isDone ? '#FFFFFF' : '#000000' }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            @else
                {{-- Icon Test --}}
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
                    <path d="M14.0514 3.73889L15.4576 2.33265C16.0678 1.72245 17.0572 1.72245 17.6674 2.33265C18.2775 2.94284 18.2775 3.93216 17.6674 4.54235L8.81849 13.3912C8.37792 13.8318 7.83453 14.1556 7.23741 14.3335L5 15L5.66648 12.7626C5.84435 12.1655 6.1682 11.6221 6.60877 11.1815L14.0514 3.73889ZM14.0514 3.73889L16.25 5.93749M15 11.6667V15.625C15 16.6605 14.1605 17.5 13.125 17.5H4.375C3.33947 17.5 2.5 16.6605 2.5 15.625V6.87499C2.5 5.83946 3.33947 4.99999 4.375 4.99999H8.33333" stroke="{{ $isDone ? '#FFFFFF' : '#000000' }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
    
            @endif
    
        {{-- Icon Customize per Status --}}
        @if($isDone)
            <div class="absolute right-3 bottom-[-10px]">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.055 6.64782C16.4973 4.98913 18.6258 3.9375 21 3.9375C23.3741 3.9375 25.5024 4.98903 26.9447 6.64758C29.1377 6.49436 31.3866 7.25578 33.0656 8.93475C34.7446 10.6137 35.506 12.8627 35.3528 15.0556C37.0111 16.4979 38.0625 18.6261 38.0625 21C38.0625 23.3743 37.0107 25.5029 35.3519 26.9452C35.5047 29.1378 34.7433 31.3863 33.0646 33.065C31.3859 34.7436 29.1375 35.5051 26.9449 35.3522C25.5026 37.0109 23.3742 38.0625 21 38.0625C18.626 38.0625 16.4976 37.011 15.0553 35.3525C12.8624 35.5057 10.6134 34.7443 8.9344 33.0653C7.25542 31.3863 6.494 29.1374 6.64722 26.9444C4.98887 25.5021 3.9375 23.3739 3.9375 21C3.9375 18.626 4.98898 16.4976 6.64747 15.0554C6.49442 12.8626 7.25586 10.6139 8.93469 8.93504C10.6135 7.2562 12.8623 6.49476 15.055 6.64782ZM27.318 17.8254C27.7393 17.2355 27.6027 16.4158 27.0129 15.9945C26.423 15.5732 25.6033 15.7098 25.182 16.2996L19.52 24.2264L16.6781 21.3844C16.1655 20.8719 15.3345 20.8719 14.8219 21.3844C14.3094 21.897 14.3094 22.728 14.8219 23.2406L18.7594 27.1781C19.0322 27.4509 19.4113 27.5898 19.7958 27.558C20.1803 27.5262 20.5313 27.3268 20.7555 27.0129L27.318 17.8254Z" fill="#D9F0F3"/>
                </svg>
            </div>
            @elseif($isTryAgain)
            <div class="absolute right-3 bottom-[-10px]">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4521 5.25585C18.4725 1.75391 23.5267 1.75391 25.5471 5.25585L38.4172 27.564C40.4364 31.064 37.9104 35.4375 33.8697 35.4375H8.12953C4.08883 35.4375 1.56283 31.064 3.58206 27.564L16.4521 5.25585ZM21 14.4374C21.7248 14.4374 22.3125 15.025 22.3125 15.7499V22.3124C22.3125 23.0373 21.7248 23.6249 21 23.6249C20.2751 23.6249 19.6875 23.0373 19.6875 22.3124V15.7499C19.6875 15.025 20.2751 14.4374 21 14.4374ZM21 28.8749C21.7248 28.8749 22.3125 28.2873 22.3125 27.5624C22.3125 26.8375 21.7248 26.2499 21 26.2499C20.2751 26.2499 19.6875 26.8375 19.6875 27.5624C19.6875 28.2873 20.2751 28.8749 21 28.8749Z" fill="#AA9F25"/>
                </svg>
            </div>
            @elseif($isLocked)
            <div class="absolute right-3 bottom-[-10px]">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 2.625C15.9259 2.625 11.8125 6.73838 11.8125 11.8125V17.0625C8.91301 17.0625 6.5625 19.413 6.5625 22.3125V34.125C6.5625 37.0245 8.913 39.375 11.8125 39.375H30.1875C33.087 39.375 35.4375 37.0245 35.4375 34.125V22.3125C35.4375 19.413 33.087 17.0625 30.1875 17.0625V11.8125C30.1875 6.73838 26.0741 2.625 21 2.625ZM27.5625 17.0625V11.8125C27.5625 8.18813 24.6244 5.25 21 5.25C17.3756 5.25 14.4375 8.18813 14.4375 11.8125V17.0625H27.5625Z" fill="#61605E"/>
                </svg>
            </div>
                
            @endif
        </div>
    </div>
</a>