<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('tarefas', [TarefasController::class, 'index'])->name('tarefas.index');
    Route::get('/tarefas/create', [TarefasController::class, 'create'])->name('tarefas.create');
    Route::post('tarefas/store', [TarefasController::class, 'store'])->name('tarefas.store');

    Route::get('/tarefas/editar/{id}',[TarefasController::class,'edit'])->name('tarefas.edit');
    Route::put('/tarefas/editar/{id}', [TarefasController::class, 'update'])->name('tarefas.update');
    Route::get('/tarefas/delete/{id}', [TarefasController::class, 'destroy'])->name('tarefas.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
