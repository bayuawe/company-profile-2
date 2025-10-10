<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/products', [FrontController::class, 'products'])->name('front.products');
Route::get('/products/{slug}', [FrontController::class, 'productDetail'])->name('front.products.detail');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontController::class, 'submitContact'])->name('front.contact.submit');
