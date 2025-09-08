<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPanel\DashboardController;



Route::get('/',function(){
    dd('home');
});


Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});



require __DIR__.'/auth.php';
