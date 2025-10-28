<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
});

Route::get('/login', function () {
    return view('pages.login.index');
});

Route::get('/registration', function () {
    return view('pages.registration.index');
});

Route::get('/account-manager', function () {
    return view('pages.account-manager.index');
});