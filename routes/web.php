<?php

use Shlok\Maker\Controllers\MarketController;
use Illuminate\Support\Facades\Route;

Route::get('warning', function () {
    return view('shlok.maker::warning');
})->name('warning');