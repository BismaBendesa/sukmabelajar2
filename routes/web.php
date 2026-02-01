<?php

use App\Livewire\Course;
use App\Livewire\Classes;
use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('/kelas', Classes::class)->middleware('auth')->name('classes');
Route::get('/kelas/modul', Course::class)->middleware('auth')->name('course');
Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');
Route::get('/daftar', Register::class);
Route::get('/login', Login::class)->name('login');
