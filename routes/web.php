<?php

use App\Http\Middleware\CustomDomain;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(CustomDomain::class);
