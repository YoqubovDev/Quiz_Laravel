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

Route::get('/dashboard', function () {
    return view('dashboard.home');
});

Route::get('/dashboard/take-quiz', function () {
    return view('take-quiz.take-quiz');
});

Route::get('/dashboard/create-quiz', function () {
    return view('dashboard.create-quiz');
});

Route::get('/dashboard/my-quizzes', function () {
    return view('dashboard.my-quizzes');
});

Route::get('/dashboard/statistics', function () {
    return view('dashboard.statistics');
});

