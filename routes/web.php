<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\ApiController;

Route::get('/api/articles/sao', [ApiController::class, 'getArticlesOfSao']);
Route::get('/api/audiences/climate', [ApiController::class, 'getAudiencesOfClimateArticle']);
Route::get('/api/audiences/sok', [ApiController::class, 'getAudiencesOfSok']);
Route::get('/api/comments/samnang', [ApiController::class, 'getCommentsOfSamnang']);
Route::get('/api/comments/all', [ApiController::class, 'getAllCommentsWithTopics']);
