<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;

Route::get('/', function () {
    return view('pages.admin.dashboard');
});

/*
    Admin
        1. Dashboard
        2.
*/
