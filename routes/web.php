<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/{pathMatch}',function() {
    return view('welcome');
});
use App\Http\Controllers\AuthController;

Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);
Route::post('/api/logout', [AuthController::class, 'logout'])->middleware('auth');

use App\Http\Controllers\CourseController;
Route::get('/api/courses', [CourseController::class, 'index']);
Route::get('/api/courses/{id}', [CourseController::class, 'show']);
Route::get('/api/courses/{id}/lessons', [CourseController::class, 'getLessons']);
Route::post('/api/courses/{id}/enroll', [CourseController::class, 'enroll']);