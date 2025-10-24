<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/products', [FrontController::class, 'products'])->name('front.products');
Route::get('/products/{slug}', [FrontController::class, 'productDetail'])->name('front.products.detail');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontController::class, 'submitContact'])->name('front.contact.submit');
Route::get('/sitemap', [FrontController::class, 'sitemap'])->name('front.sitemap');
Route::get('/sitemap.xml', [FrontController::class, 'sitemapXml'])->name('front.sitemap.xml');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// AJAX routes for regions
Route::get('/api/regencies', [RegisterController::class, 'getRegencies']);
Route::get('/api/districts', [RegisterController::class, 'getDistricts']);
Route::get('/api/villages', [RegisterController::class, 'getVillages']);
