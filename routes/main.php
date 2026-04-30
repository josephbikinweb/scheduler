<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('projects')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('projects.index');
    Route::get('/create', [UserController::class, 'create'])->name('projects.create');
    Route::post('/', [UserController::class, 'store'])->name('projects.store');
    Route::get('/{project}', [UserController::class, 'show'])->name('projects.show');
    Route::get('/{project}/edit', [UserController::class, 'edit'])->name('projects.edit');
    Route::patch('/{project}', [UserController::class, 'update'])->name('projects.update');
    Route::delete('/{project}', [UserController::class, 'destroy'])->name('projects.destroy');
});
