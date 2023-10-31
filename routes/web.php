<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashBoardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('dashboard', [DashboardController::class, 'index']);

Route::prefix('user')->group(function () {

    Route::GET('list/users', [UserController::class, 'index'])->name('list.users');
    Route::GET('create/user', [UserController::class, 'create'])->name('create.user');
    Route::POST('store/user', [UserController::class, 'store'])->name('store.user');
    Route::GET('edit/user/{user_id}', [UserController::class, 'show'])->name('edit.user');

});




Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard12133', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
