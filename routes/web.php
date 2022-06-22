<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/blank', function () {
    return view('blank');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware('role:' . User::ADMIN)
        ->prefix('administrator')
        ->name('admin.')
        ->group(function (){
            Route::get('/', [HomeController::class, 'index'])->name('index');
            Route::livewire('/category', 'administrator.category.index')->name('cat.index');
            Route::livewire('/category/create', 'administrator.category.create')->layout('layouts.simple')->name('cat.create');
            Route::livewire('/category/edit/{id}', 'administrator.category.edit')->layout('layouts.simple')->name('cat.edit');

            Route::livewire('/kas', 'administrator.kas.index')->name('kas.index');
            Route::livewire('/kas/create', 'administrator.kas.create')->layout('layouts.simple')->name('kas.create');
            Route::livewire('/kas/edit/{id}', 'administrator.kas.edit')->layout('layouts.simple')->name('kas.edit');

            Route::livewire('/kaskeluar', 'administrator.kaskeluar.index')->name('kaskeluar.index');
            Route::livewire('/kaskeluar/create', 'administrator.kaskeluar.create')->layout('layouts.simple')->name('kaskeluar.create');
            Route::livewire('/kaskeluar/edit/{id}', 'administrator.kaskeluar.edit')->layout('layouts.simple')->name('kaskeluar.edit');
            Route::livewire('/kaskeluar/show/{id}', 'administrator.kaskeluar.show')->layout('layouts.simple')->name('kaskeluar.show');

            Route::livewire('/setting', 'administrator.setting.index')->name('setting.index');
            Route::livewire('/nota', 'administrator.nota.index')->name('nota.index');
    });

    Route::middleware('role:' . User::DRIVER)
        ->prefix('driver')
        ->name('driver.')
        ->group(function (){
            Route::get('/', [HomeController::class, 'index'])->name('index');
    });
});

Auth::routes();
