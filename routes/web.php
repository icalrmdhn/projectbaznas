<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/form', [FormController::class, 'index'])->name('form');
    Route::post('/form', [FormController::class, 'store'])->name('form-store');
    Route::get('/form/edit/{id}', [FormController::class, 'edit'])->name('form-edit');
    Route::put('/form/edit/{id}', [FormController::class, 'update'])->name('form-update');
    Route::delete('/form/delete/{id}', [FormController::class, 'destroy'])->name('form-destroy');
    Route::get('/form/print/{id}', [FormController::class, 'download'])->name('form-print');

    Route::get('/user-profile',[UserController::class, 'profile'])->name('user-profile');
    Route::get('/user-management/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::put('/user-management/edit/{id}', [UserController::class, 'update'])->name('user-update');
    
});

Route::group(['middleware' => 'isKoordinator'], function () {
    Route::get('/user-management',[UserController::class, 'index'])->name('user-management');
    Route::get('/user-management/create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user-management/create', [UserController::class, 'store'])->name('user-store');
    
    Route::delete('/user-management/delete/{id}', [UserController::class, 'destroy'])->name('user-destroy');
 

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post("/login/authenticate", [AuthenticateController::class, 'authenticate'])->name('authenticate');

});
Route::post("/logout", [AuthenticateController::class, 'logout'])->name('logout');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return 'storage link success';
});


