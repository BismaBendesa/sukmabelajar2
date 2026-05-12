<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\ClassLecturer;
use App\Livewire\Classroom;
use App\Livewire\Course;
use App\Livewire\Courses\ClassShow;
use App\Livewire\Dashboard;
use App\Livewire\DashboardDosen;
use App\Livewire\KelasDosen;
use App\Livewire\Leaderboard;
use App\Livewire\LeaderboardIndex;
use App\Livewire\Modules\ModuleResult;
use App\Livewire\Modules\ModulesShow;
use App\Models\Classroom as ModelsClassroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

  if (Auth::check()) {

    $user = Auth::user();

    if ($user->role === 'dosen') {
      return redirect()->route('dashboard.dosen');
    }

    if ($user->role === 'mhs') {
      return redirect()->route('dashboard');
    }
  }
  return view('landing-page.index');
});

Route::get('/verify-email', VerifyEmail::class)->name('verification.notice');

Route::get('/kelas', Classroom::class)->middleware('auth')->name('classes');
Route::get('/kelas/modul', Course::class)->middleware('auth')->name('course');

Route::middleware(['auth', 'role:dosen'])->group(function () {
  Route::get('/dashboard/dosen', DashboardDosen::class)
    ->name('dashboard.dosen');
});

Route::middleware(['auth', 'role:mhs', 'verified'])->group(function () {
  Route::get('/dashboard/mahasiswa', Dashboard::class)
    ->name('dashboard');
});

// Route Template
Route::middleware(['auth', 'role:dosen'])->group(function () {
  Route::get('/kelas/dosen', ClassLecturer::class)
    ->name('classLecturer');
});


Route::view('/onboarding', 'onboarding.index')->name('onboarding');

Route::get('/daftar', \App\Livewire\Auth\Register::class);
Route::get('/login', Login::class)->name('login');


// NEED REFACTORING: Route below need refactoring to add middleware 
Route::get('/kelas/{slug}', ClassShow::class)->name('classes.show');
Route::get('/kelas/{slug}/modul/{moduleSlug}', ModulesShow::class)->name('modules.show');

// Route for starting a module, will set session for timer if it's a test, then redirect to content
Route::get('/modules/{slug}/{moduleSlug}/start', function ($slug, $moduleSlug) {
  $module = ModelsClassroom::where('slug', $slug)
    ->first()
    ->modules()
    ->where('slug', $moduleSlug)
    ->first();

  if ($module->type !== 'materi') {
    $timeLimit = $module->test?->time_limit_minutes;

    if ($timeLimit) {
      session([
        'test_end_time_' . $module->id => now()->addMinutes($timeLimit)->timestamp
      ]);
    }
  }

  return redirect()->route('modules.content', compact('slug', 'moduleSlug'));
})->name('modules.start');

Route::get('/kelas/{slug}/modul/{moduleSlug}/content', \App\Livewire\Modules\ModuleContent::class)->name('modules.content');
Route::get('/kelas/{slug}/modul/{moduleSlug}/result', ModuleResult::class)->name('modules.result');

Route::get('/leaderboard', LeaderboardIndex::class)
  ->name('leaderboard.index');

Route::get('/leaderboard/{slug}', Leaderboard::class)
  ->name('leaderboard.class');
