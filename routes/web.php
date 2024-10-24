<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CrearTipoDocumentario;
use App\Livewire\CrearUnidad;
use App\Http\Controllers\Admin\TipoDocumento;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tipo-documento', [TipoDocumento::class,'index'])->name('tipoDocumento');
Route::get('/unidad', CrearUnidad::class)->name('unidad');
