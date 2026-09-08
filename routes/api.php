<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::get('/avisos', [PostController::class, 'index']);
Route::get('/avisos/{post}', [PostController::class, 'show']);
Route::get('/resumen', [PostController::class, 'resumen']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
