<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/display/{buildingCode}', [DisplayController::class, 'index']);
Route::get('/display2/{buildingCode}', [DisplayController::class, 'index2']);