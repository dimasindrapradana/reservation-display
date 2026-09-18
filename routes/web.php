<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\DisplayApiController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/display/{buildingCode}', [DisplayController::class, 'index']);
Route::get('/display2/{buildingCode}', [DisplayController::class, 'index2']);
Route::get('/api/display2/{buildingCode}', [DisplayApiController::class, 'index']);


Route::get('/security', function () {
    return view('display.security');
});

Route::get('/api/security', [DisplayApiController::class, 'security']);