<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/take-quiz', function () {
    return view('take-quiz.take-quiz');
});
Route::get('/create-quiz', function () {
    return view('dashboard.create-quiz');
});
Route::get('/my-quizzes', function () {
    return view('dashboard.my-quizzes');
});

