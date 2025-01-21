<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('upload-excel', [ExcelController::class, 'showForm'])->name('upload.form');
Route::post('upload-excel', [ExcelController::class, 'upload'])->name('upload.excel');
