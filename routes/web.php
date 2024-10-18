<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

Route::get('/contact', function () {
    return view('contact-form');
})->name('contact.form');

Route::post('/contact', [AjaxController::class, 'store'])->name('contact.store');
