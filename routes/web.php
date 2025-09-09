<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPanel\TodoListController;
use App\Http\Controllers\AdminPanel\DashboardController;



Route::get('/',function(){
    dd('home');
});


Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::prefix('lists')->group(function(){
        Route::get('/',[TodoListController::class,'index'])->name('admin.lists.index');
        Route::get('/create',[TodoListController::class,'create'])->name('admin.lists.create');
        Route::post('/store',[TodoListController::class,'store'])->name('admin.lists.store');
        Route::get('/show/{todoList}',[TodoListController::class,'show'])->name('admin.lists.show');
        Route::get('/edit/{todoList}',[TodoListController::class,'edit'])->name('admin.lists.edit');
        Route::put('/update/{todoList}',[TodoListController::class,'update'])->name('admin.lists.update');
        Route::delete('/delete/{todoList}',[TodoListController::class,'destroy'])->name('admin.lists.destroy');
    });
});



require __DIR__.'/auth.php';
