<?php

use App\Livewire\Login;
use App\Livewire\Home;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\TodoList;

Route::get('/', Home::class)->name('home');
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/todos', TodoList::class)->name('todos')->middleware('auth');
Route::post('/logout', function() {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');


