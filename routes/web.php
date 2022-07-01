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

Route::get('/test', function () {
    event(new App\Events\Notify('Someone'));
    return "Event has been sent!";
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
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

            Route::livewire('/sarana', 'administrator.sarana.index')->name('sarana.index');
            Route::livewire('/sarana/create', 'administrator.sarana.create')->layout('layouts.simple')->name('sarana.create');
            Route::livewire('/sarana/edit/{id}', 'administrator.sarana.edit')->layout('layouts.simple')->name('sarana.edit');

            Route::livewire('/bahanbakar', 'administrator.bahanbakar.index')->name('bahanbakar.index');
            Route::livewire('/bahanbakar/create', 'administrator.bahanbakar.create')->layout('layouts.simple')->name('bahanbakar.create');
            Route::livewire('/bahanbakar/edit/{id}', 'administrator.bahanbakar.edit')->layout('layouts.simple')->name('bahanbakar.edit');

            Route::livewire('/kaskeluar', 'administrator.kaskeluar.index')->name('kaskeluar.index');
            Route::livewire('/kaskeluar/create', 'administrator.kaskeluar.create')->layout('layouts.simple')->name('kaskeluar.create');
            Route::livewire('/kaskeluar/edit/{id}', 'administrator.kaskeluar.edit')->layout('layouts.simple')->name('kaskeluar.edit');
            Route::livewire('/kaskeluar/show/{id}', 'administrator.kaskeluar.show')->layout('layouts.simple')->name('kaskeluar.show');

            Route::livewire('/setting', 'administrator.setting.index')->name('setting.index');
            Route::livewire('/nota', 'administrator.nota.index')->name('nota.index');
            Route::livewire('/nota/show/{id}', 'administrator.nota.show')->layout('layouts.simple')->name('nota.show');
    });

    Route::middleware('role:' . User::DRIVER)
        ->prefix('driver')
        ->name('driver.')
        ->group(function (){
            Route::get('/', [HomeController::class, 'index'])->name('index');
            Route::livewire('/bbm', 'driver.bbm.index')->name('bbm.index');
            Route::livewire('/bbm/create', 'driver.bbm.create')->layout('layouts.simple')->name('bbm.create');
            Route::livewire('/bbm/edit/{id}', 'driver.bbm.edit')->layout('layouts.simple')->name('bbm.edit');
            Route::livewire('/bbm/show/{id}', 'driver.bbm.show')->layout('layouts.simple')->name('bbm.show');

            Route::livewire('/setting', 'driver.setting.index')->name('setting.index');
    });
});

Auth::routes();
