<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Dashboard

Route::get('/dashboard', [DashboardController::class, 'home'])->name('home');
Route::get('/dashboard/my-quizzes', [DashboardController::class, 'my_quizzes'])->name('my-quizzes');
Route::get('/dashboard/create-quiz', [DashboardController::class, 'create_quiz'])->name('create_quiz');
Route::get('/dashboard/statistics', [DashboardController::class, 'statistics'])->name('statistics');

//Quiz
Route::get('/take-quiz',[QuizController::class,'take_quiz'])->middleware('auth')->name('take_quiz');

//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
