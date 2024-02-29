<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\TagController;
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

Route::get('/tags', [TagController :: class, 'index']) -> name('tags.index');

Route::get('/events', [EventController :: class, 'index']) -> name('events.index');
Route::get('/events/show/{id}', [EventController :: class, 'show']) -> name('events.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Event
    Route::get('/events/{id}/edit', [EventController::class, 'edit']) ->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update']) ->name('events.update');

    Route::get('/events/create', [EventController :: class, 'create']) -> name('events.create');
    Route::post('/events/create', [EventController :: class, 'store']) -> name('events.store');
});

require __DIR__.'/auth.php';
