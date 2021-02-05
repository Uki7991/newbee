<?php
use src\core\Route;

Route::get('/', \app\controllers\IndexController::class, 'index');
Route::get('/login', \app\controllers\LoginController::class, 'loginForm')->middleware('guest');
Route::post('/login', \app\controllers\LoginController::class, 'login')->middleware('guest');
Route::post('/logout', \app\controllers\LoginController::class, 'logout')->middleware('auth');
Route::get('/register', \app\controllers\LoginController::class, 'registerForm')->middleware('guest');
Route::post('/register', \app\controllers\LoginController::class, 'register')->middleware('guest');
Route::get('/tasks', \app\controllers\TaskController::class, 'index');
Route::post('/tasks', \app\controllers\TaskController::class, 'store');
Route::post('/tasks/([0-9]+)', \app\controllers\TaskController::class, 'destroy')->middleware('admin');