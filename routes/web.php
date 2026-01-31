<?php

use App\Livewire\Course;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/kelas', Course::class);
Route::get('/dashboard', Dashboard::class);
