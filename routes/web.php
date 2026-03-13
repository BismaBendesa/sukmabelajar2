<?php

use App\Livewire\Course;
use App\Livewire\Classes;
use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\ClassLecturer;
use App\Livewire\Classroom;
use App\Livewire\DashboardDosen;
use App\Livewire\KelasDosen;
use Illuminate\Support\Facades\Route;

Route::get('/kelas', Classroom::class)->middleware('auth')->name('classes');
Route::get('/kelas/modul', Course::class)->middleware('auth')->name('course');

Route::middleware(['auth', 'role:dosen'])->group(function () {
  Route::get('/dashboard/dosen', DashboardDosen::class)
    ->name('dashboard.dosen');
});

Route::middleware(['auth', 'role:mhs'])->group(function () {
  Route::get('/dashboard/mahasiswa', Dashboard::class)
    ->name('dashboard');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
  Route::get('/kelas/dosen', ClassLecturer::class)
    ->name('classLecturer');
});


Route::view('/onboarding', 'onboarding.index')->name('onboarding');

Route::get('/daftar', Register::class);
Route::get('/login', Login::class)->name('login');
