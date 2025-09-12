<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\TodoJobController;
use App\Http\Controllers\AdminPanel\TodoListController;
use App\Http\Controllers\AdminPanel\DashboardController;



Route::get('/', function () {
    return view('main.home');
})->name('home');


Route::prefix('admin')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('lists')->group(function () {
        Route::get('/', [TodoListController::class, 'index'])->name('admin.lists.index');
        Route::get('/create', [TodoListController::class, 'create'])->name('admin.lists.create');
        Route::post('/store', [TodoListController::class, 'store'])->name('admin.lists.store');
        Route::get('/edit/{todoList}', [TodoListController::class, 'edit'])->name('admin.lists.edit');
        Route::put('/update/{todoList}', [TodoListController::class, 'update'])->name('admin.lists.update');
        Route::delete('/delete/{todoList}', [TodoListController::class, 'destroy'])->name('admin.lists.destroy');

        Route::prefix('tasks/{todoList}')->group(function () {
            Route::get('/', [TodoJobController::class, 'index'])->name('admin.lists.tasks.index');
            Route::get('/create', [TodoJobController::class, 'create'])->name('admin.lists.tasks.create');
            Route::post('/store', [TodoJobController::class, 'store'])->name('admin.lists.tasks.store');
            Route::get('/edit/{todoJob}', [TodoJobController::class, 'edit'])->name('admin.lists.tasks.edit');
            Route::put('/update/{todoJob}', [TodoJobController::class, 'update'])->name('admin.lists.tasks.update');
            Route::delete('/delete/{todoJob}', [TodoJobController::class, 'destroy'])->name('admin.lists.tasks.destroy');
            Route::get('/change-status/{todoJob}', [TodoJobController::class, 'changeStatus'])->name('admin.lists.tasks.changeStatus');
        });
    });

    Route::get('/settings', [SettingController::class,'index'])->name('admin.settings.index');
    Route::put('/settings/update', [SettingController::class,'update'])->name('admin.settings.update');
    Route::get('/settings/set-default', [SettingController::class,'setDefault'])->name('admin.settings.set-default');
    Route::delete('/settings/delete-files', [SettingController::class,'deleteFiles'])->name('admin.settings.delete-files');


});



require __DIR__ . '/auth.php';
