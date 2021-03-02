<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\CategoryController;


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

// todo change this mess to resource routes...
Route::get('/files', [FileController::class, 'index'])->name('files');
Route::get('/files/{file}/download', [FileController::class, 'download'])->name('files_download');
Route::get('/files/new', [FileController::class, 'create'])->name('files_create');
Route::post('/files/new', [FileController::class, 'store']);
Route::delete('/files/{file}/destroy', [FileController::class, 'destroy'])->name('files_destroy');
Route::get('/files/{file}/edit', [FileController::class, 'edit'])->name('files_edit');
Route::put('/files/{file}/update', [FileController::class, 'update'])->name('files_update');
Route::get('/files/{file}/detail', [FileController::class, 'show'])->name('files_detail');

Route::get('/rules', [RuleController::class, 'index'])->name('rules');
Route::get('/rules/new', [RuleController::class, 'create'])->name('rules_create');
Route::post('/rules/new', [RuleController::class, 'store']);
Route::delete('/rules/{rule}/destroy', [RuleController::class, 'destroy'])->name('rules_destroy');
Route::get('/rules/{rule}/edit', [RuleController::class, 'edit'])->name('rules_edit');
Route::put('/rules/{rule}/update', [RuleController::class, 'update'])->name('rules_update');
Route::get('/rules/{rule}/detail', [RuleController::class, 'show'])->name('rules_detail');

Route::get('/extensions', [ExtensionController::class, 'index'])->name('extensions');
Route::get('/extensions/new', [ExtensionController::class, 'create'])->name('extensions_create');
Route::post('/extensions/new', [ExtensionController::class, 'store']);
Route::delete('/extensions/{extension}/destroy', [ExtensionController::class, 'destroy'])->name('extensions_destroy');
Route::get('/extensions/{extension}/edit', [ExtensionController::class, 'edit'])->name('extensions_edit');
Route::put('/extensions/{extension}/update', [ExtensionController::class, 'update'])->name('extensions_update');
Route::get('/extensions/{extension}/detail', [ExtensionController::class, 'show'])->name('extensions_detail');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/new', [CategoryController::class, 'create'])->name('categories_create');
Route::post('/categories/new', [CategoryController::class, 'store']);
Route::delete('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories_destroy');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories_edit');
Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories_update');
Route::get('/categories/{category}/detail', [CategoryController::class, 'show'])->name('categories_detail');

Route::get('/', function(){
    /*$ext = \App\Models\File::first();
    $rules = \App\Models\Category::all();

    $ext->categories()->sync($rules);
    //dd($ext);*/


    return view('welcome');
});


