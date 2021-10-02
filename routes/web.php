<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});


Route::get('/', [HomeController::class, 'read'])->name('home');
Route::get('/crear', [HomeController::class, 'create'])->name('crear');
Route::post('/guardar/empleado', [HomeController::class, 'save_create'])->name('guardar_crear');

Route::get('/modificar/{id}', [HomeController::class, 'update'])->name('modificar');
Route::post('actualizar/empleado', [HomeController::class, 'save_update'])->name('guardar_modificar');

Route::get('eliminar/empleado/{id}', [HomeController::class, 'delete'])->name('eliminar');
