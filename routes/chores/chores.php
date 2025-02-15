<?php

use App\Http\Controllers\ChoreController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::put('/{id}', [ChoreController::class, 'updateStatus'])->name('chore.updateStatus');
    Route::delete('/{id}', [ChoreController::class, 'delete'])->name('chore.delete');

    // ALTA CHORE
    Route::get('/register', [ChoreController::class, 'showRegister'])->name('chore.showRegister');
    Route::post('/register/{userId}', [ChoreController::class, 'doRegister'])->name('chore.doRegister');
});



