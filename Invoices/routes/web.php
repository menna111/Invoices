<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SectionController;




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
    return view('auth.login');
});




Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('invoices', InvoiceController::class);
Route::resource('sections', SectionController::class);

//]);
//Route::get('/sections/delete/{$id}',[SectionController::class,'delete'])->name('sections.delete');












Route::get('/{page}', [AdminController::class,'index']);
