<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('page-home');
});
Route::get('/blank', function () {
    return view('blank');
});

Route::livewire('/category', 'administrator.category.index')->name('admin.cat.index');
Route::livewire('/category/create', 'administrator.category.create')->layout('layouts.simple')->name('admin.cat.create');
Route::livewire('/category/edit/{id}', 'administrator.category.edit')->layout('layouts.simple')->name('admin.cat.edit');

Route::livewire('/kas', 'administrator.kas.index')->name('admin.kas.index');
Route::livewire('/kas/create', 'administrator.kas.create')->layout('layouts.simple')->name('admin.kas.create');
Route::livewire('/kas/edit/{id}', 'administrator.kas.edit')->layout('layouts.simple')->name('admin.kas.edit');

Route::livewire('/kaskeluar', 'administrator.kaskeluar.index')->name('admin.kaskeluar.index');
Route::livewire('/kaskeluar/create', 'administrator.kaskeluar.create')->layout('layouts.simple')->name('admin.kaskeluar.create');
Route::livewire('/kaskeluar/edit/{id}', 'administrator.kaskeluar.edit')->layout('layouts.simple')->name('admin.kaskeluar.edit');
Route::livewire('/kaskeluar/show/{id}', 'administrator.kaskeluar.show')->layout('layouts.simple')->name('admin.kaskeluar.show');

Route::livewire('/setting', 'administrator.setting.index')->name('admin.setting.index');
Route::livewire('/nota', 'administrator.nota.index')->name('admin.nota.index');
