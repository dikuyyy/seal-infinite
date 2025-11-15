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

Route::get('/shop', function () {
    return view('pages.shop.index');
})->name('shop');

Route::get('/donate', function () {
    return view('pages.donate.index');
})->name('donate');

Route::get('/download', function () {
    return view('pages.download.index');
})->name('download');

Route::get('/rankings', function () {
    return view('pages.rank.index');
})->name('rankings');

Route::get('/events/{event}', function ($event) {
    return view('pages.event-detail.index', ['event' => $event]);
})->name('events');
