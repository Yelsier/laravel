<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoginController;

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

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create')->middleware('NeedsAdmin');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store')->middleware('NeedsAdmin');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit')->middleware('NeedsAdmin');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update')->middleware('NeedsAdmin');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('NeedsAdmin');

Route::post('/addCart/{productId}', [ProductoController::class, 'addProduct'])->name('productos.addProduct');
Route::post('/removeCart/{productId}', [ProductoController::class, 'removeProduct'])->name('productos.removeProduct');

Route::get('/categorias', [CategoryController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoryController::class, 'create'])->name('categorias.create')->middleware('NeedsAdmin');
Route::post('/categorias', [CategoryController::class, 'store'])->name('categorias.store')->middleware('NeedsAdmin');
Route::get('/categorias/{categoria}', [CategoryController::class, 'show'])->name('categorias.show')->middleware('NeedsAdmin');
Route::get('/categorias/{categoria}/edit', [CategoryController::class, 'edit'])->name('categorias.edit')->middleware('NeedsAdmin');
Route::put('/categorias/{categoria}', [CategoryController::class, 'update'])->name('categorias.update')->middleware('NeedsAdmin');
Route::delete('/categorias/{categoria}', [CategoryController::class, 'destroy'])->name('categorias.destroy')->middleware('NeedsAdmin');

Route::get("/login", [LoginController::class, "form"])->name('login');
Route::post("/login", [LoginController::class, "login"]);
Route::get("/logout", [LoginController::class, "logout"]);

Route::get("/", function () {
    return view("home");
});