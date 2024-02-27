<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/projects', ProjectController::class);
    Route::get('admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
});

Route::get('admin/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
Route::get('admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
Route::put('admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
Route::delete('admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
require __DIR__.'/auth.php';
