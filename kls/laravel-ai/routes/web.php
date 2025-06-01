<?php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServiceController;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact.index');
Route::get('/tentang-kami', function () {
    return view('about.index');
})->name('about.index');

Route::get('/booking', [PageController::class, 'booking'])->name('booking.index');
Route::get('/services/search', [App\Http\Controllers\ServiceController::class, 'search'])->name('services.search');
