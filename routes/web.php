<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Classes;
use App\Livewire\ClassLecturer;
use App\Livewire\Classroom;
use App\Livewire\Course;
use App\Livewire\Courses\ClassShow;
use App\Livewire\Dashboard;
use App\Livewire\DashboardDosen;
use App\Livewire\KelasDosen;
use App\Livewire\Modules\ModulesShow;
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

Route::middleware(['auth', 'role:dosen'])->group(function () {
  Route::get('/kelas/dosen', ClassLecturer::class)
    ->name('classLecturer');
});


Route::view('/onboarding', 'onboarding.index')->name('onboarding');

Route::get('/daftar', \App\Livewire\Auth\Register::class);
Route::get('/login', Login::class)->name('login');

Route::get('/kelas/{slug}', ClassShow::class)->name('classes.show');
Route::get('/kelas/{slug}/modul/{moduleSlug}', ModulesShow::class)->name('modules.show');
