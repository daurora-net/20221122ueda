<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.index');
Route::get('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::get('/contact/thanks', [ContactController::class, 'send'])->name('contact.thanks');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/search', [ContactController::class, 'search'])->name('contact.search');
Route::post('/contact/search', [ContactController::class, 'search'])->name('contact.search');
Route::post('/contact/delete', [ContactController::class, 'delete'])->name('contact.delete');