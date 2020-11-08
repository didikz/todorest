<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Todo\SectionController;
use App\Http\Controllers\API\Todo\SectionTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth', [LoginController::class, 'attempt'])->name('api.auth');

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::resource('/sections', SectionController::class)->except(['create', 'edit']);
    Route::get('/sections/{section}/tasks', [SectionTaskController::class, 'index'])->name('sections.tasks');
    Route::get('/sections/{section}/tasks/{task}', [SectionTaskController::class, 'show'])->name('sections.tasks.show');
});
