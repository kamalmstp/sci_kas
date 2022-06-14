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
Route::livewire('/category/create', 'administrator.category.create')->name('admin.cat.create');
Route::livewire('/category/edit/{id}', 'administrator.category.edit')->name('admin.cat.edit');