<?php

use App\Http\Controllers\FileController;
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
Route::post('/files', [FileController::class, 'upload']);
Route::get('/files', [FileController::class, 'getAll']);
Route::get('/files/{filename}', [FileController::class, 'download']);
Route::delete('/files/{filename}', [FileController::class, 'delete']);
