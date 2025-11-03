<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::get('/login', function () {
    return view('pages.login.index');
})->name('login');

Route::get('/registration', function () {
    return view('pages.registration.index');
})->name('registration');

Route::get('/account-manager', function () {
    return view('pages.account-manager.index');
})->name('account-manager');
