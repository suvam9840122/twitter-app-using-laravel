<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/terms', function () {
    return view('terms');
});
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/ideas',[IdeaController::class,'store'])->name('ideas.store');
Route::get('/ideas/{idea}',[IdeaController::class,'show'])->name('ideas.show');
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');