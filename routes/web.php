<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\livewire\BuyTable;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'read'])->name('home');
Route::get('/crear', [HomeController::class, 'create'])->name('crear');
Route::post('/guardar/producto', [HomeController::class, 'save_create'])->name('guardar_crear');

Route::get('/modificar/{id}', [HomeController::class, 'update'])->name('modificar');
Route::post('actualizar/producto', [HomeController::class, 'save_update'])->name('guardar_modificar');

Route::get('eliminar/producto/{id}', [HomeController::class, 'delete'])->name('eliminar');

Route::get('comprar/producto/', [HomeController::class, 'comprar'])->name('comprar');
Route::get('transaccion/producto/{id}', [HomeController::class, 'transaccion'])->name('transaccion');

Route::get('/crear/categoria', [HomeController::class, 'category_create'])->name('crear_categoria');
Route::post('/guardar/categoria', [HomeController::class, 'category_save'])->name('crear_categoria');