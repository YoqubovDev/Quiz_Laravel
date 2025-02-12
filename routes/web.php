<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Dashboard

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/statistics', [DashboardController::class, 'statistics'])->name('statistics');

    //QuizCreate
    Route::get('/quizzes', [QuizController::class, 'index'])->name('my-quizzes');
    Route::get('/quizzes/{quiz}', [QuizController::class, 'edit'])->name('edit-quiz');
    Route::get('/quizzes/{quiz}/update', [QuizController::class, 'edit'])->name('update-quiz');
    Route::get('/create-quiz', [QuizController::class, 'create'])->name('create_quiz');
    Route::post('/create-quiz', [QuizController::class, 'store'])->name('create_quiz');
});

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
