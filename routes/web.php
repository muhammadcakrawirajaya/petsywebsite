<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

// Route::resource("/pets", PetsController::class);

Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
    Route::get('', 'index')->name('employee');
    Route::get('create', 'create')->name('employee.create');
    Route::post('store', 'store')->name('employee.store');


    // Route::resource("/employee", EmployeeController::class);
});

Route::controller(PetController::class)->prefix('pet')->group(function () {
    Route::get('', 'index')->name('pet');
    Route::get('create', 'create')->name('pet.create');
    Route::post('store', 'store')->name('pet.store');
    Route::get('edit/{id}', 'edit')->name('pet.edit');
    Route::put('edit/{id}', 'update')->name('pet.update');
    Route::delete('destroy/{id}', 'destroy')->name('pet.destroy');

    // Route::resource("/employee", EmployeeController::class);
});
