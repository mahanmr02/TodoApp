<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\App\AppListController;
use App\Http\Controllers\App\AppTaskController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\TodoJobController;
use App\Http\Controllers\AdminPanel\TodoListController;
use App\Http\Controllers\AdminPanel\DashboardController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/send-message', [HomeController::class, 'sendMessage'])->name('home.send-message');

Route::prefix('app')->middleware(['auth','verified'])->group(function () {
    Route::get('/', [AppController::class, 'index'])->name('app.index');
    Route::post('/store-list', [AppController::class, 'storeList'])->name('app.store-list');
    Route::delete('/destroy-list/{list}', [AppController::class, 'destroyList'])->name('app.destroy-list');


    Route::prefix('lists')->group(function () {
        Route::prefix('tasks')->group(function () {
            Route::get('/', [AppTaskController::class, 'index'])->name('app.lists.tasks.index');
            Route::post('/store', [AppTaskController::class, 'store'])->name('app.lists.tasks.store');
            Route::put('/update/{task}', [AppTaskController::class, 'update'])->name('app.lists.tasks.update');
            Route::get('/change-status/{task}', [AppTaskController::class, 'changeStatus'])->name('app.lists.tasks.change-status');
            Route::delete('/delete/{task}', [AppTaskController::class, 'destroy'])->name('app.lists.tasks.destroy');

        });
        Route::get('/show/{list}', [AppListController::class, 'index'])->name('app.lists.show');
        Route::put('/update/{list}', [AppListController::class, 'update'])->name('app.lists.update');
        Route::delete('/delete/{list}', [AppListController::class, 'destroy'])->name('app.lists.destroy');
    });
});

Route::prefix('admin')->middleware(['auth', 'is_admin', 'verified'])->group(function () {
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

    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');
    Route::get('/settings/set-default', [SettingController::class, 'setDefault'])->name('admin.settings.set-default');
    Route::delete('/settings/delete-files', [SettingController::class, 'deleteFiles'])->name('admin.settings.delete-files');
});


Route::get('/z', function () {
    Auth::logout();
});
require __DIR__ . '/auth.php';
