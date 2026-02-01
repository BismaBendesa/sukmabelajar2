<?php

use App\Livewire\Classes;
use App\Livewire\Course;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/kelas', Classes::class);
Route::get('/kelas/modul', Course::class);
Route::get('/dashboard', Dashboard::class);
