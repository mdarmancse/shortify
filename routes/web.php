<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;



Route::get('/', [UrlShortenerController::class, 'index'])->name('url.shortener');
Route::post('/url-shortener', [UrlShortenerController::class, 'shorten'])->name('url.shorten');
Route::get('/{shortCode}', [UrlShortenerController::class, 'redirect']);
Route::get('/analytics/{shortCode}', [UrlShortenerController::class, 'analytics'])->name('url.analytics');
